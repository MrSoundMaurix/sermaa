
@extends('layouts.applte') 
@section('contenido')

    <div class="content-wrapper">
            <!--Content Header (Page header)-->
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
											<h3 class="card-title" >USUARIOS REGISTRADOS</h3>
									</span>		
								</div>
							</div>   
                        </div>
                        <div class="card-body">
                            <div class="row">
                              <div class="col-sm-4 " style="text-align:right">
                              </div>
                                <div class="col-sm-4 " style="text-align:right">
                                @include('camal/administrador-camal/search')
                                           
                                </div>
                            </div>    
                               
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="table-responsive">
                                        <table class="table table-striped table-bordered datatable dataTable no-footer table-hover text-nowrap" id="DataTables_Table_0" role="grid" aria-describedby="DataTables_Table_0_info" style="border-collapse: collapse !important">
                                            <thead style="background-color:#17a2b8" >
                                                <tr role="row">
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Nombre: activate to sort column ascending">Código</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Date registered: activate to sort column ascending" >Nombres y apellidos</th>    
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" >Matrícula</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" >Cédula</th>                                                  
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" >Teléfono</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Role: activate to sort column ascending" >Dirección</th>
                                                    <th style="color:#FFFFFF; " class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1" colspan="1" aria-label="Actions: activate to sort column ascending" >Opción</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @if(isset($usuarioscamal))
                                                    @foreach ($usuarioscamal as $uc)
                                                    <tr role="row" class="odd">
                                                        <td class="sorting_1">{{$uc->codigo}}</td>
                                                        <td class="sorting_1">{{$uc->nombres}} {{$uc->apellidos}}</td>
                                                        <td class="sorting_1">
                                                        <?php $i=0; 
                                                        foreach($id_usuariosmatriculados as $um){
                                                         if($um->id_users==$uc->id ){ $i=$i+1; } }?>
                                                        @if($i==1)  
                                                                  <span class="pull-right badge bg-yellow">  <?php echo 'SI'; ?></span>         
                                                          @else  
                                                                  <span class="pull-right badge bg-pink">  <?php echo 'NO' ?></span>        
                                                        @endif 
                                                        </td> 
                                                        <td class="sorting_1">{{$uc->cedula}}</td>
                                                        <td class="sorting_1">{{$uc->telefono}}</td>
                                                        <td class="sorting_1">{{$uc->direccion}}</td>   
                                                        <td>                                                              
                                                            <a href="maestro-detalleIngreso/create?id={{$uc->id}}" class="btn btn-info btn-rounded waves-effect" title="Añadir Nuevo Ingeso">
                                                                <span class="fa fa-plus-square"></span> Registrar Guía
                                                            </a> 
                                                        
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                @endif
                                            </tbody>
                                        </table>
                                        </div>      
                            </div>
                            <div class="row">
                        
                              <!-- <div class="pagination-wrapper"> {!! $usuarioscamal->appends(['search' => Request::get('search')])->render() !!} </div>
                                </div>  -->
                                {{ $usuarioscamal->appends(['searchT' => $searchT])->links()}}
                                
                               

                                
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


    <script type="text/javascript">
        function handleSelect(elm){
            window.location = elm.value+"";
        }
        //-----ELIMINAR USUARIO CAMAL----------------------------
        $(document).ready(function () {
       $('#deleteUsuarioCamalModal').on('show.bs.modal', function (event) {
           var button = $(event.relatedTarget);
           var action = button.data('action');
           var nombres = button.data('nombres');
           var apellidos = button.data('apellidos');
          
           var modal = $(this);
           modal.find(".modal-content #txtEliminar").html("¿Está seguro de eliminar el Usuario <b>" + nombres + "</b>?");
          
           modal.find(".modal-content form").attr('action', action);
       });
     });
     
     $('#editUsuarioCamalModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var id = button.data('id') 
          var nombres = button.data('nombres') 
          var apellidos = button.data('apellidos') 
          var cedula = button.data('cedula') 
          var direccion = button.data('direccion') 
          var telefono = button.data('telefono') 
          var codigo = button.data('codigo') 
          
          var modal = $(this)
          modal.find(".modal-body #id").val(id);
          modal.find('.modal-body #nombres').val(nombres)
          modal.find(".modal-body #apellidos").val(apellidos);
          modal.find('.modal-body #cedula').val(cedula)
          modal.find('.modal-body #telefono').val(telefono)
          modal.find('.modal-body #direccion').val(direccion)
          modal.find('.modal-body #codigo').val(codigo)
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


    </script>


@endpush
