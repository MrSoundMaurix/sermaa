<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\CostoCamal;
use DB;


class CostoCamalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $costoCamal = CostoCamal::all();
        return view("costoCamal.index", compact('costoCamal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('costoCamal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {
            $costo = new CostoCamal();
            $costo->descripcion = $request->get('descripcion');
            $costo->valor = $request->get('valor');
            $costo->categoria = $request->get('categoria');
            $costo->save();
            // CostoCamal::create($request->all());
            return redirect('costo-camal')->with('success', 'Registrado exitosamente');
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
        $costoCamal = CostoCamal::findOrFail($id);
        return view('costoCamal.edit', compact('costoCamal'));
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

            $costo = CostoCamal::findOrFail($request->id);
            $costo->descripcion = trim($request->get('descripcion'));
            $costo->valor = trim($request->get('valor'));
            //$costo->categoria = trim($request->get('categoria'));
            $costo->update();

            return redirect('costo-camal')->with('success', 'Actualizado con éxito');
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
