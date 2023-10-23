<?php 
 if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
	 $idUsuario = $_SESSION['id_usuario'];
	 $name = $_SESSION['name'];
	 if($name == 'sedes'){
		 
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
<html lang="en">

<head>
	<title><?= $sede["NombreSede"] ?></title>
	<meta charset="utf-8" />
	<meta name="description" content="" />
	<meta name="keywords" content="" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<link rel="shortcut icon" href="assets/media/logos/upam.ico" />
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
	<link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
	<link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
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
							<!--begin::Toolbar wrapper=-->
							<div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
								<!--begin::Page title-->
								<div class="page-title d-flex align-items-center me-3">
									<img alt="Logo" src="assets/media/svg/misc/layer.svg" class="h-60px me-5" />
									<!--begin::Title-->
									<h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">Listado General
										<!--begin::Description-->
										<span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Alumnos Pendientes</span>
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
										<div class="table-responsive ">
											<table class="table-responsive table align-middle table-row-dashed fs-6 gy-5" id="kt_customers_table">
												<thead class="bg-primary">
													<tr class="text-start text-gray-400 fw-bold fs-7  gs-0">
														<th class="textoTabla min-w-25px">Matricula</th>
														<th class="textoTabla min-w-50px">Nombre</th>
														<th class="textoTabla min-w-50px">Telefono</th>
														<th class="textoTabla min-w-50px">Email</th>
														<th class="textoTabla min-w-50px">Carrera</th>
														<th class="textoTabla min-w-50px">Modalidad</th>
														<th class="textoTabla min-w-50px">Acciones</th>
													</tr>
												</thead>
												<style>
													.textoTabla{
														color: white !important;
														text-align: center;

													}
													th{
														text-align: center;
													}
												</style>
												<tbody class="fw-semibold text-gray-600">
													<?php
													if (isset($data)) {
														foreach ($data as $row) {
															$fullname = $row["NombreA"] . " " . $row["ApellidoP"] . " " . $row["ApellidoM"];
															echo "<tr>";
															echo "<td>" . $row["Matricula"] . "</td>";
															echo "<td>" . $fullname . "</td>";
															$telefono = $row["Telefono"];
															$formattedTelefono = substr($telefono, 0, 2) . "-" . substr($telefono, 2, 2) . "-" . substr($telefono, 4, 2) . "-" . substr($telefono, 6, 2) . "-" . substr($telefono, 8, 2);
															echo "<td>" . $formattedTelefono . "</td>";
															echo "<td>" . $row["CorreoE"] . "</td>";
															echo "<td>" . $row["nombreCarrera"] . "</td>";
															echo "<td>" . $row["Proceso"] . "</td>";
															echo '<td>';
													?>
															<!--begin::Menu-->
															<div class="menu menu-rounded menu-active-bg menu-state-primary menu-column menu-lg-row menu-title-gray-700 menu-icon-gray-500 menu-arrow-gray-500 menu-bullet-gray-500 my-5 my-lg-0 align-items-stretch fw-semibold px-2 px-lg-0" id="kt_app_header_menu" data-kt-menu="true">
																<!--begin:Menu item-->
																<div data-kt-menu-trigger="{default: 'click', lg: 'hover'}" data-kt-menu-placement="bottom-start" data-kt-menu-offset="-50,0" class="menu-item here show menu-here-bg menu-lg-down-accordion me-0 me-lg-2">
																	<!--begin:Menu link-->
																	<span class="menu-link">
																		<span class="menu-title">Acciones</span>
																		<span class="menu-arrow d-lg-none"></span>
																	</span>
																	<!--end:Menu link-->
																	<!--begin:Menu sub-->
																	<div class="menu-sub menu-sub-lg-down-accordion menu-sub-lg-dropdown p-0 w-100 w-lg-200px">
																		<!--begin:Dashboards menu-->
																		<div class="menu-state-bg menu-extended overflow-hidden overflow-lg-visible" data-kt-menu-dismiss="true">
																			<!--begin:Row-->
																			<div class="row">
																				<div class="col-12 mb-0">
																					<div class="p-3">
																						<!--begin:Menu item-->
																						<div class="menu-item p-0 m-0">
																							<input type="hidden" id="matricula" value="<?= $row["Matricula"] ?>">
																							<input type="hidden" id="sede" value="<?= $sede["NombreSede"] ?>">
																							<input type="hidden" id="destinatario" value="<?= $row["CorreoE"] ?>">
																							<input type="hidden" id="aceptado" value="true">
																							<!--begin:Menu link-->
																							<a id="aceptarAlumno" class="menu-link ">
																								<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																									<i class="bi bi-check-circle text-primary fs-1"></i>
																								</span>

																								<span class="d-flex flex-column">
																									<span class="fs-6 fw-bold text-gray-800">Aceptar</span>
																								</span>
																							</a>
																							<!--end:Menu link-->
																						</div>
																						<!--end:Menu item-->
																					</div>
																				</div>
																				<div class="col-12">
																					<div class="p-3">
																						<!--begin:Menu item-->
																						<div class="menu-item p-0 m-0">
																							<!-- Datos a mandadr por post -->
																							<!-- Formulario para enviar los datos -->
																							<form id="descartarForm">
																								<input type="hidden" id="matricula" name="matricula" value="<?= $row["Matricula"] ?>">
																								<input type="hidden" id="sede" name="sede" value="<?= $sede["NombreSede"] ?>">
																								<input type="hidden" id="destinatario" name="destinatario" value="<?= $row["CorreoE"] ?>">
																								<input type="hidden" id="aceptado" name="aceptado" value="false">
																								<a id="descartarAlumno" class="menu-link ">
																								<span class="menu-custom-icon d-flex flex-center flex-shrink-0 rounded w-40px h-40px me-3">
																									<i class="fas fa-times text-danger fs-1"></i>
																								</span>

																								<span class="d-flex flex-column">
																									<span class="fs-6 fw-bold text-gray-800">Descartar</span>
																								</span>
																							</a>
																							</form>

																							<!--end:Menu link-->
																						</div>
																						<!--end:Menu item-->
																					</div>
																				</div>
																			</div>

																			<!--end:Row-->
																		</div>
																		<!--end:Dashboards menu-->
																	</div>
																	<!--end:Menu sub-->

																</div>
																<!--end:Menu item-->
															</div>
															<!--end::Menu-->

													<?php

															echo "</tr>";
														}
													} else {
														echo "Error";
													}
													?>
												</tbody>
											</table>
										</div>
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
		var hostUrl = "assets/";
	</script>

	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script>
		$(document).ready(function() {
			$('#aceptarAlumno').click(function() {
				var matricula = $('#matricula').val(); // Reemplaza '12345' con la matrícula que deseas enviar
				var destinatario = $('#destinatario').val();
				var sede = $('#sede').val();
				var aceptado = $('#aceptado').val();
				console.log(matricula);
				$.ajax({
					type: 'POST',
					url: '?c=sedes&a=aceptar', // Reemplaza 'primera_solicitud.php' con la URL de la primera solicitud
					data: {
						matricula: matricula
					},
					success: function(response) {
						// La primera solicitud AJAX fue exitosa
						console.log('Respuesta del servidor (Primera solicitud): ' + response);
						// Realiza acciones adicionales aquí después de una respuesta exitosa
						// Ahora, realiza la segunda solicitud AJAX
						$.ajax({
							type: 'POST',
							url: 'config/correoAceptacion.php', // Reemplaza 'segunda_solicitud.php' con la URL de la segunda solicitud
							data: {
								matricula: matricula,
								sede: sede,
								destinatario: destinatario,
								aceptado: aceptado
							},
							success: function(secondResponse) {
								// La segunda solicitud AJAX fue exitosa
								console.log('Respuesta del servidor (Segunda solicitud): ' + secondResponse);

								// Muestra una alerta después de la segunda solicitud
								Swal.fire({
									icon: 'success',
									title: 'Solicitud completada con éxito',
								}).then((result) => {
									// Recargar la página
									if (result.isConfirmed) {
										location.href = "index.php?c=sedes&a=pendientes";
									}
								});

								// Realiza acciones adicionales después de la segunda solicitud
							},
							error: function(xhr, status, error) {
								// Ocurrió un error en la segunda solicitud AJAX
								console.error('Error en la segunda solicitud: ' + error);
							}
						});
					},
					error: function(xhr, status, error) {
						// Ocurrió un error en la primera solicitud AJAX
						console.error('Error en la primera solicitud: ' + error);
					}
				});
			});
		});
	</script>

	<!-- Descarta al alumno depues de su cita -->
	<script>
		$(document).ready(function() {
			$('#descartarAlumno').click(function() {
				 var formData = $('#descartarForm').serialize(); // Serializa los datos del formulario
				 var matricula = $('#matricula').val(); // Reemplaza '12345' con la matrícula que deseas enviar
				$.ajax({
					type: 'POST',
					url: '?c=sedes&a=descartarAlumno', // Reemplaza 'primera_solicitud.php' con la URL de la primera solicitud
					data: {
						matricula: matricula
					},
					success: function(response) {
						// La primera solicitud AJAX fue exitosa
						console.log('Respuesta del servidor (Primera solicitud): ' + response);
						console.log(formData);
						// Realiza acciones adicionales aquí después de una respuesta exitosa
						// Ahora, realiza la segunda solicitud AJAX
						$.ajax({
							type: 'POST',
							url: 'config/correoAceptacion.php', // Reemplaza 'segunda_solicitud.php' con la URL de la segunda solicitud
							data: formData,
							
							success: function(secondResponse) {
								// La segunda solicitud AJAX fue exitosa
								console.log('Respuesta del servidor (Segunda solicitud): ' + secondResponse);

								// Muestra una alerta después de la segunda solicitud
								Swal.fire({
									title: 'Éxito',
									text: '¡Envío exitoso!',
									icon: 'success',
									background: 'black'
								}).then((result) => {
									// Recargar la página después de hacer clic en OK en la alerta
									location.href = "index.php?c=sedes&a=pendientes";
								});

								// Realiza acciones adicionales después de la segunda solicitud
							},
							error: function(xhr, status, error) {
								// Ocurrió un error en la segunda solicitud AJAX
								console.error('Error en la segunda solicitud: ' + error);
							}
						});
					},
					error: function(xhr, status, error) {
						// Ocurrió un error en la primera solicitud AJAX
						console.error('Error en la primera solicitud: ' + error);
					}
				});
			});
		});
	</script>

	<!--begin::Global Javascript Bundle(mandatory for all pages)-->
	<script src="assets/plugins/global/plugins.bundle.js"></script>
	<script src="assets/js/scripts.bundle.js"></script>
	<!--end::Global Javascript Bundle-->
	<!--begin::Vendors Javascript(used for this page only)-->
	<script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
	<!--end::Vendors Javascript-->
	<!--begin::Custom Javascript(used for this page only)-->
	<script src="assets/js/custom/apps/customers/list/list.js"></script>


	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<footer>
	<?php include('footer.php') ?>
</footer>
<!--end::Body-->

</html>