<?php

namespace App\Http\Controllers;

use App\Http\Requests\DistribucionRequest;
use App\Models\Animal;
use App\Models\AnimalPieza;
use App\Models\CabeceraDistribucion;
use App\Models\CostoCamal;
use App\Models\CostoFaenamiento;
use App\Models\CuartoFrio;
use App\Models\DetalleDistribucion;
use App\Models\IngresoCamal;
use App\Models\IngresoDetalle;
use App\Models\Ubicacion;
use App\Models\User;
use PDF;
use App\Models\UsuarioCamal;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DistribucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ingresoscamal = DB::table('ingresos as doc')
            ->join('users as p', 'doc.id_users', '=', 'p.id')
            // ->join('ingresos_detalle as id','id.id_ingresos','=','id_usuarios_camal')
            // ->select('id.id_ingresos','id.id','guia','fecha_ingreso',  'id.especie','id.cantidad')
            ->select('p.codigo', 'fecha_ingreso', 'doc.id', 'p.nombres', 'p.apellidos')
            //->where('id.especie','=','v')
            ->orderby('fecha_ingreso', 'desc')
            ->where('doc.estado', '=', 2)
            ->orWhere('doc.estado', '=', 1)
            //->orderby('id.id', 'asc')
            ->paginate(10);

        $ingresos = IngresoCamal::where('estado', 2)->orWhere('estado', 1)->get();

        //  dd($ingresos);
        //  dd($ingresoscamal[0]);
        return view('distribucion-camal.index', ["ingresoscamal" => $ingresoscamal]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_distribuciones()
    {
        $ingresoscamal = DB::table('ingresos as doc')
            ->join('users as p', 'doc.id_users', '=', 'p.id')
            // ->join('ingresos_detalle as id','id.id_ingresos','=','id_usuarios_camal')
            // ->select('id.id_ingresos','id.id','guia','fecha_ingreso',  'id.especie','id.cantidad')
            ->select('p.codigo', 'fecha_ingreso', 'doc.id', 'p.nombres', 'p.apellidos')
            //->where('id.especie','=','v')
            ->orderby('fecha_ingreso', 'desc')
            ->where('doc.estado', '=', 2)
            ->orWhere('doc.estado', '=', 1)
            ->orWhere('doc.estado', '=', 3)
            //->orderby('id.id', 'asc')
            ->paginate(10);

        $ingresos = IngresoCamal::where('estado', 2)->orWhere('estado', 1)->get();

        //  dd($ingresos);
        //  dd($ingresoscamal[0]);
        return view('distribucion-camal.index_distribucion', ["ingresoscamal" => $ingresoscamal]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function distribuciones()
    {

        $ingresos = IngresoCamal::where('estado', 2)->get();
        //  dd($ingresos);
        //  dd($ingresoscamal[0]);
        return view('distribucion-camal.index', ["ingresoscamal" => $ingresos]);
    }

    /***
     * Metodo para las partes del ajax
     */
    /*  public function partes2(Request $request)
    {
        // if ($request->ajax()) {

      

        $valor = (int)$request->get('faculty_id');
        $partes = AnimalPieza::where('id_animales', $valor)
            ->where('estado', 1)
            ->get();
        info($partes);
        // $partes = DB::table('animales_piezas')->get();
        //$partes = AnimalPieza::all();
        $piezas = [];
        foreach ($partes as $u) {
            //$val = explode("-", $u->codigo);
            //  if ($val[2] <= 4) {
            $piezas[$u->id] = $u->pieza . "_" . $u->codigo . "_" . $u->id;
            // }
        }

        return response()->json(array_unique($piezas));
    } */
    /***
     * Metodo para las partes del ajax
     */
    public function partes2($id)
    {
        $valor = (int)$id;
     //   info($valor);
        $partes = AnimalPieza::where('id_animales', $valor)
            ->where('estado', 1)
            ->get();
      //  info($partes);

        $piezas = [];
     //   \Log::info('message' . $partes);
        /*  foreach ($partes as $u) {
            $val = explode("-", $u->codigo);
            if ($val[2] <= 4) {
                $piezas['pieza'] = $u->pieza;
                $piezas['codigo'] = $u->codigo;
                $piezas['id'] = $u->id;
            }
        } */
        return response()->json(['data' => $partes]);
    }
    /***
     * Metodo para las partes del ajax
     */
    public function partesIngresada($id)
    {
        // if ($request->ajax()) {
        $valor = (int)$id;
        $partes = AnimalPieza::where('id_animales', $valor)->where('estado', 1)
            ->get();
     //   info($partes);
        $piezas = [];
        foreach ($partes as $u) {
            $val = explode("-", $u->codigo);
            if ($val[2] > 4) {
                $piezas[$u->id] = $u->pieza . "_" . $u->codigo . "_" . $u->id;
            }
        }

        //return view('canton');
        return response()->json(['data' => $partes]);
        /// }
    }

    /***
     * Metodo para actualizar el peso
     */
    public function actualizarPeso(Request $request)
    {
        //  var_dump($request);
        $partes2 = AnimalPieza::where('id', $request->get('pieza'))->get();
        $animal = Animal::where('id', $request->get('animal_peso'))->get();
     //   info($animal);
        $codigoAnimal = $animal[0]->codigo;
        if (strpos($animal[0]->codigo, "v")) {
            $especie = "Bovino";
        } else {
            $especie = "Porcino";
        }


        // $partes = AnimalPieza::all();
        //$partes2 = $partes->find($request->get('pieza'));
        /* $partes = AnimalPieza::findOrFail() */
        $peso = $request->get('peso');

        // $partes2->update();

        foreach ($partes2 as $u) {
            $piezas[$u->id] = $u->codigo . "%" . $u->pieza . "%" . $peso . "%" . $codigoAnimal . "%" . $especie;
        }
        return response()->json(array_unique($piezas));
    }
    /***
     * Metodo para actualizar el peso
     */
    public function actualizarPesoIngresada(Request $request)
    {
        //  var_dump($request);
        $partes2 = AnimalPieza::where('id', $request->get('pieza'))->get();
        $animal = Animal::where('id', $request->get('animal_peso'))->get();
      //  info($animal);
        $peso = 0;
        $codigoAnimal = $animal[0]->codigo;
        if (strpos($animal[0]->codigo, "v")) {
            $especie = "Bovino";
        } else {
            $especie = "Porcino";
        }
        foreach ($partes2 as $u) {
            $piezas[$u->id] = $u->codigo . "%" . $u->pieza . "%" . $peso . "%" . $codigoAnimal . "%" . $especie;
        }
        return response()->json(array_unique($piezas));
    }





    public function distribucion(Request $request)
    {

        // if ($request->ajax()) {
        //$distribucion = CabeceraDistribucion::where('id_ingresos', $request->get('id'))->get();
        $distribucion = DB::table('cabecera_distribucion')->where('id_ingresos', $request->get('id'))->orderBy('id', 'desc')->get();
      ///  info($distribucion);

        // dd($careers);
        foreach ($distribucion as $u) {
            $careersArray[$u->id] = $u->nombre_destinatario . "_" . $u->placa_transporte . "_" . $u->lugar_destino . "_" . $u->id;
        }

        //return view('canton');
        return response()->json(array_unique($careersArray));
        /// }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        /* try {
            dd($id);
            $ubicacion = Ubicacion::all();
            $fecha_actual = date("Y-m-d");
            $hora_actual = date("H:i:s");
            $provincias = ['IMBABURA', 'CARCHI', 'SUCUMBÍOS', 'PICHINCHA'];

            return view('distribucion-camal.create', compact("ubicacion", "provincias", "fecha_actual", "hora_actual"));
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        } */
    }



    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DistribucionRequest $request)
    {
        $codigo = $request->get('codigo');
        // dd($especie);
        if ($codigo != null) {

            $cabecera = new CabeceraDistribucion();
            $cabecera->nombre_destinatario = $request->get('nombre_destinatario');
            $cabecera->lugar_destino = $request->get('lugar_destino');
            $cabecera->fecha_actual = $request->get('fecha') . " " . $request->get('hora');
            $cabecera->placa_transporte = $request->get('placa_transporte');
            $cabecera->origen_provincia = $request->get('provincia');
            $cabecera->origen_canton = $request->get('canton');
            $cabecera->origen_parroquia = $request->get('parroquia');
            $cabecera->destino_provincia = $request->get('provincia_destino');
            $cabecera->destino_canton = $request->get('canton_destino');
            $cabecera->destino_parroquia = $request->get('parroquia_destino');
            $cabecera->id_ingresos = $request->get('id_ingresos');
            $cabecera->id_responsable_distribucion = Auth::id();
            //clave primaria del transporte
            $cabecera->id_costo_camal = $request->get('pago_transporte');
            $costo = CostoCamal::findOrFail($cabecera->id_costo_camal);
            $cabecera->costo_transporte = $costo->valor;
            $cabecera->save();

            $cont = 0;
            $codigo = $request->get('codigo');
            $parte = $request->get('parte');
            $peso = $request->get('peso');
            $nro_id = $request->get('nro_id_peso');
            $id_cuarto = $request->get('id_cuarto');

            $id_ingresos = 0;
            $id_ingresos_detalle = 0;
            // dd($id_cuarto);
            while ($cont < count($codigo)) {
                $detalle_distribucion = new DetalleDistribucion();
                if (strpos($codigo[$cont], "v")) {
                    $detalle_distribucion->especie = "Bovino";
                } else {
                    $detalle_distribucion->especie = "Porcino";
                }

                $detalle_distribucion->cantidad = 1;
                $detalle_distribucion->producto = $parte[$cont];
                $detalle_distribucion->numero_id = $nro_id[$cont];
                $detalle_distribucion->id_cabecera_distribucion = $cabecera->id;
                $detalle_distribucion->codigo_animal_pieza = $codigo[$cont];
                try {
                    ///piezas
                    $animalPieza = AnimalPieza::where('codigo', $codigo[$cont])->get();
                    $animalPieza[0]->peso = $peso[$cont];
                    $animalPieza[0]->estado = 2;
                    $animalPieza[0]->updated_at = date("Y-m-d H:i:s");

                    $animalPieza[0]->update();

                    //animal
                    $arreglo = explode("-", $codigo[$cont]);
                    $animalPieza2 = AnimalPieza::where('id_animales',  $animalPieza[0]->id_animales)->get();
                    $contador2 = 0;
                    foreach ($animalPieza2 as $a) {
                        if ($a->estado == 2) {
                            $contador2 = $contador2 + 1;
                        }
                    }
                    if ($contador2 == 8) {

                        $animal = Animal::findOrFail($animalPieza[0]->id_animales);
                        $animal->estado = 2;
                        $animal->update();

                        //contabiliza para los ingresos detalle 
                        $animales = Animal::where('id_ingresos_detalle', $animal->id_ingresos_detalle)->get();
                        $contador_estados = 0;
                        foreach ($animales as $a) {
                            if ($a->estado == 2) {
                                $contador_estados++;
                            }
                        }

                        if ($contador_estados == count($animales)) {
                            $ingresos_detalle = IngresoDetalle::findOrFail($animal->id_ingresos_detalle);
                            //dd($ingresos_detalle);
                            $ingresos_detalle->estado = 1;
                            $ingresos_detalle->update();
                            $id_ingresos = $ingresos_detalle->id_ingresos;
                        }
                    }
                    //ingresos detalle


                } catch (\Exception | QueryException $e) {
                }

                $cont = $cont + 1;
                $detalle_distribucion->save();


                if ($id_ingresos != 0) {
                    $ingresos_det = IngresoDetalle::where("id_ingresos", $id_ingresos)->get();
                    $cont2 = 0;
                    foreach ($ingresos_det as $det) {
                        if ($det->estado == 1) {
                            $cont2++;
                        }
                    }
                    /*    dd(count($ingresos_det)); */
                    if ($cont2 == count($ingresos_det)) {
                        $ingreso = IngresoCamal::findOrFail($id_ingresos);
                        $ingreso->estado = 3;
                        $ingreso->update();
                    }
                }
            }
        } else {
            return back()->withErrors(['exception' => "Error al registrar: La tabla de los detalles no debe estar vacía"]);
        }


        return redirect('/distribuciones-camal/showCabeceraDetalle/' . $cabecera->id)->with('success', 'Registrado con éxito');
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //  try {
        //  $ingresosCabecera = IngresoCamal::where('id', $id)->get();
        $ingresosCabecera = IngresoCamal::findOrFail($id);
        $costo_camal = CostoCamal::where('categoria', 1)->get();
        $id_ingresos = $id;
        $usuario = User::where('id', $ingresosCabecera->id_users)->get();
        // dd($usuario);
        $ingresosDetalle = IngresoDetalle::where('id_ingresos', $ingresosCabecera->id)->get();

        $animal = Animal::all();
        $ubicacion = Ubicacion::all();
        $fecha_actual = date("Y-m-d");
        $hora_actual = date("H:i:s");
        //$provincias = ['IMBABURA', 'CARCHI', 'SUCUMBÍOS', 'PICHINCHA'];
        $provincias = ['IMBABURA', 'CARCHI', 'SUCUMBIOS', 'PICHINCHA', 'AZUAY', 'BOLIVAR', 'CAÑAR', 'COTOPAXI', 'CHIMBORAZO', 'EL ORO', 'ESMERALDAS', 'GUAYAS', 'LOJA', 'ORELLANA', 'LOS RIOS', 'MANABI', 'MORONA SANTIAGO', 'NAPO', 'PASTAZA', 'TUNGURAHUA', 'ZAMORA CHINCHIPE', 'GALAPAGOS', 'SUCUMBIOS', 'SANTO DOMINGO DE LOS TSACHILAS'];

        return view('distribucion-camal.create', compact("ubicacion", "provincias", "fecha_actual", "hora_actual", "id_ingresos", "ingresosCabecera", "ingresosDetalle", "usuario", "animal", "costo_camal"));
        /*  } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        } */
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showCabeceraDetalle($id)
    {

        try {
            $cabecera = CabeceraDistribucion::where('id', $id)->get();

            $detalle = DetalleDistribucion::where('id_cabecera_distribucion', $id)->get();
            $costo_camal = null;
            try {
                $costo_camal = CostoCamal::where("id", $cabecera[0]->id_costo_camal)->get();
                // dd($costo_camal);
            } catch (\Throwable $th) {
                //throw $th;
            }
            //  dd($costo_camal);
            $fecha_actual = explode(" ", $cabecera[0]->fecha_actual);
            $fecha = $fecha_actual[0];
            $hora = $fecha_actual[1];

            return view('distribucion-camal.show', compact("cabecera", "detalle", "fecha", "hora", "costo_camal"));
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }

    public function showPdf($id)
    {
        // $usuario = User::findOrFail($id);
        // $pdf = PDF::loadView('usuarios.pdf', compact('usuario'));
        // set_time_limit(300);
        // PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        set_time_limit(300);
        $distribucion = CabeceraDistribucion::findOrFail($id);
        $detalles = DetalleDistribucion::where('id_cabecera_distribucion', $id)->get();
        $pdf = PDF::loadView('usuarios.pdfdistribucion', compact('distribucion', 'detalles'));
        $fecha_actual = date("Y-m-d_H-i-s");
        return $pdf->stream($fecha_actual . '_' . $distribucion->placa_transporte . '_distribucion.pdf');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd($id);
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
