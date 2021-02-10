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
                      <h3 class="card-title" >INGRESO DIARIO</h3>
                  </span>		
                </div>
              </div>   
            </div>

            <div class="card-body">
              {!! Form::open(['route' => 'antemorten.store2','method'=>'POST']) !!}
              {{Form::token()}}
              @csrf
              @method('POST')
              <fieldset class="form-group">
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
                    
              </fieldset>
               
              <fieldset class="form-group">
              <div class="">
                <hr>
                  <h3>Bovinos</h3>
                <div class="table-responsive">
                  <table id="" class="table table-striped table-bordered  table-responsive  table-hover" >
                    <thead style="background-color:#17a2b8">
                      
                      <th style="color:#FFFFFF">Fecha y hora</th>
                      
                      <th style="color:#FFFFFF">Especie</th>
                      <th style="color:#FFFFFF">Lugar de procedencia</th>
                      <th style="color:#FFFFFF">Nro. CSMI</th>
                      <th style="color:#FFFFFF">Nro. Lotes</th>
                      <th style="color:#FFFFFF">Estapa productiva</th>
                     
                     <th style="color:#FFFFFF">Nro. Machos</th>   
                      <th style="color:#FFFFFF">Nro. Hembras</th>
                      <th style="color:#FFFFFF">Total</th>
                      <th style="color:#FFFFFF">Nro. Animales muertos</th>
                      <th style="color:#FFFFFF">Causa probable</th>
                      <th style="color:#FFFFFF">Decomiso</th>
                      <th style="color:#FFFFFF">Aprovechamiento</th>
                      <th style="color:#FFFFFF">Nro. síndrome nervioso</th>
                      <th style="color:#FFFFFF">Nro. síndrome digestivo</th>
                      <th style="color:#FFFFFF">Nro. síndrome respiratorio</th>
                      <th style="color:#FFFFFF">Nro. síndrome Vesicular</th>
                      <th style="color:#FFFFFF">Tipo secreción</th>
 
                      <th style="color:#FFFFFF">Nro. Animales con cojera</th>
                      <th style="color:#FFFFFF">Nro. Animales no ambulatorios</th>
                      <th style="color:#FFFFFF;background-color:#0023eb">Nro. Matanza nomal</th>
                      <th style="color:#FFFFFF">Nro. Matanza precauciones especiales</th>
                      <th style="color:#FFFFFF">Nro. Matanza de emergencia</th>
                      <th style="color:#FFFFFF">Nro. Aplazamiento de matanza</th>
                      <th style="color:#FFFFFF">Observaciones</th>
                    </thead>
                      <tbody>
                     {{--   {{dd($arreglo_bovino)}}  --}}
                     @if (isset($antemortenB))
                         
                    
                        @foreach ($antemortenB as $b)
                        <tr role="row" id="fila" class="odd">
                          <td class="sorting_1"> <input class="form-control fecha"   type="text" value="{{$b->fecha}}" readonly required autofocus>
                            
                          <td class="sorting_1"> <input class="form-control nro_tamanio"  type="text" value="{{$b->especie}}" readonly required autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->lugar_procedencia}}" readonly  autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->csmi}}" readonly required autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_lote}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->etapa_productiva}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_machos}}" readonly required autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_hembras}}" readonly required autofocus></td>
                          <td class="sorting_1"> <input  class="form-control nro" type="text"  value="{{$b->total_animales}}"    readonly required autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_animales_muertos}}"readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->causa_probable}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"   type="text" value="{{$b->decomiso}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->aprovechamiento}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_sindrome_nervioso}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_sindrome_digestivo}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro" type="text" value="{{$b->nro_sindrome_respiratorio}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"   type="text" value="{{$b->nro_vesicular}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->tipo_secrecion}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_cojera}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_ambulatorios}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_matanza_normal}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"   type="text" value="{{$b->nro_matanza_especial}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_matanza_emergencia}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"   type="text" value="{{$b->nro_aplazamiento_matanza}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"   type="text" value="{{$b->observaciones}}" readonly autofocus></td>
                        </tr> 
                        @endforeach 
                        @endif
                      </tbody>
                  </table>
                </div>
                <div class="table-responsive">
                  <hr>
                  <h3>Porcinos</h3>
                  <table id="" class="table table-striped table-bordered  table-responsive  table-hover" >
                    <thead style="background-color:#17a2b8">
                      
                      <th style="color:#FFFFFF">Fecha y hora</th>
                      
                      <th style="color:#FFFFFF">Especie</th>
                      <th style="color:#FFFFFF">Lugar de procedencia</th>
                      <th style="color:#FFFFFF">Nro. CSMI</th>
                      <th style="color:#FFFFFF">Nro. Lotes</th>
                      <th style="color:#FFFFFF">Estapa productiva</th>
                     
                     <th style="color:#FFFFFF">Nro. Machos</th>   
                      <th style="color:#FFFFFF">Nro. Hembras</th>
                      <th style="color:#FFFFFF">Total</th>
                      <th style="color:#FFFFFF">Nro. Animales muertos</th>
                      <th style="color:#FFFFFF">Causa probable</th>
                      <th style="color:#FFFFFF">Decomiso</th>
                      <th style="color:#FFFFFF">Aprovechamiento</th>
                      <th style="color:#FFFFFF">Nro. síndrome nervioso</th>
                      <th style="color:#FFFFFF">Nro. síndrome digestivo</th>
                      <th style="color:#FFFFFF">Nro. síndrome respiratorio</th>
                      <th style="color:#FFFFFF">Nro. síndrome Vesicular</th>
                      <th style="color:#FFFFFF">Tipo secreción</th>
 
                      <th style="color:#FFFFFF">Nro. Animales con cojera</th>
                      <th style="color:#FFFFFF">Nro. Animales no ambulatorios</th>
                      <th style="color:#FFFFFF;background-color:#0023eb">Nro. Matanza nomal</th>
                      <th style="color:#FFFFFF">Nro. Matanza precauciones especiales</th>
                      <th style="color:#FFFFFF">Nro. Matanza de emergencia</th>
                      <th style="color:#FFFFFF">Nro. Aplazamiento de matanza</th>
                      <th style="color:#FFFFFF">Observaciones</th>
                    </thead>
                      <tbody>
                     {{--   {{dd($arreglo_bovino)}}  --}}
                     @if (isset($antemortenP))
                         
                     
                        @foreach ($antemortenP as $b)
                        
                        <tr role="row" id="fila" class="odd">
                          <td class="sorting_1"> <input class="form-control fecha"   type="text" value="{{$b->fecha}}" readonly required autofocus>
                            
 
                          <td class="sorting_1"> <input class="form-control nro_tamanio"  type="text" value="{{$b->especie}}" readonly required autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->lugar_procedencia}}" readonly  autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->csmi}}" readonly required autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_lote}}"readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->etapa_productiva}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_machos}}" readonly required autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_hembras}}" readonly required autofocus></td>
                          <td class="sorting_1"> <input  class="form-control nro" type="text"  value="{{$b->total_animales}}"    readonly required autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_animales_muertos}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->causa_probable}}"readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"   type="text" value="{{$b->decomiso}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->aprovechamiento}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_sindrome_nervioso}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_sindrome_digestivo}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro" type="text" value="{{$b->nro_sindrome_respiratorio}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"   type="text" value="{{$b->nro_vesicular}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"  type="text" value="{{$b->tipo_secrecion}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_cojera}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_ambulatorios}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_matanza_normal}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"   type="text" value="{{$b->nro_matanza_especial}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"  type="text" value="{{$b->nro_matanza_emergencia}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control nro"   type="text" value="{{$b->nro_aplazamiento_matanza}}" readonly autofocus></td>
                          <td class="sorting_1"> <input class="form-control campos"   type="text" value="{{$b->observaciones}}" readonly autofocus></td>
                        </tr> 
                       
                        @endforeach 
                        @endif
                      </tbody>
                  </table>
                </div>
              </div>
              </fieldset>

              <div class="form-group">
                <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                <a href="{{url('antemorten')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
                  <span class="fa fa-long-arrow-alt-left"></span> Regresar
              </a>
               
                <a href="{{url('antemortenExcel',$fecha_d)}}" class="btn btn-success">
                  <i class="fas fa-file-excel"></i>
                  Generar archivo excel
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
                         