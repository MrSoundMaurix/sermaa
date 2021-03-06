@extends('layouts.applte') 
@section('contenido') 
@include('camal/faenador-camal/modalanimalPorcino')    
    <div class="content-wrapper">
    @include('layouts.messages')
            <div class="content">
                <div class="modal-body">
                <!-- <div class="card card-info card-outline" > -->
                    <div class="card">
                        <div class="card-header">  
                            <div class="row">
                            <span class="input-group-prepend">	
                                     <?php $valor_almacenado = session('previ'); ?> 
                                        <a href="{{$valor_almacenado }}" class="btn btn-secondary btn-rounded waves-effect ml-4 mr-4" title="Regresar">
                                                <span class="fa fa-long-arrow-alt-left"></span> Regresar
                                         </a> 	
                                    </span>
                                                               
                            </div>            
                        </div>
                        <div class="card-body"> 
                        
                        <nav>
                            <div class="nav nav-tabs " id="nav-tab" role="tablist"> 
                                    
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <?php if(count($animalesV)==0){?>
                                        <?php } else{?>
                                        <li class="nav-item">
                                                <a href="{{url('animal-camal/show?id='.$id.'')}}" class="nav-link btn-rounded waves-effect toastrDefaultSuccess"  data-keyboard="false" id="pesoTotalV" name="pesoTotalV" > Bovino </a>
                                        </li>
                                    <?php } ?>
                                        <li class="nav-item">
                                                <a href="{{url('animal-camal-porcino?id='.$id.'')}}"  class="nav-link active toastrDefaultSuccess"  data-keyboard="false" id="porcino" name="porcino" >Porcino</a>  
                                        </li> 
                                </div>  
                        </nav>         
                       {{--  @if($animalesP!="") --}}
                       </br>
                            <div class="row">
                                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                                </div>
                                <div class="col-lg-5 col-sm-5 col-md-5 col-xs-12">
                                    <h3 class="card-title">PORCINO</h3> 
                                </div>    
                            </div></br> 
                            <div class="row">  
                                <div class="col-lg-12 col-sm-12 col-md-12 col-xs-12">
                                    <div class="table-responsive">
                                   
                                        <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead style="background-color:#17a2b8">
                                                <tr>
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 20%;">Nro.</th>
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 25%;">Código</th>
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 2%;">Especie</th>
                                                    <!-- <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 20%;">Peso(Kg)</th> -->
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" style="width: 10%;">Opción</th>
                                                <tr>
                                            </thead> 
                                            <tbody>
                                          
                                          <?php $i=0;?>
                                              @if(isset($animalesP))
                                                  @foreach ($animalesP as $ic)
                                                     <?php $i=$i+1;?>
                                                      <tr role="row" class="odd">
                                                          <td class="sorting_1"><?php echo ''.$i?> <img src="{{asset('assets/svg/pig.svg')}}" Style="width:30px;"></td>
                                                          <td class="sorting_1">{{$ic->codigo_agrocalidad}}</td>
                                                          <!-- <td class="sorting_1">{{$ic->codigo}}</td> -->
                                                          <td class="sorting_1">Porcino</td>
                                                         <!--  <td class="sorting_1"><input disabled id="<?php echo $ic->codigo?>" name="<?php echo $ic->codigo?>"  ></td> -->
                                                          <td>
                                                          <!-- <a Style="color:#FFFFFF" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess"  data-keyboard="false" id="pesoTotalV" name="pesoTotalV" 
                                                          onclick="calcularPesoP('<?php echo $ic->codigo?>','<?php echo$i?>')">
                                                          <i class="fas fa-calculator"  aria-hidden="true"></i></i>Calcular peso total </a> -->
        <!--                                                   <a style="pointer-events: none; cursor: default; color:#CACACA; background-color:F5F5F5;" id="<?php echo $ic->codigo.'-'.$i?>" name="<?php echo $ic->codigo.'-'.$i?>" href="" class="btn btn-success btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                              data-id="{{$ic->id}}" data-id_ingresos="{{$ic->id_ingresos}}"data-toggle="modal" data-target="#verAnimalModal"  >
                                                              <i class="fas fa-balance-scale"  aria-hidden="true"></i>Peso por piezas </a> 
 -->
                                                              <a id="<?php echo $ic->codigo.'-'.$i?>" name="<?php echo $ic->codigo.'-'.$i?>" href="" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                              data-id="{{$ic->id}}" data-id_ingresos="{{$ic->id_ingresos}}" data-codigo_animal="{{$ic->codigo}}" data-codigo_agrocalidad_animal="{{$ic->codigo_agrocalidad}}"
                                                              data-id_animal="{{$ic->id}}" data-toggle="modal" data-target="#verAnimalModal"  >
                                                              <i class="fas fa-balance-scale"  aria-hidden="true"></i>Peso por piezas </a>
                                                               
                                                          </td>
                                                      </tr>
                                                  @endforeach
                                              @endif
                                          </tbody>   
                                           
                                        </table>  
                                    </div>     
                                </div>
                            </div>
                            <div class="row">                             
                                 {{-- $animalesP->render() --}}
    
                            </div> 
                      {{--   @endif    --}} 
                        </div>
                    </div>
               <!--      </div>  -->
                </div>	
            </div>
    </div>	
                      
@endsection
@push('scripts')
<script type="text/javascript">


            
 
</script>
@endpush

    
  
