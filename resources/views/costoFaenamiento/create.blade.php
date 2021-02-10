@extends('layouts.applte')
	@section('contenido')

		<div class="content-wrapper">

				<div class="content">
					<div class="modal-body">
				    	<div class="card">
							<div class="card-body card-primary card-outline">
								<div class="card-header">
									
									<h3 class="card-title">
										<a  href="{{ url('sector-mercado') }}">
											<span class="">
													<i class="fa fa-share fa-rotate-180" style="color:#3498DB;font-size: 1.2em"></i>
												</span>	
											</a> 
											&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Nuevo sector del mercado</h3>
								  </div>
								  <br>
								  
							{!! Form::open(['url' => 'sector-mercado','files' => 'true']) !!}
							<fieldset class="form-group">
										<div class="row">
											<div class="col-lg-6">
												<label>Código:</label>
												<div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card"></i>
														</span>
													</span>
													<input class="form-control" id="codigo" name="codigo" type="text" value="{{ old('codigo') }}" required autofocus>
												</div>      
											</div>
											<div class="col-lg-6">
												<label>Sector:</label>
													<div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-address-card"></i>
															</span>
															</span>
															<input class="form-control" id="sector" name="sector" type="text" value="{{ old('sector') }}"
															required autofocus>
													</div>  
											</div>        
										</div>       
								</fieldset>
								<fieldset class="form-group">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <label>Subsector:</label>
                                            <div class="input-group">
                                                <span class="input-group-prepend">
													<span class="input-group-text">
														<i class="fa fa-address-card"></i>
													</span>
                                                </span>
                                                <input class="form-control" id="subsector" name="subsector" type="text" value="{{ old('subsector') }} " required autofocus>
                                            </div>      
                                        </div>
                                        <div class="col-lg-6">
                                                <label>Mercado:</label>
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-phone"></i>
                                                            </span>
                                                        </span>
                                                        <input class="form-control" id="mercado" name="mercado" type="text" value="{{ old('mercado') }}"
                                                        required autofocus>
                                                    </div>  
                                        </div>        
                                    </div>       
                                </fieldset> 
								
							
							</div>
							<div class="modal-footer">
								<div class="form-group form-actions">
									<button type="button" class="btn btn-secondary" href="{{ url('UsuarioCamal') }}">Cancelar</button> 
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