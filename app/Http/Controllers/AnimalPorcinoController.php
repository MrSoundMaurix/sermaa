<?php

namespace App\Http\Controllers;
use App\Models\Animal;
use App\Models\AnimalPieza;
use App\Models\IngresoCamal;
use Illuminate\Database\Eloquent\Model;
use DB;
use URL;
use Illuminate\Http\Request;

class AnimalPorcinoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
      //  dd('llego');
      if (URL::previous() == URL::route('animal-camal.index')){
        $request->session()->put('previ',URL::previous()); 
    }
        $id=trim($request->get('id'));
       // $urls=trim($request->get('urls'));

           //  dd($animalesV);
        //LEER PORCINO--------------------->
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
        // dd($animalesP);
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
  
         return view('camal.faenador-camal.show1', ["animalesP" => $animalesP,"id"=>$id,"animalesV" => $animalesV]);
       
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
              return redirect('/animal-camal-porcino?id='.$id_ingresos.'')->with('success', 'Enviado a cuarto frio');
      
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
