<div class="modal fade" id="detalleIngreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h3 class="card-title" >DETALLE DE REGISTRO DE GUÍA</h3>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
            </div> 
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                        <div class="table-responsive">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                           
                                <table  class="table table-striped table-bordered table-condensed table-hover" >
                                    <th style="border: medium transparent"  >
                                           <!--  <label>Código usuario:</label><input disabled name="guiados" id="guiados" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" ></br>
                                            <label>Nombres y Apellidos:</label></br> <input disabled name="nombres" id="nombres" type="text" style="background: transparent; outline: none; border: 0;  width:100%;" ></br> -->
                                            <label>Tarifa adicional de usuario no matriculado</label><input disabled name="telefono" id="matricula" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" > 
                                            <label>Lugar de procedencia:</label><input disabled name="lugar_procedencia" id="lugar_procedencia" type="text" style="background: transparent; outline: none; border: 0;  width:100%;" ></br>
                                        <label>Guía de movilización:</label><input disabled name="guia_movilizacion" id="guia_movilizacion" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" ></br>
                                                      
                                    </th>
                                   <!--  <th style="border: medium transparent" >
                                        <label>Fecha y hora de registro:</label></br><input disabled name="fecha_ingreso" id="fecha_ingreso" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" ></br>
                                        <label>Lugar de procedencia:</label></br><input disabled name="lugar_procedencia" id="lugar_procedencia" type="text" style="background: transparent; outline: none; border: 0;  width:100%;" ></br>
                                        <label>Guía de movilización:</label></br><input disabled name="guia_movilizacion" id="guia_movilizacion" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" ></br>
                                            
                                    </th>   -->
                                </table> 
                                <input  name="idd" id="idd" type="hidden" >
                            </dv> 
                        
                        
                        <!--------------------------Tabla Detalle--------------------->
                        <div class="table-responsive">
                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                
                                    <tbody id="cuerpoTabla">
    
                                    </tbody>
                                    
                                </table>
                                <tfoot>
                                <div class="row">
                                    <div class="col-sm-3">
                                        
                                            <th>TOTAL</th>
                                    </div>        
                                    <div class="col-sm-9" style="text-align: right">
                                            
                                                <h4 id="total">$/ 0.00</h4>
                                    </div> 
                                </div>        
                                </tfoot>
                            </div>
                            </div>
                        </div>    
                        </div>
                        <!----------------------------------------------------------------------->
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

<style>
     /*    * {
  padding: 0;
  margin: 0;
  -webkit-box-sizing: border-box;
  box-sizing: border-box;
  font-family: Verdana, Geneva, Tahoma, sans-serif;
}

.formulario {
  position: absolute;
  top: 50%;
  left: 50%;
  -webkit-transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
  width: 350px;
  padding: 30px;
  border: 1px solid #000;
} */

.formulario .input-info {
  width: 100%;
  display: -webkit-box;
  display: -ms-flexbox;
  display: flex;
  -webkit-box-pack: justify;
  -ms-flex-pack: justify;
  justify-content: space-between;
/*   -webkit-box-align: center;
  -ms-flex-align: center;
  align-items: center; */
  margin-bottom: 15px;
}

/* .formulario input {
  border: 1px solid #CCC;
  padding: 5px;
} */
        </style>