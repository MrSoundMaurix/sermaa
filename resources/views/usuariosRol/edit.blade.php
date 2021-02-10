<div class="modal fade" id="editCamalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-md" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">ASIGNAR ROL</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::open(['route'=>['usuarios-rol.update',' '], 'method'=>'PATCH', 'files' => 'true']) !!}
                @csrf
                <div class="modal-body">
                    <div class="card">                            
                        <input type="hidden" id="id" value="" name="id">
                       
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