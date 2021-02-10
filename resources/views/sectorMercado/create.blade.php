@extends('layouts.applte')
@section('contenido')

    <div class="content-wrapper">

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
                                        <h3 class="card-title">CREAR SECTOR DEL MERCADO</h3>
                                    </span>
                                </div>
                            </div>
                        </div>
                        {!! Form::open(['url' => 'sector-mercado','files' => 'true']) !!}
                        <div class="card-body ">
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Código:</label>
                                    <div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card"></i>
														</span>
													</span>
                                        <input class="form-control" id="codigo" name="codigo" type="number" max=99 min=1
                                               value="{{ old('codigo') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Sector:</label>
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-address-card"></i>
															</span>
															</span>
                                        <input class="form-control" id="sector" name="sector" type="text"
                                               value="{{ old('sector') }}"
                                               required autofocus>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Mercado:</label>
                                    <div class="input-group">
                                                <span class="input-group-prepend">
													<span class="input-group-text">
														<i class="fa fa-address-card"></i>
													</span>
                                                </span>
                                        <input class="form-control" id="mercado" name="mercado" type="text"
                                               value="{{ old('mercado') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Tipo Pago:</label>
                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-credit-card"></i>
                                                            </span>
                                                        </span>
                                        {{ Form::select('id_tipo_pago_mercado', $tipos_pago_mercado,null , array('class'=>'form-control select2bs4', 'placeholder'=>'Seleccione uno','required'=>'required')) }}
                                    </div>
                                </div>
                            </div>
                        </fieldset>


                    </div>
                    <div class="modal-footer">
                        <div class="form-group form-actions">
                            <a type="button" class="btn btn-danger" href="{{ url('sector-mercado') }}">Cancelar
                            </a>
                            <button class="btn btn-primary" type="submit">Guardar</button>

                        </div>
                    </div>
                    {!! Form::close() !!}
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

