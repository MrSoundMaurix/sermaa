<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UsuarioMercado;
use App\Http\Requests\UsuarioMercadoRequest;
use Illuminate\Support\Str;
use App\Models\User;
use DB;
use Image;
use App\Models\Team;
use Illuminate\Database\Eloquent\Builder;
use App\Models\ValidarIdentificacion;


class PersonalMercadoController extends Controller
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
                $query = trim($request->get('searchUser'));
            }
            if ($query != "") {
                
                $usuarios = User::orderby('updated_at', 'desc')
                    ->where(function (Builder $querybuilder) use (&$query) {
                        return $querybuilder->where('nombres', 'LIKE', '%' . $query . '%')
                        ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
                        ->orWhere('codigo', 'LIKE', '%' . $query . '%')
                        ->orWhere('email', 'LIKE', '%' . $query . '%')
                        ->orWhere('cedula', 'LIKE', '%' . $query . '%')
                        ->orWhere('name', 'LIKE', '%' . $query . '%')
                        ->orWhere('cedula', 'LIKE', '%' . $query . '%');
                    })
                    ->where(function (Builder $q) {
                        return $q->where('estado', 0)
                            ->where('current_team_id', 6)->orWhere('current_team_id', 7);
                    })
                    ->paginate(10);
                 //   dd($usuarios);
            } else {
                $usuarios = User::orderByDesc('updated_at')
                    ->where('estado', 0)
                    ->where(function($query) {
                        $query->where('current_team_id', 6)->orWhere('current_team_id', 7);
                    })
                    ->paginate(10);
            }
           // dd($usuarios);
            return view('superadministrador.personal-mercado.index', compact('usuarios', 'query'));
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
        if (User::where('current_team_id', 4)->orWhere('current_team_id', 5)->orWhere('current_team_id', 9)
        ->orWhere('current_team_id', 2)->orWhere('current_team_id', 3)->get()->isEmpty()) {
            $cod = 1;
        } else {
            $user = User::where('current_team_id', 6)->orWhere('current_team_id', 7)->orWhere('current_team_id', 9)
            ->orWhere('current_team_id', 2)->orWhere('current_team_id', 3)->latest()->first();
            $cod = substr($user->codigo, 5) + 1;
        }

        $roles = Team::where('id', 6)->orWhere('id', 7)->get();
             
        return view("superadministrador.personal-mercado.create", compact('roles', 'cod'));
    }
    protected $email;

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioMercadoRequest $request)
    {
     /*    try { */
           // dd('');
           /*  $usuario=User::where('cedula',$request->get('cedula'))->where('current_team_id',$request->get('team'))->get();
          
           if(count($usuario)==0){ */
            $lastUser = User::where('current_team_id', 10)->orwhere('current_team_id', 6)->orWhere('current_team_id', 7)->orderby('id', 'desc')->first();
            if ($lastUser) {
                $lastCode = (int)$lastUser->codigo;
                $lastCode++;
                $lastCode = '000' . strval($lastCode);
            } else {
                $lastCode = '0001';
            }
            
            $usm = new User;
            $usm->cedula = $request->get('cedula');
            $usm->nombres = $request->get('nombres');
            $usm->apellidos = $request->get('apellidos');
            
            $usm->telefono = $request->get('telefono');
            $usm->direccion = $request->get('direccion');
            $usm->email = $request->get('email');
            $usm->codigo = $lastCode;
            $usm->estado = 0;

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageType = $image->getClientOriginalExtension();
                $imageStr = (string) Image::make($image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode($imageType);

                $usm->foto = base64_encode($imageStr);
                $usm->fototype = $imageType;
            }
                $password = "M" . $request->get('cedula');
                $data = array(
                    "password" => $password,
                ); 
                $usm->name = "M" . $request->get('cedula');
                $usm->password = bcrypt($password);
           
            
           
            $this->email = $usm->email;
            
            // Mail::send('emails.sentpassword', $data, function ($m) {
            //     $m->from('example@gmail.com', 'Su contraseña');
            //     $m->to($this->email, "User")->subject('Your Reminder!');
            // });

            $usm->current_team_id = $request->get('team');
            $usm->save();
            $usm->teams()->attach($request->get('team'));

            return redirect('superadmin-personal-mercado')->with('success', 'Usuario registrado');
           /* }else{
            return redirect('superadmin-personal')->withErrors(['exception' => "Error al registrar: Ya exixte un usuario con el mismo rol"]); 
           } */
        /* } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        } */ 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        try {
           /*  if ($request) {
                $query = trim($request->get('searchUser'));
            }
            if ($query != "") {
                $usuarios = User::orderby('updated_at', 'desc')
                    ->where(function (Builder $querybuilder) use (&$query) {
                        return $querybuilder->where('nombres', 'LIKE', '%' . $query . '%')
                            ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
                            ->orWhere('cedula', 'LIKE', '%' . $query . '%');
                    })
                    ->where(function (Builder $q) {
                        return $q->where('estado', 1)
                            ->where('current_team_id', 5)->orWhere('current_team_id', 4)->orWhere('current_team_id', 9)
                            ->orWhere('current_team_id', 2)->orWhere('current_team_id', 3)->orWhere('current_team_id', 8);
                    })
                    ->paginate(10);
            } else {
                
            } */
            $usuarios = User::orderByDesc('updated_at')
                    ->where('estado', 1)
                    ->where(function($query) {
                        $query->where('current_team_id', 4)
                              ->orWhere('current_team_id', 5)->orWhere('current_team_id', 9)
                              ->orWhere('current_team_id', 2)->orWhere('current_team_id', 3)->orWhere('current_team_id', 8);
                    })
                    ->get();
                    
                    
            return view('superadministrador.personal.show', compact('usuarios','usuariosM', 'query'));
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
       
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
    public function roles(Request $request)
    {
            
            $team_user = DB::table('team_user')->where('user_id',$request->get('id_user'))->get();
            info($team_user);
           
            $roles = DB::table('teams')->get();
            info($roles);

      
        return response()->json($roles);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UsuarioMercadoRequest $request)
    {
        try {    
            $input = $request->except('foto');
            
                $input['name'] = 'M' . $input['cedula'];
           
          //  $input['password'] = bcrypt($input['name']); 
            $usuariomercado = User::updateOrCreate(['id' => $request->id], $input);
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageType = $image->getClientOriginalExtension();
                $imageStr = (string) Image::make($image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode($imageType);

                $usuariomercado->foto = base64_encode($imageStr);
                $usuariomercado->fototype = $imageType;
                $usuariomercado->save();
            }
            return redirect('superadmin-personal-mercado')->with('success', 'Usuario Actualizado con exito');
           /*   }else{
                return redirect('superadmin-personal')->withErrors(['exception' => "Error al registrar: Ya exixte un usuario con el mismo rol"]); 
            }  */
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
        try {
            $usuarioscamal = User::findOrFail($id);
            $usuarioscamal->estado = 1;
            $usuarioscamal->update();
            return redirect('superadmin-personal-mercado')->with('success', 'Usuario eliminado');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }
    public function activar_usuarios_mercado($id)
    {
        try {
            $usuarioscamal = User::findOrFail($id);
            $usuarioscamal->estado = 0;
            $usuarioscamal->update();
            return redirect('superadmin-personal-mercado')->with('success', 'Usuario restablecido');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
