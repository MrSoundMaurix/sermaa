<div class="modal fade" id="editTipoPagoMercadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:20%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar </h4>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::model($tipoPagoMercado,['route'=>['tipo-pago-mercado.update','test'], 'method'=>'PATCH','files' => 'true'])!!}
             
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
											
												<label>Tipo de pago:</label>
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card"></i>
														</span>
													</span>
													<input class="form-control" id="tipo_pago" name="tipo_pago" type="text" value="{{ old('tipo_pago') }}" required autofocus>
												</div>      
										
											  
                                        </div> 
                                              
                                </fieldset>
                                <fieldset class="form-group">
								<div class="row">
                                    <label>Valor del pago:</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-dollar-sign"></i>
                                                </span>
                                            </span>
                                                <input class="form-control" id="valor_pago" name="valor_pago" type="text" step=".01" value="{{ old('valor_pago') }}"
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
        {{Form::Close()}}
    </div>
</div>