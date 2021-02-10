@extends('layouts.applte')
@section('contenido')

    @include('tipoPagoMercado/edit')
    @include('tipoPagoMercado/create')
    @include('tipoPagoMercado/delete')
    <div class="content-wrapper">
        <!--Content Header (Page header)-->

        @include('layouts.messages')

        <div class="content">
            <div class="modal-body">
                <div class="card card-info card-outline">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                                <span class="input-group-prepend">
                                </span>
                            </div>
                            <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                                <span class="" style="text-align: center;">
                                    <h3 class="card-title">TIPO DE PAGO DEL MERCADO</h3>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <nav>
                            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                               <a class="nav-item nav-link active" id="nav-arrendamiento-tab" data-toggle="tab" href="#nav-arrendamiento" role="tab" aria-controls="nav-arrendamiento" aria-selected="true">Arrendamiento</a>
                                   <a class="nav-item nav-link" id="nav-matricula-tab" data-toggle="tab" href="#nav-matricula" role="tab" aria-controls="nav-matricula" aria-selected="false">Costos de matrícula</a>        
                            </div>
                        </nav>
                        <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-arrendamiento" role="tabpanel" aria-labelledby="nav-arrendamiento-tab">
                        <div class="row">
                       
                            <div class="col-sm-6 md:w-1/3 px-3">
                            </br>
                                <span class="fa fa-cicle-o"></span>
                                {{-- <a href="{{ url('tipo-pago-mercado/create') }}"
                                    class="btn btn-info btn-rounded waves-effect" title="Añadir tipo de pago del mercado">
                                    <span class="fa fa-plus-square"></span> Nuevo 
                                </a> --}}
                                <a href="" class="btn btn-info btn-rounded waves-effect toastrDefaultSuccess"
                                    data-backdrop="static" data-keyboard="false" data-toggle="modal"
                                    data-target="#createTipoPagoMercado">
                                    <i class="fa fa-plus-square" aria-hidden="true"></i>
                                    Nuevo tipo de pago
                                </a>
                            </div>
                            <div class="col-sm-6 ">
                            </br>
                              {{-- @include('tipoPagoMercado/search')--}}

                            </div>
                        </div>
                        
                            
                                    <div class="col-sm-12">
                                    </br>
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap"
                                                id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                                style="border-collapse: collapse !important">
                                                <thead style="background-color:#17a2b8; color:#fff">
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Nombre: activate to sort column ascending"
                                                            style="width: 80px;">Descripción</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Date registered: activate to sort column ascending"
                                                            style="width: 200px;">Valor de pago</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Date registered: activate to sort column ascending"
                                                            style="width: 200px;">Categoría</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Date registered: activate to sort column ascending"
                                                            style="width: 200px;">Frecuencia de pago</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Role: activate to sort column ascending"
                                                            style="width: 88px;">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($tipoPagoMercado))
                                                        @foreach ($tipoPagoMercado as $t)
                                                        @if($t->categoria==0||$t->categoria==2)
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">{{ $t->descripcion }}</td>
                                                                <td class="sorting_1">{{ $t->valor_pago }}</td>
                                                                <td class="sorting_1">
                                                                    {{ \App\Models\TipoPagoMercado::showCategory($t->categoria) }}
                                                                </td>
                                                                <td class="sorting_1">
                                                                @if($t->estadia=="PERMANENTE")
                                                                <?php echo "MENSUAL";?>
                                                                 @else  
                                                                  @if($t->estadia=="EVENTUAL"||$t->estadia=="OCASIONAL")
                                                                <?php echo "DIARIO";?>
                                                                @endif
                                                                @endif


                                                                </td>
                                                                <td>
                                                                    <a href="" class="btn btn-warning toastrDefaultSuccess"
                                                                        data-backdrop="static" data-keyboard="false"
                                                                        data-id="{{ $t->id }}"
                                                                        data-descripcion="{{ $t->descripcion }}"
                                                                        data-valor_pago="{{ $t->valor_pago }}"
                                                                        data-estadia="{{ $t->estadia }}"
                                                                        data-categoria="{{ $t->categoria }}" data-toggle="modal"
                                                                        data-target="#editTipoPagoMercadoModal">
                                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                                    </a>
                                                                    {{-- <a title="Eliminar"
                                                                        data-toggle="modal"
                                                                        data-target="#deleteTipoPagoMercadoModal"
                                                                        data-action="{{ route('tipo-pago-mercado.destroy', $t->id) }}"
                                                                        data-tipo_pago="{{ $t->tipo_pago }}"
                                                                        data-valor_pago="{{ $t->valor_pago }}" href="#"
                                                                        class="btn btn-danger">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </a> --}}
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
                                        {{ $tipoPagoMercado->appends(['searchT' => $searchT,'tipoPagoMercado2' => $tipoPagoMercado2])->links() }}
                                    </div>
                                </div> 
                                <div class="tab-pane fade show" id="nav-matricula" role="tabpanel" aria-labelledby="nav-matricula-tab">
                                    <div class="col-sm-12">
                                    </br>
                                        <div class="table-responsive">
                                            <table
                                                class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap"
                                                id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                                style="border-collapse: collapse !important">
                                                <thead style="background-color:#17a2b8; color:#fff">
                                                    <tr role="row">
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Nombre: activate to sort column ascending"
                                                            style="width: 80px;">Descripción</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Date registered: activate to sort column ascending"
                                                            style="width: 200px;">Valor de pago</th>
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Date registered: activate to sort column ascending"
                                                            style="width: 200px;">Categoría</th>
                                                       <!--  <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Date registered: activate to sort column ascending"
                                                            style="width: 200px;">Estadía</th> -->
                                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                            rowspan="1" colspan="1"
                                                            aria-label="Role: activate to sort column ascending"
                                                            style="width: 88px;">Opciones</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($tipoPagoMercado2))
                                                        @foreach ($tipoPagoMercado2 as $t)
                                                        @if($t->categoria==1||$t->categoria==2)
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">{{ $t->descripcion }}</td>
                                                                <td class="sorting_1">{{ $t->valor_pago }}</td>
                                                                <td class="sorting_1">
                                                                    {{ \App\Models\TipoPagoMercado::showCategory($t->categoria) }}
                                                                </td>
                                                                <!-- <td class="sorting_1">
                                                                    {{$t->estadia}}
                                                                </td> -->
                                                                <td>
                                                                    <a href="" class="btn btn-warning toastrDefaultSuccess"
                                                                        data-backdrop="static" data-keyboard="false"
                                                                        data-id="{{ $t->id }}"
                                                                        data-descripcion="{{ $t->descripcion }}"
                                                                        data-valor_pago="{{ $t->valor_pago }}"
                                                                        data-estadia="{{ $t->estadia }}"
                                                                        data-categoria="{{ $t->categoria }}" data-toggle="modal"
                                                                        data-target="#editTipoPagoMercadoModal">
                                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                                    </a>
                                                                    {{-- <a title="Eliminar"
                                                                        data-toggle="modal"
                                                                        data-target="#deleteTipoPagoMercadoModal"
                                                                        data-action="{{ route('tipo-pago-mercado.destroy', $t->id) }}"
                                                                        data-tipo_pago="{{ $t->tipo_pago }}"
                                                                        data-valor_pago="{{ $t->valor_pago }}" href="#"
                                                                        class="btn btn-danger">
                                                                        <i class="fa fa-trash" aria-hidden="true"></i>
                                                                    </a> --}}
                                                                </td>
                                                            </tr>
                                                            @endif
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
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
    <script type="text/javascript">
        function handleSelect(elm) {
            window.location = elm.value + "";
        }

    </script>

    <!--EDITAR Y ELIMINAR TIPO PAGO MERCADO------->
    <script type="text/javascript">
        //EDITAR
        $('#editTipoPagoMercadoModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var descripcion = button.data('descripcion')
            var estadia = button.data('estadia')
            var valor_pago = button.data('valor_pago')
            var categoria = button.data('categoria')
            
            var modal = $(this)
            modal.find(".modal-body #id").val(id);
            modal.find('.modal-body #descripcion').val(descripcion);
            modal.find('.modal-body #estadia').val(estadia);
            modal.find(".modal-body #valor_pago").val(valor_pago);
            modal.find(".modal-body #categoria").val(categoria);
         
         if(categoria=="1"||categoria=="2"){
              
            modal.find(".modal-body #descripcion").attr("readonly","readonly");
          
          //  document.getElementById('categoria').style.display = "none";
            document.getElementById('estadia').style.display = "none";

          }else{
            
            modal.find(".modal-body #descripcion").removeAttr("readonly");
          //  document.getElementById('categoria').style.display = "inline";
            document.getElementById('estadia').style.display = "inline";
          }
             
            
            
        });

        //ELIMINAR
        $(document).ready(function() {
            $('#deleteTipoPagoMercadoModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var action = button.data('action');
                var tipo_pago = button.data('tipo_pago');
                var valor_pago = button.data('valor_pago');

                var modal = $(this);
                modal.find(".modal-content #txtEliminar").html(
                    "¿Está seguro de eliminar el tipo de pago <b>" + tipo_pago +
                    "</b> con el valor <b>" + valor_pago + "</b>?");

                modal.find(".modal-content form").attr('action', action);
            });
        });

    </script>



@endpush

{{-- @section('contenido')
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Blank Page</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active">Pruebas</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->

        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Provincias</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip"
                        title="Collapse">
                        <i class="fas fa-minus"></i></button>

                </div>
            </div>
            <div class="card-body">

            </div>
        </div>
        <!-- /.card-body -->
        <div class="card-footer">
            Footer
        </div>
        <!-- /.card-footer-->
</div>
<!-- /.card -->

</section>
@endsection




--}}
