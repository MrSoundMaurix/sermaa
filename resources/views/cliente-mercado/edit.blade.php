<div class="modal fade" id="editPagosPuestoMercadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog"  role="document"> 
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">DETALLES</h4>
                     <button class="close" type="button" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
            </div>
          
             
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
                               <!--  <div class="row">    
                                        <label>Observacion:</label>
                                        <div class="input-group">
                             
                                                            <textarea class="form-control" id="observacion" name="observacion" value="{{ old('observacion') }}" class="row"></textarea>
                                                       
                                        </div> 
                                </div>        
                                -->

                                    
                                            <div class="col-lg-6">
                                            <div class="input-group">
                                                <label>Foto actual</label>
                                            </div>
                                            <img id="foto1" style="max-width:100px;">
                                        </div>
                                </div>    
                            </fieldset>
                        </div>
                    
                </div>
             
	
                <div class="modal-footer">
                        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button> 
                   
                   
                  
                </div>
          
        </div>

    </div>
</div>