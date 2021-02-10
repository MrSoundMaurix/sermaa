@extends('layouts.applte')
	@section('contenido')
    @include('layouts.messages')
    <link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<div class="content-wrapper">
    @if ($ingresos_camal->validar_transporte==1)
    <div class="content">
        <div class="modal-body">
            <div class="card card-info card-outline">  
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">CONDICIONES DE INGRESO DE LOS ANIMALES</h3>
                    </div>                   
                    <div class="card-body">
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                    <label>Fecha:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="far fa-calendar-alt text-info"></i>
                                            </span>
                                        </span>
                                        <input class="form-control" type="text" value="{{$fecha}}" required readonly autofocus>
                                    </div>      
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                    <label>Hora:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fas fa-clock text-info"></i>
                                            </span>
                                        </span>
                                        <input class="form-control"  type="text" value="{{$hora}}" required readonly autofocus>
                                    </div>      
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                    <label>CSMI:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                            <a class="text-info">CSMI</a>
                                            </span>
                                        </span>
                                        <input class="form-control"  type="text" value="{{$ingresos_camal->csmi}}" readonly required autofocus>
                                    </div>      
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                    <label>Bovinos:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                            <a class="text-info">B</a>
                                            </span>
                                        </span>
                                        <input class="form-control"  type="text" value="{{$bovino}}" required readonly autofocus>
                                    </div>      
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                    <label>Porcinos:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fas fa-piggy-bank text-info"></i>
                                            </span>
                                        </span>
                                        <input class="form-control" type="text" value="{{$porcino}}" required readonly autofocus>
                                    </div>      
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                    <label>Total:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                            <a class="text-info">T</a>
                                            </span>
                                        </span>
                                        <input class="form-control" type="text" value="{{$total}}" required readonly autofocus>
                                    </div>      
                                </div>   
                            </div> 
                        </fieldset>            
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                    <label>Medio de movilización:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                            <i class="fa fa-truck text-info"></i>
                                            </span>
                                        </span>
                                        
                                        <input class="form-control" value="{{$ingresos_camal->medio_movilizacion}}" readonly  type="text"
                                        autofocus>
                                    
                                    </div>      
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                    <label>Placa:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                            <a class="text-info">P</a>
                                            </span>
                                        </span>
                                        
                                        <input class="form-control"  data-inputmask='"mask": "AAA-9999"' 
                                        data-mask  type="placa_transporte" readonly  value="{{$ingresos_camal->placa_transporte }}"
                                        required autofocus>
                                    </div>      
                                </div>
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                    <label>Fecha de faenamiento:</label>
                                        <div class="input-group date" id="timepicker" data-target-input="nearest">
                                            <input type="text" class="form-control datetimepicker-input" readonly value="{{$ingresos_camal->fecha_faenamiento}}" />
                                            <div class="input-group-append" >
                                                <div class="input-group-text"><i class="far fa-calendar-alt text-info"></i>
                                                </div>
                                            </div>
                                        </div> 
                                </div>
                                
                            </div> 
                                
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <label>Condiciones del transporte:</label>
                                    <div class="input-group">
                                        <input class="form-control"  value="{{$ingresos_camal->condicion_transporte}}" readonly  type="text"
                                        autofocus>
                                    </div>        
                            </div>    
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <label>Observaciones:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <a class="text-info">O</a>
                                            </span>
                                        </span>
                                            <input class="form-control"  value="{{$ingresos_camal->observaciones}}" readonly  type="text"
                                            autofocus>
                                    </div>  
                            </div>   
                        </fieldset>
                        <div class="form-group">
                            <input name="_token" value="{{ csrf_token() }}" type="hidden"/>
                            <a href="{{URL::previous()}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
                                <span class="fa fa-long-arrow-alt-left"></span> Regresar
                            </a> 
                        </div>
                    </div>              
                </div> 
            </div>   
        </div>       
    </div>          
    @else
    <div class="content">
        {!! Form::open(['route'=>['IngresoCamal.update',' '], 'method'=>'PATCH']) !!}
            @csrf
            <div class="modal-body">
                <div class="card card-info card-outline" >  
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">REGISTRO DE LAS CONDICIONES DE INGRESO DE LOS ANIMALES</h3>
                        </div>    
                        <div class="card-body">
                            <!-- <input class="form-control" id="cate" name="cate" type="hidden"
                            required autofocus>-->
                            <input class="form-control" id="id" name="id" value="{{$ingresos_camal->id}}" type="hidden"
                                required autofocus> 
                            <div class="alert alert-danger" style="display:none">
                            </div>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                                <label>Fecha:</label>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                        <i class="far fa-calendar-alt text-info"></i>
                                                        </span>
                                                    </span>
                                                    <input class="form-control" id="fecha" name="fecha" type="text" value="{{$fecha}}" required readonly autofocus>
                                                </div>      
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                                <label>Hora:</label>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                        <i class="fas fa-clock text-info"></i>
                                                        </span>
                                                    </span>
                                                    <input class="form-control" id="hora" name="hora" type="text" value="{{$hora}}" required readonly autofocus>
                                                </div>      
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                                <label>CSMI:</label>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <a class="text-info">CSMI</a>
                                                        </span>
                                                    </span>
                                                    <input class="form-control" id="csmi" name="csmi" type="text" value="{{$ingresos_camal->csmi}}" readonly required autofocus>
                                                </div>      
                                            </div>
                                        </div>
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <div class="row">
                                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                                    <label>Bovinos:</label>
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <a class="text-info">B</a>
                                                            </span>
                                                        </span>
                                                        <input class="form-control" id="bovinos" name="bovinos" type="text" value="{{$bovino}}" required readonly autofocus>
                                                    </div>      
                                                </div>
                                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                                    <label>Porcinos:</label>
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                            <i class="fas fa-piggy-bank text-info"></i>
                                                            
                                                            </span>
                                                        </span>
                                                        <input class="form-control" id="porcinos" name="porcinos" type="text" value="{{$porcino}}" required readonly autofocus>
                                                    </div>      
                                                </div>
                                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                                    <label>Total:</label>
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <a class="text-info">T</a>
                                                            </span>
                                                        </span>
                                                        <input class="form-control" id="total" name="total" type="text" value="{{$total}}" required readonly autofocus>
                                                    </div>      
                                                </div>
                                                
                                        </div> 
                                    </fieldset>            
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                                <label>Medio de movilización:</label>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-truck text-info"></i>
                                                        </span>
                                                    </span>
                                                    
                                                    
                                                    <select id="medio_movilizacion" required  name="medio_movilizacion"  class="custom-select" data-old="{{old('medio_movilizacion')}}">>
                                                            <option value="" >Seleccione</option> 
                                                            <option value="Camión" @if(old('medio_movilizacion')=='Camión'){{'selected'}}@endif>Camión</option> 
                                                            <option value="Camioneta" @if(old('medio_movilizacion')=='Camioneta'){{'selected'}}@endif>Camioneta</option> 
                                                            <option value="A pie" <?php if(old('medio_movilizacion')=='A pie'){ echo 'selected';}?>>A pie</option> 
                                                        </select> 
                                                </div>      
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                                <label>Placa:</label>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <a class="text-info">P</a>
                                                        </span>
                                                    </span>
                                                    
                                                    <input class="form-control" id="placa_transporte" data-inputmask='"mask": "AAA-9999"' 
                                                    data-mask name="placa_transporte" type="placa_transporte"  value="{{old('placa_transporte')}}" 
                                                    required autofocus>
                                                </div>      
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                                <label>Fecha de faenamiento:</label>
                                                    <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                        <input required type="text" class="form-control datetimepicker-input" value="{{old('fecha_faenamiento')}}" name="fecha_faenamiento" data-target="#timepicker"/>
                                                        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                            <div class="input-group-text"><i class="far fa-calendar-alt text-info"></i></div>
                                                        </div>
                                                    </div> 
                                            </div>    
                                        </div>               
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label>Condiciones del transporte:</label>
                                                <div class="input-group">
                                                    @foreach ($condiciones_transporte as $d)
                                                                <div  class="custom-control custom-checkbox">
                                                                    <input class="custom-control-input" id="{{$d}}" type="checkbox"  name="condiciones_transporte[]" 
                                                                    id="{{$d}}" value="{{$d}}" >
                                                                    <label for="{{$d}}" class="custom-control-label">{{$d}}  &nbsp;&nbsp;</label>
                                                                </div>
                                                    @endforeach 
                                                </div>      
                                        </div>    
                                    </fieldset>
                                    <fieldset class="form-group">
                                        <div class="row">
                                            <label>Observaciones:</label>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <a class="text-info">O</a>
                                                        </span>
                                                    </span>
                                                        <input class="form-control" id="observaciones" value="{{$ingresos_camal->observaciones}}" name="observaciones" type="text"
                                                        autofocus>
                                                </div>  
                                        </div>      
                                    </fieldset>
                            <div class="modal-footer">
                                <a href="{{url('/IngresoCamal')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
                                    <span class="fa fa-long-arrow-alt-left"></span> Regresar
                                </a> 
                                <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate" ><i class="fa fa-save"></i> Guardar cambios</button>
                            </div>
                        </div>        
                    </div>
                    </div>
            </div>        
        {{Form::Close()}}
   </div>
    @endif

</div>
@endsection

@push('scripts')
<script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
	<script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
	 <!-- Tempusdominus Bootstrap 4 --> 
	<script src="{{asset('assets/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
	<!-- Bootstrap Switch --> 
	<script src="{{asset('assets/vendor/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
   <script src="{{asset('assets/vendor/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
  <script>
    $(function() {
       
                //Money Euro
            $('[data-mask]').inputmask()

    })
   // var old = button.data('old');
   // console.log(old);
  
 var a= $('#medio_movilizacion').data('old');

 if(a=="A pie"){
          
          $("#placa_transporte").attr("readonly",true);
          $("#placa_transporte").val("");
      }else{
          $("#placa_transporte").attr("readonly",false);
      }


    $( "#medio_movilizacion" ).change(function() {
        let valor=$("#medio_movilizacion").val();
        if(valor=="A pie"){
          
            $("#placa_transporte").attr("readonly",true);
            $("#placa_transporte").val("");
        }else{
            $("#placa_transporte").attr("readonly",false);
        }
    });

//Date range picker
$('#reservationdate').datetimepicker({
	format: 'L'
});
  //Timepicker
  $('#timepicker').datetimepicker({
                format: 'YYYY-MM-DD'
            })

$('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
                })

               /*  $(function() {
                $('nav a[href^="/' + location.pathname.split("/")[1] + '"]').addClass('active');
                }); */

  </script>

  @endpush    