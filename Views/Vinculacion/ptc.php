<?php
session_start(); // Asegúrate de iniciar la sesión en cada vista que utilice sesiones

// Verifica si la variable de sesión existe antes de mostrarla
if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
	$idUsuario = $_SESSION['id_usuario'];
	$name = $_SESSION['name'];
	if ($name == 'Vinculacion') {
	} else {
		// Si no existe la variable de sesión, puede redirigir al usuario a la página de inicio de sesión o realizar otra acción.
		header('location: index.php');
		exit; // Detener la ejecución del script
	}
} else {
	// Si no existe la variable de sesión, puede redirigir al usuario a la página de inicio de sesión o realizar otra acción.
	header('location: index.php');
	exit; // Detener la ejecución del script
}
?>
<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Metronic
Product Version: 8.2.0
Purchase: https://1.envato.market/EA4JP
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
	<base href="" />
	<title>UPAM - Vinculación</title>
	<meta charset="utf-8" />
	<meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
	<meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<meta property="og:locale" content="en_US" />
	<meta property="og:type" content="article" />
	<meta property="og:title" content="Metronic - Bootstrap Admin Template, HTML, VueJS, React, Angular. Laravel, Asp.Net Core, Ruby on Rails, Spring Boot, Blazor, Django, Express.js, Node.js, Flask Admin Dashboard Theme & Template" />
	<meta property="og:url" content="https://keenthemes.com/metronic" />
	<meta property="og:site_name" content="Keenthemes | Metronic" />
	<link rel="canonical" href="https://preview.keenthemes.com/metronic8" />
	<link rel="shortcut icon" href="assets/media/logos/upam.ico" />
	<!--begin::Fonts(mandatory for all pages)-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Vendor Stylesheets(used for this page only)-->
	<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle_2.css" rel="stylesheet" type="text/css" />
	<!--end::Global Stylesheets Bundle-->
	<script>
		// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
	</script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
	<style>
		/* Estilos para el campo de password */
		.password-container {
			position: relative;
		}

		.password-container input {
			padding-right: 30px;
			/* Espacio para el icono */
			border: none;
			/* Sin borde */
			border-radius: 5px;
			/* Bordes redondeados */
		}

		.password-container i {
			position: absolute;
			right: 10px;
			top: 50%;
			transform: translateY(-50%);
			cursor: pointer;
		}
	</style>
</head>
<!--end::Head-->
<!--begin::Body-->

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
			<!--begin::Header-->
			<?php
			include('header.php');
			?>
			<!--end::Header-->
			<!--begin::Wrapper-->
			<div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
				<!--begin::Toolbar-->
				<div id="kt_app_toolbar" class="app-toolbar py-6">
					<!--begin::Toolbar container-->
					<div id="kt_app_toolbar_container" class="app-container container-xxl d-flex align-items-start">
						<!--begin::Toolbar container-->
						<div class="d-flex flex-column flex-row-fluid">
							<div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
								<!--begin::Page title-->
								<div class="page-title d-flex align-items-center me-3">
									<img alt="Logo" src="assets/media/svg/misc/layer.svg" class="h-60px me-5" />
									<!--begin::Title-->
									<h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">Listado de PTC</h1>

									<!--end::Title-->
								</div>
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
								<!--begin::Navbar-->
								<div class="card mb-5 mb-xl-10">
									<div class="card-body pt-9 pb-0">
										<!--begin::Navs-->
										<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
											<!--begin::Nav item-->
											<li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5" href="?c=carreras&a=index">Listas</a>
											</li>
											<!--end::Nav item-->
											<!--begin::Nav item-->
											<li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5" href="?c=sedes&a=show_sede">Sedes</a>
											</li>
											<!--end::Nav item-->
											<!--begin::Nav item-->
											<li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5" href="?c=vacantes&a=index_2">Vacantes</a>
											</li>
											<!--end::Nav item-->

											<!--begin::Nav item-->
											<li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5" href="?c=periodo&a=show_periodos">Periodos</a>
											</li>
											<!--end::Nav item-->

											<!--begin::Nav item-->
											<li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#">PTC</a>
											</li>
											<!--end::Nav item-->

											<!--begin::Nav item-->
											<li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5" href="?c=vinculacion&a=index_">Validación de documentos</a>
											</li>
											<!--end::Nav item-->
										</ul>
										<!--begin::Navs-->
									</div>
								</div>


								<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
									<!--begin::Input group-->
									<div class="row mb-6">
										<div class="d-flex my-4">
											<label class="col-lg-4 col-form-label fw-semibold fs-6">
												<span>Buscar:</span>
											</label>
											<input type="text" id="busqueda" name="busqueda" class="form-control bg-transparent" required style="width: 70%; margin-left: -18%;">
											<button type="button" id="buscarDatos" class="btn btn-sm btn-primary me-3" style="margin-left: 2%;">Buscar</button>
										</div>
									</div>
								</div>

								<script>
									// Cuando se hace clic en el botón "Buscar", hacer una solicitud AJAX para obtener los datos de los alumnos
									$('#buscarDatos').click(function() {
										var searchText = $('#busqueda').val();

										// Verificar si se ha ingresado un texto de búsqueda
										if (searchText !== '') {
											// Realizar una solicitud AJAX al servidor para obtener los datos de los alumnos
											$.ajax({
												url: "index.php?c=ptc&a=mostrar_busqueda", // Reemplaza 'buscar_alumnos.php' con la ruta correcta a tu archivo PHP que realiza la búsqueda
												method: 'POST',
												data: {
													busqueda: searchText
												},
												success: function(response) {
													// Rellenar la tabla de alumnos con los datos recibidos
													$('#alumnos').html(response);
												},
												error: function(xhr, status, error) {
													console.error(error);
												}
											});
										} else {
		Swal.fire({
												title: 'Error',
												text: 'Por favor, ingresa un texto de búsqueda antes de buscar.',
												icon: 'error'
											}).then((result) => {
												// Redireccionar después de mostrar el mensaje de error
												window.location.href = 'index.php?c=carreras&a=index_';
											});
										}
									});
								</script>


								<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
									<!--begin::Input group-->
									<div class="row mb-6">
										<label class="col-lg-4 col-form-label fw-semibold fs-6">
											<span>Buscar por carrera:</span>
										</label>
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<select id="carrera" name="carrera" aria-label="Seleccione una Carrera" data-control="select2" data-placeholder="Seleccione una Carrera..." class="form-select form-select-solid form-select-lg">
												<option value="">Seleccione una Carrera...</option>
												<?php
												foreach ($result as $row) {
													echo "<option value=" . $row["IdCarrera"] . ">" . $row["nombreCarrera"] . "</option>";
												}
												?>
											</select>
										</div>
										<!--end::Col-->
									</div>
								</div>
								<!--begin::Statements-->
								<div class="card">
									<!--begin::Header-->
									<div class="card-header card-header-stretch">
										<div class="d-flex my-4">
											<button type="submit" class="btn btn-sm btn-primary me-3" id="mostrarDatos">Mostrar Datos</button>
										</div>

										<!--begin::Title-->
										<div class="card-title">
											<h3 class="m-0 text-gray-800"></h3>
										</div>
										<!--end::Title-->
										<div class="d-flex my-4">
											<a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Agregar PTC</a>
											<a href="#" class="btn btn-sm btn-primary me-3" id="exportarPDF">Exportar Excel</a>
										</div>

										<script>
											document.getElementById('exportarPDF').addEventListener('click', function() {
												var selectedCarrera = document.getElementById('carrera').value;
												var name = "listas";
												if (selectedCarrera) {
													window.location.href = "?c=ptc&a=exportar&id=" + encodeURIComponent(selectedCarrera);
												} else {
Swal.fire({
														title: 'Error',
														text: 'Por favor, selecciona una carrera antes de exportar.',
														icon: 'error'
													}).then((result) => {
														// Redireccionar después de mostrar el mensaje de error
														window.location.href = 'index.php?c=carreras&a=index_';
													});												}
											});
										</script>
									</div>
									<!--end::Header-->
									<!--begin::Tab Content-->
									<div id="kt_referred_users_tab_content" class="tab-content">
										<!--begin::Tab panel-->
										<div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
											<div class="table-responsive">
												<table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
													<thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
														<tr>
															<th class="min-w-175px ps-9">Nombre del PTC</th>
															<th class="min-w-150px px-0">Correo</th>
															<th class="min-w-350px">Carrera</th>
														</tr>
													</thead>
													<tbody id="alumnos" class="fs-6 fw-semibold text-gray-600">
														<!-- Los datos de los alumnos se cargarán aquí -->
													</tbody>
												</table>

												<script>
													// Cuando se hace clic en el botón "Mostrar Datos", hacer una solicitud AJAX para obtener los datos de los alumnos
													$('#mostrarDatos').click(function() {
														var selectedCarrera = $('#carrera').val();

														// Verificar si se ha seleccionado una carrera
														if (selectedCarrera !== '') {
															// Realizar una solicitud AJAX al servidor para obtener los datos de los alumnos
															$.ajax({
																url: "index.php?c=ptc&a=show_ptc_carrera", // Reemplaza 'obtener_alumnos.php' con la ruta correcta a tu archivo PHP que obtiene los datos de los alumnos
																method: 'POST',
																data: {
																	carrera: selectedCarrera
																},
																success: function(response) {
																	// Rellenar la tabla de alumnos con los datos recibidos
																	$('#alumnos').html(response);
																},
																error: function(xhr, status, error) {
																	console.error(error);
																}
															});
														} else {
Swal.fire({
												title: 'Error',
												text: 'Por favor, Selecciona una carrera.',
												icon: 'error'
											}).then((result) => {
												// Redireccionar después de mostrar el mensaje de error
												window.location.href = 'index.php?c=carreras&a=index_';
											});
														}
													});
												</script>
											</div>
										</div>
										<!--end::Tab panel-->
									</div>
									<!--end::Tab Content-->
								</div>
								<!--end::Statements-->
							</div>
							<!--end::Content-->
						</div>

						<!--end::Content wrapper-->
						<!--begin::Footer-->
						<?php
						include('footer.php');
						?>
						<!--end::Footer-->
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper container-->
			</div>
			<!--end::Wrapper-->
		</div>
		<!--end::Page-->
	</div>
	<div class="modal fade" id="kt_modal_offer_a_deal" tabindex="-1" aria-hidden="true">
		<!--begin::Modal dialog-->
		<div class="modal-dialog modal-dialog-centered mw-1000px">
			<!--begin::Modal content-->
			<div class="modal-content">
				<!--begin::Modal header-->
				<div class="modal-header py-7 d-flex justify-content-between">
					<!--begin::Modal title-->
					<h2>Agrega un nuevo PTC</h2>
					<!--end::Modal title-->
					<!--begin::Close-->
					<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
						<i class="ki-outline ki-cross fs-1"></i>
					</div>
					<!--end::Close-->
				</div>
				<!--begin::Modal header-->
				<!--begin::Modal body-->
				<div class="modal-body scroll-y m-5">
					<!--begin::Stepper-->
					<div class="stepper stepper-links d-flex flex-column" id="kt_modal_offer_a_deal_stepper">
						<!--begin::Content-->
						<div id="kt_account_settings_profile_details" class="collapse show">
							<!--begin::Form-->
							<form id="kt_new_ptc_form">
								<!--begin::Card body-->
								<div class="card-body border-top p-9">
									<!--begin::Input group-->
									<div class="row mb-6" style="margin-left:250px;">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-semibold fs-6">Identificador</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<!--begin::Row-->
											<div class="row">
												<!--begin::Col-->
												<div class="col-lg-6 fv-row">
													<input type="text" name="matricula" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->

									<!--begin::Input group-->
									<div class="row mb-6" style="margin-left:250px;">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-semibold fs-6">Nombre</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<!--begin::Row-->
											<div class="row">
												<!--begin::Col-->
												<div class="col-lg-6 fv-row">
													<input type="text" name="nombre_ptc" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->

									<!--begin::Input group-->
									<div class="row mb-6" style="margin-left:250px;">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-semibold fs-6">Apellido Parterno:</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<!--begin::Row-->
											<div class="row">
												<!--begin::Col-->
												<div class="col-lg-6 fv-row">
													<input type="text" name="ApellidoPaterno" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->

									<!--begin::Input group-->
									<div class="row mb-6" style="margin-left:250px;">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-semibold fs-6">Apellido Materno:</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<!--begin::Row-->
											<div class="row">
												<!--begin::Col-->
												<div class="col-lg-6 fv-row">
													<input type="text" name="ApellidoMaterno" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->

									<!--begin::Input group-->
									<div class="row mb-6" style="margin-left:250px;">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-semibold fs-6">Correo:</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<!--begin::Row-->
											<div class="row">
												<!--begin::Col-->
												<div class="col-lg-6 fv-row">
													<input type="text" name="correo" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->

									<div class="row mb-6" style="margin-left:250px;">
										<label class="col-lg-4 required col-form-label fw-semibold fs-6">
											<span>Carrera:</span>
										</label>
										<!--begin::Col-->
										<div class="col-lg-8 fv-row">
											<select id="carrera" name="carrera" aria-label="Seleccione una Carrera" data-control="select2" data-placeholder="Seleccione una Carrera..." class="form-select form-select-solid form-select-lg">
												<option value="">Seleccione una Carrera...</option>
												<?php
												foreach ($result as $row) {
													echo "<option value=" . $row["IdCarrera"] . ">" . $row["nombreCarrera"] . "</option>";
												}
												?>
											</select>
										</div>
										<!--end::Col-->
									</div>

									<!--begin::Input group-->
									<div class="row mb-6" style="margin-left:250px;">
										<!--begin::Label-->
										<label class="col-lg-4 col-form-label required fw-semibold fs-6">Contraseña:</label>
										<!--end::Label-->
										<!--begin::Col-->
										<div class="col-lg-8">
											<!--begin::Row-->
											<div class="row">
												<!--begin::Col-->
												<div class="col-lg-6 fv-row">
													<div class="password-container">
														<input type="password" placeholder="Contrasena" name="contrasena" id="contrasena" class="form-control bg-transparent" require />
														<i id="visibility-icon" class="fas fa-eye" onclick="toggleVisibility()"></i>
													</div>

													<!--end::Password-->

													<script>
														function toggleVisibility() {
															var passwordInput = document.getElementById("contrasena");
															var visibilityIcon = document.getElementById("visibility-icon");

															if (passwordInput.type === "password") {
																passwordInput.type = "text";
																visibilityIcon.className = "fas fa-eye-slash";
															} else {
																passwordInput.type = "password";
																visibilityIcon.className = "fas fa-eye";
															}
														}
													</script>
												</div>
												<!--end::Col-->
											</div>
											<!--end::Row-->
										</div>
										<!--end::Col-->
									</div>
									<!--end::Input group-->


								</div>
								<!--end::Card body-->
								<!--begin::Actions-->
								<div class="card-footer d-flex justify-content-end py-6 px-9">
									<button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Guardar</button>
								</div>
								<!--end::Actions-->
							</form>
<script>
								$(document).ready(function() {
									$('#kt_new_ptc_form').submit(function(event) {
										event.preventDefault(); // Evitar que el formulario se envíe automáticamente

										// Obtener los datos del formulario
										var formData = new FormData(this);

										// Enviar la solicitud AJAX al servidor
										$.ajax({
											type: 'POST',
											url: '?c=ptc&a=nuevo_ptc',
											data: formData,
											dataType: 'json',
											processData: false,
											contentType: false,
											success: function(response) {
												if (response.status === 'success') {
													// Mostrar mensaje de éxito con SweetAlert
													Swal.fire({
														title: 'Éxito',
														text: response.message,
														icon: 'success'
													}).then((result) => {
														// Redireccionar después de mostrar el mensaje de éxito
														window.location.href = 'index.php?c=carreras&a=index_';
													});
												} else {
													// Mostrar mensaje de error con SweetAlert
													Swal.fire({
														title: 'Error',
														text: response.message,
														icon: 'error'
													}).then((result) => {
														// Redireccionar después de mostrar el mensaje de error
														window.location.href = 'index.php?c=carreras&a=index_';
													});
												}
											},
											error: function(xhr, status, error) {
												// Mostrar mensaje de error en caso de falla de la solicitud AJAX
												Swal.fire({
													title: 'Error',
													text: 'Hubo un error al procesar la solicitud. Por favor, inténtelo de nuevo más tarde.',
													icon: 'error'
												}).then((result) => {
													// Redireccionar después de mostrar el mensaje de error de la solicitud AJAX
													window.location.href = 'index.php?c=carreras&a=index_';
												});
											}
										});

									});
								});
							</script>
							<!--end::Form-->
						</div>
						<!--end::Content-->
					</div>
					<!--end::Stepper-->
				</div>
				<!--begin::Modal body-->
			</div>
		</div>
	</div>
	<!--begin::Javascript-->
	<script>
		var hostUrl = "assets/";
	</script>
	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	<script src="assets/js/custom/pages/user-profile/general.js"></script>
	<script src="assets/js/custom/account/api-keys/api-keys.js"></script>
	<script src="assets/js/widgets.bundle.js"></script>
	<script src="assets/js/custom/widgets.js"></script>
	<script src="assets/js/custom/apps/chat/chat.js"></script>
	<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
	<script src="assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
	<script src="assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
	<script src="assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
	<script src="assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
	<script src="assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
	<script src="assets/js/custom/utilities/modals/users-search.js"></script>
	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<!--end::Body-->

</html>
