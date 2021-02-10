@extends('layouts.applte')
    @section('contenido')
    
    @include('costoFaenamiento/edit')
		<div class="content-wrapper">
                <!--Content Header (Page header)-->
               
                @include('layouts.messages')
               
				<div class="content">
					<div class="modal-body">
				    	<div class="card card-info card-outline">
                            <div class="card-header">  
                                <h3 class="card-title">COSTO DE FAENAMIENTO</h3>
                                    <!-- <div class= "card-tools" class="btn btn-tool" data-card-widgest="colapse">
                                    </div> -->      
                            </div>
                            <div class="card-body ">
{{--                                 <div class="row">
                                    <div class="col-sm-6 md:w-1/3 px-3">
                                        <div class="form-group">
                                            <span class="fa fa-cicle-o"></span> 
                                                <a href="{{ url('sector-mercado/create') }}" class="btn btn-info btn-rounded waves-effect" title="Añadir Nuevo sector">
                                                    <span class="fa fa-plus-square"></span>  Nuevo
                                                </a>   
                                        </div>        
                                    </div>
                                    <div class="col-sm-6 " style="text-align:right">
                                      @include('sectorMercado/search')
                                                 
                                      </div>
                                </div>   --}}  
                                   
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                <thead style="background-color:#17a2b8"  >
                                                    <tr role="row">
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Descripción</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Estado</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Matrícula</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Valor</th>
                                                        <th style="color:#FFFFFF; "class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Editar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($costoFaenamiento))
                                                        @foreach ($costoFaenamiento as $c)
                                                        <tr role="row" class="odd">
                                                            {{--  <td class="sorting_1">{{$uc->id}}</td>  --}}
                                                            <td class="sorting_1">{{$c->especie}}</td>
                                                            <td class="sorting_1">Normal</td>
                                                            <td class="sorting_1">Con matricula</td>
                                                            <td class="sorting_1">{{$c->valor}}</td>
                                                          
                                                            <td> 
                                                                
                                                                <a href="" class="btn btn-warning toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                    data-id="{{$c->id}}" data-identificador="1"
                                                                    data-especie="{{$c->especie}}" data-valor="{{$c->valor}}"
                                                                     data-toggle="modal" data-target="#editCostoFaenamientoModal"  >
                                                                    <i class="fa fa-edit"  aria-hidden="true"></i>  
                                                                </a> 

                                                               
                                                             
                                                            </td>
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
                                                                <td>
                                                                <a href="" class="btn btn-warning toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                    data-id="{{$c->id}}" data-identificador="2"
                                                                    data-especie="{{$c->descripcion}}" data-valor="{{$c->valor}}"
                                                                     data-toggle="modal" data-target="#editCostoFaenamientoModal"  >
                                                                    <i class="fa fa-edit"  aria-hidden="true"></i>  
                                                                </a> 

                                                               
                                                             
                                                            </td>
                                                            @endif
                                                            @endforeach
                                                    @endif

                                                </tbody>
                                            </table>
                                            </div>
    
                                </div>
                                <div class="row">
                            {{--  
                                  <!-- <div class="pagination-wrapper"> {!! $sectorMercado->appends(['search' => Request::get('search')])->render() !!} </div>
                                    </div>  -->
                                     {{ $sectorMercado->render() }}
                                    
			                         --}}

                                    
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
  $('#editCostoFaenamientoModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') 
    var especie = button.data('especie') 
    var valor = button.data('valor') 
    var identificador = button.data('identificador') 
   
    var modal = $(this)
    modal.find(".modal-body #id").val(id);
    modal.find('.modal-body #especie').val(especie);
    modal.find(".modal-body #valor").val(valor);
    modal.find(".modal-body #identificador").val(identificador);
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
                      
