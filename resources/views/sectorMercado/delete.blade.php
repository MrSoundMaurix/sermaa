<!-- Modal -->
<div class="modal fade" id="deleteSectorMercadoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title">Confirmar eliminación del sector</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            {{Form::open(['route'=>['sector-mercado.destroy',""],'method'=>'DELETE'])}} 
            {{ csrf_field() }}
            {{ method_field('DELETE') }} 
            <div class="modal-body">
   
                    <div class="row">
                        <div class="col-md-12">
                            <h6 id="txtEliminar"> </h6>
                        </div>
                    </div>
              </div>
              <div class="modal-footer">
                <input type="button" class="btn btn-danger" data-dismiss="modal" value="Cancelar">
                <input type="submit" class="btn btn-primary" value="Aceptar">
              </div>
              {{Form::Close()}}
          </div>
        </div>
      </div>