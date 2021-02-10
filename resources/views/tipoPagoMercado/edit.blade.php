<div class="modal fade" id="editTipoPagoMercadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::model($tipoPagoMercado, ['route' => ['tipo-pago-mercado.update', 'test'], 'method' => 'PATCH',
            'files' => 'true']) !!}
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
                                        maxlength="50" value="{{ old('descripcion') }}" required maxlength="50" />  
                                    
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
                                    </span> <!-- ^[0-9]{0,12}([,][0-9]{2,2})?$ -->
                                    <input class="form-control" min="0.00" pattern="^\d{0,6}(\.\d{1,2})?$" id="valor_pago"
                                        name="valor_pago" type="number" step=".01" value="{{ old('valor_pago') }}"
                                        required onKeyPress="if(this.value.length==9) return false;">
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row" id="estadia">
                                <label>Frecuencia de pago:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-address-card"></i>
                                        </span>
                                    </span>
                                   {{-- <input id="categoria" class="form-control" name="categoria" value="1" ></input>--}}

                                    <select disabled id="estadia" class="form-control" name="estadia" >
                                       <!--  <option value="">SELECCIONE</option> -->
                                        <option value="PERMANENTE">{{ \App\Models\TipoPagoMercado::showEstadia("PERMANENTE") }}</option>
                                        <option value="EVENTUAL">{{ \App\Models\TipoPagoMercado::showEstadia("EVENTUAL") }}</option>
                                        <option value="OCASIONAL">{{ \App\Models\TipoPagoMercado::showEstadia("OCASIONAL") }}</option>
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row" id="categoria">
                                <label>Categoría:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-address-card"></i>
                                        </span>
                                    </span>
                                   

                                <select id="categoria" class="form-control" name="categoria" disabled>
                                    <option value="0" >{{ \App\Models\TipoPagoMercado::showCategory(0) }}</option>
                                    <option value="1"  >{{ \App\Models\TipoPagoMercado::showCategory(1) }}</option>
                                    
                                    </select> 
                                 
                                </div>
                            </div>
                        </fieldset>
                    </div>
                    </fieldset>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger"
                    data-dismiss="modal" aria-hidden="true">Cancelar</button>
                <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate"><i
                        class="fa fa-save"></i> Guardar cambios</button>
            </div>
        </div>
        {{ Form::Close() }}
    </div>
</div>
