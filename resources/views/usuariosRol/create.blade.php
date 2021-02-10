@extends('layouts.applte')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
	<div class="content-wrapper">
		@include('layouts.messages')
		@include('usuariosRol.delete')
		<div class="content">
            <div class="modal-body">
				<div class="card card-info card-outline">
					<div class="card">
						<div class="card-header">
							<h3 class="card-title">ASIGNAR ROL A USUARIO</h3>
						</div>
						{!! Form::open(['url' => 'usuarios-rol', 'files'=>'true']) !!}
							<div class="card-body">
								 
								<fieldset class="form-group">
									<div class="row">
										<div class="col-lg-4">
											<label>Nombres y Apellidos</label>
											<div class="input-group">
												<span class="input-group-prepend">
													<span class="input-group-text">
														<i class="fa fa-at text-info"></i>
														
													</span>
												</span>
												
												<input class="form-control"  value="{{$usuario[0]->nombres}} {{$usuario[0]->apellidos}}" readonly>
												<input class="form-control" type="hidden" name="id_user"  value="{{$usuario[0]->id}}" readonly>
											</div>
										</div>
										<div class="col-lg-4">
											<label>Cédula</label>
											<div class="input-group">
												<span class="input-group-prepend">
													<span class="input-group-text">
														<i class="fa fa-at text-info"></i>
														
													</span>
												</span>
												
												<input class="form-control"  value="{{$usuario[0]->cedula}}" readonly>
											</div>
										</div>
										<div class="col-lg-4">
											<label>Correo electrónico</label>
											<div class="input-group">
												<span class="input-group-prepend">
													<span class="input-group-text">
														<i class="fa fa-at text-info"></i>
														
													</span>
												</span>
												
												<input class="form-control"  value="{{$usuario[0]->email}} " readonly>
											</div>
										</div>
										
									</div>
									<br>
									<div class="row">
										 
											<div class="col-lg-6">
												<div class="form-group">
												  <label>ROL:</label>
												   
													  <div class="relative">
														<select required class="form-control select2bs4 " data-live-search="true" style="width: 100%;" name="id_rol"  >
														  @foreach ($rol as $c)
															<?php
															$val="";
														  if($c->name=='operario_camal'){
															$val= "Faenador";}
															else if($c->name=='administrador_camal'){
																$val= "Administrador";
															}else if($c->name=='veterinario') {
																$val= "Veterinario";
															}else if($c->name=='supervisor_camal'){
																$val= "Supervisor del camal";
															}else if($c=='gerente'){
																$val= "Gerente";
															}else if($c=='cliente_camal') {
																$val= "Cliente";
															}else if ($c->name=='supervisor_mercado'){
																$val= "Supervisor del mercado";}
															else if($c->name=='operario_mercado'){
																$val= "Recaudador del mercado";
															}else if($c->name=='usuario-mercado') {
																$val= "Usuario del mercado";
															}else {
																$val= "-";
															}
															?>

														  <option value="{{$c->id}}" {{old('name')==$c->name ? 'selected' : ''}}>{{$val}}</option>
														
														
														  @endforeach
														  
													  </select>
													 </div>
											
												 </div>
											</div>
										 
										<div class="col-lg-4">
											<label>Asignar rol</label>
											<div class="input-group">
												<button class="btn btn-primary"  type="submit" > <span class="fa fa-plus-square"></span> Agregar rol</button>
											</div>
										</div>
										
										
									</div>
								</fieldset>
								<fieldset class="form-group">
									<div class="col-sm-12">
										<div class="table-responsive">
											<table
												class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap"
												id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
												style="border-collapse: collapse !important">
												<thead style="background-color:#17a2b8">
													<tr role="row">
														
														<th style="color:#FFFFFF;" class="sorting" tabindex="0"
															aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
															aria-label="Role: activate to sort column ascending">
															Rol
														</th>
													
														<th style="color:#FFFFFF;" class="sorting" tabindex="0"
															aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
															aria-label="Role: activate to sort column ascending">
																	Usuario
														</th>
														<th style="color:#FFFFFF;" class="sorting" tabindex="0"
															aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
															aria-label="Role: activate to sort column ascending">
																	Quitar rol
														</th>
													</tr>
												</thead>
												<tbody>
													@if (isset($usuarios_rol))
														@foreach ($usuarios_rol as $usr)
														<tr role="row" class="odd">
															<td class="sorting_1">
																@foreach ($rol as $r)
																	@if ($r->id==$usr->team_id )
																	 
																		<?php 
																		if($r->name=='supervisor_mercado'){
                                                                                echo "Supervisor del mercado";}
                                                                                else if($r->name=='operario_mercado'){
                                                                                    echo "Operario del mercado";
                                                                                }else if($r->name=='usuario-mercado') {
                                                                                    echo "Usuario del mercado";
                                                                                }else if($r->name=='operario_camal'){
                                                                                echo "Faenador";}
                                                                                else if($r->name=='administrador_camal'){
                                                                                    echo "Administrador";
                                                                                }else if($r->name=='veterinario') {
                                                                                    echo "Veterinario";
                                                                                }else if($r->name=='supervisor_camal'){
                                                                                    echo "Supervisor del camal";
                                                                                }else if($r->name=='gerente'){
                                                                                    echo "Gerente";
                                                                                }else if($r->name=='cliente_camal') {
                                                                                    echo "Cliente";
                                                                                }else{
                                                                                    echo "-";
                                                                                }
																		
																		?>
																	@endif
																@endforeach
																
															
															</td>
															<td class="sorting_1">
																{{ $usuario[0]->nombres}} {{$usuario[0]->apellidos }} 
															</td>
															<td>
																@if ($usuario[0]->current_team_id==$usr->team_id)
 
																@else
																		<a href="#" class="btn btn-danger" title="Eliminar"
																		data-toggle="modal" data-target="#deleteCamalModal"
																		data-action="{{ route('usuarios-rol.destroy', $usr->id) }}"
																		>
																		<i class="fa fa-trash" aria-hidden="true"></i>
																	</a>
																@endif
																

															</td>
														</tr>
														@endforeach
													@endif
												</tbody>
											</table>
										</div>
									</div>
									
								</fieldset>
							</div>
							<div class="modal-footer">
								<div class="form-group form-actions">
									<a class="btn btn-danger" href="{{url('usuarios-rol')}}">Cancelar</a> 
									
								</div>
							</div>
						{!! Form::close() !!}
						
					</div>
				<div>		
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

		$(document).ready(function() {
            $('#deleteCamalModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var action = button.data('action');
              

                var modal = $(this);
                modal.find(".modal-content #txtEliminar").html("¿Está seguro de eliminar el Rol del usuario <b></b>?");
                modal.find(".modal-content form").attr('action', action);
            });
        });
	</script>
@endpush