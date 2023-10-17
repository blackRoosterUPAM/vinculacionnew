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

							<h1 class="d-flex text-white fw-bold my-1 fs-3">Solicitud de Alumno</h1>
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
								if (isset($data["alumno"]["Matricula"])) {
									echo '
											<!-- Primera sección de fila -->
											<div class="row mb-4">
												<!-- Columna izquierda (nombre del alumno) -->
												<div class="col-md-6">
													<div class="d-flex align-items-center mb-2">
														<a href="#" style="margin-left: 6%;" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">' . $data["fullName"] . '</a>
														<a href="#">
															<i class="ki-outline ki-verify fs-1 text-primary"></i>
														</a>
													</div>
												</div>
			
												<!-- Columna derecha (botones) -->
												<div class="col-md-6">
													<div style="margin-left: 5%; margin-top:-1%;" class="d-flex ">
														<!-- Botón "Siguiente" para cargar el siguiente alumno -->
														
														<a href="index.php" class="btn btn-danger me-3">Siguiente</a>


														<a href="#" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#projectSettingsModal">Generar Cita</a>
														<a href="#" class="btn ">Cupo 5/5</a>
			
													</div>
												</div>
											</div>
											<!-- Segunda sección de fila -->
											<div class="row">
												<!-- Columna izquierda (imagen) -->
												<div class="col-md-3 my-0 text-center"> <!-- Añadido text-center para centrar la imagen -->
													<div class="me-7 mb-2">
														<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
															<img src="assets/media/avatars/300-1.jpg" alt="image" />
															<div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px"></div>
														</div>
													</div>
												</div>
												<!-- Columna derecha (información en tarjeta) -->
												<style>
													.p {
														font-size: 15px;
													}
												</style>
												<div class="col-md-9">
													<div class="card">
														<div class="card-body">
															<!-- Primera fila de información (3 columnas) -->
															<div class="row">
																<div class="col-md-4">
																	<p class="p"><strong><i class="fas fa-envelope"></i> Correo Electrónico:</strong> ' . $data["alumno"]["CorreoE"] . '</p>
																</div>
																<div class="col-md-4">
																	<p class="p"><strong><i class="fas fa-phone"></i> Teléfono:</strong> ' . $data["alumno"]["Telefono"] . '</p>
																</div>
																<div class="col-md-4">
																	<p class="p"><strong><i class="fas fa-user"></i> Matricula:</strong> ' . $data["alumno"]["Matricula"] . '</p>
																</div>
															</div>
															<!-- Segunda fila de información (3 columnas) -->
															<div class="row">
																<div style="width: 50%;" class="col-md-4">
																	<p class="p"><strong><i class="fas fa-graduation-cap"></i> Universidad:</strong> Universidad Politécnica de Amozoc</p>
																</div>
																<div class="col-md-4">
																	<p class="p"><strong><i class="fas fa-laptop"></i> ' . $data["alumno"]["Carrera"] . '</strong> </p>
																</div>';
									if ($data["alumno"]["Aceptado"] == 0) {
										echo '
																<div class="col-md-4">
																	<p class="p"><strong><i class="fas fa-laptop"></i>Confirmacion Pendiente -- Esperando Evaluacion de entrevista</strong> </p>
																</div>';
									}
									echo '
																
															</div>
														</div>
													</div>
												</div>
			
											</div>
										
										


										<!--end::Details-->

										<!--begin::Navs-->
										<ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">
											<!--begin::Nav item-->
											<li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="f/index.php?route=sedes_index">Perfil del alumno</a>
											</li>
											<!--end::Nav item-->


											<!--begin::Nav item-->

											<li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5 " href="index.php?route=sedes_psicometria">Psicométria</a>
											</li>
											<!--end::Nav item-->


											<!--end::Nav item-->
										</ul>
										<!--begin::Navs-->
									</div>
								</div>
								<!--end::Navbar-->
								<!--begin::details View-->
								<div class="card mb-5 mb-xl-10" id="kt_profile_details_view">
									<!--begin::Card header-->
									<div class="card-header cursor-pointer">
										<!--begin::Card title-->
										<div class="card-title m-0">
											<h3 class="fw-bold m-0">Curriculum Vitae del alumno</h3>
										</div>
										<!--end::Card title-->

									</div>
									<!--begin::Card header-->
									<!--begin::Card body-->
									<div class="card-body p-9">
										<!-- pdf con el curriculm-->
										<div>
						<embed src="data:application/pdf;base64,' . base64_encode($data["alumno"]["CV"]) . '" width="100%" height="500"></embed>
					</div>
									</div>
									<!--end::Card body-->
								</div>
								<!--end::details View-->

							</div>
							<!--end::Post-->
						</div>';
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
					<script>
						$(document).ready(function() {
							// Agregar un evento al formulario "generarCita" cuando se envíe
							$("#generarCita").submit(function(event) {
								event.preventDefault(); // Prevenir el envío normal del formulario

								// Realizar la solicitud AJAX a "index.php?c=sedes&a=pendiente"
								$.ajax({
									type: "POST",
									url: "index.php?c=sedes&a=pendiente",
									data: $(this).serialize(), // Serializar los datos del formulario
									success: function(response) {
										// Manejar la respuesta de la primera solicitud aquí
										console.log(response);

										// Luego, enviar el formulario a "config/envio.php" después de obtener la respuesta
										$.ajax({
											type: "POST",
											url: "../../config/envio.php",
											data: $("#generarCita").serialize(), // Serializar los datos del formulario
											success: function(response) {
												// Manejar la respuesta del servidor para el formulario aquí
												console.log(response);
											},
											error: function() {
												// Manejar el error para el formulario aquí, por ejemplo, mostrar un mensaje de error
												console.log("Error al enviar el formulario.");
											}
										});
									},
									error: function() {
										// Manejar el error de la primera solicitud aquí, si es necesario
										console.log("Error en la primera solicitud.");
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