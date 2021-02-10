<div class="modal fade" id="editMatriculaMercadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title">EDITAR</h4>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
           {!! Form::model($matriculaMercado, ['route' => ['matriculas-mercado.update', 'test'], 'method' => 'PATCH',
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
                                <label>Usuario:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-address-card"></i>
                                        </span>
                                    </span>
                                    <select id="id_users" class="form-control" name="id_users">
                                    {{--    @foreach($usersFil as $p)
											<option value="{{$p->id}}">{{$p->nombres.' '.$p->apellidos}}</option>
											@endforeach--}}
                                        
                                    </select>
                                </div>
                            </div>
                        </fieldset>
                       
                        

                        <fieldset class="form-group">
                            <div class="row">
                                <label>Tipo Pago:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-dollar-sign"></i>
                                        </span>
                                    </span>
                                    <select  id="id_tipo_pago"  name="id_tipo_pago" class="custom-select">
                                        @foreach($tipoPago as $r)
                                        <option value="{{$r->id}}">{{$r->descripcion}}</option>
                                        @endforeach
                                       
                                        </select>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <label>Fecha:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="far fa-calendar-alt"></i>
                                        </span>
                                    </span>
                                    <input class="form-control" id="fecha_matricula" name="fecha_matricula" type="text"
                                        maxlength="50" value="{{ old('fecha_matricula') }}" required maxlength="50" readonly>
                                </div>
                            </div>
                        </fieldset>
                        <fieldset class="form-group">
                            <div class="row">
                                <label>Costo Matrícula:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        <span class="input-group-text">
                                            <i class="fa fa-dollar-sign"></i>
                                        </span>
                                    </span> <!-- ^[0-9]{0,12}([,][0-9]{2,2})?$ -->
                                    <input class="form-control" pattern="^\d{0,6}(\.\d{1,2})?$" id="costo_matricula"
                                        name="costo_matricula" type="number" step=".01" value="{{ old('costo_matricula') }}"
                                        required onKeyPress="if(this.value.length==9) return false;" readonly>
                                </div>
                            </div>
                        </fieldset>
                         
                          
                    </div>
                    </fieldset>
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary"
                    data-dismiss="modal" aria-hidden="true">Close</button>
                <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate"><i
                        class="fa fa-save"></i> Guardar cambios</button>
            </div>
        </div>
  
        {{ Form::Close() }}


    </div>
</div>
