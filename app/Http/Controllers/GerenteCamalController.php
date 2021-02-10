<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\IngresoCamal;
use App\Models\User;
use App\Models\IngresoDetalle;
use App\Models\CabeceraDistribucion;
use App\Models\MatriculaCamal;
use App\Models\DetalleDistribucion;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasTeams;
use App\Models\CostoCamal;
use App\Models\CostoFaenamiento;


class GerenteCamalController extends Controller
{
   
    public function index(Request $request){
     
        // }
   //   try {
        if ($request) {
            $query = trim($request->get('searchT'));
        }
        if ($query != "") {
                 $ingresoscamal=IngresoCamal::with('users')
                  ->whereHas('users', function($q) use ($query)
                 {
                     $q->where('nombres', 'like', '%'.$query.'%')
                    ->orwhere('apellidos', 'like', '%'.$query.'%')
                    ->orwhere('codigo', 'like', '%'.$query.'%');
                 })->orwhere('ingresos.id', 'like', '%'.$query.'%')
                   -> orwhere('ingresos.matricula', 'like', '%'.$query.'%')    
                   ->paginate(10);
        } else {
            $ingresoscamal=IngresoCamal::with('users')  
            ->orderby('ingresos.fecha_ingreso', 'desc')
            ->paginate(10);       
        }
          
           $tablaresumentotal=array();
           $tablaresumentotal[0]= 0;
           $tablaresumentotal[1]= 0;
           $tablaresumentotal[2]= 0;
           $tablaresumentotal[3]= 0;
           $tablaresumentotal[4]= 0;
           $tablaresumentotal[5]= 0;
           $fecha_mes="";
           $fecha_año="";
           $fecha_dia="";
           $totalmatriculas=array();
           $totalmatriculas[0]=0;
           $totalmatriculas[1]=0;
           $totaltransportes=array();
           $totaltransportes[0]=0;
           $totaltransportes[1]=0;
           $totaltransportes[2]=0;
       
      $idCabeceraDistribucion=CabeceraDistribucion::select('id_ingresos')->get();
   //   dd($idCabeceraDistribucion[0]->id_ingresos);
      if($request->get('page')==""){
          $page="";
          return view('gerente.gerente-camal.index', ["ingresoscamal" => $ingresoscamal, "searchT" => $query, "tablaresumentotal" => $tablaresumentotal,'fecha_año'=>$fecha_año,
          'fecha_dia'=>$fecha_dia,'fecha_mes'=>$fecha_mes,'page'=>$page,'idCabeceraDistribucion'=>$idCabeceraDistribucion,'totalmatriculas'=> $totalmatriculas,'totaltransportes'=>$totaltransportes ]);
      }else{
          $page=$request->get('page');
          return view('gerente.gerente-camal.index', ["ingresoscamal" => $ingresoscamal, "searchT" => $query, "tablaresumentotal" => $tablaresumentotal,'fecha_año'=>$fecha_año,
          'fecha_dia'=>$fecha_dia,'fecha_mes'=>$fecha_mes,'page'=>$page,'idCabeceraDistribucion'=>$idCabeceraDistribucion,'totalmatriculas'=> $totalmatriculas,'totaltransportes'=>$totaltransportes ]);
      }
  // return view('usuarios.index', compact('usuarios', 'query'));
    // } catch (\Exception | QueryException $e) {
    //     return back()->withErrors(['exception' => $e->getMessage()]);
    // }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    
        //  try {       
        $fecha_año=$request->get('fecha_año');
        $fecha_ingresoT=trim($request->get('fecha_año_ingreso'));
        if(($fecha_ingresoT=="")){
            return redirect('gerente-camal'); 
        }
        if($fecha_año!=""){
            $fecha_ingresoT=$fecha_año;
        }else{
            $fecha_ingresoT=trim($request->get('fecha_año_ingreso'));
            $fecha_año=$fecha_ingresoT;
        }
        // dd($fecha_ingresoT);
            $año=trim($request->get('año'));
                

            if ($request) {
                    $query = trim($request->get('searchT'));
            }
                ///CONSULTA SIN PAGINATE
                $ingresoscamal=IngresoCamal::with('users')  
                ->orderby('ingresos.fecha_ingreso', 'desc')
                ->whereYear('fecha_ingreso', '=', $fecha_ingresoT)
                ->get(); 
                $matriculas=MatriculaCamal::
                whereYear('fecha_matricula', '=', $fecha_ingresoT)
                ->get(); 
                $transportes=CabeceraDistribucion::
                whereYear('fecha_actual', '=', $fecha_ingresoT)
                ->get(); 
                $totalmatriculas= $this->matriculas($matriculas); 
                $totaltransportes= $this->transportes($transportes); 
                $tablaresumentotal= $this->resumenDatos($ingresoscamal); 
                //CONSULTA CON PAGINATE
                $ingresoscamal=IngresoCamal::with('users')  
                ->orderby('ingresos.fecha_ingreso', 'desc')
                ->whereYear('fecha_ingreso', '=', $fecha_ingresoT)
                ->paginate(10);  

                $fecha_dia="";
                $fecha_mes="";
                $idCabeceraDistribucion=CabeceraDistribucion::select('id_ingresos')->get();
                if($request->get('page')==""){
                    $page="";
                    return view('gerente.gerente-camal.index', ["ingresoscamal" => $ingresoscamal, "searchT" => $query, "tablaresumentotal" => $tablaresumentotal,'fecha_año'=>$fecha_año,'totaltransportes'=>$totaltransportes,
                    'fecha_dia'=>$fecha_dia,'fecha_mes'=>$fecha_mes,'page'=>$page,'idCabeceraDistribucion'=>$idCabeceraDistribucion,'totalmatriculas'=>$totalmatriculas,'totaltransportes'=>$totaltransportes]);
                }else{
                    $page=$request->get('page');
                    return view('gerente.gerente-camal.index', ["ingresoscamal" => $ingresoscamal, "searchT" => $query, "tablaresumentotal" => $tablaresumentotal,'fecha_año'=>$fecha_año,'totaltransportes'=>$totaltransportes,
                    'fecha_dia'=>$fecha_dia,'fecha_mes'=>$fecha_mes,'page'=>$page,'idCabeceraDistribucion'=>$idCabeceraDistribucion,'totalmatriculas'=>$totalmatriculas,'totaltransportes'=>$totaltransportes]);
                }
                
                //  } catch (\Exception $e) {
                //    return back()->withErrors(['exception' => $e->getMessage()])->withInput();
                //}
       
    }
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    }

    public function mes_ingreso(Request $request)
    {
         //  try {
        $fecha_mes=$request->get('fecha_mes');
        $fecha_mesA=trim($request->get('fecha_mes_ingreso'));
    
        if(($fecha_mesA=="")){
            return redirect('gerente-camal'); 
        }
        if($fecha_mes!=""){
            $fecha_mesA=$fecha_mes;
            $fecha_mes=$request->get('fecha_mes');
        }else {
        $fecha_mesA=trim($request->get('fecha_mes_ingreso'));
        $fecha_mes=trim($request->get('fecha_mes_ingreso'));
        }

        $fecha_ingresoT=explode('-',$fecha_mesA);
       
        $mes=$fecha_ingresoT[0];
        $año=$fecha_ingresoT[1];
        
      //  dd($fecha_ingresoT);
       if ($request) {
            $query = trim($request->get('searchT'));
       }
       //Consulta sin pagintae
          $ingresoscamal=IngresoCamal::with('users')  
           ->orderby('ingresos.fecha_ingreso', 'desc')
            ->whereYear('fecha_ingreso', '=', $año)
           ->whereMonth('fecha_ingreso', '=', $mes)
           ->get(); 
           $matriculas=MatriculaCamal::
                whereYear('fecha_matricula', '=', $año)
                ->whereMonth('fecha_matricula','=',$mes)
                ->get(); 
            $transportes=CabeceraDistribucion::
                whereYear('fecha_actual', '=', $año)
                ->whereMonth('fecha_actual','=',$mes)
                ->get(); 
            $totalmatriculas= $this->matriculas($matriculas); 
            $totaltransportes= $this->transportes($transportes);
           $tablaresumentotal= $this->resumenDatos($ingresoscamal); 

           ///Consulta con paginate
           $ingresoscamal=IngresoCamal::with('users')  
          ->orderby('ingresos.fecha_ingreso', 'desc')
           ->whereYear('fecha_ingreso', '=', $año)
          ->whereMonth('fecha_ingreso', '=', $mes)
          ->paginate(10);                         
          $fecha_dia=""; 
          $fecha_año=""; 
          $idCabeceraDistribucion=CabeceraDistribucion::select('id_ingresos')->get();
          if($request->get('page')==""){
            $page="";
            return view('gerente.gerente-camal.index', ["ingresoscamal" => $ingresoscamal, "searchT" => $query, "tablaresumentotal" => $tablaresumentotal,'fecha_año'=>$fecha_año,'fecha_dia'=>$fecha_dia,
            'fecha_mes'=>$fecha_mes,'page'=>$page,'idCabeceraDistribucion'=>$idCabeceraDistribucion,'totaltransportes'=>$totaltransportes,'totalmatriculas'=>$totalmatriculas]);
        }else{
            $page=$request->get('page');
            return view('gerente.gerente-camal.index', ["ingresoscamal" => $ingresoscamal, "searchT" => $query, "tablaresumentotal" => $tablaresumentotal,'fecha_año'=>$fecha_año,
            'fecha_dia'=>$fecha_dia,'fecha_mes'=>$fecha_mes,'page'=>$page,'idCabeceraDistribucion'=>$idCabeceraDistribucion,'totaltransportes'=>$totaltransportes,'totalmatriculas'=>$totalmatriculas]);
        }       
         //  } catch (\Exception $e) {
        //    return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        //}
       
    }

    public function detallesCondicion(Request $request)
    {
        $detalles = IngresoDetalle::where('id_ingresos', $request->get('id_ingreso'))->get();
        $cantidadB=0;
        $cantidadP=0;
        $cantidadA=0;
        foreach($detalles as $d){
            if ($d->id_costo_faenamiento == 1) {
                $cantidadB = $cantidadB + $d->cantidad; 
            }else if($d->id_costo_faenamiento == 2){
                $cantidadP = $cantidadP + $d->cantidad; 
            }      
        }
        $detalles=[$cantidadB,$cantidadP,$cantidadB+$cantidadP];
     
        return response()->json($detalles);
    }
    public function show(Request $request)
    {
      
        $id=trim($request->get('id'));
        $searchT = trim($request->get('searchT'));
       $fecha_mes=$request->get('fecha_mes');
       $fecha_dia=$request->get('fecha_dia');
       $fecha_año=$request->get('fecha_año');
       $page=$request->get('page');
      
            $animalesV= DB::table('ingresos_detalle as id')
                    ->join('ingresos as i','i.id','=','id.id_ingresos')
                   ->join('users as uc','uc.id','=','i.id_users')
                   ->join('animales as a','a.id_ingresos_detalle','=','id.id')
                    ->where('id.id_costo_faenamiento','=',1)
                    ->where('id.id_ingresos',$id)
                   ->select('id.id_costo_faenamiento', 'i.id_users','uc.codigo','a.id','a.peso','a.codigo','a.codigo_agrocalidad')
                   // ->orderby('a.id','asc')
                 //   ->paginate(10);
                 ->get();
    
    
    
              //  dd($animalesV);
           //LEER PORCINO--------------------->
           $animalesP= DB::table('ingresos_detalle as id')
                    ->join('ingresos as i','i.id','=','id.id_ingresos')
                   ->join('users as uc','uc.id','=','i.id_users')
                ->join('animales as a','a.id_ingresos_detalle','=','id.id')
                   // ->where('a.id','=',2)
                    ->where('id.id_costo_faenamiento','=',2)
                    ->where('id.id_ingresos',$id)
                    ->select('id.id_costo_faenamiento', 'i.id_users','uc.codigo','a.id','a.peso','a.codigo','a.codigo_agrocalidad')
                    // ->orderby('a.id','asc')
                  //  ->paginate(10);
                  ->get();
 
       
            return view('gerente.gerente-camal.show', ["animalesV" => $animalesV,"animalesP" => $animalesP,'fecha_mes'=>$fecha_mes,'fecha_dia'=>$fecha_dia,'fecha_año'=>$fecha_año,'page'=>$page,'searchT' => $searchT]);
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        dd('holi');
        $fecha_ingreso=trim($request->get('fecha_ingreso'));
        dd($fecha_ingreso);
    }
    public function dia_ingreso(Request $request)
    {
       
        //  try {   
     $fecha_dia=$request->get('fecha_dia');
     $fecha_ingreso=trim($request->get('fecha_ingreso'));
   
  
     if(($fecha_ingreso=="")){
         return redirect('gerente-camal'); 
     }
    
     if($fecha_dia!=""){
        $fecha_ingreso=$fecha_dia;
        $fecha_dia=$request->get('fecha_dia');
    }else {
    $fecha_ingreso=trim($request->get('fecha_ingreso'));
    $fecha_dia=trim($request->get('fecha_ingreso'));
    }

     if ($request) {
          $query = trim($request->get('searchT'));
     }
    
  //Consulta sin paginate
        $ingresoscamal=IngresoCamal::with('users')  
        ->orderby('ingresos.fecha_ingreso', 'desc')
         ->whereDate('fecha_ingreso', '=', $fecha_ingreso)
         ->get();
         $matriculas=MatriculaCamal::
         whereDate('fecha_matricula','=',$fecha_ingreso)
         ->get(); 
         $transportes=CabeceraDistribucion::
         whereDate('fecha_actual','=',$fecha_ingreso)
         ->get(); 
        $totalmatriculas= $this->matriculas($matriculas); 
        $totaltransportes= $this->transportes($transportes);
         $tablaresumentotal= $this->resumenDatos($ingresoscamal); 
        //Consulta con Paginate
         $ingresoscamal=IngresoCamal::with('users')  
         ->orderby('ingresos.fecha_ingreso', 'desc')
         ->whereDate('fecha_ingreso', '=', $fecha_ingreso)
         ->paginate(10);
         $fecha_mes="";
         $fecha_año="";
         $nomostrar="a";
         $idCabeceraDistribucion=CabeceraDistribucion::select('id_ingresos')->get();
    if($request->get('page')==""){
        $page="";
        return view('gerente.gerente-camal.index', ["ingresoscamal" => $ingresoscamal, "searchT" => $query, "tablaresumentotal" => $tablaresumentotal,'fecha_año'=>$fecha_año,'fecha_dia'=>$fecha_dia,
        'fecha_mes'=>$fecha_mes,'page'=>$page,'idCabeceraDistribucion'=>$idCabeceraDistribucion,'totaltransportes'=>$totaltransportes,'totalmatriculas'=>$totalmatriculas]);
    }else{
        $page=$request->get('page');
        return view('gerente.gerente-camal.index', ["ingresoscamal" => $ingresoscamal, "searchT" => $query, "tablaresumentotal" => $tablaresumentotal,'fecha_año'=>$fecha_año,
        'fecha_dia'=>$fecha_dia,'fecha_mes'=>$fecha_mes,'page'=>$page,'idCabeceraDistribucion'=>$idCabeceraDistribucion,'totaltransportes'=>$totaltransportes,'totalmatriculas'=>$totalmatriculas]);
    }


      //  } catch (\Exception $e) {
      //    return back()->withErrors(['exception' => $e->getMessage()])->withInput();
      //}
    // }else{
    //     $nomostrar="";
    //     return view('gerente.gerente-camal.index', ['nomostrar'=>$nomostrar]);
    // }


    }

    public function resumenDatos($ingresoscamal){
        $totalDineroBobinos=0;
        $totalDineroPorcinos=0;
        $tablaresumentotal=array();
        $tablaresumentotal[0]=0;
        $tablaresumentotal[2]=0;
        foreach($ingresoscamal as $ic){
         $t_animal=explode('_',$ic->t_animal); 
        // dd($t_animal);
         //cantTB,cantTP,cantBH,cantBM,cantPH,cantPM,cantEmergenciaB,cantEmergenciaP
            $tablaresumentotal[0]= $tablaresumentotal[0]+$t_animal[0];  //suma bobinos            
            $tablaresumentotal[2]= $tablaresumentotal[2]+$t_animal[1];//suma porcinos
            $detalles = IngresoDetalle::where('id_ingresos', '=', $ic->id)->get();
            // dd($detalles);
             foreach($detalles as $d){    
                 if($d->id_costo_faenamiento==1){
                     $totalDineroBobinos=$totalDineroBobinos+$d->subtotal;
                 }else if($d->id_costo_faenamiento==2){
                     $totalDineroPorcinos=$totalDineroPorcinos+$d->subtotal;
                 }
             }     
        }
        $tablaresumentotal[1]= $totalDineroBobinos;
        $tablaresumentotal[3]= $totalDineroPorcinos;
        $tablaresumentotal[4]= $tablaresumentotal[0] +$tablaresumentotal[2];//suma animal
        $tablaresumentotal[5]= $totalDineroBobinos+$totalDineroPorcinos;    
        return $tablaresumentotal;
    }
    public function matriculas($matriculas){
        $numeromatriculas=0;
        $a=array();
        $a[1]=0;
        foreach($matriculas as $ic){
            $a[1]=$a[1]+$ic->costo_matricula; 
            $numeromatriculas++; 
        }
        $a[0]=$numeromatriculas;
        return $a;
    }
    public function transportes($transportes){
        $totalsincosto=0;
        $totalconcosto=0;
        $tabla=array();
        $tabla[0]=0;
        $tabla[1]=0;
        foreach($transportes as $ic){
            if($ic->costo_transporte==0.00){
                $totalsincosto++;   
            }else{
                $tabla[1]=$tabla[1]+$ic->costo_transporte;
                $totalconcosto++; 
            }
        }
        $tabla[0]=$totalsincosto;
        $tabla[2]=$totalconcosto;


        return $tabla;
    }

    public function detallesDistribucion(Request $request,$id_ingresos)
    {
       //  try {
       $searchT = trim($request->get('searchT'));
       $fecha_mes=$request->get('fecha_mes');
       $fecha_dia=$request->get('fecha_dia');
       $fecha_año=$request->get('fecha_año');
       $page=$request->get('page');
    
        $id_cabDistribucion=$request->get('id_cabDistribucion');
      
        $cantidadBrazosV=0;
        $cantidadPiernasV=0; 
        $cantidadVicerasV=0;
        $cantidadPatasV=0;
        $cantidadCabezasV=0;
        $cantidadPielV=0;  
        $cantidadBrazosP=0;
        $cantidadPiernasP=0;  
        $cantidadVicerasP=0;
        $cantidadPatasP=0;
        $cantidadCabezasP=0;
        $cantidadPielP=0;  
        $cantidad=array();
        //para rellenar el select de la vista
        if($id_ingresos){
             //para rellenar el select de la vista
            $ingresosDistribucion=CabeceraDistribucion::with('distribuciones')
            ->where('id_ingresos','=',$id_ingresos)->get();
            if($request->get('id_cabDistribucion')){
                $id_cdistribucion=$id_cabDistribucion;
                $distribucionA = CabeceraDistribucion::findOrFail($id_cabDistribucion);
                //distribuciones segun id cabecera
                $distribucion=DetalleDistribucion::with('cabeceraDistribucion')
                    ->where('id_cabecera_distribucion',$id_cabDistribucion)->get();
            foreach($distribucion as $d)
                {
                    $codigo=$d->codigo_animal_pieza;  
                    $especie=$d->especie;
                    $producto=$d->producto;
                   //Cuarta columna: '1,2-v-'.$id_cdistribucion => idpieza,idpieza-especie-id_cdistribucion
                    if($especie=='Bovino')
                    {
                            $cod=explode('-',$codigo);
                         
                           if($cod[2]==1 || $cod[2]==2)
                           {        
                            $cantidadBrazosV++;
                            $cantidad[0]=['Bovino','Brazos',$cantidadBrazosV,'1,2-v-'.$id_cdistribucion];
                           } 
                            else if($cod[2]==3 || $cod[2]==4)
                            {
                              $cantidadPiernasV++;   
                              $cantidad[1]=['Bovino','Piernas',$cantidadPiernasV,'3,4-v-'.$id_cdistribucion]; 
                            }
                            else if($cod[2]==5)
                            {
                               $cantidadVicerasV++;   
                               $cantidad[2]= ['Bovino','Viceras',$cantidadVicerasV,'5-v-'.$id_cdistribucion]; 
                            }
                            else if($cod[2]==6)
                            {
                              $cantidadPatasV++;
                              $cantidad[3]= ['Bovino','Patas',$cantidadPatasV,'6-v-'.$id_cdistribucion];  
                            }
                            else if($cod[2]==7)
                            {
                              $cantidadCabezasV++;  
                              $cantidad[4]=['Bivino','Cabezas',$cantidadCabezasV,'7-v-'.$id_cdistribucion];
                            }
                            else if($cod[2]==8)
                            {
                              $cantidadPielV++;  
                              $cantidad[5]=['Bovino','Piel', $cantidadPielV,'8-v-'.$id_cdistribucion]; 
                            } 
                    } 
                    if($especie=='Porcino' )
                    {
                            $cod=explode('-',$codigo);
                            if($cod[2]==1 || $cod[2]==2)
                            { 
                                $cantidadBrazosP++;
                                $cantidad[6]=['Porcino','Brazos', $cantidadBrazosP,'1,2-p-'.$id_cdistribucion]; 
                            }else if($cod[2]==3 || $cod[2]==4)
                            {  
                               $cantidadPiernasP++; 
                               $cantidad[7]=['Porcino','Piernas', $cantidadPiernasP,'3,4-p-'.$id_cdistribucion];  
                            }else if($cod[2]==5)
                            { 
                               $cantidadVicerasP++;  
                               $cantidad[8]=['Porcino','Viceras',  $cantidadVicerasP,'5-p-'.$id_cdistribucion];
                            }
                            else if($cod[2]==6)
                            {    
                               $cantidadPatasP++;   
                               $cantidad[9]=['Porcino','Patas', $cantidadPatasP,'6-p-'.$id_cdistribucion];
                            }
                            else if($cod[2]==7)
                            {    
                                $cantidadCabezasP++; 
                                $cantidad[10]=['Porcino','Cabeza', $cantidadCabezasP,'7-p-'.$id_cdistribucion];
                            }
                            else if($cod[2]==8)
                            {
                                $cantidadPielP++;   
                                $cantidad[11]=['Porcino','Piel',$cantidadPielP,'8-p-'.$id_cdistribucion]; 
                            }
                        // }
                    }
                 }
            return view('gerente.gerente-camal.detallesDistribucion', ['cantidad'=>$cantidad,'distribucionA'=>$distribucionA,'distribucion'=>$distribucion,'ingresosDistribucion'=>$ingresosDistribucion,'id_cabDistribucion'=>$id_cabDistribucion,'fecha_mes'=>$fecha_mes,'fecha_dia'=>$fecha_dia,'fecha_año'=>$fecha_año,'page'=>$page,'searchT' => $searchT]);
    
                }else{
                    $id_cabDistribucion='';
                    
        return view('gerente.gerente-camal.detallesDistribucion', ['ingresosDistribucion'=>$ingresosDistribucion,'id_cabDistribucion'=>$id_cabDistribucion,'fecha_mes'=>$fecha_mes,'fecha_dia'=>$fecha_dia,'fecha_año'=>$fecha_año,'page'=>$page,'searchT' => $searchT]);
                }
            }else{
                $id_ingresos="";
                return view('gerente.gerente-camal.detallesDistribucion',['page'=>$page,'id_ingresos'=>$id_ingresos,'searchT' => $searchT]);
            }

      
    // } catch (\Exception $e) {
    //         return back()->withErrors(['exception' => $e->getMessage()])->withInput();
    //     }
    }
    public function costo_camal(Request $request)
    {
        $costoFaenamiento=CostoFaenamiento::all();
        $costoCamal=CostoCamal::all();
        return view('gerente.gerente-camal.costoCamal', ['costoFaenamiento'=>$costoFaenamiento,'costoCamal'=>$costoCamal]);
    }
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
