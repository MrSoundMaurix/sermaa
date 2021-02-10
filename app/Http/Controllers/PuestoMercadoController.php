<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PuestoMercado;
use App\Models\SectorMercado;
use App\Models\UsuarioMercado;
use App\Models\TipoPagoMercado;
use App\Models\User;
use DB;
use PhpParser\Node\Stmt\Return_;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\PuestoMercadoRequest;

class PuestoMercadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try {
            if ($request) {
                $query = trim($request->get('searchT'));
            }
            if ($query != "") {
                if ($query == "Inactivo" || $query == "Activo") {
                    if ($query == "Inactivo") {
                        $puestosmercado = PuestoMercado::where('estado_puesto', '=', 'I')->paginate(5);
                    }
                    if ($query == "Activo") {
                        $puestosmercado = PuestoMercado::where('estado_puesto', '=', 'A')->paginate(5);
                    }
                } else {
                    $puestosmercado = PuestoMercado::join('users', 'id_users', '=', 'users.id')
                        ->select(
                            'users.codigo',
                            'users.direccion',
                            'users.telefono',
                            'users.cedula',
                            'users.nombres',
                            'users.apellidos',
                            'puestos_mercado.id',
                            'puestos_mercado.nro_puesto',
                            'puestos_mercado.id_users',
                            'puestos_mercado.estado_puesto',
                            'puestos_mercado.id_sector_mercado'
                        )
                        ->where(function (Builder $querybuilder) use ($query) {
                            return $querybuilder->orwhere('nombres', 'LIKE', '%' . $query . '%')
                                ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
                                ->orWhere('puestos_mercado.nro_puesto', 'LIKE', '%' . $query . '%');
                        })->paginate(5);
                }
            } else {
                $puestosmercado = PuestoMercado::with(['sector'=>function($q){
                    $q->with('tipo_pago');
                }])->paginate(10);
            }
            return view('puestosmercado.index', ['puestosmercado' => $puestosmercado, 'query' => $query]);
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
        try {
            $users = User::orderByDesc('updated_at')->where([['current_team_id', 10], ['estado', 0]])->get();
            $sectoresmercado = SectorMercado::where('estado', '=', 'A')->get();
            return view('puestosmercado.create', compact('users', 'sectoresmercado'));
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PuestoMercadoRequest $request)
    {
        try {
            PuestoMercado::create($request->all());
            return redirect('puestos-mercado')->with('success', 'Puesto registrado');
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
        try {
            $puestoMercado = PuestoMercado::find($id);
            $users = User::orderByDesc('updated_at')->where([['current_team_id', 10], ['estado', 0]])->get();

            $sectoresmercado = SectorMercado::join('tipo_pago_mercado', 'id_tipo_pago_mercado', '=', 'tipo_pago_mercado.id')

                ->select(
                    'sector_mercado.id',
                    'sector_mercado.sector',
                    'sector_mercado.mercado',
                    'tipo_pago_mercado.descripcion',
                    'tipo_pago_mercado.valor_pago',
                    'tipo_pago_mercado.estadia',
                )->where('sector_mercado.estado', 'A')->get();
            // dd($sectoresmercado);
            // $sectoresmercado = SectorMercado::where('estado', '=', 'A')->get();
            return view('puestosmercado.edit', compact('puestoMercado', 'users', 'sectoresmercado'));
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PuestoMercadoRequest $request, $id)
    {
        try {
            PuestoMercado::updateOrCreate(['id' => $id], $request->all());
            return redirect('puestos-mercado')->with('success', 'Puesto del mercado actualizado con éxito');
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
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
