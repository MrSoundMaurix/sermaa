<?php

namespace App\Http\Controllers;

use App\Models\AnimalPieza;
use Illuminate\Http\Request;
use App\Models\Ubicacion;
use DB;


class UbicacionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $ubicacion = Ubicacion::all();

        $provincias = ['CARCHI', 'IMBABURA', 'SUCUMBÍOS', 'PICHINCHA', 'AZUAY', 'BOLIVAR', ' CAÑAR', ' COTOPAXI', ' COTOPAXI', 'CHIMBORAZO', 'EL ORO', 'ESMERALDAS', 'GUAYAS', 'LOJA', ' ORELLANA', 'LOS RIOS', 'MANABI', ' MORONA SANTIAGO', ' NAPO', ' PASTAZA', 'TUNGURAHUA', ' ZAMORA CHINCHIPE', ' GALAPAGOS', 'SUCUMBIOS', 'SANTO DOMINGO DE LOS TSACHILAS'];

        return view("ubicacion.index", compact("ubicacion", "provincias"));
    }

    public function cantones(Request $request)
    {
        // if ($request->ajax()) {
        $ubicacion = Ubicacion::where('provincia', $request->get('faculty_id'))->get();
        // dd($careers);
        foreach ($ubicacion as $u) {
            $careersArray[$u->id] = $u->canton;
        }

        //return view('canton');
        return response()->json(array_unique($careersArray));
        /// }
    }


    public function parroquias(Request $request)
    {
        $ubicacion = Ubicacion::where('canton', $request->get('faculty_id'))->get();

        foreach ($ubicacion as $u) {
            $careersArray[$u->id] = $u->parroquia;
        }
        return response()->json($careersArray);
    }

    public function getCanton($request)
    {
        /*     $html = '';
        $cantones = Ubicacion::where('provincia', '=', $request->provincia);
        foreach ($cantones as $c) {
            $html .= '<option value="' . $c->canton . '">' . $c->canton . '</option>';
        }

        return response()->json(['html' => $html]); */

        /*   $ubicacion = DB::table("ubicacion")
            ->where("nation_id", $request->provincia)
            ->pluck("teacher_name", "teacher_id");
        print_r($ubicacion);
        return response()->json($ubicacion); */

        // Fetch Employees by Departmentid
        $empData['data'] = Ubicacion::orderby("provincia", "asc")
            ->select('id', 'canton')
            ->where('provincia', $request)
            ->get();

        return response()->json($empData);
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
