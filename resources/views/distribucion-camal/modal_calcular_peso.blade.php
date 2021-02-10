<div class="modal fade" id="verCalcularPesoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog"  role="document">
      <div class="modal-content">
          <div class="modal-header">
              <h4 class="modal-title">Información del peso actual</h4>
                   <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">×</span>
              </button>
          </div>  
          <div class="modal-body">
              <div class="card">
                  <input class="form-control" id="id" name="id" type="hidden" required autofocus>              
                  <div class="card-body">
                    <fieldset class="form-group">
                        <div class="row">
                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                              <label>Animal:</label>
                                                  <div class="input-group">
                                                      <span class="input-group-prepend">
                                                          <span class="input-group-text">
                                                              <i class="fa fa-circle"></i>
                                                          </span>
                                                      </span>
                              <input class="form-control" id="animal_peso" name="animal_peso" type="text" value="" readonly required autofocus>
                            
                                                  </div> 												     
                          </div>		
                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                                              <label>Pieza:</label>
                                                  <div class="input-group">
                                                      <span class="input-group-prepend">
                                                          <span class="input-group-text">
                                                              <i class="far fa-circle"></i>
                                                          </span>
                                                      </span>
                              <input class="form-control" id="pieza" name="pieza" type="text" value="" readonly required autofocus>
                                                  </div> 
                          </div>
                        </div>
                        </fieldset>
                        <fieldset class="form-group">	
                            <div class="row">
                          <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                            <label>Peso:</label>
                            <div class="input-group">
                              <span class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="fa fa-calculator"></i>
                                </span>
                              </span>
                            <input class="form-control" id="peso_calculado" name="peso_calculado" type="text" value="" readonly required autofocus>
                          
                            </div>  
                          </div>  
                          <div class="col-lg-6 col-sm-6 col-md-6 col-xs-12">
                            <label>Calcular peso:</label>
                                <div class="input-group">
                                    <span class="input-group-prepend">
                                        {{-- <span class="input-group-text">
                                            <i class="fa fa-calculator"></i>
                                        </span> --}}
                                    </span>
                                    {{-- <a href="{{ url('distribucion-camal/showCabeceraDetalle',3)}}" id="calcular_peso" class="form-control btn btn-info btn-rounded waves-effect"
                                    title="Calcular peso">
                                     <span class="fa fa-calculator"></span>  Calcular peso
                                   </a>   --}}
                                   <button class="form-control btn btn-info btn-rounded waves-effect toastrDefaultSuccess" 
                                    data-backdrop="static" data-keyboard="false"   onclick="pesoRandomico()"  >
                                   <span class="fa fa-calculator"></span> Calcular peso</button>
                                </div> 
                            </div>												     
           
                        </div>
                        </fieldset>
                        
                  </div>
                  <div class="modal-footer">
                    <button  id="botonGuardarPeso"  class="btn btn-success btn-rounded waves-effect" 
                                    data-backdrop="static" data-keyboard="false" title="Guardar peso"  >
                                    <span class="fa fa-save"></span>  Guardar peso</button>                 
                  </div>   
              </div>
          </div>
      </div>
  </div>
</div>        

@push('scripts')
<script>

/* $(document).ready(function(){
  $("botonGuardarPeso").click(function(){
    var pieza = $('#pieza').val();
    var peso=$('#peso_calculado').val();
    console.log(pieza);
         if ($.trim(pieza) != '') {

            console.log(pieza);
            $.get("/distribucion-camal/actualizarPeso", {pieza: pieza,peso:peso}, function (piezas) {
            
            $.each(piezas, function (index, value) {
                //$('#detalles').empty();
                value=value.split("_");
                    $('#detalles').append("<tr role='row' class='odd'><td class='sorting_1'> "+value[0]+"</td><td class='sorting_1'> "+value[1]
                        +"</td><td class='sorting_1'> "+value[2]+"</td></tr>"); 
                })
            }); 
        }
    });
});  */
/* 
$(document).ready(function(){
      function paty() {
          var animal = $('#animal').val();
          console.log(animal);
          if ($.trim(animal) != '') {
  
            console.log(animal);
              $.get("/distribucion-camal/partes", {faculty_id: animal}, function (careers) {
                  var old = $('#partes').data('old') != '' ? $('#partes').data('old') : '';
                  $('#partes').empty();
                  $('#partes').append("<option value=''>Seleccione la parte</option>");
                  console.log(careers);
                  $.each(careers, function (index, value) {
                    let resp=value.split("_");
                      $('#partes').append("<option  value='" + resp[2] + "'" + (old == index ? 'selected' : '') + ">" + resp[0] +"</option>");
                  })
              }); 
          }
      }
      paty();
      $('#animal').on('change', loadPartesAnimal);
  }); */
/* 
  $(document).ready(function(){
      function loadPartesAnimal() {
          var animal = $('#animal').val();
         
          if ($.trim(animal) != '') {
  
            console.log(parseInt(animal)+4);
              $.get("/distribucion-camal/partes", {faculty_id: parseInt(animal)}, function (careers) {
                
                  var old = $('#partes').data('old') != '' ? $('#partes').data('old') : '';
                  $('#partes').empty();
                  $('#partes').append("<option value=''>Seleccione la parte</option>");
                  console.log(careers);
                  $.each(careers, function (index, value) {
                    let resp=value.split("_");
                      $('#partes').append("<option  value='" + resp[2] + "'" + (old == index ? 'selected' : '') + ">" + resp[0] +"</option>");
                  })
              }); 
          }
      } 
     // loadPartesAnimal();
      $('#animal').on('change', loadPartesAnimal);
  }); */

    function funcionCambio(){
       let val=document.getElementById("cambio").href;
        console.log(val);
        val.split("/");
        let base=document.getElementById("cambio");
        
        let id=document.getElementById("tabla");
      //  console.log("tabla: "+id.value);
        let concatenado=base.baseURI+"/showCabeceraDetalle"+id.value
      console.log(concatenado);
        //console.log(val[val.length-1]);
        document.getElementById("cambio").setAttribute("href",concatenado);
    }

function pesoRandomico(){
   
   let val= Math.round(Math.random() * (600 - 800) +250);
   $('#peso_calculado').val(val)
}

$( "#botonGuardarPeso" ).click(function() {
    var pieza = $('#pieza').val();
    var peso=$('#peso_calculado').val();
    var animal_peso=$('#animal_peso').val();
    if ($.trim(pieza) != '') {

    console.log(pieza);
        $.get("/distribucion-camal/actualizarPeso", {pieza: pieza,peso:peso,animal_peso:animal_peso}, function (piezas) {
        // var old = $('#detalles').data('old') != '' ? $('#partes').data('old') : '';
        

        // var valu=piezas.split("_");
        
         $.each(piezas, function (index, value) {
            //$('#detalles').empty();
            value=value.split("%");
            console.log(value);
                 $('#detalles').append("<tr role='row' class='odd'><td class='sorting_1'> <input class='form-control' id='codigo_peso' name='codigo[]' type='text' value="+value[0]+" readonly required autofocus></td><td class='sorting_1'><input class='form-control'  id='especie_peso' name='especie[]' type='text' value="+value[4]+" readonly required autofocus/> "
                     +"</td><td class='sorting_1'><input class='form-control'  id='parte_peso' name='parte[]' type='text' value="+value[1]+" readonly required autofocus/></td><td class='sorting_1'> <input class='form-control' id='peso_peso' name='peso[]' type='text' value="+value[2]+" readonly required autofocus></td><td class='sorting_1'> <input class='form-control' id='nro_id_peso' name='nro_id_peso[]' type='text' value="+value[3]+" readonly required autofocus></td></tr>"); 
            })

           //<td class='sorting_1'><a href='{{ route('distribucion-camal.create')}}'  class='btn btn-success btn-rounded waves-effect' title='Mostrar información'><span class='fa fa-plus-square'></span>  Mostrar</a></td> 
           
         
        }); 
       
        var parte = $('#partes').val();
        console.log(parte);
     
     /*   $("#pieza").prepend(new Option('', '', true, true));
      $("#pieza option:first").attr("selected", "selected"); */


       $('#verCalcularPesoModal').modal('hide');
       $("#partes option[value='"+parseInt(parte)+"']").each(function() {
            $(this).remove();
        });
      /*  $('#partes').remove("<option value='' selected='selected'></option>"); */
      // verCalcularPesoModal
      
    }
});


</script>
@endpush