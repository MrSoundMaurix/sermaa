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
                              <h3 class="card-title" >SUPERVISAR PUESTOS DEL MERCADO</h3>
                          </span>		
                        </div>
                      </div>   
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-sm-6 md:w-1/3 px-3">
                            <label for="Distribución">Seleccione un sector</label> 
                                                <select id="sector"  name="sector" onchange="javascript:handleSelect3(this)" class="form-control">
                                                    <option>Seleccionar</option>
                                                        @if(isset($sector_mercado)) 
                                                            @foreach($sector_mercado as $sm) 
                                                           
                                                            <option  value="/supervisar-puestos-mercado?id_sector={{$sm->id}}"
                                                        <?php  if ($id_sector== $sm->id)  {  echo 'selected'; }?>>{{$sm->codigo}} - {{$sm->sector}} - {{$sm->mercado}}</option>
                                                            @endforeach  
                                                        @endif
                                                </select> </br>
                            </div>
                            <div class="col-sm-6" style="text-align:right">
                                @include('supervisarpuestosmercado.search')
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
                                                    Cod. Puesto
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Date registered: activate to sort column ascending">
                                                    Nombre
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    estado Pago actual
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Tipo pago
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    id_sector_mercado
                                                </th>
                                                <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                                    rowspan="1" colspan="1"
                                                    aria-label="Role: activate to sort column ascending">
                                                    Opciones
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @if(isset($puestos_mercado)) 
                                                @foreach($puestos_mercado as $pm)
                                                    <tr role="row" class="odd"><td class="sorting_1">
                                                            {{ $pm->nro_puesto }}
                                                        </td>
                                                        <td class="sorting_1">
                                                        {{ $pm->apellidos}} {{ $pm->nombres}} 
                                                        </td>
                                                        <td class="sorting_1">
                                                           
                                                        </td>
                                                        <td class="sorting_1">
                                                           
                                                        </td>
                                                        
                                                        <td class="sorting_1">
                                                            {{ $pm->tipo_pago}}
                                                        </td>
                                                        <td class="sorting_1">
                                                           
                                                        </td>
                                                        <td>
                                                           <!-- {{-- <a href="#" class="btn btn-warning" title="Editar"
                                                                data-toggle="modal" data-target="#editUsuarioMercadoModal"
                                                                {{-- data-pm_id="{{ $pm->id }}"
                                                                data-pm_nombres="{{ $pm->nombres }}" data-pm_apellidos="{{ $pm->apellidos }}"
                                                                data-pm_cedula="{{ $pm->cedula }}" data-pm_telefono="{{ $pm->telefono }}"
                                                                data-pm_direccion="{{ $pm->direccion }}" data-foto="{{ "data:image/" . $pm->fototype . ";base64," . $pm->foto }}" --}}
                                                                >
                                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                                            </a>

                                                            <a href="#" class="btn btn-danger" title="Eliminar"  
                                                                data-toggle="modal" data-target="#deleteUsuarioMercadoModal"
                                                                {{-- data-action="{{ route('usuarios-mercado.destroy', $pm->id) }}"
                                                                data-nombres="{{ $pm->nombres }}"
                                                                data-apellidos="{{ $pm->apellidos }}" --}}
                                                                >
                                                                <i class="fa fa-trash" aria-hidden="true"></i>
                                                            </a>--}} -->
                                                        </td>
                                                    </tr>
                                                @endforeach
                                            @endif
                                      
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="row">
                            @if($id_sector!=null)
                             {{ $puestos_mercado->appends(['id_sector' => $id_sector])->links()}} 
                             @endif
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
        function handleSelect3(elm){
            window.location = elm.value+"";
        }
            
    {{--    $(document).ready(function () {
            $('#editUsuarioMercadoModal').on('show.bs.modal', function (event) {
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
                $('#foto').attr('src',foto);
            });
        });

        $(document).ready(function () {
            $('#deleteUsuarioMercadoModal').on('show.bs.modal', function (event) {
                var button = $(event.relatedTarget);
                var action = button.data('action');
                var nombres = button.data('nombres');
                var apellidos = button.data('apellidos');
                
                var modal = $(this);
                modal.find(".modal-content #txtEliminar").html("¿Está seguro de eliminar el Usuario <b>" + nombres + " " + apellidos + "</b>?");                
                modal.find(".modal-content form").attr('action', action);
            });
        });
        --}}
    </script> 
@endpush