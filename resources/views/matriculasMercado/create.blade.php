@extends('layouts.applte')
	@section('contenido')
	<link rel="stylesheet" href="{{asset('assets/vendor/daterangepicker/daterangepicker.css')}}">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{asset('assets/vendor/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
			<div class="content-wrapper">
				<div class="content">
					<div class="modal-body">
							
							
								<div class="card card-info card-outline">
								
									<div class="card-header">  
										<div class="row">	
											<div class="col-lg-5 col-sm-3 col-md-4 col-xs-12">
											<span class="input-group-prepend">	
												
												
											</span> 
											</div>	
											<div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
											<span class="" style="text-align: center;">
												<h3 class="card-title" >NUEVO PAGO DE MATRÍCULA DEL MERCADO</h3>
											</span>		
											
											</div>
										</div>   
									</div>
									<br>
									{!!Form::open(array('url'=>'matriculas-mercado-store','method'=>'POST','autocomplete'=>'off'))!!} 
									{{Form::token()}}
										@csrf
										@method('POST')
								

									<div class="card-body">
										<div class="row">
											<div class="col-lg-8 col-sm-8 col-md-8 col-xs-12">
												<div class="card">
													<div class="card-body">
															<div class="row" style="text-align: center;">
																<div class="col-lg-3"  >
																	<div class="form-group">
																		<label>Puesto:</label>
																			<select required id="puestos" name="puestos" class="custom-select" {{--onchange="javascript:handleSelect3(this)"--}}>
																				<option>Seleccione</option>
																				@if(isset($puestos_usuario))    
																										@foreach ($puestos_usuario as $usm)      
																											@if($usm->sectorMercado->tipo_pago->estadia=="PERMANENTE"||$usm->sectorMercado->tipo_pago->estadia=="EVENTUAL")
																											<option 
																											value="{{$usm->id}}_{{$usm->nro_puesto}}_{{$usm->sectorMercado->tipo_pago->estadia}}_{{$usm->sectorMercado->sector}}_{{$usm->sectorMercado->mercado}}"
																											>{{$usm->nro_puesto}}</option>   
																											@endif                                                    
																									@endforeach
																									@if(!count($puestos_usuario)==0)
																									<input  type="hidden" name="id_users" id="id_users" value="{{$puestos_usuario[0]->id_users}}">
																									@endif
																				@endif		
																			
																			</select>
																			
																	</div>
																</div>
																<div class="col-lg-3">

																<label> Sector</label>
																	<div class="input-group">
																		<span class="input-group-prepend">
																			<span class="input-group-text">
																				<a class="text-info">S</a>
																			</span>
																		</span>
																		<input readonly  type="text" name="sector" id="sector" class="form-control" placeholder="sector">		
																	</div>
																</div>
																<input   type="hidden" name="estadia" id="estadia" class="form-control" placeholder="Estadía">
																<div class="col-lg-4">

																<label> Mercado</label>
																	<div class="input-group">
																		<span class="input-group-prepend">
																			<span class="input-group-text">
																				<a class="text-info">M</a>
																			</span>
																		</span>
																		<input readonly  type="text" name="mercado" id="mercado" class="form-control" placeholder="mercado">		
																	</div>
																</div>	
																<div class="col-lg-2">	
																	<div class="form-group">
																		<label for="bt_add">Añadir</label>
																				<br>
																			<button class="btn btn-info btn-block btn-rounded waves-effect " type="button" 
																				id="bt_add"> AÑADIR</button>
																	</div>
																</div>	
															</div>
														
													</div>
												</div>
											</div>
											<div class="col-lg-4 col-sm-4 col-md-4 col-xs-4">
												<div class="card">
													<div class="card-body">
														<fieldset class="form-group">
															<div class="row" style="text-align: center;">
																<div class="col-lg-12">
																<label> Usuario: </label>
																	<!-- <div class="input-group"> -->
																		<!-- <span class="input-group-prepend">
																			<span class="input-group-text">
																				<a class="text-info">M</a>
																			</span>
																		</span> -->
																		@if(!count($puestos_usuario)==0)
																		<?php $usuario = DB::table('users')->where('id',$puestos_usuario[0]->id_users)->get(); ?>
																			@if(!count($usuario )==0)
																				
																				{{$usuario[0]->nombres}} {{$usuario[0]->apellidos}}
																		  	@endif  
																		@endif
																			
																	<!-- </div> -->
																</div>	
															</div>	
															<div class="row" style="text-align: center;">
																<div class="col-lg-12">	
																	<label>Fecha límite de matrícula: </label>
																<!-- 	<input disabled name="fe" id="fe "value="{{$fecha->anio}} / {{$fecha->mes}}/{{$fecha->dia}}  {{$fecha->hora}}"> -->
																	{{$fecha->anio}} / {{$fecha->mes}} / {{$fecha->dia}}   {{$fecha->hora}}

																</div>	
															</div>
														</fieldset>	
													</div>
												</div>
											</div>	
											<input type="hidden"name="dentrodelplazo" id="dentrodelplazo" value="{{$dentrodelplazo}}">			
											<input type="hidden"name="tipopago" id="tipopago" value="{{$tipoPago}}">									
										</div>
									</div>	
									<div class="card-body">
										<div class="row">	
												<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
													<div class="table-responsive">
														<table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
															<thead style="background-color:#17a2b8">
															<!-- 	<th style="color:#FFFFFF; ">Opciones</th> -->
																<th style="color:#FFFFFF">Nro puesto</th>
																<th style="color:#FFFFFF;">Estadía</th>
																<th style="color:#FFFFFF;">Sector</th>
																<th style="color:#FFFFFF;">Mercado</th>
																<th style="color:#FFFFFF;">Matrícula</th>
																<th style="color:#FFFFFF;">Costo de matrícula</th>
															</thead>
															<tfoot>		
																<th>TOTAL</th>														
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
									</div>	
										
								
									<div class="col-lg-6 col-sm-6 col-md-6 col-xs-12" id="guardar">
										<div class="form-group">
											<input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
											<button class="btn btn-danger" onclick="javascript:window.location.reload()" type="reset"> <i class="fa fa-trash text-white"></i><a class="text-white">Limpiar</a></button>
											<button class="btn btn-primary" type="submit"><i class="fa fa-save"></i>Guardar cambios</button>
										</div>
									</div>
									{!! Form::close() !!}	
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
	<script type="text/javascript" >
   function handleSelect3(elm){
       console.log(elm.value);
       if(elm.value!='Seleccionar'){
        window.location = elm.value+"";
       }
      
   }
   $( document ).ready(function() {

	var select = document.getElementById('puestos');
	select.addEventListener('change',
	function(){
	var selectedOption = this.options[select.selectedIndex];
	//console.log(selectedOption.value + ': ' + selectedOption.text);
	p1=selectedOption.value;
	var p=p1.split('_')
	//console.log(p);
	$('#sector').val(p[3]);
	$('#mercado').val(p[4]);
	$('#estadia').val(p[2]);
	});
	});

	$(document).ready(function(){
				$('#bt_add').click(function(){
				//	console.log('holii');
				agregar();
			});
		});

		var cont=0;
		total=0;
		
		contador_permanentes=0;
		contador_eventuales=0;
		costo_matricula=0;
		dentrodelplazo= $("#dentrodelplazo").val();
		tipopago= $("#tipopago").val();
		tipopago1=JSON.parse(tipopago);
/* 		console.log(dentrodelplazo+'-tipopago= '+tipopago1[0]['valor_pago']);
		$.each(JSON.parse(tipopago), function (index, value) {
			console.log(index+'-'+value.descripcion);
          });  */

		  costo_ordinaria=tipopago1[0]['valor_pago'];
		  costo_extraordinaria=tipopago1[1]['valor_pago'];
		  costo_segundo_puesto=tipopago1[2]['valor_pago'];
          costo_permanentes=0;
		  costo_eventuales=0;
		  costo=[];
		  $("#guardar").hide();
		function agregar(){
			usu_id=$("#usu_id").val();
		/* 	puesto = $("#puestos").find('option:selected').text(); */
			puesto1 = $("#puestos").find('option:selected').val();
			puestos=puesto1.split('_');
			id_puesto=puestos[0];
			nro_puesto=puestos[1];
			sector=$("#sector").val();
			mercado = $("#mercado").val();
			estadia= $("#estadia").val();
			matricula="";
			
			console.log(puesto1);console.log(sector);console.log('mercado='+mercado);console.log(estadia);
			if(estadia=="PERMANENTE"){
				contador_permanentes++;
			}
			if(estadia=="EVENTUAL"){
				contador_eventuales++;
			}


			if(dentrodelplazo=="NO"&&estadia=="PERMANENTE"){
				costo_permanentes=contador_permanentes*costo_extraordinaria;
				matricula="EXTRAORDINARIA";
				costo[cont]=costo_extraordinaria;
			
			}else if(dentrodelplazo=="SI"&&estadia=="PERMANENTE"){
				costo_permanentes=contador_permanentes*costo_ordinaria;
				matricula="ORDINARIA";
				costo[cont]=costo_ordinaria;
				
			}else 
			if(dentrodelplazo=="NO"&&estadia=="EVENTUAL"||dentrodelplazo=="SI"&&estadia=="EVENTUAL"){
				if(contador_eventuales>1){
					console-log('3');
					matricula="ORDINARIA";
					costo[cont]=costo_segundo_puesto;
					costo_eventuales=((contador_eventuales-1)*parseFloat(costo_segundo_puesto))+parseFloat(costo_ordinaria);
				}else{
					
				costo_eventuales=contador_eventuales*costo_ordinaria;
				matricula="ORDINARIA";
				costo[cont]=costo_ordinaria;
				}
				
			}
		           total=costo_permanentes+costo_eventuales;
				  console.log(costo[cont]);

		 	if (sector!="" &&  matricula!="" )
			{ 
					/* subtotal[cont]=(cantidad*costo_unitario);
					total=total+subtotal[cont]; */
					var fila='<tr class="selected" id="fila'+cont+'"><td><input type="hidden" name="id_puesto[]" value="'+
					id_puesto+'"><input type="text" disabled name="id_puesto[]" style="width:100px" value="'+nro_puesto+'"></td><td><input type="hidden" name="estadia[]" value="'+estadia
					+'"><input type="text" disabled name="estadia[]" style="width:115px" value="'+estadia+'"><td><input type="hidden" name="sector[]" value="'+sector+'"><input type="text" disabled name="sector[]" value="'+
					sector+'">   </td><td><input type="hidden"  name="mercado[]" value="'+mercado+'">'+mercado+'</td><td><input type="hidden" name="matricula[]" value="'+matricula+'"><input type="text" disabled name="matricula[]" style="width:150px" value="'+
					matricula+'"></td><td ><input type="hidden" name="costo[]" style="width:150px" value="'+costo[cont]+'"> $ ' +costo[cont]+'</td></tr>';
					cont++;
					limpiar(nro_puesto);
					$('#total').html("$/ " + total);
					evaluar();
					$('#detalles').append(fila);
			}
			 else
			{
				alert("Por favor seleccione un puesto")
			} 
		}
		function evaluar()
		{ console.log(total);
			if (total>0)
			{
			$("#guardar").show();
			}
			else
			{
			$("#guardar").hide();
			}
		}
		function limpiar(nro_puesto){
			$("#sector").val("");
			$("#mercado").val("");
			var selectobject = document.getElementById("puestos");
				for (var i=0; i<selectobject.length; i++) {
					//console.log('select '+selectobject.options[i].text);
					if (selectobject.options[i].text == nro_puesto)
						selectobject.remove(i);
				}
			$("#puestos").val("Seleccione");

	
		}
		function eliminar(index){
			console.log(total+'-'+costo[index]);
			total=total-costo[index];
			
			$("#total").html("S/. " + total);
			$("#fila" + index).remove();
			//evaluar();
		}


</script>

 
  @endpush
                         