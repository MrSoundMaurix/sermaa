@extends('layouts.applte')
@section('contenido')
@include('pagosPuestoMercado/edit')
    
    <div class="content-wrapper">
        <div class="content">
            <div class="modal-body">
                <div class="card card-info card-outline">
                    <div class="card">
                        <div class="card-header">
							<div class="row">	
								<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
									<span class="input-group-prepend">	
										<a href="{{route('pagos-puesto-mercado.index')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
													<span class="fa fa-long-arrow-alt-left"></span> Regresar
										</a> 	
									</span> 
								</div>	
								<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
										<span class="" style="text-align: center;">
												<h3 class="card-title" >NUEVO PAGO DEL PUESTO DEL MERCADO</h3>
										</span>		
								</div>
							</div>		
						</div>
                        <br>
                        {!! Form::open(['url' => 'pagos-puesto-mercado','files' => 'true',"method"=>"POST"]) !!}
                       @if(isset($puestoMercado))
                        <input type="hidden" name="id_puestos_mercado" value="{{$puestoMercado->id}}"/>
                        <input type="hidden" name="valor_total"
                               value="{{$puestoMercado->sectorMercado->tipo_pago->valor_pago}}"/>
                        <input type="hidden" name="id_users" value="{{$puestoMercado->id_users}}">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-8 " >
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="row" >	
                                                       <!--  <div class="col-lg-3">		
                                                                <label>Nombres y Apellidos</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <i class="fa fa-address-book"></i>
                                                                            </span>
                                                                        </span>
                                                                        
                                                                        <input  type="text" required disabled name="nombres" id="nombres" 
                                                                    value="{{$users->nombres}} {{$users->apellidos}}" class="form-control" placeholder="Nombres y Apellidos" readonly>	
                                                                    </div> 
                                                            </div> -->
                                                            <div class="col-lg-4">       
                                                                    <div class="form-group">
                                                                        <label>Puesto:</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                    <a class="">P</a>
                                                                                </span>
                                                                            </span>
                                                                            <input disabled type="text" class="form-control" name="pues" value="{{$puestoMercado->nro_puesto}} - {{$puestoMercado->sectorMercado->tipo_pago->estadia}} ">  
                                                                        </div>
                                                                    </div>    

                                                            </div>
                                                            <div class="col-lg-2">		
                                                                <label>Matrícula</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                                <a class="">M</a>
                                                                            </span>
                                                                            </span>
                                                                            
                                                                        <input  type="text" disabled class="form-control"    value="{{$matriculaVigente}}"class="form-control"  readonly>	
                                                                    </div> 
                                                            </div> 
                                                          
                                                        <?php $total=0;?>
                                                            <div class="col-lg-4">        
                                                                    <div class="form-group">
                                                                        <label>Usuario sin matrícula:</label>
                                                                        <div class="input-group">
                                                                            <span class="input-group-prepend">
                                                                                <span class="input-group-text">
                                                                                <i class="fas fa-dollar-sign text-info"></i>
                                                                                </span>
                                                                            </span>
                                                                            @if($puestoMercado->sectorMercado->tipo_pago->estadia=="OCASIONAL" && !$users->estado_matricula
                                                                            ||$puestoMercado->sectorMercado->tipo_pago->estadia=="EVENTUAL" && !$users->estado_matricula)
                                                                            <input type="hidden" class="form-control"  name="valor_adicional" id="valor_adicional" value="{{$tipoPagoCat->valor_pago}}"/>
                                                                            <input disabled type="text" class="form-control"  name="valor_adicional" id="valor_adicional" value="{{$tipoPagoCat->valor_pago}}"/> 
                                                                            <?php $total=$tipoPagoCat->valor_pago;?>
                                                                            @else
                                                                            <input disabled type="text" class="form-control"  name="pues" value="0">  
                                                                            @endif
                                                                        </div>

                                                                    </div>
                                                            </div> 
                                                            <div class="col-lg-2">		
                                                                <label>TOTAL</label>
                                                                    <div class="input-group">
                                                                        <span class="input-group-prepend">
                                                                            <span class="input-group-text">
                                                                            <i class="fas fa-dollar-sign text-info"></i>
                                                                            </span>
                                                                            </span>
                                                                            <?php $total=$total+$puestoMercado->sectorMercado->tipo_pago->valor_pago?>
                                                                            <input disabled class="form-control"  value="{{$total}}">
                                                                        
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
																		{{$users->nombres}} {{$users->apellidos}}
                                                                    
																			
																	<!-- </div> -->
																</div>	
															</div>	
															<div class="row" style="text-align: center;">
																<div class="col-lg-12">	
																	<label>Fecha límite de matrícula: </label>
																<!-- 	<input disabled name="fe" id="fe "value="{{$fecha->anio}} / {{$fecha->mes}}/{{$fecha->dia}}  {{$fecha->hora}}"> -->
																	{{$fecha->anio}}/{{$fecha->mes}}/{{$fecha->dia}} {{$fecha->hora}}

																</div>	
															</div>
														</fieldset>	
													</div>
												</div>
											</div> 

                            </div>    
                                                        
                                        <input type="hidden" name="matricula" id="matricula" value="{{$matriculaVigente}}"/>
                                    
                                            @if($puestoMercado->sectorMercado->tipo_pago->estadia=="PERMANENTE")
                                        <!--  <label>Estadía: Permanente</label> -->
                                            <input type="hidden" name="tipo_permanencia" id="tipo_permanencia" value="1"/>  
                                            @endif
                                            @if($puestoMercado->sectorMercado->tipo_pago->estadia=="EVENTUAL")
                                        <!--   <label>Estadía: Eventual</label>  --> 
                                            <input type="hidden" name="tipo_permanencia" id="tipo_permanencia" value="2"/>  
                                            @endif
                                            @if($puestoMercado->sectorMercado->tipo_pago->estadia=="OCASIONAL")
                                        <!--   <label>Estadía: Ocasional</label>   -->
                                            <input type="hidden" name="tipo_permanencia" id="tipo_permanencia" value="3"/>  
                                            @endif  
                        
                            <div class="row">  
                                <div class="col-md-12" >
                                <div class="card">
                                    <div class="card-body">
                                                <div class="row" >
                                                    <div class="col-lg-4">
                                                        <label>Observación:</label>
                                                        <div class="form-group">
                                                            <textarea class="form-control" name="observacion" class="row"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="col-lg-5">
                                                        <label>Foto:</label>
                                                        <div class="form-group">
                                                            <input class="form-control" type="file" name="foto" id="foto" class="row"/>
                                                        </div>

                                                    </div>
                                                    <div class="col-lg-2">
                                                        <label>Pago Realizado:</label>
                                                        <div class="form-group">
                                                            <select id="pago_realizado" name="pago_realizado" class="custom-select"  >											
                                                            <option value="true"  >Si</option>
                                                            <option value="false" >No</option>	
                                                                
                                                                									   
                                                                </select>
                                                        </div>   
                                                    </div>
                                                    <div class="col-lg-1">
                                                    @if($pagoSN=="1")
                                                        <label>Guardar:</label>
                                                        <div class="form-group">
                                                        <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>
                                                        </div>
                                                    @else
                                                    @endif    
                                                    </div>
                                                </div>         
                                        </div>  
                                    </div>
                                </div>  
                            </div>   
                        </div>     
                        @endif
                
                    <!-- <div class="modal-footer">
                        <div class="form-group form-actions">
                            <a href="{{route('pagos-puesto-mercado.index')}}"
                               class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
                                <span class="fa fa-long-arrow-alt-left"></span> Regresar
                            </a>
                            <button class="btn btn-primary" type="submit"><i class="fa fa-save"></i> Guardar</button>

                        </div>
                    </div> -->
                 
                    {!! Form::close() !!}
                   
                    <fieldset>
                        <div class="row">
                        <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                        </div>
                            <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">	
                                <span class="" style="text-align: center;">
                                                    <h3 class="card-title" >PAGOS RETRASADOS</h3>
										</span>	
                                        </div>
                        </div>
						<div class="row">	
							<div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">     
								<div class="table-responsive">
                                
                                <div class="card-body">
                                    <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                        <thead style="background-color:#17a2b8; color:#fff">
                                        <tr role="row">
                                            
                                            
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"aria-label="Date registered: activate to 
                                                sort column ascending" >Fecha / Hora de registro
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-label="Date registered: activate 
                                                to sort column ascending" >Fecha de Pago
                                            </th>
                                            <th class="sorting">Matrícula</th>

                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-label="Date registered: activate
                                                 to sort column ascending"style="width: 150px;">Valor total
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-label="Date registered: activate
                                                 to sort column ascending">Responsable Cobro
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-label="Date registered: activate to 
                                            sort column ascending"
                                            >¿Pago Realizado?
                                        </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"aria-label="Role: activate to sort column
                                                 ascending" >Foto
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1" aria-label="Role: activate to sort column
                                                 ascending" > Opciones
                                            </th>
                                            {{--   <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 88px;">Opciones</th> --}}

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($pagosPuestoMercado))
                                            @foreach ($pagosPuestoMercado as $t)
                                                <tr role="row" class="odd">
                                                    {{--  <td class="sorting_1">{{$uc->id}}</td>  

                                                    @foreach ($puestosMercado as $p)
                                                    
                                                        @if ($t->id_puestos_mercado==$p->id)
                                                            <td class="sorting_1">{{$p->nro_puesto}}</td>
                                                        @endif

                                                    @endforeach
                                                    --}}
                                                    <!-- <td class="sorting_1">{{$t->user->nombres ." ". $t->user->apellidos}}</td> -->
                                                    <td class="sorting_1">{{$t->fecha}}</td>
                                                    <td class="sorting_1">{{ $t->fecha_pago}}</td>
                                                    <td class="sorting_1">{{$t->matricula}}</td>

                                                    <td class="sorting_1">{{$t->valor_total}}</td>
                                                    <td class="sorting_1">{{$t->responsableCobro->nombres." ". $t->responsableCobro->apellidos}}</td>
                                                   @if($t->pago_realizado==1)
                                                    <td class="sorting_1">Si</td>
                                                   
                                                   @endif
                                                   @if($t->pago_realizado==0)
                                                    <td class="sorting_1">No</td>
                                                   
                                                   @endif
                                                    
                                                    <td class="sorting_1">
                                                        @if ($t->foto)
                                                            <img
                                                                src="{{ 'data:image/' . $t->fototype . ';base64,' . $t->foto }}"
                                                                style="max-width:75px;">
                                                        @endif
                                                    </td>
                                                     <td>

                                                        <a href="" class="btn btn-warning toastrDefaultSuccess"
                                                        data-backdrop="static"
                                                           data-keyboard="false"
                                                            data-id="{{$t->id}}" 
                                                            data-id_puestos_mercado="{{$puestoMercado->id}}"
                                                            data-pago_realizado="{{$t->pago_realizado}}"
                                                           data-observacion="{{$t->observacion}}"
                                                            data-matricula="{{$t->matricula}}"
                                                            data-foto1="{{ 'data:image/' . $t->fototype . ';base64,' . $t->foto }}"
                                                            data-valor_pago="{{$t->valor_total}}"  data-toggle="modal"
                                                             data-target="#editPagosPuestoMercadoModal"  >
                                                            <i class="fa fa-edit"  aria-hidden="true"></i>
                                                        </a>

                                                   {{--     <a title="Eliminar" data-toggle="modal" data-target="#deletePagosPuestoMercadoModal"
                                                            data-action="{{route('pagos-puesto-mercado.destroy',$t->id)}}"
                                                             data-tipo_pago="{{$t->tipo_pago}}"
                                                            data-valor_pago="{{$t->valor_pago}}" href="#" class="btn btn-danger">
                                                            <i class="fa fa-trash" aria-hidden="true"></i>
                                                        </a>
                                                    </td> --}}
                                                </tr>
                                            @endforeach
                                        @endif
                                        </tbody>
                                    </table>
                                    </br>
                                    <div class="row">
                            {{-- $pagosPuestoMercado->links() --}}   
                           </div>
                                  </div> 
                                </div>
                                

                            </div> 
                           
                            </div>
                           
                            </fieldset>
                            </div>
                            
                    
                        
                    



               </div>
            </div>
        </div>
    </div>
    


@endsection

@push('scripts')
    <script>
      //EDITAR
      $('#editPagosPuestoMercadoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var valor_pago = button.data('valor_pago')
            var id_puestos_mercado=button.data('id_puestos_mercado')
           // var pago_realizado = button.data('pago_realizado')
            var matricula = button.data('matricula')
            var foto1 = button.data('foto1')
            var observacion = button.data('observacion')
            var modal = $(this)
            modal.find(".modal-body #id").val(id);
            modal.find(".modal-body #id_puestos_mercado").val(id_puestos_mercado);
            modal.find('.modal-body #valor_pago').val(valor_pago);
            modal.find('.modal-body #observacion').val(observacion);
            modal.find('.modal-body #matricula').val(matricula);
           // console.log('p= '+id_puestos_mercado);
            $('#foto1').attr('src', foto1);
           
        });

        $( document ).ready(function() {

            var select = document.getElementById('pago_realizado');
            select.addEventListener('change',
            function(){
            var selectedOption = this.options[select.selectedIndex];
            console.log(selectedOption.value + ': ' + selectedOption.text);
            if(selectedOption.value=="false"){
                console.log(selectedOption.value);
                $('#foto').attr('required','');  
            }else  if(selectedOption.value=="true"){
                console.log(selectedOption.value);
                $('#foto').removeAttr('required') 
            }
            });
            });

       
        $( document ).ready(function() {

        var select = document.getElementById('pago_realiza');
        select.addEventListener('change',
        function(){
        var selectedOption = this.options[select.selectedIndex];
       // console.log(selectedOption.value + ': ' + selectedOption.text);
        if(selectedOption.text=="No"){
            $('#foto1').attr('required',''); 
        }else  if(selectedOption.text=="Si"){
            $('#foto1').removeAttr('required') 
        }
        });
        });
       

    </script>
@endpush
