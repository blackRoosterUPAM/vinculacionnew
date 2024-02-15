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
                                    <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">Vacantes</h1>

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
												<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#">Vacantes</a>
											</li>
											<!--end::Nav item-->

											<!--begin::Nav item-->
											<li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5" href="?c=periodo&a=show_periodos">Periodos</a>
											</li>
											<!--end::Nav item-->

											<!--begin::Nav item-->
											<li class="nav-item mt-2">
												<a class="nav-link text-active-primary ms-0 me-10 py-5" href="?c=carreras&a=index_">PTC</a>
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
								<!--end::Navbar-->

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
                                                url: "index.php?c=vacantes&a=mostrar_busqueda", // Reemplaza 'buscar_alumnos.php' con la ruta correcta a tu archivo PHP que realiza la búsqueda
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
												window.location.href = 'index.php?c=vacantes&a=index_2';
											});
                                        }
                                    });
                                </script>

								<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
									<!--begin::Input group-->
									<div class="row mb-6">

										<label class="col-lg-4 col-form-label fw-semibold fs-6">
											<span>Buscar por Carrera</span>
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

									<!--begin::Statements-->
								</div>
								<br>
								<!--end::Input group-->
								<!--begin::Row-->
								<div class="row g-xxl-9">
								</div>
								<!--end::Row-->
								<!--begin::Statements-->
								<div class="card">
									<!--begin::Header-->
									<div class="card-header card-header-stretch">

										<div class="d-flex my-4">
											<button type="submit" class="btn btn-sm btn-primary me-3" id="mostrarDatos">Mostrar Datos</button>
										</div>

										<div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
											<!--begin::Actions-->
											<div class="d-flex my-4">
												<a href="?c=vacantes&a=selec_cupos" class="btn btn-sm btn-primary me-3">Nuevos Cupos</a>
											</div>

											<div class="d-flex my-4">
												<a href="#" class="btn btn-sm btn-primary me-3" id="exportarPDF">Exportar Excel</a>
											</div>

											<script>
												document.getElementById('exportarPDF').addEventListener('click', function() {
													var selectedCarrera = document.getElementById('carrera').value;
													if (selectedCarrera) {
														window.location.href = "?c=alumno&a=exportarVacantes&id=" + selectedCarrera;
													} else {
Swal.fire({
														title: 'Error',
														text: 'Por favor, seleccione una carrera antes de exportar.',
														icon: 'error'
													}).then((result) => {
														// Redireccionar después de mostrar el mensaje de error
														window.location.href = 'index.php?c=vacantes&a=index_2';
													});
													}
												});
											</script>
										</div>
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
															<th class="min-w-175px ps-9">Sede</th>
															<th class="min-w-150px px-0">Carrera</th>
															<th class="min-w-350px">Proceso</th>
															<th class="min-w-125px">Periodo</th>
															<th class="min-w-125px">Perfil</th>
															<th class="min-w-125px">Beneficios</th>
															<th class="min-w-125px">Numero de vacantes</th>
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
																url: "index.php?c=vacantes&a=show_vacantes_carrera", // Reemplaza 'obtener_alumnos.php' con la ruta correcta a tu archivo PHP que obtiene los datos de los alumnos
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
																text: 'Selecciona una carrera',
																icon: 'error'
															}).then((result) => {
																// Redireccionar después de mostrar el mensaje de error
																window.location.href = 'index.php?c=vacantes&a=index_2';
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
