<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SectorMercado;
use App\Models\PuestoMercado;
use DB;

class SupervisarPuestosMercadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // try {
            $id_sector=trim($request->get('id_sector'));
            if($id_sector!=null){
              // $puestos_mercado=PuestoMercado::all();
                 $puestos_mercado=PuestoMercado::select('puestos_mercado.*')
                  ->join('usuarios_mercado','id_usuarios_mercado','=','usuarios_mercado.id')
                  ->join('tipo_pago_mercado','id_tipo_pago_mercado','=','tipo_pago_mercado.id')
                 ->join('sector_mercado','id_sector_mercado','=','sector_mercado.id')
                 ->where('puestos_mercado.id_sector_mercado','=',$id_sector)
                  ->select('puestos_mercado.nro_puesto','usuarios_mercado.nombres','usuarios_mercado.apellidos'
                 ,'tipo_pago_mercado.tipo_pago','sector_mercado.sector','sector_mercado.mercado')
                  // ->where()*/
                //  ->sortByDesc('usuarios_mercado.nombres')
                 ->paginate(10);
               //  $puestos_mercado.sort('nombres');
  // dd($puestos_mercado);
                 $sector_mercado=SectorMercado::all();
                // dd($puestos_mercado);
                 
            }else{
                 $sector_mercado=SectorMercado::all();
                 $puestos_mercado=null;
            }
        // } catch (\Exception | QueryException $e) {
        // }
      return view('supervisarpuestosmercado.index',compact("sector_mercado","id_sector",'puestos_mercado'));
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
        //
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
