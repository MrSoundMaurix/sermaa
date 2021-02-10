<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use Illuminate\Database\Eloquent\Model;

use App\Models\User;
use App\Models\UsuarioCamal;
use App\Http\Requests\ClienteCamalRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;
use Image;
use DB;

class UsuarioCamalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        try {
            if ($request) {
                $query = trim($request->get('searchT'));
            }
            if ($query != "") {
                $usuarioscamal = User::orderby('updated_at', 'desc')
                    ->where(function (Builder $querybuilder) use (&$query) {
                        return $querybuilder->where('nombres', 'LIKE', '%' . $query . '%')
                        ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
                        ->orWhere('codigo', 'LIKE', '%' . $query . '%')
                        ->orWhere('email', 'LIKE', '%' . $query . '%')
                        ->orWhere('cedula', 'LIKE', '%' . $query . '%')
                        ->orWhere('name', 'LIKE', '%' . $query . '%')
                        ->orWhere('telefono', 'LIKE', '%' . $query . '%')
                        ->orWhere('direccion', 'LIKE', '%' . $query . '%');
                    })
                    ->where(function (Builder $q) {
                        return $q->where('current_team_id', 8)->where('estado', 0);
                    })
                    ->paginate(10);
            } else {
                $usuarioscamal = User::orderByDesc('updated_at')
                    ->where('current_team_id', 8)
                    ->where('estado', 0)
                    ->paginate(10);
            }
            return view('camal.usuario-camal.index', compact('usuarioscamal', 'query'));
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
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
    public function store(ClienteCamalRequest $request)
    {
        try {
            // $validator = Validator::make($request, $rules, $messages);
            $usm = new User;
            $usm->codigo = $request->get('codigo');
            $usm->cedula = $request->get('cedula');
            $usm->nombres = $request->get('nombres');
            $usm->apellidos = $request->get('apellidos');
            $usm->name = "C" . $request->get('cedula');
            $usm->telefono = $request->get('telefono');
            $usm->direccion = $request->get('direccion');
            $usm->email = $request->get('email');

            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageType = $image->getClientOriginalExtension();
                $imageStr = (string) Image::make($image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode($imageType);

                $usm->foto = base64_encode($imageStr);
                $usm->fototype = $imageType;
            }

            $password = "C" . $request->get('cedula');
            $data = array(
                "password" => $password,
            );

            $this->email = $usm->email;
            $usm->password = bcrypt($password);
            // Mail::send('emails.sentpassword', $data, function ($m) {
            //     $m->from('example@gmail.com', 'Su contraseña');
            //     $m->to($this->email, "User")->subject('Your Reminder!');
            // });

            $usm->current_team_id = 8;
            $usm->estado = 0;
            $usm->save();
            $usm->teams()->attach(8);

            return redirect('usuarios-camal')->with('success', 'Usuario registrado');
        } catch (\Exception | QueryException $e) {
            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
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

        return view('camal.usuario-camal.show', compact('usuarioscamal'));
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
        $usuarioscamal = User::findOrFail($id);

        return view('camal.usuario-camal.edit', compact('usuarioscamal'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(ClienteCamalRequest $request)
    {
        try {
            $usuarioscamal = User::findOrFail($request->id);
            $usuarioscamal->nombres = trim($request->get('nombres'));
            $usuarioscamal->apellidos = trim($request->get('apellidos'));
            $usuarioscamal->cedula = trim($request->get('cedula'));
            $usuarioscamal->name = "C" . trim($request->get('cedula'));
            $usuarioscamal->telefono = trim($request->get('telefono'));
            $usuarioscamal->direccion = trim($request->get('direccion'));
            $password = "C" . $request->get('cedula');
            $usuarioscamal->password = bcrypt($password);
            $usuarioscamal->update();
            return redirect('usuarios-camal')->with('success', 'Usuario Actualizado con exito');
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
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
            $usuarioscamal = User::findOrFail($id);
            $usuarioscamal->estado = 1;
            $usuarioscamal->update();
            return redirect('usuarios-camal')->with('success', 'Usuario eliminado');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
