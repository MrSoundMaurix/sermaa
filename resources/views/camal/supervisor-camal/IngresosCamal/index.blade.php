@extends('layouts.applte')
    @section('contenido')
    
 {{--   @include('camal/supervisor-camal/matriculaCamal/edit')
    @include('camal/supervisor-camal/matriculaCamal/create')--}}
    @include('camal/supervisor-camal/IngresosCamal/detallesIngresoModal')
		<div class="content-wrapper">
                <!--Content Header (Page header)-->
               
                @include('layouts.messages')
               
				<div class="content">
					<div class="modal-body">
				    	<div class="card card-info card-outline">
                            <div class="card-header">  
                                <h3 class="card-title">REPORTE DEL REGISTRO DE GUÍA</h3>
                                    <!-- <div class= "card-tools" class="btn btn-tool" data-card-widgest="colapse">
                                    </div> -->      
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-3 md:w-1/3 px-3">
                                    </div>
                                    <div class="col-sm-6 md:w-1/6 px-6">
                                 @include('camal/supervisor-camal/IngresosCamal/searchDate') 
                                    </div>
                                </div>  
                                <div class="row">   
                                    <div class="col-sm-4 ">
                                    </div>
                                        <div class="col-sm-4 " style="text-align:center">
                                        @include('camal/supervisor-camal/IngresosCamal/search') 
                                                    
                                        </div>
                                    </div> 
                                
                                   
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                <thead style="background-color:#17a2b8" >
                                                    <tr role="row">
                                                {{--  <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Responsable recepción</th> --}}
                                                        
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Cod. Usuario </th>
                                                        
                                                        <th style="color:#FFFFFF; "  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Fecha y Hora de registro</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Responsable de registro</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Usuario</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Matricula</th>
                                                      <!--   <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Estado </th> -->
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Detalles</th>
                                                        <!-- <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Condiciones</th> -->   
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Guía</th>                                               
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($ingresos_camal))
                                                        @foreach ($ingresos_camal as $ic)
                                                        <tr role="row" class="odd">
                                                            
                                                            <td class="sorting_1">{{$ic->users->codigo}}</td>
                                                            
                                                            <td class="sorting_1">{{$ic->fecha_ingreso}}</td>
                                                           
                                                            <td class="sorting_1">{{$ic->responsable_recepcion_datos}}</td>
                                                            <td class="sorting_1"> {{$ic->users->nombres}} {{$ic->users->apellidos}}   </td>   
                                                            <td class="sorting_1">
                                                            <?php $a= explode("_",$ic->matricula);
                                                            if($a[0]=="SI"){?>
                                                                 <span class="pull-right badge bg-yellow">  <?php echo $a[0]; ?></span>
                                                            <?php }else if($a[0]=="NO"){?>
                                                                <span class="pull-right badge bg-pink">  <?php echo $a[0]; ?></span>
                                                            <?php }?>
                                                            </td>  
                                                           <!--  <td class="sorting_1"></td> -->
                                                           <!--  <td class="sorting_1"><?php echo '$ ';?> {{$ic->costo_total}}      </td> -->
                                                           <td> 
                                                           
                                                            <a href="" class="btn btn-danger waves-effect toastrDefaultSuccess" title="Ver detalles" data-backdrop="static" data-keyboard="false"
                                                                    data-nombres="{{$ic->users->nombres}} {{$ic->users->apellidos}}" data-codigo="{{$ic->users->codigo}}"  data-idd="{{$ic->id}}" data-lugar_procedencia="{{$ic->lugar_procedencia}}" 
                                                                    data-cedula="{{$ic->cedula}}" data-direccion="{{$ic->users->direccion}}" data-telefono="{{$ic->users->telefono}}" data-matricula="{{$a[0]}}" data-valor_matricula="{{$a[1]}}" 
                                                                    data-id_ingreso="{{$ic->id}}" data-fecha_ingreso="{{$ic->fecha_ingreso}}" data-csmi="{{$ic->csmi}}" data-costo_total="{{$ic->costo_total}}" data-numero_factura="{{$ic->numero_factura}}" 
                                                                    data-toggle="modal" data-target="#DetallesIngreso" >
                                                                    <i> <img src="{{asset('assets/svg/paper.svg')}}"  Style="width:30px;"> </i>
                                                                </a>  
                                                            </td>
                                                           <!--  <td>
                                                                    @if ($ic->validar_transporte==0)
                                                                  @else       
                                                                    
                                                                    <a href="" title="Condiciones del ingreso de animales" class="btn btn-success waves-effect" 
                                                                    data-id_ingresos="{{$ic->id}}" data-fecha_ingreso="{{$ic->fecha_ingreso}}" data-medio_movilizacion="{{$ic->medio_movilizacion}}"
                                                                    data-placa_transporte="{{$ic->placa_transporte}}" data-condicion_transporte="{{$ic->condicion_transporte}}" data-observaciones="{{$ic->observaciones}}"
                                                                    data-fecha_faenamiento="{{$ic->fecha_faenamiento}}"
                                                                    data-toggle="modal" data-target="#condicionesIngreso"   >
                                                                    <img src="{{asset('assets/svg/completed-task.svg')}}" Style="width:30px;">
                                                                   
                                                                       </a> 
                                                                  @endif   
                                                               
                                                            </td>  -->   
                                                            <td> 
                                                            @if ($ic->estado_pdf=="SI")
                                                                <a href="{{url('IngresoCamal/pdfdownload',$ic->id)}}" target="_blank" title="Ver documento guía" 
                                                                class="btn btn-warning waves-effect toastrDefaultSuccess" >
                                                                    <!-- <i class="far fa-file-pdf"></i>  -->
                                                                    <img  src="{{asset('assets/svg/pdf.svg')}}" Style="width:30px">
                                                                    <!-- <i class="far fa-file-alt text-white" ></i>  -->
                                                                </a>           
                                                          @endif
                                                                  
                                                            </td>
                                                            <!-- <td>       
                                                                
                                                                    <a href="{{url('/gerente-camal/detallesDistribucion/'.$ic->id.'')}}" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess" data-backdrop="static" data-keyboard="false" >
                                                             
                                                                <img  src="{{asset('assets/svg/camion-de-reparto.svg')}}" Style="width:30px"></a>
                                                                </a> 
                                                            </td> -->
                                                        
                                                           
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                            </div>   
                                </div>
                                <div class="row">

                                {{ $ingresos_camal->appends(['searchT' => $searchT,
                    'dateto'=>$dateto,'datefrom'=>$datefrom])->links() }} 
    
                                </div>    
                            </div>   
                           
                        </div>
                    </div> 
				</div>	
			</div>
        </div>	
      					
    @endsection

  @push('scripts')
        <script type="text/javascript">
            function handleSelect(elm){
                window.location = elm.value+"";
            }


        </script>

<!----EDITAR SECTOR MERCADO ---->
<script >
  $('#editMatriculaCamalModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id_matricula = button.data('id_matricula') 
    var costo_matricula_edit = button.data('costo_matricula') 
    var id_users = button.data('id_users') 
    var nombres = button.data('nombres') 
    var modal = $(this)
   // modal.find(".modal-body #id_matricula").val(id_matricula);
    modal.find(".modal-body #id_matricula").val(id_matricula);
    modal.find(".modal-body #costo_matricula_edit").val(costo_matricula_edit);
    $("#nombre_usuario_edit").val("");
    var x = document.getElementById("nombre_usuario_edit");
    console.log(x);
    var option = document.createElement("option");
    option.text = nombres;
    option.value=id_users;
    x.add(option, x[0]);
   
    option.setAttribute('selected', 'selected');
  });
  $('#crearMatriculaCamalModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var modal = $(this)
   /*  modal.find(".modal-body #id").val(id);
    modal.find('.modal-body #especie').val(especie);
    modal.find(".modal-body #valor").val(valor); */
  });

 
</script>
{{-- <!--ELIMNAR SECTOR MERCADO------->
<script type="text/javascript">
  $(document).ready(function () {
   $('#deleteSectorMercadoModal').on('show.bs.modal', function (event) {
       var button = $(event.relatedTarget);
       var action = button.data('action');
       var sector = button.data('sector');
       var mercado = button.data('mercado');
      
       var modal = $(this);
       modal.find(".modal-content #txtEliminar").html("¿Está seguro de eliminar el Sector <b>" + sector + "</b> del mercado  <b>" + mercado + "</b>?");
      
       modal.find(".modal-content form").attr('action', action);
   });
 });
</script>
 --}}
@endpush
                      
