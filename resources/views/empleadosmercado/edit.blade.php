<div class="modal fade" id="editCamalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">EDITAR PERSONAL</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::open(['route'=>['empleados-mercado.update',' '], 'method'=>'PATCH', 'files' => 'true']) !!}
                @csrf
                <div class="modal-body">
                    <div class="card">                            
                        <input type="hidden" id="id" value="" name="id">
                        <div class="card-body">
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Nombres</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-address-card text-info"></i>
                                                </span>
                                            </span>
                                            <input class="form-control" id="nombres" name="nombres" type="text" value="{{ old('nombres') }}" required autofocus>
                                        </div>      
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Apellidos</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-address-card text-info"></i>
                                                </span>
                                            </span>
                                            <input class="form-control" id="apellidos" name="apellidos" type="text" value="{{ old('apellidos') }}" required autofocus>
                                        </div>  
                                    </div>        
                                </div>       
                            </fieldset>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Cédula</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-address-card text-info"></i>
                                                </span>
                                            </span>
                                            <input maxlength="10" class="form-control" id="cedula" name="cedula" type="text" value="{{ old('cedula') }} " required autofocus>
                                            <input  class="form-control" id="cedula" name="cedula" type="hidden" value="{{ old('cedula') }} " required autofocus>
                                        </div>      
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Teléfono</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-phone text-info"></i>
                                                </span>
                                            </span>
                                            <input maxlength="13" class="form-control" id="telefono" name="telefono" type="text" value="{{ old('telefono') }}" required autofocus>
                                        </div>  
                                    </div>        
                                </div>       
                            </fieldset> 
                            <input class="form-control" id="id_team" name="id_team" type="hidden" value="{{ old('id_team') }}"  autofocus>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Dirección</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-map-marker text-info"></i>
                                                </span>
                                            </span>
                                            <input class="form-control" id="direccion" name="direccion" type="text" value="{{ old('direccion') }}" required autofocus>
                                        </div>
                                    </div>      
                                    <div class="col-lg-6">
                                        <label>Foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="foto_user" name="foto">
                                                <label class="custom-file-label" for="foto_user">Escoger foto</label>
                                            </div>
                                        </div>  
                                    </div>
                                </div>     
                            </fieldset>
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-lg-12">                                        
                                        <div class="input-group">
                                            <label>Foto actual</label>
                                        </div>
                                        <img id="foto" style="max-width:75px;">
                                    </div>                                    
                                </div>     
                            </fieldset>
                        </div>    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </div>
            {{Form::Close()}}
        </div>
    </div>
</div>
@push('scripts')
	<!-- bs-custom-file-input -->
	<script src="{{ asset('assets/vendor/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			bsCustomFileInput.init();
		});
	</script>
@endpush