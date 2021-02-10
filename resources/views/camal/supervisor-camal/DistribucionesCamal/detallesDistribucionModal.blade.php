<div class="modal fade" id="DetallesIngreso" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-xl" style="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title"> <h3>Detalle Ingreso</h3></h4>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">×</span>
                     </button>
            </div> 
 
            {!!Form::open(array('url'=>'supervisorcamal-ingresos-camal', 'method'=>'POST','autocomplete' => 'off'))!!}
          
          {{Form::token()}}
          @csrf
          @method('POST')
            <div class="modal-body">
                <div class="card">
                    <div class="card-body">
                        <div class="card">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                            <div class="table-responsive">
                            <table  class="table table-striped table-bordered table-condensed table-hover" >
                                    <th style="border: medium transparent"  >
                                            <label>Código usuario:</label><input disabled name="codigo" id="codigo" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" ></br>
                                            <label>Nombres y Apellidos:</label></br> <input disabled name="nombres" id="nombres" type="text" style="background: transparent; outline: none; border: 0;  width:100%;" ></br>
                                            <label>Tarifa adicional de usuario no matriculado</label></br><input disabled name="telefono" id="matricula" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" >             
                                    </th>
                                    <th style="border: medium transparent" >
                                        <label>Fecha y hora de registro:</label></br><input disabled name="fecha_ingreso" id="fecha_ingreso" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" ></br>
                                        <label>Guía de movilización:</label></br><input disabled name="guia_movilizacion" id="guia_movilizacion" type="text" style="background: transparent; outline: none; border: 0;  width:90%;" ></br>
                                        <label>Nro de factura:</label></br><input required name="nro_factura" id="nro_factura" type="text" style="outline: none; border: 0;  width:50%;" ></br>
                                            
                                    </th>  
                                </table> 
                                <input  name="id_ingreso" id="id_ingreso" type="hidden" >
                            </dv> 
                        
                        
                        <!--------------------------Tabla Detalle--------------------->
                        
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
                        <!----------------------------------------------------------------------->
                    </div>           
                              
                    </div>    
                </div>       
            </div>
            <div class="modal-footer">
                <button type="button" onclick="javascript:window.location.reload()" class="btn btn-secondary" data-dismiss="modal" aria-hidden="true">Cancelars</button> 
                 <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate" >Guardar cambios</button> 
            </div>  
            {{Form::Close()}}
        </div>       
    </div>
</div>

@push('scripts')
<script >
$('#DetallesIngreso').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget) // Button that triggered the modal
          var idd = button.data('idd') 
          var nombres = button.data('nombres') 
          var cedula = button.data('cedula') 
          var direccion = button.data('direccion') 
          var id_ingreso = button.data('id_ingreso') 
          var telefono = button.data('telefono') 
          var matricula = button.data('matricula') 
          var valor_matricula = button.data('valor_matricula') 
          var fecha_ingreso = button.data('fecha_ingreso') 
          var lugar_procedencia = button.data('lugar_procedencia') 
          var costo_total = button.data('costo_total') 
          var codigo = button.data('codigo')
          var numero_factura = button.data('numero_factura')
          var guia_movilizacion = button.data('csmi')             
          var modal = $(this)
          modal.find('.modal-body #nombres').val(nombres)
          modal.find('.modal-body #cedula').val(cedula)
          modal.find('.modal-body #direccion').val(direccion)
          modal.find('.modal-body #lugar_procedencia').val(lugar_procedencia)
          modal.find('.modal-body #id_ingreso').val(id_ingreso)
          modal.find('.modal-body #codigo').val(codigo)
          modal.find('.modal-body #nro_factura').val(numero_factura)
          if(matricula=="SI"){
            modal.find('.modal-body #matricula').val(valor_matricula)
          }else {
            modal.find('.modal-body #matricula').val(valor_matricula) 
          }
          modal.find('.modal-body #telefono').val(telefono)
          modal.find('.modal-body #fecha_ingreso').val(fecha_ingreso)
          modal.find('.modal-body #costo_total').val(costo_total)
          modal.find('.modal-body #guia_movilizacion').val(guia_movilizacion)
          console.log(id_ingreso);
          console.log(guia_movilizacion);
          detallesIngreso(id_ingreso,costo_total) ;         });

          
  function detallesIngreso(id_ingreso,costo_total) {
    if ($.trim(id_ingreso) != '') {
            console.log(id_ingreso);
            $.get("/detalles", {id_ingreso: id_ingreso}, function (detalles) {
            $('#detalles').empty();  
            $('#detalles').append('<tr id="fila" style="background-color:#17a2b8"><th  style="color:#FFFFFF;  border: medium transparent">Especie</th><th style="color:#FFFFFF; border: medium transparent" >Género</th><th style="color:#FFFFFF;  border: medium transparent" >N° de animales en estado normal</th><th style="color:#FFFFFF;  border: medium transparent" >Costo de faenamiento en estado normal</th><th style="color:#FFFFFF;  border: medium transparent" >N° de animales en estado de emergencia</th><th style="color:#FFFFFF;  border: medium transparent" >Costo de faenamiento en estado de emergencia</th><th style="color:#FFFFFF;  border: medium transparent" >Total de animal</th><th style="color:#FFFFFF;  border: medium transparent" >Subtotal</th></tr>'); 
            $.each(detalles, function (index, value) {
                if(value.id_costo_faenamiento==1){
                    a="Bovino"
                }
                if(value.id_costo_faenamiento==2){
                    a="Porcino"
                }
              $('#detalles').append('<tr id="fila"><td>'+a+'</td><td >'+value.genero+'</td><td >'+(value.cantidad-value.cantidad_emergencia)+'</td><td >'+'$ '+value.costo_unitario+'</td><td>'+value.cantidad_emergencia+'</td><td>'+'$ '+value.costo_unitario_emergencia+'</td><td>'+value.cantidad+'</td><td>'+'$ '+value.subtotal+'</td></tr>');  
                     })
                }); 
            }
            $('#total').html("$/ " + costo_total);
        };

        $('#condicionesIngresoModal').on('show.bs.modal', function (event) {

          var button = $(event.relatedTarget) // Button that triggered the modal
          var bovinos = button.data('bovinos') 
          var porcinos = button.data('porcinos') 
          var id = button.data('id') 
          var fecha = button.data('fecha') 
          var medio_movilizacion = button.data('medioMovilizacion') 
          var placa_transporte = button.data('placa_transporte') 
          var condicion_transporte = button.data('condicion_transporte') 
          var observaciones = button.data('observaciones') 
          var csmi = button.data('csmi')         
          var modal = $(this)
          modal.find('.modal-body #bovinos').val(bovinos)
          modal.find('.modal-body #porcinos').val(porcinos)
          modal.find('.modal-body #id').val(id)
          modal.find('.modal-body #fecha').val(fecha)
          modal.find('.modal-body #medio_movilizacion').val(medio_movilizacion)
          modal.find('.modal-body #placa_transporte').val(placa_transporte)
          modal.find('.modal-body #condicion_transporte').val(condicion_transporte)
          modal.find('.modal-body #observaciones').val(observaciones)
          modal.find('.modal-body #csmi').val(csmi)
          console.log(bovinos);
         // detallesIngreso(codigo,costo_total) ;
          });

          
  
// $(document).ready(function () {
//     $('#nombresCSelect').on('change',function(e) {
//       var uscamal_id = e.target.value;
//         $.ajax({
      
//         url: 'usuariosC/'+uscamal_id,
//         type:"get",
//         dataType: 'json',
//         success:function (usuarios) {
//           console.log(uscamal_id); 
//           console.log(usuarios);
//           if (usuarios) {
//              $('#cedulaSelect').empty();
//             $.each(usuarios.usuarios, function(key, value) {
//               $("#cedulaSelect").append('<option value="' + key + '">' + value.cedula + '</option>');
            
//              if(uscamal_id==value.id )
//            $('#apellidos').val(value.nombres+value.apellidos);
//            $('#codigo').val(value.codigo);
//           }); // close each()
//           }else{
//           console.log('hola');
//         }
//         }
//       })
//     });
// });
  
// $(document).ready(function () {
//     $('#nombresCSelect').on('change',function(e) {
//       var uscamal_id = e.target.value;
//         $.ajax({
//         url:"{{ route('IngresoCamal.create') }}/"+uscamal_id,
//         type:"get",
//         success:function (usuarios) {
//           console.log(uscamal_id);
//           console.log(usuarios);
//           if (usuarios) {    
//               $("#a").append(uscamal_id);
//              // close each()
//           }else{
//           console.log('hola');
//         }
//         }
//       })
//     });
// });





    
</script>
@endpush