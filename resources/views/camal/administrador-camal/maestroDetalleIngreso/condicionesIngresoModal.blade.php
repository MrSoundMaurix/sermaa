<div class="modal fade" id="condicionesIngresoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Condiciones de ingreso del transporte </h4>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
            </div>
         {{--    {!! Form::model($tipoPagoMercado,['route'=>['tipo-pago-mercado.update','test'], 'method'=>'PATCH','files' => 'true'])!!}
        --}}      
            <div class="modal-body">
                        <div class="card">
                                <!-- <input class="form-control" id="cate" name="cate" type="hidden"
                                 required autofocus>-->
                                <input class="form-control" id="id" name="id" type="hidden"
                               required autofocus> 
                                <div class="alert alert-danger" style="display:none"></div>
                                <div class="card-body">
                                <fieldset class="form-group">
										<div class="row">
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
												<label>Fecha:</label>
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card"></i>
														</span>
													</span>
													<input class="form-control" id="fecha" name="fecha" type="text" value="{{-- {{ old('tipo_pago') }} --}}" required autofocus>
												</div>      
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
												<label>Hora:</label>
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card"></i>
														</span>
													</span>
													<input class="form-control" id="hora" name="hora" type="text" value="{{-- {{ old('tipo_pago') }} --}}" required autofocus>
												</div>      
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
												<label>Código:</label>
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card"></i>
														</span>
													</span>
													<input class="form-control" id="csmi" name="csmi" type="text" value="{{-- {{ old('tipo_pago') }} --}}" required autofocus>
												</div>      
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
												<label>Bovinos:</label>
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card"></i>
														</span>
													</span>
													<input class="form-control" id="bovinos" name="bovinos" type="text" value="{{ old('bovinos') }}" required autofocus>
												</div>      
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
												<label>Porcinos:</label>
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card"></i>
														</span>
													</span>
													<input class="form-control" id="porcinos" name="porcinos" type="text" value="{{ old('porcinos') }}" required autofocus>
												</div>      
                                            </div>
                                            <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
												<label>CSMI:</label>
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card"></i>
														</span>
													</span>
													<input class="form-control" id="csmi" name="csmi" type="text" value="{{-- {{ old('tipo_pago') }} --}}" required autofocus>
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
                                                        <i class="fa fa-truck"></i>
                                                    </span>
                                                </span>
                                                
                                                   
                                                   {{--  <select id="medio_movilizacion"  name="medio_movilizacion" class="custom-select">
                                                        <option value="Camión">Camión</option> 
                                                        <option value="Camioneta">Camioneta</option> 
                                                        <option value="A pie">A pie</option> 
                                                    </select> --}}
                                              
                                            </div>      
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                            <label>Placa:</label>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-address-card"></i>
                                                    </span>
                                                </span>
                                                <input class="form-control" id="placa" name="placa" type="text" value="{{-- {{ old('tipo_pago') }} --}}" required autofocus>
                                            </div>      
                                        </div>
                                        <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">           
                                            <label>Tipo de pago:</label>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-address-card"></i>
                                                    </span>
                                                </span>
                                                <input class="form-control" id="tipo_pago" name="tipo_pago" type="text" value="{{-- {{ old('tipo_pago') }} --}}" required autofocus>
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
                                                    <i class="fa fa-dollar-sign"></i>
                                                </span>
                                            </span>
                                                <input class="form-control" id="valor_pago" name="valor_pago" type="text" step=".01" value="{{-- {{ old('valor_pago') }} --}}"
                                                required autofocus>
                                        </div>  
                                </div>      
								
                                </div>    
                            </fieldset>
                        </div>
                    
                </div>
             
	
                <div class="modal-footer">
                        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button> 
                   
                    <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate" >Guardar cambios</button>
                </div>
          
        </div>
 {{--        {{Form::Close()}} --}}
    </div>
</div>