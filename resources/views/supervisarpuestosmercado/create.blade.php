@extends('layouts.applte')
@section('contenido')
	<!-- Content Wrapper. Contains page content -->
	<link rel="stylesheet" href="{{asset('assets/vendor/select2/css/select2.min.css')}}">
  	<div class="content-wrapper">
    
		<section class="content-header">
			<div class="container-fluid">
				<div class="row mb-2">
				<div class="col-sm-6">
					<h1>Crear Puesto Mercado</h1>
				</div>
				<div class="col-sm-6">
					<ol class="breadcrumb float-sm-right">
					<li class="breadcrumb-item"><a href="#">Inicio</a></li>
					<li class="breadcrumb-item active">Crear Usuario Mercado</li>
					</ol>
				</div>
				</div>
			</div><!-- /.container-fluid -->
		</section>

		<div class="content">
			{{-- <div class="modal-body"> --}}
				<div class="card card-default">
					{!! Form::open(['url' => 'puestos-mercado', 'files'=>'true']) !!}
						<div class="card-body">
							<fieldset class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label>Nro Puesto</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-address-card"></i>
												</span>
											</span>
											<input class="form-control" id="pm_nro_puesto" name="pm_nro_puesto" type="text" value="{{ old('pm_nro_puesto') }}" required autofocus>
										</div>      
									</div>
									<div class="col-lg-6">
										<label>Codigo barra</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-address-card"></i>
												</span>
											</span>
											<input class="form-control" id="pm_codigo_barra" name="pm_codigo_barra" type="text" value="{{ old('pm_codigo_barra') }}" required autofocus>
										</div>  
									</div>        
								</div>       
							</fieldset>
							<fieldset class="form-group">
								<div class="row">
									<div class="col-md-6">
										<label>Comerciante</label>
										<div class="input-group">											
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-user"></i>
												</span>
											</span>
											<select class="form-control select2bs4" id="pm_id_usuario_mercado" name="pm_id_usuario_mercado" required>
												@if($usuariosmercado != null)
													@foreach ($usuariosmercado as $usm)                                
														<option value="{{$usm->id}}" {{ (old('pm_id_usuario_mercado') == $usm->id ? "selected":"") }}>{{$usm->cedula}} - {{$usm->nombres}} {{$usm->apellidos}}</option>
													@endforeach
												@endif
											</select>
										</div>      
									</div>
									<div class="col-lg-6">
										<label>Tipo de pago</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-phone"></i>
												</span>
											</span>
											<select class="form-control select2bs4" id="pm_id_tipo_pago_mercado" name="pm_id_tipo_pago_mercado" required>
												@if($tipospagomercado != null)
													@foreach ($tipospagomercado as $tpm)                                
														<option value="{{$tpm->id}}" {{ (old('pm_id_tipo_pago_mercado') == $tpm->id ? "selected":"") }}>{{$tpm->tipo_pago}} - {{$tpm->valor_pago}}$</option>
													@endforeach
												@endif
											</select>
										</div>  
									</div>        
								</div>       
							</fieldset> 
							<fieldset class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label>Sector Mercado</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-map-marker"></i>
												</span>
											</span>
											<select class="form-control select2bs4" id="pm_id_sector_mercado" name="pm_id_sector_mercado" required>
												@if($sectoresmercado != null)
													@foreach ($sectoresmercado as $sm)                                
														<option value="{{$sm->id}}" {{ (old('pm_id_sector_mercado') == $sm->id ? "selected":"") }}>{{$sm->codigo}} - {{$sm->sector}} - {{$sm->mercado}}</option>
													@endforeach
												@endif
											</select>
										</div>
									</div>      
									<div class="col-lg-6">
										
									</div>
								</div>     
							</fieldset>     							
						</div>
						<div class="modal-footer">
							<div class="form-group form-actions">
								<a class="btn btn-secondary" href="{{url('puestos-mercado')}}">Cancelar</a> 
								<button class="btn btn-primary" type="submit" >Guardar</button>
							</div>
						</div>
					{!! Form::close() !!}
				</div> 
			{{-- </div>	 --}}
		</div>
	</div>
@endsection
@push('scripts')
	<script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>

	
	<script type="text/javascript">
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