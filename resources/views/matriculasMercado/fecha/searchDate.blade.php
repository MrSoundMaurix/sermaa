       {!! Form::open(array('url'=>'/supervisormercado-fecha/store2','method'=>'POST','autocomplete'=>'off','role'=>'searchDate')) !!}
<link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
<div class="card border-primary rounded-0">
    <fieldset class="form-group">
        <div class="row"  style="text-align:center">
            <div class="col-lg-8 col-sm-8 col-md-8 col-xs-12" >     
                <div class="row">  
                        <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12"> 
                        <label>Fecha límite de matrícula:</label>        
                                <div class="input-group date" id="timepickerend" data-target-input="nearest">
                                      <input type="text" class="form-control datetimepicker-input" name="dateto" 
                                      data-target="#timepickerend" value=""/>
                                        <div class="input-group-append" data-target="#timepickerend" data-toggle="datetimepicker">
                                            <div class="input-group-text"><i class="far fa-clock text-info"></i></div>
                                        </div>    
                                </div>
                        </div>        
                </div>            
            </div>
            <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">

                <label>Cambiar</label> 
                    <span class="input-group-prepend">
                     </span>  <button type="submit" class="btn btn-info"> <span class="fa fa-plus-square"></span> Cambiar</button>  
            </div>                              
{{Form::close()}}
             
        </div>                                                             
    </fieldset>
</div>  

<input type="hidden" id="mes"name="mes" value="{{$fecha->mes}}" />
<input type="hidden" id="dia"name="dia" value="{{$fecha->dia}}" />       


@push('scripts')
        <script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 --> 
        <script src="{{asset('assets/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Bootstrap Switch --> 
        <script src="{{asset('assets/vendor/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <script>
         
            n =  new Date();
            y = n.getFullYear();//YEAR CURRENT
            console.log(y);
           var dia= $('#dia').val(); //DAY BD
         // var dia= parseInt(dia1)+1;
         //var dia=''+dia2;
           var mes= $('#mes').val();// MOTH BD
           console.log(dia);
           console.log(mes);
           $('#timepickerend').datetimepicker({
            format: 'YYYY/MM/DD',
            
            minDate: new Date(y+'/01/01'),
            maxDate: new Date(y+'/12/31'),
            date: new Date(y+'/'+mes+'/'+dia)
        })
       </script>
      
       @endpush
