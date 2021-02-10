{!! Form::open(array('url'=>'/matriculas-mercado','method'=>'GET','autocomplete'=>'off','role'=>'search')) !!}
<div class="form-group">
    <div class="input-group">
        <span class="input-group-text" style="background: transparent; border: none;">
            <i   class="fa fa-search"></i>
        </span>
        <input type="text" name="searchT" id="search" class="form-control"  value="{{ isset($searchT) ? $searchT: old('searchT') }}" placeholder="Búsqueda por puesto y tipo de matrícula."
            style="-moz-border-radius: 4px;-webkit-border-radius: 4px;border-radius: 4px;" />
    </div>
</div>
        

{{Form::close()}} 
{{--
{!! Form::open(array('url'=>'/matriculas-mercado','method'=>'GET','autocomplete'=>'off','role'=>'searchDate')) !!}
<link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
<link rel="stylesheet" href="{{asset('assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    

        <label>Fecha:</label>
        <button type="submit" class="btn btn-primary">Buscar</button>
        <div class="input-group date" id="timepicker" data-target-input="nearest">
           
     <label>Desde:</label><input type="text" class="form-control datetimepicker-input" name="datefrom" data-target="#timepicker"/>
        <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
              <div class="input-group-text"><i class="far fa-clock"></i></div>
          </div>
        
          </div>
       
        <div class="input-group date" id="timepickerend" data-target-input="nearest">
            <label>Hasta:</label>   <input type="text" class="form-control datetimepicker-input" name="dateto" data-target="#timepickerend"/>
            <div class="input-group-append" data-target="#timepickerend" data-toggle="datetimepicker">
            <div class="input-group-text"><i class="far fa-clock"></i></div>
            </div>    
            </div>
           
      
       
         
        
{{Form::close()}}
{!! Form::open(array('url'=>'/matriculas-mercado/pdfmatriculasMercado','method'=>'POST','autocomplete'=>'off','role'=>'searchDate')) !!}
<div class="col-sm-6 md:w-1/3 px-3" >
    
    <input type="hidden" name="matriculaMercado" value="{{$matriculaMercado}}"/>
   <button type="submit" >PDF</button>
  
</div> 
        
         
        
{{Form::close()}}
@push('scripts')
        <script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>
        <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
        <!-- Tempusdominus Bootstrap 4 --> 
        <script src="{{asset('assets/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
        <!-- Bootstrap Switch --> 
        <script src="{{asset('assets/vendor/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>
        <script>
            $('#timepicker').datetimepicker({
               format: 'DD/MM/YYYY'
           })
           $('#timepickerend').datetimepicker({
            format: 'DD/MM/YYYY'
        })
       </script>
      
       @endpush
--}}    