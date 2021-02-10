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


class EmpleadosMercadoController extends Controller
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
                            ->Where('current_team_id', 7);
                    })
                    ->paginate(10);
            } else {
                $usuarios = User::orderByDesc('updated_at')
                    ->where('estado', 0)
                    ->where(function($query) {
                        $query->orWhere('current_team_id', 7);
                    })
                    ->paginate(10);
            }
           // dd($usuarios);
            return view('empleadosmercado.index', compact('usuarios', 'query'));
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
        
        $roles = Team::where('id', 6)->orWhere('id', 7)->get();
             
        return view("empleadosmercado.create", compact('roles'));
    
    }

    protected $email;
    public function store(UsuarioMercadoRequest $request)
    {
         /*    try { */
            
          
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

            $usm->current_team_id = 7;
            $usm->save();
            $usm->teams()->attach(7);

            return redirect('empleados-mercado')->with('success', 'Usuario registrado');
          
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
    public function update(UsuarioMercadoRequest $request, $id)
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
            return redirect('empleados-mercado')->with('success', 'Usuario Actualizado con exito');
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
            return redirect('empleados-mercado')->with('success', 'Usuario eliminado');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
