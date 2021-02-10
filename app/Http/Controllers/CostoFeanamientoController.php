<?php

namespace App\Http\Controllers;

use App\Models\CostoFaenamiento;

use App\Models\CostoCamal;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;

class CostoFeanamientoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costoCamal = CostoCamal::all();
        $costoFaenamiento = CostoFaenamiento::all();
        return view("costoFaenamiento.index", compact('costoFaenamiento','costoCamal'));
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
        try {
            if($request->get('identificador')==1){
            $costoFaenamiento = CostoFaenamiento::findOrFail($request->id);
          //  $costoFaenamiento->especie = trim($request->get('especie'));
            $costoFaenamiento->valor = trim($request->get('valor'));
            $costoFaenamiento->update();
            }
            else if($request->get('identificador')==2){
                $costoFaenamiento = CostoCamal::findOrFail($request->id);
             //   $costoFaenamiento->descripcion = trim($request->get('descripcion'));
                $costoFaenamiento->valor = trim($request->get('valor'));
                $costoFaenamiento->update();
            }
            return redirect('costo-faenamiento')->with('success', 'Costo del faenamiento actualizado con éxito');
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
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
