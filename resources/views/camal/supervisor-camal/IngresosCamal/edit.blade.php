<div class="modal fade" id="editMatriculaCamalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" style="max-width:20%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">EDITAR </h3>
                     <button class="close" type="button"  onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
            </div>
           {!! Form::model($matriculas_camal,['route'=>['matricula-camal.update','test'], 'method'=>'PATCH'])!!}
          
            <div class="modal-body">
                        <div class="card">
                                <input class="form-control" id="id_matricula" name="id_matricula" type="hidden"
                               > 
                                
                                <div class="card-body">
                                 <fieldset class="form-group">
                                            <label>Seleccione nombre del usuario:</label>

                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fa fa-list"></i>
                                                        </span>
                                                    </span>
                                                   <input type="text" id="usuario_anterior" name="usuario_anterior">
                                                   <select required class="form-control select2bs4 " data-live-search="true" style="width: 100%;" name="nombre_usuario_edit" id="nombre_usuario_edit">
														
															@if(isset($usuarios_sin_m))    
                                                                    @foreach ($usuarios_sin_m as $usm)      
                                                                            <option value="{{$usm['id']}}">{{$usm['nombres']}}</option>                                                                
                                                                    @endforeach
															@endif													
													</select>	
                                                </div>
                                               
                                        </fieldset>
                                        <fieldset class="form-group">
                                            <label>Costo de matricula:</label>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
                                                    <span class="input-group-text">
                                                        <i class="fa fa-list"></i>
                                                    </span>
                                                </span>
                                                <input class="form-control" id="costo_matricula_edit" name="costo_matricula_edit" type="text" 
                                               value="" required autofocus readonly>
                                            </div>
                                           
                                        </fieldset>
                                        
                        </div>
                    
                </div>
             
	
                <div class="modal-footer">
                        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Close</button> 
                   
                    <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate" >Guardar cambios</button>
                </div>
                </div>
        </div>
        {{Form::Close()}}
    </div>
</div>