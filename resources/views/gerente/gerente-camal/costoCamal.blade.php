@extends('layouts.applte') 
@section('contenido') 
@include('camal/cliente-camal/modalPesoPorIngreso')    
    <div class="content-wrapper">
            <div class="content">
                <div class="modal-body">
                    <div class="card">
                        <div class="card-header"> 
                        <h3 class="card-title">COSTOS DEL CAMAL</h3>
                        {{--   <span class="input-group-prepend">
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
							     	<!-- <a  href="{{ url('animal-camal') }}"> -->
									 <span class="fa fa-long-arrow-alt-left"></span> Regresar
								</a> 
                                 <!-- <h3 class="card-title">Usuario camal</h3>	 -->
							</span>
--}}
                                       
                        </div>
                        <div class="card-body">  
                        <nav>
                                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                               
                                        <a class="nav-item nav-link active" id="nav-faenamiento-tab" data-toggle="tab" href="#nav-faenamiento" role="tab" aria-controls="nav-faenmaiento" aria-selected="true">Costos de faenamiento</a>
                                   
                                          <a class="nav-item nav-link" id="nav-matricula-tab" data-toggle="tab" href="#nav-matricula" role="tab" aria-controls="nav-matricula" aria-selected="false">Costos de matricula</a>
                                        
                                        <a class="nav-item nav-link" id="nav-transporte-tab" data-toggle="tab" href="#nav-transporte" role="tab" aria-controls="nav-transporte" aria-selected="false">Costos de transporte</a>
                                       
                                    </div>
                                </nav>
                                <br>
                                <div class="tab-content" id="nav-tabContent">
                             
                                <div class="tab-pane fade show active" id="nav-faenamiento" role="tabpanel" aria-labelledby="nav-faenamiento-tab">
                             
                                   
                                   
                                         <div class="col-lg-12 col-sm-12 col-md-6 col-xs-12">
                                            <div class="table-responsive">
                                               
                                               <h3 align="center">COSTO DE FAENAMIENTO</h3>
                                               
                                               
                                                <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important" >
                                                    <thead style="background-color:#17a2b8">
                                                            <tr>
                                                          <!--   <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">ID.</th> -->
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Descripción</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Estado</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Matricula</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Valor</th>
                                                      
                                                       <!--  <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Editar</th> -->
                                                            <tr>
                                                        </thead> 
                                                    <tbody>
                                                    @if(isset($costoFaenamiento))
                                                        @foreach ($costoFaenamiento as $c)
                                                       
                                                        <tr role="row" class="odd">
                                                            <!-- <td class="sorting_1">{{$c->id}}</td>  --> 
                                                            <td class="sorting_1">{{$c->especie}}</td>
                                                            <td class="sorting_1">Normal</td>
                                                            <td class="sorting_1">Con matricula</td>
                                                            <td class="sorting_1">{{$c->valor}}</td>
                                                         {{--   <td>   
                                                                <a href="" class="btn btn-warning toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                    data-id="{{$c->id}}"
                                                                    data-especie="{{$c->especie}}" data-valor="{{$c->valor}}"
                                                                     data-toggle="modal" data-target="#editCostoFaenamientoModal"  >
                                                                    <i class="fa fa-edit"  aria-hidden="true"></i>  
                                                                </a>  
                                                            </td>--}}
                                                        </tr>
                                                       
                                                        @endforeach
                                                    @endif
                                                    @if(isset($costoCamal))
                                                        @foreach ($costoCamal as $c)
                                                            @if($c->id==1||$c->id==2||$c->id==3||$c->id==4)
                                                            <tr role="row" class="odd">
                                                               <!--  <td class="sorting_1">{{$c->id}}</td>  --> 
                                                                @if($c->id==1)
                                                                <td class="sorting_1">Bovino</td>
                                                                <td class="sorting_1">Emergencia</td>
                                                                <td class="sorting_1">Con matricula</td>
                                                                @endif
                                                                @if($c->id==2)
                                                                <td class="sorting_1">Bovino</td>
                                                                <td class="sorting_1">Emergencia</td>
                                                                <td class="sorting_1">Sin matricula</td>
                                                                @endif
                                                                @if($c->id==3)
                                                                <td class="sorting_1">Porcino</td>
                                                                <td class="sorting_1">Emergencia</td>
                                                                <td class="sorting_1">Con matricula</td>
                                                                @endif
                                                                @if($c->id==4)
                                                                <td class="sorting_1">Porcino</td>
                                                                <td class="sorting_1">Emergencia</td>
                                                                <td class="sorting_1">Sin matricula</td>
                                                                @endif

                                                                <td class="sorting_1">{{$c->valor}}</td>
                                                            {{--
                                                                <td>        
                                                                    <a href="" class="btn btn-warning toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                        data-id="{{$c->id}}"
                                                                        data-descripcion="{{$c->descripcion}}" data-valor="{{$c->valor}}" data-categoria="{{$c->categoria}}"
                                                                        data-toggle="modal" data-target="#editCostoCamalModal"  >
                                                                        <i class="fa fa-edit"  aria-hidden="true"></i>  
                                                                    </a> 
                                                                </td>--}}
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    </tbody>   
                                                </table>
                                                <div class="row">
                               
                                            </div>
                                            </div>       
                                        </div>  
                                            
                                    
                                    </div>
                                  
                                        <div class="tab-pane fade show" id="nav-matricula" role="tabpanel" aria-labelledby="nav-matricula-tab">
                                  
                                        <div class="col-lg-12 col-sm-12 col-md-6 col-xs-12">
                                            <div class="table-responsive">
                                            <h3 align="center">COSTO DE MATRICULA</h3>
                                                <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                    <thead style="background-color:#17a2b8">
                                                            <tr>
                                                            <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Descripción</th>
                                                      <!--   <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Estado</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Matricula</th> -->
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Valor</th>
                                                      
                                                       <!--  <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Editar</th> -->
                                                            <tr>
                                                    </thead> 
                                                    <tbody>
                                                    
                                                    @if(isset($costoCamal))
                                                        @foreach ($costoCamal as $c)
                                                            @if($c->id==5||$c->id==6)
                                                            <tr role="row" class="odd">
                                                               <!--  <td class="sorting_1">{{$c->id}}</td>  --> 
                                                               <td class="sorting_1">{{$c->descripcion}}</td>

                                                                <td class="sorting_1">{{$c->valor}}</td>
                                                            {{--
                                                                <td>        
                                                                    <a href="" class="btn btn-warning toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                        data-id="{{$c->id}}"
                                                                        data-descripcion="{{$c->descripcion}}" data-valor="{{$c->valor}}" data-categoria="{{$c->categoria}}"
                                                                        data-toggle="modal" data-target="#editCostoCamalModal"  >
                                                                        <i class="fa fa-edit"  aria-hidden="true"></i>  
                                                                    </a> 
                                                                </td>--}}
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                    </tbody>
                                                </table>  
                                            </div>     
                                        </div>
                                    </div>     
                                    
                                    <div class="tab-pane fade show" id="nav-transporte" role="tabpanel" aria-labelledby="nav-transporte-tab">
                                  
                                  <div class="col-lg-12 col-sm-12 col-md-6 col-xs-12">
                                      <div class="table-responsive">
                                      <h3 align="center">COSTO DE TRANSPORTE</h3>
                                          <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                              <thead style="background-color:#17a2b8">
                                                      <tr>
                                                      <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Descripción</th>
                                                <!--   <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Estado</th>
                                                  <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Matricula</th> -->
                                                  <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Valor</th>
                                                
                                                  <!-- <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Editar</th> -->
                                                      <tr>
                                              </thead> 
                                              <tbody>
                                              
                                              @if(isset($costoCamal))
                                                  @foreach ($costoCamal as $c)
                                                      @if($c->categoria==1)
                                                      <tr role="row" class="odd">
                                                         <!--  <td class="sorting_1">{{$c->id}}</td>  --> 
                                                         <td class="sorting_1">{{$c->descripcion}}</td>

                                                          <td class="sorting_1">{{$c->valor}}</td>
                                                      
                                                          <!-- <td>        
                                                              <a href="" class="btn btn-warning toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                  data-id="{{$c->id}}"
                                                                  data-descripcion="{{$c->descripcion}}" data-valor="{{$c->valor}}" data-categoria="{{$c->categoria}}"
                                                                  data-toggle="modal" data-target="#editCostoCamalModal"  >
                                                                  <i class="fa fa-edit"  aria-hidden="true"></i>  
                                                              </a> 
                                                          </td> -->
                                                      </tr>
                                                      @endif
                                                  @endforeach
                                              @endif
                                              </tbody>
                                          </table>  
                                      </div>     
                                  </div>
                              </div>                             
                                </div>
                            <div class="row">
                               
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
