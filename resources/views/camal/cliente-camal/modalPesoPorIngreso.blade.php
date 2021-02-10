<div class="modal fade" id="pesoPorIngresoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">PESOS DE CANALES Y PRODUCTOS DEL ANIMAL </h3>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
            </div> 

            <div class="modal-body">
                <div class="card">
                    <input class="form-control" id="id" name="id" type="hidden" required autofocus>              
                    <div class="card-body">
                        <div class="table-responsive">
                        <input type="hidden" id="pesoA" name="pesoA" value="">
                        <input type="hidden" id="id_ingresos" name="id_ingresos" value="">
                        <input type="hidden" id="estado_ingreso" name="estado_ingreso" value="">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                          
                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                    <tbody id="cuerpoTabla">   
                                    
                                    </tbody>                                   
                                </table>
                               
                            </div>                               
                        </div>        
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cerrar</button> -->
                        <button type="button"  class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                        <!-- <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate" >Guardar cambios</button>                   -->
                        
                    </div>   
                </div>
            </div>
            {{Form::Close()}}
        </div>
    </div>
</div>  

@push('scripts')
<script >
$('#pesoPorIngresoModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('id')   
          var id_ingresos = button.data('id_ingresos')               
          var modal = $(this)
           modal.find('.modal-body #id').val(id)
           modal.find('.modal-body #id_ingresos').val(id_ingresos)
        //   modal.find('.modal-body #cedula').val(cedula)
          
          console.log(id);
         detallespartes(id,id_ingresos) ;
          }); 
          
          function detallespartes(id,id_ingresos) {
            if ($.trim(id) != '') {
                console.log(id);
             
                    $.get("/piezas_a", {id: id}, function (piezas) {
                $('#detalles').empty();    
                var $j=1;
             /*    console.log(piezas); */
                $('#detalles').append('<thead><tr style="background-color:#17a2b8"><th style="color:#FFFFFF; border: medium transparent">N°</th><th style="color:#FFFFFF; border: medium transparent">Código</th><th style="color:#FFFFFF; border: medium transparent">Producto</th><th style="color:#FFFFFF; border: medium transparent">Peso(KG)</th></tr></thead></br>');
                    $.each(piezas, function (index, value) {
                       /*  console.log(value.codigo);
                        console.log(value.id);
                        console.log(value.codigo_agrocalidad); */
                $('#detalles').append('<tr><td><input type="hidden" name="idp[]" value="'+value.id+'">'+$j+'</td><td><input type="hidden" name="codigo[]" value="'+value.codigo+'">'+value.codigo_agrocalidad+'</td><td>'+value.pieza+'</td><td>'+value.peso+'</td></tr>');         
                        $j++;  })
                    }); 
                    
            }
        };    

        

</script>
@endpush