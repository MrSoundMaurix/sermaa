<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;


use App\Models\UsuarioCamal;
use App\Models\MatriculaCamal;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

use DB;

class AdministradorUsuarioCamalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
      //  try {
       // $query  = trim($request->get('searchT'));
      // $id_usuarioscamal=User::where('current_team_id',8)->where('estado',0)->select('id','nombres','apellidos')->get(); 
       $id_usuariosmatriculados=MatriculaCamal::whereYear('fecha_matricula','=',date('Y'))->select('id_users')->get();
      /*  $i=0; foreach($id_usuarioscamal as $u){$a[$i]=$u->id; $i++; } //Convertir Objeto de array a un arrar de id
       $i=0; foreach($id_usuariosmatriculados as $u){ $b[$i]=$u->id_users; $i++; } //Convertir Objeto de array a un arrar de id
       $usuarios_sin_m_n=array_diff($a, $b); // elimnar los usuarios matriculados en el años actual de toda lista de usuarios del camal
       $j=0; $i=0;  
       //Obtener nombres del los usuarios no matriculados en el año en curso
       foreach($usuarios_sin_m_n as $usm){
           foreach($id_usuarioscamal as $u){
               if($usm==$u->id){
                   $usuarios_sin_m[$i]=['id'=>$u->id,'nombres'=>$u->nombres.' '.$u->apellidos]; $i++;
               }
          }
        } */
            if ($request) {
                $searchT = trim($request->get('searchT'));
            
            }
            if ($searchT != "") {
                $usuarioscamal = User::where('estado', 0)->where('current_team_id',8)
                    ->where(function($query) use ($searchT){
                        $query->orwhere('nombres', 'LIKE', '%'.$searchT.'%')
                        ->orWhere('apellidos', 'LIKE', '%'.$searchT.'%')
                        ->orWhere('codigo', 'LIKE', '%'.$searchT.'%')
                        ->orWhere('cedula', 'LIKE', '%'.$searchT.'%')
                        ->orWhere('direccion', 'LIKE', '%'.$searchT.'%')
                        ->orWhere('telefono', 'LIKE', '%'.$searchT.'%');
                     })->orderby('created_at','desc')->paginate(10);        
                    }
                    else{
                        $usuarioscamal = User::where('estado', 0)->where('current_team_id',8)->paginate(10);
                        $searchT="";
                    }
            return view('camal.administrador-camal.index', ["usuarioscamal" => $usuarioscamal,"searchT" => $searchT
            ,'id_usuariosmatriculados'=>$id_usuariosmatriculados]);
     //   } catch (\Exception $e) {
       //     return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        //}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('camal.usuario-camal.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        try {
            // $requestData = $request->all();
            $usuarioC = new UsuarioCamal();
            $usuarioC->tipo_usuario = 4;
            $usuarioC->nombres = $request->nombres;
            $usuarioC->apellidos = $request->apellidos;
            $usuarioC->cedula = $request->cedula;
            $usuarioC->telefono = $request->telefono;
            $usuarioC->direccion = $request->direccion;
            $usuarioC->guia = $request->guia;
            $usuarioC->estado = 1;
            $usuarioC->save();
            return redirect('UsuarioCamal')->with('success', 'Usuario registrado con éxito');
        } catch (\Exception | QueryException $e) {
        }



        // UsuarioCamal::create($requestData);

        //  return redirect('camal/usuarios-camal')->with('flash_message', 'camal added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $usuarioscamal = UsuarioCamal::findOrFail($id);

        return view('camal.usuarios-camal.show', compact('usuarioscamal'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $usuarioscamal = UsuarioCamal::findOrFail($id);

        return view('camal.usuarios-camal.edit', compact('usuarioscamal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        try {
            $usuarioscamal = UsuarioCamal::findOrFail($request->id);
            $usuarioscamal->nombres = trim($request->get('nombres'));
            $usuarioscamal->apellidos = trim($request->get('apellidos'));
            $usuarioscamal->cedula = trim($request->get('cedula'));
            $usuarioscamal->telefono = trim($request->get('telefono'));
            $usuarioscamal->direccion = trim($request->get('direccion'));
            $usuarioscamal->guia = trim($request->get('guia'));
            $usuarioscamal->update();
            return redirect('UsuarioCamal')->with('success', 'Usuario Actualizado con exito');
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
        // $requestData = $request->all();

        // $usuarioscamal = UsuarioCamal::findOrFail($id);
        // $usuarioscamal->update($requestData);

        // return redirect('camal/usuarios-camal')->with('flash_message', 'camal updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        try {
            $usuarioscamal = UsuarioCamal::findOrFail($id);
            // Categoria::destroy($id);
            $usuarioscamal->estado = 0;
            $usuarioscamal->update();
            return redirect('UsuarioCamal')->with('success', 'Usuario eliminado');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
