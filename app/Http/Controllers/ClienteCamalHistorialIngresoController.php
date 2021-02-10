<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\CabeceraDistribucion;
use App\Models\IngresoCamal;
use Illuminate\Database\Eloquent\Builder;
use DB;

class ClienteCamalHistorialIngresoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function index()
    // {
    //     //
    // }
    public function index(Request $request){
        if ($request) {
            $query = trim($request->get('searchT'));
        }
        if ($query != "") {
            $ingresoscamal=IngresoCamal::join('users','id_users','=','users.id')  
            ->select('users.codigo', 'users.direccion', 'users.telefono', 'users.cedula', 'users.nombres','users.apellidos','ingresos.fecha_ingreso',
            'ingresos.costo_total', 'ingresos.id_users','ingresos.id', 'ingresos.medio_movilizacion', 'ingresos.placa_transporte', 'ingresos.fecha_faenamiento',
            'ingresos.condicion_transporte', 'ingresos.observaciones','ingresos.csmi', 'ingresos.fecha_faenamiento', 'ingresos.responsable_recepcion_datos'
            ,'ingresos.matricula','ingresos.lugar_procedencia'
        )
        ->where('ingresos.id_users','=',Auth::id())
        ->where(function (Builder $querybuilder) use (&$query) {
            return $querybuilder->orwhere('nombres', 'LIKE', '%' . $query . '%')
                ->orWhere('responsable_recepcion_datos', 'LIKE', '%' . $query . '%')
               // ->orWhere('matricula', 'LIKE', '%' . $query . '%')
                ->orWhere('ingresos.id', 'LIKE', '%' . $query . '%');
               //  ->orWhere('codigo', 'LIKE', '%' . $query . '%');
             //    ->orwhere('ingresos.estado','=',1)->orwhere('ingresos.estado','=',2)
              //   ->orwhere('ingresos.estado','=',3)->orwhere('ingresos.estado','=',4);
        }) ->orderby('fecha_ingreso', 'desc')
        ->paginate(10);
} else {
    $ingresoscamal=IngresoCamal::join('users','id_users','=','users.id')  
          
            ->where('ingresos.id_users','=',Auth::id())
            ->select('users.codigo', 'users.direccion', 'users.telefono', 'users.cedula', 'users.nombres','users.apellidos','ingresos.fecha_ingreso',
            'ingresos.costo_total', 'ingresos.id_users','ingresos.id', 'ingresos.medio_movilizacion', 'ingresos.placa_transporte','ingresos.matricula',
            'ingresos.condicion_transporte', 'ingresos.observaciones','ingresos.csmi', 'ingresos.fecha_faenamiento', 'ingresos.responsable_recepcion_datos', 
            'ingresos.lugar_procedencia'
        )     ->where(function (Builder $querybuilder) use (&$query) {
          //  return $querybuilder->orwhere('ingresos.estado','=',1)->orwhere('ingresos.estado','=',2)
          //  ->orwhere('ingresos.estado','=',3)->orwhere('ingresos.estado','=',4);
        })
         ->orderby('fecha_ingreso', 'desc')->paginate(10);

}
     //->get();
      // dd($ingresoscamal);
 
        return view('camal.cliente-camal.historialIngreso', ["ingresoscamal" => $ingresoscamal,'searchT'=>$query]);
    
        }
    
        public function show(Request $request)
        {  
           $id=trim($request->get('id'));
      
            $animalesV= DB::table('ingresos_detalle as id')
                    ->join('ingresos as i','i.id','=','id.id_ingresos')
                    ->join('users as uc','uc.id','=','i.id_users')
                    ->join('animales as a','a.id_ingresos_detalle','=','id.id')
                   //  ->where('a.id','=',2)
                     
                    ->where('id.id_costo_faenamiento','=',1)
                    ->where('id.id_ingresos',$id)
                    ->select('id.id_costo_faenamiento', 'i.id_users','uc.codigo','a.id','a.peso','a.codigo','a.codigo_agrocalidad')
                   // ->orderby('a.id','asc')
                 //  ->paginate(10);
                -> get();
    
    
    
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
     
            return view('camal.cliente-camal.show', ["animalesV" => $animalesV,"animalesP" => $animalesP]);
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
    // public function show($id)
    // {
    //     //
    // }

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
