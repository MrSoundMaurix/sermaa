@extends('layouts.applte')
    @section('contenido')
                    <!--Content Header (Page header)-->
                    
@include('distribucion-camal/modal_calcular_peso')
<div class="content-wrapper">             
    @include('layouts.messages')
  

           
  <!-- Main content -->
  <div class="content">
    <div class="modal-body">
        <div class="card card-info card-outline">
          <div class="card-header">  
            <div class="row">	
    <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
      <span class="input-group-prepend">	
        
      </span> 
    </div>	
    <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
      <span class="" style="text-align: center;">
          <h3 class="card-title" >DISTRIBUCIÓN</h3>
      </span>		
    </div>
  </div>   
            </div>

            <div class="card-body">
              {!! Form::open(['url' => 'distribucion-camal','method'=>'POST']) !!}
              {{Form::token()}}
              @csrf
              @method('POST')
              <fieldset class="form-group">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
									<label>Fecha:</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-calendar text-info"></i>
												</span>
											</span>
                    <input class="form-control" id="fecha" name="fecha" type="text" value="{{$fecha_actual}}" readonly required autofocus>
                  
										</div> 												     
                </div>		
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
									<label>Hora:</label>
										<div class="input-group">
											<span class="input-group-prepend">
												<span class="input-group-text">
													<i class="fa fa-clock text-info"></i>
												</span>
											</span>
                    <input class="form-control" id="hora" name="hora" type="text" value="{{$hora_actual}}" readonly required autofocus>
										</div> 												     
                </div>		
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <label>Guía</label>
                  <div class="input-group">
                    <span class="input-group-prepend">
                      <span class="input-group-text">
                        <i class="fa fa-address-card text-info"></i>
                      </span>
                    </span>
                  <input class="form-control" id="guia" name="guia" type="text" value="{{$usuario[0]->codigo}}" readonly required autofocus>
                  <input class="form-control" id="guia" name="id_ingresos" type="hidden" value="{{$id_ingresos}}" readonly required autofocus>
                  </div>  
                </div>  

              </div>
              </fieldset>
              <fieldset class="form-group">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">               	
                  <div class="form-group">
                    <label>Provincia de orígen:</label>
                    {{-- <input type="hidden" name="id" id="id" value="{{$id}}"> --}}
                      <select required class="form-control select2bs4 " data-live-search="true" style="width: 100%;" name="provincia" id="provincia">
                          @foreach ($provincias as $c)
                          <option value="{{$c}}" {{old('provincia')==$c ? 'selected' : ''}}>{{$c}}</option>
                          @endforeach
                          
                      </select>
                      
                  </div>
                </div>	
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label>Cantón de orígen:</label>
                      <div class="relative">
                        <select id="canton" data-old="{{ old('canton') }}" name="canton"  class="form-control select2bs4 "
                        data-live-search="true" style="width: 100%;" >
                            
                        </select>
                      
                      </div>
                 </div>
              
              </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label>Parroquia de orígen:</label>
                      <div class="relative">
                        <select id="parroquia" data-old="{{ old('parroquia') }}" name="parroquia"  class="form-control select2bs4 "
                        data-live-search="true" style="width: 100%;" >
                            
                        </select>
                      
                      </div>
                 </div>
              
              </div>
              </fieldset>
              <fieldset class="form-group">
              <div class="row">
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">               	
                  <div class="form-group">
                    <label>Provincia de destino:</label>
                    {{-- <input type="hidden" name="id" id="id" value="{{$id}}"> --}}
                      <select required class="form-control select2bs4 " data-live-search="true" style="width: 100%;" name="provincia_destino" id="provincia_destino">
                          @foreach ($provincias as $c)
                          <option value="{{$c}}" {{old('provincia')==$c ? 'selected' : ''}}>{{$c}}</option>
                          @endforeach
                          
                      </select>
                      
                  </div>
                </div>	
                <div class="col-lg-3 col-sm-6 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label>Cantón de destino:</label>
                      <div class="relative">
                        <select id="canton_destino" data-old="{{ old('canton_destino') }}" name="canton_destino"  class="form-control select"
                        data-live-search="true" style="width: 100%;" >
                            
                        </select>
                      
                      </div>
                 </div>
              
              </div>
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label>Parroquia de destino:</label>
                      <div class="relative">
                        <select id="parroquia_destino" data-old="{{ old('parroquia_destino') }}" name="parroquia_destino"  class="form-control select2bs4 "
                        data-live-search="true" style="width: 100%;" >
                            
                        </select>
                      
                      </div>
                 </div>
              
              </div>
              </fieldset>
              <fieldset class="form-group">
              <div class="row">
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">               	
                  <div class="form-group">
                    <label>Nombre del destinatario:</label>
                    <div class="input-group">
                      <span class="input-group-prepend">
                          <span class="input-group-text">
                              <i class="fa fa-user text-info"></i>
                          </span>
                      </span>
                      <input class="form-control" id="nombre_destinatario" name="nombre_destinatario" type="text" value="{{ old('nombre_destinatario') }}"
                      required autofocus>
                  </div>  
                      
                  </div>
                </div>	
                <div class="col-lg-6 col-sm-12 col-md-6 col-xs-12">
                  <div class="form-group">
                    <label>Lugar/Referencia de destino:</label>
                      <div class="relative">
                        <div class="input-group">
                          <span class="input-group-prepend">
                              <span class="input-group-text">
                                  <i class="fa fa-house-user text-info"></i>
                              </span>
                          </span>
                          <input class="form-control" id="lugar_destino" name="lugar_destino" type="text" value="{{ old('lugar_destino') }}"
                          required autofocus>
                      </div>  
                      
                      </div>
                 </div>
              
              </div>
             
              </fieldset>
              <fieldset class="form-group">
                <div class="row">

              <div class="col-lg-2 col-sm-12 col-md-3 col-xs-12">
                <div class="form-group">
                  <label>Placa del transporte:</label>
                    <div class="relative">
                      <div class="input-group">
                        <span class="input-group-prepend">
                            <span class="input-group-text">
                                <i class="fa fa-car text-info"></i>
                            </span>
                        </span>
                        <input class="form-control" id="placa_transporte" data-inputmask='"mask": "AAA-9999"' data-mask name="placa_transporte" type="placa_transporte"  value="{{ old('placa_transporte') }}"
                        required autofocus>
                    </div>  
                    
                    </div>
               </div>
            
            </div>
              <div class="col-lg-10 col-sm-12 col-md-9 col-xs-12">
                <div class="form-group">
                  <label>Pago del transporte:</label>
                   
                      <div class="relative">
                        <select required class="form-control select2bs4 " data-live-search="true" style="width: 100%;" name="pago_transporte"  >
                          @foreach ($costo_camal as $c)
                          <option value="{{$c->id}}" {{old('descripcion')==$c->descripcion ? 'selected' : ''}}>{{$c->descripcion}} -  ${{$c->valor}}</option>
                          @endforeach
                          
                      </select>
               </div>
            
            </div>
                </div>
              </fieldset>
              <hr/>
               <fieldset class="form-group">
              <div class="row">
                  
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 ">
                  <div class="form-group">
                    <label for="animal">Animal pesado</label>
                    <select  class="form-control select" data-live-search="true"
                     style="width: 100%;" name="animal" id="animal">
                     <option  selected="selected" value="">Seleccione el animal</option>	
                      @foreach ($animal as $a)
                        @foreach ($ingresosDetalle as $det)
                        @if ($a->id_ingresos_detalle==$det->id && $a->estado==1)
                        <option value="{{$a->id}}">{{$a->codigo}}</option>	
                        @endif
                        @endforeach
                      @endforeach
                    
                    
                  </select>	
                  </div>
                </div>
                
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">
                    <label for="partes">Partes</label>
                    <select id="partes" data-old="{{ old('partes') }}" name="partes"  onchange="cargarValue()" class="form-control select"
                     >
                    </select>
                  </div>	
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="codigo_pieza">Código de pieza</label>
                  <input type="text" max="" class="form-control" id="codigo_pieza" value="" readonly required autofocus>										
                      
                  </div>	
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                
                  <div class="form-group">
                    <label for="bt_add">Añadir</label>
                    <br>
                   {{--  <button class="btn-sm btn-info btn-rounded btn-lg waves-effect" type="button" id="bt_add">
                   <i class="fa fa-plus-square"></i> Añadir
                    </button> --}}

                    <a href="" class="btn btn-info btn-rounded waves-effect" 
                    id="boton" 
                    data-id="id_dato" data-toggle="modal" data-target="#verCalcularPesoModal"  >
                    <i class="fa fa-plus-square"  aria-hidden="true"></i>  Añadir</a>
                  </div>	
                </div>
              </div>
              </fieldset> 
              
              <fieldset class="form-group">
              <div class="row">
                  
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12 ">
                  <div class="form-group">
                    <label for="animal_ingresada">Animal por piezas</label>
                    <select  class="form-control select2bs4 " data-live-search="true" style="width: 100%;" name="animal_ingresada" id="animal_ingresada">
                      <option selected="selected" value="">Seleccione el animal</option>	
                      @foreach ($animal as $a)
                        @foreach ($ingresosDetalle as $det)
                        @if ($a->id_ingresos_detalle==$det->id && $a->estado==1 )
                        <option value="{{$a->id}}">{{$a->codigo}}</option>	
                        @endif
                        @endforeach
                      @endforeach
                  </select>	
                  </div>
                </div> 
                <div class="col-lg-4 col-sm-4 col-md-4 col-xs-12">
                  <div class="form-group">

                    <label for="parte_animal_ingresada">Partes</label>
                    <select id="parte_animal_ingresada" data-old="{{ old('parte_animal_ingresada') }}"
                     name="parte_animal_ingresada" onchange="cargarValueIngresada()"
                      class="form-control select2bs4 " >
                   </select>

                  {{--   <input type="text"  class="form-control" name="parte_animal_ingresada" value=""  id="parte_animal_ingresada" >		 --}}	
                    {{-- <select id="partes" data-old="{{ old('partes') }}" name="partes" onchange="cargarValue()" class="form-control select2bs4 "
                     >
                    </select> --}}
                  </div>	
                </div>
                <div class="col-lg-3 col-sm-3 col-md-3 col-xs-12">
                  <div class="form-group">
                    <label for="codigo_pieza_ingresada">Código de pieza</label>
                  <input type="text" max="" name="codigo_pieza_ingresada" class="form-control" value="" id="codigo_pieza_ingresada" readonly >										
                      
                  </div>	
                </div>
                <div class="col-lg-2 col-sm-2 col-md-2 col-xs-12">
                
                  <div class="form-group">
                    <label for="bt_add_ingresada">Añadir</label>
                    <br>
                    {{-- <button class="btn-sm btn-info btn-rounded btn-lg waves-effect" type="button"
                     onclick="bt_add_ingresadaFuncion()">
                   <i class="fa fa-plus-square"></i> Añadir
                    </button>  --}}

                    <button  id="boton_add_ingresada" href=""  class="btn btn-info btn-rounded waves-effect" 
                                    type="button"  title="Guardar peso"  >
                                    <span class="fa fa-plus-square"></span>Añadir</button>     

                   {{--  <a href="" class="btn btn-info btn-rounded waves-effect" 
                    id="bt_add_ingresada" 
                    data-id="id_dato"   >
                    <i class="fa fa-plus-square"  aria-hidden="true"></i>Añadir</a> --}}
                  </div>	
                </div>
              </div>
              </fieldset> 
              <fieldset class="form-group">
              <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-responsive">
                  <table id="detalles" class="table table-striped table-bordered table-condensed table-hover">
                    <thead style="background-color:#17a2b8">
                      
                      <th style="color:#FFFFFF">Código</th>
                      <th style="color:#FFFFFF">Especie</th>
                      <th style="color:#FFFFFF">Tipo</th>
                     
                     <th style="color:#FFFFFF">Peso</th>   
                      <th style="color:#FFFFFF">Nro de id</th>
                    </thead>
                      <tbody>
                       {{--  @foreach ($cuartoFrio as $cuarto)
                        <tr role="row" id="fila" class="odd">
                          <td><button type="button" class="btn btn-danger" onclick="eliminar('+cont+');">X</button>
                          <td class="sorting_1"> <input class="form-control" id="especie" name="especie[]" type="text" value="{{$cuarto->especie}}" readonly required autofocus>
                          <input class="form-control " id="especie" name="id_cuarto[]" type="hidden" value="{{$cuarto->id}}" readonly required autofocus></td>
                          <td class="sorting_1"> <input class="form-control" id="producto" name="producto[]" type="text" value="{{$cuarto->pieza}}" readonly required autofocus></td>
                          <td class="sorting_1"> <input type="number" min="1" name="cantidad[]" max="{{$cuarto->total_piezas}}" value="{{$cuarto->total_piezas}}" class="form-control cantidad"></td>
                          <td class="sorting_1"> <input class="form-control" id="nro_id" name="nro_id[]" type="text" value="#####" readonly required autofocus></td>
                        </tr> 
                        @endforeach --}}
                      </tbody>
                  </table>
                </div>
              </div>
              </fieldset>

              <div class="form-group">
                <input name="_token" value="{{ csrf_token() }}" type="hidden"></input>
                <a href="{{route('distribucion-camal.index')}}" class="btn btn-secondary btn-rounded waves-effect" title="Regresar">
                  <span class="fa fa-long-arrow-alt-left"></span> Regresar
              </a> 
                <button class="btn btn-primary" type="submit" ><i class="fa fa-save"></i> Guardar</button>
                
                {{-- <a href="{{ url('distribucion-camal.store') }}" class="btn btn-primary" title="Guardar">
                  <span class=""></span> Guardar
                </a>    --}}
               
              </div>



            	{!! Form::close() !!}		
          </div>
        </div>
    </div>
  </div>
</div>
       
  @endsection            
    
              
  @push('scripts')
  <script>


  



function bt_add_ingresadaFuncion() {
    var parte_animal_ingresada = $('#parte_animal_ingresada').val();
    var animal_ingresada = $('#animal_ingresada').val();
    var especie="";
     if (parte_animal_ingresada!="") {
          if(animal_ingresada.includes("v")){
              especie="Bovino"
            }else{
              especie="Porcino"
            }
            var codigo_pieza_ingresada = $('#codigo_pieza_ingresada').val();
            console.log(animal_ingresada);
          

              console.log(codigo_pieza_ingresada);
                        $('#detalles').append("<tr role='row' class='odd'><td class='sorting_1'> <input class='form-control' id='codigo_peso' name='codigo[]' type='text' value="+codigo_pieza_ingresada+" readonly required autofocus></td><td class='sorting_1'> <input class='form-control' id='especie_peso' name='especie[]' type='text' value="+especie+" readonly required autofocus></td><td class='sorting_1'><input class='form-control'  id='parte_peso' name='parte[]' type='text' value="+parte_animal_ingresada+" readonly required autofocus/> "
                            +"</td><td class='sorting_1'> <input class='form-control' id='peso_peso' name='peso[]' type='text' value='-' readonly required autofocus></td><td class='sorting_1'> <input class='form-control' id='codigo_peso' name='nro_id_peso[]' type='text' value="+animal_ingresada+" readonly required autofocus></td></tr>"); 

        $('#parte_animal_ingresada').val("");       
        $('#codigo_pieza_ingresada').val("");
     } else {

       alert("Es necesario ingresar todos los campos");
     }   
        
}

$( "#boton_add_ingresada" ).click(function() {
    var pieza = $('#parte_animal_ingresada').val();
     
    var animal_peso=$('#animal_ingresada').val();
    if ($.trim(pieza) != '') {
    console.log(pieza);
        $.get("/distribucion-camal/actualizarPesoIngresada", {pieza: pieza, animal_peso:animal_peso}, function (piezas) {
  
         $.each(piezas, function (index, value) {
           
            value=value.split("%");
            console.log(value);
                 $('#detalles').append("<tr role='row' class='odd'><td class='sorting_1'> <input class='form-control' id='codigo_peso' name='codigo[]' type='text' value="+value[0]+" readonly required autofocus></td><td class='sorting_1'><input class='form-control'  id='especie_peso' name='especie[]' type='text' value="+value[4]+" readonly required autofocus/> "
                     +"</td><td class='sorting_1'><input class='form-control'  id='parte_peso' name='parte[]' type='text' value="+value[1]+" readonly required autofocus/></td><td class='sorting_1'> <input class='form-control' id='peso_peso' name='peso[]' type='text' value="+value[2]+" readonly required autofocus></td><td class='sorting_1'> <input class='form-control' id='nro_id_peso' name='nro_id_peso[]' type='text' value="+value[3]+" readonly required autofocus></td></tr>"); 
            })
        }); 
        var parte = $('#parte_animal_ingresada').val();
        console.log(parte);
     
      // $('#verCalcularPesoModal').modal('hide');
       $("#parte_animal_ingresada option[value='"+parte+"']").each(function() {
            $(this).remove();
        });
    }
});


    $(document).ready(function(){
      function loadCareer() {
          var faculty_id = $('#provincia').val();
          console.log(faculty_id);
          if ($.trim(faculty_id) != '') {
  
            console.log(faculty_id);
              $.get("/ubicacion/canton", {faculty_id: faculty_id}, function (careers) {
  
                  var old = $('#canton').data('old') != '' ? $('#canton').data('old') : '';
  
                  $('#canton').empty();
                  $('#canton').append("<option value=''>Seleccione el cantón</option>");
                
                  $.each(careers, function (index, value) {
                      $('#canton').append("<option value='" + value + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
              }); 
          }
      }
      loadCareer();
      $('#provincia').on('change', loadCareer);
      
  });
    $(document).ready(function(){
      function load_provincia_destino() {
          var faculty_id = $('#provincia_destino').val();
          if ($.trim(faculty_id) != '') {
  
            console.log(faculty_id);
              $.get("/ubicacion/canton", {faculty_id: faculty_id}, function (careers) {
  
                  var old = $('#canton_destino').data('old') != '' ? $('#canton_destino').data('old') : '';
  
                  $('#canton_destino').empty();
                  $('#canton_destino').append("<option value=''>Seleccione el cantón</option>");
                  
                  $.each(careers, function (index, value) {
                      $('#canton_destino').append("<option value='" + value + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                      $
                  })
              }); 
          }
      }
      load_provincia_destino();
      $('#provincia_destino').on('change', load_provincia_destino);
      
  });
    $(document).ready(function(){
      function loadCanton() {
          var canton = $('#canton').val();
          if ($.trim(canton) != '') {
  
            console.log(canton);
              $.get("/ubicacion/parroquias", {faculty_id: canton}, function (careers) {
                  var old = $('#parroquia').data('old') != '' ? $('#parroquia').data('old') : '';
                  $('#parroquia').empty();
                  $('#parroquia').append("<option value=''>Seleccione la parroquia</option>");
                 
                  $.each(careers, function (index, value) {
                      $('#parroquia').append("<option value='" + value + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
              }); 
          }
      }
      loadCanton();
      $('#canton').on('change', loadCanton);
  });
    $(document).ready(function(){
      function loadCanton_destino() {
          var canton = $('#canton_destino').val();
          if ($.trim(canton) != '') {
  
            console.log(canton);
              $.get("/ubicacion/parroquias", {faculty_id: canton}, function (careers) {
                  var old = $('#parroquia_destino').data('old') != '' ? $('#parroquia_destino').data('old') : '';
                  $('#parroquia_destino').empty();
                  $('#parroquia_destino').append("<option value=''>Seleccione la parroquia</option>");
                 
                  $.each(careers, function (index, value) {
                      $('#parroquia_destino').append("<option value='" + value + "'" + (old == index ? 'selected' : '') + ">" + value +"</option>");
                  })
              }); 
          }
      }
      loadCanton_destino();
      $('#canton_destino').on('change', loadCanton_destino);
  });

  $(document).ready(function () {

  $('#animal').change(function () {
    //var id = $(this).val();
    var animal = $('#animal').val();
    $('#partes').find('option').not(':first').remove();
    $('#partes').empty();
$('#partes').append("<option value=''>Seleccione la parte</option>");
    $.ajax({
      url:'partes/'+animal,
      type:'get',
      dataType:'json',
      success:function (response) {
        var len = 0;
        if (response.data != null) {
            len = response.data.length;
        }
        if (len>0) {
            for (var i = 0; i<len; i++) {
              var id = response.data[i].id;
                  var name = response.data[i].pieza;
                  var codigo=response.data[i].codigo;
                  var val=codigo.split("-");
                  if (val[2] <= 4 ) {
                    var option = "<option value='"+id+"'>"+name+"</option>"; 
                  $("#partes").append(option);
                  }      
            }
        }
      
      }
    })
  });

});

$(document).ready(function () {
  $('#animal_ingresada').change(function () {
  //var id = $(this).val();
  var id2 = $('#animal_ingresada').val();
  console.log(id2);
 $('#parte_animal_ingresada').find('option').not(':first').remove();
 $('#parte_animal_ingresada').empty();
$('#parte_animal_ingresada').append("<option value=''>Seleccione la parte</option>");
  $.ajax({
    url:'partesPorPieza/'+id2,
    type:'get',
    dataType:'json',
    success:function (response) {
        var len = 0;
        if (response.data != null) {
            len = response.data.length;
        }
        if (len>0) {
            for (var i = 0; i<len; i++) {
                  var id = response.data[i].id;
                  var name = response.data[i].pieza;
                  var codigo=response.data[i].codigo;
                  var val=codigo.split("-");
                  if (val[2] > 4 &&val[2] < 9 ) {
                    var option = "<option value='"+id+"'>"+name+"</option>"; 
                  $("#parte_animal_ingresada").append(option);
                  }
                  
            }
        }
    }
  })
}); 
});


/*    $(document).ready(function(){
      function loadPartesAnimalIngresada() {
          var animal = $('#animal_ingresada').val();
          console.log(animal);
          if ($.trim(animal) != '') {
  
           
              $.get("partesIngresada", {id: parseInt(animal)}, function (careers) {
                  var old = $('#parte_animal_ingresada').data('old') != '' ? $('#parte_animal_ingresada').data('old') : '';
                  $('#parte_animal_ingresada').empty();
                  $('#parte_animal_ingresada').append("<option value=''>Seleccione la parte</option>");
                  console.log(careers);
                  $.each(careers, function (index, value) {
                    let resp=value.split("_");
                      $('#parte_animal_ingresada').append("<option  value='" + resp[2] + "'" + (old == index ? 'selected' : '') + ">" + resp[0] +"</option>");
                  })
              }); 
          }
      } 
       loadPartesAnimalIngresada();
      $('#animal_ingresada').on('change', loadPartesAnimalIngresada);
  });  */

  $( "#boton" ).click(function() {
      var parte = $('#partes').val();
      var animal = $('#animal').val();
      console.log(parte);
           $("#pieza").val(parte)
            $('#peso_calculado').val(0)
           $('#animal_peso').val(animal)
  });           
  

  function cargarValue(){
      var valor = $('#partes').val();
      $('#codigo_pieza').val(valor)
      $('#id_dato').val(valor)

  }

  function cargarValueIngresada(){
      var valor = $('#parte_animal_ingresada').val();
      $('#codigo_pieza_ingresada').val(valor)
     // $('#id_dato').val(valor)

  }

  



  function eliminar(index){

			$("#fila").remove();
		//	evaluar();
		}


  </script>
   <script src="{{asset('assets/vendor/moment/moment.min.js')}}"></script>
   <script src="{{asset('assets/vendor/inputmask/min/jquery.inputmask.bundle.min.js')}}"></script>
  <script>
    $(function() {
       //Datemask dd/mm/yyyy
       $('#datemask').inputmask('dd/mm/yyyy', {
                    'placeholder': 'dd/mm/yyyy'
                })
                //Datemask2 mm/dd/yyyy
            $('#datemask2').inputmask('mm/dd/yyyy', {
                    'placeholder': 'mm/dd/yyyy'
                })
                //Money Euro
            $('[data-mask]').inputmask()

    })

  </script>

  @endpush
                         