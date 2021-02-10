<div class="modal fade" id="condicionesIngreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">REGISTRO DE LAS CONDICIONES DE INGRESO DE LOS ANIMALES</h3>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
            </div> 
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                                <div class="table-responsive">
                                    <table  class="table table-striped table-bordered table-condensed table-hover" >
                                        <th style="border: medium transparent"  >
                                           
                                            <label>ANIMAL TRANSPORTADO</label></br> 
                                            <label>Bovinos:</label>   <input disabled name="bovinos" id="bovinos" type="text" style="background: transparent; outline: none; border: 0;  width:50%;" ><br>
                                            <label>Porcinos:</label>   <input disabled name="porcinos" id="porcinos" type="text" style="background: transparent; outline: none; border: 0;  width:50%;" ><br>
                                            <label>Total animales:  </label>  <input disabled name="total_animales" id="total_animales" type="text" style="background: transparent; outline: none; border: 0;  width:50%;" >             
                                        </th>
                                        <th style="border: medium transparent" >
                                                <label>FECHA Y HORA DE REGISTRO:</label></br><input disabled name="fecha_ingreso" id="fecha_ingreso" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" ></br>
                                                <label>FECHA FAENAMIENTO</label></br><input disabled name="fecha_faenamiento" id="fecha_faenamiento" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" ></br>
                                               
                                                
                                        </th>  
                                    </table> 
                                    <input  name="idd" id="idd" type="hidden" >
                                </dv> 
                                <fieldset class="form-group">
                                                <div class="row">
                                                <div class="col-lg-6">
                                                    <label>MEDIO DE MOVILIZACIÓN</label>
                                                        <div class="input-group">
                                                            <span class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-tablet text-info"></i>
                                                                </span>
                                                            </span>
                                                            <input disabled  style="background: transparent;" class="form-control" id="medio_movilizacion" name="medio_movilizacion" type="text" 
                                                            required autofocus>
                                                        </div>      
                                                </div>
                                                <div class="col-lg-6">
                                                    <label>Placa:</label>
                                                        <div class="input-group">
                                                            <span class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-phone text-info"></i>
                                                                </span>
                                                            </span>
                                                            <input disabled  style="background: transparent;" class="form-control" id="placa_transporte" name="placa_transporte" type="text" 
                                                            required autofocus>
                                                        </div>  
                                                </div>        
                                                </div>       
                                            </fieldset> 
                                <fieldset class="form-group">
                                                <label>CONDICIONES TRANSPORTE</label>
                                                    <div class="input-group">
                                                        <span class="input-group-prepend">
                                                            <span class="input-group-text">
                                                                <i class="fa fa-address-card text-info"></i>
                                                            </span>
                                                        </span>
                                                        <input disabled  style="background: transparent;" class="form-control" id="condicion_transporte" name="condicion_transporte" type="text" 
                                                        required autofocus>
                                                    </div>      
                                            </fieldset>
                                            
                                            <fieldset class="form-group">
                                                    <label>OBSERVACIONES</label>
                                                        <div class="input-group">
                                                            <span class="input-group-prepend">
                                                                <span class="input-group-text">
                                                                    <i class="fa fa-map-signs text-info"></i>
                                                                </span>
                                                            </span>
                                                            <input disabled  style="background: transparent;" class="form-control" id="observaciones" name="observaciones" type="text" 
                                                            required autofocus>
                                                        </div>      
                                            </fieldset> 
                                            
                                           
                        
                    
                            </div>
                        </div>
                        <!----------------------------------------------------------------------->
                    </div>           
                              
                    </div>    
                </div>       
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button> 
                <!-- <button class="btn btn-warning toastrDefaultSuccess" type="submit" action="eate" >Guardar cambios</button> -->
            </div>          
        </div>       
    </div>
</div>

@push('scripts')
<script >
   $('#condicionesIngreso').on('show.bs.modal', function (event) {

          var button = $(event.relatedTarget) // Button that triggered the modal
          var id_ingresos = button.data('id_ingresos') 
          
          var id = button.data('id') 
          var fecha_ingreso = button.data('fecha_ingreso') 
          var medio_movilizacion = button.data('medio_movilizacion') 
          var placa_transporte = button.data('placa_transporte') 
          var condicion_transporte = button.data('condicion_transporte') 
          var fecha_faenamiento = button.data('fecha_faenamiento')
          var observaciones = button.data('observaciones') 
          var csmi = button.data('csmi')         
          var modal = $(this)
         
         
          modal.find('.modal-body #id').val(id)
          modal.find('.modal-body #fecha_ingreso').val(fecha_ingreso)
          modal.find('.modal-body #fecha_faenamiento').val(fecha_faenamiento)
          modal.find('.modal-body #medio_movilizacion').val(medio_movilizacion)
          modal.find('.modal-body #placa_transporte').val(placa_transporte)
          modal.find('.modal-body #condicion_transporte').val(condicion_transporte)
          modal.find('.modal-body #observaciones').val(observaciones)
          modal.find('.modal-body #csmi').val(csmi)
          console.log(id_ingresos);
         detallesCondicion(id_ingresos) ;
          });

          function detallesCondicion(id_ingreso) {
    if ($.trim(id_ingreso) != '') {
            console.log(id_ingreso);
            $.get("/detallesCondicion", {id_ingreso: id_ingreso}, function (detallesCondicion) {
            $('#detalles').empty();  
                console.log(detallesCondicion[0]);
                $('#bovinos').val(detallesCondicion[0]); 
                $('#porcinos').val(detallesCondicion[1]); 
                $('#total_animales').val(detallesCondicion[2]); 
          //  $('#detallesCondicion').append('<tr id="fila" style="background-color:#17a2b8"><th  style="color:#FFFFFF;  border: medium transparent">Especie</th><th style="color:#FFFFFF; border: medium transparent" >Genero</th><th style="color:#FFFFFF;  border: medium transparent" >Cantidad</th><th style="color:#FFFFFF;  border: medium transparent" >Costo unitario $</th><th style="color:#FFFFFF;  border: medium transparent" >Subtotal $</th></tr>'); 

            // $.each(detalles, function (index, value) {
            //     if(value.id_costo_faenamiento==1){
            //         a="Vacuno"
            //     }
            //     if(value.id_costo_faenamiento==2){
            //         a="Porcino"
            //     }
            //   $('#detalles').append('<tr id="fila"><td style="width: 20%;">'+a+'</td><td style="width: 20%;">'+value.genero+'</td><td style="width: 20%;">'+value.cantidad+'</td><td style="width: 20%;">'+value.costo_unitario+'</td><td style="width: 20%;">'+value.subtotal+'</td></tr>');  
            //          })
                }); 
            }
          
        };


 





    
</script>
@endpush