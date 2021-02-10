@extends('layouts.applte')
    @section('contenido')
    
  
		<div class="content-wrapper">
                <!--Content Header (Page header)-->
               
                @include('layouts.messages')
               
				<div class="content">
					<div class="modal-body">
				    	<div class="card card-info card-outline">
                            <div class="card-header">  
                               <div class="row">
                                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                                        <span class="input-group-prepend">
                                        </span>
                                    </div>
                                    <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                                        <span class="" style="text-align: center;">
                                        <h3 class="card-title">HISTORIAL FECHA LÍMITE DE MATRÍCULA ANUAL</h3>
                                        </span>
                                    </div>
                               </div>        
                            </div>
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-12 md:w-1/3 px-3" style="text-align:center">
                                        @include('matriculasMercado/fecha/searchDate')       
                                    </div>
                                  
                                </div>  
                                   
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                <thead style="background-color:#17a2b8" >
                                                    <tr role="row">
                                               <!--      <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">id</th> -->
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Fecha de cambio</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >AÑO</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >MES</th>
                                                        <th style="color:#FFFFFF; "  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >DÍA</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >HORA</th>
                                               <!--          <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Categoría</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Editar</th> -->
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($fechas))
                                                        @foreach ($fechas as $c)
                                                        <tr role="row" class="odd">
                                                         <!--  <td class="sorting_1">{{$c->id}}</td>   -->
                                                         <td class="sorting_1">{{$c->created_at}}</td>   
                                                            <td class="sorting_1">{{$c->anio}}</td>  
                                                            <td class="sorting_1">{{$c->mes}}</td>
                                                            <td class="sorting_1">{{$c->dia}}</td>
                                                            <td class="sorting_1">{{$c->hora}}</td>
                                                          
                                                          <!--   <td> 
                                                                
                                                                <a href="" class="btn btn-warning toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                    data-id="{{$c->id}}"
                                                                    data-especie="{{$c->descrion}}" data-valor="{{$c->valor}}"
                                                                     data-toggle="modal" data-target="#editCostoCamalModal"  >
                                                                    <i class="fa fa-edit"  aria-hidden="true"></i>  
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
   
    var modal = $(this)
    modal.find(".modal-body #id").val(id);
    modal.find('.modal-body #especie').val(especie);
    modal.find(".modal-body #valor").val(valor);
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
                      
