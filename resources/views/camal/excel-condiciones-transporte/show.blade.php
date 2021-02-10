@extends('layouts.applte')
    @section('contenido')
                    <!--Content Header (Page header)-->
                    
<div class="content-wrapper">             
    @include('layouts.messages')
  
<style>
.nro_tamanio{
 width:100px;
}
.campos{
  width: 180px;
}
.nro{
  width: 65px;
}
.fecha{
  width: 200px;
}
</style>
           
  <!-- Main content -->
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
                      <h3 class="card-title" >CONDICIONES DE INGRESO DE LOS ANIMALES</h3>
                  </span>		
                </div>
              </div>   
            </div>

            <div class="card-body">
              {!! Form::open(['route' => 'antemorten.store2','method'=>'POST']) !!}
              {{Form::token()}}
              @csrf
              @method('POST')
 {{--              <fieldset class="form-group">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
									<label>Fecha:</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-calendar"></i>
												</span>
											</span>
                    <input class="form-control" id="fecha" name="fecha" type="text" value="{{$fecha_d}}" readonly required autofocus>
                  
										</div> 												     
                </div>		
                    
              </fieldset> --}}
               
              <fieldset class="form-group">
              <div class="">
                <hr>
                  <h3>INGRESO</h3>
                <div class="table-responsive">
                  <table id="" class="table table-striped table-bordered  table-responsive  table-hover" >
                    <thead style="background-color:#17a2b8">
                      
                      <th style="color:#FFFFFF">Fecha</th>
                      <th style="color:#FFFFFF">Hora</th>
                      <th style="color:#FFFFFF">Medio de movilización</th>
                      <th style="color:#FFFFFF">Placa del transporte</th>
                      <th style="color:#FFFFFF">Nro. Bovinos</th>
                      <th style="color:#FFFFFF">Nro. Porcinos</th>
                     <th style="color:#FFFFFF">Total</th>   
                      <th style="color:#FFFFFF">Condiciones del transporte</th>
                      <th style="color:#FFFFFF">Observaciones</th>

                    </thead>
                      <tbody>
                     {{--   {{dd($arreglo_bovino)}}  --}}
                     @if (isset($condiciones_ingreso))
                         
                    
                        @foreach ($condiciones_ingreso as $con)
                        <tr role="row" id="fila" class="odd">
                            <td class="sorting_1">{{$con['fecha']}}</td>
                            <td class="sorting_1">{{$con['hora']}}</td>
                            <td class="sorting_1">{{$con['medio_movilizacion']}}</td>
                            <td class="sorting_1">{{$con['placa_transporte']}}</td>
                            <td class="sorting_1">{{$con['bobino']}}</td>
                            <td class="sorting_1">{{$con['porcino']}}</td>
                            <td class="sorting_1">{{$con['total']}}</td>
                            <td class="sorting_1">{{$con['condiciones_transporte']}}</td>          
                            <td class="sorting_1">{{$con['observaciones']}}</td>          
                        </tr> 
                        @endforeach 
                        @endif
                      </tbody>
                  </table>
                </div>
                
              
              </fieldset>

              <div class="form-group">
                <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                <a href="{{url('excel-condiciones-transporte')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
                  <span class="fa fa-long-arrow-alt-left"></span> Regresar
              </a>
               
                <a href="{{url('excel-condiciones-transporte-reporte',$fecha_dia)}}" class="btn btn-success">
                  <i class="fas fa-file-excel"></i>
                  Generar archivo excel
              </a>
              <a href="{{url('excel-condiciones-transporte-mes/pdfMensual',$fecha_dia)}}" target="_blank"
                 class="btn btn-danger btn-rounded waves-effect" title="Generar archivo pdf">
                <span class="fa fa-file-pdf"></span> PDF
            </a>  
                
               
              </div>



            	{!! Form::close() !!}		
          </div>
        </div>
    </div>
  </div>
</div>
       
  @endsection            
    
              
  @push('scripts')
  <script>

  </script>
   <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
   <script src="{{asset('assets/vendor/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
  <script>
    $(function() {
       //Datemask dd/mm/yyyy
       $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
            $('[data-mask]').inputmask()

    })

  </script>

  @endpush
                         