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
             
              <fieldset class="form-group">
              <div class="">
                
                  <h3>BOVINOS</h3>
                <div class="table-responsive">
                  <table  class="table table-striped table-bordered  table-responsive  table-hover" >
                    <thead style="background-color:#17a2b8">
                      
                      <th style="color:#FFFFFF">Fecha</th>
                      <th style="color:#FFFFFF">Codigo ingreso</th>
                      <th style="color:#FFFFFF">Hora</th>
                      <th style="color:#FFFFFF">Nro. Machos</th>
                      <th style="color:#FFFFFF">Nro. Hembras</th>
                      <th style="color:#FFFFFF">Total</th>
                      <th style="color:#FFFFFF">Día faenamiento</th>
                      <th style="color:#FFFFFF">CSMI</th>
                     <th style="color:#FFFFFF">Responsable recepción</th>   

                    </thead>
                      <tbody>
                     {{--   {{dd($arreglo_bovino)}}  --}}
                     @if (isset($arreglo_bovino))
                         
                    
                        @foreach ($arreglo_bovino as $con)
                        <tr role="row" id="fila" class="odd">
                            <td class="sorting_1">{{$con['fecha']}}</td>
                            <td class="sorting_1">{{$con['id_ingreso']}}</td>
                            <td class="sorting_1">{{$con['hora']}}</td>
                            <td class="sorting_1">{{$con['nro_bovinos_machos']}}</td>
                            <td class="sorting_1">{{$con['nro_bovinos_hembras']}}</td>
                            <td class="sorting_1">{{$con['total']}}</td>
                            <td class="sorting_1">{{$con['fecha_faenamiento']}}</td>
                            <td class="sorting_1">{{$con['csmi']}}</td>
                            <td class="sorting_1">{{$con['responsable_recepcion']}}</td>          
                        </tr> 
                        @endforeach 
                        @endif
                      </tbody>
                  </table>
                </div>
                <hr>
                  <h3>PORCINOS</h3>
                <div class="table-responsive">
                  <table  class="table table-striped table-bordered  table-responsive  table-hover" >
                    <thead style="background-color:#17a2b8">
                      
                      <th style="color:#FFFFFF">Fecha</th>
                      <th style="color:#FFFFFF">Codigo ingreso</th>
                      <th style="color:#FFFFFF">Hora</th>
                      <th style="color:#FFFFFF">Nro. Machos</th>
                      <th style="color:#FFFFFF">Nro. Hembras</th>
                      <th style="color:#FFFFFF">Total</th>
                      <th style="color:#FFFFFF">Día faenamiento</th>
                      <th style="color:#FFFFFF">CSMI</th>
                     <th style="color:#FFFFFF">Responsable recepción</th>   

                    </thead>
                      <tbody>
                     {{--   {{dd($arreglo_bovino)}}  --}}
                     @if (isset($arreglo_porcino))
                         
                    
                        @foreach ($arreglo_porcino as $con)
                        <tr role="row" id="fila" class="odd">
                            <td class="sorting_1">{{$con['fecha']}}</td>
                            <td class="sorting_1">{{$con['id_ingreso']}}</td>
                            <td class="sorting_1">{{$con['hora']}}</td>
                            <td class="sorting_1">{{$con['nro_porcinos_machos']}}</td>
                            <td class="sorting_1">{{$con['nro_porcinos_hembras']}}</td>
                            <td class="sorting_1">{{$con['total']}}</td>
                            <td class="sorting_1">{{$con['fecha_faenamiento']}}</td>
                            <td class="sorting_1">{{$con['csmi']}}</td>
                            <td class="sorting_1">{{$con['responsable_recepcion']}}</td>          
                        </tr> 
                        @endforeach 
                        @endif
                      </tbody>
                  </table>
                </div>
              </fieldset>

              <div class="form-group">
                
                <a href="{{url('excel-recepcion-animal')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
                  <span class="fa fa-long-arrow-alt-left"></span> Regresar
              </a>
                <a href="{{url('excel-recepcion-animal-reporte',$fecha_dia)}}" class="btn btn-success">
                  <i class="fas fa-file-excel"></i>
                  Generar archivo excel
              </a>
              <a href="{{url('excel-recepcion-animal-dia/pdfMensualRecepcionAnimal',$fecha_dia)}}" target="_blank"
              class="btn btn-danger btn-rounded waves-effect" title="Generar archivo pdf">
             <span class="fa fa-file-pdf"></span> PDF
         </a>  
              </div>
             
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
                         