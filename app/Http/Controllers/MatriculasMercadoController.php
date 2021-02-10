<?php

namespace App\Http\Controllers;

use App\Http\Requests\MatriculasMercadoRequest;
use App\Models\MatriculasMercado;
use App\Models\PuestosMercado;
use App\Models\TipoPagoMercado;
use App\Models\Fecha;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use DB;
use PDF;
use Exception;
use Illuminate\Support\Facades\Auth;
use SebastianBergmann\Environment\Console;

class MatriculasMercadoController extends Controller
{
    //
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   
    public function index(Request $request)
    {
        $matriculaMercado = null;
        $users = null;
        $matriculaMercado1 = null;
        $querydateini="";
        $querydatefin="";
        $totalRecaudadoM=0;
        try {
             
            if ($request) {
                $query = trim($request->get('searchT'));
                $querydateini = trim($request->get('datefrom'));
                $querydatefin = trim($request->get('dateto'));
              //  dd($querydateini,$querydatefin);
            }
            if($query !=""){
           $matriculaMercado=MatriculasMercado::join('puestos_mercado','id_puestos_mercado','=','puestos_mercado.id') 
          /*  ->join('users','id_users','=','users.id')->select('users.codigo','users.nombres','users.apellidos',
           'matriculas_mercado.nro_puesto','matriculas_mercado.costo_matricula','matriculas_mercado.tipo_matricula',
           'matriculas_mercado.multa','matriculas_mercado.responsable_matricula') */
               ->where(function (Builder $querybuilder) use ($query) {
                    return $querybuilder->where('nro_puesto', 'LIKE', '%' . $query . '%')
                    ->orwhere('tipo_matricula', 'LIKE', '%' . $query . '%');
       
                })
                ->paginate(10);
                $matriculaMercado1=MatriculasMercado::join('puestos_mercado','id_puestos_mercado','=','puestos_mercado.id')
                /* ->select('users.codigo', 'users.direccion', 'users.telefono', 'users.cedula', 'users.nombres','users.apellidos','matriculas_mercado.fecha_matricula'
                ,'matriculas_mercado.costo_matricula','matriculas_mercado.id_puestos_mercado','matriculas_mercado.multa','matriculas_mercado.responsable_matricula')
               */ ->where(function (Builder $querybuilder) use ($query) {
                     return $querybuilder->orwhere('nro_puesto', 'LIKE', '%' . $query . '%')
                     ->orwhere('tipo_matricula', 'LIKE', '%' . $query . '%');
                        
                })
                ->get();
                foreach ($matriculaMercado1 as $matriculaM) {
                    $totalRecaudadoM= $totalRecaudadoM + $matriculaM->costo_matricula;
                  
                   }
                
            }else{
           $matriculaMercado=MatriculasMercado::paginate(10);
          //dd($matriculaMercado);
           $matriculaMercado1=MatriculasMercado::get();
           //  dd($matriculaMercado1);
           foreach ($matriculaMercado1 as $matriculaM) {
            $totalRecaudadoM= $totalRecaudadoM + $matriculaM->costo_matricula;
          
           }
            }
         if($querydateini != "" && $querydatefin !=""){
            $totalRecaudadoM=0;   
        // $matriculaMercado = MatriculasMercado::whereBetween('fecha_matricula', [$querydateini, $querydatefin])->get()->take(15);
        $matriculaMercado = MatriculasMercado::whereRaw("fecha_matricula >= ? AND fecha_matricula <= ?", 
         array($querydateini." 00:00:00", $querydatefin." 23:59:59"))->paginate(10);
       $matriculaMercado1 = MatriculasMercado::whereRaw("fecha_matricula >= ? AND fecha_matricula <= ?", 
       array($querydateini." 00:00:00", $querydatefin." 23:59:59"))->get();
     //  dd($matriculaMercado1);
        foreach ($matriculaMercado1 as $matriculaM) {
            $totalRecaudadoM= $totalRecaudadoM + $matriculaM->costo_matricula;
          
           }
          
        }
        $users = User::all();
           $usuarios_mercado=User::where('current_team_id', 10)->where('estado',0)->get();
         //  dd($usuario_mercado); 
            $tipoPago = TipoPagoMercado::where('categoria', 1)->get();
          
     //   dd($matriculaMercado1);
         return view('matriculasMercado.index', ["matriculaMercado" => $matriculaMercado, "matriculaMercado1" => $matriculaMercado1, "users" => $users,'tipoPago'=>$tipoPago,'searchT'=>$query
         ,'datefrom'=>$querydateini,'dateto'=>$querydatefin,'totalRecaudadoM'=>$totalRecaudadoM,'usuarios_mercado'=>$usuarios_mercado]);
        
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
      
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $users=null;
        $id_users=$request->get('id_users');
       //dd($id_users);
        $puestos_usuario=null;
        $cantidad_puestos=null;
        $dentrodelplazo="NO";
       // $fueradelplazo="NO";
      //  try {

         if($id_users!=null){
         
            $puestos_usuario = PuestosMercado::with(['sectorMercado' => function ($query) {
               /*  $query->with(['tipo_pago' => function ($q) {
                    $q->where('estadia','PERMANENTE')->orwhere('estadia',' EVENTUAL');
                }]);   */  
                $query->with('tipo_pago')  ;
            }])->where('id_users',$id_users)->where('matriculado','N')->get();
        
         } 
         
         
       //  dd($cantidad_puestos);
       $fecha=Fecha::where('categoria',2)->orderby('created_at','desc')->first();
       if(date('Y-m-d') > date('Y').'-'.$fecha->mes.'-'.$fecha->dia){
        $dentrodelplazo="NO";
       }else{  
        $dentrodelplazo="SI";
       }
     
       $tipoPago = TipoPagoMercado::where('categoria', 1)->get(); 
       $fecha=Fecha::where('categoria',2)->orderby('id','desc')->first();
            
           // dd($tipoPago);
            return view('matriculasMercado.create', compact('users','tipoPago','puestos_usuario','id_users',
            'fecha','dentrodelplazo'));
       /*  } catch (\Exception $e) {

            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        } */
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Request $request)
    {
       // try {
            $usuario = Auth::user();
          //  dd(count($request->get('sector')));
           $id_users=$request->get('id_users');
           $matricula=$request->get('matricula');
           $costo_matricula=$request->get('costo');
           $id_puesto=$request->get('id_puesto');
           $cont = 0;
          // dd($request);
            if ($id_users != 0) {
                while ($cont < count($request->get('sector'))) {
                    $matricuaMercado = new MatriculasMercado();
                    $matricuaMercado->fecha_matricula = date("Y-m-d H:i:s");
                    $matricuaMercado->costo_matricula = $costo_matricula[$cont];
                    if($matricula[$cont]=="ORDINARIA"){
                        $matricuaMercado->multa = false;
                    } else if($matricula[$cont]=="EXTRAORDINARIA"){
                        $matricuaMercado->multa = true;
                    }
                    $matricuaMercado->tipo_matricula = $matricula[$cont];
                   // dd($matricula[$cont]);
                    $matricuaMercado->responsable_matricula = $usuario->id;
                    $matricuaMercado->id_puestos_mercado = $id_puesto[$cont];
                    $matricuaMercado->save();
                    
                    $pu=PuestosMercado::find($id_puesto[$cont]);  
                    $pu->matriculado='S';
                    $pu->update();
                    $cont++;

                }
                
            }
           
            return redirect('matriculas-mercado')->with('success', 'Pago Matrícula registrado exitosamente');
       /*  } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        } */
    }

    public function showMatriculasMercado(){
        try {
            
            $matriculaC = MatriculasMercado::whereYear('fecha_matricula', '<', date("Y"));

        }catch (\Exception | QueryException $e){
            return back()->withErrors(['exception' => $e->getMessage()]);
        }
    }
    public function show(Request $request){
     // try{
        // dd($request);
        $usuario = Auth::user();
        $totalRecaudado= $request->get('totalRecaudado');
        $matriculas = $request->get('matriculaMercado1');
      //  dd($matriculas);
        $matriculasPdf = json_decode($matriculas);
        $users = User::all();
        $pdf = PDF::loadView('matriculasMercado.pdfmatriculasMercado', compact('matriculasPdf','users','totalRecaudado','usuario'));
        $fecha_actual = date("Y-m-d_H-i-s");
        return $pdf->stream($fecha_actual . '_' . '_matriculasMercado.pdf');
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

        $matriculaMercado = MatriculasMercado::findOrFail($id);
        $users = User::where('current_team_id', 10)->get();

        return view('matriculasMercado.edit', compact('matriculaMercado', 'usersFil'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(MatriculasMercadoRequest $request)
    {
        try {
            // MatriculasMercado::updateOrCreate(['id' => $request->id], $request->all());
            $usuario = Auth::user();
            $matricula = MatriculasMercado::where('id', $request->id)->first();
            $tipoPa=TipoPagoMercado::where('id', $request->get('id_tipo_pago'))->get();
            if ($tipoPa[0]->descripcion== "matricula extraordinaria") {
               $tipoPago = TipoPagoMercado::where('id', $request->get('id_tipo_pago'))->get();
                $matricula->update(['costo_matricula' => $tipoPago[0]->valor_pago]);
                $matricula->update(['fecha_matricula' => date("Y-m-d h:i:s")]);
                $matricula->update(['multa' => true]);
                $matricula->update(['id_users' => $request->get('id_users')]);
                $matricula->update(['responsable_matricula' => $usuario->id]);
            } else if ($tipoPa[0]->descripcion == "matricula ordinaria") {
                $tipoPago = TipoPagoMercado::where('id', $request->get('id_tipo_pago'))->get();
                $matricula->update(['costo_matricula' => $tipoPago[0]->valor_pago]);
                $matricula->update(['fecha_matricula' => date("Y-m-d h:i:s")]);
                $matricula->update(['multa' => false]);
                $matricula->update(['id_users' => $request->get('id_users')]);
                $matricula->update(['responsable_matricula' => $usuario->id]);
            }
           
            return redirect('matriculas-mercado')->with('success', 'Matricula Mercado actualizado con éxito');
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }
}
