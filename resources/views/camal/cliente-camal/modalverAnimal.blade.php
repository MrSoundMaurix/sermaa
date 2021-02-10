<div class="modal fade" id="verPesos" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" style="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">PESOS DE CANALES </h3>
                     <button class="close" type="button" onclick="javascript:window.location.reload()" data-dismiss="modal" aria-label="Close">
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
$('#verPesos').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id_usuario= button.data('id_usuario')  
          var tipopieza=button.data('tipopieza')               
          var modal = $(this)
        console.log(tipopieza);
         obtener_piezas_pesos(tipopieza) ;
          }); 
          
          function  obtener_piezas_pesos(tipopieza) {
            if ($.trim(tipopieza) != '') {
                console.log(tipopieza);
                $.get("/piezas_pesos", {tipopieza: tipopieza}, function (piezas_pesos) {
                $('#detalles').empty();   
                console.log(piezas_pesos);
                var $j=1;
                $('#detalles').append('<thead><tr style="background-color:#17a2b8"><th style="color:#FFFFFF; border: medium transparent">N°</th><th style="color:#FFFFFF; border: medium transparent">Código</th><th style="color:#FFFFFF; border: medium transparent">Pieza</th><th style="color:#FFFFFF; border: medium transparent">Peso(KG)</th></tr></thead></br>');
                    $.each(piezas_pesos, function (index, value) {
                        console.log(index);
                        console.log(value.codigo_pieza);
                     $('#detalles').append('<tr><td>'+$j+'</td><td>'+value.codigo_pieza+'</td><td>'+value.pieza+'</td><td>'+value.peso+'</td></tr>');         
                   $j++;  })
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