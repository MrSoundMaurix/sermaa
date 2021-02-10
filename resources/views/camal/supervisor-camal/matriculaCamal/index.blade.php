@extends('layouts.applte')
    @section('contenido')
    
    @include('camal/supervisor-camal/matriculaCamal/edit')
    @include('camal/supervisor-camal/matriculaCamal/create')
		<div class="content-wrapper">
                <!--Content Header (Page header)-->
               
                @include('layouts.messages')
               
				<div class="content">
					<div class="modal-body">
				    	<div class="card card-info card-outline">
                            <div class="card-header">  
                                <h3 class="card-title">MATRÍCULA DE CLIENTES</h3>
                                    <!-- <div class= "card-tools" class="btn btn-tool" data-card-widgest="colapse">
                                    </div> -->      
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-3 md:w-1/3 px-3">
                                    </div>
                                    <div class="col-sm-6 md:w-1/6 px-6">
                                    @include('camal/supervisor-camal/matriculaCamal/searchDate') 
                                    </div>
                                </div>  
                                <div class="row">   
                                    <div class="col-sm-8 md:w-1/3 px-3">
                                        <div class="form-group">
                                            <span class="fa fa-cicle-o"></span> 
                                                <a href="" class="btn btn-info toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                    data-toggle="modal" data-target="#crearMatriculaCamalModal"  >
                                                                        <span class="fa fa-plus-square"></span>  Realizar matrícula
                                                                    </a> 
                                        </div>                            
                                    </div>
                                    <div class="col-sm-4 " style="text-align:rigth">
                                     @include('camal/supervisor-camal/matriculaCamal/search') 
                                                 
                                      </div>
                                </div> 
                                
                                   
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                <thead style="background-color:#17a2b8" >
                                                    <tr role="row">
                                                    <th  style="color:#FFFFFF; "class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">id</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Fecha matrícula</th>
                                                        <th style="color:#FFFFFF; "class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Costo de matrícula</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Usuario</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Responsable de matrícula</th>
                                                        <th style="color:#FFFFFF; "class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Editar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <input type="hidden" id="id_matricula" name="id_matricula" >
                                                  @if(isset($matriculas_camal))
                                                        @foreach ($matriculas_camal as $c)
                                                        <tr role="row" class="odd">
                                                            <td class="sorting_1">{{$c->id}}</td>  
                                                            <td class="sorting_1">{{$c->fecha_matricula}}</td>
                                                            <td class="sorting_1">{{$c->costo_matricula}}</td>
                                                            <td class="sorting_1">{{$c->user->nombres}} {{$c->user->apellidos}}</td>
                                                            @foreach ($users as $p)
                                                                @if ($c->responsable_matricula==$p->id)
                                                                <td class="sorting_1">{{$p->nombres.'  '.$p->apellidos}}</td>
                                                                @endif                                              
                                                            @endforeach

                                                            <td> 
                                                                
                                                                 <a href="" class="btn btn-warning toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                    data-id_matricula="{{$c->id}}" data-id_users="{{$c->id_users}}" 
                                                                    data-costo_matricula="{{$c->costo_matricula}}" data-nombres="{{$c->user->nombres}} {{$c->user->apellidos}}" 
                                                                     data-toggle="modal" data-target="#editMatriculaCamalModal"  >
                                                                    <i class="fa fa-edit"  aria-hidden="true"></i>  
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
                                {{ $matriculas_camal->appends(['searchT' => $searchT,
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
    option.value=id_users; //usuario_anterior
    $("#usuario_anterior").val(id_users);
    console.log(id_users);
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
                      
