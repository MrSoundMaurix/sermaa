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
use PDF;

class SupervisorDistribucionCamalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        try{
        $distribuciones_camal = null;
        $distribuciones_camal1 = null;
        $querydateini="";
        $querydatefin="";
        $totalRecaudadoD=0;

         if ($request) {
            $query = trim($request->get('searchT'));
            $querydateini = trim($request->get('datefrom'));
            $querydatefin = trim($request->get('dateto'));
          //  dd($querydateini,$querydatefin);
        }
        if($query !=""){  
            $distribuciones_camal=CabeceraDistribucion::with('ingresos')
            ->orwhere('nombre_destinatario', 'like', '%'.$query.'%')
             ->orwhere('lugar_destino', 'like', '%'.$query.'%')
              ->orwhere('id_ingresos', 'like', '%'.$query.'%')
            ->paginate(10);
             $distribuciones_camal1=CabeceraDistribucion::with('ingresos')->
                  orwhere('nombre_destinatario', 'like', '%'.$query.'%')
              ->orwhere('lugar_destino', 'like', '%'.$query.'%')
              ->orwhere('id_ingresos', 'like', '%'.$query.'%')
                 ->get();    
        }else{
            $distribuciones_camal=CabeceraDistribucion::with('ingresos')->paginate(10); 
            $distribuciones_camal1=CabeceraDistribucion::with('ingresos')->get();   
           
        }
        //-----BUSCAR POR RANGO DE FECHA----------------
        if($querydateini != "" && $querydatefin !=""){
                
            // $matriculaMercado = MatriculasMercado::whereBetween('fecha_matricula', [$querydateini, $querydatefin])->get()->take(15);
            $distribuciones_camal = CabeceraDistribucion::with('ingresos')->whereBetween('fecha_actual', [$querydateini, $querydatefin])->paginate(10);
            $distribuciones_camal1 = CabeceraDistribucion::with('ingresos')->whereBetween('fecha_actual', [$querydateini, $querydatefin])->get();
           
            } 
            foreach ($distribuciones_camal1 as $distribucionD) {
                $totalRecaudadoD= $totalRecaudadoD + $distribucionD->costo_transporte;
              
               } 
               $users=User::all();
              
    //  dd($distribuciones_camal1);
        return view('camal.supervisor-camal.DistribucionesCamal.index', ["distribuciones_camal" => $distribuciones_camal, "distribuciones_camal1" => $distribuciones_camal1, "searchT" => $query,
        'datefrom'=>$querydateini,'dateto'=>$querydatefin,'totalRecaudadoD'=>$totalRecaudadoD,'users'=>$users]);
         } catch (\Exception $e) {
           return back()->withErrors(['exception' => $e->getMessage()])->withInput();
    }
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
         //  try{
         
            $usuario = Auth::user();
            $totalRecaudado= $request->get('totalRecaudado');
            $distribuciones = $request->get('distribucionCamal1');
            $distribucionesPdf = json_decode($distribuciones);
          // dd($distribuciones[0]->nombre_destinatario);
            $users = User::all();
            $pdf = PDF::loadView('camal.supervisor-camal.DistribucionesCamal.pdfdistribucionesCamal', compact('distribucionesPdf','users','totalRecaudado','usuario','distribuciones'));
            $fecha_actual = date("Y-m-d_H-i-s");
            return $pdf->stream($fecha_actual . '_' . '_distribucionesCamal.pdf');
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
        //
    }
}
