@extends('layouts.applte')
@section('contenido')
  {{--  @include('superadministrador.personal.edit')--}}
    @include('superadministrador.personal.restore')
    @include('superadministrador.personal-mercado.restore')
    <div class="content-wrapper">
        @include('layouts.messages')

        <div class="content">
            <div class="modal-body">
                <div class="card card-info card-outline card-tabs">
                    
                <div class="card-header p-0 pt-1 border-bottom-0">
                                <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                            <li class="nav-item">
                                            <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill" href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" aria-selected="true">Usuarios del camal</a>
                                            </li>
                                            <li class="nav-item">
                                            <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill" href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile" aria-selected="false">Usuarios del mercado</a>
                                            </li>
                                            
                                </ul>
                            </div>   
                    <div class="card-body">
                        <div class="tab-content" id="custom-tabs-three-tabContent">
                            <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">                                                      
     
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
                                                       <!--  <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Role: activate to sort column ascending">
                                                            Dirección
                                                        </th> -->
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
                                                            Restaurar
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($usuarios))
                                                        @foreach ($usuarios as $usm)
                                                            <tr role="row" class="odd">
                                                                <td class="sorting_1">
                                                                    {{ $usm->cedula }} / </br>{{ $usm->name }}
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
                                                               <!--  <td class="sorting_1">
                                                                    {{ $usm->direccion }}
                                                                </td> -->
                                                                <td class="sorting_1">
                                                                <?php $teams = DB::table('team_user')->where('user_id',$usm->id)->get(); ?>
                                                                @foreach($teams as $t)
                                                                    @if($t->team_id==2) <?php echo "- Gerente";?> </br> @endif 
                                                                    @if($t->team_id==3) <?php echo "- Supervisor";?></br>  @endif
                                                                    @if($t->team_id==4) <?php echo "- Faenador";?> </br> @endif
                                                                    @if($t->team_id==5) <?php echo "- Administrador";?> </br>  @endif
                                                                    @if($t->team_id==9) <?php echo "- Veterinario";?></br>   @endif
                                                                    @if($t->team_id==8) <?php echo "- Cliente";?></br>   @endif
                                                                    
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
                                                                <!--   <a href="#" class="btn btn-warning" title="Editar"
                                                                        data-toggle="modal" data-target="#editCamalModal"
                                                                        data-id="{{ $usm->id }}"
                                                                        data-nombres="{{ $usm->nombres }}"
                                                                        data-apellidos="{{ $usm->apellidos }}"
                                                                        data-cedula="{{ $usm->cedula }}"
                                                                        data-telefono="{{ $usm->telefono }}"
                                                                        data-direccion="{{ $usm->direccion }}"
                                                                        data-foto="{{ 'data:image/' . $usm->fototype . ';base64,' . $usm->foto }}">
                                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                                    </a> -->

                                                                    <a href="#" class="btn btn-success" title="Restaurar"
                                                                        data-toggle="modal" data-target="#deleteCamalModal"
                                                                        data-action="{{ url('activar-usuarios', $usm->id) }}"
                                                                        data-nombres="{{ $usm->nombres }}"
                                                                        data-apellidos="{{ $usm->apellidos }}">
                                                                        <i class="fas fa-trash-restore" aria-hidden="true"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                              
                                </div>
                            </div>
                            <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
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
                                                        <!-- <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                            aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                            aria-label="Role: activate to sort column ascending">
                                                            Dirección
                                                        </th> -->
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
                                                            Restaurar
                                                        </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if (isset($usuariosM))
                                                        @foreach ($usuariosM as $usm)
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
                                                              <!--   <td class="sorting_1">
                                                                    {{ $usm->direccion }}
                                                                </td> -->
                                                                <td class="sorting_1">
                                                                <?php $teams = DB::table('team_user')->where('user_id',$usm->id)->get(); ?>
                                                                @foreach($teams as $t)
                                                                    @if($t->team_id==7) <?php echo "- Recaudador";?> </br> @endif 
                                                                    @if($t->team_id==6) <?php echo "- Supervisor";?></br>  @endif
                                                                    @if($t->team_id==10) <?php echo "- Usuario del mercado";?></br>  @endif
                                                                  
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
                                                                <!--   <a href="#" class="btn btn-warning" title="Editar"
                                                                        data-toggle="modal" data-target="#editCamalModal"
                                                                        data-id="{{ $usm->id }}"
                                                                        data-nombres="{{ $usm->nombres }}"
                                                                        data-apellidos="{{ $usm->apellidos }}"
                                                                        data-cedula="{{ $usm->cedula }}"
                                                                        data-telefono="{{ $usm->telefono }}"
                                                                        data-direccion="{{ $usm->direccion }}"
                                                                        data-foto="{{ 'data:image/' . $usm->fototype . ';base64,' . $usm->foto }}">
                                                                        <i class="fa fa-edit" aria-hidden="true"></i>
                                                                    </a> -->

                                                                    <a href="#" class="btn btn-success" title="Restaurar"
                                                                        data-toggle="modal" data-target="#deleteMercadoModal"
                                                                        data-action="{{ url('activar-usuarios-mercado', $usm->id) }}"
                                                                        data-nombres="{{ $usm->nombres }}"
                                                                        data-apellidos="{{ $usm->apellidos }}">
                                                                        <i class="fas fa-trash-restore" aria-hidden="true"></i>
                                                                    </a>
                                                                </td>
                                                            </tr>
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
                modal.find(".modal-content #txtEliminar").html("¿Está seguro de restaurar el Usuario <b>" +
                    nombres + " " + apellidos + "</b>?");
                modal.find(".modal-content form").attr('action', action);
            });
        });
        $(document).ready(function() {
            $('#deleteMercadoModal').on('show.bs.modal', function(event) {
                var button = $(event.relatedTarget);
                var action = button.data('action');
                var nombres = button.data('nombres');
                var apellidos = button.data('apellidos');

                var modal = $(this);
                modal.find(".modal-content #txtEliminar").html("¿Está seguro de restaurar el Usuario <b>" +
                    nombres + " " + apellidos + "</b>?");
                modal.find(".modal-content form").attr('action', action);
            });
        });

    </script>
@endpush
