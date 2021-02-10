
@extends('layouts.applte') 
@section('contenido')
@include('camal/administrador-camal/maestroDetalleIngreso/VerDetalleModal')
    <div class="content-wrapper">
            @include('layouts.messages')
           
            <div class="content">
                <div class="modal-body">
                    <div class="card card-info card-outline" >
                        <div class="card">
                            <div class="card-header">  
                                <div class="row">	
                                    <div class="col-lg-5 col-sm-4 col-md-4 col-xs-12">
                                        <span class="input-group-prepend">	
                                            
                                        </span> 
                                    </div>	
                                    <div class="col-lg-6 col-sm-4 col-md-4 col-xs-12">
                                        <span class="" style="text-align: center;">
                                                <h3 class="card-title" >HISTORIAL REGISTRO</h3>
                                        </span>		
                                    </div>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                  <div class="col-sm-4">
                                  </div>
                                    <div class="col-sm-4" style="text-align:right">
                                    @include('camal/administrador-camal/maestroDetalleIngreso/search')          
                                    </div>
                                </div>    
                                
                                <div class="row">
                                    <div class="col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                                <thead style="background-color:#17a2b8" >
                                                    <tr role="row">
                                                {{--  <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Responsable recepción</th> --}}
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Status: activate to sort column ascending" >Nro.</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Cod. Usuario </th>
                                                        <th style="color:#FFFFFF; "  class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending" >Fecha y Hora de registro</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Responsable de registro</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Usuario</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending">Matrícula</th>
                                                        
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Detalles</th>
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Condiciones</th>   
                                                        <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Guía</th>                                               
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @if(isset($ingresoscamal))
                                                        @foreach ($ingresoscamal as $ic)
                                                        <tr role="row" class="odd">
                                                        <td class="sorting_1">{{$ic->id}}</td>
                                                            <td class="sorting_1">{{$ic->codigo}}</td>
                                                            <td class="sorting_1">{{$ic->fecha_ingreso}}</td>
                                                            <td class="sorting_1">{{$ic->responsable_recepcion_datos}}</td>
                                                            <td class="sorting_1"> {{$ic->nombres}} {{$ic->apellidos}}   </td>   
                                                            <td class="sorting_1">
                                                            <?php $a= explode("_",$ic->matricula);
                                                            if($a[0]=="SI"){?>
                                                                 <span class="pull-right badge bg-yellow">  <?php echo $a[0]; ?></span>
                                                            <?php }else if($a[0]=="NO"){?>
                                                                <span class="pull-right badge bg-pink">  <?php echo $a[0]; ?></span>
                                                            <?php }?>
                                                            </td>  
                                                           <!--  <td class="sorting_1"><?php echo '$ ';?> {{$ic->costo_total}}      </td> -->
                                                            <td> 
                                                                <a href="" class="btn btn-danger waves-effect toastrDefaultSuccess" title="Ver detalles" data-backdrop="static" data-keyboard="false"
                                                                    data-nombres="{{$ic->nombres}} {{$ic->apellidos}}" data-guiados="{{$ic->codigo}}"  data-idd="{{$ic->id}}" data-lugar_procedencia="{{$ic->lugar_procedencia}}" 
                                                                    data-cedula="{{$ic->cedula}}" data-direccion="{{$ic->direccion}}" data-telefono="{{$ic->telefono}}" data-matricula="{{$a[0]}}" data-valor_matricula="{{$a[1]}}" 
                                                                    data-codigo="{{$ic->id}}" data-fecha_ingreso="{{$ic->fecha_ingreso}}" data-csmi="{{$ic->csmi}}" data-costo_total="{{$ic->costo_total}}" 
                                                                    data-toggle="modal" data-target="#modal" >
                                                                   <i> <img src="{{asset('assets/svg/paper.svg')}}"  Style="width:30px;"> </i>
                                                                </a>
                                                                
                                                          </td> 
                                                           <td>
                                                                  @if ($ic->validar_transporte==0)
                                                                  <a href="{{route('IngresoCamal.edit',$ic->id) }}" title="Registrar condiciones de ingreso"  
                                                                   >
                                                                       {{-- <i class="fas fa-clipboard-check"  aria-hidden="true"></i>  --}}
                                                                       <img src="{{asset('assets/svg/completed-task.svg')}}" Style="width:38px;">
                                                                    </a> 
                                                                
                                                                  @else
                                                                  <a href="{{route('IngresoCamal.edit',$ic->id) }}"  title="Ver condiciones de ingreso"
                                                                  class=" btn btn-success waves-effect"
                                                                        >
                                                                          <img src="{{asset('assets/svg/completed-task.svg')}}" Style="width:30px;">
                                                                    </a>  
                                                                  @endif   
                                                            </td>
                                                            <td> 
                                                            {{--     <a href="{{route('pdf-ingreso.show',$ic->id)}}" class=" btn btn-info waves-effect toastrDefaultSuccess"  
                                                                        title="Subir guía pdf" >
                                                                        <i class="fa fa-upload"></i>
                                                                 </a>  --}} 
                                                            @if ($ic->estado_pdf=="SI")
                                                                <a href="{{url('IngresoCamal/pdfdownload',$ic->id)}}" target="_blank" title="Ver documento guía" 
                                                                class="btn btn-warning waves-effect toastrDefaultSuccess" >
                                                                    <img  src="{{asset('assets/svg/pdf.svg')}}" Style="width:30px">
                                                                </a>     
                                                        @else
                                                          <a href="{{route('pdf-ingreso.show',$ic->id)}}" class="toastrDefaultSuccess"  
                                                                        title="Subir guía pdf" >
                                                                        <img class="img-fluid" src="{{asset('assets/svg/pdf.svg')}}" Style="width:38px;">  
                                                                 </a> 
                                                              
                                                          @endif
                                                          </td>
                                                        
                                                           
                                                        </tr>
                                                        @endforeach
                                                    @endif
                                                </tbody>
                                            </table>
                                            </div>   
                                </div>
                                <div class="row">

                                {{ $ingresoscamal->appends(['searchT' => $searchT])->links()}}
    
                                </div>    
                            </div>
                        </div>
                    </div>    
                </div> 
            </div>	
        </div>
    </div>	                     
@endsection
@push('scripts')
<script >
$('#modal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var idd = button.data('idd') 
          var nombres = button.data('nombres') 
          var cedula = button.data('cedula') 
          var direccion = button.data('direccion') 
          var codigo = button.data('codigo') 
          var telefono = button.data('telefono') 
          var matricula = button.data('matricula') 
          var valor_matricula = button.data('valor_matricula') 
          var fecha_ingreso = button.data('fecha_ingreso') 
          var lugar_procedencia = button.data('lugar_procedencia') 
          var costo_total = button.data('costo_total') 
          var guiados = button.data('guiados')
          var guia_movilizacion = button.data('csmi')             
          var modal = $(this)
          modal.find('.modal-body #nombres').val(nombres)
          modal.find('.modal-body #cedula').val(cedula)
          modal.find('.modal-body #direccion').val(direccion)
          modal.find('.modal-body #lugar_procedencia').val(lugar_procedencia)
          modal.find('.modal-body #idd').val(idd)
          modal.find('.modal-body #guiados').val(guiados)
          if(matricula=="SI"){
            modal.find('.modal-body #matricula').val(valor_matricula)
          }else {
            modal.find('.modal-body #matricula').val(valor_matricula) 
          }
          modal.find('.modal-body #telefono').val(telefono)
          modal.find('.modal-body #fecha_ingreso').val(fecha_ingreso)
          modal.find('.modal-body #costo_total').val(costo_total)
          modal.find('.modal-body #guia_movilizacion').val(guia_movilizacion)
          console.log(codigo);
          console.log(guia_movilizacion);
          detallesIngreso(codigo,costo_total) ;
          });

          
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


          //ORDENAR TABLA
  $('th').click(function() {
    var table = $(this).parents('table').eq(0)
    var rows = table.find('tr:gt(0)').toArray().sort(comparer($(this).index()))
    this.asc = !this.asc
    if (!this.asc) {
      rows = rows.reverse()
    }
    for (var i = 0; i < rows.length; i++) {
      table.append(rows[i])
    }
    setIcon($(this), this.asc);
  })

  function comparer(index) {
    return function(a, b) {
      var valA = getCellValue(a, index),
        valB = getCellValue(b, index)
      return $.isNumeric(valA) && $.isNumeric(valB) ? valA - valB : valA.localeCompare(valB)
    }
  }

  function getCellValue(row, index) {
    return $(row).children('td').eq(index).html()
  }

  function setIcon(element, asc) {
    $("th").each(function(index) {
      $(this).removeClass("sorting");
      $(this).removeClass("asc");
      $(this).removeClass("desc");
    });
    element.addClass("sorting");
    if (asc) element.addClass("asc");
    else element.addClass("desc");
  }

  
</script>
<style>
table tr th {
  cursor: pointer;
  -webkit-user-select: none;
  -moz-user-select: none;
  -ms-user-select: none;
  user-select: none;
}

/* .sorting {
  background-color: #D4D4D4;
}
 */
.asc:after {
  content: ' ↑';
}

.desc:after {
  content: " ↓";
}
</style>
@endpush