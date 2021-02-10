
@extends('layouts.applte') 
@section('contenido')

@include('camal/cliente-camal/modalverDetalle')   
    <div class="content-wrapper">
            @include('layouts.messages')
           
            <div class="content">
                <div class="modal-body">
                <div class="card card-info card-outline" >
                    <div class="card">
                        <div class="card-header"> 
                            <div class="row">
                            <div class="col-sm-5 " style="text-align:center"> 
                                    
                                </div> 
                                <div class="col-sm-5 " style="text-align:center"> 
                                    <h3 class="card-title">HISTORIAL ENTREGA </h3>
                                </div>  
                            </div>       
                        </div>
                        <div class="card-body">
                            <div class="row">
                            <div class="col-sm-4 " style="text-align:center">
                            </div>
                                <div class="col-sm-4 " style="text-align:center">
                                @include('camal/cliente-camal/search')          
                                </div>
                            </div>    
                               
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead style="background-color:#17a2b8" >
                                            <tr role="row">
                                            <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 100px;">Id. Ingreso</th>
                                                   <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 100px;">Fecha y hora</th>
                                                   <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 25px;">Nombre del destinatario</th> 
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 100px;">Lugar de destino</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Costo transporte</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" style="width: 209px;">Opción</th>
                                                    
                                                </tr>
                                            </thead>
                                            <tbody>
                                            @if(isset($distribucion)) 
                                                    @foreach ($distribucion as $dc)  
                                                      <tr role="row" class="odd"> 
                                                      <!-- <td class="sorting_1">{{$dc->id}}</td>-->
                                                      <td class="sorting_1">{{$dc->id_ingresos}}</td> 
                                                        <td class="sorting_1">{{$dc->fecha_actual}}</td>
                                                        <td class="sorting_1">{{$dc->nombre_destinatario}}</td>
                                                        <td class="sorting_1">{{$dc->lugar_destino}}</td> 
                                                        <td class="sorting_1">{{$dc->costo_transporte}}</td>
                                                        <td> 
                                                            <!-- <a href="" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                            data-id_ingresos="{{$dc->id_ingresos}}" data-id_cdistribucion="{{$dc->id}}" data-toggle="modal" data-target="#verDetalles">
                                                                <i class="fa fa-eye"  aria-hidden="true" ></i>  Ver detalles
                                                               
                                                            </a>        -->
                                                            <a href="{{url('historial_entrega_detalles?id='.$dc->id.'')}}" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                            data-id_ingresos="{{$dc->id_ingresos}}" data-id_cdistribucion="{{$dc->id}}" >
                                                                <i class="fa fa-eye"  aria-hidden="true" ></i>  Ver detalles
                                                            </a> 
                                                        </td>    
                                                    </tr>
                                                    @endforeach 
                                                @endif         
                                                  

                                            </tbody>
                                        </table>
                                        </div>     
                            </div>
                            <div class="row">                             
                            {{ $distribucion->appends(['searchT' => $searchT])->links()}}
    
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