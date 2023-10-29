<?php
session_start(); // Asegúrate de iniciar la sesión en cada vista que utilice sesiones

// Verifica si la variable de sesión existe antes de mostrarla
if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
    $idUsuario = $_SESSION['id_usuario'];
	$name = $_SESSION['name'];
	if($name == 'director'){
		
	} else {
		// Si no existe la variable de sesión, puede redirigir al usuario a la página de inicio de sesión o realizar otra acción.
		header('location: ../index.php');
		exit; // Detener la ejecución del script
	}
} else {
    // Si no existe la variable de sesión, puede redirigir al usuario a la página de inicio de sesión o realizar otra acción.
    header('location: ../index.php');
    exit; // Detener la ejecución del script
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Vinculación UPAM</title>
	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	
	<link rel="shortcut icon" href="../assets/media/logos/upam.ico" />
	
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<link href="../assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="../assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
</head>
<!--end::Head-->
<!--begin::Body-->
<?php include('conexion.php') ?>

<body id="kt_app_body" data-kt-app-header-fixed-mobile="true" data-kt-app-toolbar-enabled="true" class="app-default">
	<!--begin::Theme mode setup on page load-->
	<script>
		var defaultThemeMode = "light";
		var themeMode;
		if (document.documentElement) {
			if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
				themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
			} else {
				if (localStorage.getItem("data-bs-theme") !== null) {
					themeMode = localStorage.getItem("data-bs-theme");
				} else {
					themeMode = defaultThemeMode;
				}
			}
			if (themeMode === "system") {
				themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
			}
			document.documentElement.setAttribute("data-bs-theme", themeMode);
		}
	</script>
	<!--end::Theme mode setup on page load-->
	<!--begin::App-->
	<div class="d-flex flex-column flex-root app-root" id="kt_app_root">
		<!--begin::Page-->
		<div class="app-page flex-column flex-column-fluid" id="kt_app_page">
			<!--begin::Wrapper-->
			<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
				<!--begin::Toolbar-->
				<div id="kt_app_toolbar" class="app-toolbar py-6">
					<!--begin::Toolbar container-->
					<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
						<!--begin::Toolbar container-->
						<div class="d-flex flex-column flex-row-fluid">
							<!--begin::Toolbar wrapper=-->
							<div class="d-flex align-items-center pt-1">
								<!--begin::Breadcrumb-->
								<ul class="breadcrumb breadcrumb-separatorless fw-semibold">
									<!--begin::Item-->
									<li class="breadcrumb-item text-white fw-bold lh-1">
										<a href="index.php" class="text-white text-hover-primary">
											<i class="ki-outline ki-home text-white fs-3"></i>
										</a>
									</li>
									<!--end::Item-->
									<!--begin::Item-->
									<li class="breadcrumb-item">
										<i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
									</li>
									<!--end::Item-->
									<!--begin::Item-->
									<li class="breadcrumb-item text-white fw-bold lh-1">Home</li>
									<!--end::Item-->
								</ul>
								<!--end::Breadcrumb-->
							</div>
							<!--end::Toolbar wrapper=-->
							<!--begin::Toolbar wrapper=-->
								<div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
								<!--begin::Page title-->
								<div class="page-title d-flex align-items-center me-3">
									<img alt="Logo" src="../assets/media/svg/misc/layer.svg" class="h-60px me-5" />
									<!--begin::Title-->
									<h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">Listado General
										<!--begin::Description-->
										<span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Alumnos</span>
										<!--end::Description-->
									</h1>
									<!--end::Title-->
								</div>
								<!--end::Page title-->
							</div>
							<!--end::Toolbar wrapper=-->
						</div>
						<!--end::Toolbar container=-->
					</div>
					<!--end::Toolbar container-->
				</div>
				<!--end::Toolbar-->
				<!--begin::Wrapper container-->
				<div class="app-container container-xxl">
					<!--begin::Main-->
					<div class="app-main flex-column flex-row-fluid" id="kt_app_main">
						<!--begin::Content wrapper-->
						<div class="d-flex flex-column flex-column-fluid">
							<!--begin::Content-->
							<div id="kt_app_content" class="app-content">
								<!--begin::Card-->
								<div class="card">
									<!--begin::Card header-->
									<div class="card-header border-0 pt-6">
										<!--begin::Card title-->
										<div class="card-title">
											<!--begin::Search-->
											<div class="d-flex align-items-center position-relative my-1">
												<i class="ki-outline ki-magnifier fs-3 position-absolute ms-5"></i>
												<input type="text" data-kt-customer-table-filter="search" class="form-control form-control-solid w-250px ps-12" placeholder="Busqueda especifica" />
											</div>
											<!--end::Search-->
										</div>
										<!--begin::Card title-->
										<!--begin::Card toolbar-->
										<div class="card-toolbar">
											<!--begin::Group actions-->
											<div class="d-flex justify-content-end align-items-center d-none" data-kt-customer-table-toolbar="selected">
												<div class="fw-bold me-5">
													<span class="me-2" data-kt-customer-table-select="selected_count"></span>Selected
												</div>
												<button type="button" class="btn btn-danger" data-kt-customer-table-select="delete_selected">Delete Selected</button>
											</div>
											<!--end::Group actions-->
										</div>
										<!--end::Card toolbar-->
									</div>
									<!--end::Card header-->
									<!--begin::Card body-->
									<div class="card-body pt-0">
										<!--begin::Table-->
										<table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
											<thead>
												<tr class="text-start text-gray-400 fw-bold fs-7 text-uppercase gs-0">
													<th style="text-align: center;">Matricula</th>
													<th style="text-align: center;">Nombre</th>
													<th style="text-align: center;">A.Paterno</th>
													<th style="text-align: center;">A.Materno</th>
													<th style="text-align: center;">Telefono</th>
													<th style="text-align: center;">Email</th>
													<th style="text-align: center;">Estatus</th>
													<th style="text-align: center;">Proceso</th>
													<th style="text-align: center;">Carrera</th>
												</tr>
											</thead>
											<tbody class="fw-semibold text-gray-600">
												<?php

												function proceso($proceso)
												{
													switch ($proceso) {
														case 0:
															return "Sin sede";
														case 1:
															return "Postulado";
														case 2:
															return "Aceptado";
													}
												}

												$sql = "select al.Matricula,al.NombreA,al.ApellidoP,al.ApellidoM,al.Telefono,al.CorreoE,al.Estatus,al.Proceso,c.NombrePE
												from alumnos as al 
												INNER JOIN carrera as c on al.Carrera = c.IdCarrera;
												";
												$result = $conn->query($sql);

												if ($result->num_rows > 0) { // output data of each row
													while ($row = $result->fetch_assoc()) {
														echo "<tr>
															  <td align='center'>" . $row["Matricula"] . "</td>";
														echo "<td align='center'>" . $row["NombreA"] . "</td>";
														echo "<td align='center'>" . $row["ApellidoP"] . "</td>";
														echo "<td align='center'>" . $row["ApellidoM"] . "</td>";
														echo "<td align='center'>" . $row["Telefono"] . "</td>";
														echo "<td align='center'>" . $row["CorreoE"] . "</td>";
														echo "<td align='center'>" . ($row["Estatus"] == 1 ? "Activo" : "Inactivo") . "</td>";
														echo "<td align='center'>" . proceso($row["Proceso"]) . "</td>";
														echo "<td align='center'>" . $row["NombrePE"] . "</td></tr>";
													}
												} else {
													echo "Error";
												}
												$conn->close();
												?>
											</tbody>
										</table>
										<!--end::Table-->
									</div>
									<!--end::Card body-->
								</div>
								<!--end::Card-->
							</div>
							<!--end::Content-->
						</div>
						<!--end::Content wrapper-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper container-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<!--end::App-->
	<!--begin::Drawers-->
	<!--begin::Scrolltop-->
	<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
		<i class="ki-outline ki-arrow-up"></i>
	</div>
	<!--end::Scrolltop-->
	<!--begin::Javascript-->
	<script>
		var hostUrl = "../../assets";
	</script>
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="../assets/plugins/global/plugins.bundle.js"></script>
	<script src="../assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="../assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	<script src="../assets/js/custom/apps/customers/list/list.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<footer>
	<?php include('footer.php') ?>
</footer>
<!--end::Body-->

</html>