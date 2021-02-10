
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
											            <h3 class="card-title" >PERFIL</h3>
									              </span>		
								              </div>
							              </div>   
                          </div>
                          <div class="card-body">
                          <div class="row">
  		<div class="col-sm-10"><h1><?php echo Auth::user()->nombres.',';?></h1></div>
    
    </div>
    <div class="row">
  		<div class="col-sm-4"><!--left col-->
              

      <div class="text-center">
      @if(Auth::user()->foto == null)
      <img src="{{asset('assets/img/user.png')}}" style="max-width:250px;" class="avatar img-circle img-thumbnail" alt="avatar">
      @else 
          <img src="{{ "data:image/" . Auth::user()->fototype . ";base64," . Auth::user()->foto }}" style="max-width:250px;">
          @endif
      
       <!--  <h6>Upload a different photo...</h6> -->
       <!--  <input type="file" class="text-center center-block file-upload"> -->
      </div></hr><br>

               
          <div class="panel panel-default">
            <!-- <div class="panel-heading">Website <i class="fa fa-link fa-1x"></i></div>
            <div class="panel-body"><a href="http://bootnipets.com">bootnipets.com</a></div> -->
          </div>
          
          
          <ul class="list-group">
            <li class="list-group-item text-muted">SERMAA <i class="fa fa-dashboard fa-1x"></i></li>
            <li class="list-group-item text-center"><span class="pull-left"><strong>Rol: </strong></span>
             <?php 
             if (Auth::user()->current_team_id == 2) { //2=> (rol)gerente
             echo "GERENTE SERMAA";
              } elseif (Auth::user()->current_team_id == 3) { //3=> (rol)supervisor_camal
                echo "SUPERVISOR DEL CAMAL";
              } else if (Auth::user()->current_team_id == 4) { //4=> (rol)operario_camal
                echo "FAENADOR";
              } else if (Auth::user()->current_team_id == 5) { //5=> (rol)administrador_camal
                echo "ADMINISTRADOR DEL CAMAL";
              } else if (Auth::user()->current_team_id == 9) { //9=> (rol)veterinario
                echo "VETERINARIA";
              } else if (Auth::user()->current_team_id == 8) { //8=> (rol)cliente_camal
                echo "CLIENTE CAMAL";
              } else if (Auth::user()->current_team_id == 1) { //1=> (rol)superadmin-personal
                echo "SUPER ADMINISTRADOR";
              }else if (Auth::user()->current_team_id == 10) { //10=> (rol)usuario-mercado
                echo "USUARIO DEL MERCADO";  // operario_camal
              }else if (Auth::user()->current_team_id == 7) { //4=> (rol)operario_mercado
                echo "RECAUDADOR DEL MERCADO";  // 
              }
              else if (Auth::user()->current_team_id == 6) { //4=> (rol)supervisor_mercado
                echo "SUPERVISOR DEL MERCADO";  // 
        }?>
             
             
             
             
             
             
             
             
             </li>
            <?php if(Auth::user()->estado_matricula==true&& Auth::user()->current_team_id==8||Auth::user()->estado_matricula==true&& Auth::user()->current_team_id==10){?>
              <li class="list-group-item text-center"><span class="pull-left"><strong>Matricula:</strong></span>
              <span class="pull-right badge bg-yellow">  <?php echo "SI"; ?></span>                                                                                                               
           <?php }else if(Auth::user()->estado_matricula==false&& Auth::user()->current_team_id==8||Auth::user()->estado_matricula==false&& Auth::user()->current_team_id==10){;?>
            <li class="list-group-item text-center"><span class="pull-left"><strong>Matricula:</strong></span>
              <span class="pull-right badge bg-pink">  <?php echo "NO"; ?></span>     
           <?php }else{?>
            <li class="list-group-item text-center"><span class="pull-left"><strong>Matricula:</strong></span>
              <span class="pull-right badge bg-pink">  <?php echo "NO APLICA"; ?></span> 
           <?php }?></li>
           <!--  <li class="list-group-item text-right"><span class="pull-left"><strong>Posts</strong></span> 37</li>
            <li class="list-group-item text-right"><span class="pull-left"><strong>Followers</strong></span> 78</li> -->
          </ul> 
               
         <!--  <div class="panel panel-default">
            <div class="panel-heading">Social Media</div>
            <div class="panel-body">
            	<i class="fa fa-facebook fa-2x"></i> <i class="fa fa-github fa-2x"></i> <i class="fa fa-twitter fa-2x"></i> <i class="fa fa-pinterest fa-2x"></i> <i class="fa fa-google-plus fa-2x"></i>
            </div>
          </div> -->
          
        </div><!--/col-3-->
    	<div class="col-sm-8">
          <nav> 
            <div class="nav nav-tabs " id="nav-tab" role="tablist">
                <a class="nav-item nav-link active" id="home" data-toggle="tab" href="#nav-home" role="tab" aria-controls="nav-home" aria-selected="true">Información personal</a>
            </div>
          </nav>
              
          <div class="tab-content" id="nav-tabContent">
            <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home">
                <hr>
                {!!Form::open(array('url'=>'profile','method'=>'POST','autocomplete'=>'off'))!!} 
                {{Form::token()}}
                @csrf
                @method('POST')
                   <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                         
                          
                          <div class="col-xs-6">
                              <label for="first_name"><h4>Nombres</h4></label>
                              <span class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="fa fa-address-book text-info"></i>
																		</span>
                                    <input readonly type="text" class="form-control" name="first_name" id="first_name" value="<?php echo Auth::user()->nombres;?>" title="enter your first name if any.">
																	</span>
                             
                          </div>
                      </div>
                    </div>
                    <div class="col-lg-6">  
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="last_name"><h4>Apellidos</h4></label>
                               <span class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="fa fa-address-book text-info"></i>
																		</span>
                              <input readonly type="text" class="form-control" name="last_name" id="last_name" value="<?php echo Auth::user()->apellidos;?>" title="enter your last name if any.">
                              </span>
                          </div>
                      </div>
                     </div> 
                    </div> 
                    <div class="row">
                    <div class="col-lg-6">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="phone"><h4>CI</h4></label>
                              <span class="input-group-prepend">
																		<span class="input-group-text">
																			<a class="text-info">CI</a>
																		</span>
                                     <input readonly type="text" class="form-control" name="phone" id="phone" value="<?php echo Auth::user()->cedula;?>" title="enter your phone number if any.">
                              </span> 
                          </div>
                      </div>
                     </div>
                     <div class="col-lg-6">
                      <div class="form-group">
                          <div class="col-xs-6">
                             <label for="mobile"><h4>Código</h4></label>
                             <span class="input-group-prepend">
																		<span class="input-group-text">
																			<a class="text-info">#</a>
                                      </span>
                              <input readonly  type="text" class="form-control" name="mobile" id="mobile" value="<?php echo Auth::user()->codigo;?>" title="enter your mobile number if any.">
                             </span>
                          </div>
                      </div>
                    </div>
                    </div>  
                    <div class="row">
                      <div class="col-lg-6">
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                                <label for="email"><h4>Email</h4></label>
                                <span class="input-group-prepend">
																		<span class="input-group-text">
																			<a class="text-info">@</a>
                                      </span>
                                <input readonly type="email" class="form-control" name="email" id="email" value="<?php echo Auth::user()->email;?>" title="enter your email.">
                            </span>
                            </div>
                        </div>
                      </div>
                      <div class="col-lg-6">  
                        <div class="form-group">
                            
                            <div class="col-xs-6">
                                <label for="email"><h4>Dirección</h4></label>
                                <span class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="fa fa-map-marker text-info"></i>
                                      </span>
                                <input readonly type="email" class="form-control" id="location" value="<?php echo Auth::user()->direccion;?>" title="enter a location">
                              </span>
                            </div>
                        </div>
                      </div>
                    </div>  
                    <div class="row">
                      <div class="col-lg-6">
                      <div class="form-group">
                          
                          <div class="col-xs-6">
                              <label for="password"><h4>Password</h4></label>
                              <input name="id_users" value="<?php echo Auth::id(); ?>" type="hidden"></input>
                              <span class="input-group-prepend">
																		<span class="input-group-text">
																			<i class="fas fa-lock text-info"></i>
                                      </span>
                              <input required type="password" class="form-control" name="password" id="password" placeholder="password" title="enter your password.">
                          </span>
                          
                          </div>
                      </div>
                     <!--  <div class="form-group">
                          
                          <div class="col-xs-6">
                            <label for="password2"><h4>Verify</h4></label>
                              <input type="password" class="form-control" name="password2" id="password2" placeholder="password2" title="enter your password2.">
                          </div>
                      </div> -->
                      </div>
                      <div class="col-lg-6">
                      <div class="form-group">
                           <div class="col-xs-12">
                                <label>Cambiar</label>
                                <span class="input-group-prepend">
                                  <button style="with:40%"class="btn btn-lg btn-info" type="submit"><i class="glyphicon glyphicon-ok-sign"></i> Cambiar contraseña</button>
                                <!--  	<button class="btn btn-lg" type="reset"><i class="glyphicon glyphicon-repeat"></i> Reset</button> -->
                                 </span>
                            </div>
                      </div>
                     </div>
                     </div> 
                     {!!Form::close()!!}		
              
              <hr>
              
            </div><!--/tab-pane-->
            </div>
            </div>

           </div><!--/col-9-->      
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
