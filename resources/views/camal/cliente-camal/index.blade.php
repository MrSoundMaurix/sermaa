
@extends('layouts.applte') 
@section('contenido')

@include('camal/cliente-camal/modalverAnimal')   

    <div class="content-wrapper">
            @include('layouts.messages')
           
            <div class="content">
                <div class="modal-body">
                <div class="card card-info card-outline" >
                    <div class="card">
                        <div class="card-header">  
                            <h4 class="card-title">STOCK DE CUARTO FRÍO </h4>     
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
                               
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead  style="background-color:#17a2b8">
                                                <tr role="row">
                                                <!--      <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 200px;" >Código producto</th>  -->
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Producto</th>
                                                    <th style="color:#FFFFFF; "  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >N° de productos Bovino</th>
                                                    <th style="color:#FFFFFF; "class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Peso del producto</th>
                                                    <th style="color:#FFFFFF; "class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >N° de productos Porcino</th>
                                                    <th style="color:#FFFFFF; "class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Peso del producto</th>
                                                </tr>
                                            </thead>
                                            <tbody >
                                        
                                            @if(isset($cantidad_piezas))
                                                   <?php  for($i=0; $i<6; $i++) {?>
                                                    <tr role="row" class="odd">
                                                         <!-- <td class="sorting_1">{{$cantidad_piezas[0][$i]}}</td>  -->
                                                        <td class="sorting_1">{{$cantidad_piezas[3][$i]}}</td>
                                                        <td class="sorting_1">{{$cantidad_piezas[1][$i]}}</td>
                                                        <td>  
                                                        <?php if($cantidad_piezas[1][$i]!=0 && ($cantidad_piezas[3][$i]=='Lateral derecho' || $cantidad_piezas[3][$i]==='Lateral izquierdo')){?>                                                            
                                                        <a href="" class="btn btn-success btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                            data-tipopieza="{{$cantidad_piezas[4][$i]}}" data-toggle="modal" data-target="#verPesos">
                                                                <i class="fa fa-eye"  aria-hidden="true" ></i>  Ver peso
                                                            </a> 
                                                        <?php }?>
                                                        </td>

                                                        <td class="sorting_1">{{$cantidad_piezas[2][$i]}}</td>
                                                        <td>    
                                                        <?php if($cantidad_piezas[2][$i]!=0 && ($cantidad_piezas[3][$i]=='Lateral derecho' || $cantidad_piezas[3][$i]==='Lateral izquierdo')){?>                                                           
                                                        <a href="" class="btn btn-success btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                            data-tipopieza="{{$cantidad_piezas[5][$i]}}" data-toggle="modal" data-target="#verPesos">
                                                                <i class="fa fa-eye"  aria-hidden="true" ></i>  Ver peso
                                                            </a> 
                                                            <?php }?>
                                                        </td>
                                                    </tr>
                                                   
                                             

                                                   <?php }?>
                                                @endif
                                            


                                            </tbody>
                                        </table>
                                    </div>     
                            </div>
                            <div class="row">                             
                              
    
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
$('#verPesos').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id_usuario= button.data('id_usuario')  
          var tipopieza=button.data('tipopieza')               
          var modal = $(this)
        console.log(tipopieza);
         obtener_piezas_pesos(tipopieza) ;
          }); 
          function  obtener_piezas_pesos(tipopieza) {
            if ($.trim(tipopieza) != '') {
                console.log(tipopieza);
                $.get("/piezas_pesos", {tipopieza: tipopieza}, function (piezas_pesos) {
                $('#detalles').empty();   
                console.log(piezas_pesos);
                var $j=1;
                $('#detalles').append('<thead><tr style="background-color:#17a2b8"><th style="color:#FFFFFF; border: medium transparent">N°</th><th style="color:#FFFFFF; border: medium transparent">Código</th><th style="color:#FFFFFF; border: medium transparent">Pieza</th><th style="color:#FFFFFF; border: medium transparent">Peso(KG)</th></tr></thead></br>');
                    $.each(piezas_pesos, function (index, value) {
                        console.log(index);
                        console.log(value.codigo_pieza);
                     $('#detalles').append('<tr><td>'+$j+'</td><td>'+value.codigo_pieza+'</td><td>'+value.pieza+'</td><td>'+value.peso+'</td></tr>');         
                   $j++;  })
                      }); 
                    }
                 }; 
</script>
@endpush
