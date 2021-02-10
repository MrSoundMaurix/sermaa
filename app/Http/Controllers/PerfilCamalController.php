<?php

namespace App\Http\Controllers;
use DB;
use App\Models\User;

use Illuminate\Http\Request;

class PerfilCamalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      //  dd('Hola');
     return view('perfil.index',[]);
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
        try{
       // if()
      $user=User::findOrFail($request->get('id_users'));
      $user->password=bcrypt($request->get('password'));
      $user->update();
      return redirect('/profile')->with('success', 'Contraseña actualizada');
    } catch (\Exception | QueryException $e) {
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
    public function cambiar_rol($id_user,$id_team){
    //dd($id_user, $id_team);
    $usuario = User::findOrFail($id_user);
    $usuario->current_team_id =$id_team;
    $usuario->update();
    if($id_team==2){ //2=> (rol)gerente
        return redirect('/gerente-camal');
        }elseif($id_team==3){ //3=> (rol)supervisor_camal
            return redirect('/usuarios-camal');
        } else if($id_team==4){ //4=> (rol)operario_camal
            return redirect('/animal-camal');  
        }else if($id_team==5){ //5=> (rol)administrador_camal
            return redirect('/administrador-camal');  
        }else if($id_team==9){ //9=> (rol)veterinario
            return redirect('/antemorten'); 
        } else if($id_team==6){ //9=> (rol)veterinario
            return redirect('/usuarios-mercado'); 
        }  else if($id_team==7){ //9=> (rol)veterinario
            return redirect('/pagos-puesto-mercado'); 
        } 
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
