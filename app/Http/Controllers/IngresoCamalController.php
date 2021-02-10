<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests;
use App\Http\Requests\PdfRequest;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;
use App\Models\IngresoCamal;
use App\Models\UsuarioCamal;
use App\Models\User;
use App\Models\Animales;
use Illuminate\Http\Request;
use App\Models\File;
use PDF;
use Carbon\Carbon;

use DB;
use Exception;
use Illuminate\Database\QueryException;

class IngresoCamalController extends Controller
{

    public function index(Request $request)
    {
          try {
        //  $id_usuario = Auth::user()->codigo;
        // info($id_usuario);
        $query = trim($request->get('searchT'));
        if ($request) {
            $query = trim($request->get('searchT'));
        }
        
        $ingresoscamal = DB::table('ingresos as doc')
            ->join('users as p', 'doc.id_users', '=', 'p.id')
            ->select(
                'codigo',
                'direccion',
                'telefono',
                'cedula',
                'nombres',
                'apellidos',
                'doc.fecha_ingreso',
                'doc.lugar_procedencia',
                'doc.costo_total',
                'id_users',
                'doc.id',
                'doc.medio_movilizacion',
                'doc.validar_transporte',
                'doc.placa_transporte',
                'doc.condicion_transporte',
                'doc.observaciones',
                'doc.csmi',
                'doc.fecha_faenamiento',
                'doc.responsable_recepcion',
                'doc.responsable_recepcion_datos',
                'doc.matricula',
                'doc.estado_pdf',
            )
            ->orWhere('doc.id', 'LIKE', '%' . $query . '%')
            ->orWhere('codigo', 'LIKE', '%' . $query . '%')
            ->orWhere('nombres', 'LIKE', '%' . $query . '%')
            ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
            ->orderby('doc.fecha_ingreso', 'desc')
            ->paginate(10);

      
        $detalles_ingreso = DB::table('ingresos_detalle as det')
            ->join('costo_faenamiento as c', 'det.id_costo_faenamiento', '=', 'c.id')->get();

        $condiciones_transporte = ['ACERRÍN PISO', 'ANIMAL PARADO CÓMODO', 'MEZCLADOS', 'AMARRADOS', 'SIN AMARRAR'];
        return view('camal.administrador-camal.maestroDetalleIngreso.index', ["ingresoscamal" => $ingresoscamal, "searchT" => $query, "condiciones_transporte" => $condiciones_transporte, "detalles_ingreso" => $detalles_ingreso]);
         } catch (\Exception $e) {
           return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }


    public function create(Request $request)

    {
        if ($request) {
            $usc = trim($request->get('usc'));
            $uscamal_id = trim($request->get('uscamal_id'));
            $ucamal = trim($request->get('ucamal'));
            if ($uscamal_id) {
                $usucamal =  UsuarioCamal::where('id', $uscamal_id)->get();
            }
        }

        $usuarioscamal =  UsuarioCamal::all();
        // return response()->json([
        //     'usuarioscamal' => $usuarioscamal
        // ]);
        return view('camal.ingreso-camal.create', ["usuarioscamal" => $usuarioscamal, "uscamal_id" => $uscamal_id]);
    }
    public function getUsuarios(Request $request)
    {
        $usuarios = UsuarioCamal::all();
        return response()->json([
            'usuarios' => $usuarios
        ]);
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
            $ingresoC = new UsuarioCamal();
            $fecha = Carbon::now();
            $ingresoC->fecha_ingreso = $fecha;
            // $ingresoC->apellidos = $request->apellidos;
            // $ingresoC->cedula = $request->cedula;
            // $ingresoC->telefono = $request->telefono;
            // $usuarioC->direccion = $request->direccion;
            // $usuarioC->guia = $request->guia;
            // $usuarioC->estado = 1;
            // $usuarioC->save();
            return redirect('IngresoCamal')->with('success', 'Ingreso registrado con éxito');
        } catch (\Exception | QueryException $e) {
        }



        // UsuarioCamal::create($requestData);

        //  return redirect('camal/usuarios-camal')->with('flash_message', 'UsuarioCamal added!');
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

        return view('IngresoCamal.ingreso-camal.show', compact('usuarioscamal'));
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
        $ingresos_camal = IngresoCamal::findOrFail($id);
        /*  DB::table('ingresos as doc')
            ->join('users as p', 'doc.id_users', '=', 'p.id')->get(); */
        // dd($ingresoscamal);
        //  $ingresosD=DB::table('ingresos_detalle')->get(); 
        //   $ingresosDetalle= response()->json($ingresosD);
        // 

        $detalles_ingreso = DB::table('ingresos_detalle as det')
            ->join('costo_faenamiento as c', 'det.id_costo_faenamiento', '=', 'c.id')
            ->where('id_ingresos', '=', $id)
            ->get();
        $fecha_f = explode(" ", $ingresos_camal->fecha_ingreso);
        $fecha = $fecha_f[0];
        $hora = $fecha_f[1];
        $bovino = 0;
        $total = 0;
        $porcino = 0;
        foreach ($detalles_ingreso as $det) {
            if ($det->id_costo_faenamiento == 1) {
                $bovino = $bovino + $det->cantidad;
            }
            if ($det->id_costo_faenamiento == 2) {
                $porcino = $porcino + $det->cantidad;
            }
        }
        $total = $porcino + $bovino;
        $condicion_transporte_arreglo = explode(",", $ingresos_camal->condicion_transporte);
        $condiciones_transporte = ['ACERRÍN PISO', 'ANIMAL PARADO CÓMODO', 'MEZCLADOS', 'AMARRADOS', 'SIN AMARRAR'];
        return view('camal.administrador-camal.maestroDetalleIngreso.edit', compact('ingresos_camal', "detalles_ingreso", "fecha", "hora", "condiciones_transporte", "bovino", "porcino", 'total'));
    }



    /**
     * Update the specified resource in storage.
     * ACTUALIZA LA TABLA INGRESOS_CAMAL
     * PARA LOS CAMPOS DEL REGISTRO DE CONDICIONES DEL ANIMAL
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        try {
            //   dd($request);
            $ingresos_camal = IngresoCamal::findOrfail($request->get("id"));
            $ingresos_camal->placa_transporte = trim($request->get('placa_transporte'));
            $ingresos_camal->medio_movilizacion = trim($request->get('medio_movilizacion'));
            $ingresos_camal->observaciones = trim($request->get('observaciones'));
            $ingresos_camal->fecha_faenamiento = trim($request->get('fecha_faenamiento'));
            $ingresos_camal->validar_transporte = 1;
            $ingresos_camal->responsable_recepcion = auth()->user()->id;

           // dd($request->get('condiciones_transporte'));
          
            $condicion_transporte = $request->get('condiciones_transporte');
            if($condicion_transporte==""||$condicion_transporte==null  ){
              //  return redirect('IngresoCamal')->withErrors('exception', 'Condiciones de transporte no seleccionado');
              return back()->withErrors(['exception' => "Seleccione una opción en: Condiciones de transporte"])
              ->withInput(); 

            }else{
            // $dias = $request->get('dias');
            $condicion_transporte_unido = "";
            for ($i = 0; $i < count($condicion_transporte); $i++) {
                if ($i == count($condicion_transporte) - 1) {
                    $condicion_transporte_unido .= '' . $condicion_transporte[$i];
                } else {
                    $condicion_transporte_unido .= '' . $condicion_transporte[$i] . ',';
                }
            }
            $ingresos_camal->condicion_transporte = $condicion_transporte_unido;   
            
        $ingresos_camal->update();
            return redirect('IngresoCamal')->with('success', 'Registrado con éxito');
            
        }
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
        // $requestData = $request->all();

        // $usuarioscamal = UsuarioCamal::findOrFail($id);
        // $usuarioscamal->update($requestData);

        // return redirect('camal/usuarios-camal')->with('flash_message', 'UsuarioCamal updated!');
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
            $ingresocamal = UsuarioCamal::findOrFail($id);
            // Categoria::destroy($id);
            $ingresocamal->estado = 0;
            $ingresocamal->update();
            return redirect('IngresoCamal')->with('success', 'Ingreso eliminado');
        } catch (Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }

    /**
     * Testing PDF upload
     * REDIRECCIONA.
     *
     * @return \Illuminate\Http\Response
     */
    public function testingpdf()
    {
        /* dd($request); */
        return view('camal.administrador-camal.maestroDetalleIngreso.uploadpdf');
    }



    /**
     * Testing PDF upload.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function testingpdfupload(PdfRequest $request)
    {

        $fileModel = new File;

        if ($request->file('guia_pdf')) {
            $fileName = time() . '_' . $request->file('guia_pdf')->getClientOriginalName();
            $filePath = $request->file('guia_pdf')->storeAs('uploads', $fileName, 'public');
            $fileModel->id_tabla = $request->get("id_tabla");
            $fileModel->name = time() . '_' . $request->file('guia_pdf')->getClientOriginalName();
            $fileModel->file_path = '/storage/' . $filePath;
            $fileModel->save();

            return back()->with('success', 'Archivo subido exitosamente.')->with('file', $fileName);
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
        try {
            //  $file = File::findOrFail($id);
            $file = File::where('id_tabla', $id)->get();
            /* dd($file); */
            // return response()->download(public_path($file->file_path));

            return response()->file(public_path($file[count($file) - 1]->file_path));
            // return $pdf->stream(public_path($file->file_path));
        } catch (\Throwable $th) {
            return back()->withErrors(['exception' => "Error al mostrar: No existen registros de pdf"]);
        }
    }
}
