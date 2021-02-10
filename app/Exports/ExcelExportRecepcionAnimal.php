<?php

namespace App\Exports;

use Maatwebsite\Excel\Files\LocalTemporaryFile;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Events\BeforeWriting;
use Maatwebsite\Excel\Events\BeforeExport;
use Maatwebsite\Excel\Writer;
use Maatwebsite\Excel\Excel;
use App\Exports\ExtendWorksheets;
use App\Models\Antemorten;
use Maatwebsite\Excel\Concerns\Exportable;
use App\Models\User;
use App\Models\IngresoCamal;
use App\Models\IngresoDetalle;

class ExcelExportRecepcionAnimal implements WithEvents
{
    use Exportable;

    private $template_file =  null;
    public $fecha;

    public function __construct($fecha)
    {
        $this->fecha = $fecha;
    }

    /** 
     * @param string $template_file 
     * @return $this 
     */
    public function setTemplate(string $template_file)
    {
        if (file_exists($template_file)) {
            $this->template_file =  $template_file;
        }
        return $this;
    }

    /**
     * @return array
     */
    public function registerEvents(): array
    {
        return [
            BeforeExport::class => function (BeforeExport $event) {
                if (is_null($this->template_file)) {
                    return;
                }
                $event->writer->reopen(new LocalTemporaryFile($this->template_file), Excel::XLS);
                return;
            },

            BeforeWriting::class => function (BeforeWriting $event) {
                //$event->writer->removeSheetByIndex(1);

                $esh = new ExtendWorksheets($event->writer->getSheetByIndex(0)->getDelegate());
                /*  $esh->setValue('B7', 'IMBABURA');
                $esh->setValue('F7', 'ANTONIO ANTE');
                $esh->setValue('L7', 'ATUNTAQUI');
                $esh->setValue('S7', 'SERMAA EP');
                $esh->setValue('AA7', 'PAOLA GUERRERO'); */


                //$fecha_dia = $this->fecha;
                $fecha_dia = explode("-", $this->fecha);
                $mes = $fecha_dia[0];
                $anio = $fecha_dia[1];
                if (count($fecha_dia) == 2) {
                    $ingreso = IngresoCamal::whereMonth('fecha_ingreso', '=', $mes)
                        ->whereYear('fecha_ingreso', '=', $anio)
                        ->get();
                } else {
                    $ingreso = IngresoCamal::whereDate('fecha_ingreso', '=', $this->fecha)->get();
                }

                $arreglo_bovino = [];
                $arreglo_porcino = [];
                $nro_bovinos_machos = 0;
                $nro_bovinos_hembras = 0;
                $nro_porcinos_hembras = 0;
                $nro_porcinos_machos = 0;
                $i = 0;

                /*  $condiciones_ingreso = [];
                $cont_bobino = 0;
                $cont_porcino = 0;
                $i = 0; */

                foreach ($ingreso as $ing) {
                    $detalles = IngresoDetalle::where('id_ingresos', '=', $ing->id)
                        ->where('id_costo_faenamiento', '=', 1)
                        ->get();

                    /*   dd($detalles); */

                    foreach ($detalles as $det) {
                        //1 vacuno
                        //2 porcino
                        if ($det->genero == "Macho" && $det->id_costo_faenamiento == 1) {
                            $nro_bovinos_machos =  $nro_bovinos_machos + $det->cantidad;
                        } else if ($det->genero == "Hembra" && $det->id_costo_faenamiento == 1) {
                            $nro_bovinos_hembras = $nro_bovinos_hembras + $det->cantidad;
                        }
                    }
                    if ($nro_bovinos_hembras == 0 && $nro_bovinos_machos == 0) {
                    } else {
                        $fecha_f = explode(" ", $ing->fecha_ingreso);
                        $fecha = $fecha_f[0];
                        $hora = $fecha_f[1];

                        $arreglo_bovino[$i]['id_ingreso'] = $ing->id;
                        $arreglo_bovino[$i]['lugar_procedencia'] = $ing->lugar_procedencia;
                        $arreglo_bovino[$i]['fecha'] = $fecha;
                        $arreglo_bovino[$i]['hora'] = $hora;
                        $arreglo_bovino[$i]['especie'] = "Bovino";
                        $arreglo_bovino[$i]['csmi'] = $ing->csmi;
                        $arreglo_bovino[$i]['nro_bovinos_hembras'] = $nro_bovinos_hembras;
                        $arreglo_bovino[$i]['nro_bovinos_machos'] = $nro_bovinos_machos;
                        $arreglo_bovino[$i]['total'] =  $nro_bovinos_hembras + $nro_bovinos_machos;
                        $responsable = User::findOrFail($ing->responsable_recepcion);
                        $arreglo_bovino[$i]['responsable_recepcion'] = $responsable->nombres . " " . $responsable->apellidos;
                        /*   $arreglo_bovino[$i]['responsable_recepcion'] =  $ing->responsable_recepcion; */
                        $arreglo_bovino[$i]['fecha_faenamiento'] =  $ing->fecha_faenamiento;
                        $nro_bovinos_machos = 0;
                        $nro_bovinos_hembras = 0;
                        $i++;
                    }
                }
                $i = 0;
                foreach ($ingreso as $ing) {
                    $detalles = IngresoDetalle::where('id_ingresos', '=', $ing->id)
                        ->where('id_costo_faenamiento', '=', 2)
                        ->get();

                    //porcinos
                    foreach ($detalles as $det) {
                        if ($det->genero == "Macho" && $det->id_costo_faenamiento == 2) {
                            $nro_porcinos_machos = $nro_porcinos_machos + $det->cantidad;
                        } else if ($det->genero == "Hembra" && $det->id_costo_faenamiento == 2) {
                            $nro_porcinos_machos = $nro_porcinos_hembras + $det->cantidad;
                        }
                    }
                    if ($nro_porcinos_hembras == 0 && $nro_porcinos_machos == 0) {
                    } else {

                        $fecha_f = explode(" ", $ing->fecha_ingreso);
                        $fecha = $fecha_f[0];
                        $hora = $fecha_f[1];

                        $arreglo_porcino[$i]['id_ingreso'] = $ing->id;
                        $arreglo_porcino[$i]['lugar_procedencia'] = $ing->lugar_procedencia;
                        $arreglo_porcino[$i]['fecha'] = $fecha;
                        $arreglo_porcino[$i]['hora'] = $hora;
                        $arreglo_porcino[$i]['especie'] = "Porcino";
                        $arreglo_porcino[$i]['csmi'] = $ing->csmi;
                        $arreglo_porcino[$i]['nro_porcinos_hembras'] = $nro_porcinos_hembras;
                        $arreglo_porcino[$i]['nro_porcinos_machos'] = $nro_porcinos_machos;
                        $arreglo_porcino[$i]['total'] =  $nro_porcinos_hembras + $nro_porcinos_machos;
                        $responsable = User::findOrFail($ing->responsable_recepcion);
                        $arreglo_porcino[$i]['responsable_recepcion'] = $responsable->nombres . " " . $responsable->apellidos;

                        /* $arreglo_porcino[$i]['responsable_recepcion'] =  $ing->responsable_recepcion; */
                        $arreglo_porcino[$i]['fecha_faenamiento'] =  $ing->fecha_faenamiento;

                        $nro_porcinos_hembras = 0;
                        $nro_porcinos_machos = 0;
                        $i++;
                    }
                }



                $row = 5;

                foreach ($arreglo_porcino as $con) {
                    // $fecha = explode(" ", $con['fecha']);
                    $esh->setValue('A' . $row, $con['fecha']);
                    $esh->setValue('B' . $row, $con['id_ingreso']);
                    $esh->setValue('C' . $row, $con['hora']);
                    $esh->setValue('D' . $row, $con['nro_porcinos_machos']);
                    $esh->setValue('E' . $row, $con['nro_porcinos_hembras']);
                    $esh->setValue('F' . $row, $con['total']);
                    $esh->setValue('G' . $row, $con['fecha_faenamiento']);
                    $esh->setValue('H' . $row, $con['csmi']);
                    $esh->setValue('I' . $row, $con['responsable_recepcion']);
                    $row++;
                }

                $row = 6;
                //hoja nro 2
                $esh2 = new ExtendWorksheets($event->writer->getSheetByIndex(1)->getDelegate());
                foreach ($arreglo_bovino as $con) {
                    // $fecha = explode(" ", $con['fecha']);
                    $esh2->setValue('A' . $row, $con['fecha']);
                    $esh2->setValue('B' . $row, $con['id_ingreso']);
                    $esh2->setValue('C' . $row, $con['hora']);
                    $esh2->setValue('D' . $row, $con['nro_bovinos_machos']);
                    $esh2->setValue('E' . $row, $con['nro_bovinos_hembras']);
                    $esh2->setValue('F' . $row, $con['total']);
                    $esh2->setValue('G' . $row, $con['fecha_faenamiento']);
                    $esh2->setValue('H' . $row, $con['csmi']);
                    $esh2->setValue('I' . $row, $con['responsable_recepcion']);
                    $row++;
                }

                return;
            },
        ];
    }
}
