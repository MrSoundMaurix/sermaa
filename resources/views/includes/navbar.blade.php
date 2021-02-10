<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-white navbar-light">
	<ul class="navbar-nav">
		<li class="nav-item">
			<a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
		</li>
	</ul>

	<ul class="navbar-nav ml-auto">      
		<li class="nav-item dropdown">
			<a class="nav-link" data-toggle="dropdown" href="#">
				{{ Auth::user()->email }}
			</a>
			<div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">          
				<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{ url('/profile') }}"><i class="fa fa-user text-info"></i> Perfil</a>
					<?php $teams = DB::table('team_user')->where('user_id',Auth::id())->get(); ?>
                @foreach($teams as $t)
					@if(Auth::user()->currentTeam->id==$t->team_id)
					@else	
						<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="{{ url('/cambiar-rol',['id_user'=>Auth::id(),'id_team'=>$t->team_id]) }}">
							 <i class="fas fa-user-tie text-info"></i>
								@if($t->team_id==2) <?php echo "Ingresar como gerente";?>  @endif
								@if($t->team_id==3) <?php echo "Ingresar como Supervisor";?>  @endif
								@if($t->team_id==4) <?php echo "Ingresar como Faenador";?>   @endif
								@if($t->team_id==5) <?php echo "Ingresar como Administrador";?>   @endif
								@if($t->team_id==9) <?php echo "Ingresar como Veterinario";?>   @endif
								@if($t->team_id==6) <?php echo "Ingresar como Supervidor";?>   @endif
								@if($t->team_id==7) <?php echo "Ingresar como Recaudador";?>   @endif
							 </a> 
					@endif
				@endforeach
				<div class="dropdown-divider"></div>
					<a class="dropdown-item" href="{{ route('logout') }}" 
						onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
						<i class="fas fa-sign-out-alt text-info"></i> Cerrar Sesión
					</a>            
					<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
						@csrf
					</form>
			</div>
		</li>
	</ul>
</nav>
<!-- /.navbar -->