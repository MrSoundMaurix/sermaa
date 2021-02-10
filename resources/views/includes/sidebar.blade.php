<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
	<!-- Brand Logo -->
	<a href="../../index3.html" class="brand-link">
		<img src="{{asset('assets/img/sermaa-logo.png')}}"
			alt="SERMAA Logo"
			class="brand-image img-circle elevation-3"
			style="opacity: .8">
		<span class="brand-text font-weight-light">SERMAA</span>
	</a>

	<!-- Sidebar -->
	<div class="sidebar">
		<!-- Sidebar user (optional) -->
		<div class="user-panel mt-3 pb-3 mb-3 d-flex">
		<div class="image">
			@if(Auth::user()->foto == null)
			<img src="{{asset('assets/img/user.png')}}" class="img-circle elevation-2" alt="User Image"  class="img-circle elevation-2" alt="User Image">
			@else 
			<img src="{{ "data:image/" . Auth::user()->fototype . ";base64," . Auth::user()->foto }}" class="img-circle elevation-2" alt="User Image" >
			@endif
		  </div>

		<!-- 	<div class="image">
				<img src="{{asset('assets/img/avatar2.png')}}" class="img-circle elevation-2" alt="User Image">
			</div> -->
			<div class="info">
				<a href="#" class="d-block">{{ Auth::user()->nombres }}</a>
				 {{--dd( Auth::user()->currentTeam ) --}} 
			</div>
		</div>

		<!-- Sidebar Menu -->
		<nav class="mt-2">
			<ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
				<!-- Add icons to the links using the .nav-icon class
					with font-awesome or any other icon font library -->          
				@if (Auth::user()->currentTeam->name == "supervisor_mercado")
					
				<li class="nav-item menu-open has-treeview">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-circle"></i>
						<p>
						MERCADO
						<i class="right fas fa-angle-left"></i>
						</p>
					</a> 
					<ul class="nav nav-treeview">
						<li class="nav-item">
						 <a href="{{ url('usuarios-mercado') }}" class="nav-link {{ (request()->is('usuarios-mercado')||request()->is('usuarios-mercado/create')) ? 'active' : '' }}">
							<i class="fas fa-user nav-icon"></i>
							<p>Usuarios</p>
						</a>
						</li>
						<li class="nav-item">
						 <a href="{{ url('empleados-mercado') }}" class="nav-link {{ (request()->is('empleados-mercado')||request()->is('empleados-mercado/create') )? 'active' : '' }}">
							<i class="fas fa-user-tie nav-icon"></i>
							<p>Personal</p>
						</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('tipo-pago-mercado') }}" class="nav-link {{ (request()->is('tipo-pago-mercado')) ? 'active' : '' }}">
								<i class="fa fa-money-bill-alt nav-icon"></i>
								<p>Tipos de pago</p>
							</a>
						</li> 
						<li class="nav-item">
							<a href="{{ url('sector-mercado') }}" class="nav-link {{ (request()->is('sector-mercado')) ? 'active' : '' }}">
								<i class="fas fa-map-marker  nav-icon"></i>
								<p>Sectores</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="{{ url('puestos-mercado') }}" class="nav-link {{ (request()->routeIs('puestos-mercado.*')) ? 'active' : '' }}">
								<i class="fas fa-store nav-icon"></i>
								<p>Puestos</p>
							</a>
						</li>
						
						
						
						<li class="nav-item">                      
							<a href="{{ url('matriculas-mercado') }}" class="nav-link {{ (request()->routeIs('matriculas-mercado.*')
							||request()->routeIs('matriculas-mercado/create')) ? 'active' : '' }}">
								<i class="fab fa-medium-m nav-icon"></i>
								<p>Matrículas</p> 
							</a>
						</li>
						<li class="nav-item"> 
							<a href="{{ url('supervisormercado-fecha/index2') }}" class="nav-link {{ (request()->is('supervisormercado-fecha/index2')) ? 'active' : '' }}">
								<i class="fas fa-calendar-alt nav-icon"></i>
								<p>Fecha de matrícula</p>
							</a>
						</li> 
					</ul> 
					
				</li>
				@endif

				@if (Auth::user()->currentTeam->name == "operario_camal")
				<li class="nav-item menu-open has-treeview	">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-industry"></i>
						<p>
						CAMAL
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ url('animal-camal') }}" class="nav-link {{ (request()->is('animal-camal')) ? 'active' : '' }}">
							<i class="fas fa-weight nav-icon"></i>
								<p>Pesos/ Animales</p>
							</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="{{ url('distribucion-camal') }}" class="nav-link {{ (request()->is('distribucion-camal')) ? 'active' : '' }}">
							<i class="fas fa-truck-loading  nav-icon"></i>
								<p>Distribuir</p>
							</a>
						</li>
						<li class="nav-item has-treeview">
							<a href="{{ url('distribuciones-camal') }}" class="nav-link {{ (request()->is('distribuciones-camal')) ? 'active' : '' }}">
							<i class="fas fa-truck-loading  nav-icon"></i>
								<p>Distribuciones</p>
							</a>
						</li>
					</ul>
				</li>
				@endif
				@if (Auth::user()->currentTeam->name == "supervisor_camal")
					
				<li class="nav-item menu-open has-treeview	">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-industry"></i>
						<p>
						CAMAL
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item"> 
							<a href="{{ url('usuarios-camal') }}" class="nav-link {{ (request()->is('usuarios-camal')||request()->is('usuarios-camal/create')) ? 'active' : '' }}">
								<i class="fas fa-user nav-icon"></i>
								<p>Ganaderos / Porcicultores</p>
							</a>
						</li>

						<li class="nav-item has-treeview"> 
							<a href="{{ url('usuarios') }}" class="nav-link {{ (request()->is('usuarios')||request()->is('usuarios/create')) ? 'active' : '' }}">
							<i class="fas fa-user-tie nav-icon"></i>
								<p>Personal del Camal</p>
							</a>
						</li>
						
						<li class="nav-item">
							<a href="{{ url('costo-faenamiento') }}" class="nav-link {{ (request()->is('costo-faenamiento')) ? 'active' : '' }}">
							<i class="fas fa-donate nav-icon"></i>
								<p>Costos de  faenamiento</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('costo-camal') }}" class="nav-link {{ (request()->is('costo-camal')) ? 'active' : '' }}">
								<i class="fas fa-donate nav-icon"></i>
								<p>Costos adicionales</p>
							</a>
						</li>
						<li class="nav-item"> 
							<a href="{{ url('supervisorcamal-fecha') }}" class="nav-link {{ (request()->is('supervisorcamal-fecha')) ? 'active' : '' }}">
								<i class="fas fa-calendar-alt nav-icon"></i>
								<p>Fecha de matrícula</p>
							</a>
						</li> 
						<li class="nav-item"> 
							<a href="{{ url('matricula-camal') }}" class="nav-link {{ (request()->is('matricula-camal')) ? 'active' : '' }}">
								
								<i class="fas fa-file-signature nav-icon"></i>
								<p>Matrícula y reporte</p>
							</a>
						</li>
						<li class="nav-item"> 
							<a href="{{ url('supervisorcamal-ingresos-camal') }}" class="nav-link {{ (request()->is('supervisorcamal-ingresos-camal')) ? 'active' : '' }}">
								<i class="fas fa-history nav-icon"></i>
								<p>Reporte registro de guía</p>
							</a>
						</li>
						 <li class="nav-item"> 
							<a href="{{ url('supervisorcamal-distribucion') }}" class="nav-link {{ (request()->is('supervisorcamal-distribucion')) ? 'active' : '' }}">
								<i class="fas fa-history nav-icon"></i>
								<p>Reporte distribución</p>
							</a>
						</li> 
					
					</ul>
				</li>
				
				@endif
				@if (Auth::user()->currentTeam->name == "superadmin")
					
					<li class="nav-item menu-open has-treeview	">
						<a href="#" class="nav-link active">
							<i class="nav-icon fas fa-industry"></i>
							<p>
							SUPERADMINISTRADOR
							<i class="right fas fa-angle-left"></i>
							</p>
						</a>
						<ul class="nav nav-treeview">
							<li class="nav-item has-treeview"> 
								<a href="{{ url('superadmin-personal') }}" class="nav-link {{ (request()->is('superadmin-personal')||request()->is('superadmin-personal/create')) ? 'active' : '' }}">
								<i class="fas fa-user nav-icon"></i>
									<p>Personal del Camal</p>
								</a>
							</li> 
							<li class="nav-item has-treeview"> 
								<a href="{{ url('superadmin-personal-mercado') }}" class="nav-link {{ (request()->is('superadmin-personal-mercado')||request()->is('superadmin-personal-mercado/create')) ? 'active' : '' }}">
								<i class="fas fa-user-tie nav-icon"></i>
									<p>Personal del Mercado</p>
								</a>
							</li> 
							<li class="nav-item has-treeview"> 
								<a href="{{ url('usuarios-rol') }}" class="nav-link {{ (request()->is('usuarios-rol')||request()->is('usuarios-rol/create')) ? 'active' : '' }}">
								<i class="fas fa-users nav-icon"></i>
									<p>Usuarios-Roles</p>
								</a>
							</li>
							<li class="nav-item"> 
								<a href="{{ url('superadmin-personal/show') }}" class="nav-link {{ request()->is('superadmin-personal/show')? 'active' : '' }}">
									<i class="fas fa-user-times nav-icon"></i>
									<p>Usuarios Eliminados</p>
								</a>
						    </li>
						
						</ul>	
						</ul>
					</li>
					
					@endif
				@if (Auth::user()->currentTeam->name == "administrador_camal")
					
				<li class="nav-item menu-open has-treeview	">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-industry"></i>
						<!-- <i class="fas fa-industry"></i> -->
						<p>
						CAMAL
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">

						 
						<li class="nav-item has-treeview">
							<a href="{{ url('administrador-camal') }}" class="nav-link {{ (request()->is('administrador-camal')) ? 'active' : '' }}">
								<i class="fas fa-address-card nav-icon"></i>
								<p>Registrar guía</p>
							</a>
						</li>
						<li class="nav-item"> 
							<a href="{{ url('IngresoCamal') }}" class="nav-link {{ (request()->is('IngresoCamal')
							||request()->is('/pdf-ingreso/')) ? 'active' : '' }}">
							<i class="fas fa-history nav-icon"></i>
								<p>Historial registro</p>
							</a>
						</li>
					
					 	
						<!-- <li class="nav-item">
							<a href="{{ url('animal-camal') }}" class="nav-link {{ (request()->is('animal-camal')) ? 'active' : '' }}">
								<i class="fas fa-map-marker  nav-icon"></i>
								<p>Estadísticas Anuales</p>
							</a>
						</li> -->
						 
					</ul>
					
				</li>
				@endif
				@if (Auth::user()->currentTeam->name == "cliente_camal")
					
				<li class="nav-item menu-open has-treeview	">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-industry"></i>
						<p>
						CAMAL
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">

						 
						<li class="nav-item has-treeview">
							<a href="{{ url('cliente-camal') }}" class="nav-link {{ (request()->is('cliente-camal')) ? 'active' : '' }}">
								<i class="fas fa-archive nav-icon"></i>
								
								<p>Stock cuarto frío</p>
							</a>
						</li> 
						<li class="nav-item">
							<a href="{{ url('cliente-historial-entrega-camal') }}" class="nav-link {{ (request()->is('cliente-historial-entrega-camal')||request()->is('historial_entrega_detalles')) ? 'active' : '' }}">
								<i class="fas fa-truck-loading  nav-icon"></i> 
								
								<p>Historial de entrega</p>
							</a>
						</li>
 
						<li class="nav-item has-treeview">
							<a href="{{ url('cliente-historial-ingreso') }}" class="nav-link {{ (request()->is('cliente-historial-ingreso')||request()->is('cliente-historial-ingreso/show')) ? 'active' : '' }}" >
								<i class="fas fa-weight nav-icon"></i>
								<p>Historial de registro</p>
							</a>
						</li>
						
					 	
						<!-- <li class="nav-item">
							<a href="{{ url('animal-camal') }}" class="nav-link {{ (request()->is('animal-camal')) ? 'active' : '' }}">
								<i class="fas fa-map-marker  nav-icon"></i>
								<p>Estadísticas Anuales</p>
							</a>
						</li> -->
						 
					</ul>
					
				</li>
				@endif
				@if (Auth::user()->currentTeam->name == "gerente")
					
				<li class="nav-item menu-open has-treeview	">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-industry"></i>
						<p>
						CAMAL
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
						 <a href="{{ url('gerente-camal') }}" class="nav-link {{ (request()->is('gerente-camal')) ? 'active' : '' }}">
							<i class="fas fa-home nav-icon"></i>
							<p>REPORTE</p>
						</a>
						</li>
						<li class="nav-item">
						 <a href="{{ url('gerentecosto-camal') }}" class="nav-link {{ (request()->is('gerentecosto-camal')) ? 'active' : '' }}">
						 <i class="fas fa-donate nav-icon"></i>
							<p>COSTOS DEL CAMAL</p>
						</a>
						</li>

						<li class="nav-item has-treeview">
							<a href="{{ url('/video-vigilancia') }}" class="nav-link {{ (request()->is('video-vigilancia')) ? 'active' : '' }}">
								<i class="fas fa-video nav-icon"></i>
								<p>VIDEO VIGILANCIA CAMAL</p>
							</a>
						</li>

						<!-- <li class="nav-item has-treeview">
							<a href="{{ url('') }}" class="nav-link {{ (request()->is('')) ? 'active' : '' }}">
								<i class="fas fa-store nav-icon"></i>
							
								<p>MERCADO</p>
							</a>
						</li> -->
					</ul>
				</li>
				<li class="nav-item menu-open has-treeview	">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-industry"></i>
						<p>
						MERCADO
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
					<li class="nav-item">
						 <a href="{{ url('gerente-mercado/calculos') }}" class="nav-link {{ (request()->is('gerente-mercado/calculos')) ? 'active' : '' }}">
						 <i class="fas fa-store nav-icon"></i>
							<p>REPORTE</p>
						</a>
						</li>
						<li class="nav-item">
						 <a href="{{ url('gerente-mercado') }}" class="nav-link {{ (request()->is('gerente-mercado')) ? 'active' : '' }}">
							<i class="fab fa-product-hunt nav-icon"></i>
							<p>PARAMETRIZACIONES</p>
						</a>
						</li>
						
					</ul>
				</li>
				@endif
				@if (Auth::user()->currentTeam->name == "operario_mercado")
				<li class="nav-item menu-open has-treeview">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-industry"></i>
						<p>
						MERCADO
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
					<li class="nav-item">
							<a href="{{ url('pagos-puesto-mercado') }}" class="nav-link {{ (request()->is('pagos-puesto-mercado')) ? 'active' : '' }}">
								<i class="fas fa-dollar-sign nav-icon"></i>
								<p>Pagos puesto mercado</p>
							</a>
						</li>
					</ul>
					
				</li>
				@endif
				@if (Auth::user()->currentTeam->name == "usuario-mercado")
					
				<li class="nav-item menu-open has-treeview	">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-industry"></i>
						<p>
						MERCADO
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">

						 
						<li class="nav-item has-treeview">
							<a href="{{ url('cliente-mercado') }}" class="nav-link {{ (request()->is('cliente-mercado')) ? 'active' : '' }}">
								<i class="fas fa-archive nav-icon"></i>
								
								<p>Puestos</p>
							</a>
						</li> 
						<li class="nav-item">
							<a href="{{ url('cliente-mercado/show') }}" class="nav-link {{ (request()->is('cliente-mercado/show')) ? 'active' : '' }}">
								<i class="fas fa-history nav-icon"></i> 
								
								<p>Historial de matrículas</p>
							</a>
						</li>
 
						<li class="nav-item has-treeview">
							<a href="{{ url('cliente-mercado-pagos') }}" class="nav-link {{ (request()->is('cliente-mercado-pagos')) ? 'active' : '' }}" >
								<i class="fas fa-history nav-icon"></i>
								<p>Historial de pagos</p>
							</a>
						</li>
										 
					</ul>
					
				</li>
				@endif
				@if (Auth::user()->currentTeam->name == "veterinario")
				<li class="nav-item menu-open has-treeview">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-industry"></i>
						<p>
						Veterinario
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
						 <a href="{{ url('antemorten') }}" class="nav-link {{ (request()->is('antemorten')) ? 'active' : '' }}">
							<i class="fas fa-user nav-icon"></i>
							<p>Antemorten</p>
						</a>
						</li>

					
					</ul>
					
				</li>
				<li class="nav-item menu-open has-treeview	">
					<a href="#" class="nav-link active">
						<i class="nav-icon fas fa-industry"></i>
						<p>
						REPORTES
						<i class="right fas fa-angle-left"></i>
						</p>
					</a>
						<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="{{ url('excel-condiciones-transporte') }}" class="nav-link {{ (request()->is('excel-condiciones-transporte')) ? 'active' : '' }}">
								<i class="fas fa-list-alt  nav-icon"></i>
								<p>Condiciones de transporte de animales</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="{{ url('excel-recepcion-animal') }}" class="nav-link {{ (request()->is('excel-recepcion-animal')) ? 'active' : '' }}">
								<i class="fas fa-list-alt  nav-icon"></i>
								<p>Recepción animales</p>
							</a>
						</li>
					</ul>
				</li>

				
				
				@endif
			</ul>
		</nav>
		<!-- /.sidebar-menu -->
	</div>
	<!-- /.sidebar -->
</aside>