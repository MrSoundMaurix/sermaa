{!! Form::open(array('url'=>'/supervisorcamal-ingresos-camal','method'=>'GET','autocomplete'=>'off','role'=>'searchDate')) !!}
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
             {!! Form::open(array('url'=>'/supervisorcamal-ingresos-camal/pdfingresoscamal','method'=>'POST','autocomplete'=>'off','role'=>'searchDate')) !!}
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
            <label>PDF:</label>  <br>
              <input type="hidden" name="ingresoCamal1" value="{{$ingresos_camal1}}"/>
              <input type="hidden" name="totalRecaudado" value="{{$totalRecaudadoI}}"/>
                  <button  type="submit" formtarget="_blank" class="btn btn-warning" > <img  src="{{asset('assets/svg/pdf.svg')}}" Style="width:20px"></button> 
                
            </div>      
           {{Form::close()}}
        </div>                                                             
    </fieldset>
</div>  

         


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
      
       @endpush
