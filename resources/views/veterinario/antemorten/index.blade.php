
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
                                      <h3 class="card-title" >ANTEMORTEN DIARIO</h3>
                                  </span>		
                                </div>
                              </div>   
                            </div>
                     
                        {!!Form::open(array('url'=>'antemorten','method'=>'POST','autocomplete'=>'off'))!!} 
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 md:w-1/3 px-3">
                                    <fieldset class="form-group">
                                        <div class="row">
                                         
                                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">           
                                            <label>Fecha:</label>
                                                <div class="input-group date" id="timepicker" data-target-input="nearest">
                                                   <input type="text" class="form-control datetimepicker-input" value="" name="fecha_ingreso"  data-target="#timepicker"/>
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
                                </div>
                                
                     
                            </div>    
    
                        </div>
                        {{Form::Close()}}
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

$('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'YYYY-MM-DD'
                    }
 })



  </script>

  @endpush    

            
               