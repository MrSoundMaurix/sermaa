<?php

namespace App\Http\Controllers;

use App\Models\IngresoCamal;
use App\Models\IngresoDetalle;
use Illuminate\Http\Request;
use App\Exports\ExcelExportCondicionAnimal;
use App\Exports\ExcelExportRecepcionAnimal;
use App\Models\User;
use PDF;

class IngresoAnimalesExcelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("camal.excel-condiciones-transporte.index");
        // return view("veterinario.antemorten.index");
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_recepcion_animal()
    {
        return view("camal.excel-recepcion-animales.index");
        // return view("veterinario.antemorten.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fecha_dia = $request->get('fecha_dia');
        $ingreso = IngresoCamal::whereDate('fecha_ingreso', '=', $request->get('fecha_dia'))->get();
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
        return view("camal.excel-condiciones-transporte.show", compact("condiciones_ingreso", "fecha_dia"));
    }


    public function condicionesTransporteExcel($fecha)
    {
        // return Excel::import('testing.xls', function($doc) {
        //     $sheet = $doc->setActiveSheetIndex(0);
        //     $sheet->setCellValue('D5', 'Test');
        // })->export('xls');
        // return Excel::download(new ExcelExport, 'users.xls');
        return (new ExcelExportCondicionAnimal($fecha))->setTemplate(public_path('exceltemplates/REGISTRO_TRANSPORTE_ANIMALES.xls'))->download('condiciones_ingreso_animales_' . $fecha . '.xls');
    }

    public function showCondicionesTransportePdf($fecha)
    {
        // $usuario = User::findOrFail($id);
        // $pdf = PDF::loadView('usuarios.pdf', compact('usuario'));
        // set_time_limit(300);
        // PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        $fecha_dia =  $fecha;
        ///pials con las fechas que estan camvbiandose las posiciones 

        $fecha2 = explode("-", $fecha);

        //dd($fecha2);
        if (sizeof($fecha2) == 2) {
            $anio = $fecha2[1];
            $mes = $fecha2[0];
            $ingreso = IngresoCamal::whereMonth('fecha_ingreso', '=', $mes)
                ->whereYear('fecha_ingreso', '=', $anio)
                ->get();
        } else {
            $ingreso = IngresoCamal::whereDate('fecha_ingreso', '=', $fecha_dia)->get();
        }

        //dd($ingreso);


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


        set_time_limit(300);
        /* $distribucion = IngresoCamal::findOrFail($id);
        $detalles = DetalleDistribucion::where('id_cabecera_distribucion', $id)->get(); */
        $pdf = PDF::loadView('usuarios.pdfMensualCondicionTransporte', compact('condiciones_ingreso', 'fecha'));
        $fecha_actual = date("Y-m-d_H-i-s");
        return $pdf->stream($fecha_actual . '_condicionestranspore.pdf');
    }





    public function showRecepcionAnimalesPdf($fecha)
    {
        $fecha_dia = $fecha;

        $fecha = explode("-", $fecha_dia);



        if (sizeof($fecha) == 2) {
            $mes = $fecha[0];
            $anio = $fecha[1];
            $ingreso = IngresoCamal::whereMonth('fecha_ingreso', '=', $mes)
                ->whereYear('fecha_ingreso', '=', $anio)
                ->get();
        } else {
            $ingreso = IngresoCamal::whereDate('fecha_ingreso', '=', $fecha_dia)->get();
        }
        $arreglo_bovino = [];
        $arreglo_porcino = [];
        $nro_bovinos_machos = 0;
        $nro_bovinos_hembras = 0;
        $nro_porcinos_hembras = 0;
        $nro_porcinos_machos = 0;
        $i = 0;

        $condiciones_ingreso = [];
        $cont_bobino = 0;
        $cont_porcino = 0;
        $i = 0;

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
                if ($ing->responsable_recepcion != null) {
                    $responsable = User::findOrFail($ing->responsable_recepcion);
                    $arreglo_bovino[$i]['responsable_recepcion'] = $responsable->nombres . " " . $responsable->apellidos;
                } else {
                    $arreglo_bovino[$i]['responsable_recepcion'] = "-";
                }
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
                if ($ing->responsable_recepcion != null) {
                    $responsable = User::findOrFail($ing->responsable_recepcion);
                    $arreglo_porcino[$i]['responsable_recepcion'] = $responsable->nombres . " " . $responsable->apellidos;
                } else {
                    $arreglo_porcino[$i]['responsable_recepcion'] = "-";
                }
                /*  $arreglo_porcino[$i]['responsable_recepcion'] =  $ing->responsable_recepcion; */
                $arreglo_porcino[$i]['fecha_faenamiento'] =  $ing->fecha_faenamiento;

                $nro_porcinos_hembras = 0;
                $nro_porcinos_machos = 0;
                $i++;
            }
        }



        set_time_limit(300);
        /* $distribucion = IngresoCamal::findOrFail($id);
        $detalles = DetalleDistribucion::where('id_cabecera_distribucion', $id)->get(); */
        $pdf = PDF::loadView('usuarios.pdfMensualRecepcionAnimal', compact('arreglo_porcino', 'arreglo_bovino', 'fecha'));
        $fecha_actual = date("Y-m-d_H-i-s");
        return $pdf->stream($fecha_actual . '_condicionestranspore.pdf');
    }



    public function recepcionAnimalExcel($fecha)
    {
        // return Excel::import('testing.xls', function($doc) {
        //     $sheet = $doc->setActiveSheetIndex(0);
        //     $sheet->setCellValue('D5', 'Test');
        // })->export('xls');
        // return Excel::download(new ExcelExport, 'users.xls');
        return (new ExcelExportRecepcionAnimal($fecha))->setTemplate(public_path('exceltemplates/REGISTRO_ANIMALES.xls'))->download('recepcion_animales_' . $fecha . '.xls');
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mes_ingreso(Request $request)
    {
        $fecha_dia =  $request->get('fecha_mes_ingreso');
        $fecha = explode("-", $request->get('fecha_mes_ingreso'));
        $mes = $fecha[0];
        $anio = $fecha[1];

        $ingreso = IngresoCamal::whereMonth('fecha_ingreso', '=', $mes)
            ->whereYear('fecha_ingreso', '=', $anio)
            ->get();
        /*  dd($ingreso); */
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
        return view("camal.excel-condiciones-transporte.show", compact("condiciones_ingreso", "fecha_dia"));
    }
    /*  *
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function mes_recepcion_animal(Request $request)
    {
        $fecha_dia =  $request->get('fecha_mes_ingreso');
        $fecha = explode("-", $request->get('fecha_mes_ingreso'));
        $mes = $fecha[0];
        $anio = $fecha[1];

        $ingreso = IngresoCamal::whereMonth('fecha_ingreso', '=', $mes)
            ->whereYear('fecha_ingreso', '=', $anio)
            ->get();

        $condiciones_ingreso = [];

        $arreglo_bovino = [];
        $arreglo_porcino = [];
        $nro_bovinos_machos = 0;
        $nro_bovinos_hembras = 0;
        $nro_porcinos_hembras = 0;
        $nro_porcinos_machos = 0;
        $i = 0;
        foreach ($ingreso as $ing) {
            $detalles = IngresoDetalle::where('id_ingresos', '=', $ing->id)
                ->where('id_costo_faenamiento', '=', 1)
                ->get();



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
                if ($ing->responsable_recepcion != null) {
                    $responsable = User::findOrFail($ing->responsable_recepcion);
                    $arreglo_bovino[$i]['responsable_recepcion'] = $responsable->nombres . " " . $responsable->apellidos;
                } else {
                    $arreglo_bovino[$i]['responsable_recepcion'] = "-";
                }
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
                if ($ing->responsable_recepcion != null) {
                    $responsable = User::findOrFail($ing->responsable_recepcion);
                    $arreglo_porcino[$i]['responsable_recepcion'] = $responsable->nombres . " " . $responsable->apellidos;
                } else {
                    $arreglo_porcino[$i]['responsable_recepcion'] = "-";
                }
                $arreglo_porcino[$i]['fecha_faenamiento'] =  $ing->fecha_faenamiento;

                $nro_porcinos_hembras = 0;
                $nro_porcinos_machos = 0;
                $i++;
            }
        }

        return view("camal.excel-recepcion-animales.show_mes", compact("condiciones_ingreso", "fecha_dia", "arreglo_porcino", "arreglo_bovino"));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function dia_recepcion_animal(Request $request)
    {
        $fecha_dia = $request->get('fecha_dia');

        $fecha = explode("-", $fecha_dia);



        /*  if (sizeof($fecha) == 2) {
            $mes = $fecha[0];
            $anio = $fecha[1];
            $ingreso = IngresoCamal::whereMonth('fecha_ingreso', '=', $mes)
                ->whereYear('fecha_ingreso', '=', $anio)
                ->get();
        } else { */
        $ingreso = IngresoCamal::whereDate('fecha_ingreso', '=', $fecha_dia)->get();
        /* } */


        /*  $ingreso = IngresoCamal::whereDate('fecha_ingreso', '=', $request->get('fecha_dia'))->get(); */
        // dd($ingreso);
        $arreglo_bovino = [];
        $arreglo_porcino = [];
        $nro_bovinos_machos = 0;
        $nro_bovinos_hembras = 0;
        $nro_porcinos_hembras = 0;
        $nro_porcinos_machos = 0;
        $i = 0;

        $condiciones_ingreso = [];
        $cont_bobino = 0;
        $cont_porcino = 0;
        $i = 0;

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

                if ($ing->responsable_recepcion != null) {
                    $responsable = User::findOrFail($ing->responsable_recepcion);
                    $arreglo_bovino[$i]['responsable_recepcion'] = $responsable->nombres . " " . $responsable->apellidos;
                } else {
                    $arreglo_bovino[$i]['responsable_recepcion'] = "-";
                }


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
                if ($ing->responsable_recepcion != null) {
                    $responsable = User::findOrFail($ing->responsable_recepcion);
                    $arreglo_porcino[$i]['responsable_recepcion'] = $responsable->nombres . " " . $responsable->apellidos;
                } else {
                    $arreglo_porcino[$i]['responsable_recepcion'] = "-";
                }


                /*  $arreglo_porcino[$i]['responsable_recepcion'] =  $ing->responsable_recepcion; */
                $arreglo_porcino[$i]['fecha_faenamiento'] =  $ing->fecha_faenamiento;

                $nro_porcinos_hembras = 0;
                $nro_porcinos_machos = 0;
                $i++;
            }
        }

        return view("camal.excel-recepcion-animales.show", compact("condiciones_ingreso", "fecha_dia", "arreglo_porcino", "arreglo_bovino"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
