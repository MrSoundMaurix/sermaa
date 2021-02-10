@extends('layouts.applte')
@section('contenido')
    @include('camal/usuario-camal/edit')
    @include('camal/usuario-camal/delete')
    <div class="content-wrapper">
        <!--Content Header (Page header)-->
        @include('layouts.messages')
        <div class="content">
            <div class="modal-body">
                <div class="card card-info card-outline">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">CLIENTES DEL CAMAL</h3>
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-sm-8 md:w-1/3 px-3">
                                    <div class="form-group">
                                        <span class="fa fa-cicle-o"></span>
                                        <a href="{{ url('usuarios-camal/create') }}" class="btn btn-info btn-rounded waves-effect"
                                            title="Añadir Nuevo Usuario">
                                            <span class="fa fa-plus-square"></span> Nuevo
                                        </a>
                                    </div>    
                                </div>
                                <div class="col-sm-4 " style="text-align:right">
                                    @include('camal/usuario-camal/search')
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table
                                            class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap"
                                            id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                            style="border-collapse: collapse !important">
                                            <thead style="background-color:#17a2b8">
                                                <tr role="row">
                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Role: activate to sort column ascending">Cédula</th>
                                                    <!-- <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Nombre: activate to sort column ascending">Id</th> -->
                                                   
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Date registered: activate to sort column ascending">Nombres y Apellidos
                                                    </th>
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Nombre: activate to sort column ascending">Código</th>
                                                    <!-- <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Role: activate to sort column ascending">Apellidos</th> -->
                                                   
                                                        <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Role: activate to sort column ascending">Email</th>
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Role: activate to sort column ascending">Teléfono</th>
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Role: activate to sort column ascending">Dirección</th>
                                                    <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                        aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                        aria-label="Actions: activate to sort column ascending">Opción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if (isset($usuarioscamal))
                                                    @foreach ($usuarioscamal as $uc)
                                                        <tr role="row" class="odd">
                                                            <!-- <td class="sorting_1">{{ $uc->id }}</td> -->
                                                            <td class="sorting_1">{{ $uc->cedula }}/ </br>{{ $uc->name }}</td>
                                                            
                                                            <td class="sorting_1">{{ $uc->nombres }}  {{ $uc->apellidos }}</td>
                                                            <td class="sorting_1">{{ $uc->codigo }}</td>
                                                        <!--   <td class="sorting_1">{{ $uc->apellidos }}</td> -->
                                                            
                                                            <td class="sorting_1">{{ $uc->email }}</td>
                                                            <td class="sorting_1">{{ $uc->telefono }}</td>
                                                            <td class="sorting_1">{{ $uc->direccion }}</td>
                                                            <td>
                                                                <a href="" class="btn btn-warning toastrDefaultSuccess"
                                                                    data-backdrop="static" data-keyboard="false"
                                                                    data-id="{{ $uc->id }}" data-nombres="{{ $uc->nombres }}"
                                                                    data-cedula="{{ $uc->cedula }}"
                                                                    data-telefono="{{ $uc->telefono }}"
                                                                    data-direccion="{{ $uc->direccion }}"
                                                                    data-apellidos="{{ $uc->apellidos }}"
                                                                    data-toggle="modal"
                                                                    data-target="#editUsuarioCamalModal">
                                                                    <i class="fa fa-edit" aria-hidden="true"></i>
                                                                </a>
                                                                <a title="Eliminar" data-toggle="modal"
                                                                    data-target="#deleteUsuarioCamalModal"
                                                                    data-action="{{ route('usuarios-camal.destroy', $uc->id) }}"
                                                                    data-nombres="{{ $uc->nombres }}"
                                                                    data-apellidos="{{ $uc->apellidos }}" href="#"
                                                                    class="btn btn-danger"><i class="fa fa-trash"
                                                                        aria-hidden="true"></i>
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
                                    {{-- $usuarioscamal->render() --}}
                                    {{ $usuarioscamal->appends(['query' => $query])->links()}}
                                </div>
                            </div>
                        </div>
                    </div>
                <div> 
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
        //-----ELIMINAR USUARIO CAMAL----------------------------
        $(document).ready(function() {
            $('#deleteUsuarioCamalModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var action = button.data('action');
                var nombres = button.data('nombres');
                var apellidos = button.data('apellidos');

                var modal = $(this);
                modal.find(".modal-content #txtEliminar").html("¿Está seguro de eliminar el Usuario <b>" +
                    nombres + "</b>?");

                modal.find(".modal-content form").attr('action', action);
            });
        });

        $('#editUsuarioCamalModal').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget) // Button that triggered the modal
            var id = button.data('id')
            var nombres = button.data('nombres')
            var apellidos = button.data('apellidos')
            var cedula = button.data('cedula')
            var direccion = button.data('direccion')
            var telefono = button.data('telefono')

            var modal = $(this)
            modal.find(".modal-body #id").val(id);
            modal.find('.modal-body #nombres').val(nombres)
            modal.find(".modal-body #apellidos").val(apellidos);
            modal.find('.modal-body #cedula').val(cedula)
            modal.find('.modal-body #telefono').val(telefono)
            modal.find('.modal-body #direccion').val(direccion)
        });

    </script>
@endpush
