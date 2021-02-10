<?php

namespace App\Http\Controllers;

use App\Models\AnimalPieza;
use Illuminate\Http\Request;

class AjaxDistribucionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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

    /***
     * Metodo para las partes del ajax
     */
    public function partes($id)
    {
        $valor = (int)$id;
       // info($valor);
        $partes = DB::table('animales_piezas');


      //  \Log::info($partes);

        return response()->json(['data' => $partes]);
    }
    /***
     * Metodo para las partes del ajax
     */
    public function partesPorPieza($id)
    {
        // if ($request->ajax()) {
        $valor = (int)$id;
     //   info($valor);
        $partes = DB::table('animales_piezas');
      //  \Log::info($partes);
        /*  info($partes);
        $piezas = [];
        foreach ($partes as $u) {
            $val = explode("-", $u->codigo);
            if ($val[2] > 4) {
                $piezas[$u->id] = $u->pieza . "_" . $u->codigo . "_" . $u->id;
            }
        } */

        return response()->json(['data2' => $partes]);
        //return response()->json(array_unique($piezas));
        /// }
    }

    /***
     * Metodo para las partes del ajax
     */
    public function partesIngresada($id)
    {
        // if ($request->ajax()) {
        $valor = (int)$id;
        $partes = AnimalPieza::where('id_animales', $valor)
            ->where('estado', 1)
            ->get();
     //   \Log::info($partes);
      //  info($partes);
        $piezas = [];
        foreach ($partes as $u) {
            $val = explode("-", $u->codigo);
            if ($val[2] > 4) {
                $piezas[$u->id] = $u->pieza . "_" . $u->codigo . "_" . $u->id;
            }
        }

        //return view('canton');
        return response()->json(array_unique($piezas));
        /// }
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
