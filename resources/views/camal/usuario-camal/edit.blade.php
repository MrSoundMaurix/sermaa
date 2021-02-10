<div class="modal fade" id="editUsuarioCamalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">EDITAR CLIENTE</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::model($usuarioscamal, ['route' => ['usuarios-camal.update', 'test'], 'method' => 'PATCH', 'files'
            => 'true']) !!}
            <div class="modal-body">
                <div class="card">
                    <!-- <input class="form-control" id="cate" name="cate" type="hidden"
                                 required autofocus>-->
                    <input class="form-control" id="id" name="id" type="hidden" required autofocus>
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="card-body">
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Nombres:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-address-card text-info"></i>
                                            </span>
                                        </span>
                                        <input class="form-control" id="nombres" name="nombres" type="text"
                                            value="{{ old('nombres') }}" required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Apellidos:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-address-card text-info"></i>
                                            </span>
                                        </span>
                                        <input class="form-control" id="apellidos" name="apellidos" type="text"
                                            value="{{ old('apellidos') }}" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Cedula:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-address-card text-info"></i>
                                            </span>
                                        </span>
                                        <input maxlength="10" class="form-control" id="cedula" name="cedula" type="text"
                                            value="{{ old('cedula') }} " required autofocus>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <label>Teléfono:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-phone text-info"></i>
                                            </span>
                                        </span>
                                        <input maxlength="13" class="form-control" id="telefono" name="telefono" type="text"
                                            value="{{ old('telefono') }}" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <div class="col-lg-6">
                                    <label>Dirección:</label>
                                    <div class="input-group">
                                        <span class="input-group-prepend">
                                            <span class="input-group-text">
                                                <i class="fa fa-map-marker text-info"></i>
                                            </span>
                                        </span>
                                        <input class="form-control" id="direccion" name="direccion" type="text"
                                            value="{{ old('direccion') }}" required autofocus>
                                    </div>
                                </div>
                            </div>
                        </fieldset>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger"
                    data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate">Guardar
                    cambios</button>
            </div>
        </div>
        {{ Form::Close() }}
    </div>
</div>
