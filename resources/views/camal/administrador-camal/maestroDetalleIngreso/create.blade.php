@extends('layouts.applte')
	@section('contenido')
	@include('layouts.messages')
	
		<div class="content-wrapper">
			<div class="content">
				<div class="modal-body ">
				    <div class="card card-info card-outline" >
						<div class="card">
						{!!Form::open(array('url'=>'maestro-detalleIngreso','method'=>'POST','autocomplete'=>'off'))!!} 
						{{Form::token()}}
						@csrf
						@method('POST')
							<div class="card-header">
								<div class="row">	
									<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
										<span class="input-group-prepend">	
											<a href="{{url('/administrador-camal')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
													<span class="fa fa-long-arrow-alt-left"></span> Regresar
											</a> 	
										</span> 
									</div>	
									<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
										<span class="" style="text-align: center;">
												<h3 class="card-title" >FORMULARIO DE REGISTRO DE GUÍA</h3>
										</span>		
									</div>
								</div>
								
							</div>
							<div class="card-body">
								<div class="row">
									<div class="col-lg-9 col-sm-9 col-md-9 col-xs-12">
										<div class="card">
											<div class="card-body">
												<fieldset class="form-group">
													<div class="row">	
														<input readonly  type="hidden" required disabled name="costo_sin_matricula" id="costo_sin_matricula" 
																						value="{{$costo_sin_matricula}}" class="form-control" placeholder="costo_sin_matricula">
														<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">		
															<label>Nombres y Apellidos</label>
																<div class="input-group">
																	<span class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="fa fa-address-book text-info"></i>
																		</span>
																	</span>
																	<input  type="text" required disabled name="nombres" id="nombres" <?php 
																	{ echo 'value="'.$usuarios->nombres.' '.$usuarios->apellidos.'"';}?> class="form-control" placeholder="Nombres y Apellidos" readonly>		
																</div>
														</div>	       
														<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
															<label> Código usuario</label>
																<div class="input-group">
																	<span class="input-group-prepend">
																		<span class="input-group-text">
																			<a class="text-info">C</a>
																		</span>
																	</span>
																	<input readonly  type="text" required disabled name="codigo" id="codigo" <?php if($id==$usuarios->id)
																						{echo 'value="'.$usuarios->codigo.'"';}?> class="form-control" placeholder="Guía">		
																</div>  				
														</div> 
														<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">               	
														<label>Cédula</label>
														<div class="input-group">
															<input type="hidden" name="id" id="id" value="{{$id}}">
																<span class="input-group-prepend">
																	<span class="input-group-text">
																		<i class="fa fa-address-book text-info"></i>
																	</span>	
																</span>
																<input type="text" required disabled name="usu_id" id="usu_id" <?php if($id==$usuarios->id)
																{ echo 'value="'.$usuarios->cedula.'"';}?> class="form-control" placeholder="cedula" readonly>			
																
														</div>
													    </div>
													</div>
												</fieldset>
												<fieldset class="form-group"> 
													<div class="row">
														<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">               	
															<label>Matricula</label>
															<div class="input-group">
																<input type="hidden" name="id" id="id" value="{{$id}}">
																	<span class="input-group-prepend">
																		<span class="input-group-text">
																			<a class="text-info">M</a>
																		</span>	
																	</span>
																
																	@if($pago_matricula==0)
																		<input type="text" required name="matricula1" id="matricula1" value="NO" class="form-control" placeholder="matricula" readonly>
																						
																	@else
																		<input type="text" required name="matricula1" id="matricula1" value="SI" class="form-control" placeholder="matricula" readonly>
																						
																	@endif	
																		
															</div>
														</div>
														<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">  
															@if($pago_matricula==0&&$a==1||$pago_matricula==1&&$a==1)  
															<label>Tarifa adicional de usuario no matriculado</label>
															<div class="input-group">
																<input type="hidden" name="id" id="id" value="{{$id}}">
																	<span class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="fas fa-dollar-sign text-info"></i>
																		</span>	
																	</span>	
																	<input type="hidden"  name="matricula" id="matricula" value="1" >	
																	<input type="text" required name="valor_matricula" id="valor_matricula" value="0" class="form-control" placeholder="cedula" readonly>				  	
															</div>          	
															@elseif($pago_matricula==1)  
															<label>Tarifa adicional de usuario no matriculado</label>
															<div class="input-group">
																<input type="hidden" name="id" id="id" value="{{$id}}">
																	<span class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="fas fa-dollar-sign text-info"></i>
																		</span>	
																	</span>	
																	<input type="hidden"  name="matricula" id="matricula" value="2" >
																	<input type="text" required name="valor_matricula" id="valor_matricula" value="0" class="form-control" placeholder="cedula" readonly>				  	
															</div>          	
															@else

															<label>Tarifa adicional de usuario no matriculado</label>
															<div class="input-group">
																<input type="hidden" name="id" id="id" value="{{$id}}">
																	<span class="input-group-prepend">
																		<span class="input-group-text">
																			</i> <i class="fas fa-dollar-sign text-info"></i>
																		</span>	
																	</span>
																	<input type="hidden"  name="matricula" id="matricula" value="3" >
																	<input type="text" required  name="valor_matricula" id="valor_matricula" value="{{$costo_sin_matricula}}" class="form-control" placeholder="cedula" readonly>				  	
															</div> 
																	
															
															@endif
														</div>                                
														<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
															<label>Fecha y Hora de finalización de matricula:</label>
																<div class="input-group">
																	<span class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="fas fa-calendar-alt text-info"></i>
																		</span>
																	</span>
																	<input readonly  class="form-control" id="fecha_hora" name="fecha_hora" type="text" value="{{$fecha->anio}} / {{$fecha->mes}} / {{$fecha->dia}} 23:59" readonly required autofocus>
																</div> 												     
														</div>
													</div>		
											    </fieldset>
											
											</div>		
										</div>
									</div>
									<div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
										<div class="card">
											<div class="card-body">
												<fieldset class="form-group">
													<div class="row">
														<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
															<label>CSMI</label>
															<div class="input-group">
																	<span class="input-group-prepend">
																		<span class="input-group-text">
																			<a class="text-info">N°</a>
																		</span>
																	</span>
																<input type="text" required  name="csmi"  data-mask data-inputmask='"mask": "99999999999999999"'  id="csmi" class="form-control">		
															</div>
														</div>	
													</div>
												</fieldset>	
												<fieldset class="form-group">	
													<div class="row">
														<div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">		
															<label for="csmi">Lugar procedencia</label>
																<div class="input-group">
																	<span class="input-group-prepend">
																			<span class="input-group-text">
																				<i class="fas fa-home text-info"></i>
																			</span>
																	</span>
																	<input type="text" required  name="lugar_procedencia"  id="lugar_procedencia" class="form-control"
																	pattern="[A-Za-zÑñÁáÉéÍíÓóÚúÜü ]+" >		  
															</div>
														</div>
													</div>			
												</fieldset>

											</div>
										</div>
									</div>				 	
								</div>
							    <div class="row">
									<div class="col-sm-12">
										<div class="card">
											<div class="card-body">
												<fieldset class="form-group">
													<div class="row">
														<div class="col-lg-1/2 col-sm-1/2 col-md-1/2 col-xs-12 ">
														</div>  
														<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12 ">
															<div class="form-group">
																<label for="especie">Especie</label>
																	<select required class="form-control select2bs4 " data-live-search="true" style="width: 100%;" name="especie" id="especie">
																			<option>Seleccionar</option>
																				@if(isset($costofaenamiento))
																					@foreach ($costofaenamiento as $cf)
																						<option value="{{$cf->valor}}"  >{{$cf->especie}}</option>
																					@endforeach
																				@endif													
																	</select>	
															</div>
														</div>
														<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
																	<div class="form-group">
																		<label for="genero">Género</label>
																		<select required class="form-control select2bs4 " data-live-search="true" style="width: 100%;" name="genero" id="genero">
																			<option >Seleccionar</option>
																			<option value="1"  >Hembra</option>	
																			<option value="2"  >Macho</option>															
																		</select>
																	</div>	
														</div>
														<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
																	<div class="form-group">
																		<label for="emergencia">Emergencia</label>
																		<select required class="form-control select2bs4 " data-live-search="true" style="width: 100%;" name="emergencia" id="emergencia">
																		<option >Seleccionar</option>
																			<option value="NO"  >NO</option>	
																			<option value="<?php foreach($costo_camal_emergencia as $costo){echo $costo->valor."_";}?>"  >SI</option>	
																																
																		</select>
																	</div>	
														</div>
																 
														<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
															<div class="form-group">
																		<label for="cantidad">Cantidad</label>
																		<input type="number" name="cantidad" id="cantidad" class="form-control cantidad" placeholder="Ej: 1"
																		maxlength="2" min="1" oninput="if(this.value.length > this.maxLength) this.value = this.value.slice(0, this.maxLength);"  onKeyUp="pierdeFoco(this)" title="Sólo numeros: Tamaño máximo:3">
															</div>
														</div>
														<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
															<div class="form-group">
																		<label for="costo_unitario">Costo Unitario</label>
																		<input style="background: transparent;" type="number" required disabled name="costo_unitario" id="costo_unitario" 
																		class="form-control" placeholder="Ej: 15.5"
																		>		
															</div>
														</div>
														<div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
															<div class="form-group">
																<label for="bt_add">Añadir</label>
																		<br>
																	<button class="btn btn-info btn-block btn-rounded waves-effect " type="button" 
																		id="bt_add"><span class="fa fa-plus-square"></span> &nbsp;&nbsp;
																		&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AÑADIR</button>
														</div>
														<div class="col-lg-1 col-sm-1 col-md-1 col-xs-12 ">
													</div>				
												</fieldset>					
											</div>					
										</div>
									</div>	
                                </div>
							</div>	
							        <fieldset>		  
										<div class="row">	
											<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
												<div class="table-responsive">
													<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
														<thead style="background-color:#17a2b8">
															<th style="color:#FFFFFF; ">Opciones</th>
															<th style="color:#FFFFFF">Especie</th>
															<th style="color:#FFFFFF;">Género</th>
															
															<th style="color:#FFFFFF;">Emergencia</th>
															<th style="color:#FFFFFF;">Cantidad</th>
															<th style="color:#FFFFFF">Costo faenamiento $</th>
															<th style="color:#FFFFFF">Subtotal $</th>
														</thead>
														<tfoot>	
															
															<th>TOTAL</th>													
															<th></th>
															
															<th></th>
															<th></th>
															<th></th>
															<th></th>
															
															<th>
																<h4 name="total" id="total">$/ 0.00</h4>
															</th>
														</tfoot>
														<tbody>
														</tbody>
													</table>
												</div>
											</div>
										</div>
							        </fieldset>	
							
									
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
										<div class="form-group">
											<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
											<!-- <button class="btn btn-secondary" type="reset">Cancelar</button> -->
											<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>Guardar cambios</button>
										</div>
									</div>		
								
								{!!Form::close()!!}		
							
						</div>
					</div>	
				</div>
			</div>	              	
		</div>							
	@push('scripts')
	<script src="{{asset('assets/vendor/select2/js/select2.full.min.js')}}"></script>
<script type="text/javascript"> 	
		/* $( document ).ready(function() {
			var now = new Date();
			var day = ("0" + now.getDate()).slice(-2);
			var month = ("0" + (now.getMonth() + 1)).slice(-2);
			var today = now.getFullYear()+"-"+(month)+"-"+(day)+"  "+now.getHours()+" : "+now.getMinutes()+" : "+now.getSeconds() ;
			$("#fecha_hora").val(today);
		}); */
/* 
		$( document ).ready(function() {		
			var select = document.getElementById('usu_id');
			select.addEventListener('change',
			function(){
				var selectedOption = this.options[select.selectedIndex];
				console.log(selectedOption.value + ': ' + selectedOption.text);
				var a=selectedOption.value;
				var f= a.toString().split('_'); 
				console.log(f);
				$("#nombres").val(f[0]);
				$("#codigo").val(f[1]);
				$("#id").val(f[2]);		
			});
		}); */
		$( document ).ready(function() {		
			var matricula = $("#matricula").val();
			var costo_sin_matricula = $("#costo_sin_matricula").val();
			var selected = document.getElementById('especie');
			selected.addEventListener('change',
			function(){
                 //OBTENER VALOR DE SELECT ESPECIE Y SELECT EMERGENCIA
				opcion_emergencia = $("#emergencia").find('option:selected').text();
				costo_camal_emergencia= $("#emergencia").find('option:selected').val();
				var selectedOption = this.options[selected.selectedIndex];
				console.log("especie= "+selectedOption.text+"; costo_faenamiento= "+selectedOption.value+"; valor_emergencia= "+costo_camal_emergencia+"; opcion= "+opcion_emergencia+ "; matricula= "+matricula +
				"; costo_sin_matricula = "+costo_sin_matricula);
				var costo_camal_emergencia=costo_camal_emergencia.split('_');
				console.log(costo_camal_emergencia[1]);

				if(matricula==1||matricula==2){	
					console.log('hollla1');
					if((opcion_emergencia=="NO" && selectedOption.text=="Porcino") ||(opcion_emergencia=="NO" && selectedOption.text=="Bovino"))	{	
						console.log(opcion_emergencia);
					    $("#costo_unitario").val(selectedOption.value);
					}else if(opcion_emergencia=="SI" && selectedOption.text=="Bovino" ){						
						$("#costo_unitario").val(costo_camal_emergencia[0]);
					}else if(opcion_emergencia=="SI" && selectedOption.text=="Porcino" ){						
						$("#costo_unitario").val(costo_camal_emergencia[2]);
					}else{
						$("#costo_unitario").val("");
					}
				}else if(matricula==3){
					console.log('hollla2');
					if((opcion_emergencia=="NO" && selectedOption.text=="Porcino") ||(opcion_emergencia=="NO" && selectedOption.text=="Bovino") )	{
					    $("#costo_unitario").val(parseFloat(selectedOption.value)+parseFloat(costo_sin_matricula));		
					}else if(opcion_emergencia=="SI" && selectedOption.text=="Bovino" ){					
						$("#costo_unitario").val(costo_camal_emergencia[1]);
					}else if(opcion_emergencia=="SI" && selectedOption.text=="Porcino" ){						
						$("#costo_unitario").val(costo_camal_emergencia[3]);
					}else{
						$("#costo_unitario").val("");
					}
					}
              /*   if(matricula==1){	
				//	$("#costo_unitario").val("");	
					    $("#costo_unitario").val(selectedOption.value);
						console.log(selectedOption.value);
				}else{
				//	$("#costo_unitario").val("");
					$("#costo_unitario").val(parseFloat(selectedOption.value)+parseFloat(costo_sin_matricula));		
				} */	
			});
		});

		$( document ).ready(function() {		
			// CAPTURAR INPUT Y SELECT
			var matricula = $("#matricula").val();
			var costo_sin_matricula = $("#costo_sin_matricula").val();
			var selectEmergencia = document.getElementById('emergencia');
            //FUNCION CUANDO CAMBIE SELECT EMERGENCIA
			selectEmergencia.addEventListener('change',
			function(){
				//OBTENER VALOR DE SELECT ESPECIE Y SELECT EMERGENCIA
				especie = $("#especie").find('option:selected').text();
				costo_faenamiento= $("#especie").find('option:selected').val();
				var selectedOptionEmergencia = this.options[selectEmergencia.selectedIndex];
				console.log("especie= "+especie+"; costo_faenamiento= "+costo_faenamiento+"; valor_emergencia= "+selectedOptionEmergencia.value+"; opcion= "+selectedOptionEmergencia.text+ "; matricula= "+matricula +
				"; costo_sin_matricula = "+costo_sin_matricula);
				var costo_camal_emergencia=selectedOptionEmergencia.value.split('_');
				console.log(costo_camal_emergencia[3]);
				//PARSEFLOAT CONVIERTE CADENA DE TEXTO A NUMERO
				var va=parseFloat(costo_faenamiento)+parseFloat(costo_sin_matricula);
				//VALIDAR SI TIENE MATRICULA y CONDICION PARA DEFINIR EL COSTO_UNITARIO
                if(matricula==1||matricula==2){	
					if(selectedOptionEmergencia.text=="NO")	{	
						console.log(selectedOptionEmergencia.text);
					    $("#costo_unitario").val(costo_faenamiento);
					}else if(selectedOptionEmergencia.text=="SI" && especie=="Bovino" ){						
						$("#costo_unitario").val(costo_camal_emergencia[0]);
					}else if(selectedOptionEmergencia.text=="SI" && especie=="Porcino" ){						
						$("#costo_unitario").val(costo_camal_emergencia[2]);
					}else{
						$("#costo_unitario").val("");
					}
				}else if(matricula=3){
					if(selectedOptionEmergencia.text=="NO")	{
					    $("#costo_unitario").val(parseFloat(costo_faenamiento)+parseFloat(costo_sin_matricula));		
					}else if(selectedOptionEmergencia.text=="SI" && especie=="Bovino" ){					
						$("#costo_unitario").val(costo_camal_emergencia[1]);
					}else if(selectedOptionEmergencia.text=="SI" && especie=="Porcino" ){						
						$("#costo_unitario").val(costo_camal_emergencia[3]);
					}else{
						$("#costo_unitario").val("");
					}
					}	
			});
		});
         //VALIDAR QUE SÓLO SE INGRESE NUMEROS
		jQuery(document).ready(function() {
			jQuery('.cantidad').keypress(function(tecla) {
				if(tecla.charCode < 48 || tecla.charCode > 57) return false;
			});
		});

        //QUITAR CEROS A LA IZQUIERDA
		function pierdeFoco(e){
			var valor = e.value.replace(/^0*/, '');
			e.value = valor;
		}
				

		// $(function () {
		// 			//Initialize Select2 Elements
		// 			// $('.select2').select2();
				
		// 			//Initialize Select2 Elements
		// 			$('.select2bs4').select2({
		// 				theme: 'bootstrap4'
		// 			});
		// 		});

		$(document).ready(function(){
				$('#bt_add').click(function(){
				agregar();
			});
		});

		var cont=0;
		total=0;
		subtotal=[];
		$("#guardar").hide();
		function agregar(){
			usu_id=$("#usu_id").val();
			especie = $("#especie").find('option:selected').text();
			genero = $("#genero").find('option:selected').text();
			matricula = $("#matricula").text();
			if(matricula==1){
				matricula="SI";
			}else{
				matricula="NO";
			}
			emergencia = $("#emergencia").find('option:selected').text();
			console.log(especie);
			console.log(genero);
			console.log(matricula);
		//	etapa_productiva=$("#etapa_productiva").val();
		//	console.log(etapa_productiva);
		//	especie=$("#especie").val();
			cantidad=$("#cantidad").val();
			costo_unitario=$("#costo_unitario").val();
		
			if (usu_id!="" && genero!="Seleccionar" && cantidad!="" &&  cantidad>0 && costo_unitario!="" )
			{
					subtotal[cont]=(cantidad*costo_unitario);
					total=total+subtotal[cont];
					var fila='<tr class="selected" id="fila'+cont+'"><td><button type="button" class="btn btn-warning" onclick="eliminar('+cont+');">X</button></td><td><input type="hidden" name="especie[]" value="'+especie+'"><input type="text" disabled name="especie[]" value="'+especie+'"></td><td><input type="hidden" name="genero[]" value="'+genero +'"><input type="text" disabled name="genero[]" value="'+genero +'"><td><input type="hidden" name="emergencia[]" value="'+emergencia+'"><input type="text" disabled name="emergencia[]" value="'+emergencia+'">   </td><td><input type="hidden"  name="cantidad[]" value="'+cantidad+'"><input type="number" disabled name="cantida[]" value="'+cantidad+'"></td><td><input type="hidden" name="costo_unitario[]" value="'+costo_unitario+'"><input type="number"  disabled name="cost[]" value="'+costo_unitario+'"></td><td >'+subtotal[cont]+'</td></tr>';
					cont++;
					limpiar();
					$('#total').html("$/ " + total);
					evaluar();
					$('#detalles').append(fila);
			}
			else
			{
				alert("Por favor ingrese los datos")
			}
		}
		function limpiar(){
			$("#cantidad").val("");
			
		//	$("#costo_unitario").val("");
		}
		function evaluar()
		{
			if (total>0)
			{
			$("#guardar").show();
			}
			else
			{
			$("#guardar").hide();
			}
		}
		function eliminar(index){
			total=total-subtotal[index];
			$("#total").html("S/. " + total);
			$("#fila" + index).remove();
			evaluar();
		}

//---------------Extraer valores del select para mostrar en cada input
		function ShowSelected()
			{
			/* Para obtener el valor */
			//usu_id es el nombre del select, pero realmente el select está con la cédula
			var valores = document.getElementById("usu_id").value;
			console.log(valores);
			console.log('Hola');
			
			fragmentoTexto = valores.split('_');
			$("#nombres").val(fragmentoTexto['0']);
			$('#codigo').val(fragmentoTexto['1']);
			console.log(fragmentoTexto);
			
			/* Para obtener el texto */
			// var combo = document.getElementById("producto");
			// var selected = combo.options[combo.selectedIndex].text;
			// alert(selected);
}


		</script>
		
<script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
<script src="{{asset('assets/vendor/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
<script>
 $(function() {
	//Datemask dd/mm/yyyy
	$('#datemask').inputmask('dd/mm/yyyy', {
				 'placeholder': 'dd/mm/yyyy'
			 })
			 //Datemask2 mm/dd/yyyy
		 $('#datemask2').inputmask('mm/dd/yyyy', {
				 'placeholder': 'mm/dd/yyyy'
			 })
			 //Money Euro
		 $('[data-mask]').inputmask()

 })
</script>
@endpush
@endsection