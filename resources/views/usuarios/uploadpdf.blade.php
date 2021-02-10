@extends('layouts.applte')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
  	<div class="content-wrapper">
    
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>PDF Test</h1>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

		<div class="content">
			<div class="modal-body">
				<div class="card">
					{!! Form::open(['url' => 'testingpdf', 'method' => 'POST', 'files'=>'true', 'enctype' => 'multipart/form-data']) !!}
						<div class="card-body">
							<fieldset class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<label>Foto</label>
										<div class="input-group">
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="guia_pdf" name="guia_pdf">
												<label class="custom-file-label" for="guia_pdf">Escoger PDF</label>
											</div>
										</div>
									</div>
								</div>
							</fieldset>
						</div>
						<div class="modal-footer">
							<div class="form-group form-actions">
								<button class="btn btn-primary" type="submit" >Guardar</button>
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