
@extends('layouts.applte') 
@section('contenido')

@include('camal/cliente-camal/modalverPesosHistorialEntrega')   
    <div class="content-wrapper">
            @include('layouts.messages')
           
            <div class="content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">  
                                <div class="row">	
									<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
										<span class="input-group-prepend">	
											<a href="{{URL::previous()}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
													<span class="fa fa-long-arrow-alt-left"></span> Regresar
											</a> 	
										</span> 
									</div>	
									<div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
										<span class="" style="text-align: center;">
												<h3 class="card-title" >DETALLES DE ENTREGA</h3>
										</span>		
									</div>
								</div> 
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-6 md:w-1/3 px-3">
                                    <!-- <span class="fa fa-cicle-o"></span> 
                                        <a href="{{ url('') }}" class="btn btn-info btn-rounded waves-effect" title="Añadir Nuevo Ingreso">
                                            <span class="fa fa-plus-square"></span>  Nuevo Ingreso
                                        </a>    -->
                                </div>
                                
                                <div class="col-sm-6 " style="text-align:right">
                                      
                                </div>
                            </div>    
                               
                           <!--  <div class="row justify-content-center v-100">
                                <div class="col-sm-10 align-self-center text-center"> -->
                                <div class="row">
                               <!--  <div class="col-sm-12 align-self-center text-center"> -->
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <div id="div">
                                            <table class="table table-bordered table-sm">
                                                <tbody>
                                                    <tr>
                                                    
                                                        <td colspan="4"><strong>PLANTA DE FAENAMIENTO DE ANTONIO ANTE SERMAA-EP</strong></td>
                                                        <td colspan="1"><strong>FECHA Y HORA :</strong> {{$distribucion[0]->fecha_actual}}</td>
                                                    </tr>
                                                   
                                                    <tr>
                                                        <td rowspan="3" style="width: 5%" class="text-center align-middle"><strong>ORIGEN</strong></td>
                                                        <td colspan="2"><strong>PROVINCIA:</strong>{{ $distribucionA->origen_provincia }}</td>
                                                        <td rowspan="2" colspan="2" class="text-center"><strong>NOMBRE DEL DESTINATARIO</strong><br>{{ $distribucionA->nombre_destinatario }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><strong>CANTÓN:</strong>{{ $distribucionA->origen_canton }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><strong>PARROQUIA:</strong>{{ $distribucionA->origen_parroquia }}</td>
                                                        <td rowspan="2" colspan="2" class="text-center"><strong>LUGAR DE DESTINO</strong><br>{{ $distribucionA->lugar_destino }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th rowspan="3" class="text-center align-middle">DESTINO</th>
                                                        <td colspan="2"><strong>PROVINCIA:</strong>{{ $distribucionA->destino_provincia }} </td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><strong>CANTÓN:</strong>{{ $distribucionA->destino_canton }} </td>
                                                        <td rowspan="2" colspan="1" class="text-center"><strong>PLACA DEL MEDIO DE TRANSPORTE</strong><br>{{ $distribucionA->placa_transporte }}</td>
                                                        <td  rowspan="2" colspan="1" class="text-center"><strong>COSTO DE TRANSPORTE</strong><br> $ {{ $distribucionA->costo_transporte }}</td>
                                                    </tr>
                                                    <tr>
                                                        <td colspan="2"><strong>PARROQUIA:</strong> </td>
                                                    </tr>
                                                    
                                                    <tr style="background-color:#17a2b8">
                                                    
                                                        <td style="color:#FFFFFF; border: medium transparent" rowspan="<?php if(count($cantidad) > 18 ) { echo 19; } else { echo count($cantidad) + 1; } ?>"><strong>DETALLE</strong></td>
                                                        <th style="color:#FFFFFF; border: medium transparent">ESPECIE</th>
                                                        <th style="color:#FFFFFF; border: medium transparent">PRODUCTO</th>
                                                        <th style="color:#FFFFFF; border: medium transparent">CANTIDAD</th>
                                                        
                                                        <th style="color:#FFFFFF; border: medium transparent">Opción</th></tr>
                                                    </tr>
                                                        @if(isset($cantidad))
                                                            @foreach($cantidad as $i) 
                                                                <tr role="row" class="odd">
                                                                    <td class="sorting_1">{{$i[0]}}</td>
                                                                    <td class="sorting_1">{{$i[1]}}</td>
                                                                    <td class="sorting_1">{{$i[2]}}</td>
                                                                    <td>  
                                                                    <?php if($i[1]=='Brazos' || $i[1]=='Piernas'){?>                                                            
                                                                    <a href="" class="btn btn-warning btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                    data-tipopieza="{{$i[3]}}" data-id_ingresos="{{$distribucion[0]->id_ingresos}}" data-id_usuario="{{$distribucion[0]->id_users}}" data-toggle="modal" data-target="#verPesos">
                                                                    <i class="fa fa-eye"  aria-hidden="true" ></i>  Ver pesos </i>
                                                                    </a> 
                                                                    <?php }?>
                                                                    </td>  
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                </tbody>
                                            </table>
                                        </div>
                                </div>     
                            </div>     
                        </div>
                    </div>
                </div> 
            </div>	
        </div>
    </div>	
                      
@endsection
@push('scripts')
<script >

</script>
@endpush