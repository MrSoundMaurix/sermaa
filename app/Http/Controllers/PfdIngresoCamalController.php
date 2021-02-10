<?php

namespace App\Http\Controllers;

use App\Http\Requests\PdfRequest;
use Illuminate\Http\Request;
use App\Models\File;
use App\Models\IngresoCamal;

class PfdIngresoCamalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return view('camal.administrador-camal.maestroDetalleIngreso.uploadpdf');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('camal.administrador-camal.maestroDetalleIngreso.uploadpdf', compact("id"));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PdfRequest $request)
    {
        $request->validate([
            'guia_pdf' => 'required|mimes:pdf|max:2048'
        ]);
        // $id_tabla = $request->get("id_tabla");
        $fileModel = new File;

        if ($request->file('guia_pdf')) {
            $fileName = time() . '_' . $request->file('guia_pdf')->getClientOriginalName();
            $filePath = $request->file('guia_pdf')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time() . '_' . $request->file('guia_pdf')->getClientOriginalName();
            $fileModel->id_tabla = $request->get("id_tabla");
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();
            $ingresoCamal= IngresoCamal::findOrfail($request->get("id_tabla"));
            $ingresoCamal->estado_pdf="SI";
            $ingresoCamal->update();
           // dd($ingresoCamal);

            return back()->with('success', 'Archivo subido exitosamente.')->with('file', $fileName);
        }
        return view('camal.administrador-camal.maestroDetalleIngreso.uploadpdf');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $id_tabla = $id;
        return view('camal.administrador-camal.maestroDetalleIngreso.uploadpdf', compact("id_tabla"));
    }

    /**
     * Testing PDF upload.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testingpdfupload(Request $request)
    {
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
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
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
    }
}
