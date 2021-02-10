<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CabeceraDistribucion;
use App\Models\DetalleDistribucion;
use Illuminate\Database\Eloquent\Builder;
use DB;

class ClienteCamalController extends Controller
{

    public function index()
    {
      //  dd($id = Auth::id(),$user = Auth::user());
        $id_usuario = Auth::id();
        //--------------------Bovino----------------------------------------------------->
        $cont=array();
        $cont[1]=1;
         $cont[2]=2;
         $cantidad_piezas=array();
         $k=1;
  // info('u='.$id_usuario);
        while($k<=count($cont)){
           // info($cont[$k]);
            $stockCuartoF = DB::table('users as u')
            ->join('ingresos as i', 'i.id_users', '=', 'u.id')
            ->join('ingresos_detalle as id', 'id.id_ingresos', '=', 'i.id')
            ->join('animales as a', 'a.id_ingresos_detalle', '=', 'id.id')
            ->join('animales_piezas as ap', 'ap.id_animales', '=', 'a.id') 
            ->where('id.id_costo_faenamiento','=',$cont[$k])
            ->where('u.id','=',$id_usuario)->where('ap.estado','=',1)
             ->select('id_ingresos','id.id_costo_faenamiento','ap.codigo','ap.pieza','ap.peso','ap.estado')  
            ->get();
            
            $cantidadLateralDerecho=0;
            $cantidadLateralIzquierdo=0;
            $cantidadViceras=0;
            $cantidadPatas=0;
            $cantidadCabezas=0;
            $cantidadPiel=0;
          
          // info($stockCuartoF);
            foreach($stockCuartoF as $scf)
                {
                    $cod=explode('-',$scf->codigo);
                    if($cod[2]==9){ $cantidadLateralDerecho++;
                    }else if($cod[2]==10){ $cantidadLateralIzquierdo++;   
                    }else if($cod[2]==5){ $cantidadViceras++;   
                    }else if($cod[2]==6){ $cantidadPatas++;   
                    }else if($cod[2]==7){ $cantidadCabezas++;   
                    }else if($cod[2]==8){ $cantidadPiel++;   
                    }
                }
                 $cantidad_piezas[$k]=//en la posicion 1=> S Bovinos; pos 2=>Porcino
                   [$cantidadLateralDerecho, $cantidadLateralIzquierdo, $cantidadViceras,
                   $cantidadPatas, $cantidadCabezas,$cantidadPiel ];
             //   $cantidad_pieza;
           $k++;
        }  
      //  dd($stockCuartoF );
        $cantidad_piezas[0]=['9', '10','5','6', '7','8']; 
        $cantidad_piezas[3]=['Lateral derecho', 'Lateral izquierdo','Viceras','Patas', 'Cabezas','Piel'];
        $cantidad_piezas[4]=['d-1', 'i-1', 'v-1', 'a-1','c-1', 'e-1']; 
        $cantidad_piezas[5]= ['d-2', 'i-2', 'v-2', 'a-2', 'c-2', 'e-2'];        
    
       // dd($cantidad_piezas);

        return view('camal.cliente-camal.index', ['cantidad_piezas'=>$cantidad_piezas]);
    }
        public function piezas_pesos(Request $request)
    {
        $id_usuario = Auth::id();
        $tipopieza=$request->get('tipopieza');
       // info($request->get('tipopieza'));
        $tpieza=explode('-',$tipopieza);
        $pieza=$tpieza[0];
        $especie=$tpieza[1];
        
            $stockCuartoF = DB::table('users as u')
            ->join('ingresos as i', 'i.id_users', '=', 'u.id')
            ->join('ingresos_detalle as id', 'id.id_ingresos', '=', 'i.id')
            ->join('animales as a', 'a.id_ingresos_detalle', '=', 'id.id')
            ->join('animales_piezas as ap', 'ap.id_animales', '=', 'a.id')
            ->select('id_ingresos','id.id_costo_faenamiento','ap.codigo_agrocalidad','ap.codigo','ap.pieza','ap.peso','ap.estado')  
            ->where('id.id_costo_faenamiento','=',$especie)
            ->where('u.id','=',$id_usuario)
          //  ->where('a.estado','=',1)
            ->where('ap.estado','=',1)
            ->get();
           /*  $LateralDerecho= array();
            $Piernas = array(); */
          /*   $cantidadBrazos=0;
            $cantidadPiernas=0; */
        // $codigo="";
            //$cod="";
            $i=0;
            $j=0;
            $piezas_pes=array();    

        foreach($stockCuartoF as $scf){
          //  $codigo=$scf->codigo;
            $cod=explode('-',$scf->codigo);
             //  dd($cod[2]);
           //  info($scf->codigo);
            // info($pieza);
            // info($cod[2]);
             
             if($pieza=="d"){
                if($cod[2]==9){
                 //   $cantidadBrazos++;
                    $piezas_pes[$i]=
                                [                  
                                    'codigo_pieza'=>$scf->codigo_agrocalidad,
                                    'pieza'=>$scf->pieza,
                                    'peso'=>$scf->peso,              
                                ];
                            $i++;
                }
            }else if($pieza=="i"){
            // info('holaa');
                if($cod[2]==10){
                  //  $cantidadPiernas++;
                  $piezas_pes[$j]=[                  
                        'codigo_pieza'=>$scf->codigo_agrocalidad,
                        'pieza'=>$scf->pieza,
                        'peso'=>$scf->peso,              
                ];
                $j++;
           // dd($BrazosV[0]['codigo_pieza']);
             }
            }else if($pieza=="v"){
             
                if($cod[2]==5){
                  //  $cantidadPiernas++;
                  $piezas_pes[$j]=[                  
                        'codigo_pieza'=>$scf->codigo_agrocalidad,
                        'pieza'=>$scf->pieza,
                        'peso'=>$scf->peso,              
                ];
                $j++;
           // dd($BrazosV[0]['codigo_pieza']);
             }
            }
            else if($pieza=="a"){
             
                if($cod[2]==6){
                  //  $cantidadPiernas++;
                  $piezas_pes[$j]=[                  
                        'codigo_pieza'=>$scf->codigo_agrocalidad,
                        'pieza'=>$scf->pieza,
                        'peso'=>$scf->peso,              
                ];
                $j++;
           // dd($BrazosV[0]['codigo_pieza']);
             }
            }else if($pieza=="c"){
             
                if($cod[2]==7){
                  //  $cantidadPiernas++;
                  $piezas_pes[$j]=[                  
                        'codigo_pieza'=>$scf->codigo_agrocalidad,
                        'pieza'=>$scf->pieza,
                        'peso'=>$scf->peso,              
                ];
                $j++;
           // dd($BrazosV[0]['codigo_pieza']);
             }
            }else if($pieza=="e"){
             
                if($cod[2]==8){
                  //  $cantidadPiernas++;
                  $piezas_pes[$j]=[                  
                        'codigo_pieza'=>$scf->codigo_agrocalidad,
                        'pieza'=>$scf->pieza,
                        'peso'=>$scf->peso,              
                ];
                $j++;
           // dd($BrazosV[0]['codigo_pieza']);
             }
            }
          //  info($piezas_pes);

            }
      
        return response()->json($piezas_pes);
    }
    public function piezas_pesos_HistotialEntrega_detalle(Request $request)
    {
        $id_ingresos =$request->get('id_ingresos');
        $tipopieza=$request->get('tipopieza');//id piezas,especie,idcabdistribuci
        $tpieza=explode('-',$tipopieza); 
        $pieza=$tpieza[0];// 3,4
        if($tpieza[1]=='v'){
            $especie=1;
        }else if($tpieza[1]=='p'){
            $especie=2;
        }
        $id_cad=$tpieza[2];
        $g=0;
        $distribucion=DetalleDistribucion::where('id_cabecera_distribucion', $tpieza[2])->get();
        $codigo_pieza =array();
      //  info($distribucion);
        //Extraer códgio de la tabla distribucion para comparar después jeje
        foreach($distribucion as $di){
            $codigo_dis=$di->codigo_animal_pieza;  
            $cod_dis_pieza=explode('-',$codigo_dis);
            if(strpos($codigo_dis, $tpieza[1])){
                if(strlen($tpieza[0])>1){
                    $cod_pieza=explode(',',$tpieza[0]);
                    if($cod_dis_pieza[2]==$cod_pieza[0] ||$cod_dis_pieza[2]==$cod_pieza[1]){
                        $codigo_pieza[$g]=$codigo_dis;
                        $g++;
                        }
                }else if($cod_dis_pieza[2]==$tpieza[0]){
                        $codigo_pieza[$g]=$codigo_dis;
                        $g++;
                    }
            }           
        }
      //  Comparando el array de código con la tabla de animales piezas
      //  info($codigo_pieza);
            $stockCuartoF = DB::table('users as u')
            ->join('ingresos as i', 'i.id_users', '=', 'u.id')
            ->join('ingresos_detalle as id', 'id.id_ingresos', '=', 'i.id')
            ->join('animales as a', 'a.id_ingresos_detalle', '=', 'id.id')
            ->join('animales_piezas as ap', 'ap.id_animales', '=', 'a.id')
            ->select('id_ingresos','id.id_costo_faenamiento','ap.codigo_agrocalidad','ap.codigo','ap.pieza','ap.peso','ap.estado','ap.peso_salida')
            ->where('id.id_costo_faenamiento','=',$especie)
            ->where('i.id','=',$id_ingresos)
            ->where('ap.estado','=',2)
            ->get();
            $Brazos = array();
            $Piernas = array();
            $cantidadBrazos=0;
            $cantidadPiernas=0;
            $i=0;
            $j=0;
            $h=0;
      //  info($stockCuartoF);
            $piezas_pes=array();    
        while($h<count($codigo_pieza)){
           // info($codigo_pieza[$h]);
            foreach($stockCuartoF as $scf){
                $codigoA=$scf->codigo;
            //    info($codigoA);
                if( $codigo_pieza[$h]==$codigoA){
                    $piezas_pes[$i]=
                                            [                  
                                                'codigo_pieza'=>$scf->codigo_agrocalidad,
                                                'pieza'=>$scf->pieza,
                                              'peso'=>$scf->peso,   
                                           //     'peso'=>$scf->peso_salida            
                                            ];
                                        $i++;
                          }
                }
                $h++;
            }
     //   info($piezas_pes); 
        return response()->json($piezas_pes);
    }

    public function historial_entrega(Request $request){
        $id_usuario = Auth::id();
        if ($request) {
            $searchT = trim($request->get('searchT'));
        
        }
        if ($searchT != "") {

            
            $distribucion = CabeceraDistribucion::join('ingresos','id_ingresos','=','ingresos.id')
            ->select('cabecera_distribucion.id','ingresos.id_users','cabecera_distribucion.fecha_actual','cabecera_distribucion.nombre_destinatario','cabecera_distribucion.lugar_destino','cabecera_distribucion.placa_transporte','cabecera_distribucion.id_ingresos')
            ->where('ingresos.id_users', $id_usuario)
            ->where(function($query) use ($searchT){
                $query->where('cabecera_distribucion.id', 'LIKE', '%'.$searchT.'%')
                ->orWhere('cabecera_distribucion.nombre_destinatario', 'LIKE', '%'.$searchT.'%')
                ->orWhere('cabecera_distribucion.lugar_destino', 'LIKE', '%'.$searchT.'%')
                ->orWhere('cabecera_distribucion.placa_transporte', 'LIKE', '%'.$searchT.'%')
                ->orWhere('cabecera_distribucion.id_ingresos', 'LIKE', '%'.$searchT.'%');
             })->orderby('fecha_actual','desc')->paginate(10);  
        } else{
            $distribucion = CabeceraDistribucion::join('ingresos','id_ingresos','=','ingresos.id')
            ->select('cabecera_distribucion.id','ingresos.id_users','cabecera_distribucion.fecha_actual','cabecera_distribucion.nombre_destinatario','cabecera_distribucion.lugar_destino',
            'cabecera_distribucion.placa_transporte','cabecera_distribucion.id_ingresos','costo_transporte')
            ->where('ingresos.id_users', $id_usuario)
            ->orderby('fecha_actual','desc')->paginate(10);  
       // ->join('detalle_distribucion as dd','dd.id_cabecera_distribucion','cd.id') 
     

        }

 //   dd($distribucion);

        return view('camal.cliente-camal.historial_entrega',['distribucion'=>$distribucion,'searchT'=>$searchT]);
    }

    public function piezas_distribucion(Request $request)
    {
        $id_cdistribucion=$request->get('id_cdistribucion');
        $distribucion=DB::table('cabecera_distribucion as cd')
        ->join('detalle_distribucion as dd','dd.id_cabecera_distribucion','cd.id') 
        ->where('cd.id','=', $id_cdistribucion)
        ->select('dd.codigo_animal_pieza','especie','producto')
        ->get();

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

        foreach($distribucion as $d)
                {
                  $codigo=$d->codigo_animal_pieza;  
                    $especie=$d->especie;
                    $producto=$d->producto;
                  //  info($especie);
                   // info($producto);
                    

                    if($especie=='Bovino')
                    {
                        // if($producto =='Brazo derecho' || $producto=='Brazo izquierdo'||$producto =='Pierna izquierda' || $producto=='Pierna derecha'
                        //  || $producto =='Brazo' || $producto =='Pierna')
                        // {
                            $cod=explode('-',$codigo);
                         //   info($cod);
                           if($cod[2]==1 || $cod[2]==2)
                           {        
                            $cantidadBrazosV++;
                           }
                            else if($cod[2]==3 || $cod[2]==4)
                            {
            
                                $cantidadPiernasV++;   
                            }
                            else if($cod[2]==5)
                            {
            
                                $cantidadVicerasV++;   
                            }
                            else if($cod[2]==6)
                            {
            
                                $cantidadPatasV++;   
                            }
                            else if($cod[2]==7)
                            {
            
                                $cantidadCabezasV++;   
                            }
                            else if($cod[2]==8)
                            {
            
                                $cantidadPielV++;   
                            }
                     //   }
                    } 
                    if($especie=='Porcino' )
                    {
                        
                            $cod=explode('-',$codigo);
                            if($cod[2]==1 || $cod[2]==2)
                            {
        
                                $cantidadBrazosP++;
                            }else if($cod[2]==3 || $cod[2]==4)
                            {
        
                                $cantidadPiernasP++;   
                            }else if($cod[2]==5)
                            {
            
                                $cantidadVicerasP++;   
                            }
                            else if($cod[2]==6)
                            {
            
                                $cantidadPatasP++;   
                            }
                            else if($cod[2]==7)
                            {
            
                                $cantidadCabezasP++;   
                            }
                            else if($cod[2]==8)
                            {
            
                                $cantidadPielP++;   
                            }
                        // }
                    }
                 }


     //   info($distribucion);
        $pesos=array();
        
            $pesos[0]=[$cantidadBrazosV,$cantidadPiernasV,
            $cantidadVicerasV,
            $cantidadPatasV,
            $cantidadCabezasV,
            $cantidadPielV  ];
            $pesos[1]=[$cantidadBrazosP,$cantidadPiernasP,
            $cantidadVicerasP,
            $cantidadPatasP,
            $cantidadCabezasP,
            $cantidadPielP ];
            $pesos[3]=
                   ['Brazos',
                   'Piernas',
                   'Viceras',
                   'Patas',
                   'Cabezas',
                   'Piel'   
                ];

        
        return response()->json($pesos);
    }
   
    public function historial_entrega_detalles(Request $request){
        
        $id_cdistribucion=$request->get('id');
        $distribucionA = CabeceraDistribucion::findOrFail($id_cdistribucion);

        $distribucion=DB::table('cabecera_distribucion as cd')
        ->join('ingresos as i','i.id','=','cd.id_ingresos') 
        ->join('detalle_distribucion as dd','dd.id_cabecera_distribucion','cd.id') 
        ->where('dd.id_cabecera_distribucion','=', $id_cdistribucion)
      //  ->select('dd.codigo_animal_pieza','especie','producto')
        ->get();
        
 //  dd($distribucion[0]->fecha_actual);
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
        foreach($distribucion as $d)
                {
                  $codigo=$d->codigo_animal_pieza;  
                    $especie=$d->especie;
                    $producto=$d->producto;
                 //   info($especie);
                  //  info($producto);
                    
                  //Cuarta columna: '1,2-v-'.$id_cdistribucion => idpieza,idpieza-especie-id_cdistribucion

                    if($especie=='Bovino')
                    {
                            $cod=explode('-',$codigo);
                         //   info($cod);
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
                                $cantidad[4]=['Bovino','Cabezas',$cantidadCabezasV,'7-v-'.$id_cdistribucion];
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
            //     dd($cantidad);


        
        return view('camal.cliente-camal.historial_entrega_detalles', ['cantidad'=>$cantidad,'distribucionA'=>$distribucionA,'distribucion'=>$distribucion ]);
    
                }

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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        return redirect('/cliente-camal/historialEntrega')->with('success', 'Enviado a cuarto frio');
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
