<?php

namespace App\Http\Controllers;

use App\Http\Requests\TipoPagoMercadoRequest;
use Illuminate\Http\Request;
use App\Models\TipoPagoMercado;
use DB;
use Exception;
use Illuminate\Database\QueryException;


class TipoPagoMercadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $tipoPagoMercado = null;
        try {
            if ($request) {
                $query = trim($request->get('searchT'));
            }
            if ($query != "") {
                $tipoPagoMercado = TipoPagoMercado::where('categoria',0)->orwhere('categoria',2)->orwhere('descripcion', 'ILIKE', '%' . $query . '%')->paginate(10);
                   
            } else {
                $tipoPagoMercado = TipoPagoMercado::where('categoria',0)->orwhere('categoria',2)->paginate(10);               
            }
            $tipoPagoMercado2 = TipoPagoMercado::where('categoria',1)->paginate(10);
            // return $tipoPagoMercado;
            return view('tipoPagoMercado.index', ["tipoPagoMercado" => $tipoPagoMercado, 'searchT' => $query,
            'tipoPagoMercado2'=>$tipoPagoMercado2]);
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
        return view('tipoPagoMercado.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(TipoPagoMercadoRequest $request)
    {
        try {
            TipoPagoMercado::create($request->all());
            return redirect('tipo-pago-mercado')->with('success', 'Tipo de pago registrado exitosamente');
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
        $estadia = ['PERMANENTE', 'EVENTUAL', 'OCASIONAL'];
        $tipoPagoMercado = TipoPagoMercado::findOrFail($id);
        return view('tipoPagoMercado.edit', compact('tipoPagoMercado', 'estadia'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(TipoPagoMercadoRequest $request, $id)
    {
        try {
          //  dd($request);

            $tipopago = TipoPagoMercado::where('id', $request->id)->first();
            $tipopago->update(['descripcion' => $request->get('descripcion')]);
          /*   $tipopago->update(['estadia' => $request->get('estadia')]); */
            $tipopago->update(['valor_pago' => $request->get('valor_pago')]);
            //$tipopago->update(['categoria' => $tipopago[0]->categoria->get('descripcion')]);
            return redirect('tipo-pago-mercado')->with('success', 'Tipo de pago del mercado actualizado con éxito');
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
        /* try {
            TipoPagoMercado::updateOrCreate(['id' => $request->id], $request->all());
            return redirect('tipo-pago-mercado')->with('success', 'Tipo de pago del mercado actualizado con éxito');
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }*/
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $tipoPagoMercado = TipoPagoMercado::findOrFail($id);
            // Categoria::destroy($id);

            $tipoPagoMercado->delete();
            return redirect('tipo-pago-mercado')->with('success', 'Tipo de pago eliminado exitosamente');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
