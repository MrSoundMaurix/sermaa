<?php

namespace App\Http\Controllers;

use App\Models\Antemorten;
use App\Models\IngresoCamal;
use App\Models\IngresoDetalle;
use Illuminate\Http\Request;
use App\Exports\ExcelExport;

class AntemortenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view("veterinario.antemorten.index");
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store2(Request $request)
    {
        //fecha cogida del primer boton 
        $fecha_d = $request->get('fecha_d');
        $ANTEMORTEN = Antemorten::whereDate("fecha", $fecha_d)->get();
        //boorra todos los registros anteriormente registrados para que no exista dupliacion de informacion
        foreach ($ANTEMORTEN as $a) {
            $a->delete();
        }


        //llena todos los registros para la vista
        $fecha = $request->get('fecha');
        $hora = $request->get('hora');
        $especie = $request->get('especie');
        $lugar_procedencia = $request->get('lugar_procedencia');
        $csmi = $request->get('csmi');
        $nro_lotes = $request->get('nro_lotes');
        $etapa_productiva = $request->get('etapa_productiva');
        $nro_bovinos_machos = $request->get('nro_bovinos_machos');
        $nro_bovinos_hembras = $request->get('nro_bovinos_hembras');
        $nro_bovinos_hembras = $request->get('nro_bovinos_hembras');
        $total = $request->get('total');
        $nro_animales_muertos = $request->get('nro_animales_muertos');
        $causa_probable = $request->get('causa_probable');
        $decomiso = $request->get('decomiso');
        $aprovechamiento = $request->get('aprovechamiento');
        $nro_sindrome_nervioso = $request->get('nro_sindrome_nervioso');
        $nro_sindrome_digestivo = $request->get('nro_sindrome_digestivo');
        $nro_sindrome_respiratorio = $request->get('nro_sindrome_respiratorio');
        $nro_sindrome_vesicular = $request->get('nro_sindrome_vesicular');
        $tipo_secrecion = $request->get('tipo_secrecion');
        $nro_cojera = $request->get('nro_cojera');
        $nro_ambulatorios = $request->get('nro_ambulatorios');
        $nro_matanza_normal = $request->get('nro_matanza_normal');
        $nro_matanza_especial = $request->get('nro_matanza_especial');
        $nro_matanza_emergencia = $request->get('nro_matanza_emergencia');
        $nro_aplazamiento_matanza = $request->get('nro_aplazamiento_matanza');
        $observaciones = $request->get('observaciones');

        $fechaP = $request->get('fechaP');
        $horaP = $request->get('horaP');
        $especieP = $request->get('especieP');
        $lugar_procedenciaP = $request->get('lugar_procedenciaP');
        $csmiP = $request->get('csmiP');
        $nro_lotesP = $request->get('nro_lotesP');
        $etapa_productivaP = $request->get('etapa_productivaP');
        $nro_porcinos_machos = $request->get('nro_porcinos_machos');
        $nro_porcinos_hembras = $request->get('nro_porcinos_hembras');
        $totalP = $request->get('totalP');
        $nro_animales_muertosP = $request->get('nro_animales_muertosP');
        $causa_probableP = $request->get('causa_probableP');
        $decomisoP = $request->get('decomisoP');
        $aprovechamientoP = $request->get('aprovechamientoP');
        $nro_sindrome_nerviosoP = $request->get('nro_sindrome_nerviosoP');
        $nro_sindrome_digestivoP = $request->get('nro_sindrome_digestivoP');
        $nro_sindrome_respiratorioP = $request->get('nro_sindrome_respiratorioP');
        $nro_sindrome_vesicularP = $request->get('nro_sindrome_vesicularP');
        $tipo_secrecionP = $request->get('tipo_secrecionP');
        $nro_cojeraP = $request->get('nro_cojeraP');
        $nro_ambulatoriosP = $request->get('nro_ambulatoriosP');
        $nro_matanza_normalP = $request->get('nro_matanza_normalP');
        $nro_matanza_especialP = $request->get('nro_matanza_especialP');
        $nro_matanza_emergenciaP = $request->get('nro_matanza_emergenciaP');
        $nro_aplazamiento_matanzaP = $request->get('nro_aplazamiento_matanzaP');
        $observacionesP = $request->get('observacionesP');

        if (isset($fecha)) {
            # code...

            for ($i = 0; $i < count($fecha); $i++) {
                $antemorten = new Antemorten();
                $antemorten->fecha = $fecha[$i] . " " . $hora[$i];
                $antemorten->especie = $especie[$i];
                $antemorten->lugar_procedencia = $lugar_procedencia[$i];
                $antemorten->csmi = $csmi[$i];
                $antemorten->nro_lote = $nro_lotes[$i];
                $antemorten->etapa_productiva = $etapa_productiva[$i];
                $antemorten->nro_machos = $nro_bovinos_machos[$i];
                $antemorten->nro_hembras = $nro_bovinos_hembras[$i];
                $antemorten->total_animales = $total[$i];
                $antemorten->nro_animales_muertos = $nro_animales_muertos[$i];
                $antemorten->causa_probable = $causa_probable[$i];
                $antemorten->decomiso = $decomiso[$i];
                $antemorten->aprovechamiento = $aprovechamiento[$i];
                $antemorten->nro_sindrome_nervioso = $nro_sindrome_nervioso[$i];
                $antemorten->nro_sindrome_digestivo = $nro_sindrome_digestivo[$i];
                $antemorten->nro_sindrome_vesicular = $nro_sindrome_vesicular[$i];
                $antemorten->nro_sindrome_respiratorio = $nro_sindrome_respiratorio[$i];
                $antemorten->tipo_secrecion = $tipo_secrecion[$i];
                $antemorten->nro_cojera = $nro_cojera[$i];
                $antemorten->nro_ambulatorios = $nro_ambulatorios[$i];
                $antemorten->nro_matanza_normal = $nro_matanza_normal[$i];
                $antemorten->nro_matanza_especial = $nro_matanza_especial[$i];
                $antemorten->nro_matanza_emergencia = $nro_matanza_emergencia[$i];
                $antemorten->nro_aplazamiento_matanza = $nro_aplazamiento_matanza[$i];
                $antemorten->observaciones = $observaciones[$i];
                $antemorten->save();
            }
        }
        if (isset($fechaP)) {
            # code...

            for ($i = 0; $i < count($fechaP); $i++) {
                $antemorten = new Antemorten();
                $antemorten->fecha = $fechaP[$i] . " " . $horaP[$i];
                $antemorten->especie = $especieP[$i];
                $antemorten->lugar_procedencia = $lugar_procedenciaP[$i];
                $antemorten->csmi = $csmiP[$i];
                $antemorten->nro_lote = $nro_lotesP[$i];
                $antemorten->etapa_productiva = $etapa_productivaP[$i];
                $antemorten->nro_machos = $nro_porcinos_machos[$i];
                $antemorten->nro_hembras = $nro_porcinos_hembras[$i];
                $antemorten->total_animales = $totalP[$i];
                $antemorten->nro_animales_muertos = $nro_animales_muertosP[$i];
                $antemorten->causa_probable = $causa_probableP[$i];
                $antemorten->decomiso = $decomisoP[$i];
                $antemorten->aprovechamiento = $aprovechamientoP[$i];
                $antemorten->nro_sindrome_nervioso = $nro_sindrome_nerviosoP[$i];
                $antemorten->nro_sindrome_digestivo = $nro_sindrome_digestivoP[$i];
                $antemorten->nro_sindrome_vesicular = $nro_sindrome_vesicularP[$i];
                $antemorten->nro_sindrome_respiratorio = $nro_sindrome_respiratorioP[$i];
                $antemorten->tipo_secrecion = $tipo_secrecionP[$i];
                $antemorten->nro_cojera = $nro_cojeraP[$i];
                $antemorten->nro_ambulatorios = $nro_ambulatoriosP[$i];
                $antemorten->nro_matanza_normal = $nro_matanza_normalP[$i];
                $antemorten->nro_matanza_especial = $nro_matanza_especialP[$i];
                $antemorten->nro_matanza_emergencia = $nro_matanza_emergenciaP[$i];
                $antemorten->nro_aplazamiento_matanza = $nro_aplazamiento_matanzaP[$i];
                $antemorten->observaciones = $observacionesP[$i];
                $antemorten->save();
            }
        }
        $antemortenB = null;
        $antemortenP = null;
        if (isset($fecha)) {
            # code...

            if (count($fecha) > 0) {
                $antemortenB = Antemorten::whereDate('fecha', '=', $fecha[0])
                    ->where('especie', '=', 'Bovino')
                    ->get();
            }
        }

        if (isset($fechaP)) {
            if (count($fechaP) > 0) {

                $antemortenP = Antemorten::whereDate('fecha', '=', $fechaP[0])
                    ->where('especie', '=', 'Porcino')
                    ->get();
            }
        }
        return view("veterinario.antemorten.show", compact("fecha_d", "antemortenB", "antemortenP"))->with('success', 'Registrado con éxito');
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        /*         $fecha = explode("-", $request->get('fecha_ingreso'));
        $anio = $fecha[2];
        $mes = $fecha[1];
        $dia = $fecha[0]; */
        $ingreso = IngresoCamal::whereDate('fecha_ingreso', '=', $request->get('fecha_ingreso'))->get();
        $fecha_ingreso = $request->get('fecha_ingreso');
        //dd($ingreso);
        //$detalles=IngresoDetalle::where('id_ingresos','=',$)
        //dd($ingreso);

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

                $nro_porcinos_hembras = 0;
                $nro_porcinos_machos = 0;


                $i++;
            }
        }
        /* dd($arreglo_; */
        ///LOGICA EN EL CASO QUE YA EXISTA DATOS
        $fecha_datos = explode(" ", $request->get('fecha_ingreso'));
        $fecha_d = $fecha_datos[0];
        $antemortenB = null;
        $antemortenP = null;

        $antemortenB = Antemorten::whereDate('fecha', '=', $fecha_d)
            ->where('especie', '=', 'Bovino')
            ->get();

        $antemortenP = Antemorten::whereDate('fecha', '=', $fecha_d)
            ->where('especie', '=', 'Porcino')
            ->get();
        /* dd($antemortenP); */

        return view("veterinario.antemorten.create", compact("arreglo_bovino", "arreglo_porcino", "antemortenB", "antemortenP", "fecha_d"));
    }

    public function antemortenExcel($fecha)
    {
        // return Excel::import('testing.xls', function($doc) {

        //     $sheet = $doc->setActiveSheetIndex(0);
        //     $sheet->setCellValue('D5', 'Test');

        // })->export('xls');
        // return Excel::download(new ExcelExport, 'users.xls');

        return (new ExcelExport($fecha))->setTemplate(public_path('exceltemplates/testing.xls'))->download('antemorten_diario_' . $fecha . '.xls');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($fecha)
    {
        dd($fecha);
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
