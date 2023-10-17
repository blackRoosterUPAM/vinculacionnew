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
	<title><?php echo $sede["NombreSede"]; ?></title>
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
	<link rel="shortcut icon" href="assets/media/logos/favicon.ico" />

	<!-- Incluye las hojas de estilo de PDF.js -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.12.377/pdf_viewer.css">
	<!--begin::Fonts(mandatory for all pages)-->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<!--end::Fonts-->
	<!--begin::Vendor Stylesheets(used for this page only)-->
	<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<!--end::Vendor Stylesheets-->
	<!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/css/bootstrap.min.css" rel="stylesheet">

	<!--end::Global Stylesheets Bundle-->
	<script>
		// Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
	</script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" class="header-fixed header-tablet-and-mobile-fixed toolbar-enabled">
	<!--begin::Theme mode setup on page load-->
	<script>
		var defaultThemeMode = "dark";
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
	<!--begin::Main-->
	<!--begin::Root-->
	<div class="d-flex flex-column flex-root">
		<!--begin::Page-->
		<div class="page d-flex flex-row flex-column-fluid">
			<!--begin::Wrapper-->
			<div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
				<?php include "../f/header.php"; ?>
				<!--begin::Toolbar-->
				<div class="toolbar py-5 pb-lg-15" id="kt_toolbar">
					<!--begin::Container-->
					<div id="kt_toolbar_container" class="container-xxl d-flex flex-stack flex-wrap">
						<!--begin::Page title-->
						<div class="page-title d-flex flex-column me-3">
							<!--begin::Title-->

							<h1 class="d-flex text-white fw-bold my-1 fs-3">Alumnos Postulados Esperando Respuesta <?php // print_r($data);W
																								?></h1>
							<!--end::Title-->
						</div>
						<!--end::Page title-->
					</div>
					<!--end::Container-->
				</div>
				<!--end::Toolbar-->
				<!--begin::Container-->
				<div id="kt_content_container" class="d-flex flex-column-fluid align-items-start container-xxl">
					<!--begin::Post-->
					<div id="datosAlumno" class="content flex-row-fluid" id="kt_content">
						<!--begin::Navbar-->
						<div class="card mb-5 mb-xl-10">
							<div class="card-body pt-9 pb-0">
								<!--begin::Details modificae-->
								<?php
								if (!isset($data["Aceptado"])) {
									//echo $data[1]["Aceptado"] == 1;
									echo '
									<!-- Tarjeta de Listado de Alumnos Postulados -->
									<div class="card m-4">
										<div class="card-body">
											<h2 class="card-title">Listado de Alumnos Postulados</h2>
											<div class="table-responsive">
												<table class="table table-bordered">
													<thead>
													
														<tr>
															<th class="r">Matrícula</th>
															<th class="r">Nombre Completo</th>
															<th class="r">Carrera</th>
															<th class="r">Teléfono</th>
															<th class="r">Correo</th>
															<th class="r">Ocupación</th>
															<th class="r">Acciones</th>
														
														</tr>
													</thead>
													<tbody>
														<!-- Datos de ejemplo para la tabla -->
														<tr>';
									foreach ($data as $d) {
										echo '
															<td>' . $d["Matricula"] . '</td>
															<td>' . $d["NombreA"] . ' ' . $d["ApellidoP"] . ' ' . $d["ApellidoM"] . '</td>
															<td>' . $d["Carrera"] . '</td>
															<td>' . $d["Telefono"] . '</td>
															<td>' . $d["CorreoE"] . '</td>
															<td>' . $d["NombrePE"] . '</td>'; ?>
										<td>
										<style>
														th{
															background-color: rgba(155, 216, 235, 0.3) !important;
														}
													</style>
											<div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">

												<!--begin:Menu item-->
												<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" class="menu-item menu-lg-down-accordion menu-sub-lg-down-indention me-0 me-lg-2">
													<!--begin:Menu link-->
													<span class="menu-link">
														<span class="menu-title">Acciones</span>
														<span class="menu-arrow d-lg-none"></span>
													</span>
													<!--end:Menu link-->
													<!--begin:Menu sub-->
													<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown px-lg-2 py-lg-4 w-lg-200px bg-secondary">

														<!--begin:Menu item-->
														<div class="menu-item">
															<!--begin:Menu link-->
															<a class="menu-link" href="?c=sedes&a=postulados" target="_blank">
																<span class="menu-icon">
																	<i class="fa fa-check fs-4"></i>
																</span>
																<span class="menu-title">Aceptar</span>
															</a>
															<!--end:Menu link-->
															<a class="menu-link" href="?c=sedes&a=postulados" target="_blank">
																<span class="menu-icon">
																	<i class="bi bi-x fs-2"></i>
																</span>
																<span class="menu-title">Rechazar</span>
															</a>
														</div>
														<!--end:Menu item-->
													</div>
													<!--end:Menu sub-->
												</div>
												<!--end:Menu item-->
												<!--end:Menu item-->
											</div>


										</td>
										</tr>

								<?php }
									echo '	
														<!-- Otros registros aquí -->
													</tbody>
												</table>
											</div>
										</div>
									</div>
								
									';
								} else {
									echo 'No hay alumnos que mostrar';
								}
								?>
								<!--end::Container-->
								<?php include "../f/footer.php"; ?>
							</div>
							<!--end::Wrapper-->
						</div>
						<!--end::Page-->
					</div>
					<!--end::Root-->
					<!--begin::Drawers-->
					<!--begin::Activities drawer-->

					<!--end::Chat drawer-->
					<!--end::Drawers-->
					<!--end::Main-->
					<!--begin::Scrolltop-->
					<div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
						<i class="ki-duotone ki-arrow-up">
							<span class="path1"></span>
							<span class="path2"></span>
						</i>
					</div>
					<!--end::Scrolltop-->
					<!--begin::Modals-->

					<!-- Modal correo -->
					<div class="modal fade" id="projectSettingsModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
						<div class="modal-dialog modal-dialog-centered" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalLabel">Generando Correo</h5>
									<div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
										<i class="ki-outline ki-cross fs-1"></i>
									</div>
								</div>
								<div class="modal-body">
									<!-- Contenido del formulario -->
									<div data-kt-stepper-element="content">
										<!-- ... Tu formulario aquí ... -->
										<form id="generarCita">
											<div data-kt-stepper-element="content">
												<!--begin::Wrapper-->
												<div class="w-100">
													<!--end::Input group-->
													<input type="hidden" class="form-control form-control-solid ps-12" name="destinatario" value="<?php echo $data["alumno"]["CorreoE"]; ?>">


													<!--begin::Heading-->
													<div class="pb-12">
														<!--begin::Title-->
														<h1 class="fw-bold text-dark">Agendar cita</h1>
														<!--end::Title-->
														<!--begin::Description-->
														<div class="text-muted fw-semibold fs-4">Este correo se enviara al alumno.
														</div>
														<!--end::Description-->
													</div>
													<!--end::Heading-->
													<!--begin::Input group-->
													<div class="fv-row mb-8">
														<!--begin::Label-->
														<label class="required fs-6 fw-semibold mb-2">Hora, día, mes, año</label>
														<!--end::Label-->
														<!--begin::Wrapper-->
														<div class="position-relative d-flex align-items-center">
															<!--begin::Icon-->
															<i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
															<!--end::Icon-->
															<!--begin::Input-->
															<input type="datetime-local" class="form-control form-control-solid ps-12" placeholder="Pick date range" name="fecha" />
															<!--end::Input-->
														</div>
														<!--end::Wrapper-->

														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="fv-row mb-8">
															<!--begin::Label-->
															<label class="required fs-6 fw-semibold mb-2">Asunto</label>
															<!--end::Label-->
															<!--begin::Input-->
															<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Project Description" name="asunto">Eres candidato para nuestra vacante.</textarea>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="fv-row mb-8">
															<!--begin::Label-->
															<label class="required fs-6 fw-semibold mb-2">Descripción</label>
															<!--end::Label-->
															<!--begin::Input-->
															<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Project Description" name="mensaje">Nos gustaría invitarte a una entrevista para discutir tu trayectoria profesional y cómo podrías encajar en nuestro equipo</textarea>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="fv-row mb-8">
															<!--begin::Label-->
															<label class="required fs-6 fw-semibold mb-2">Dirección</label>
															<!--end::Label-->
															<!--begin::Input-->
															<textarea class="form-control form-control-solid" rows="3" placeholder="Enter Project Description" name="direccion">Lugar donde sera la cita.</textarea>
															<!--end::Input-->
														</div>
														<!--end::Input group-->
														<!--begin::Input group-->
														<div class="d-flex flex-column mb-7 fv-row">
															<!--begin::Label-->
															<label class="d-flex align-items-center fs-6 fw-semibold form-label mb-2">
																<span class="required">Entrevistador</span>
																<span class="ms-1" data-bs-toggle="tooltip" title="Specify a card holder's name">
																	<i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
																</span>
															</label>
															<!--end::Label-->
															<input type="text" class="form-control form-control-solid" placeholder="Nombre del entrevistador" name="entrevistador" />
														</div>
														<!--end::Input group-->

														<!--begin::Input group-->
														<div class="d-flex flex-column mb-7 fv-row">
															<!--begin::Label-->
															<label class="required fs-6 fw-semibold form-label mb-2">Número de télefono</label>
															<!--end::Label-->
															<!--begin::Input wrapper-->
															<div class="position-relative">
																<!--begin::Input-->
																<input type="tel" required class="form-control form-control-solid" placeholder="Telefono del entrevistador" name="telefono" />
																<!--end::Input-->

															</div>
															<!--end::Input wrapper-->
														</div>

													</div>
												</div>
											</div>
											<div class="modal-footer">
												<button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
												<button type="submit" data-bs-dismiss="modal" class="btn btn-primary">Guardar Cambios</button>
											</div>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!--end::Modals-->
					<!--begin::Javascript-->
					<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
					<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.5.2/dist/js/bootstrap.min.js"></script>

					<script>
						$(document).ready(function() {
							$("#generarCita").submit(function(event) {
								event.preventDefault(); // Prevenir el envío normal del formulario
								var formData = $(this).serialize(); // Serializar los datos del formulario

								// Enviar la solicitud AJAX
								$.ajax({
									type: "POST",
									url: "../../config/envio.php",
									data: formData,
									success: function(response) {
										// Manejar la respuesta del servidor aquí
										console.log(response);
									},
									error: function() {
										// Manejar el error aquí, por ejemplo, mostrar un mensaje de error
										console.log("Error al enviar el formulario.");
									}
								});
							});
						});
					</script>


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
					<script src="assets/js/widgets.bundle.js"></script>
					<script src="assets/js/custom/widgets.js"></script>
					<script src="assets/js/custom/apps/chat/chat.js"></script>
					<script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
					<script src="assets/js/custom/utilities/modals/create-app.js"></script>
					<script src="assets/js/custom/utilities/modals/users-search.js"></script>

					<script src="../assets/js/custom/utilities/modals/create-project/settings.js"></script>
					<!--end::Custom Javascript-->
					<!--end::Javascript-->
					<!-- Agrega jQuery (puedes incluirlo desde un CDN) -->
					<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>


</body>
<!--end::Body-->

</html>