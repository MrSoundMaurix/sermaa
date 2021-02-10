@extends('layouts.applte')
@section('contenido')
  {{--   @include('usuariosRol.edit')
    @include('usuarios.delete') --}}
    <div class="content-wrapper">
        @include('layouts.messages')

        <div class="content">
            <div class="modal-body">
          
                <div class="card">           
                    <div class="card-body">
                        <div class="row">
                            <div class="col-12 col-sm-12">
                              <div class="card card-primary card-outline card-tabs">
                                <div class="card-header p-0 pt-1 border-bottom-0">
                                  <ul class="nav nav-tabs" id="custom-tabs-three-tab" role="tablist">
                                    <li class="nav-item">
                                      <a class="nav-link active" id="custom-tabs-three-home-tab" data-toggle="pill"
                                       href="#custom-tabs-three-home" role="tab" aria-controls="custom-tabs-three-home" 
                                       aria-selected="true">TIPOS DE PAGO</a>
                                    </li>
                                    <li class="nav-item">
                                      <a class="nav-link" id="custom-tabs-three-profile-tab" data-toggle="pill"
                                       href="#custom-tabs-three-profile" role="tab" aria-controls="custom-tabs-three-profile"
                                        aria-selected="false">SECTORES</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-messages-tab" 
                                        data-toggle="pill" href="#custom-tabs-three-messages" role="tab" 
                                        aria-controls="custom-tabs-three-messages" aria-selected="false">PUESTOS DEL MERCADO</a>
                                      </li>
                                      <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-settings-tab" 
                                        data-toggle="pill" href="#custom-tabs-three-settings" role="tab" 
                                        aria-controls="custom-tabs-three-settings" aria-selected="false">MATRICULADOS</a>
                                      </li>
                                      {{-- <li class="nav-item">
                                        <a class="nav-link" id="custom-tabs-three-settings-tab-sex" 
                                        data-toggle="pill" href="#custom-tabs-three-sex" role="tab" 
                                        aria-controls="custom-tabs-three-settings" aria-selected="false">sex</a>
                                      </li> --}}
                                      
                                  </ul>
                                </div>
                                <div class="card-body">
                                  <div class="tab-content" id="custom-tabs-three-tabContent">
                                    <div class="tab-pane fade show active" id="custom-tabs-three-home" role="tabpanel" aria-labelledby="custom-tabs-three-home-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-striped table-bordered datatable dataTable no-footer table-hover "
                                                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                                        style="border-collapse: collapse !important">
                                                        <thead style="background-color:#17a2b8">
                                                            <tr role="row">
                                                                <th style="color:#FFFFFF;" class="sorting" >
                                                                    Descripción
                                                                </th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Date registered: activate to sort column ascending">
                                                                    Costo $
                                                                </th>
                                                                
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Role: activate to sort column ascending">
                                                                    Categoría
                                                                </th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Role: activate to sort column ascending">
                                                                    Estadía
                                                                </th>
                                                                 
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (isset($tipos_pago_mercado))
                                                                @foreach ($tipos_pago_mercado as $t)
                                                                    <tr role="row" class="odd">
                                                                        <td class="sorting_1">
                                                                            {{ $t->descripcion }} 
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            {{ $t->valor_pago }}
                                                                        </td>
                                                                      
                                                                        <td class="sorting_1">
                                                                            {{ \App\Models\TipoPagoMercado::showCategory($t->categoria) }}
                                                                            
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            {{ $t->estadia }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                {!! $tipos_pago_mercado->links() !!}
                                            </div> --}}
                                            
                                        </div>

                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-profile" role="tabpanel" aria-labelledby="custom-tabs-three-profile-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-striped table-bordered datatable dataTable no-footer table-hover"
                                                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                                        style="border-collapse: collapse !important">
                                                        <thead style="background-color:#17a2b8">
                                                            <tr role="row">
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Nombre: activate to sort column ascending">
                                                                    Código
                                                                </th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Date registered: activate to sort column ascending">
                                                                    Sector 
                                                                </th>
                                                               
                                                               
                                                               
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Role: activate to sort column ascending">
                                                                Tipo de pago
                                                            </th>
                                                            <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Role: activate to sort column ascending">
                                                                Estado
                                                            </th>
                                                            <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Role: activate to sort column ascending">
                                                                    Mercado
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (isset($sector_mercado))
                                                                @foreach ($sector_mercado as $usm)
                                                                    <tr role="row" class="odd">
                                                                        <td class="sorting_1">
                                                                            {{ $usm->codigo }} 
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            {{ $usm->sector }}
                                                                        </td>

                                                                        <td class="sorting_1">
                                                                            <?php $tipo_pago = DB::table('tipo_pago_mercado')->where('id',$usm->id_tipo_pago_mercado)->get(); ?>
                                                                            @foreach($tipo_pago as $t)
                                                                            {{$t->descripcion}}
                                                                            {{--  @if($t->team_id==6) <?php echo "- Supervisor";?> </br> @endif 
                                                                            @if($t->team_id==7) <?php echo "- Operario ";?></br>  @endif
                                                                            @if($t->team_id==10) <?php echo "- Usuario";?> </br> @endif
                                                                            @if($t->team_id==5) <?php echo "- Administrador";?> </br>  @endif --}}
                                                                            
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            @if ( $usm->estado =="A")
                                                                                 Activo 
                                                                            @else
                                                                                 Inactivo 
                                                                            @endif
                                                                             
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            {{ $usm->mercado }}
                                                                            </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                {!! $sector_mercado->links() !!}
                                            </div>
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-messages" role="tabpanel" aria-labelledby="custom-tabs-three-messages-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-striped table-bordered datatable dataTable no-footer table-hover"
                                                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                                        style="border-collapse: collapse !important">
                                                        <thead style="background-color:#17a2b8">
                                                            <tr role="row">
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Nombre: activate to sort column ascending">
                                                                    Código
                                                                </th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Date registered: activate to sort column ascending">
                                                                    Nro de puesto 
                                                                </th>
                                                               
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Role: activate to sort column ascending">
                                                                Sector
                                                            </th>
                                                            <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Role: activate to sort column ascending">
                                                                Nombres y apellidos
                                                            </th>
                                                            <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Role: activate to sort column ascending">
                                                                    Estado
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (isset($puestos_mercado))
                                                            
                                                                @foreach ($puestos_mercado as $usm)
                                                                    <tr role="row" class="odd">
                                                                        <td class="sorting_1">
                                                                            {{ $usm->id }} 
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            {{ $usm->nro_puesto }}
                                                                        </td>

                                                                        <td class="sorting_1">
                                                                            <?php $sector = DB::table('sector_mercado')->where('id',$usm->id_sector_mercado)->get(); ?>
                                                                            @foreach($sector as $t)
                                                                            {{$t->sector}}
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            <?php $user = DB::table('users')->where('id',$usm->id_users)->get(); ?>
                                                                            @foreach($user as $t)
                                                                            {{$t->nombres}} {{$t->apellidos}}
                                                                            @endforeach
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            @if ( $usm->estado_puesto =="A")
                                                                                 Activo 
                                                                            @else
                                                                                 Inactivo 
                                                                            @endif
                                                                             
                                                                        </td>
                                                                       
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            <div class="row">
                                                {!! $puestos_mercado->links() !!}
                                            </div>
                                        </div>
                                        
                                    </div>
                                     
                                    <div class="tab-pane fade" id="custom-tabs-three-settings" role="tabpanel" aria-labelledby="custom-tabs-three-settings-tab">
                                        <div class="row">
                                            <div class="col-sm-12">
                                                <div class="table-responsive">
                                                    <table
                                                        class="table table-striped table-bordered datatable dataTable no-footer table-hover"
                                                        id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info"
                                                        style="border-collapse: collapse !important">
                                                        <thead style="background-color:#17a2b8">
                                                            <tr role="row">
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Nombre: activate to sort column ascending">
                                                                    Código
                                                                </th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Date registered: activate to sort column ascending">
                                                                    Fecha de matrícula
                                                                </th>
                                                                <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Role: activate to sort column ascending">
                                                                Costo de matrícula
                                                            </th>
                                                            <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Role: activate to sort column ascending">
                                                                Nro Puesto
                                                            </th>
                                                            <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Role: activate to sort column ascending">
                                                                Usuario del puesto
                                                            </th>
                                                            <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Role: activate to sort column ascending">
                                                                Sector del puesto
                                                            </th>
                                                            <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                aria-label="Role: activate to sort column ascending">
                                                                Tiene multa
                                                            </th>
                                                            <th style="color:#FFFFFF;" class="sorting" tabindex="0"
                                                                    aria-controls="DataTables_Table_0" rowspan="1" colspan="1"
                                                                    aria-label="Role: activate to sort column ascending">
                                                                    Responsable de matrícula
                                                                </th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @if (isset($matriculas_mercado))
                                                            
                                                                @foreach ($matriculas_mercado as $usm)
                                                                    <tr role="row" class="odd">
                                                                        <td class="sorting_1">
                                                                            {{ $usm->id }} 
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            {{ $usm->fecha_matricula }}
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            {{ $usm->costo_matricula }}
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            <?php $puesto = DB::table('puestos_mercado')->where('id',$usm->id_puestos_mercado)->first(); ?>
                                                                           {{--  @foreach($puesto as $t) --}}
                                                                            {{$puesto->nro_puesto}} 
                                                                           {{--  @endforeach --}}
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            <?php $user = DB::table('users')->where('id',$puesto->id)->first(); ?>
                                                                             
                                                                            {{$user->nombres}}  {{$user->apellidos}} 
                                                                            
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            <?php $sector = DB::table('sector_mercado')->where('id',$puesto->id_sector_mercado)->first(); ?>
                                                                            {{$sector->sector}} 
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            @if ( $usm->multa ==false)
                                                                                 No 
                                                                            @else
                                                                                 Si 
                                                                            @endif
                                                                             
                                                                        </td>
                                                                        <td class="sorting_1">
                                                                            <?php $user = DB::table('users')->where('id',$usm->responsable_matricula)->get(); ?>
                                                                            @foreach($user as $t)
                                                                            {{$t->nombres}} {{$t->apellidos}}
                                                                            @endforeach
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            @endif
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                            {{-- <div class="row">
                                                {!! $puestos_mercado->links() !!}
                                            </div> --}}
                                        </div>
                                        
                                    </div>
                                    <div class="tab-pane fade" id="custom-tabs-three-sex" role="tabpanel" 
                                      aria-labelledby="custom-tabs-three-settings-tab-sex">
                                      sex
                                    </div>
                                  </div>
                                </div>
                                <!-- /.card -->
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
    {{-- <script type="text/javascript">
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

    </script> --}}
@endpush
