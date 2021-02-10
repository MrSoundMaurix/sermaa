<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\IngresoCamal;
use App\Models\User;
use App\Models\IngresoDetalle;
use App\Models\CabeceraDistribucion;
use App\Models\DetalleDistribucion;
use DB;
use Illuminate\Support\Collection;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Laravel\Jetstream\HasTeams;
use Illuminate\Database\QueryException;
use PDF;
use Exception;

class SupervisorIngresoCamalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
 

        $ingresos_camal = null;
        $ingresos_camal1 = null;
        $querydateini="";
        $querydatefin="";
        $totalRecaudadoI=0;

        if ($request) {
            $query = trim($request->get('searchT'));
            $querydateini = trim($request->get('datefrom'));
            $querydatefin = trim($request->get('dateto'));
          //  dd($querydateini,$querydatefin);
        }
        if($query !=""){
            $ingresos_camal=IngresoCamal::with('users')
            ->whereHas('users', function($q) use ($query)
           {
               $q->where('nombres', 'like', '%'.$query.'%')
              ->orwhere('apellidos', 'like', '%'.$query.'%')
              ->orwhere('codigo', 'like', '%'.$query.'%');
           })->orwhere('ingresos.id', 'like', '%'.$query.'%')
             -> orwhere('ingresos.matricula', 'like', '%'.$query.'%')    
             ->paginate(10);
             $ingresos_camal1=IngresoCamal::with('users')
                  ->whereHas('users', function($q) use ($query)
                 {
                     $q->where('nombres', 'like', '%'.$query.'%')
                    ->orwhere('apellidos', 'like', '%'.$query.'%')
                    ->orwhere('codigo', 'like', '%'.$query.'%');
                 })->orwhere('ingresos.id', 'like', '%'.$query.'%')
                   -> orwhere('ingresos.matricula', 'like', '%'.$query.'%')    
                   ->get();
            
        }else{
            $ingresos_camal=IngresoCamal::with('users')  
            ->orderby('ingresos.fecha_ingreso', 'desc')
            ->paginate(10); 
            $ingresos_camal1=IngresoCamal::with('users')  
            ->orderby('ingresos.fecha_ingreso', 'desc')
            ->get();   
           
        }
        //-----BUSCAR POR RANGO DE FECHA----------------
        if($querydateini != "" && $querydatefin !=""){
                
            // $matriculaMercado = MatriculasMercado::whereBetween('fecha_matricula', [$querydateini, $querydatefin])->get()->take(15);
            $ingresos_camal = IngresoCamal::whereBetween('fecha_ingreso', [$querydateini, $querydatefin])->paginate(10);
            $ingresos_camal1 = IngresoCamal::whereBetween('fecha_ingreso', [$querydateini, $querydatefin])->get();
           
            } 
            foreach ($ingresos_camal1 as $matriculaI) {
                $totalRecaudadoI= $totalRecaudadoI + $matriculaI->costo_total;
              
               }
//dd($ingresos_camal1);
        $detalles_ingreso = DB::table('ingresos_detalle as det')
            ->join('costo_faenamiento as c', 'det.id_costo_faenamiento', '=', 'c.id')->get();

        $condiciones_transporte = ['ACERRIN PISO', 'ANIMAL PARADO COMODO', 'MEZCADOS', 'AMARRADOS', 'SIN AMARRAR'];
        return view('camal.supervisor-camal.IngresosCamal.index', ["ingresos_camal" => $ingresos_camal, "ingresos_camal1" => $ingresos_camal1, "searchT" => $query, "condiciones_transporte" => $condiciones_transporte, "detalles_ingreso" => $detalles_ingreso
        ,'datefrom'=>$querydateini,'dateto'=>$querydatefin,'totalRecaudadoI'=>$totalRecaudadoI]);
        //  } catch (\Exception $e) {
        //    return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        //}
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        dd("create");
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
      //  dd($request->get('id_ingreso'),$request->get('nro_factura'));
        $ingresoscamal = IngresoCamal::findOrFail($request->get('id_ingreso'));
        $ingresoscamal->numero_factura = trim($request->get('nro_factura'));
       // $MatriculaCamal->valor = trim($request->get('costo_matricula_edit'));
       $ingresoscamal->update();
        return redirect('supervisorcamal-ingresos-camal')->with('success', 'Nro de factura guardado con éxito');
     } catch (\Exception | QueryException $e) {
        return back()->withErrors(['exception' => $e->getMessage()])->withInput();
    } 
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request){
        //  try{
         
          $usuario = Auth::user();
          $totalRecaudado= $request->get('totalRecaudado');
          $ingresos = $request->get('ingresoCamal1');
          $ingresosPdf = json_decode($ingresos);
        // dd($ingresosPdf);
          $users = User::all();
          $pdf = PDF::loadView('camal.supervisor-camal.IngresosCamal.pdfingresosCamal', compact('ingresosPdf','users','totalRecaudado','usuario','ingresos'));
          $fecha_actual = date("Y-m-d_H-i-s");
          return $pdf->stream($fecha_actual . '_' . '_ingresosCamal.pdf');
         /*  }catch(\Exception | QueryException $e){
           return back()->withErrors(['exception' => $e->getMessage()]);
          } */
           
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        dd('edit');
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
        dd("hh");
      /*    //  try {
        //  dd($request);
        $ingresoscamal = IngresoCamal::findOrFail($request->get('id_ingreso'));
        $ingresoscamal->numero_factura = trim($request->get('nro_factutra'));
       // $MatriculaCamal->valor = trim($request->get('costo_matricula_edit'));
       $ingresoscamal->update();
        return redirect('supervisorcamal-ingresos-camal')->with('success', 'Nro de factura guardado con éxito');
  /*   } catch (\Exception | QueryException $e) {
        return back()->withErrors(['exception' => $e->getMessage()])->withInput();
    } */ 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        dd("des");
    }
}
