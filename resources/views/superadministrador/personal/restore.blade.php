<!-- Modal -->
<div class="modal fade" id="deleteCamalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title">Confirmar restauración de usuario</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			{!! Form::open(['url'=>['activar-usuarios/activar_usuarios',' '], 'method'=>'HEAD']) !!}
				{{ csrf_field() }}
				{{ method_field('HEAD') }} 
				<div class="modal-body">
					<div class="row">
						<div class="col-md-12">
							<h6 id="txtEliminar"> </h6>
						</div>
					</div>
				</div>
				<div class="modal-footer">
					<input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
					<input type="submit" class="btn btn-primary" value="Restaurar">
				</div>
			{!! Form::Close() !!}
		</div>
	</div>
</div>