
@extends('layouts.applte') 
@section('contenido')
@include('gerente/gerente-camal/detallesIngresoModal')
@include('gerente/gerente-camal/condicionesIngresoModal')
<link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <div class="content-wrapper">
  
            @include('layouts.messages')
            <div class="content">
                <div class="modal-body">
                    <div class="card card-info card-outline" >
                        <div class="card">
                            <div class="card-header">  
                                <div class="row">
                                    <div class= "col-sm-3">
                                    </div>
                                    <div class="col-sm-7"> 
                                   
                                        <h3 class="card-title" style="text-align: center;">REPORTE DIARIO, MENSUAL Y ANUAL DEL MERCADO DE ANTONIO ANTE SERMAA-EP </h3> 
                                    </div>  
                                </div>  
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        {!!Form::open(array('url'=>'calcularDia','method'=>'GET','autocomplete'=>'off'))!!} 
                                        {{Form::token()}}
                                        @csrf
                                        <div class="card border-primary rounded-0">
                                            <fieldset class="form-group">
                                                <div class="row">
                                                <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">           
                                                    <label>Filtrar por día:</label>
                                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                        <input style="background: transparent;" type="text" class="form-control datetimepicker-input"  value="{{$fecha_dia}}"  name="fecha_ingreso" id="fecha_ingreso"data-target="#timepicker" required readonly/>
                                                        <input type="hidden" id="comprobador1" name="comprobador1" value="comprobador1"/>
                                                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                            <div class="input-group-text"></i> <i class="fas fa-calendar-day text-info"></i></div>
                                                        </div>
                                                        </div> 
                                                </div>
                                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                                <label>Mostrar</label> 
                                                    <span class="input-group-prepend">
                                                    </span>
                                                    <button class="btn btn-info" type="submit">Mostrar</button>
                                                {{-- <a href="{{route('antemorten.create')}}" type="button" class="btn btn-success" >Consultar</a> --}}
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>   
                                        {{Form::Close()}}  
                                         
                                         
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        {!!Form::open(array('url'=>'calcularMes','method'=>'GET','autocomplete'=>'off'))!!} 
                                        <div class="card border-primary rounded-0">
                                            <fieldset class="form-group">
                                                <div class="row">
                                                <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">           
                                                    <label>Filtar por mes:</label>
                                                        <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                                        <input style="background: transparent;" type="text" class="form-control datetimepicker-input" value="{{$fecha_mes}}" name="fecha_mes_ingreso" id="fecha_mes_ingreso"data-target="#timepicker2" required readonly/>
                                                        <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="fas fa-calendar-week text-info"></i></div>
                                                        </div>
                                                        </div> 
                                                </div>
                                                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                                                    <label>Mostrar</label>
                                                    <span class="input-group-prepend">
                                                    </span>
                                                    <button class="btn btn-info" type="submit">Mostrar</button>
                                                {{-- <a href="{{route('antemorten.create')}}" type="button" class="btn btn-success" >Consultar</a> --}}
                                                    </div>
                                                </div>
                                            </fieldset>
                                        </div>   
                                         {{Form::Close()}} 
                                    </div>
                                    <div class="col-sm-12 col-md-4 col-lg-4">
                                        {!!Form::open(array('url'=>'calcularAnio','method'=>'GET','autocomplete'=>'off'))!!} 
                                            <div class="card border-primary rounded-0">
                                                <fieldset class="form-group">
                                                    <div class="row">
                                                    <div class="col-lg-7 col-sm-7 col-md-7 col-xs-12">           
                                                        <label>Filtrar por año:</label>
                                                            <div class="input-group date" id="timepicker3" data-target-input="nearest">
                                                            <input style="background: transparent;" type="text" class="form-control datetimepicker-input" value="{{$fecha_anio}}" 
                                                            name="fecha_anio_ingreso" id="fecha_anio_ingreso"data-target="#timepicker3" required readonly/>
                                                            <div class="input-group-append" data-target="#timepicker3" data-toggle="datetimepicker">
                                                                <div class="input-group-text"><i class="fas fa-calendar-alt text-info"></i></div>
                                                            </div>
                                                            </div> 
                                                    </div>
                                                    <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                                                        <label>Mostrar</label>
                                                        <span class="input-group-prepend">
                                                        </span>
                                                        <button class="btn btn-info" type="submit">Mostrar</button>
                                                    {{-- <a href="{{route('antemorten.create')}}" type="button" class="btn btn-success" >Consultar</a> --}}
                                                        </div>
                                                    </div>
                                                </fieldset>
                                            </div>    
                                        {{Form::Close()}} 
                                    
                                    
                                    </div>

                                </div>    
                                <div class="row">
                                    <div class="col-sm-12  col-lg-6 col-md-6" >
                                        <div class="table-responsive">
                                            <h4>Matrículas</h4>
                                            <table class="table datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border: #1bb2ca 3px solid;border-radius: 15px; -moz-border-radius: 20px; padding: 2px; border-collapse: separate; border-spacing: 5;">
                                                <thead  >
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                                        aria-label="Nombre: activate to sort column ascending" style="width: 25px;">Matrículas</th>
                                                        <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                                        aria-label="Nombre: activate to sort column ascending" style="width: 25px;">Total</th> 
                                                        <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                                        aria-label="Nombre: activate to sort column ascending" style="width: 100px;">$ Recaudado</th>
                                                    </tr>
                                                </thead>
                                                @if(isset($resumen_matriculas))
                                                    <tr role="row" class="odd">   
                                                        <td class="sorting_1">Ordinaria</td>   
                                                        <td class="sorting_1">{{$resumen_matriculas["ordinaria"]}}</td>    
                                                        <td class="sorting_1">$ {{$resumen_matriculas["pago_ordinaria"]}}</td>    
                                                         
                                                       
                                                    </tr>
                                                    <tr role="row" class="odd">   
                                                        <td class="sorting_1">Extraordinaria</td>   
                                                        <td class="sorting_1">{{$resumen_matriculas["extraordinaria"]}}</td>    
                                                        <td class="sorting_1">$ {{$resumen_matriculas["pago_extraordinaria"]}}</td>    
                                                         
                                                       
                                                    </tr>
                                                    <tr role="row" class="odd">   
                                                        <td class="sorting_1">Total</td>   
                                                        <td class="sorting_1">{{$resumen_matriculas["total"]}}</td>    
                                                        <td class="sorting_1">$ {{$resumen_matriculas["pago_total"]}}</td>    
                                                    </tr>
                                                   
                                                @endif   
                                                <tbody>

                                                </tbody>

                                            </table>
                                        </div>  
                                
                                    </div>
                                    <div class="col-sm-12  col-lg-6 col-md-6" >
                                        <div class="table-responsive">
                                            <h4>Arrendamiento</h4>
                                            <table class="table datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" 
                                            aria-describedby="DataTables_Table_0_info" style="border: #1bb2ca 3px solid;border-radius: 15px; -moz-border-radius: 20px; padding: 2px; border-collapse: separate; border-spacing: 5;">
                                                <thead  >
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                                        aria-label="Nombre: activate to sort column ascending" style="width: 25px;">Estadía</th>
                                                        <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                                        aria-label="Nombre: activate to sort column ascending" style="width: 25px;">Arrendamiento</th> 
                                                        <th  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" 
                                                        aria-label="Nombre: activate to sort column ascending" style="width: 100px;">$ Recaudado</th>
                                                    </tr>
                                                </thead>
                                                @if(isset($resumen_arrendamiento))
                                                    <tr role="row" class="odd">   
                                                        <td class="sorting_1">Permanentes</td>   
                                                        <td class="sorting_1">{{$resumen_arrendamiento["permanente"]}}</td>    
                                                        <td class="sorting_1">$ {{$resumen_arrendamiento["pagos_permanente"]}}</td>
                                                    </tr>
                                                    <tr role="row" class="odd">   
                                                        <td class="sorting_1">Ocasionales</td>   
                                                        <td class="sorting_1">{{$resumen_arrendamiento["ocasional"]}}</td>    
                                                        <td class="sorting_1">$ {{$resumen_arrendamiento["pagos_ocasional"]}}</td>
                                                    </tr> 
                                                    <tr> 
                                                        <td class="sorting_1">Eventuales</td>   
                                                        <td class="sorting_1">{{$resumen_arrendamiento["eventual"]}}</td>    
                                                        <td class="sorting_1">$ {{$resumen_arrendamiento["pagos_eventual"]}}</td>
                                                    </tr> 
                                                    <tr> 
                                                        <td class="sorting_1">Total</td>   
                                                        <td class="sorting_1">{{$resumen_arrendamiento["total"]}}</td>    
                                                        <td class="sorting_1">$ {{$resumen_arrendamiento["pago_total"]}}</td>
                                                    </tr> 
                                                @endif   
                                                <tbody>

                                                </tbody>

                                            </table>
                                        </div>  
                                
                                    </div>
                                </div>
                                <div class="row">
                                    <div clas="row justify-content-center" >
                                        @include('gerente/gerente-camal/search')
                                        </div> 
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable dataTable no-footer table-hover" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                <thead style="background-color:#17a2b8">
                                                    <tr role="row">
                                                  
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Nombres y Apellidos</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Cod. Puesto </th>
                                                        <th style="color:#FFFFFF; "  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Fecha y Hora de registro</th>
                                                  
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Responsable de registro</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Realizó pago</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">$ Valor total</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Matriculado</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">    Observación</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                            
                                                    @if(isset($pagos_puestos_mercado))
                                                
                                                        @foreach ($pagos_puestos_mercado as $ic)
                                                    

                                                        <tr role="row" class="odd">   
                                                            <?php $user = DB::table('users')->where('id',$ic->id_users)->first(); ?>
                                                            <?php $responsable = DB::table('users')->where('id',$ic->responsable_cobro)->first(); ?>
                                                            <?php $puestos = DB::table('puestos_mercado')->where('id',$ic->id_puestos_mercado)->first(); ?>
                                                            <td class="sorting_1">{{$user->nombres}} {{$user->apellidos}}</td>
                                                            <td class="sorting_1">{{$puestos->nro_puesto}}</td>
                                                            <td class="sorting_1">{{$ic->fecha_pago}}</td>
                                                            
                                                            <td class="sorting_1">{{$responsable->nombres}} {{$responsable->apellidos}} </td>   
                                                            <td class="sorting_1">
                                                              @if ($ic->pago_realizado==true)
                                                                <span class="pull-right badge bg-green"> SI</span>
                                                              @else
                                                                <span class="pull-right badge bg-pink"> NO</span>
                                                              @endif
                                                            </td> 
                                                            <td class="sorting_1">{{$ic->valor_total}}</td> 
                                                            <td class="sorting_1">
                                                              @if ($ic->matricula=="No")
                                                              <span class="pull-right badge bg-pink"> NO</span>
                                                                
                                                              @else
                                                              <span class="pull-right badge bg-green"> SI</span>
                                                              
                                                              @endif
                                                            </td>  
                                                            <td class="sorting_1">{{$ic->observacion}}</td>
                                                    
                                                        @endforeach
                                                    @endif
                                                
                                                </tbody>
                                            </table>
                                            </div>     
                                </div>
                                <div class="row">
                                <?php if($fecha_dia!=""){?>
                                {{ $pagos_puestos_mercado->appends(['fecha_ingreso' => $fecha_dia])->links() }}                  
                                <?php } elseif($fecha_mes!=""){?>
                                {{ $pagos_puestos_mercado->appends(['fecha_mes_ingreso' => $fecha_mes])->links() }}                  
                                <?php }elseif($fecha_anio!=""){?>
                                {{ $pagos_puestos_mercado->appends(['fecha_anio_ingreso' => $fecha_anio])->links() }}                  
                                <?php }elseif($searchT!=""){?> 

                                    {{ $pagos_puestos_mercado->appends(['searchT' => $searchT])->links() }} 
                                <?php }else{ ?>
                                {{  $pagos_puestos_mercado->links()}}
                                    <?php }?>
        
                                </div>    
                            </div>
                        </div>
                    </div>
                </div> 
            </div>	
        </div>
    </div>	
                      
@endsection
@push('scripts')
<script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
<script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
     <!-- Tempusdominus Bootstrap 4 --> 
<script src="{{asset('assets/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>

  <script type="text/javascript">
   
    $(function() {
       
                //Money Euro
            //$('[data-mask]').inputmask()

    })


//Date range picker
$('#reservationdate').datetimepicker({
	format: 'L'
});
  //Timepicker
$('#timepicker').datetimepicker({
                format: 'YYYY-MM-DD',
                ignoreReadonly: true,
    
 })
 $('#timepicker2').datetimepicker({
                format: 'MM-YYYY',
                ignoreReadonly: true,
    
 })
 $('#timepicker3').datetimepicker({
                format: 'YYYY',
                ignoreReadonly: true,
    
 })

$('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'DD-MM-YYYY'
                    }                  
 })

 var myDate  = $("#fecha_ingreso").find("input").val();
   
     console.log(myDate);
    console.log(myDate);
 $(document).ready(function(){
    
  });



  </script>

  @endpush    