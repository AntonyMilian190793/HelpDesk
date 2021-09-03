<?php

require_once("../../config/conexion.php");
if (isset($_SESSION["usu_id"])) {

?>

	<!DOCTYPE html>
	<html>

	<?php require_once("../MainHead/head.php"); ?>

	<title>It For You::Nuevo Ticket</title>

	</head>

	<body class="with-side-menu">

		<?php require_once("../MainHeader/header.php"); ?>


		<div class="mobile-menu-left-overlay"></div>


		<?php require_once("../MainNav/nav.php"); ?>

		<!-- Contenido -->
		<div class="page-content">
			<div class="container-fluid">
				<header class="section-header">
					<div class="tbl">
						<div class="tbl-row">
							<div class="tbl-cell">
								<h3>Nuevo Ticket</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Home</a></li>
									<li class="active">Nuevo Ticket</li>
								</ol>
							</div>
						</div>
					</div>
				</header>

				<div class="box-typical box-typical-padding">
					<p>
						Desde esta ventana pordrá genera nuevos tickes de HelpDesk:
					</p>

					<h5 class="m-t-lg with-border">Ingresar Información</h5>

					<div class="row">
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Categoría</label>
								<select id="cat_id" class="form-control">

								</select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInputEmail1">Título</label>
								<input type="text" class="form-control" id="exampleInputEmail1" placeholder="Ingrese Título">
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInputPassword1">Descripción</label>
								<div class="summernote-theme-1">
									<textarea class="summernote" id="ticket_descrip" name="name">Ingrese insidencia</textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="button" class="btn btn-rounded btn-inline btn-primary">Guardar</button>
						</div>

					</div>
				</div>
			</div>
		</div>
		<!-- contenido -->

		<?php require_once("../MainJs/js.php"); ?>

		<script type="text/javascript" src="nuevoticket.js"></script>

		<script src="js/app.js"></script>
	</body>

	</html>
<?php

} else {
	header("Location:" . Conectar::ruta() . "index.php");
}

?>