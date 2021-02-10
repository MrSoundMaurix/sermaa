@extends('layouts.applte')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
		@include('layouts.messages')
		<div class="content">
		
            <div class="modal-body">
			<div class="card card-info card-outline">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">CREAR NUEVO CLIENTE</h3>
                    </div>
					{!! Form::open(['url' => 'usuarios-camal', 'files'=>'true']) !!}
					<div class="card-body">
						
						   <fieldset class="form-group">
						        <div class="row">
									<div class="col-lg-6">
										<label>Código</label>
										<div class="input-group">
												<span class="input-group-prepend">
													<span class="input-group-text">
														<a class="text-info text-info">C</a>
													</span>
												</span>
												<input class="form-control" id="codigo" name="codigo" type="text" value="{{ old('codigo') }}" required 
													pattern="[A-Za-z0-9ÑñÁáÉéÍíÓóÚúÜü_]+"  
													oninvalid="setCustomValidity('El código solo debe contener letras, números y guiones bajos. Ej: cod_5')"
													oninput="setCustomValidity('')">
									    </div>
									</div>
									<div class="col-lg-6">
										<label>Cédula</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-address-card text-info"></i>
												</span>
											</span>
											<input maxlength="10" class="form-control" id="celula" name="cedula" type="text" value="{{ old('cedula') }}" required autofocus>
									    </div>
									</div>
								</div>	
							</fieldset >
							<fieldset class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label>Nombres</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<a class="text-info">N</a>
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
													<a class="text-info">A</a>
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
										<label>Dirección</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<a class="fa fa-map-marker text-info"></a>
												</span>
											</span>
											<input class="form-control" id="direccion" name="direccion" type="text" value="{{ old('direccion') }}" required autofocus>
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
							<fieldset class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label>Correo electrónico</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-at text-info"></i>
													
												</span>
											</span>
											<input class="form-control" id="direccion" name="email" type="email" value="{{ old('email') }}" required autofocus>
										</div>
									</div>
									<div class="col-lg-6">
										<label>Foto</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="foto" name="foto">
												<label class="custom-file-label" for="foto">Escoger foto</label>
											</div>
										</div>
									</div>

								</div>
							</fieldset>
						<!-- 	 <fieldset class="form-group">
								<div class="row">
									
								</div>
							</fieldset>  -->
					
						<div class="modal-footer">
							<div class="form-group form-actions">
								<a class="btn btn-danger" href="{{url('usuarios-camal')}}">Cancelar</a> 
								<button class="btn btn-primary" type="submit" >Guardar cambios</button>
							</div>
						</div>
					</div>	
					{!! Form::close() !!}
				</div> 
				</div>
			</div>
		</div>	
		
	</div>
@endsection
@push('scripts')
	<!-- bs-custom-file-input -->
	<script src="{{ asset('assets/vendor/bs-custom-file-input/bs-custom-file-input.min.js') }}"></script>
	<script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>
	<script type="text/javascript">
		$(document).ready(function () {
			bsCustomFileInput.init();
		});
		$(function () {
			//Initialize Select2 Elements
			// $('.select2').select2();
		
			//Initialize Select2 Elements
			$('.select2bs4').select2({
				theme: 'bootstrap4'
			});
		});
	</script>
@endpush