<div class="modal fade" id="asignarRolModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">EDITAR </h3>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            {!! Form::open(['route'=>['superadmin-personal.update',' '], 'method'=>'PATCH', 'files' => 'true']) !!}
                @csrf
                <div class="modal-body">
                    <div class="card">                            
                        <input type="hidden" id="id" value="" name="id">
                        <div class="card-body">
                            <fieldset class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label>Seleccione rol</label>
                                        <div class="input-group">
                                            <span class="input-group-prepend">
                                                <span class="input-group-text">
                                                    <i class="fa fa-address-card text-info"></i>
                                                </span>
                                            </span>
                                            <!-- <input class="form-control" id="nombres" name="nombres" type="text" value="{{ old('nombres') }}" required autofocus> -->
                                        </div>      
                                    </div>
                                       
                                </div>       
                            </fieldset>
                            
                        </div>    
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                    <button class="btn btn-primary" type="submit">Cambiar rol</button>
                </div>
            {{Form::Close()}}
        </div>
    </div>
</div>
