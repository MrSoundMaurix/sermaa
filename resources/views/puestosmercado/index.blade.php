@extends('layouts.applte')
@section('contenido')
    {{-- @include('puestosmercado.edit') --}}
    {{-- @include('puestosmercado.delete') --}}
    <div class="content-wrapper">
        @include('layouts.messages')

        <div class="content">
            <div class="modal-body">
                <div class="card card-outline card-info">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                                <span class="input-group-prepend">

                                </span>
                            </div>
                            <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                                <span class="" style="text-align: center;">
                                    <h3 class="card-title">PUESTOS DEL MERCADO</h3>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 md:w-1/3 px-3">
                                <div class="form-group">
                                    <span class="fa fa-cicle-o"></span>
                                    <a href="{{ url('puestos-mercado/create') }}" class="btn btn-info btn-rounded waves-effect"
                                        title="Añadir Nuevo Puesto">
                                        <span class="fa fa-plus-square"></span> Nuevo puesto
                                    </a>
                                </div>    
                            </div>
                            <div class="col-sm-4" style="text-align:right">
                                @include('puestosmercado.search')
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
                                                    aria-label="Nombre: activate to sort column ascending">
                                                    Nro de puesto
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Nombre: activate to sort column ascending">
                                                    Estadía
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Date registered: activate to sort column ascending">
                                                    Usuario
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Estado
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Sector mercado
                                                </th>
                                               
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Opciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if (isset($puestosmercado))
                                                @foreach ($puestosmercado as $pm)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            {{ $pm->nro_puesto }}
                                                        </td>
                                                        <td class="sorting_1">
                                                            {{ $pm->sector->tipo_pago->estadia}}
                                                        </td>
                                                        <td class="sorting_1">
                                                            {{ $pm->user->nombres . ' ' . $pm->user->apellidos }}
                                                        </td>
                                                        @if($pm->estado_puesto=='A')
                                                            <td class="sorting_1">
                                                                 Activo
                                                            </td>
                                                        
                                                        @endif
                                                        @if($pm->estado_puesto=='I')
                                                            <td class="sorting_1">
                                                            Inactivo
                                                            </td>
                                                        
                                                        @endif  
                                                        <td class="sorting_1">
                                                            {{ $pm->sector->sector . ' - ' . $pm->sector->mercado }}
                                                        </td>
                                                        @if($pm->permanencia==1)
                                                            <td class="sorting_1">
                                                            Permanente
                                                            </td>
                                                        @endif
                                                        @if($pm->permanencia==2)
                                                            <td class="sorting_1">
                                                            Eventual
                                                            </td>
                                                        @endif
                                                        @if($pm->permanencia==3)
                                                            <td class="sorting_1">
                                                            Ocasional
                                                            </td>
                                                        @endif
                                                        <td>
                                                            <a href="{{ route('puestos-mercado.edit', $pm->id) }}"
                                                                class="btn btn-warning" title="Editar">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
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
                                
                                
                    {{ $puestosmercado->appends(['searchT' => $query])->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{-- <script type="text/javascript">
        function handleSelect(elm) {
            window.location = elm.value + "";
        }

        $(document).ready(function() {
            $('#editUsuarioMercadoModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('pm_id')
                var nombres = button.data('pm_nombres')
                var apellidos = button.data('pm_apellidos')
                var cedula = button.data('pm_cedula')
                var telefono = button.data('pm_telefono')
                var direccion = button.data('pm_direccion')
                var foto = button.data('foto')
                var modal = $(this)
                modal.find(".modal-body #pm_id").val(id);
                modal.find('.modal-body #pm_nombres').val(nombres)
                modal.find(".modal-body #pm_apellidos").val(apellidos);
                modal.find('.modal-body #pm_cedula').val(cedula)
                modal.find('.modal-body #pm_telefono').val(telefono)
                modal.find('.modal-body #pm_direccion').val(direccion)
                $('#foto').attr('src', foto);
            });
        });

        $(document).ready(function() {
            $('#deleteUsuarioMercadoModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var action = button.data('action');
                var nombres = button.data('nombres');
                var apellidos = button.data('apellidos');

                var modal = $(this);
                modal.find(".modal-content #txtEliminar").html("¿Está seguro de eliminar el Usuario <b>" +
                    nombres + " " + apellidos + "</b>?");
                modal.find(".modal-content form").attr('action', action);
            });
        });

    </script> --}}
@endpush
