<?php

namespace App\Http\Controllers;

use App\Models\PuestoMercado;
use App\Models\SectorMercado;
use App\Models\TipoPagoMercado;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use DB;

class SectorMercadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $sectorMercado = null;
      /*   try { */
            if ($request) {
                $query = trim($request->get('searchT'));
            }
            if ($query != "") {

                //$sectorMercado= SectorMercado::whth('puestos')->
                $sectorMercado = SectorMercado::with('puestos')->where('estado', 'A')
                ->where(function (Builder $querybuilder) use ($query) {
                  return  $querybuilder->Where('sector', 'LIKE', '%' . $query . '%')
                        ->orWhere('codigo', 'LIKE', '%' . $query . '%')
                        ->orWhere('mercado', 'LIKE', '%' . $query . '%');
                })
                ->paginate(10);
             //   dd($sectorMercado);
            } else {

                $sectorMercado = SectorMercado::with('puestos')->where('estado', 'A')->orderBy('id', 'desc')->paginate(10);
            }
            // dd($sectorMercado);
            $tipos_pago_mercado = TipoPagoMercado::all()->where('categoria', '=', 0);
            return view('sectorMercado.index', ['sectorMercado' => $sectorMercado, 'tipos_pago_mercado' => $tipos_pago_mercado, 'query' => $query]);
       /*  } catch (\Exception | QueryException $e) {
           DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        } */
 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $tipos_pago_mercado = TipoPagoMercado::all()->where('categoria', '=', 0)->pluck('descripcion', 'id',);
        return view('sectorMercado.create', ["tipos_pago_mercado" => $tipos_pago_mercado]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //

        try {
           /*  if ($request->get('codigo') < 10 && strlen($request->get('codigo')) == 1) {
                $h = 0;
                $i = $request->get('codigo');
                $k = $h . $i;
                $sector = SectorMercado::where('sector', '=', $request->get('sector'))->orWhere('codigo', '=', $k)->get();
            } else {
                $sector = SectorMercado::where('sector', '=', $request->get('sector'))->orWhere('codigo', '=', $request->get('codigo'))->get();
            }
 */
          /*   if (count($sector) > 0) {
                return redirect('sector-mercado')->withErrors(['message1' => 'Sector Mercado Existente']);
            } else { */
                if ($request->get('codigo') >= 10) {
                    $sec = new SectorMercado();
                    $sec->codigo = $request->get('codigo');
                    $sec->sector = $request->get('sector');
                    $sec->mercado = $request->get('mercado');
                    $sec->id_tipo_pago_mercado = $request->get('id_tipo_pago_mercado');
                    $sec->estado = 'A';
                    $sec->save();
                    return redirect('sector-mercado')->with('success', 'Sector registrado exitosamente');
                } else {
                    $sec = new SectorMercado();
                    if (strlen($request->get('codigo')) == 1) {
                        $g = 0;
                        $f = $request->get('codigo');
                        $l = $g . $f;
                        $sec->codigo = $l;
                    } else {

                        $sec->codigo = $request->get('codigo');
                    }

                    $sec->sector = $request->get('sector');
                    $sec->mercado = $request->get('mercado');
                    $sec->id_tipo_pago_mercado = $request->get('id_tipo_pago_mercado');
                    $sec->estado = 'A';
                    $sec->save();
                    return redirect('sector-mercado')->with('success', 'Sector registrado exitosamente');
                }
          //  }
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //        $tipos_pago_mercado = TipoPagoMercado::all()->pluck('descripcion', 'id',);
        $sectorMercado = SectorMercado::with('tipo_pago')->findOrFail($id);

        return view('sectorMercado.edit', compact('sectorMercado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //       return $request;
        try {
            $sectorMercado = SectorMercado::findOrFail($request->id);
            if ($request->get('codigo') < 10 && strlen($request->get('codigo')) == 1) {
                $h = 0;
                $i = $request->get('codigo');
                $k = $h . $i;

                $sectorRepetidoCod = SectorMercado::Where('codigo', '=', $k)->take(1)->get();
                $sectorRepetidoSec = SectorMercado::where('sector', '=', $request->get('sector'))->take(1)->get();
            } else {
                $sectorRepetidoCod = SectorMercado::Where('codigo', '=', $request->get('codigo'))->take(1)->get();
                $sectorRepetidoSec = SectorMercado::where('sector', '=', $request->get('sector'))->take(1)->get();
            }
            //return $sectorRepetido;
            if (count($sectorRepetidoCod) > 0 || count($sectorRepetidoSec) > 0) {
                if (count($sectorRepetidoCod) > 0 && count($sectorRepetidoSec) > 0) {
                    if ($request->id == $sectorRepetidoCod[0]->id && $request->id == $sectorRepetidoSec[0]->id) {

                        $sectorMercado->codigo = trim($request->get('codigo'));
                        $sectorMercado->sector = trim($request->get('sector'));
                        $sectorMercado->mercado = trim($request->get('mercado'));
                        $sectorMercado->id_tipo_pago_mercado = trim($request->get('id_tipo_pago_mercado'));
                        //            return $sectorMercado;

                        $sectorMercado->update();
                        return redirect('sector-mercado')->with('success', 'Sector del mercado actualizado con éxito');
                    } else {
                        return redirect('sector-mercado')->withErrors(['message1' => 'Sector o Codigo Existente']);
                    }
                } else if (count($sectorRepetidoCod) > 0 && count($sectorRepetidoSec) == 0) {
                    if ($request->id == $sectorRepetidoCod[0]->id) {

                        $sectorMercado->codigo = trim($request->get('codigo'));
                        $sectorMercado->sector = trim($request->get('sector'));
                        $sectorMercado->mercado = trim($request->get('mercado'));
                        $sectorMercado->id_tipo_pago_mercado = trim($request->get('id_tipo_pago_mercado'));
                        //            return $sectorMercado;

                        $sectorMercado->update();
                        return redirect('sector-mercado')->with('success', 'Sector del mercado actualizado con éxito');
                    } else {
                        return redirect('sector-mercado')->withErrors(['message1' => 'Codigo Existente']);
                    }
                } else if (count($sectorRepetidoCod) == 0 && count($sectorRepetidoSec) > 0) {
                    if ($request->id == $sectorRepetidoSec[0]->id) {

                        $sectorMercado->codigo = trim($request->get('codigo'));
                        $sectorMercado->sector = trim($request->get('sector'));
                        $sectorMercado->mercado = trim($request->get('mercado'));
                        $sectorMercado->id_tipo_pago_mercado = trim($request->get('id_tipo_pago_mercado'));
                        //            return $sectorMercado;

                        $sectorMercado->update();
                        return redirect('sector-mercado')->with('success', 'Sector del mercado actualizado con éxito');
                    } else {
                        return redirect('sector-mercado')->withErrors(['message1' => 'Sector Existente']);
                    }
                }
            } else {
                $sectorMercado->codigo = trim($request->get('codigo'));
                $sectorMercado->sector = trim($request->get('sector'));
                $sectorMercado->mercado = trim($request->get('mercado'));
                $sectorMercado->id_tipo_pago_mercado = trim($request->get('id_tipo_pago_mercado'));
                //            return $sectorMercado;

                $sectorMercado->update();
                return redirect('sector-mercado')->with('success', 'Sector del mercado actualizado con éxito');
            }
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $puestoMercado = PuestoMercado::where('id_sector_mercado', '=', $id)->get();
          //  dd($puestoMercado);
            if (count($puestoMercado) > 0) {

                return redirect('sector-mercado')->withErrors(['message1' => 'No se puede eliminar el sector']);
            } else {
                $sectorMercado = SectorMercado::findOrFail($id);
                // Categoria::destroy($id);
                $sectorMercado->estado = 'I';
                $sectorMercado->update();
                return redirect('sector-mercado')->with('success', 'Sector eliminado exitosamente');
            }
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
