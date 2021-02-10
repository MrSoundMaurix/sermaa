<div class="modal fade" id="editCostoFaenamientoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:28%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">EDITAR </h3>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::model($costoFaenamiento,['route'=>['costo-faenamiento.update','test'], 'method'=>'PATCH'])!!}
             
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
                                        <input class="form-control" id="identificador" name="identificador" type="hidden" value="{{ old('identificador') }}" required autofocus>
												<label>Descripción:</label>
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card text-info"></i>
														</span>
													</span>
													<input class="form-control" id="especie" name="especie" type="text" value="{{ old('especie') }}" required autofocus readonly>
												</div>      
										
											  
                                        </div> 
                                              
                                </fieldset>
                                <fieldset class="form-group">
								<div class="row">
                                    <label>Valor del pago:</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-dollar-sign text-info"></i>
                                                </span>
                                            </span>
                                                <input class="form-control" id="valor" name="valor" type="text" step=".01" value="{{ old('valor') }}"
                                                required autofocus>
                                        </div>  
                                </div>      
								
                                </div>    
                            </fieldset>
                        </div>
                    
                </div>
             
	
                <div class="modal-footer">
                        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button> 
                   
                    <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate" >Actualizar</button>
                </div>
          
        </div>
        {{Form::Close()}}
    </div>
</div>