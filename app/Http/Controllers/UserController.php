<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Team;
use App\Models\File;
use App\Models\CabeceraDistribucion;
use App\Models\DetalleDistribucion;
use App\Exports\ExcelExport;
use DB;
use Image;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Database\Eloquent\Builder;
use App\Http\Requests\UsuarioCamalRequest;

class UserController extends Controller
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
                        ->orWhere('direccion', 'LIKE', '%' . $query . '%')
                        ->orWhere('telefono', 'LIKE', '%' . $query . '%');
                    })
                    ->where(function (Builder $q) {
                        return $q->where('estado', 0)
                            ->where('current_team_id', 5)->orWhere('current_team_id', 4)->orWhere('current_team_id', 9);
                    })
                    ->paginate(10);
            } else {
                $usuarios = User::orderByDesc('updated_at')
                    ->where('estado', 0)
                    ->where(function($query) {
                        $query->where('current_team_id', 4)
                              ->orWhere('current_team_id', 5)->orWhere('current_team_id', 9);
                    })
                    ->paginate(10);
            }
            return view('usuarios.index', compact('usuarios', 'query'));
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
            $user = User::where('current_team_id', 4)->orWhere('current_team_id', 5)->orWhere('current_team_id', 9)
            ->orWhere('current_team_id', 2)->orWhere('current_team_id', 3)->latest()->first();
            $cod = substr($user->codigo, 5) + 1;
        }
//dd($user);
        $roles = Team::where('id', 4)->orWhere('id', 5)->orWhere('id', 9)->get();
        return view("usuarios.create", compact('roles', 'cod'));
    }

    protected $email;
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UsuarioCamalRequest $request)
    {
        try {

           /*  $usuario=User::where('cedula',$request->get('cedula'))->where('current_team_id',$request->get('team'))->get();
          
           if(count($usuario)==0){ */
            $usm = new User;
            $usm->cedula = $request->get('cedula');
            $usm->nombres = $request->get('nombres');
            $usm->apellidos = $request->get('apellidos');
            $usm->name = "C" . $request->get('cedula');
            $usm->telefono = $request->get('telefono');
            $usm->direccion = $request->get('direccion');
            $usm->email = $request->get('email');
            $usm->codigo = $request->get('codigo');
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
            $usm->current_team_id = $request->get('team');
            $usm->save();
            $usm->teams()->attach($request->get('team'));
             return redirect('usuarios')->with('success', 'Usuario registrado');
          /* }else{
            return redirect('usuarios')->withErrors(['exception' => "Error al registrar: Ya exixte un usuario con el mismo rol"]); 
           } */
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
        // set_time_limit(300);

        $usuario = User::findOrFail($id);
        $pdf = PDF::loadView('usuarios.pdf', compact('usuario'));
        PDF::setOptions(['isHtml5ParserEnabled' => true, 'isRemoteEnabled' => true]);
        return $pdf->stream('prueba.pdf');

        // $distribucion = CabeceraDistribucion::findOrFail(1);
        // $detalles = DetalleDistribucion::where('id_cabecera_distribucion', 1)->get();
        // $pdf = PDF::loadView('usuarios.pdfdistribucion', compact('distribucion', 'detalles'));
        // return $pdf->stream('prueba.pdf');
    }

    /**
     * Testing maatwebsite/excel package.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testingxlsx()
    {
        // return Excel::import('testing.xls', function($doc) {

        //     $sheet = $doc->setActiveSheetIndex(0);
        //     $sheet->setCellValue('D5', 'Test');

        // })->export('xls');
        // return Excel::download(new ExcelExport, 'users.xls');
        return (new ExcelExport('0132156487'))->setTemplate(resource_path('views/exceltemplates/testing.xls'))->download('laravel-excel1.xls');
    }

    /**
     * Testing PDF upload.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testingpdf()
    {
        return view('usuarios.uploadpdf');
    }

    /**
     * Testing PDF upload.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testingpdfupload(Request $request)
    {
        $request->validate([
            'guia_pdf' => 'required|mimes:pdf|max:2048'
        ]);

        $fileModel = new File;

        if ($request->file('guia_pdf')) {
            $fileName = time() . '_' . $request->file('guia_pdf')->getClientOriginalName();
            $filePath = $request->file('guia_pdf')->storeAs('uploads', $fileName, 'public');

            $fileModel->name = time() . '_' . $request->file('guia_pdf')->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()->with('success', 'File has been uploaded.')->with('file', $fileName);
        }
    }

    /**
     * Testing PDF upload.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function pdfdownload($id)
    {
        $file = File::findOrFail(1);
        // return response()->download(public_path($file->file_path));
        return response()->file(public_path($file->file_path));
        // return $pdf->stream(public_path($file->file_path));
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
    public function update(UsuarioCamalRequest $request)
    {
        try {
           /*  $usuario=User::where('cedula',$request->get('cedula'))->where('current_team_id',$request->get('team'))->get();
          
            if(count($usuario)==0){ */
            $input = $request->except('foto');
            if($request->get('id_team')==2){
                $input['name'] = 'G' . $input['cedula'];
                }else{
                    $input['name'] = 'C' . $input['cedula'];
                }
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
            return redirect('usuarios')->with('success', 'Usuario Actualizado con exito');
           /*  }else{
                return redirect('usuarios')->withErrors(['exception' => "Error al registrar: Ya exixte un usuario con el mismo rol"]); 
            } */
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
            return redirect('usuarios')->with('success', 'Usuario eliminado');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }
}
