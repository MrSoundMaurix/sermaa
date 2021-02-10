@extends('layouts.applte') 
@section('contenido') 
@include('camal/cliente-camal/modalPesoPorIngreso')    
    <div class="content-wrapper">
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
												<h3 class="card-title" >DETALLES DE PESO</h3>
										</span>		
									</div>
								</div>

                                       
                        </div>
                      
                        <div class="card-body">  
                            
                                <nav>
                                    <div class="nav nav-tabs " id="nav-tab" role="tablist">
                                    <?php if(count($animalesV)!=0){  $active="active"?>
                                        <a class="nav-item nav-link active" id="nav-home-tab" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Bovino</a>
                                     <?php }?>   <?php if(count($animalesP)!=0){
                                         if(count($animalesV)==0){?>
                                          <a class="nav-item nav-link active" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Porcino</a>
                                          <?php }else{?>
                                          
                                        <a class="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#nav-profile" role="tab" aria-controls="nav-profile" aria-selected="false">Porcino</a>
                                         <?php }}?>
                                    </div>
                                </nav>
                                <br>
                                <div class="tab-content" id="nav-tabContent">
                               <?php if(count($animalesV)!=0){?>
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                               <?php }else{?>
                                    <div class="tab-pane fade show" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                                    <?php  }?>
                                         <div class="col-lg-12 col-sm-12 col-md-6 col-xs-12">
                                            <div class="table-responsive">
                                               
                                               <h3 align="center">BOVINO</h3>
                                               
                                               
                                                <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important" >
                                                    <thead style="background-color:#17a2b8">
                                                            <tr>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nro: activate to sort column ascending" >Nro.</th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Código: activate to sort column ascending" >Código</th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Especie: activate to sort column ascending" >Especie</th>
                                                            <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Peso: activate to sort column ascending" >Peso Total(Kg)</th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Opción: activate to sort column ascending" >Opción</th>
                                                            <tr>
                                                        </thead> 
                                                    <tbody>
                                                    
                                                    <?php $i=0;?>
                                                        @if(isset($animalesV))
                                                            @foreach ($animalesV as $ic)
                                                            <?php $i=$i+1;?>
                                                                <tr role="row" class="odd">
                                                                <td class="sorting_1"><?php echo ''.$i?> <img src="{{asset('assets/svg/cow.svg')}}" Style="width:30px;"></td>
                                                                    <td class="sorting_1">{{$ic->codigo_agrocalidad}}</td>
                                                                    <td class="sorting_1">Bovino</td>
                                                                    <td class="sorting_1">{{$ic->peso}}</td> 
                                                                    <td>
                                                                
                                                                    <a href="" class="btn btn-success btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                        data-id="{{$ic->id}}"data-toggle="modal" data-target="#pesoPorIngresoModal"  >
                                                                        <i class="fa fa-eye"  aria-hidden="true"></i>Ver pesos </a>   
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        @endif
                                                    </tbody>   
                                                </table>
                                                <div class="row">
                               
                                            </div>
                                            </div>       
                                        </div>  
                                            
                                    
                                    </div>
                                   <?php if(count($animalesV)==0){?>
                                    <div class="tab-pane fade show active" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <?php } else{?>
                                        <div class="tab-pane fade show" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab">
                                    <?php }?>
                                        <div class="col-lg-12 col-sm-12 col-md-6 col-xs-12">
                                            <div class="table-responsive">
                                            <h3 align="center">PORCINO</h3>
                                                <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                    <thead style="background-color:#17a2b8">
                                                            <tr>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nro: activate to sort column ascending" >Nro.</th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Código: activate to sort column ascending" >Código</th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Especie: activate to sort column ascending" >Especie</th>
                                                        <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Peso: activate to sort column ascending" >Peso Total(Kg)</th> 
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Opción: activate to sort column ascending" >Opción</th>
                                                            <tr>
                                                    </thead> 
                                                    <tbody>
                                                    
                                                        <?php $j=0;?>
                                                            @if(isset($animalesP))
                                                                @foreach ($animalesP as $ic)
                                                                <?php $j=$j+1;?>
                                                                    <tr role="row" class="odd">
                                                                        
                                                                    <td class="sorting_1"><?php echo ''.$j?> <img src="{{asset('assets/svg/pig.svg')}}" Style="width:30px;"></td>
                                                                        
                                                                        <td class="sorting_1">{{$ic->codigo_agrocalidad}}</td>
                                                                        <td class="sorting_1">Porcino</td>  
                                                                    <td class="sorting_1">{{$ic->peso}}</td> 
                                                                        <td>

                                                                        <a href="" class="btn btn-success btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                            data-id="{{$ic->id}}"data-toggle="modal" data-target="#pesoPorIngresoModal"  >
                                                                            <i class="fa fa-eye"  aria-hidden="true"></i> Ver pesos</a>

                                                                            
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
