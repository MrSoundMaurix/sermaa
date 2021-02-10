@extends('layouts.applte')
@section('contenido')

    @include('sectorMercado/edit')
    @include('sectorMercado/delete')
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
                            <h3 class="card-title">SECTOR DEL MERCADO</h3>

                        </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body ">
                        <div class="row">
                            <div class="col-sm-8 md:w-1/3 px-3">
                                <div class="form-group">
                                    <span class="fa fa-cicle-o"></span>
                                    <a href="{{ url('sector-mercado/create') }}"
                                    class="btn btn-info btn-rounded waves-effect" title="Añadir Nuevo sector">
                                        <span class="fa fa-plus-square"></span> Nuevo sector
                                    </a>
                                </div>
                            </div>
                            <div class="col-sm-4 " style="text-align:right">
                                @include('sectorMercado/search')

                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-12">
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
                                                style="width: 80px;">Código
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Date registered: activate to sort column ascending"
                                                style="width: 200px;">Sector
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Role: activate to sort column ascending"
                                                style="width: 200px;">Mercado
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Role: activate to sort column ascending"
                                                style="width: 88px;">Tipo de pago
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                rowspan="1" colspan="1"
                                                aria-label="Role: activate to sort column ascending"
                                                style="width: 88px;">Opciones
                                            </th>

                                        </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($sectorMercado))
                                            @foreach ($sectorMercado as $uc)

                                                <tr role="row" class="odd">
                                                    {{--  <td class="sorting_1">{{$uc->id}}</td>  --}}
                                                    <td class="sorting_1">{{$uc->codigo}}</td>
                                                    <td class="sorting_1">{{$uc->sector}}</td>
                                                    <td class="sorting_1">{{$uc->mercado}}</td>
                                                    <td class="sorting_1">{{$uc->tipo_pago->descripcion}}</td>

                                                    <td>

                                                        <a href="" class="btn btn-warning toastrDefaultSuccess"
                                                           data-backdrop="static" data-keyboard="false"
                                                           data-id="{{$uc->id}}" data-codigo="{{$uc->codigo}}"
                                                           data-sector="{{$uc->sector}}" data-mercado="{{$uc->mercado}}"
                                                           data-tipo_pago="{{$uc->tipo_pago->id}}" data-toggle="modal"
                                                           data-target="#editSectorMercadoModal">
                                                            <i class="fa fa-edit" aria-hidden="true"></i>
                                                        </a>


                                                        <a title="Eliminar" data-toggle="modal"
                                                           data-target="#deleteSectorMercadoModal"
                                                           data-action="{{route('sector-mercado.destroy',$uc->id)}}"
                                                           data-codigo="{{$uc->codigo}}" data-sector="{{$uc->sector}}"
                                                           data-mercado="{{$uc->mercado}}" href="#"
                                                           class="btn btn-danger">

                                                            <i class="fa fa-trash" aria-hidden="true"></i>
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
                                {{ $sectorMercado->appends(['searchT' => $query])->links() }} 


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

    <!----EDITAR SECTOR MERCADO ---->
    <script>
        $('#editSectorMercadoModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var codigo = button.data('codigo')
            var sector = button.data('sector')
            var subsector = button.data('subsector')
            var mercado = button.data('mercado')
            var tipo_pago = button.data('tipo_pago')

            var modal = $(this)
            modal.find(".modal-body #id").val(id);
            modal.find('.modal-body #codigo').val(codigo);
            modal.find(".modal-body #sector").val(sector);
            modal.find('.modal-body #subsector').val(subsector);
            modal.find('.modal-body #mercado').val(mercado);
            modal.find('.modal-body #id_tipo_pago_mercado').val(tipo_pago);

        });


    </script>
    <!--ELIMNAR SECTOR MERCADO------->
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

@endpush

{{--  @section('contenido')
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
              <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
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
