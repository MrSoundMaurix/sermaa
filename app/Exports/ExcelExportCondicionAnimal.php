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

class ExcelExportCondicionAnimal implements WithEvents
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
                $event->writer->removeSheetByIndex(1);

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

                $condiciones_ingreso = [];
                $cont_bobino = 0;
                $cont_porcino = 0;
                $i = 0;
                foreach ($ingreso as $in) {
                    $detalle = IngresoDetalle::where('id_ingresos', '=', $in->id)->get();
                    foreach ($detalle as $det) {
                        if ($det->id_costo_faenamiento == 1) {
                            $cont_bobino += $det->cantidad;
                        }
                        if ($det->id_costo_faenamiento == 2) {
                            $cont_porcino += $det->cantidad;
                        }
                    }


                    $condiciones_ingreso[$i]['fecha'] = explode(" ", $in->fecha_ingreso)[0];
                    $condiciones_ingreso[$i]['hora'] = explode(" ", $in->fecha_ingreso)[1];
                    $condiciones_ingreso[$i]['medio_movilizacion'] = $in->medio_movilizacion;
                    $condiciones_ingreso[$i]['placa_transporte'] = $in->placa_transporte;
                    $condiciones_ingreso[$i]['bobino'] = $cont_bobino;
                    $condiciones_ingreso[$i]['porcino'] = $cont_porcino;
                    $condiciones_ingreso[$i]['total'] = $cont_porcino + $cont_bobino;
                    $condiciones_ingreso[$i]['condiciones_transporte'] = $in->condicion_transporte;
                    $condiciones_ingreso[$i]['observaciones'] = $in->observaciones;
                    $cont_bobino = 0;
                    $cont_porcino = 0;
                    $i++;
                }


                /*   $antemortenB = Antemorten::whereDate('fecha', '=', $this->fecha)
                    ->where('especie', '=', 'Bovino')
                    ->get();
 */



                $row = 6;

                foreach ($condiciones_ingreso as $con) {
                    // $fecha = explode(" ", $con['fecha']);
                    $esh->setValue('A' . $row, $con['fecha']);

                    $esh->setValue('B' . $row, $con['hora']);
                    if ($con['medio_movilizacion'] == "Camión") {
                        $esh->setValue('C' . $row, $con['placa_transporte']);
                    }
                    if ($con['medio_movilizacion'] == "Camioneta") {
                        $esh->setValue('D' . $row, $con['placa_transporte']);
                    }
                    if ($con['medio_movilizacion'] == "A pie") {
                        $esh->setValue('E' . $row, "X");
                    }

                    $esh->setValue('F' . $row, $con['bobino']);
                    $esh->setValue('G' . $row, $con['porcino']);
                    $esh->setValue('H' . $row, $con['total']);

                    $valor = explode(",", $con['condiciones_transporte']);

                    for ($i = 0; $i < count($valor); $i++) {
                        if ($valor[$i] == "ACERRIN PISO") {
                            $esh->setValue('I' . $row, "X");
                        }
                        if ($valor[$i] == "ANIMAL PARADO COMODO") {
                            $esh->setValue('J' . $row, "X");
                        }
                        if ($valor[$i] == "MEZCADOS") {
                            $esh->setValue('K' . $row, "X");
                        }
                        if ($valor[$i] == "AMARRADOS") {
                            $esh->setValue('L' . $row, "X");
                        }
                        if ($valor[$i] == "SIN AMARRAR") {
                            $esh->setValue('M' . $row, "X");
                        }
                    }

                    $esh->setValue('N' . $row, $con['observaciones']);

                    $row++;
                }
                return;
            },
        ];
    }
}
