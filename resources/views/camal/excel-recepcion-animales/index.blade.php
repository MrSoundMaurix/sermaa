
@extends('layouts.applte') 
@section('contenido')

<link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
<link rel="stylesheet" href="{{asset('assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">

    <div class="content-wrapper">
            @include('layouts.messages')
           
            <div class="content">
                <div class="modal-body">
                    <div class="card card-info card-outline">
                    <div class="card">
                        <div class="card-header">  
                            <div class="row">	
                                <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                                  <span class="input-group-prepend">	
                                    
                                  </span> 
                                </div>	
                                <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                                  <span class="" style="text-align: center;">
                                      <h3 class="card-title" > RECEPCIÓN DE LOS ANIMALES</h3>
                                  </span>		
                                </div>
                              </div>   
                            </div>
                     
                        
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 md:w-1/3 px-3">
                                    {!!Form::open(array('url'=>'excel-recepcion-animal-dia','method'=>'POST','autocomplete'=>'off'))!!} 
                                    <fieldset class="form-group">
                                        <div class="row">
                                         
                                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">           
                                            <label>Filtrar por día:</label>
                                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                   <input type="text" class="form-control datetimepicker-input" value="" name="fecha_dia" 
                                                    data-target="#timepicker"/>
                                                   <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
                                                       <div class="input-group-text"><i class="fa fa-calendar text-info"></i></div>
                                                   </div>
                                                </div> 
                                        </div>
                                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <label>Ir</label>
                                            <span class="input-group-prepend">
                                            </span>
                                            <button class="btn btn-info" type="submit">Consultar</button>
                                        {{-- <a href="{{route('antemorten.create')}}" type="button" class="btn btn-success" >Consultar</a> --}}
                                            </div>
                                        </div>
                                    </fieldset> 
                                    {{Form::Close()}}		
                                </div>
                                <div class="col-sm-6 md:w-1/3 px-3">
                                    {!!Form::open(array('url'=>'excel-recepcion-animal-mes','method'=>'POST','autocomplete'=>'off'))!!} 
                                    <fieldset class="form-group">
                                        <div class="row">
                                         
                                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">           
                                                <label>Filtar por mes:</label>
                                                <div class="input-group date" id="timepicker2" data-target-input="nearest">
                                                   <input style="background: transparent;" type="text" class="form-control datetimepicker-input"
                                                    value="" name="fecha_mes_ingreso" id="fecha_mes_ingreso"data-target="#timepicker2" required readonly/>
                                                   <div class="input-group-append" data-target="#timepicker2" data-toggle="datetimepicker">
                                                       <div class="input-group-text"><i class="fas fa-calendar-week text-info"></i></div>
                                                   </div>
                                                </div> 
                                        </div>
                                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                            <label>Ir</label>
                                            <span class="input-group-prepend">
                                            </span>
                                            <button class="btn btn-info" type="submit">Consultar</button>
                                      
                                            </div>
                                        </div>
                                    </fieldset> 
                                    
                                    {{Form::Close()}}		
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

  <script>
    $(function() {
       
                //Money Euro
            $('[data-mask]').inputmask()

    })


//Date range picker
$('#reservationdate').datetimepicker({
	format: 'L'
});
  //Timepicker
  $('#timepicker').datetimepicker({
                format: 'YYYY-MM-DD'
 })
/*   $('#timepicker2').datetimepicker({
                format: 'YYYY-MM'
 }) */
 $('#timepicker2').datetimepicker({
                format: 'MM-YYYY',
                ignoreReadonly: true,
    
 })

$('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
 })



  </script>

  @endpush    

            
               