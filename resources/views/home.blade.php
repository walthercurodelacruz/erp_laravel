<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title></title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.0-2/css/all.min.css">
    <link href='https://unpkg.com/boxicons@2.0.9/css/boxicons.min.css' rel='stylesheet'>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" charset="utf-8"></script>
</head>
<body>
    <!--wrapper start-->
    <div class="wrapper">
        <!--header menu start-->
        <div class="header">
            <div class="header-menu">
                <div class="title"><span>SENATI</span></div>
                <div class="sidebar-btn">
                    <i class="fas fa-bars"></i>
                </div>
                <ul>
                    <li>
                    	<a href="{{ route('logout') }}" 
							onclick="event.preventDefault(); 
									document.getElementById('logout-form').submit();">
		                    <i class='fas fa-power-off' id="log_out"></i>
		                </a>
		                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
		                @csrf
		                </form>
		            </li>
                </ul>
            </div>
        </div>
        <!--header menu end-->

        <!--sidebar start-->
	    <div class="side-bar">
			<div class="menu">
				<!-- <div class="item">
					<a href="{{route('dashboard')}}">
						<i class="fas fa-desktop"></i><span>Dashboard</span>
					</a>
				</div> -->
				<!-- <div class="item">
					<a href="{{route('Producto.index')}}">
						<i class="bx bxs-package"></i><span>Productos/Servicios</span>
					</a>
				</div> -->
				<div class="item">
					<a href="{{route('Proveedor.index')}}">
						<i class="bx bxs-truck"></i>Proveedores
					</a>
				</div>
				<div class="item">
					<a href="{{route('Cliente.index')}}">
						<i class="bx bxs-group"></i>Clientes
					</a>
				</div>
				<div class="item">
					<a class="sub-btn">
						<i class="bx bx-analyse"></i>Ventas<i class="fas fa-angle-right dropdown"></i>
					</a>
					<div class="sub-menu">
						<a href="{{route('Cotizacion.index')}}" class="sub-item"><i class="fas fa-address-card"></i><span>Cotización</span></a>
						<a href="{{route('Occliente.index')}}" class="sub-item"><i class="fas fa-address-card"></i><span>OC Clientes</span></a>
						<a href="{{route('Producto.index')}}"><i class="bx bxs-package"></i><span>Productos/Servicios</span></a>
					</div>
				</div>
				<div class="item">
					<a class="sub-btn">
						<i class="bx bx-analyse"></i>Facturas<i class="fas fa-angle-right dropdown"></i>
					</a>
					<div class="sub-menu">
							<a href="{{route('Ftin.index')}}" class="sub-item"><i class="fas fa-info-circle"></i><span>Facturas Recibidas</span></a>
							<a href="{{route('Ftout.index')}}" class="sub-item"><i class="fas fa-info-circle"></i><span>Facturas Emitidas</span></a>
							<a href="{{route('Guia_In.index')}}" class="sub-item"><i class="fas fa-address-card"></i><span>Registro de guias de entrada</span></a>
							<a href="{{route('Guia_Sa.index')}}" class="sub-item"><i class="fas fa-address-card"></i><span>Registro de guias de salida</span></a>
					</div>
				</div>
				<div class="item">
					<a class="sub-btn">
						<i class="bx bx-analyse"></i>Operaciones<i class="fas fa-angle-right dropdown"></i>
					</a>
					<div class="sub-menu">
						<a href="{{route('Evaluaciones_vista')}}" class="sub-item"><i class="fas fa-address-card"></i><span>Evaluaciones</span></a>
						<a href="{{route('Evaluaciones_vista_eva')}}" class="sub-item"><i class="fas fa-address-card"></i><span>Ordenes de trabajo</span></a>
					</div>
				</div>
				<div class="item">
					<a class="sub-btn">
						<i class="bx bx-analyse"></i>Logística<i class="fas fa-angle-right dropdown"></i>
					</a>
					<div class="sub-menu">
							<a href="{{route('Opedido.index')}}" class="sub-item"><i class="fas fa-address-card"></i><span>Orden de pedido</span></a>
							<a href="{{route('Compras.index')}}" class="sub-item"><i class="fas fa-info-circle"></i><span>Listado</span></a>
							<a href="{{route('OcProveedor.index')}}" class="sub-item"><i class="fas fa-info-circle"></i><span>OC Proveedor</span></a>
					</div>
				</div>
                @can('ver-user')
				<div class="item">
					<a class="sub-btn">
						<i class="fas fa-user-circle"></i>Admin<i class="fas fa-angle-right dropdown"></i>
					</a>
					<div class="sub-menu">
                        <a class="sub-item" href="{{route('User-admin.index')}}"><i></i><span>CRUD Usuarios</span></a>
                        <a class="sub-item" href="{{route('Proveedor.index')}}"><i></i><span>CRUD Proveedores</span></a>
                        <a class="sub-item" href="{{route('Cliente.index')}}"><i></i><span>CRUD Clientes</span></a>
                        <a class="sub-item" href="{{route('Producto.index')}}"><i></i><span>CRUD P/S</span></a>
                        <a class="sub-item" href="{{route('EstadoCot.index')}}"><i></i><span>CRUD Estado [COT]</span></a>
                        <a class="sub-item" href="{{route('FPagoCot.index')}}"><i></i><span>CRUD Forma de pago [COT]</span></a>
                        <a class="sub-item" href="{{route('MonedaCot.index')}}"><i></i><span>CRUD Moneda [COT]</span></a>
                        <a class="sub-item" href="{{route('TEntregaCot.index')}}"><i></i><span>CRUD Tiempo de entrega [COT]</span></a>
                        <a class="sub-item" href="{{route('ExpiraCot.index')}}"><i></i><span>CRUD Validez de la oferta [COT]</span></a>
                        <a class="sub-item" href="{{route('CondicionGral.index')}}"><i></i><span>CRUD Condicion general</span></a>
                        <a class="sub-item" href="{{route('PieCot.index')}}"><i></i><span>CRUD Pie de pagina</span></a>
                        <a class="sub-item" href="{{route('Igv.index')}}"><i></i><span>CRUD IGV</span></a>
                        <a class="sub-item" href="{{route('Estado.index')}}"><i></i><span>CRUD Estado [CLIE/PROV]</span></a>
                        <a class="sub-item" href="{{route('Area.index')}}"><i></i><span>CRUD Areas contacto[CLIE]</span></a>
                        <a class="sub-item" href="{{route('Categorias.index')}}"><i></i><span>CRUD Categorias [PROD]</span></a>
                        <a class="sub-item" href="{{route('Cargo.index')}}"><i></i><span>CRUD Cargos [USER]</span></a>
                        <a class="sub-item" href="{{route('roles.index')}}"><i></i><span>CRUD Roles [USER]</span></a>
                        <a class="sub-item" href="{{route('permisos.index')}}"><i></i><span>CRUD Permisos [ROLES]</span></a>
                        <a class="sub-item" href="{{route('EstadoOcp.index')}}"><i></i><span>CRUD Estado [OCP]</span></a>
                        <a class="sub-item" href="{{route('Almacen.index')}}"><i></i><span>CRUD Almacen</span></a>
                        <a class="sub-item" href="{{route('Fabricante.index')}}"><i></i><span>CRUD Fabricante</span></a>
                        <a class="sub-item" href="{{route('Lote.index')}}"><i></i><span>CRUD Lote</span></a>
                        <a class="sub-item" href="{{route('Modelo.index')}}"><i></i><span>CRUD Modelo</span></a>
                        <a class="sub-item" href="{{route('Unidad_M.index')}}"><i></i><span>CRUD Unidad_M</span></a>
					</div>
				</div>
				@endcan
			</div>
		</div>
        <!--sidebar end-->
        <!--main container start-->
        <div class="main-container">
            @yield('content')
        </div>
        <!--main container end-->
    </div>

<script type="text/javascript">
	$(document).ready(function(){
	    $(".sidebar-btn").click(function(){
	        $(".wrapper").toggleClass("collapse");
	    });
	});
	$(document).ready(function(){
		//jquery for toggle sub menus
		$('.sub-btn').click(function(){
			$(this).next('.sub-menu').slideToggle();
			$(this).find('.dropdown').toggleClass('rotate');
		});

		//jquery for expand and collapse the sidebar
		$('.menu-btn').click(function(){
			$('.side-bar').addClass('active');
			$('.menu-btn').css("visibility", "hidden");
		});
	});
</script>	
</body>
</html>