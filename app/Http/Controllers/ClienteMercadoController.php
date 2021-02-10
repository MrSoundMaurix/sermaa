<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagosPuestoMercadoRequest;
use App\Models\PagosPuestoMercado;
use App\Models\PuestoMercado;
use App\Models\PuestosMercado;
use App\Models\TipoPagoMercado;
use App\Models\MatriculasMercado;
use App\Models\User;
use App\Models\Fecha;
use DB;
use Image;
use PDF;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Date;

class ClienteMercadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        try { 
        $id_users=Auth::id();
        $puestoMercado = PuestosMercado::with(['sectorMercado' => function ($query) {
            $query->with('tipo_pago');
           
        }])->where('id_users',$id_users)->where('estado_puesto','A')->get();
        //dd($puestoMercado);
     
        return view('cliente-mercado.index',['puestoMercado'=>$puestoMercado]);
    } catch (\Exception | QueryException $e) {
        return back()->withErrors(['exception' => $e->getMessage()]);
    } 
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

   
    public function show(Request $request)
    {
        $id_users=Auth::id();
       
        $matriculaMercado = null;
        $users = null;
         try { 
        if ($request) {
            $query = trim($request->get('searchT'));
        } if($query !=""){
            $matriculaMercado=MatriculasMercado::with(['puestos','responsableMatricula'])
            ->orwhereHas('puestos',function($qu) use ($query){
                $qu->where('id_users',Auth::id())
                ->where(function (Builder $querybuilder) use (&$query) {
                 $querybuilder->where('nro_puesto', 'LIKE', '%' . $query . '%');
           });        
            })
            ->paginate(10); 

        }else{
          
            $matriculaMercado=MatriculasMercado::with(['puestos','responsableMatricula'])->whereHas('puestos',function($qu){
                $qu->where('id_users',Auth::id());
            })->paginate(10); 
        }
       // dd($matriculaMercado);
        return view('cliente-mercado.show',['matriculaMercado'=>$matriculaMercado,'searchT'=>$query]);
     } catch (\Exception | QueryException $e) {
        return back()->withErrors(['exception' => $e->getMessage()]);
    } 
    }

    public function pagos(Request $request)
    {
        $id_users=Auth::id();
       
        $pagos = null;
       
        try { 
        if ($request) {
            $query = trim($request->get('searchT')); 
        } if($query !=""){
             
         $pagosPuestoMercado = PagosPuestoMercado::where('id_users','=',$id_users)->
        with(['user','responsableCobro','puestoMercado'])->whereHas('puestoMercado',function($qu) use ($query){
            $qu->where('nro_puesto', 'LIKE', '%' . $query . '%');          
        })->orderby('id','desc')->paginate(10);

        }else{         
        $pagosPuestoMercado = PagosPuestoMercado::where('id_users','=',$id_users)->
        with('user','responsableCobro','puestoMercado')->orderby('id','desc')->paginate(10);
     
        }
        return view('cliente-mercado.pagos',['pagosPuestoMercado'=>$pagosPuestoMercado,'searchT'=>$query]);
     } catch (\Exception | QueryException $e) {
        return back()->withErrors(['exception' => $e->getMessage()]);
    } 
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
