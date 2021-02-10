<div class="modal fade" id="verDistribuidosModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog"  role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Información de los distribuidos </h4>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
              </button>
          </div>  
          <div class="modal-body">
              <div class="card">
                  <input class="form-control" id="id" name="id" type="hidden" required autofocus>              
                  <div class="card-body">
                      <div class="table-responsive">
                          <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                              <table  class="table table-striped table-bordered table-condensed table-hover">
                                  <tr style="background-color:#17a2b8">
                                      <th style="color:#FFFFFF;">Nombre del destinatario</th>
                                      <th style="color:#FFFFFF; ">Placa del transporte</th>
                                      <th style="color:#FFFFFF; " >Lugar de destino</th>
                                      
                                  </tr>
                              </table>
                            
                              <select id="tabla" data-old="{{ old('tabla') }}" onchange="funcionCambio()" name="tabla"  class="form-control select2bs4 "
                              data-live-search="true" style="width: 100%;" >
                              </select>
                          </div>                               
                      </div>        
                  </div>
                  <div class="modal-footer">
                    
                      <a href="{{ url('distribucion-camal/showCabeceraDetalle/',0)}}" id="cambio" class="btn btn-info btn-rounded waves-effect"
                       title="Mostrar Distribuciones">
                        <span class="far fa-eye"></span>  Mostrar
                      </a>                 
                 
                  </div>   
              </div>
          </div>
      </div>
  </div>
</div>        

@push('scripts')
<script>
    function funcionCambio(){
       let val=document.getElementById("cambio").href;
        console.log(val);
        val.split("/");
        let base=document.getElementById("cambio");
        
        let id=document.getElementById("tabla");
      //  console.log("tabla: "+id.value);
        let concatenado=base.baseURI+"/showCabeceraDetalle/"+id.value
      console.log(concatenado);
        //console.log(val[val.length-1]);
        document.getElementById("cambio").setAttribute("href",concatenado);
    }

</script>
@endpush