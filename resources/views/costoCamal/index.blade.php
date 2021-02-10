@extends('layouts.applte')
    @section('contenido')
    
    @include('costoCamal/edit')
    @include('costoCamal/create')
		<div class="content-wrapper">
                <!--Content Header (Page header)-->
               
                @include('layouts.messages')
               
				<div class="content">
					<div class="modal-body">
				    	<div class="card card-info card-outline">
                            <div class="card-header">  
                                <h3 class="card-title">COSTOS ADICIONALES</h3>
                                    <!-- <div class= "card-tools" class="btn btn-tool" data-card-widgest="colapse">
                                    </div> -->      
                            </div>
                            
                            <div class="card-body ">
                                <div class="row">
                                    <div class="col-sm-6 md:w-1/3 px-3">
                                        <span class="fa fa-cicle-o"></span> 
                                        <a href="" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess"
                                        data-backdrop="static" data-keyboard="false" data-toggle="modal"
                                        data-target="#createTipoPago">
                                        <i class="fa fa-plus-square" aria-hidden="true"></i>
                                        Nuevo costo de transporte
                                    </a>

                                           {{--  <a href="{{ url('sector-mercado/create') }}" class="btn btn-info btn-rounded waves-effect" title="Añadir Nuevo sector">
                                                <span class="fa fa-plus-square"></span>  Nuevo costo transporte
                                            </a>    --}}
                                    </div>
                                    <br>
                                    <div class="col-sm-6 " style="text-align:right">
                                    {{--  @include('sectorMercado/search') --}}
                                                 
                                      </div>
                                </div>  
                                <br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                <thead style="background-color:#17a2b8" >
                                                    <tr role="row">
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">id</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" style="width: 80px;">Descripción</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Valor</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Categoría</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" style="width: 200px;">Editar</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($costoCamal))
                                                        @foreach ($costoCamal as $c)
                                                            @if($c->id>4)
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">{{$c->id}}</td>  
                                                                <td class="sorting_1">{{$c->descripcion}}</td>
                                                                <td class="sorting_1">{{$c->valor}}</td>
                                                                @if($c->id==5||$c->id==6)
                                                                <td class="sorting_1">Costos de matricula</td>
                                                                @endif
                                                                @if($c->categoria==1)
                                                                    <td class="sorting_1">Costo de transporte</td>
                                                                @endif
                                                                <td>   
                                                                    <a href="" class="btn btn-warning toastrDefaultSuccess" data-backdrop="static" data-keyboard="false"
                                                                        data-id="{{$c->id}}"
                                                                        data-descripcion="{{$c->descripcion}}" data-valor="{{$c->valor}}" data-categoria="{{$c->categoria}}"
                                                                        data-toggle="modal" data-target="#editCostoCamalModal"  >
                                                                        <i class="fa fa-edit"  aria-hidden="true"></i>  
                                                                    </a> 
                                                                </td>
                                                            </tr>
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
  $('#editCostoCamalModal').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
    var id = button.data('id') 
    var descripcion = button.data('descripcion') 
    var valor = button.data('valor') 
   
    var modal = $(this)
    modal.find(".modal-body #id").val(id);
    modal.find('.modal-body #descripcion').val(descripcion);
    modal.find(".modal-body #valor").val(valor);
  });

 
</script>
 
@endpush
                      
