<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\AnimalPieza;
use App\Models\IngresoCamal;
use App\Http\Requests;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Database\Eloquent\Model;
use DB;
use URL;
use Illuminate\Http\Request;

class AnimalController extends Controller
{

    public function index(Request $request)
    {
         //   try {
            $query = trim($request->get('searchT'));
            
          //  dd(url()->current());
            /* if ($request) {
                
            }
            if ($query != "") {
                     $ingresoscamal=IngresoCamal::join('users','id_users','=','users.id')  
                     ->select('users.codigo', 'users.direccion', 'users.telefono', 'users.cedula', 'users.nombres','users.apellidos','ingresos.fecha_ingreso',
                     'ingresos.costo_total', 'ingresos.id_users','ingresos.id', 'ingresos.medio_movilizacion', 'ingresos.placa_transporte',
                     'ingresos.condicion_transporte', 'ingresos.observaciones','ingresos.csmi', 'ingresos.fecha_faenamiento', 'ingresos.responsable_recepcion', 
                 )        
                    ->orwhere([['ingresos.estado',0],['ingresos.estado',1]])
                    ->orwhere(function (Builder $querybuilder) use ($query) {
                         return $querybuilder->where('nombres', 'LIKE', '%' . $query . '%')
                             ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
                             ->orWhere('codigo', 'LIKE', '%' . $query . '%') ;
                     })
                     ->paginate(10);

               
            } else { */
                $ingresoscamal=IngresoCamal::with('users')
                ->orwhere('ingresos.estado',0)->orwhere('ingresos.estado',1)
                ->orderby('ingresos.fecha_ingreso', 'asc')
                ->paginate(10);
                    $searchT="";
          //  }    
        
        return view('camal.faenador-camal.index', ["ingresoscamal" => $ingresoscamal,"searchT"=>$query]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
       
    }


    public function store(Request $request)
    {
        $pesos=$request->get('pesos'); // array peso
        $id=$request->get('id'); //array id de piezas
        $codigo=$request->get('codigo'); //array de codigo de piezas
        $idp=$request->get('idp'); // es el ID de lateral derecho e izquierdo 
        $peso_animal=$request->get('peso_animal');//peso del animal
        $id_animal=$request->get('id_animal');//peso del animal
        $codigo_animal=$request->get('codigo_animal');//peso del animal
        $id_ingresos=$request->get('id_ingresos');
        $ultimo_animal=$request->get('ultimo_animal'); 

  //  dd($pesos,$id,$codigo,$idp,$id_ingresos,$ultimo_animal);
        $cont=0;

        $animalpie = AnimalPieza::where('id_animales',$id_animal)->get();
         foreach($animalpie as $ap)  {
            $animalpieza = AnimalPieza::findOrFail($ap->id);
           if($ap->id==$idp[$cont]){
            $animalpieza->peso=$pesos[$cont];
            $cont++;
            }
            $animalpieza->estado=1;
            $animalpieza->update();        
       }
   
            $animal = Animal::findOrFail($id_animal);
            $animal->peso=$peso_animal;
            $animal->estado=1;
            $animal->update();

            $ingreso = IngresoCamal::findOrFail($id_ingresos);
            $ingreso->estado=1;
            $ingreso->update();

            if($ultimo_animal==1){ 
                    /*  info($ultimo_animal); */
                $ingreso = IngresoCamal::findOrFail($id_ingresos);
                $ingreso->estado=2;
                $ingreso->update();
                return redirect('/animal-camal')->with('success', 'Se tomó el peso de todas las piezas del animal');
            }                                    
        return redirect('/animal-camal/show?id='.$id_ingresos.'')->with('success', 'Enviado a cuarto frio');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {  
   try {
    if (URL::previous() == URL::route('animal-camal.index')){
        $request->session()->put('previ',URL::previous()); 
    }
   // dd(url()->current(),url()->previous(),url()->full());
       $id=trim($request->get('id'));
      
       //LEER VACUNO--------------------->
        $animalesV= DB::table('ingresos_detalle as id')
                ->join('ingresos as i','i.id','=','id.id_ingresos')
                ->join('users as uc','uc.id','=','i.id_users')
                ->join('animales as a','a.id_ingresos_detalle','=','id.id')
                ->where('id.id_costo_faenamiento','=',1)
                ->where('a.estado','=',0)
                ->where('id.id_ingresos',$id)
                ->select('id.id_costo_faenamiento', 'i.id_users','uc.codigo','a.id','a.peso','a.codigo','a.codigo_agrocalidad','a.estado','id.id_ingresos')
                ->orderby('a.id','asc')
                ->paginate(10);
              // dd($animalesV);
            $animalesP= DB::table('ingresos_detalle as id')
              ->join('ingresos as i','i.id','=','id.id_ingresos')
              ->join('users as uc','uc.id','=','i.id_users')
              ->join('animales as a','a.id_ingresos_detalle','=','id.id')
              ->where('id.id_costo_faenamiento','=',2)
              ->where('a.estado','=',0)
              ->where('id.id_ingresos',$id)
              ->select('id.id_costo_faenamiento', 'i.id_users','uc.codigo','a.codigo_agrocalidad','a.id','a.peso','a.codigo','id.id_ingresos')
              ->orderby('a.id','asc')
              ->paginate(10);
             $animalesP->withPath('animal-camal-porcino?id='.$id);      
              $animalesV->withPath('show?id='.$id);
         if((count($animalesP)==0)||(count($animalesV)!=0 && count($animalesP)!=0)){ 
            return view('camal.faenador-camal.show', ["animalesV" => $animalesV,"id"=>$id,'animalesP'=>$animalesP]);
         }  else {  
            return redirect('animal-camal-porcino?id='.$id);
        }  
 
       
        } catch (\Exception $e) {
           return back()->withErrors(['exception' => $e->getMessage()])->withInput();
     }
    }

    public function piezas(Request $request)
    {
      
        $piezas_1 = AnimalPieza::where('id_animales', $request->get('id'))
        ->select('id','codigo','pieza','peso','peso_salida','codigo_agrocalidad')->orderby('id','asc')->get();

         $piezas=array();
         $i=0;
         foreach($piezas_1 as $p){
           $codigo=$p->codigo;
           $co=explode('-',$codigo);

           if($co[2]== 9 ||$co[2]== 10 ){
           $piezas[$i]=[
               'codigo_agrocalidad'=>$p->codigo_agrocalidad,
               'id'=>$p->id,
               'codigo'=>$p->codigo,
                'pieza'=>$p->pieza,
                'peso'=>$p->peso,
              //  'peso_salida'=>$p->peso_salida
            ];
            $i++;
           }
         } 
        return response()->json($piezas);
    }
    public function piezas_a(Request $request)
    {
     //   $identificador_rol_cliente= $request->get('identificador_rol_cliente');
       // info($identificador_rol_cliente);
        $piezas_1 = AnimalPieza::where('id_animales', $request->get('id'))
        ->select('id','codigo','pieza','peso','peso_salida','codigo_agrocalidad')->orderby('id','asc')->get();

         $piezas=array();
         $i=0;
        /*  foreach($piezas_1 as $p){
           $codigo=$p->codigo;
           $co=explode('-',$codigo);

           if($identificador_rol_cliente=="si"){
            if($co[2]== 1 ||$co[2]== 2 || $co[2]== 3 ||$co[2]== 4 ){
                $piezas[$i]=[
                    'codigo_agrocalidad'=>$p->codigo_agrocalidad,
                    'id'=>$p->id,
                    'codigo'=>$p->codigo,
                     'pieza'=>$p->pieza,
                     'peso'=>$p->peso
                    // 'peso'=>$p->peso_salida
                 ];
                 $i++;

               }
           }
       //    info($piezas);
         }  */
        return response()->json($piezas_1);
    }
    public function ulltimo_animal_sin_peso(Request $request)
    {
        $animales= DB::table('animales as a')
        ->join('ingresos_detalle as id','a.id_ingresos_detalle','=','id.id')
        ->where('id.id_ingresos', $request->get('id_ingresos'))
        ->select('a.estado')
        ->get();
        $cont=0;
        $c=0;
        foreach($animales as $a){
            $estado= $a->estado;
            if($estado==0){
                $c++;
            }
        }
      //  info($c);
            
        return response()->json($c);
    }
    public function edit($id)
    {
        //
    }


    public function update(Request $request)
    {
        $a=$request->get('pesos');
        dd($a);
    }


    public function destroy($id)
    {
        //
    }
}
