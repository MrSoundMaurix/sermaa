<div class="modal fade" id="createTipoPago" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">CREAR NUEVO COSTO DE TRANSPORTE</h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::model(['route' => ['costo-camal.store'], 'method' => 'GET', 'files' => 'true']) !!}

            <div class="modal-body">
                <div class="card">
                    <!-- <input class="form-control" id="cate" name="cate" type="hidden"
                                 required autofocus>-->
                    <input class="form-control" id="id" name="id" type="hidden" required autofocus>
                    <div class="alert alert-danger" style="display:none"></div>
                    <div class="card-body">
                        <fieldset class="form-group">
                            <div class="row">
                                <label>Descripción:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-address-card"></i>
                                        </span>
                                    </span>
                                    <input class="form-control" id="descripcion" name="descripcion" type="text"
                                        maxlength="50" value="{{ old('descripcion') }}" required maxlength="50">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <label>Valor del pago:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-dollar-sign"></i>
                                        </span>
                                    </span>
                                    <input class="form-control" min="0.00" pattern="^\d{0,6}(\.\d{1,2})?$" id="valor"
                                        name="valor" type="number" step=".01" value="{{ old('valor') }}"
										required onKeyPress="if(this.value.length==9) return false;">
										
										<input type="hidden" value="1" name="categoria"/>
                                </div>
                            </div>
						</fieldset>
						
                        {{-- <fieldset class="form-group">
                            <div class="row">
                                <label>Categoría:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-address-card"></i>
                                        </span>
                                    </span>
                                    <select id="categoria" class="form-control" name="categoria">
                                        <option value="0">{{ \App\Models\TipoPagoMercado::showCategory(0) }}</option>
                                        <option value="1">{{ \App\Models\TipoPagoMercado::showCategory(1) }}</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset> --}}
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary"
                    data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate">Crear</button>
            </div>
        </div>
        {{ Form::Close() }}
    </div>
</div>
