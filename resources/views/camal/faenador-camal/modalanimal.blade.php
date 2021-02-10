<div class="modal fade" id="verAnimalModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" style="" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h3 class="card-title">CALCULAR PESO DEL ANIMAL </h3>
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
                       <!--  <input type="hidden" id="pesoA" name="pesoA" value=""> -->
                        <input type="hidden" id="id_ingresos" name="id_ingresos" value="">
                        <input type="hidden" id="ultimo_animal" name="ultimo_animal" value="">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12"> 
                               
                                <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                                    <tbody id="cuerpoTabla">   
                                    
                                    </tbody>                                   
                                </table>
                               
                            </div>                               
                        </div>        
                    </div>
                    <div class="modal-footer">
                        <button type="button" onclick="javascript:window.location.reload()" class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Cancelar</button>
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
          var codigo_animal = button.data('codigo_animal')  
          var id_animal = button.data('id_animal')  
          var codigo_agrocalidad_animal = button.data('codigo_agrocalidad_animal')               
          var modal = $(this)
           modal.find('.modal-body #id').val(id)
           modal.find('.modal-body #id_ingresos').val(id_ingresos)
        //   modal.find('.modal-body #cedula').val(cedula)
          
          console.log('codigo_animal= '+codigo_animal);
         detallespartes(id,id_ingresos, codigo_animal, id_animal,codigo_agrocalidad_animal ) ;
          }); 
          
          function detallespartes(id,id_ingresos,codigo_animal,id_animal,codigo_agrocalidad_animal) {
            if ($.trim(id) != '') {
                console.log(id);
                $.get("/piezas", {id: id}, function (piezas) {
                $('#detalles').empty();   
                console.log('piezas= '+piezas);
                var $i=1;
                var $j=1;
                $('#detalles').append('<thead><tr style="background-color:#17a2b8"><th style="color:#FFFFFF; border: medium transparent">N°</th><th style="color:#FFFFFF; border: medium transparent">Código</th><th style="color:#FFFFFF; border: medium transparent">Pieza</th><th style="color:#FFFFFF; border: medium transparent">Peso(KG)</th><th style="color:#FFFFFF; border: medium transparent">Opción</th></tr></thead></br>');
                    $.each(piezas, function (index, value) {
                       /*  console.log(value.codigo);
                        console.log(value.id);
                        console.log(value.codigo_agrocalidad);   */
                        if($i==1){     
                $('#detalles').append('<tr><td><input type="hidden" name="idp[]" value="'+value.id+'">'+$j+'</td><td><input type="hidden" name="codigo[]" value="'+value.codigo+'">'+value.codigo_agrocalidad+'</td><td>'+value.pieza+'</td><td><input  type="hidden" id="'+value.codigo+'" name="pesos[]" value="" ><input style="width:70%" disabled type="text" id="'+value.codigo+'-'+$j+'" value=""></td><th> <a Style="color:#FFFFFF" class="btn btn-info btn-rounded waves-effect"  onclick="calcularPesoPorPartes(\''+value.codigo+'\',\''+$j+'\',\''+id_ingresos+'\')" ><i class="fas fa-calculator"  aria-hidden="true"></i> Calcular peso</a> </td></tr>');         
                       }   $i++;  })
                $j++;

                $('#detalles').append('<tr><td><input type="hidden" name="id_animal" value="'+id_animal+'">'+$j+'</td><td><input type="hidden" name="codigo_animal" value="'+codigo_animal+'">'+codigo_agrocalidad_animal+'</td><td>Peso Total del animal</td><td><input  type="hidden" id="'+codigo_animal+'" name="peso_animal" value="" ><input style="width:70%" disabled type="text" id="'+codigo_animal+'-'+$j+'" value=""></td><th> <a Style="color:#FFFFFF" class="btn btn-info btn-rounded waves-effect"  onclick="calcularPesoPorPartes(\''+codigo_animal+'\',\''+$j+'\',\''+id_ingresos+'\')" ><i class="fas fa-calculator"  aria-hidden="true"></i> Calcular peso</a> </td></tr>');
                $j++;
                        var $i=1;
                   $.each(piezas, function (index, value) {
                       /*  console.log(value.codigo);
                        console.log(value.id);
                        console.log(value.codigo_agrocalidad);   */
                        if($i==2){          
                $('#detalles').append('<tr><td><input type="hidden" name="idp[]" value="'+value.id+'">'+$j+'</td><td><input type="hidden" name="codigo[]" value="'+value.codigo+'">'+value.codigo_agrocalidad+'</td><td>'+value.pieza+'</td><td><input  type="hidden" id="'+value.codigo+'" name="pesos[]" value="" ><input style="width:70%" disabled type="text" id="'+value.codigo+'-'+$j+'" value=""></td><th> <a Style="color:#FFFFFF" class="btn btn-info btn-rounded waves-effect"  onclick="calcularPesoPorPartes(\''+value.codigo+'\',\''+$j+'\',\''+id_ingresos+'\')" ><i class="fas fa-calculator"  aria-hidden="true"></i> Calcular peso</a> </td></tr>');         
                     } $i++;  })
                    }); 
            }
        };    

        function calcularPesoPorPartes(codigo,j,id_ingresos) {
            var num = Math.round(Math.random() * (600 - 800) + 600);
         //  console.log('id_animal='+id_ingresos);
         //   console.log('codigo pieza='+codigo)
             var cod= codigo+'-'+j;
           //  console.log(cod);
            $("#"+codigo).val(num);
            $("#"+cod).val(num);
           // console.log('idddd1= '+id_ingresos);
            if ($.trim(id_ingresos) != '') {
                //console.log('idddd2= '+id_ingresos);
                $.get("/ulltimo_animal_sin_peso", {id_ingresos:id_ingresos,codigo:codigo}, function (ultimo_animal) {
                if(ultimo_animal==1){ //1 significa cuando sólo me queda un sólo animal por pesar, ya se que es el ultimo animal
                    $("#ultimo_animal").val(ultimo_animal);
                }
                $("#restanteB").val(ultimo_animal);
                      }); 
                    }
              }     


</script>
@endpush