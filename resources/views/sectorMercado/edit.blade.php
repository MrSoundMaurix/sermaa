<div class="modal fade" id="editSectorMercadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" style="max-width:48%;" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR </h4>
{{--                {{$tipos_pago_mercado1}}--}}
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::model($sectorMercado,['route'=>['sector-mercado.update','test'], 'method'=>'PATCH','files' => 'true'])!!}

            <div class="modal-body">
                <div class="card">
                    <!-- <input class="form-control" id="cate" name="cate" type="hidden"
                     required autofocus>-->
                    <input class="form-control" id="id" name="id" type="hidden"
                           required autofocus>
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="card-body">
                        <fieldset class="form-group">
{{--                            {{$sectorMercado}}--}}
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Código:</label>
                                    <div class="input-group">
													<span class="input-group-prepend">
														<span class="input-group-text">
															<i class="fa fa-address-card text-info"></i>
														</span>
													</span>
                                        <input class="form-control" id="codigo" name="codigo" type="number" max=99 min=0
                                               value="{{ old('codigo') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Sector:</label>
                                    <div class="input-group">
														<span class="input-group-prepend">
															<span class="input-group-text">
																<i class="fa fa-address-card text-info"></i>
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
                                                                <i class="fa fa-store text-info"></i>
                                                            </span>
                                                        </span>
                                        <input class="form-control" id="mercado" name="mercado" type="text"
                                               value="{{ old('mercado') }}"
                                               required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Tipo Pago:</label>
                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <a class="text-info">T</a>
                                                            </span>
                                                        </span>
                                        {{--                                                        {{ Form::select('id_tipo_pago_mercado', [1,2,3], null, array('class'=>'form-control', 'placeholder'=>'Seleccione uno')) }}--}}
                                        <select class="form-control select2bs4" id="id_tipo_pago_mercado" name="id_tipo_pago_mercado">

                                            @foreach($tipos_pago_mercado as $tipo_pago)
                                                <option value="{{$tipo_pago->id}}">{{$tipo_pago->descripcion}}
                                                </option>
                                            @endforeach
                                        </select>

                                    </div>
                                </div>
                            </div>
                        </fieldset>

                    </div>
                </div>

            </div>


            <div class="modal-footer">

                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger"
                data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate"><i
                        class="fa fa-save"></i> Guardar cambios
                </button>
            </div>

        </div>
        {{Form::Close()}}
    </div>
</div>
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