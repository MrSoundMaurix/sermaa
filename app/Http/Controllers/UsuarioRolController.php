<?php

namespace App\Http\Controllers;

use App\Models\Team;
use App\Models\TeamUser;
use App\Models\User;
use DB;
use Illuminate\Http\Request;

class UsuarioRolController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $rol_camal = Team::where('id', 3)
            ->orWhere('id', 4)
            ->orWhere('id', 9)
            ->orWhere('id', 5);
        $rol_mercado = Team::where('id', 6)
            ->orWhere('id', 7);

        $usuarios_camal = User::where('current_team_id', 5)
            ->orWhere('current_team_id', 4)
            ->orWhere('current_team_id', 9)
            ->orWhere('current_team_id', 2)
            ->orWhere('current_team_id', 3)->get();

        $usuarios_mercado = User::where('current_team_id', 6)
            ->orWhere('current_team_id', 7)->get();

        return view('usuariosRol.index', compact('usuarios_camal', 'usuarios_mercado', 'rol_camal', 'rol_mercado'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("EBTRI");
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
            $usuario_rol = new TeamUser();
            $usuario_rol->team_id = $request->get('id_rol');
            $usuario_rol->user_id = $request->get('id_user');
            $usuario_rol->save();
            return redirect('/usuarios-rol')->with('success', 'Rol asignado exitosamente');
        } catch (\Throwable $th) {
            return back()->withErrors(['exception' => "Error al registrar: Es posible que ya se el rol ya se encuentre asignado al usuario"]);
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

        $rol = Team::where('id', 3)
            ->orWhere('id', 4)
            ->orWhere('id', 9)
            ->orWhere('id', 5)->get();
        /*  $rol_mercado = Team::where('id', 6)
            ->orWhere('id', 7);

 */
        $usuario = User::where('id', $id)->get();
        //  $rol = Team::all();
        $usuarios_rol = DB::select('select * from team_user where user_id = ?', [$id]);
        return view('usuariosRol.create', compact('usuario', 'usuarios_rol', 'rol'));
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showMercado($id)
    {


        $rol = Team::where('id', 6)
            ->orWhere('id', 7)->get();


        $usuario = User::where('id', $id)->get();
        // $rol = Team::all();
        $usuarios_rol = DB::select('select * from team_user where user_id = ?', [$id]);
        return view('usuariosRol.create', compact('usuario', 'usuarios_rol', 'rol'));
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
        try {
            $usuario_rol = TeamUser::findOrFail($id);
            $usuario_rol->delete();
            return redirect('usuarios-rol')->with('success', 'Rol del usuario eliminado');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
