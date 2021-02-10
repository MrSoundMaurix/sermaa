@extends('layouts.applte')
@section('contenido')

    @include('pagosPuestoMercado/editSI')
    @include('pagosPuestoMercado/delete')
    <div class="content-wrapper">
        <!--Content Header (Page header)-->

        @include('layouts.messages')

        <div class="content">
            <div class="modal-body">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                                      <span class="input-group-prepend">

                                      </span>
                            </div>
                            <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                                      <span class="" style="text-align: center;">
                                          <h3 class="card-title">PAGOS DEL PUESTO DEL MERCADO</h3>
                                      </span>
                            </div>
                        </div>
                    </div>
                    
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-3 md:w-1/3 px-3">
                            </div>
                            <div class="col-sm-6 md:w-1/6 px-6">
                            {!! Form::open(array('url'=>'/pagos-puesto-mercado','method'=>'GET','autocomplete'=>'off','role'=>'searchDate')) !!}
                                <link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
                                <link rel="stylesheet" href="{{asset('assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
                                    
                                <div class="card border-primary rounded-0">
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">     
                                                <div class="row">  
                                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">     
                                                        <label>Desde:</label>
                                                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                                    <input type="text" class="form-control datetimepicker-input" name="datefrom" data-target="#timepicker" value="{{$datefrom}}"/>
                                                                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i class="far fa-clock text-info"></i></div>
                                                                        </div>           
                                                                </div> 
                                                        </div> 
                                                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
                                                        <label>Hasta:</label>        
                                                                <div class="input-group date" id="timepickerend" data-target-input="nearest">
                                                                    <input type="text" class="form-control datetimepicker-input" name="dateto" data-target="#timepickerend" value="{{$dateto}}"/>
                                                                        <div class="input-group-append" data-target="#timepickerend" data-toggle="datetimepicker">
                                                                            <div class="input-group-text"><i class="far fa-clock text-info"></i></div>
                                                                        </div>    
                                                                </div>
                                                        </div>        
                                                </div>            
                                            </div>
                                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                                                <label>Buscar</label> 
                                                    <span class="input-group-prepend">
                                                    </span>  <button type="submit" class="btn btn-info">Buscar</button>  
                                            </div>
                                        
                        
                            {{Form::close()}}
                            {!! Form::open(array('url'=>'/pagos-puesto-mercado/pdfpagosPuestoMercado','method'=>'POST','autocomplete'=>'off','role'=>'searchDate')) !!}
                            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                            <label>PDF:</label>  <br>
                                        <input type="hidden" name="pagosPuestoMercado1" value="{{$pagosPuestoMercado1}}" /> 
                                          <input type="hidden" name="totalRecaudado" value="{{$totalRecaudadoP}}"/>
                                            <button  type="submit" formtarget="_blank" class="btn btn-warning" > <img  src="{{asset('assets/svg/pdf.svg')}}" Style="width:20px"></button> 
                            </div> 
                             {{Form::close()}}
                        </div>                                                             
                    </fieldset>
                </div>  
                            </div>
                        </div>  
                        <div class="row">   
                            <div class="col-sm-12 ">
                                <div class="row"> 
                                    <div class="col-sm-5">
                                    
                                    {!! Form::open(['url' => '/pagos-puesto-mercado/create', 'method' => 'GET', 'autocomplete' => 'off', 'role' => 'search']) !!}                               
                                        @include('pagosPuestoMercado/searchPuesto')
                                    </div>
                                    <div class="col-sm-3">
                                        <label> Cobrar </label>
                                        <div class="form-group">
                                            <button class="btn btn-info btn-rounded waves-effect" type="submit"><i
                                                    class="fa fa-plus-square"></i> Cobrar
                                            </button>
                                        </div> 
                                    </div>    
                                    {!! Form::close() !!}
                                    <div class="col-sm-4 " style="text-align:right">
                                      </br>
                                            @include('pagosPuestoMercado/search')
                                    </div>
                                </div>
                            </div>

                    
                          
                        </div> 
                       
                        <div class="row">
                            <div class="col-sm-12">
                                <div class="table-responsive">
                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead style="background-color:#17a2b8; color:#fff">
                                        <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Date registered: activate to sort column ascending"
                                                >Fecha/Hora de registro
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Date registered: activate to sort column ascending"
                                                >Fecha/Hora de Pago
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Date registered: activate to sort column ascending"
                                                >Responsable del cobro
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Date registered: activate to sort column ascending"
                                                >Encargado del puesto
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Date registered: activate to sort column ascending"
                                               >Puesto del mercado
                                            </th>
                                            
                                
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Date registered: activate to sort column ascending"
                                                style="width: 150px;">Valor total
                                            </th>
                                            
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Date registered: activate to sort column ascending"
                                            >¿Pago Realizado?
                                        </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Role: activate to sort column ascending" >
                                                Ver
                                            </th>
                                           
                                            {{--   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 88px;">Opciones</th> --}}

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($pagosPuestoMercado))
                                            @foreach ($pagosPuestoMercado as $t)
                                                <tr role="row" class="odd">
                                                    {{--  <td class="sorting_1">{{$uc->id}}</td>  --}}
                                                    <td class="sorting_1">{{$t->fecha}}</td>
                                                    <td class="sorting_1">{{$t->fecha_pago }}</td>
                                                    <td class="sorting_1">{{$t->responsableCobro->nombres." ". $t->responsableCobro->apellidos}}</td>
                                                    <td class="sorting_1">{{$t->user->nombres ." ". $t->user->apellidos}}</td>
                                                    @foreach ($puestosMercado as $p)
                                                        @if ($t->id_puestos_mercado==$p->id)
                                                            <td class="sorting_1">{{$p->nro_puesto}}</td>
                                                        @endif

                                                    @endforeach

                                                    
                                                    
                                                   <!--  <td class="sorting_1">{{$t->matricula}}</td> -->

                                                    <td class="sorting_1">{{$t->valor_total}}</td>
                                                    
                                                   @if($t->pago_realizado==1)
                                                    <td class="sorting_1">Si</td>
                                                   
                                                   @endif
                                                   @if($t->pago_realizado==0)
                                                    <td class="sorting_1">No</td>
                                                   
                                                   @endif
                                                    
                                                 <td class="sorting_1">
                                                       <!--  @if ($t->foto)
                                                            <img
                                                                src="{{ 'data:image/' . $t->fototype . ';base64,' . $t->foto }}"
                                                                style="max-width:75px;">
                                                        @endif -->
                                                        <a href="" class="btn btn-warning toastrDefaultSuccess"
                                                        data-backdrop="static"
                                                           data-keyboard="false"
                                                            data-id="{{$t->id}}" 
                                                           {{--  data-id_puestos_mercado="{{$puestoMercado->id}}" --}}
                                                            data-pago_realizado="{{$t->pago_realizado}}"
                                                           data-observacion="{{$t->observacion}}"
                                                            data-matricula="{{$t->matricula}}"
                                                            data-foto1="{{ 'data:image/' . $t->fototype . ';base64,' . $t->foto }}"
                                                            data-valor_pago="{{$t->valor_total}}"  data-toggle="modal"
                                                             data-target="#editPagosPuestoMercadoModal"  >
                                                            <i class="fa fa-eye"  aria-hidden="true"></i>
                                                        </a>
                                                    </td> 
                                                    <!--  <td> -->

                                                        <!-- <a href="" class="btn btn-warning toastrDefaultSuccess"
                                                        data-backdrop="static"
                                                           data-keyboard="false"
                                                            data-id="{{$t->id}}" 
                                                            data-pago_realizado="{{$t->pago_realizado}}"
                                                           data-observacion="{{$t->observacion}}"
                                                            data-matricula="{{$t->matricula}}"
                                                            data-valor_pago="{{$t->valor_total}}"  data-toggle="modal"
                                                             data-target="#editPagosPuestoMercadoModal"  >
                                                            <i class="fa fa-edit"  aria-hidden="true"></i>
                                                        </a> -->

                                                   {{--     <a title="Eliminar" data-toggle="modal" data-target="#deletePagosPuestoMercadoModal"
                                                            data-action="{{route('pagos-puesto-mercado.destroy',$t->id)}}"
                                                             data-tipo_pago="{{$t->tipo_pago}}"
                                                            data-valor_pago="{{$t->valor_pago}}" href="#" class="btn btn-danger">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                </div>


                            </div>
                            <div class="row">
                            {{ $pagosPuestoMercado->appends(['searchT' => $searchT,'dateto'=>$dateto,'datefrom'=>$datefrom])->links() }}

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
        <!-- Bootstrap Switch --> 
        <script src="{{asset('assets/vendor/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <script>
            $('#timepicker').datetimepicker({
               format: 'YYYY/MM/DD'
           })
           $('#timepickerend').datetimepicker({
            format: 'YYYY/MM/DD'
        })
       </script>
      
    <script type="text/javascript">
        function handleSelect(elm) {
            window.location = elm.value + "";
        }
        
    </script>
    <script type="text/javascript">
        //EDITAR
        $('#editPagosPuestoMercadoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var valor_pago = button.data('valor_pago')
            var pago_realizado = button.data('pago_realizado')
            var matricula = button.data('matricula')
            var observacion = button.data('observacion')
            var foto1 = button.data('foto1')
            var modal = $(this)
            modal.find(".modal-body #id").val(id);
            modal.find('.modal-body #valor_pago').val(valor_pago);
            modal.find('.modal-body #observacion').val(observacion);
            modal.find('.modal-body #matricula').val(matricula);
            $('#foto1').attr('src', foto1);

            if(pago_realizado){
                modal.find('.modal-body #pago_realizado').val("Si");
                
            }else{
                modal.find('.modal-body #pago_realizado').val("No");
                
            }
           
        });
    </script>
@endpush
