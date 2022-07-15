<button class="btn btn-light border" style="position:fixed; top:15px;left:15px;" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasWithBackdrop" aria-controls="offcanvasWithBackdrop"><i class="fa fa-bars" aria-hidden="true"></i></button>

<div class="offcanvas offcanvas-start" tabindex="-1" id="offcanvasWithBackdrop" aria-labelledby="offcanvasWithBackdropLabel">
	<div class="offcanvas-header">
		<h5 class="offcanvas-title" id="offcanvasWithBackdropLabel">Opciones</h5>
		<button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
	</div>
	<div class="offcanvas-body">
		
		<?php if (!empty($_GET['panel']) && $_GET['panel'] == "1"): ?>
			<div class="col-12 gy-4">
				<a class="btn btn-info w-100 py-1 px-2 shadow-sm option-system option-system-menu rounded-0" role="button" href="index.php?panel=1">
					<h2 class="mb-0"><i class="fa fa-home" aria-hidden="true"></i> Inicio</h2>
				</a>
			</div>
			<div class="col-12 gy-4">
				<a class="btn btn-primary w-100 py-1 px-2 shadow-sm option-system option-system-menu rounded-0" role="button" href="mesas.php?panel=1">
					<h2 class="mb-0"><i class="fa fa-th" aria-hidden="true"></i> Mesas</h2>
				</a>
			</div>
			<div class="col-12 gy-4">
				<a class="btn btn-secondary g-4 w-100 py-1 px-2 shadow-sm option-system option-system-menu rounded-0" role="button" href="">
					<h2 class="mb-0"><i class="fa fa-truck" aria-hidden="true"></i> Proveedores</h2>
				</a>
			</div>
			<div class="col-12 gy-4">
				<a class="btn btn-success g-4 w-100 py-1 px-2 shadow-sm option-system option-system-menu rounded-0" role="button" href="ventas.php?panel=1">
					<h2 class="mb-0"><i class="fa fa-file-text-o" aria-hidden="true"></i> Ventas</h2>
				</a>
			</div>
			<div class="col-12 gy-4">
				<a class="btn btn-warning g-4 w-100 py-1 px-2 shadow-sm option-system option-system-menu rounded-0" role="button" href="">
					<h2 class="mb-0"><i class="fa fa-line-chart" aria-hidden="true"></i> Estadísticas</h2>
				</a>
			</div>
			<div class="col-12 gy-4">
				<a class="btn btn-danger g-4 w-100 py-1 px-2 shadow-sm option-system option-system-menu rounded-0" role="button" href="">
					<h2 class="mb-0"><i class="fa fa-users" aria-hidden="true"></i> Clientes</h2>
				</a>
			</div>
			<div class="col-12 gy-4">
				<a class="btn btn-dark g-4 w-100 py-1 px-2 shadow-sm option-system option-system-menu rounded-0" role="button" href="">
					<h2 class="mb-0"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Stock</h2>
				</a>
			</div>
			<div class="col-12 gy-4">
				<a class="btn btn-light g-4 w-100 py-1 px-2 shadow-sm option-system option-system-menu rounded-0 color-gray" role="button" href="admin-mesas.php?panel=2">
					<h2 class="mb-0"><i class="fa fa-cart-arrow-down" aria-hidden="true"></i> Administración</h2>
				</a>
			</div>
		
		<?php else : ?>
		
			<nav class="navbar flex-column navbar-light bg-light align-items-stretch p-2">
				<div class="collapse navbar-collapse show" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							INTRODUCCION DE DATOS
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="admin-mesas.php?panel=2">Mesas</a></li>
								<li><a class="dropdown-item" href="#">Categorías</a></li>
								<li><a class="dropdown-item" href="#">Productos</a></li>
								<li><a class="dropdown-item" href="#">Tipos de IVA</a></li>
								<li><a class="dropdown-item" href="#">Métodos de pago</a></li>
								<li><a class="dropdown-item" href="#">Ubicaciones</a></li>
							</ul>
						</li>
						<li class="nav-item dropdown mt-2">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown2" role="button" data-bs-toggle="dropdown" aria-expanded="false">
							ESTADISTICAS
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown2">
								<li><a class="dropdown-item" href="#">Compras</a></li>
								<li><a class="dropdown-item" href="#">Ventas</a></li>
								<li><a class="dropdown-item" href="#">Promedios</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php">Ir a Menú Principal</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="index.php">Finalizar sesión</a>
						</li>
					</ul>
					<form class="d-flex mt-3">
						<input class="form-control me-2" type="search" placeholder="Search" aria-label="Search">
						<button class="btn btn-outline-success" type="submit">Search</button>
					</form>
				</div>
			</nav>

		<?php endif; ?>

	</div>
</div>
