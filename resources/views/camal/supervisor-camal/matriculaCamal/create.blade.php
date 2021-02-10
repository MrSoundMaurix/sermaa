<div class="modal fade" id="crearMatriculaCamalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">NUEVA MATRICULA</h3>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
            </div>
           {{-- {!! Form::open(array('action'=>array('matricula-camal.store'), 'method'=>'POST','files' => 'true'))!!}--}}
			{!!Form::open(array('url'=>'matricula-camal','method'=>'POST','autocomplete'=>'off'))!!} 
						{{Form::token()}}
						@csrf
						@method('POST')
			    <div class="modal-body">
                        <div class="card">
                                <input class="form-control" id="cate" name="cate" type="hidden"
                                value="" required autofocus>
                                <div class="alert alert-danger" style="display:none"></div>
                                <div class="card-body">
                                        <fieldset class="form-group">
                                            <label>Seleccione nombre del usuario:</label>

                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class="fas fa-user text-info"></i>
                                                        </span>
                                                    </span>
                                                   <select required class="form-control select2bs4 " data-live-search="true" style="width: 100%;" name="nombre_usuario" id="nombre_usuario">
														
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
                                                        <i class="fa fa-dollar-sign text-info"></i>
                                                    </span>
                                                </span>
                                                <input class="form-control" id="costo_matricula" name="costo_matricula" type="text" 
                                               value="{{$costo_matricula[0]->valor}} " required autofocus readonly>
                                            </div>
                                           
                                        </fieldset>
                                        

                                </div>    
                        </div>
                    
                </div>
             
	
                <div class="modal-footer">
                        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button> 
                   
                    <button class="btn btn-primary" type="submit" action="eate" >Matricular</button>
                </div>
          
        </div>
        {{Form::Close()}}
    </div>
</div>

<!-- Modal -->
<!--
<div class="modal fade" id="modalCreateM" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header"  style="background-color:  #2980b9;">
				<h3 class="modal-title" style="color:white;" id="exampleModalLongTitle">Registrar Espacio</h3>
                {{--  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>  --}}
			</div>
        </div>
    </div>
</div>
-->