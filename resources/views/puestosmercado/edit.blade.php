@extends('layouts.applte')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
    <div class="content-wrapper">
        @include('layouts.messages')
        <section class="content-header">
            <div class="container-fluid">
                <div class="card-header card-body card-primary card-outline">
                    <div class="row">
                        <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                            <span class="input-group-prepend">

                            </span>
                        </div>
                        <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                            <span class="" style="text-align: center;">
                                <h3 class="card-title">EDITAR PUESTOS DEL MERCADO</h3>
                            </span>
                        </div>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <div class="content">
            <div class="card card-default">
                {!! Form::model($puestoMercado, [/* 'url' => 'puestos-mercado', */ 'method' => 'PATCH', 'route' =>
                ['puestos-mercado.update', $puestoMercado->id], 'files' => 'true']) !!}
                <div class="card-body">
                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-lg-6">
                                <label>Nro Puesto</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-address-card"></i>
                                        </span>
                                    </span>
                                    <input class="form-control" id="nro_puesto" name="nro_puesto" type="text" readonly
                                        value="{{ $puestoMercado->nro_puesto }}" required autofocus maxlength="20">
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Usuario</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                    </span>
                                    <select id="id_users" class="form-control select2bs4" name="id_users">
                                        @foreach ($users as $user)
                                            <option value="{{ $user->id }}"
                                                {{ $user->id == $puestoMercado->user->id ? 'selected' : '' }}>
                                                {{ $user->nombres . ' ' . $user->apellidos }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                    <fieldset class="form-group">
                        <div class="row">
                            <div class="col-md-6">
                                <label>Estado puesto</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-address-card"></i>
                                        </span>
                                    </span>
                                    <select id="estado_puesto" class="form-control" name="estado_puesto">
                                        @foreach (['A', 'I'] as $estado)
                                            <option value="{{ $estado }}"
                                                {{ $estado == $puestoMercado->estado_puesto ? 'selected' : '' }}>
                                                {{ App\Models\PuestoMercado::estadoPuesto($estado) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Sector mercado</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                    </span>
                                    <select class="form-control select2bs4" id="id_sector_mercado" name="id_sector_mercado"
                                        required>
                                        @foreach ($sectoresmercado as $sector_mercado)
                                            <option value="{{ $sector_mercado->id }}"
                                                {{ $puestoMercado->id_sector_mercado == $sector_mercado->id ? 'selected' : '' }}>
                                                {{ $sector_mercado->sector }} - {{ $sector_mercado->mercado }}  - {{ $sector_mercado->estadia }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>

                           {{--  <div class="col-lg-6">
                                <label>Permanencia</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-phone"></i>
                                        </span>
                                    </span>
                                    <select class="form-control select2bs4" id="permanencia" name="permanencia"
                                        required>
                                        <option value="1">Permanente</option>
                                        <option value="2">Eventual</option>
                                        <option value="3">Ocasional</option>
                                    </select>
                                </div>
                            </div> --}}

                        </div>
                    </fieldset>
                </div>
                <div class="modal-footer">
                    <div class="form-group form-actions">
                        <a class="btn btn-danger" href="{{ url('puestos-mercado') }}">Cancelar</a>
                        <button class="btn btn-primary" type="submit">Guardar cambios</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    <script src="{{ asset('assets/vendor/select2/js/select2.full.min.js') }}"></script>
    <script type="text/javascript">
        $(function() {
            //Initialize Select2 Elements
            // $('.select2').select2();

            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            });
        });

    </script>
@endpush
