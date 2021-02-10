@extends('layouts.applte')
@section('contenido')
	<!-- Content Wrapper. Contains page content -->
	@include('layouts.messages')
  	<div class="content-wrapper">
		<div class="content">
		<div class="modal-body ">
			<div class="card">
				
				
				<div class="card card-info card-outline">
					
					<div class="card-header">  
                        <div class="row">	
								<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
									<span class="input-group-prepend">	
										
									</span> 
								</div>	
								<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
									<span class="" style="text-align: center;">
											<h3 class="card-title" >SUBIR ARCHIVO PDF</h3>
									</span>		
								</div>
							</div>   
                        </div>

					
					{!! Form::open(['url' => 'pdf-ingreso', 'method' => 'POST', 'files'=>'true', 'enctype' => 'multipart/form-data']) !!}	
					<div class="card-body">
							<fieldset class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label>Archivo pdf</label>
										<div class="input-group">
											<div class="custom-file">
											<input type="hidden" value="{{$id_tabla}}" name="id_tabla"/>
												<input type="file" class="custom-file-input" id="guia_pdf" name="guia_pdf">
												<label class="custom-file-label" for="guia_pdf">Escoger PDF</label>
											</div>
										</div>
									</div>
								</div>
							</fieldset>

							<div class="modal-footer">
								<a href="{{url('/IngresoCamal')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
									<span class="fa fa-long-arrow-alt-left"></span> Regresar
								</a> 
								<div class="form-group form-actions">
									<button class="btn btn-primary" type="submit" ><i class="fa fa-save"></i> Guardar</button>
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