<div class="modal fade" id="verDetalles" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" style="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">DETALLES DEL INGRESO DE GUÍA </h3>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
            </div> 
           
            <div class="modal-body">
                <div class="card">
                    <input class="form-control" id="id" name="id" type="hidden" required autofocus>              
                    <div class="card-body">
                        <div class="table-responsive">
                        <!-- <input id="pesoA" name="pesoA" value="">
                        <input id="id_ingresos" name="id_ingresos" value=""> -->
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                                <!-- <table  class="table table-striped table-bordered table-condensed table-hover">
                                    <tr style="background-color:#17a2b8" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                        
                                        <th  style="color:#FFFFFF; width:25%; border: medium transparent">Especie</th>
                                        <th  style="color:#FFFFFF; width:25%; border: medium transparent">Cantidad brazos</th>
                                        <th style="color:#FFFFFF; width: 25%; border: medium transparent" >Cantidad piernas</th>
                                    </tr>
                                </table> -->
                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                    <tbody id="cuerpoTabla">   
                                    
                                    </tbody>                                   
                                </table>
                      

                               
                            </div>                               
                        </div>        
                    </div>
                    <div class="modal-footer">
                        <!-- <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Aceptar</button> -->
                        <button type="button" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                       
                        <!-- <button class="btn btn-secondary close" type="button" data-dismiss="modal"  aria-hidden="true">Cerrar</buttom> -->
                    </div>   
                </div>
            </div>
          
        </div>
    </div>
</div>  

@push('scripts')
<script >
$('#verDetalles').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id_usuario= button.data('id_usuario')  
          var id_ingresos=button.data('id_ingresos')  
          var id_cdistribucion   =button.data('id_cdistribucion')           
          var modal = $(this)
         //  modal.find('.modal-body #id').val(id)
        //   modal.find('.modal-body #id_ingresos').val(id_ingresos)
        //   modal.find('.modal-body #cedula').val(cedula)
     //  var p= JSON.parse(pesos)
        console.log(id_ingresos,id_cdistribucion);
         piezas_distribucion(id_ingresos,id_cdistribucion) ;
          }); 
          
          function   piezas_distribucion(id_ingresos,id_cdistribucion) {
            if ($.trim(id_ingresos) != '') {
                console.log(id_ingresos);
                $.get("/piezas_distribucion", {id_ingresos:id_ingresos,id_cdistribucion:id_cdistribucion}, function (pesos) {
                $('#detalles').empty(); 

                $('#detalles').append(' <tr style="background-color:#17a2b8" class="col-lg-12 col-md-12 col-sm-12 col-xs-12"><th  style="color:#FFFFFF; width:25%; border: medium transparent">Producto</th><th  style="color:#FFFFFF; width:25%; border: medium transparent">Vacuno</th><th style="color:#FFFFFF; width: 25%; border: medium transparent" >Porcino</th></tr> ');
                console.log(pesos);
 
 
                <?php  for($i=0; $i<6; $i++) {?>
                    $('#detalles').append('<tr role="row" class="odd"><td class="sorting_1">'+pesos[3][<?php echo $i?>]+'</td><td class="sorting_1">'+pesos[0][<?php echo $i?>]+'</td><td class="sorting_1">'+pesos[1][<?php echo $i?>]+'</td></tr>')
                   
                   <?php  }?>


                      }); 
                    }
  


                 }; 
            

        function calcularPesoPorPartes(codigo,j) {
            var num = Math.round(Math.random() * (600 - 800) + 600);
          // console.log('llego= '+codigo+'j= '+j);
             var cod= codigo+'-'+j;
             console.log(cod);
            $("#"+codigo).val(num);
            $("#"+cod).val(num);
           
              }     


</script>
@endpush