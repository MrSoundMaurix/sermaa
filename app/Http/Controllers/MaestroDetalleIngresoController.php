<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngresoDetalle;
use App\Models\IngresoCamal;
use App\Models\UsuarioCamal;
use App\Models\User;
use App\Models\CostoCamal;
use App\Models\MatriculaCamal;
use App\Models\AnimalPieza;
use App\Models\Matricula;
use App\Models\Animal;
use App\Models\Fecha;
use App\Models\MaestroDetalleIngresoDetalle;
use App\Models\CostoFaenamiento;
use Illuminate\Support\Facades\Date;
use DB;
use crearIngresoDetalleAnimal;
use Illuminate\Support\Facades\Auth;

class MaestroDetalleIngresoController extends Controller
{

    public function index(Request $request)
    {
        try {
            if ($request) {
                $uscamal_id = trim($request->uscamal_id);
            }
            return view('camal.administrador-camal.create', ["uscamal_id" =>  $uscamal_id]);
        } catch (\Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    public function detalles(Request $request)
    {
        $detalles = IngresoDetalle::where('id_ingresos', $request->get('id_ingreso'))->get();
        return response()->json($detalles);
    }
   private $codAV=0;
   private $codAP=0;

    public function create(Request $request)
    {
        $a=0;
        $fecha=Fecha::where('categoria',1)->orderby('id','desc')->first();
        $id = trim($request->get('id'));
        $costofaenamiento=CostoFaenamiento::all();
        $usuarios=User::find($id);
        $pago_matricula=$usuarios->estado_matricula;
         //estado de matricula del usuario
        $usuario_sin_m=MatriculaCamal::where('id_users',$id)->whereDate('fecha_matricula','>=',date('Y').'-'.'01-01')->
        whereDate('fecha_matricula','<=',date('Y').'-'.$fecha->mes.'-'.$fecha->dia)->get();
       if($pago_matricula==false){
        $pago_matricula=0; 
        
       }else if($pago_matricula==true){
        $pago_matricula=1; 
       }
       if(date('Y-m-d') <= date('Y').'-'.$fecha->mes.'-'.$fecha->dia){
        $a=1; 
       }
      // dd($pago_matricula,$a,date('Y-m-d'),$fecha);
        //OBTENER FECHA DE MATRICULA
        if($pago_matricula){
            $fecha_actual = date("Y");
            $fecha_actual_matricula=Matricula::where('id_users',$id)->whereYear('fecha_matricula', $fecha_actual)->get();
            foreach( $fecha_actual_matricula as $m){
                $fecha_actual_matricula=$m->fecha_matricula;
                }
        } else{$fecha_actual_matricula="";} 
        //OBTENER Costos extras 
        $costo_camal_emergencia=CostoCamal::orwhere('id',1)->orwhere('id',2)->orwhere('id',3)->orwhere('id',4)->get();
        $costo_sin_matric=CostoCamal::where('id',6)->get();
        foreach( $costo_sin_matric as $costo){
        $costo_sin_matricula=$costo->valor;
        }
        return view('camal.administrador-camal.maestroDetalleIngreso.create', ["usuarios" => $usuarios, "id" =>  $id, 
        'costo_camal_emergencia'=>$costo_camal_emergencia,'pago_matricula'=>$pago_matricula,'costo_sin_matricula'=>$costo_sin_matricula
        ,'costofaenamiento'=>$costofaenamiento,'fecha_actual_matricula'=>$fecha_actual_matricula,'a'=>$a,'fecha'=>$fecha]);
    }


    public function store(Request $request)
    {
        $id_usuario = $request->get('id');
        /////-------------OBTENER CODIGO DE USUARIO------------------->
        $codigo_usu =   DB::table('users as uc') ->where('uc.id', '=', $id_usuario) ->select('uc.codigo')->get();
        $codigo_usuario=$codigo_usu[0]->codigo;
        //---------------OBTENER CODIGO AGROCALIDAD DEL ULTIMO ANIMAL INGRESADO EN EL DÍA---------->
        $animal = DB::table('animales as a')->select('a.created_at','a.codigo_agrocalidad')->orderby('a.id', 'desc')->first(); 
      //  dd($animal);
        if ($animal == null) {
            $cod_agrocalidad = 0;
            $cod_pieza_agrocalidad = 0;
        } else {
            $ultima_fecha = explode(' ', $animal->created_at);
            $fecha_actual = date("Y-m-d");
            if ($fecha_actual == $ultima_fecha[0]) {
                    $codigoAgro = $animal->codigo_agrocalidad;
                $codiAg = explode('-', $animal->codigo_agrocalidad);
                $cod_agrocalidad  = ltrim($codiAg[2], "0"); // ltrim borra los ceros
                $ultimo_codigo_pieza_Agrocalidad = DB::table('animales_piezas as ap')
                    ->select('ap.codigo_agrocalidad') ->orderby('ap.id', 'desc')->first();
                    $codigopAgro= $ultimo_codigo_pieza_Agrocalidad->codigo_agrocalidad;
                $codiAgp = explode('-', $codigopAgro);
                $codAp = ltrim($codiAgp[3], "0");
                $cod_pieza_agrocalidad = $codAp;
            } else {
                $cod_agrocalidad = 0;
                $cod_pieza_agrocalidad = 0;
            }
        }
        //---------------OBTENER CODIGO DEL ULTIMO ANIMAL BOVINO---------->
        $ultimo_codigoAV = DB::table('animales as a')
            ->join('ingresos_detalle as id', 'id.id', '=', 'a.id_ingresos_detalle')
            ->join('ingresos as i', 'i.id', '=', 'id.id_ingresos')
            ->where('id.id_costo_faenamiento', '=', 1)->where('i.id_users', '=', $id_usuario)
            ->select('a.codigo')->orderby('a.id', 'desc')->first();
        // Se utiliza la "v" en los códigos, refirindose a bovino
        if ($ultimo_codigoAV == "") {
            $codigoAV = $codigo_usu . 'v-0';
        } else {
            $codigoAV= $ultimo_codigoAV->codigo; 
        }
        $codiAV = explode('-', $codigoAV);
        $codAV = $codiAV[1];

        //---------------OBTENER CODIGO DEL ULTIMO ANIMAL PORCINO----------> 
        $ultimo_codigoAP = DB::table('animales as a')
            ->join('ingresos_detalle as id', 'id.id', '=', 'a.id_ingresos_detalle')
            ->join('ingresos as i', 'i.id', '=', 'id.id_ingresos')
            ->where('id.id_costo_faenamiento', '=', 2)->where('i.id_users', '=', $id_usuario)
            ->select('a.codigo',)->orderby('a.id', 'desc')->first();
        if ($ultimo_codigoAP == "") {
            $codigoAP = $codigo_usu . 'p-0';
        } else {
            $codigoAP= $ultimo_codigoAP->codigo; 
        }
        $codiAP = explode('-', $codigoAP);
        $codAP = $codiAP[1];
        //--------Extraer datos de la Vista--------------------------------->
        $especie = $request->get('especie');
        $cantidad = $request->get('cantidad');
        $genero = $request->get('genero');
        $emergencia = $request->get('emergencia');
        $costo_unitario = $request->get('costo_unitario');
        $lugar_procedencia = $request->get('lugar_procedencia'); 
        $matricula = $request->get('matricula1');
        $valor_matricula = $request->get('valor_matricula'); 
       // dd($matricula,$valor_matricula);
        //-----------DECLARAR VARIABLES-------------------------------------->  
        $cont = 0;
        $i = 0;
        $total = 0;
        $cantidadB = 0;
        $cantidadBH = 0;
        $cantidadBM = 0;
        $cantidadP = 0;
        $cantidadPH = 0;
        $cantidadPM = 0;
        $codigo = 0;
       $cantidad_emergenciaBH=0;
       $cantidad_emergenciaBM=0;
       $cantidad_emergenciaPH=0;
       $cantidad_emergenciaPM=0;
       $costo_unitario_emergenciaB=0;
       $costo_unitario_emergenciaP=0;
       $costo_unitarioB = 0;
       $costo_unitarioP = 0;
              //-------------SUMATORIAS PARA UNIFICAR DATOS---------------->  
        while ($cont < count($especie)) {
            
            if ($especie[$cont] == 'Bovino'){
                if($genero[$cont] == 'Hembra'){
                    if($emergencia[$cont]== "SI"){
                        $cantidad_emergenciaBH=$cantidad_emergenciaBH+$cantidad[$cont];
                        $costo_unitario_emergenciaB=$costo_unitario[$cont];}
                    else if($emergencia[$cont]== "NO"){
                        $costo_unitarioB= $costo_unitario[$cont];}
                        $cantidadBH = $cantidadBH + $cantidad[$cont];
                } else if($genero[$cont] == 'Macho')  {
                    if($emergencia[$cont]== "SI"){ 
                        $cantidad_emergenciaBM=$cantidad_emergenciaBM+$cantidad[$cont];
                        $costo_unitario_emergenciaB=$costo_unitario[$cont];}
                    else if($emergencia[$cont]== "NO"){
                        $costo_unitarioB= $costo_unitario[$cont];}
                        $cantidadBM = $cantidadBM + $cantidad[$cont]; 
                } 
                $cantidadB = $cantidadB + $cantidad[$cont];    
            }
            if ($especie[$cont] == 'Porcino'){
                if($genero[$cont] == 'Hembra'){
                    if($emergencia[$cont]== "SI"){
                        $cantidad_emergenciaPH=$cantidad_emergenciaPH+$cantidad[$cont];
                        $costo_unitario_emergenciaP=$costo_unitario[$cont];}
                    else if($emergencia[$cont]== "NO"){
                        $costo_unitarioP= $costo_unitario[$cont];}
                        $cantidadPH = $cantidadPH + $cantidad[$cont];
                } else if($genero[$cont] == 'Macho')  {
                    if($emergencia[$cont]== "SI"){ 
                        $cantidad_emergenciaPM=$cantidad_emergenciaPM+$cantidad[$cont];
                        $costo_unitario_emergenciaP=$costo_unitario[$cont];}
                    else if($emergencia[$cont]== "NO"){
                        $costo_unitarioP= $costo_unitario[$cont];}
                        $cantidadPM = $cantidadPM + $cantidad[$cont]; 
                } 
                $cantidadP = $cantidadP + $cantidad[$cont];    
            }
            $cont++;
        }
        $cantidadBsinEmergencia=$cantidadB-($cantidad_emergenciaBH+$cantidad_emergenciaBM);
        $cantidadPsinEmergencia=$cantidadP-($cantidad_emergenciaPH+$cantidad_emergenciaPM);
        $total = (($cantidadBsinEmergencia * $costo_unitarioB)+($cantidad_emergenciaBH * $costo_unitario_emergenciaB)+($cantidad_emergenciaBM * $costo_unitario_emergenciaB))+
         (($cantidadPsinEmergencia * $costo_unitarioP)+($cantidad_emergenciaPH * $costo_unitario_emergenciaP)+($cantidad_emergenciaPM * $costo_unitario_emergenciaP));
        //-------REGISTRO CABECERA------------------------------------------>
        $ingreso = new IngresoCamal();
        $ingreso->fecha_ingreso = date("Y-m-d H:i:s");
        $ingreso->id_users = $request->get('id');
        $ingreso->csmi = trim($request->get('csmi'));
        $ingreso->lugar_procedencia= trim($request->get('lugar_procedencia'));
        $ingreso->costo_total = $total;
        $ingreso->matricula = $matricula.'_'.$valor_matricula ;
        $ingreso->responsable_recepcion_datos =  Auth::user()->nombres.' '.Auth::user()->apellidos;
        $ingreso->t_animal = $cantidadB.'_'.$cantidadP.'_'.$cantidadBH.'_'.$cantidadBM.'_'.$cantidadPH.'_'.
        $cantidadPM.'_'.($cantidad_emergenciaBH+$cantidad_emergenciaBM).'_'.($cantidad_emergenciaPH+$cantidad_emergenciaPM); 
        //cantB,cantP,cantBH,cantBM,cantPH,cantPM,cantEmergenciaB,cantEmergenciaP
        $ingreso->estado = 0;
        $ingreso->save();
        //------------------CREAR LOS INGRESOS DETALLE------------------------------->
        if ($cantidadBH != 0) {
            //Ingreso Detalle
            $id_costo_faenamiento=1;
            $genero='Hembra';
            $cantidadAnimalgenero=$cantidadBH;
            $costo_unitario_animal=$costo_unitarioB;
            $id_ingreso= $ingreso->id;
            $cantidad_emergencia=$cantidad_emergenciaBH;
            $costo_unitario_emergencia=$costo_unitario_emergenciaB;
            //Animal
            $cod_agrocalidad;
            $codigo_usuario;
            $codAV;
            $codAP;
            //PIEZAS
            $cod_pieza_agrocalidad;

           $this->crearDetaIngreoAnimal($id_costo_faenamiento,$genero,$cantidadAnimalgenero,
           $costo_unitario_animal,$id_ingreso,$cantidad_emergencia,$cod_agrocalidad,$codigo_usuario,
           $costo_unitario_emergencia,$cod_pieza_agrocalidad,$codAV,$codAP);
           $cod_agrocalidad+=$cantidadBH;
           $codAV+=$cantidadBH;
           $cod_pieza_agrocalidad+=(10*$cantidadBH);
        }
        if ($cantidadBM != 0) {
            //Ingreso Detalle
            $id_costo_faenamiento=1;
            $genero='Macho';
            $cantidadAnimalgenero=$cantidadBM;
            $costo_unitario_animal=$costo_unitarioB;
            $id_ingreso= $ingreso->id;
            $cantidad_emergencia=$cantidad_emergenciaBM;
            $costo_unitario_emergencia=$costo_unitario_emergenciaB;

           $this->crearDetaIngreoAnimal($id_costo_faenamiento,$genero,$cantidadAnimalgenero,
           $costo_unitario_animal,$id_ingreso,$cantidad_emergencia,$cod_agrocalidad,$codigo_usuario,
           $costo_unitario_emergencia,$cod_pieza_agrocalidad,$codAV,$codAP);
           $cod_agrocalidad+=$cantidadBM;
           $codAV+=$cantidadBM;
           $cod_pieza_agrocalidad+=(10*$cantidadBM);
        }
        if ($cantidadPH != 0) {
            //Ingreso Detalle
            $id_costo_faenamiento=2;
            $genero='Hembra';
            $cantidadAnimalgenero=$cantidadPH;
            $costo_unitario_animal=$costo_unitarioP;
            $id_ingreso= $ingreso->id;
            $cantidad_emergencia=$cantidad_emergenciaPH;
            $costo_unitario_emergencia=$costo_unitario_emergenciaP;

           $this->crearDetaIngreoAnimal($id_costo_faenamiento,$genero,$cantidadAnimalgenero,
           $costo_unitario_animal,$id_ingreso,$cantidad_emergencia,$cod_agrocalidad,$codigo_usuario,
           $costo_unitario_emergencia,$cod_pieza_agrocalidad,$codAV,$codAP);
           $cod_agrocalidad+=$cantidadPH;
           $codAP+=$cantidadPH;
           $cod_pieza_agrocalidad+=(10*$cantidadPH);
        }
        if ($cantidadPM != 0) {
            //Ingreso Detalle
            $id_costo_faenamiento=2;
            $genero='Macho';
            $cantidadAnimalgenero=$cantidadPM;
            $costo_unitario_animal=$costo_unitarioP;
            $id_ingreso= $ingreso->id;
            $cantidad_emergencia=$cantidad_emergenciaPM;
            $costo_unitario_emergencia=$costo_unitario_emergenciaP;

           $this->crearDetaIngreoAnimal($id_costo_faenamiento,$genero,$cantidadAnimalgenero,
           $costo_unitario_animal,$id_ingreso,$cantidad_emergencia,$cod_agrocalidad,$codigo_usuario,
           $costo_unitario_emergencia,$cod_pieza_agrocalidad,$codAV,$codAP);
           $cod_agrocalidad+=$cantidadPM;
           $codAP+=$cantidadPM;
           $cod_pieza_agrocalidad+=(10*$cantidadPM);
        } 
     ////CONDICIONES DEL TRANSPORTE
 $condiciones_transporte = ['ACERRÍN PISO', 'ANIMAL PARADO CÓMODO', 'MEZCLADOS', 'AMARRADOS', 'SIN AMARRAR'];

 return redirect('/IngresoCamal')->with('success', 'Detalle registrado con éxito');
 // } catch (\Exception | QueryException $e) {
 // }
}  
    public function crearDetaIngreoAnimal($id_costo_faenamiento,$genero,$cantidadAnimalgenero,
    $costo_unitario_animal,$id_ingreso,$cantidad_emergencia,$cod_agrocalidad,$codigo_usuario,
    $costo_unitario_emergencia, $cod_pieza_agrocalidad,$codAV,$codAP
    ){
    $ingresoDetalle = new IngresoDetalle();
    $ingresoDetalle->id_costo_faenamiento = $id_costo_faenamiento;  //1;
    $ingresoDetalle->genero = $genero; //Hembra
    $ingresoDetalle->cantidad = $cantidadAnimalgenero;// $cantidadBH; 
    $ingresoDetalle->costo_unitario =  $costo_unitario_animal;//$costo_unitarioB;
    $ingresoDetalle->subtotal = ($costo_unitario_animal*($cantidadAnimalgenero- $cantidad_emergencia))+($cantidad_emergencia*$costo_unitario_emergencia);// $costo_unitarioB * $cantidadBH;
    $ingresoDetalle->id_ingresos = $id_ingreso;//$ingreso->id;
    $ingresoDetalle->cantidad_emergencia =$cantidad_emergencia;// $cantidad_emergenciaBH;
    $ingresoDetalle->costo_unitario_emergencia=$costo_unitario_emergencia;
    $ingresoDetalle->save();
    // dd($ultimo_codigoA);     

    for ($i = 0; $i <$cantidadAnimalgenero ; $i++) {    //for ($i = 0; $i < $cantidadVH; $i++) {
        $animal = new Animal();
        $animal->id_ingresos_detalle = $ingresoDetalle->id;
        $animal->estado = 0;
        $cod_agrocalidad++;
        $cod_agro = sprintf('%03s', $cod_agrocalidad);
        if($id_costo_faenamiento==1){
            $animal->codigo_agrocalidad = $codigo_usuario . '-b-' . $cod_agro;
            $codAV = $codAV + 1;
            $animal->codigo = $codigo_usuario . 'v-' . $codAV;
        }else{
            $animal->codigo_agrocalidad = $codigo_usuario . '-p-' . $cod_agro;  
            $codAP = $codAP + 1;
            $animal->codigo = $codigo_usuario . 'p-' . $codAP;
        }
        $animal->created_at = date("Y-m-d H:i:s.u");                      
        $animal->save();
        for ($j = 1; $j <= 10; $j++) {
            $animalpieza = new AnimalPieza();
            $animalpieza->id_animales = $animal->id;
            $animalpieza->id_ingresos_detalle = $ingresoDetalle->id;
            $cod_pieza_agrocalidad++;
            $cod_p_agro = sprintf('%03s', $cod_pieza_agrocalidad);
            $animalpieza->codigo_agrocalidad = $animal->codigo_agrocalidad . '-' . $cod_p_agro;
            $animalpieza->codigo = $animal->codigo . '-' . $j;
            $animalpieza->created_at = date("Y-m-d H:i:s.u");

            if ($j == 1) {
                $animalpieza->pieza = 'Brazo derecho';
                $animalpieza->estado = 0;
            }
            if ($j == 2) {
                $animalpieza->pieza = 'Brazo izquierdo';
                $animalpieza->estado = 0;
            }
            if ($j == 3) {
                $animalpieza->pieza = 'Pierna derecha';
                $animalpieza->estado = 0;
            }
            if ($j == 4) {
                $animalpieza->pieza = 'Pierna izquierda';
                $animalpieza->estado = 0;
            }
            if ($j == 5) {
                $animalpieza->pieza = 'Viseras';
                $animalpieza->estado = 0;
            }
            if ($j == 6) {
                $animalpieza->pieza = 'Patas';
                $animalpieza->estado = 0;
            }
            if ($j == 7) {
                $animalpieza->pieza = 'Cabeza';
                $animalpieza->estado = 0;
            }
            if ($j == 8) {
                $animalpieza->pieza = 'Piel';
                $animalpieza->estado = 0;
            }
            if ($j == 9) {
                $animalpieza->pieza = 'Lateral derecho';
                $animalpieza->estado = 0;
            }
            if ($j == 10) {
                $animalpieza->pieza = 'Lateral izquierdo';
                $animalpieza->estado = 0;
            }
            $animalpieza->save();
        }
    }
     // return $cod_pieza_agrocalidad  
    }
 

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
