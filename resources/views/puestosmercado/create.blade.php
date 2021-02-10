@extends('layouts.applte')
@section('contenido')
    <!-- Content Wrapper. Contains page content -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/select2/css/select2.min.css') }}">
    <div class="content-wrapper">
        @include('layouts.messages')
        <div class="modal-body">
            <div class="card">
                <div class="card-header card-body card-info card-outline">
                    <div class="row">
                        <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                            <span class="input-group-prepend">

                            </span>
                        </div>
                        <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                            <span class="" style="text-align: center;">
                                <h3 class="card-title">CREAR PUESTOS DEL MERCADO</h3>
                            </span>
                        </div>
                    </div>
                </div>
            <!-- /.container-fluid -->
        
        <div class="content">
            <div class="card card-default">
                {!! Form::open(['url' => 'puestos-mercado', 'files' => 'true']) !!}
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
                                    <input class="form-control" id="nro_puesto" name="nro_puesto" type="text"
                                        value="{{ old('nro_puesto') }}" required autofocus maxlength="20">
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
                                            <option value="{{ $user->id }}">{{ $user->nombres . ' ' . $user->apellidos }}
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
                                    <select id="estado_puesto" class="form-control" name="estado_puesto" readonly>
                                        @foreach (['A'] as $estado)
                                            <option value='{{ $estado }}' >
                                                {{ App\Models\PuestoMercado::estadoPuesto($estado) }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <label>Sector - mercado</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <a class="">S</a>
                                        </span>
                                    </span>
                                    <select class="form-control select2bs4" id="id_sector_mercado" name="id_sector_mercado"
                                        required>
                                        @foreach ($sectoresmercado as $sector_mercado)
                                            <option value="{{ $sector_mercado->id }}"
                                                {{ old('id_sector_mercado') == $sector_mercado->id ? 'selected' : '' }}>
                                                {{ $sector_mercado->sector }} - {{ $sector_mercado->mercado }}
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
                        <button class="btn btn-primary" type="submit">Guardar</button>
                    </div>
                </div>
                {!! Form::close() !!}
            </div>
        </div>
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
