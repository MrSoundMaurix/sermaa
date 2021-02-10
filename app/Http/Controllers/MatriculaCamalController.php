<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\CostoCamal;
use App\Models\MatriculaCamal;

use Illuminate\Support\Facades\Auth;
use DB;
use Illuminate\Database\QueryException;
use Illuminate\Database\Eloquent\Builder;
use PDF;
use Exception;
class MatriculaCamalController extends Controller
{

    public function index(Request $request)
    {
       /*  $fechamercado= DB::table('fechas')->where('categoria',2)->orderby('id','desc')->first();
        dd($fechamercado); */

        $matriculas_camal = null;
        $users = null;
        $matriculas_camal1 = null;
        $querydateini="";
        $querydatefin="";
        $totalRecaudadoM=0;
        $a=array();
        $b=array();
        $usuarios_sin_m=array(); 

        if ($request) {
            $query = trim($request->get('searchT'));
            $querydateini = trim($request->get('datefrom'));
            $querydatefin = trim($request->get('dateto'));
          //  dd($querydateini,$querydatefin);
        }
        if($query !=""){
            $matriculas_camal=MatriculaCamal::join('users','id_users','=','users.id')
            ->select('matriculas_camal.id','fecha_matricula','costo_matricula','id_users','responsable_matricula') 
            ->where(function (Builder $querybuilder) use ($query) {
                return $querybuilder->orwhere('nombres', 'LIKE', '%' . $query . '%')
                    ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
                    ->orWhere('matriculas_camal.id', 'LIKE', '%' . $query . '%');
                    
            })
            ->paginate(10);
            $matriculas_camal1=MatriculaCamal::join('users','id_users','=','users.id') 
            ->select('matriculas_camal.id','fecha_matricula','costo_matricula','id_users','responsable_matricula') 
            ->where(function (Builder $querybuilder) use ($query) {
                return $querybuilder->orwhere('nombres', 'LIKE', '%' . $query . '%')
                    ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
                    ->orWhere('matriculas_camal.id', 'LIKE', '%' . $query . '%');
            })
            ->get();
            foreach ($matriculas_camal1 as $matriculaM) {
                $totalRecaudadoM= $totalRecaudadoM + $matriculaM->costo_matricula;
              
               }
        }else{
            $matriculas_camal=MatriculaCamal::with('user')->paginate(10);
            $matriculas_camal1=MatriculaCamal::with('user')->get();
            foreach ($matriculas_camal1 as $matriculaM) {
                $totalRecaudadoM= $totalRecaudadoM + $matriculaM->costo_matricula;
              
               }
        }
        //-----BUSCAR POR RANGO DE FECHA----------------
        if($querydateini != "" && $querydatefin !=""){
                
            // $matriculaMercado = MatriculasMercado::whereBetween('fecha_matricula', [$querydateini, $querydatefin])->get()->take(15);
            $matriculas_camal = MatriculaCamal::whereBetween('fecha_matricula', [$querydateini, $querydatefin])->paginate(10);
            $matriculas_camal1 = MatriculaCamal::whereBetween('fecha_matricula', [$querydateini, $querydatefin])->get();
            foreach ($matriculas_camal1 as $matriculaM) {
                $totalRecaudadoM= $totalRecaudadoM + $matriculaM->costo_matricula;
              
               }
            } 
        //----------------------------------------------------    
       //-------PARA EDITAR YCREAR MATRICULA----------------------------
        //Obtener todos los usuarios y usuarios matriculados en el año actual
        $id_usuarioscamal=User::where('current_team_id',8)->where('estado',0)->select('id','nombres','apellidos')->get(); 
        $id_usuariosmatriculados=MatriculaCamal::whereYear('fecha_matricula','=',date('Y'))->select('id_users')->get();
        $i=0; foreach($id_usuarioscamal as $u){$a[$i]=$u->id; $i++; } //Convertir Objeto de array a un arrar de id
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
         }
         $users=User::all();
        $costo_matricula=CostoCamal::where('id',5)->get();
        //-------------------------------------------------------
     
       return view('camal.supervisor-camal.matriculaCamal.index',['usuarios_sin_m'=>$usuarios_sin_m,'costo_matricula'=>$costo_matricula,'matriculas_camal'=>$matriculas_camal,'matriculas_camal1'=>$matriculas_camal1,'users'=>$users
    , 'searchT'=>$query ,'datefrom'=>$querydateini,'dateto'=>$querydatefin,'totalRecaudadoM'=>$totalRecaudadoM]);
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

    public function show(Request $request){
      //  try{
       
        $usuario = Auth::user();
        $totalRecaudado= $request->get('totalRecaudado');
        $matriculas = $request->get('matriculaMercado1');
        $matriculasPdf = json_decode($matriculas);
        $users = User::all();
        $pdf = PDF::loadView('camal.supervisor-camal.matriculaCamal.pdfmatriculasCamal', compact('matriculasPdf','users','totalRecaudado','usuario'));
        $fecha_actual = date("Y-m-d_H-i-s");
        return $pdf->stream($fecha_actual . '_' . '_matriculasMercado.pdf');
       /*  }catch(\Exception | QueryException $e){
         return back()->withErrors(['exception' => $e->getMessage()]);
        } */
         
     }
    public function store(Request $request)
    {
       try {
            $usuario = Auth::user();
           // $request->get('nombre_usuario');
            //dd($request->get('nombre_usuario'),$request->get('costo_matricula'));
                    $matriculaCamal = new MatriculaCamal();
                    $matriculaCamal->fecha_matricula = date("Y-m-d h:i:s");
                    $matriculaCamal->costo_matricula = $request->get('costo_matricula');
                    $matriculaCamal->responsable_matricula = Auth::id();
                    $matriculaCamal->id_users = $request->get('nombre_usuario');
                    $matriculaCamal->save();
                   
                    $matriculausuario= User::findOrFail($matriculaCamal->id_users);
                    $matriculausuario->estado_matricula=true;
                    $matriculausuario->update();
                   
                  //  dd($matriculaCamal );
            return redirect('matricula-camal')->with('success', 'Pago de Matrícula registrado exitosamente');
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
       try {
         // dd($request);
         if($request->get('id_matricula')==""||$request->get('nombre_usuario_edit')==""||$request->get('usuario_anterior')==""){
            return redirect('matricula-camal');
            }
        else{
            $MatriculaCamal = MatriculaCamal::findOrFail($request->get('id_matricula'));
            $MatriculaCamal->id_users = trim($request->get('nombre_usuario_edit'));
           // $MatriculaCamal->valor = trim($request->get('costo_matricula_edit'));
            $MatriculaCamal->update(); 

            $matriculausuario= User::findOrFail($request->get('nombre_usuario_edit'));
            $matriculausuario->estado_matricula=true;
            $matriculausuario->update();
            
                if($request->get('usuario_anterior')!=$request->get('nombre_usuario_edit')){
                        $matriculausuario= User::findOrFail($request->get('usuario_anterior'));
                        $matriculausuario->estado_matricula=false;
                        $matriculausuario->update();
                } 
            return redirect('matricula-camal')->with('success', 'La matricula ha sido actualizado con éxito');    
        }
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
        //
    }
}
