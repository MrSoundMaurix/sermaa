
@extends('layouts.applte') 
@section('contenido')
@include('gerente/gerente-camal/detallesDisModal')   
<div class="content-wrapper">
            @include('layouts.messages')

            <div class="content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header">  
                            <div class="row">
                                <div class= "col-sm-4">
                                <span class="input-group-prepend">
                                <?php if($fecha_mes!=""){?>
                                   
                                    <a  href="{{url('/mes-ingreso?fecha_mes='.$fecha_mes.'&&fecha_mes_ingreso='.$fecha_mes.'&page='.$page.'')}}" class="btn btn-secondary btn-rounded waves-effect">
                                    <?php } elseif($fecha_dia!=""){?>
                                    <a  href="{{url('/dia-ingreso?fecha_dia='.$fecha_dia.'&&fecha_ingreso='.$fecha_dia.'&page='.$page.'')}}" class="btn btn-secondary btn-rounded waves-effect">
                                    <?php }elseif($fecha_año!=""){?>
                                    <a  href="{{url('/gerente-camal/create?fecha_año='.$fecha_año.'&fecha_año_ingreso='.$fecha_año.'&page='.$page.'')}}" class="btn btn-secondary btn-rounded waves-effect">
                                    <?php }elseif($searchT!=""){?>
                                        <a  href="{{url('/gerente-camal?page='.$page.'&searchT='.$searchT.'')}}" class="btn btn-secondary btn-rounded waves-effect">
                                        <?php }else{ ?>
                                            <a  href="{{url('/gerente-camal?page='.$page.'')}}" class="btn btn-secondary btn-rounded waves-effect">
                                        <?php }?>
										
                                        <span class="fa fa-long-arrow-alt-left"></span> Regresar
										
									</a>
                                  </span>  
                                </div>
                                <div class="col-sm-4"> 
                                 <h3 class="card-title">DISTRIBUCIÓN </h3> 
                                 </div>  
                            </div>  
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-4 " style="text-align:right">
                                      
                                      </div>
                                <div class="col-sm-4 md:w-1/3 px-3">
                                <label for="Distribución">Seleccione el nombre del destinatario de entrega</label> 
                                                <select id="Distribuciones"  name="Distribuciones" onchange="javascript:handleSelect3(this)" class="form-control">
                                                    <option>Seleccionar</option>
                                                        @if(isset($ingresosDistribucion)) 
                                                            @foreach($ingresosDistribucion as $id) 
                                                           
                                                            <option  value="/gerente-camal/detallesDistribucion/{{$id->id_ingresos}}?id_cabDistribucion={{$id->id}}&fecha_dia={{$fecha_dia}}&fecha_mes={{$fecha_mes}}&fecha_año={{$fecha_año}}&fecha_ingreso={{$fecha_dia}}&fecha_mes_ingreso={{$fecha_mes}}&fecha_año={{$fecha_año}}&page={{$page}}&searchT={{$searchT}}"
                                                        <?php  if ($id_cabDistribucion== $id->id)  {  echo 'selected'; }?>> {{$id->nombre_destinatario}} - {{$id->lugar_destino}}</option>
                                                            @endforeach  
                                                        @endif
                                                </select> </br>
                                </div>
                                
                                <div class="col-sm-4 " style="text-align:right">
                                      
                                </div>
                            </div>    
                               
                           <!--  <div class="row justify-content-center v-100">
                                <div class="col-sm-10"> -->
                                <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <div id="div" >
                                           <table class="table table-bordered table-sm">
                                            <tbody>
                                            @if($id_cabDistribucion!="")
                                                <tr >
                                                
                                                    <td colspan="4"><strong>PLANTA DE FAENAMIENTO DE ANTONIO ANTE SERMAA-EP</strong></td>
                                                    <td  colspan="1"><strong>FECHA Y HORA :</strong> {{$distribucionA->fecha_actual}}</td> 
                                                </tr>
                                                <tr >
                                                    <td rowspan="3" style="width: 5%" class="text-center align-middle"><strong>ORIGEN</strong></td>
                                                    <td  colspan="2"><strong>PROVINCIA:</strong>{{ $distribucionA->origen_provincia }}</td>
                                                    <td  rowspan="2" colspan="2" class="text-center"><strong>NOMBRE DEL DESTINATARIO</strong><br>{{ $distribucionA->nombre_destinatario }}</td>
                                                </tr>
                                                <tr>
                                                    <td  colspan="2"><strong>CANTÓN:</strong>{{ $distribucionA->origen_canton }}</td>
                                                </tr>
                                                <tr>
                                                    <td  colspan="2"><strong>PARROQUIA:</strong>{{ $distribucionA->origen_parroquia }}</td>
                                                    <td  rowspan="2" colspan="2" class="text-center"><strong>LUGAR DE DESTINO</strong><br>{{ $distribucionA->lugar_destino }}</td>
                                                </tr>
                                                <tr >
                                                    <th  rowspan="3" class="text-center align-middle">DESTINO</th>
                                                    <td colspan="2"><strong>PROVINCIA:</strong>{{ $distribucionA->destino_provincia }} </td>
                                                </tr>
                                                <tr>
                                                    <td colspan="2"><strong>CANTÓN:</strong>{{ $distribucionA->destino_canton }} </td>
                                                    <td  rowspan="2" colspan="1" class="text-center"><strong>PLACA DEL MEDIO DE TRANSPORTE</strong><br>{{ $distribucionA->placa_transporte }}</td>
                                                    <td  rowspan="2" colspan="1" class="text-center"><strong>COSTO DE TRANSPORTE</strong><br> $ {{ $distribucionA->costo_transporte }}</td>
                                                </tr>
                                                <tr>
                                                    <td  colspan="2"><strong>PARROQUIA:</strong>{{ $distribucionA->destino_parroquia }} </td>
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
                                                                data-tipopieza="{{$i[3]}}" data-id_ingresos="{{$ingresosDistribucion[0]->id_ingresos}}" data-id_usuario="{{$ingresosDistribucion[0]->id_users}}"data-toggle="modal" data-target="#detallesDis">
                                                                <i class="fa fa-eye"  aria-hidden="true" ></i>   Ver peso 
                                                                </a> 
                                                                <?php }?>
                                                                </td>  
                                                            </tr>
                                                        @endforeach
                                                    @endif
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
<script type="text/javascript" >
   function handleSelect3(elm){
       console.log(elm.value);
       if(elm.value!='Seleccionar'){
        window.location = elm.value+"";
       }
      
   }
</script>
@endpush