<div class="modal fade" id="editUsuarioMercadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">Editar Usuario</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::open(['route'=>['usuarios-mercado.update',' '], 'method'=>'PATCH', 'files' => 'true']) !!}
                @csrf
                <div class="modal-body">
                    <div class="card">                            
                        <input type="hidden" id="usm_id" value="" name="usm_id">
                        <div class="card-body">
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Nombres</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-address-card"></i>
                                                </span>
                                            </span>
                                            <input class="form-control" id="usm_nombres" name="usm_nombres" type="text" value="{{ old('usm_nombres') }}" required autofocus>
                                        </div>      
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Apellidos</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-address-card"></i>
                                                </span>
                                            </span>
                                            <input class="form-control" id="usm_apellidos" name="usm_apellidos" type="text" value="{{ old('usm_apellidos') }}" required autofocus>
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
                                                    <i class="fa fa-address-card"></i>
                                                </span>
                                            </span>
                                            <input class="form-control" id="usm_cedula" name="usm_cedula" type="text" value="{{ old('usm_cedula') }} " required autofocus>
                                        </div>      
                                    </div>
                                    <div class="col-lg-6">
                                        <label>Teléfono</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-phone"></i>
                                                </span>
                                            </span>
                                            <input class="form-control" id="usm_telefono" name="usm_telefono" type="text" value="{{ old('usm_telefono') }}" required autofocus>
                                        </div>  
                                    </div>        
                                </div>       
                            </fieldset> 
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Dirección</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-map-marker"></i>
                                                </span>
                                            </span>
                                            <input class="form-control" id="usm_direccion" name="usm_direccion" type="text" value="{{ old('usm_direccion') }}" required autofocus>
                                        </div>
                                    </div>      
                                    <div class="col-lg-6">
                                        <label>Foto</label>
                                        <div class="input-group">
                                            <div class="custom-file">
                                                <input type="file" class="custom-file-input" id="usm_foto" name="usm_foto">
                                                <label class="custom-file-label" for="usm_foto">Escoger foto</label>
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
                    <button class="btn btn-primary" type="submit">Guardar cambios</button>
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