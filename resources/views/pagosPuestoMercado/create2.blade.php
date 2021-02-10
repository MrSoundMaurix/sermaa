@extends('layouts.applte')
	@section('contenido')
	<link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">


		<div class="content-wrapper">

				<div class="content">
					<div class="modal-body">
				    	<div class="card">
							<div class="card-body card-info card-outline">
								<div class="card-header">  
									<div class="row">	
										<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
										  <span class="input-group-prepend">	
											
											 
										  </span> 
										</div>	
										<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
										  <span class="" style="text-align: center;">
											  <h3 class="card-title" >NUEVO PAGO DEL PUESTO DEL MERCADO ATRAZADO</h3>
										  </span>		
										</div>
									  </div>   
									</div>
								  <br>
							{!! Form::open(['url' => 'pagos-puesto-mercado','files' => 'true']) !!}
							<fieldset class="form-group">
								<div class="row">
									<div class="col-lg-6">
										<div class="form-group">
											<label>Puesto:</label>
											<select  name="id_puestos_mercado" class="custom-select">
											@foreach($puestosMercado as $p)
											<option value="{{$p->id}}">{{$p->codigo_barra}}</option>
											@endforeach
										   
											</select>
										</div>
								</div> 
									<div class="col-lg-6">
										<div class="form-group">
											<label>Tipo de pago:</label>
										{{-- <input type="text" id="diasV" value="{{$dias[]}}"> --}}
											<select id="id_tipo_pago"  name="id_tipo_pago" class="custom-select">
											@foreach($tipoPago as $t)
											<option value="{{$t->id}}">{{$t->tipo_pago}}</option>
											@endforeach
										   
											</select>
										</div>
								</div> 						
								</div>       
							</fieldset> 

							<fieldset class="form-group" >
										<div class="row">
											<div class="col-lg-6" id="diasMostrar">
                                                <label>Días:</label>
                                                <div class="input-group">
                                                    <span class="input-group-prepend">
                                                        <span class="input-group-text">
                                                            <i class=""></i>
                                                        </span>
                                                    </span>
                                                
                                                     @foreach ($dias as $d)
                                                        <div  class="custom-control custom-checkbox">
                                                            <input class="custom-control-input" id="{{$d}}" type="checkbox"  name="dias[]" 
                                                            id="{{$d}}" value="{{$d}}" >
                                                            <label for="{{$d}}" class="custom-control-label">{{$d}}  &nbsp;&nbsp;</label>
                                                        </div>
													@endforeach 
													
												{{-- 	<div id="dias" >
														
                                                	</div>   --}}

												</div>
											</div>
											<div id="mesesMostrar" class="col-lg-6">
													<div class="form-group">
                                                        <label>Mes:</label>
                                                        <select id="meses"  name="mes" class="custom-select">
                                                            
                                                        </select>
                                                    </div>
											</div> 
											
											<div class="col-lg-6" >
											 <label>Fecha:</label>

											 <div class="input-group date" id="timepicker" data-target-input="nearest">
											   <input type="text" class="form-control datetimepicker-input" name="fecha_pago" data-target="#timepicker"/>
											   <div class="input-group-append" data-target="#timepicker" data-toggle="datetimepicker">
												   <div class="input-group-text"><i class="far fa-clock"></i></div>
											   </div>
											   </div>
											</div>
										</div>       
								</fieldset>
								<fieldset class="form-group" >
									<div class="row">
										
										<div class="col-lg-6" >
											<label>Observación:</label>
										{{--    // <div class="input-group"> --}}
												
												<div class="form-group">
													
													<textarea class="form-control" name="observacion" class="row"></textarea>
												  </div>
													{{-- div  class="custom-control ">
														<textarea class="custom-control-input" id="" type="text"  name="" 
														id="" value="wqweqw" >
													   
													</div> --}}
												
											{{-- 	<div id="dias" >
												</div>   --}}
											{{-- </div> --}}
										</div>
											 
									</div>       
							</fieldset>
							<div class="modal-footer">
								<div class="form-group form-actions">
									<a href="{{route('pagos-puesto-mercado.index')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
										<span class="fa fa-long-arrow-alt-left"></span> Regresar
									</a> 
									<button class="btn btn-primary" type="submit" > <i class="fa fa-save"></i> Guardar</button>
									
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
	
	<script src="{{asset('assets/vendor/daterangepicker/daterangepicker.js')}}"></script>

	<script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
	 <!-- Tempusdominus Bootstrap 4 --> 
	<script src="{{asset('assets/vendor/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
	<!-- Bootstrap Switch --> 
	<script src="{{asset('assets/vendor/bootstrap-switch/js/bootstrap-switch.min.js')}}"></script>

  <script>


    $(document).ready(function(){
		var dias= new Array("Lunes", "Martes", "Miercoles", "Jueves", "Viernes", "Sábado", "Domingo");
		var meses=['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
		for (i = 0; i < dias.length; i++) {
			$('#dias').append("<div  class='custom-control custom-checkbox'> <input class='custom-control-input' type='checkbox'  name='dias[]' id='"+dias[i]+"' value='"+dias[i]+"' ><label for='"+dias[i]+"' class='custom-control-label'>"+dias[i]+"</label> </div> ");	
		}

		for (i = 0; i < meses.length; i++) {
			$('#meses').append("<option value='"+meses[i]+"'>"+meses[i]+"</option> ");	
		} 

      function loadDias() {
          var faculty_id = $('#id_tipo_pago').val();
		 		  console.log("DIAS "+dias);
           if ($.trim(faculty_id) != '') {
  
            console.log(faculty_id);
              
				if(faculty_id==1){
					var old = $('#dias').data('old') != '' ? $('#dias').data('old') : '';
  
					
					document.getElementById('mesesMostrar').style.display = 'block'	;
					document.getElementById('diasMostrar').style.display = 'none'	;
				}else {
					var old = $('#meses').data('old') != '' ? $('#meses').data('old') : '';
  
					
					document.getElementById('mesesMostrar').style.display = 'none'	;
					document.getElementById('diasMostrar').style.display = 'block'	;
				}
			 
					
					
                 /*  console.log(careers);
                  $.each(careers, function (index, value) {
                      $('#canton').append("<option value='" + value + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
			 */
          		} 
          //	}
      } 
      loadDias();
      $('#id_tipo_pago').on('change', loadDias);
      
  });

  
//Date range picker
$('#reservationdate').datetimepicker({
	format: 'L'
});
  //Timepicker
  $('#timepicker').datetimepicker({
                format: 'DD/MM/YYYY hh:mm A'
            })

$('#reservationtime').daterangepicker({
                    timePicker: true,
                    timePickerIncrement: 30,
                    locale: {
                        format: 'DD/MM/YYYY hh:mm A'
                    }
                })
  </script>
  @endpush
                         