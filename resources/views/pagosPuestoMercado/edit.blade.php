<div class="modal fade" id="editPagosPuestoMercadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  role="document"> 
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">PAGO RETRASADO </h4>
                     <button class="close" type="button" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::model($pagosPuestoMercado,['route'=>['pagos-puesto-mercado.update','test'], 'method'=>'PATCH','files' => 'true'])!!}
             
            <div class="modal-body">
                        <div class="card">
                                <!-- <input class="form-control" id="cate" name="cate" type="hidden"
                                 required autofocus>-->
                                <input class="form-control" id="id" name="id" type="hidden"
                               required autofocus> 
                                <div class="alert alert-danger" style="display:none"></div>
                                <div class="card-body">
                                <input type="hidden" name="id_puestos_mercado" id="id_puestos_mercado" value=""/>
                                <fieldset class="form-group">
								<div class="row">
                                    <div class="col-lg-6">
                                        <label>Valor del pago:</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-dollar-sign"></i>
                                                </span>
                                            </span>
                                                <input class="form-control" id="valor_pago" name="valor_pago" type="text" step=".01" value="{{ old('valor_pago') }}"
                                                required autofocus readonly>
                                        </div> 
                                    </div>
                                    <div class="col-lg-6">   
                                        <label>Matrícula:</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <a class="">M</a>
                                                </span>
                                            </span>
                                                <input class="form-control" id="matricula" name="matricula" type="text"  value="{{ old('matricula') }}"
                                                required autofocus readonly>
                                        </div> 
                                    </div> 
                                </div>   
                                <div class="row">    
                                        <label>Observación:</label>
                                        <div class="input-group">
                                          <!--   <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-dollar-sign"></i>
                                                </span>
                                            </span> -->
                                                <!-- <input class="form-control" id="observacion" name="observacion" type="text" value="{{ old('observacion') }}"
                                                required autofocus readonly> -->
                                                
                                                            <textarea class="form-control" id="observacion" name="observacion" value="{{ old('observacion') }}" class="row"></textarea>
                                                       
                                        </div> 
                                </div>        
                                <div class="row">
                                    <div class="col-lg-6">
                                            <label>Fecha de pago:</label>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-dollar-sign"></i>
                                                    </span>
                                                </span>
                                                <input  class="form-control" type="datetime" name="fecha"  value="<?php echo date("Y-m-d H:i:s");?>" readonly>
                                                <input type="hidden" class="form-control" type="datetime" name="fecha_pago"  value="<?php echo date("Y-m-d H:i:s");?>" readonly>
                                                    
                                            </div>  
                                    </div> 
                                    <div class="col-lg-6">       
                                            <label>¿Pago Realizado?</label>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-dollar-sign"></i>
                                                    </span>
                                                </span>
                                                <select class="form-control" name= "pago_realiza" id="pago_realiza">
                                                <option value="No">No</option>
                                                <option value="Si">Si</option>
                                                </select>
                                                    
                                            </div>  
                                    </div>   
                                    </div>

                                    <fieldset class="form-group">
								<div class="row">
									<div class="col-lg-12">
										<label>Foto</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="foto2" name="foto2">
												<label class="custom-file-label" for="foto2">Escoger foto</label>
											</div>
										</div>
									</div>
								</div>
							</fieldset> 
                                            <div class="col-lg-6">
                                            <div class="input-group">
                                                <label>Foto actual</label>
                                            </div>
                                            <img id="foto1" style="max-width:150px;">
                                        </div>
                                
                                    
								
                                </div>    
                            </fieldset>
                        </div>
                    
                </div>
             
	
                <div class="modal-footer">
                        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button> 
                   
                   
                    <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate" >Guardar cambios</button>
                </div>
          
        </div>
        {{Form::Close()}}
    </div>
</div>