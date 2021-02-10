<div class="modal fade" id="verAnimalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">PARTES DEL ANIMAL </h3>
                     <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">×</span>
                </button>
            </div> 
            {!!Form::open(array('url'=>'animal-camal', 'method'=>'POST','autocomplete' => 'off'))!!}
          
					 {{Form::token()}}
					 @csrf
                     @method('POST')
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
                        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cerrar</button>
                        <button class="btn btn-primary toastrDefaultSuccess" type="submit" action="eate" >Guardar cambios</button>                  
                        
                    </div>   
                </div>
            </div>
            {{Form::Close()}}
        </div>
    </div>
</div>  

@push('scripts')
<script >
$('#verAnimalModal').on('show.bs.modal', function (event) {
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
                $.get("/piezas", {id: id}, function (piezas) {
                $('#detalles').empty();   
                console.log('piezas= '+piezas);
                var $j=1;
                $('#detalles').append('<thead><tr style="background-color:#17a2b8"><th style="color:#FFFFFF; border: medium transparent">N°</th><th style="color:#FFFFFF; border: medium transparent">Código</th><th style="color:#FFFFFF; border: medium transparent">Pieza</th><th style="color:#FFFFFF; border: medium transparent">Peso(KG)</th><th style="color:#FFFFFF; border: medium transparent">Opción</th></tr></thead></br>');
                    $.each(piezas, function (index, value) {
                        console.log(value.codigo);
                        console.log(value.id);
                        console.log(value.codigo_agrocalidad);
                $('#detalles').append('<tr><td><input type="hidden" name="idp[]" value="'+value.id+'">'+$j+'</td><td><input type="hidden" name="codigo[]" value="'+value.codigo+'">'+value.codigo_agrocalidad+'</td><td>'+value.pieza+'</td><td><input  type="hidden" id="'+value.codigo+'" name="pesos[]" value="" ><input style="width:70%" disabled type="text" id="'+value.codigo+'-'+$j+'" value=""></td><th> <a Style="color:#FFFFFF" class="btn btn-info btn-rounded waves-effect"  onclick="calcularPesoPorPartes(\''+value.codigo+'\',\''+$j+'\',\''+id_ingresos+'\')" >Calcular peso</a> </td></tr>');         
                        $j++;  })
                    }); 
            }
        };    

        function calcularPesoPorPartes(codigo,j,id_ingresos) {
            var num = Math.round(Math.random() * (600 - 800) + 600);
           console.log('id_animal='+id_ingresos);
           console.log('codigo pieza='+codigo)
             var cod= codigo+'-'+j;
             console.log(cod);
            $("#"+codigo).val(num);
            $("#"+cod).val(num);

            if ($.trim(id) != '') {
                console.log(id);
                $.get("/cambiar_estado_ingreso", {id_ingresos:id_ingresos,codigo:codigo}, function (respuesta) {
                if(respuesta==1){
                    $("#estado_ingreso").val(respuesta);
                }
                console.log(respuesta);
               
                //var $j=0;
                //     $.each(piezas_pesos, function (index, value) {
                //         console.log(index);
                //         console.log(value.codigo_pieza);
                //      $('#detalles').append('<tr><td style="width: 15%;">'+value.codigo_pieza+'</td><td style="width: 25%;">'+value.pieza+'</td><td style="width: 25%;">'+value.peso+'</td></tr>');         
                //    $j++;  })
                      }); 
                    }




           
              }     


</script>
@endpush