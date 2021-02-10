@extends('layouts.applte')
@section('contenido')
    @include('usuarios.edit')
    @include('usuarios.delete')
    <div class="content-wrapper">
        @include('layouts.messages')

        <div class="content">
            <div class="modal-body">
            <div class="card card-info card-outline">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">PERSONAL DEL CAMAL</h3>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-8 md:w-1/3 px-3">
                                <span class="fa fa-cicle-o"></span>
                                <a href="{{ url('usuarios/create') }}" class="btn btn-info btn-rounded waves-effect"
                                    title="Añadir Nuevo Usuario">
                                    <span class="fa fa-plus-square"></span> Nuevo
                                </a>
                            </div>
                            <div class="col-sm-4" style="text-align:right">
                                @include('usuarios.search')
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
                                                    aria-label="Nombre: activate to sort column ascending">
                                                    Cédula
                                                </th>
                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Date registered: activate to sort column ascending">
                                                    Nombres y Apellidos
                                                </th>
                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Código
                                                </th>
                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Teléfono
                                                </th>
                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Email
                                                </th>
                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Rol
                                                </th>
                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Foto
                                                </th>
                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Opciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @if (isset($usuarios))
                                                @foreach ($usuarios as $usm)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">
                                                            {{ $usm->cedula }} /</br> {{ $usm->name }}
                                                        </td>
                                                        <td class="sorting_1">
                                                            {{ $usm->nombres }} {{ $usm->apellidos }}
                                                        </td>
                                                        <td class="sorting_1">
                                                            {{ $usm->codigo }}
                                                        </td>

                                                        <td class="sorting_1">
                                                            {{ $usm->telefono }}
                                                        </td>
                                                        <td class="sorting_1">
                                                            {{ $usm->email }}
                                                        </td>
                                                        <td class="sorting_1">
                                                        <?php $teams = DB::table('team_user')->where('user_id',$usm->id)->get(); ?>
                                                        @foreach($teams as $t)
                                                            @if($t->team_id==2) <?php echo "- Gerente";?> </br> @endif 
                                                            @if($t->team_id==3) <?php echo "- Supervisor";?></br>  @endif
                                                            @if($t->team_id==4) <?php echo "- Faenador";?> </br> @endif
                                                            @if($t->team_id==5) <?php echo "- Administrador";?> </br>  @endif
                                                            @if($t->team_id==9) <?php echo "- Veterinario";?></br>   @endif
                                                        @endforeach
                                                        </td>
                                                        <td class="sorting_1">
                                                            @if ($usm->foto == null)
                                                                -
                                                            @else
                                                                <img src="{{ 'data:image/' . $usm->fototype . ';base64,' . $usm->foto }}"
                                                                    style="max-width:75px;">
                                                            @endif
                                                        </td>
                                                        <td>
                                                            <a href="#" class="btn btn-warning" title="Editar"
                                                                data-toggle="modal" data-target="#editCamalModal"
                                                                data-id="{{ $usm->id }}"
                                                                data-nombres="{{ $usm->nombres }}"
                                                                data-apellidos="{{ $usm->apellidos }}"
                                                                data-cedula="{{ $usm->cedula }}"
                                                                data-telefono="{{ $usm->telefono }}"
                                                                data-direccion="{{ $usm->direccion }}"
                                                                data-foto="{{ 'data:image/' . $usm->fototype . ';base64,' . $usm->foto }}">
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="#" class="btn btn-danger" title="Eliminar"
                                                                data-toggle="modal" data-target="#deleteCamalModal"
                                                                data-action="{{ route('usuarios.destroy', $usm->id) }}"
                                                                data-nombres="{{ $usm->nombres }}"
                                                                data-apellidos="{{ $usm->apellidos }}">
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
                                {{-- $usuarios->links() --}}
                                {{ $usuarios->appends(['query' => $query])->links()}}
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

        $(document).ready(function() {
            $('#editCamalModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget)
                var id = button.data('id')
                var nombres = button.data('nombres')
                var apellidos = button.data('apellidos')
                var cedula = button.data('cedula')
                var telefono = button.data('telefono')
                var direccion = button.data('direccion')
                var foto = button.data('foto')
                var modal = $(this)
                modal.find(".modal-body #id").val(id);
                modal.find('.modal-body #nombres').val(nombres)
                modal.find(".modal-body #apellidos").val(apellidos);
                modal.find('.modal-body #cedula').val(cedula)
                modal.find('.modal-body #telefono').val(telefono)
                modal.find('.modal-body #direccion').val(direccion)
                $('#foto').attr('src', foto);
            });
        });

        $(document).ready(function() {
            $('#deleteCamalModal').on('show.bs.modal', function(event) {
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

    </script>
@endpush
