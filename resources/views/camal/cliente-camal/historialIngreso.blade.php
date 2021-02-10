
@extends('layouts.applte') 
@section('contenido')
@include('camal/cliente-camal/VerDetalleIngresoModal')
    <div class="content-wrapper">
            @include('layouts.messages')
           
            <div class="content">
                <div class="modal-body">
                <div class="card card-info card-outline" >
                    <div class="card">
                        <div class="card-header">  
                        <div class="row">
                            <div class="col-sm-4 " style="text-align:center"> 
                                    
                                </div> 
                                <div class="col-sm-5 " style="text-align:center"> 
                                    <h3 class="card-title">DETALLES DE PESOS DE CADA REGISTRO</h3>
                                </div>  
                            </div>       
                        </div>
                        <div class="card-body">
                  
                            <div class="row">
                                <div class="col-sm-4 md:w-1/3 px-3">
                                    <!-- <span class="fa fa-cicle-o"></span> 
                                        <a href="{{ url('') }}" class="btn btn-info btn-rounded waves-effect" title="Añadir Nuevo Ingreso">
                                            <span class="fa fa-plus-square"></span>  Nuevo Ingreso
                                        </a>    -->
                                </div>
                                
                                <div class="col-sm-4 " style="text-align:center">
                               @include('camal/cliente-camal/searchIngreso')          
                                </div>
                            </div>    
                               
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead style="background-color:#17a2b8"  >
                                                <tr role="row">
                                                <th  style="color:#FFFFFF; "class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending">Id Ingreso</th> 
                                                    <!--  <th  style="color:#FFFFFF; "class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 25px;">Cod. usuario</th>  -->
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Fecha de Ingreso</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Fecha de faenamiento</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Responsable de recepción de datos</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Matricula</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Detalles</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending">Opción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($ingresoscamal))
                                              
                                                    @foreach ($ingresoscamal as $ic)
                                                    <tr role="row" class="odd">
                                                    <td class="sorting_1">{{$ic->id}}</td>      
                                                  <!--   <td class="sorting_1">{{$ic->codigo}}</td>  -->   
                                                    <td class="sorting_1">{{$ic->fecha_ingreso}}</td>
                                                    <td class="sorting_1">{{$ic->fecha_faenamiento}}</td>
                                                    <td class="sorting_1">{{$ic->responsable_recepcion_datos}}</td>
                                                    <td class="sorting_1">
                                                            <?php $a= explode("_",$ic->matricula);
                                                            if($a[0]=="SI"){?>
                                                                 <span class="pull-right badge bg-yellow">  <?php echo $a[0]; ?></span>
                                                            <?php }else if($a[0]=="NO"){?>
                                                                <span class="pull-right badge bg-pink">  <?php echo $a[0]; ?></span>
                                                            <?php }?>
                                                            </td>  
                                                            <td> 
                                                                <a href="" class="btn btn-danger waves-effect toastrDefaultSuccess" title="Ver detalles" data-backdrop="static" data-keyboard="false"
                                                                    data-nombres="{{$ic->nombres}} {{$ic->apellidos}}" data-guiados="{{$ic->codigo}}"  data-idd="{{$ic->id}}" data-lugar_procedencia="{{$ic->lugar_procedencia}}" 
                                                                    data-cedula="{{$ic->cedula}}" data-direccion="{{$ic->direccion}}" data-telefono="{{$ic->telefono}}" data-matricula="{{$a[0]}}" data-valor_matricula="{{$a[1]}}" 
                                                                    data-codigo="{{$ic->id}}" data-fecha_ingreso="{{$ic->fecha_ingreso}}" data-csmi="{{$ic->csmi}}" data-costo_total="{{$ic->costo_total}}" 
                                                                    data-toggle="modal" data-target="#detalleIngreso" >
                                                                   <i> <img src="{{asset('assets/svg/paper.svg')}}"  Style="width:30px;"> </i>
                                                                </a>
                                                                
                                                          </td>
                                                    <!--        -->
                                                  <!--   <td class="sorting_1"> {{$ic->id}}   </td>  -->  
                                                        <td> 
                                                             <a href="cliente-historial-ingreso/show?id={{$ic->id}}" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false">
                                                             <img  src="{{asset('assets/svg/vaca-sagrada.svg')}}" Style="width:30px;" >  Ver animales
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
                            {{ $ingresoscamal->appends(['searchT' => $searchT])->links()}}
    
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
$('#detalleIngreso').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var idd = button.data('idd') 
          var nombres = button.data('nombres') 
          var cedula = button.data('cedula') 
          var direccion = button.data('direccion') 
          var codigo = button.data('codigo') 
          var telefono = button.data('telefono') 
          var matricula = button.data('matricula') 
          var valor_matricula = button.data('valor_matricula') 
          var fecha_ingreso = button.data('fecha_ingreso') 
          var lugar_procedencia = button.data('lugar_procedencia') 
          var costo_total = button.data('costo_total') 
          var guiados = button.data('guiados')
          var guia_movilizacion = button.data('csmi')             
          var modal = $(this)
          modal.find('.modal-body #nombres').val(nombres)
          modal.find('.modal-body #cedula').val(cedula)
          modal.find('.modal-body #direccion').val(direccion)
          modal.find('.modal-body #lugar_procedencia').val(lugar_procedencia)
          modal.find('.modal-body #idd').val(idd)
          modal.find('.modal-body #guiados').val(guiados)
          if(matricula=="SI"){
            modal.find('.modal-body #matricula').val(valor_matricula)
          }else {
            modal.find('.modal-body #matricula').val(valor_matricula) 
          }
          modal.find('.modal-body #telefono').val(telefono)
          modal.find('.modal-body #fecha_ingreso').val(fecha_ingreso)
          modal.find('.modal-body #costo_total').val(costo_total)
          modal.find('.modal-body #guia_movilizacion').val(guia_movilizacion)
          console.log(codigo);
          console.log(guia_movilizacion);
          detallesIngreso(codigo,costo_total) ;
          });

          
  function detallesIngreso(id_ingreso,costo_total) {
    if ($.trim(id_ingreso) != '') {
            console.log(id_ingreso);
            $.get("/detalles", {id_ingreso: id_ingreso}, function (detalles) {
            $('#detalles').empty();  
            $('#detalles').append('<tr id="fila" style="background-color:#17a2b8"><th  style="color:#FFFFFF;  border: medium transparent">Especie</th><th style="color:#FFFFFF; border: medium transparent" >Género</th><th style="color:#FFFFFF;  border: medium transparent" >N° de animales en estado normal</th><th style="color:#FFFFFF;  border: medium transparent" >Costo de faenamiento en estado normal</th><th style="color:#FFFFFF;  border: medium transparent" >N° de animales en estado de emergencia</th><th style="color:#FFFFFF;  border: medium transparent" >Costo de faenamiento en estado de emergencia</th><th style="color:#FFFFFF;  border: medium transparent" >Total de animal</th><th style="color:#FFFFFF;  border: medium transparent" >Subtotal</th></tr>'); 
            $.each(detalles, function (index, value) {
                if(value.id_costo_faenamiento==1){
                    a="Bovino"
                }
                if(value.id_costo_faenamiento==2){
                    a="Porcino"
                }
              $('#detalles').append('<tr id="fila"><td>'+a+'</td><td >'+value.genero+'</td><td >'+(value.cantidad-value.cantidad_emergencia)+'</td><td >'+'$ '+value.costo_unitario+'</td><td>'+value.cantidad_emergencia+'</td><td>'+'$ '+value.costo_unitario_emergencia+'</td><td>'+value.cantidad+'</td><td>'+'$ '+value.subtotal+'</td></tr>');  
                     })
                }); 
            }
            $('#total').html("$/ " + costo_total);
        };

</script>
@endpush