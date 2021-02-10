<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Fecha;
use Carbon\Carbon;

class FechaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fechas=Fecha::where('categoria',1)->orderby('id','desc')->get();
        $fecha=Fecha::where('categoria',1)->orderby('id','desc')->first();
       // dd($fecha);
        return view('camal.supervisor-camal.fecha.index',['fechas'=>$fechas,'fecha'=>$fecha]);
    }
    public function index2()
    {
        $fechas=Fecha::where('categoria',2)->orderby('id','desc')->get();
        $fecha=Fecha::where('categoria',2)->orderby('id','desc')->first();
       // dd($fecha);
        return view('matriculasMercado.fecha.index2',['fechas'=>$fechas,'fecha'=>$fecha]);
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
     // dd($request->get('dateto'));
      
     $fech= explode("/",$request->get('dateto'));
    // dd($fech);
      try {
        $fecha= new Fecha();
        $fecha->categoria = 1;
        $fecha->descripcion = "camal";
        $fecha->anio = $fech[0];
        $fecha->mes = $fech[1];
        $fecha->dia =$fech[2];
        $fecha->hora ="23:59";
        $fecha->created_at = Carbon::now();
        $fecha->save();
        // CostoCamal::create($request->all());
        return redirect('supervisorcamal-fecha')->with('success', 'Registrado exitosamente');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withErrors(['exception' => $e->getMessage()])->withInput();
    }
}
    public function store2(Request $request)
    {
     // dd($request->get('dateto'));
      
     $fech= explode("/",$request->get('dateto'));
    // dd($fech);
      try {
        $fecha= new Fecha();
        $fecha->categoria = 2;
        $fecha->descripcion = "mercado";
        $fecha->anio = $fech[0];
        $fecha->mes = $fech[1];
        $fecha->dia =$fech[2];
        $fecha->hora ="23:59";
        $fecha->created_at = Carbon::now();
        $fecha->save();
        // CostoCamal::create($request->all());
        return redirect('supervisormercado-fecha/index2')->with('success', 'Registrado exitosamente');
    } catch (\Exception $e) {
        DB::rollback();
        return back()->withErrors(['exception' => $e->getMessage()])->withInput();
    }
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
