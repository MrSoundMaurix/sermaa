@extends('layouts.applte')
    @section('contenido')
                    <!--Content Header (Page header)-->
<div class="content-wrapper">             
    @include('layouts.messages')
  

           
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
                      <h3 class="card-title" >INFORMACIÓN DE LA DISTRIBUCIÓN</h3>
                  </span>		
                </div>
              </div>   
            </div>

            <div class="card-body">
             {{--  {!! Form::open(['url' => 'distribucion-camal','method'=>'POST','autocomplete'=>'off']) !!} --}}
             {{--  {{Form::token()}}
              @csrf
              @method('POST') --}}
              <fieldset class="form-group">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
									<label>Fecha:</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-calendar text-info"></i>
												</span>
                                            </span>
                                        <input class="form-control" type="text" value="{{$fecha}}" readonly required autofocus>
										</div> 												     
                </div>		
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
									<label>Hora:</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-clock text-info"></i>
												</span>
											</span>
                                            <input class="form-control" type="text" value="{{$hora}}" readonly required autofocus>
										</div> 												     
                </div>		
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <label>Guía</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-address-card text-info"></i>
                      </span>
                    </span>
                    
                    
                    <input class="form-control" type="text" value="{{$cabecera[0]->fecha_actual}}" readonly required autofocus>

                  </div>  
                </div>  

              </div>
              </fieldset>
              <fieldset class="form-group">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">               	
                  <div class="form-group">
                    <label>Provincia de orígen:</label>
                  
                     <input class="form-control" type="text" value="{{$cabecera[0]->origen_provincia}}" readonly required autofocus>

                    {{-- <input type="hidden" name="id" id="id" value="{{$id}}"> --}}
                      
                      
                  </div>
                </div>	
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label>Cantón de orígen:</label>
                      <div class="relative">
                       
                        <input class="form-control" type="text" value="{{$cabecera[0]->origen_canton}}" readonly required autofocus>

                      </div>
                 </div>
              
              </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label>Parroquia de orígen:</label>
                      <div class="relative">
                        <input class="form-control" type="text" value="{{$cabecera[0]->origen_parroquia}}" readonly required autofocus>
                  
                      </div>
                 </div>
              
              </div>
              </fieldset>
              <fieldset class="form-group">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">               	
                  <div class="form-group">
                    <label>Provincia de destino:</label>
                  
                  
                    <input class="form-control" type="text" value="{{$cabecera[0]->destino_provincia}}" readonly required autofocus>
                    
                  </div>
                </div>	
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label>Cantón de destino:</label>
                      <div class="relative">
                       
                        <input class="form-control" type="text" value="{{$cabecera[0]->destino_canton}}" readonly required autofocus>
                    
                      </div>
                 </div>
              
              </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label>Parroquia de destino:</label>
                      <div class="relative">
                        <input class="form-control" type="text" value="{{$cabecera[0]->destino_parroquia}}" readonly required autofocus>
                    
                      </div>
                 </div>
              
              </div>
              </fieldset>
              <fieldset class="form-group">
              <div class="row">
                <div class="col-lg-5 col-sm-12 col-md-5 col-xs-12">               	
                  <div class="form-group">
                    <label>Nombre del destinatario:</label>
                    <div class="input-group">
                      <span class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fa fa-user text-info"></i>
                          </span>
                      </span>
                      <input class="form-control" type="text" value="{{$cabecera[0]->nombre_destinatario}}" readonly required autofocus>
                        
                  </div>  
                      
                  </div>
                </div>	
                <div class="col-lg-5 col-sm-12 col-md-4 col-xs-12">
                  <div class="form-group">
                    <label>Lugar/Referencia de destino:</label>
                      <div class="relative">
                        <div class="input-group">
                          <span class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fa fa-house-user text-info"></i>
                              </span>
                          </span>
                        
                          <input class="form-control" type="text" value="{{$cabecera[0]->lugar_destino}}" readonly required autofocus>
                        
                      </div>  
                      
                      </div>
                 </div>
                  
              </div>
              <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12">
                <div class="form-group">
                  <label>Placa del transporte:</label>
                    <div class="relative">
                      <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-car text-info"></i>
                            </span>
                        </span>
                        <input class="form-control" type="text" value="{{$cabecera[0]->placa_transporte}}" readonly required autofocus>
                      
                    </div>  
                    
                    </div>
               </div>
            
            </div>
              </fieldset>
              
              <div class="form-group">
                <label>Pago Transporte:</label>
                  <div class="relative">
                    <div class="input-group">
                      <span class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fa fa-house-user text-info"></i>
                          </span>
                      </span>
                    @if (isset($costo_camal))
                        
                    
                      @if ($costo_camal==null)
                      <input class="form-control" type="text" value=" " readonly required autofocus>
                      @else
                      
                      <input class="form-control" type="text" value="{{$costo_camal[0]->descripcion}} - $ {{$costo_camal[0]->valor}}" readonly required autofocus>
                      @endif
                    @endif 
                    
                  </div>  
                  
                  </div>
             </div>
          

              <hr/>

              <fieldset class="form-group">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                  <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#17a2b8">

                      <th style="color:#FFFFFF">Especie</th>
                      <th style="color:#FFFFFF">Tipo</th>
                     <th style="color:#FFFFFF">Cantidad</th>   
                      <th style="color:#FFFFFF">Nro de id</th>
                    </thead>
                      <tbody>
                        @foreach ($detalle as $det)
                        <tr role="row" id="fila" class="odd">
                          <td class="sorting_1">{{$det->especie}}</td>
                          <td class="sorting_1">{{$det->producto}} </td>
                          <td class="sorting_1">{{$det->cantidad}}</td>
                          <td class="sorting_1">{{$det->numero_id}} </td>
                        </tr> 
                        @endforeach
                       

                      </tbody>
                
                  </table>
                </div>
              </div>
              </fieldset>

              <div class="form-group">
                <input name="_token" value="{{ csrf_token() }}" type="hidden"/>
                
                <a href="{{url('distribuciones-camal')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
                    <span class="fa fa-long-arrow-alt-left"></span> Regresar
                </a> 
                <a href="{{url('distribucion-camal/pdfdistribucion',$cabecera[0]->id)}}" target="_blank" class="btn btn-danger btn-rounded waves-effect" title="Generar archivo pdf">
                    <span class="fa fa-file-pdf"></span> PDF
                </a> 
               
              </div>

            {{-- 	{!! Form::close() !!}		 --}}
          </div>
        </div>
    </div>
  </div>
</div>
       
  @endsection            
    
              
  @push('scripts')
  <script>
 
  </script>
  @endpush
                         
    
  
