<?php

namespace App\Http\Controllers;

use App\Http\Requests\PagosPuestoMercadoRequest;
use App\Models\PagosPuestoMercado;
use App\Models\PuestoMercado;
use App\Models\PuestosMercado;
use App\Models\TipoPagoMercado;
use App\Models\MatriculasMercado;
use App\Models\User;
use App\Models\Fecha;
use DB;
use Image;
use PDF;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Date;

class PagosPuestosMercadoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        
       
        $puestosMercado = null;
        $pagosPuestoMercado = null;
        $pagosPuestoMercado1=null;
        $query="";
        $querydateini="";
        $querydatefin="";
        
 
        $puestosMercado1="";
        $datefrom=""; 
        $dateto="";
        $totalRecaudadoP=0;
        
      /*   try { */
     
            if ($request) {
                
                $query = trim($request->get('searchT'));
                $querydateini = trim($request->get('datefrom'));
                $querydatefin = trim($request->get('dateto'));
          // dd($query);
            }
            if($query!=""){
            
          $pagosPuestoMercado = PagosPuestoMercado::join('users','id_users','=','users.id')  
              
               ->where(function (Builder $querybuilder) use ($query) {
                    return $querybuilder->where('nombres', 'LIKE', '%' . $query . '%')
                        ->orWhere('apellidos', 'LIKE', '%' . $query . '%')
                        ->orWhere('pagos_puesto_mercado.matricula', 'LIKE', '%' . $query . '%');
                        
                })->with('user','responsableCobro','puestoMercado')
                ->paginate(10);
                
              //  $pagosPuestoMercado = PagosPuestoMercado::with('user','responsableCobro','puestoMercado')->paginate(10);
           //     $puestosMercado = PuestosMercado::paginate(10); 
           $pagosPuestoMercado1 = PagosPuestoMercado::join('users','id_users','=','users.id')  
              
           ->where(function (Builder $querybuilder) use ($query) {
                return $querybuilder->orwhere('nombres', 'LIKE', '%' . $query . '%')
                    ->orWhere('apellidos', 'LIKE', '%' . $query . '%');
                    
            })
            ->get();
            $puestosMercado1= PuestoMercado::all()->first();
            }else{
                
          // $puestosMercado = PuestosMercado::paginate(10);
          $pagosPuestoMercado = PagosPuestoMercado::with('user','responsableCobro','puestoMercado')->where('pago_realizado',1)
          ->orderby('fecha_pago','desc')->paginate(10);
          $pagosPuestoMercado1 = PagosPuestoMercado::where('pago_realizado',1)->get();
         // $puestosMercado1= PuestoMercado::with('user')->get();
            }
            if($querydateini != "" && $querydatefin !=""){
            
                $pagosPuestoMercado = PagosPuestoMercado::whereRaw("fecha_pago >= ? AND fecha_pago <= ?", 
                array($querydateini." 00:00:00", $querydatefin." 23:59:59"))->with('user','responsableCobro','puestoMercado')->where('pago_realizado',1)->orderby('fecha_pago','desc')->paginate(10);
                $pagosPuestoMercado1 = PagosPuestoMercado::whereRaw("fecha_pago >= ? AND fecha_pago <= ?", 
                array($querydateini." 00:00:00", $querydatefin." 23:59:59"))->where('pago_realizado',1)->get();
                $puestosMercado1= PuestoMercado::all()->first();
            }
            $puestosMercado= PuestoMercado::with('user')->get();

            
            foreach ($pagosPuestoMercado1 as $pago) {
                $totalRecaudadoP= $totalRecaudadoP + $pago->valor_total;
              
               }


               $puestos_us=array();
               $i=0;
                  $puestosMe = PuestosMercado::with(['sectorMercado' => function ($query) {
                    $query->with('tipo_pago')  ;
                   }])->where('estado_puesto','A')->with('user')->get();
                   foreach ($puestosMe as $p) 
                   { 
                     if($p->sectorMercado->tipo_pago->estadia=="EVENTUAL"||$p->sectorMercado->tipo_pago->estadia=="OCASIONAL") 
                     {
                       $pagosPuestoM = PagosPuestoMercado::where('id_puestos_mercado',$p->id)
                       ->whereDay('fecha_pago',Date('d'))->where('pago_realizado',true)->get();
                       if($pagosPuestoM==null||$pagosPuestoM==""||$pagosPuestoM=="[]"){
                           $puestos_us[$i]=['id_puesto'=>$p->id,'nro_puesto'=>$p->nro_puesto,
                           'nombres'=>$p->user->nombres.''.$p->user->apellidos];
                           $i++;
                       }
                     }
                     else if($p->sectorMercado->tipo_pago->estadia=="PERMANENTE")
                     {
                       $pagosPuestoM = PagosPuestoMercado::where('id_puestos_mercado',$p->id)
                       ->whereMonth('fecha_pago',Date('m'))->where('pago_realizado',true)->get();
                       if($pagosPuestoM==null||$pagosPuestoM==""||$pagosPuestoM=="[]"){  
                           $puestos_us[$i]=['id_puesto'=>$p->id,'nro_puesto'=>$p->nro_puesto,
                           'nombres'=>$p->user->nombres.' '.$p->user->apellidos];    
                           $i++;
                       }
                     }  
                   }
              //  dd('pu= ',$puestos_us,$i,$puestosMe);
        return view('pagosPuestoMercado.index',["pagosPuestoMercado"=>$pagosPuestoMercado,"pagosPuestoMercado1"=>$pagosPuestoMercado1, "puestosMercado"=>$puestosMercado,"puestosMercado1"=>$puestosMercado1,
        'searchT'=>$query,'datefrom'=>$querydateini, 'puestos_us'=>$puestos_us,'totalRecaudadoP'=>$totalRecaudadoP,'dateto'=>$querydatefin]);
  /*   } catch (\Exception $e) {
        DB::rollback();
        return back()->withErrors(['exception' => $e->getMessage()])->withInput();
    } */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        try {
            $estadoPagosMercado =['Si','No'];
            $puestosMercado = PuestosMercado::all()->where('estado_puesto', '=', 'A');
            $tipoPago = TipoPagoMercado::all();
           
            $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
            $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            return view('pagosPuestoMercado.create', compact('puestosMercado', 'dias', 'meses', 'tipoPago','estadoPagosMercado','matriculasVigentes'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    public function createWithParams(Request $request)
    {
       // try {
        
            // $request->all();
   
            
        
            $matriculaVigente="";
            $puestoMercado="";
            $id_user="";
            $estado_matricula="N";
            $id_puestos_mercado=$request->input('id_puestos_mercado');
               if($id_puestos_mercado==null||$id_puestos_mercado=="[]"
        ||$id_puestos_mercado==""){
           return redirect('pagos-puesto-mercado');
        } 
       
            $puestoMercado = PuestosMercado::with(['sectorMercado' => function ($query) {
                $query->with('tipo_pago');    
            }])->find($request->input('id_puestos_mercado'));
          //  dd($puestoMercado);
            if($puestoMercado!=null){
            $id_user=$puestoMercado->id_users;
            $estado_matricula=$puestoMercado->matriculado;
        }
            $users = User::find($id_user);
            $tipoPagoCat= TipoPagoMercado::where('categoria','=',2)->first();
          //  dd($tipoPagoCat);
            if($estado_matricula=="S"){
                $matriculaVigente="Si";
     
             }else{
                 $matriculaVigente="No";
             }
           
            $pagosPuestoMercado = PagosPuestoMercado::where('id_puestos_mercado','=',$request->input('id_puestos_mercado'))->where('pago_realizado',0)->
            with('user','responsableCobro','puestoMercado')->orderby('id','desc')->get();



            $pagoSN='1';
           
            $puestosMe = PuestosMercado::with(['sectorMercado' => function ($query) {
                $query->with('tipo_pago')  ;
               }])->where('estado_puesto','A')->where('id',$request->input('id_puestos_mercado'))
               ->with('user')->get();
             //  dd($puestosMe);              
                 if($puestosMe[0]->sectorMercado->tipo_pago->estadia=="EVENTUAL"||
                 $puestosMe[0]->sectorMercado->tipo_pago->estadia=="OCASIONAL") 
                 {
                   $pagosPuestoM = PagosPuestoMercado::where('id_puestos_mercado',$puestosMe[0]->id)
                   ->whereDay('fecha_pago',Date('d'))->where('pago_realizado',false)->get();
                  // dd($pagosPuestoM);
                   if($pagosPuestoM==null||$pagosPuestoM==""||$pagosPuestoM=="[]"){
                      
                   }else{
                    $pagoSN='0';
                   }
                 }
                 else if($puestosMe[0]->sectorMercado->tipo_pago->estadia=="PERMANENTE")
                 {
                   $pagosPuestoM = PagosPuestoMercado::where('id_puestos_mercado',$puestosMe[0]->id)
                   ->whereMonth('fecha_pago',Date('m'))->where('pago_realizado',false)->get();
                   if($pagosPuestoM==null||$pagosPuestoM==""||$pagosPuestoM=="[]"){  
                    
                   }else{
                    $pagoSN='0'; 
                   }
                 } 
               //  dd($puestosMe,$pagoSN,$pagosPuestoM);   
               

             $fecha=Fecha::where('categoria',2)->orderby('created_at','desc')->first();
             $puestosMercado= PuestoMercado::where('id',$request->input('id_puestos_mercado'))->get();
            
                
            return view('pagosPuestoMercado.create', compact('puestoMercado','matriculaVigente','users','tipoPagoCat',
            'pagosPuestoMercado','fecha','puestosMercado','pagoSN'));
     /*    } catch (\Exception $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        } */
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create2(Request $request)
    {
        try {
            $puestosMercado = PuestosMercado::all();
            $tipoPago = TipoPagoMercado::all();
            $dias = ['Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado', 'Domingo'];
            $meses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            return view('pagosPuestoMercado.create2', compact('puestosMercado', 'dias', 'meses', 'tipoPago'));
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

//dd($request);
         $userPago=User::find($request->get('id_users'));
           $input = $request->all();
         //  dd($input);
            if(!$userPago->estado_matricula && $request->get('tipo_permanencia')==2 ||!$userPago->estado_matricula && $request->get('tipo_permanencia')==3){ 
             $input['valor_total']=$request->get('valor_total')+$request->get('valor_adicional');
            }
            if($request->get('pago_realizado')=="true"){
                $input['pago_realizado']=true;
            }else{
                $input['pago_realizado']=false;
            }
            $input["fecha"] = date("Y-m-d H:i:s");  //obtener time stamp
            $input["fecha_pago"] = date("Y-m-d H:i:s");
            $input["responsable_cobro"] = Auth::user()->id;
            if ($request->hasFile('foto')) {
                $image = $request->file('foto');
                $imageType = $image->getClientOriginalExtension();
                $imageStr = (string)Image::make($image)->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode($imageType);
                $input['foto'] = base64_encode($imageStr);
                $input['fototype'] = $imageType;
            }
            PagosPuestoMercado::create($input);
             if($input['pago_realizado']==false){
                $id_puestos_mercado=$input["id_puestos_mercado"];
            return redirect('pagos-puesto-mercado/create?id_puestos_mercado='.$id_puestos_mercado.'')->with('success', 'Pago del puesto registrado exitosamente');
               
            } 
            return redirect('pagos-puesto-mercado')->with('success', 'Pago del puesto registrado exitosamente');
        } catch (\Exception $e) {
            DB::rollback();
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
      //  try{
     $usuario = Auth::user();
    /*       $totalRecaudado= $request->get('totalRecaudado');
        
        $matriculasPdf = json_decode($matriculas);
        $users = User::all();*/
       
        $totalRecaudado= $request->get('totalRecaudado');
       // $puestosMercado = $request->get('pagoMercado1');
        $puestosMercado= PuestoMercado::all();
      // dd($puestosMercado);
       $puestosMercado=json_decode($puestosMercado);
        $pagosPuestoMercado1 =json_decode($request->get('pagosPuestoMercado1'));
      // dd($pagosPuestoMercado1,$puestosMercado,$totalRecaudado);
        $users = User::all();
        $pdf = PDF::loadView('pagosPuestoMercado.pdfpagosPuestoMercado', compact('pagosPuestoMercado1','puestosMercado','users','usuario','totalRecaudado'));
        $fecha_actual = date("Y-m-d_H-i-s");
        return $pdf->stream($fecha_actual . '_' . '_pagosPuestosMercado.pdf');
       /*  }catch(\Exception | QueryException $e){
            return back()->withErrors(['exception' => $e->getMessage()]);
        } */
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pagosPuestoMercado = PagosPuestoMercado::findOrFail($id);
        return view('pagosPuestoMercado.edit', compact('pagosPuestoMercado'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(PagosPuestoMercadoRequest $request, $id)
    {
        try {
          //  dd($request->file('foto2'));
           
               $pagosPuestoMercado = PagosPuestoMercado::findOrFail($request->id);
                $pagosPuestoMercado->valor_total = $pagosPuestoMercado->valor_total;
                $pagosPuestoMercado->fecha_pago = date("Y-m-d H:i:s");
                if($request->get('pago_realiza')=="Si"){
                $pagosPuestoMercado->pago_realizado = true;
                }else if($request->get('pago_realiza')=="No"){
                    $pagosPuestoMercado->pago_realizado = false;
                }
                
                $pagosPuestoMercado->observacion=$request->get('observacion');

                if ($request->hasFile('foto2')) {
                    $image = $request->file('foto2');
                    $imageType = $image->getClientOriginalExtension();
                    $imageStr = (string) Image::make($image)->resize(300, null, function ($constraint) {
                        $constraint->aspectRatio();
                    })->encode($imageType);
    
                    $pagosPuestoMercado->foto = base64_encode($imageStr);
                    $pagosPuestoMercado->fototype = $imageType;    
                }
                $pagosPuestoMercado->update();
                if($request->get('pago_realiza')=="No"){
                return redirect('pagos-puesto-mercado/create?id_puestos_mercado='.$request->id_puestos_mercado.'')->with('success', 'Pago del puesto del mercado actualizado con éxito');
                }else if($request->get('pago_realiza')=="Si"){
                    return redirect('pagos-puesto-mercado')->with('success', 'Pago del puesto del mercado actualizado con éxito');
                }
          
        } catch (\Exception | QueryException $e) {
            return back()->withErrors(['exception' => $e->getMessage()])->withInput();
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
