<?php
if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
	$idUsuario = $_SESSION['id_usuario'];
	$name = $_SESSION['name'];
	if ($name == 'sedes') {
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
										<span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Alumnos Postulados</span>
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
						<?php if ($data["alumno"]) { ?>
							<!--begin::Content wrapper-->
							<div class="d-flex flex-column flex-column-fluid">
								<!--begin::Content-->
								<div id="kt_app_content" class="app-content">
									<!--begin::Card-->
									<div class="card mb-8">
										<!--begin::Card header-->

										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-5">
											<!--begin::Table-->
											<div class="row mb-4">
												<!-- Columna izquierda (nombre del alumno) -->
												<div class="col-md-6">
													<div class="d-flex align-items-center mb-2">
														<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1" style="margin-left: 6%;">
															<?= $data["fullName"] ?>
														</a>
														<a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1" style="margin-left: 6%;">
															<?= $id ?>
														</a>
														<a href>
															<i class="ki-outline ki-verify fs-1 text-primary"></i>
														</a>
													</div>
												</div>


												<!-- Columna derecha (botones) -->
												<div class="col-12 col-md-6">
													<div class="d-flex flex-wrap justify-content-start align-items-center" style="margin-left: 5%; margin-top: -1%;">
														<!-- Botón "Siguiente" para cargar el siguiente alumno -->
														<a href="?c=sedes&a=index" class="btn btn-secondary mb-2 me-2">Siguiente</a>
														<!-- Botón "Descartar" -->
														<button id="descartar" class="btn btn-danger mb-2 me-2">Descartar</button>
														<!-- Botón "Generar Cita" -->
														<button class="btn btn-primary mb-2 me-2" data-bs-toggle="modal" data-bs-target="#projectSettingsModal">Generar Cita</button>

														<!-- Apartado que muestra los datos actuales del número de vacantes -->
														<a class="btn btn-info mb-2 rounded-circle"><?= $vacante["NumPostulados"] ?>/<?= $vacante["totalVacantes"] ?></a>
													</div>
												</div>

											</div>
											<!-- Segunda sección de fila -->
											<div class="row">
												<!-- Columna izquierda (imagen) -->
												<div class="col-md-3 my-0 text-center"> <!-- Añadido text-center para centrar la imagen -->
													<div class="me-7 mb-2">
														<div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
															<img src="assets/media/avatars/gallo.jpg" alt="image" />
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
															<div class="row border-bottom pb-2">
																<div class="col-md-4">
																	<p class="p"><strong><i class="fas fa-envelope"></i> Correo Electrónico:</strong> <?= $data["alumno"]["CorreoE"] ?></p>
																</div>
																<div class="col-md-4">
																	<p class="p"><strong><i class="fas fa-phone"></i> Teléfono:</strong>
																		<?php
																		$telefono = $data["alumno"]["Telefono"];
																		$formattedTelefono = substr($telefono, 0, 2) . "-" . substr($telefono, 2, 2) . "-" . substr($telefono, 4, 2) . "-" . substr($telefono, 6, 2) . "-" . substr($telefono, 8, 2);
																		echo $formattedTelefono;

																		?>
																	</p>
																</div>
																<div class="col-md-4">
																	<p class="p"><strong><i class="fas fa-user"></i> Matricula:</strong> <?= $data["alumno"]["Matricula"] ?></p>
																</div>
															</div>
															<!-- Segunda fila de información (3 columnas) -->
															<div class="row ">
																<div style="width: 50%;" class="col-md-4">
																	<p class="p"><strong><i class="fas fa-graduation-cap"></i> Universidad:</strong> Universidad Politécnica de Amozoc</p>
																</div>
																<div class="col-md-4">
																	<p class="p"><strong><i class="fas fa-laptop"></i> <?= $data["alumno"]["nombreCarrera"] ?></strong> </p>
																</div>
																<?php
																if ($data["alumno"]["Aceptado"] == 1) { ?>
																	<div class="col-md-4">
																		<p class="p"><strong><i class="fas fa-laptop"></i>Confirmación Pendiente -- Esperando Evaluación de Entrevista</strong> </p>
																	</div>
																<?php
																}
																?>
															</div>
														</div>

													</div>
												</div>

											</div>

											<!--end::Table-->
										</div>
										<!--end::Card body-->
									</div>
									<!--end::Card-->
									<!--begin::Card-->
									<div class="card">
										<!--begin::Card header-->

										<!--end::Card header-->
										<!--begin::Card body-->
										<div class="card-body pt-5">
											<embed style="border-radius:10px ; box-shadow: 0 2px 4px 4px rgba(255, 255, 255, 0.5);" src="data:application/pdf;base64,<?= base64_encode($data["alumno"]["CV"]) ?>" width="100%" height="500"></embed>
										</div>


										<!--end::Card body-->
									</div>
									<!--end::Card-->

								</div>
								<!--end::Content-->


							</div>
							<!--end::Content wrapper-->
						<?php } else { ?>
							<div class="app-container container-md-12 d-flex justify-content-center align-items-center">
								<div style="box-shadow: 0 3px 10px 1px rgb(255,255,255, 0.5);" id="kt_app_content" class="app-content">
									<div class="col-md-12">
										<div class="card max-height-100">
											<div class="card-body">
												<a class="text-gray-900 text-hover-primary fs-2 fw-bold me-1">
													No hay más alumnos postulados por el momento
												</a>
											</div>
										</div>
									</div>
								</div>
							</div>

						<?php }
						?>

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
	<!-- Asegúrate de incluir SweetAlert2 antes de tu script -->
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

	<script>
		$(document).ready(function() {
			$("#descartar").click(function() {
				console.log("Se hizo click en descartar");
				Swal.fire({
					title: '¿Estás seguro de que deseas descartar?',
					text: 'Esta acción no se puede deshacer.',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Sí, descartar',
					cancelButtonText: 'Cancelar'
				}).then((result) => {
					if (result.isConfirmed) {
						// Realizar la solicitud AJAX si el usuario confirmó
						console.log("<?= $data["alumno"]["Matricula"] ?>");
						var matricula = <?= $data["alumno"]["Matricula"] ?>;
						$.ajax({
							type: "POST",
							url: "index.php?c=sedes&a=descartar",
							data: {
								matricula: matricula ,
							},
							success: function(response) {
								console.log("se borro al pendejo");
								// Manejar la respuesta de la primera solicitud aquí
								//console.log(response);

								
								console.log("<?= $data["alumno"]["CorreoE"] ?>");
								// Obtener para envio de correo 
								var matricula = "<?= $data["alumno"]["Matricula"]?>";
								
								var correo = "<?= $data["alumno"]["CorreoE"] ?>";
								var sede = "<?= $sede["NombreSede"] ?>";
								var alumno = "<?= $data["alumno"]["NombreA"]. " ".$data["alumno"]["ApellidoP"]. " ". $data["alumno"]["ApellidoM"]?>";
								var respuestaSede = "descartado por su perfil";
								var tipoCorreo = 'rechazado';
								// Luego, enviar el correo y la matrícula a envio.php
								$.ajax({
									type: "POST",
									url: "config/correoSede.php",
									data: {
										destinatario: correo,
										matricula: matricula,
										sede: sede,
										alumno: alumno,
										respuestaSede: respuestaSede,
										tipoCorreo: tipoCorreo,
									},
									success: function(response) {
										// Manejar la respuesta del servidor para el correo y matrícula aquí
										console.log(response);

										// Mostrar una alerta SweetAlert2
										Swal.fire({
											title: 'Éxito',
											text: '¡Envío exitoso!',
											icon: 'success'
										}).then((result) => {
											// Recargar la página después de hacer clic en OK en la alerta
											location.href = "index.php?c=sedes&a=index";
										});
									},
									error: function() {
										// Manejar el error para el correo y matrícula aquí, por ejemplo, mostrar un mensaje de error
										console.log("Error al enviar el correo y la matrícula.");
									}
								});
							},
							error: function() {
								// Manejar el error de la primera solicitud aquí, si es necesario
								console.log("Error en la primera solicitud.");
							}
						});
					}
				});
			});
		});
	</script>


	


	<!-- Script que manda correo de cita y modifica que esta por confirmar si es aceptado o nel -->
	<script>
		$(document).ready(function() {
			// Agregar un evento al formulario "generarCita" cuando se envíe
			$("#generarCita").submit(function(event) {

				event.preventDefault(); // Prevenir el envío normal del formulario
				var form = document.querySelector("#generarCita");

				// Realizar la solicitud AJAX a "index.php?c=sedes&a=pendiente"
				$.ajax({
					type: "POST",
					url: "index.php?c=sedes&a=pendiente",
					data: {
						matricula: <?= $data["alumno"]["Matricula"] ?>
					},
					success: function(response) {
						// Manejar la respuesta de la primera solicitud aquí
						console.log("Se modifico");

						var formData = $("#generarCita").serialize();

						console.log(formData);
						// Luego, enviar el correo y la matrícula a envio.php
						$.ajax({
							type: "POST",
							url: "config/correoSede.php",
							data: formData,
							success: function(response) {
								// Manejar la respuesta del servidor para el formulario aquí
								const fechaInput = form.querySelector('[name="fecha"]');

								// Aplica el estilo para ocultar el campo
								fechaInput.style.display = 'none';
								Swal.fire({
									title: 'Éxito',
									text: '¡Envío exitoso!',
									icon: 'success'
								}).then((result) => {
									// Recargar la página después de hacer clic en OK en la alerta
									location.href = "index.php?c=sedes&a=index";
								});
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
		$(document).ready(function() {
			var form = document.querySelector("#generarCita");
			$(form.querySelector('[name="fecha"]')).flatpickr({
				enableTime: true,
				dateFormat: "d, M Y, H:i",
				"locale": {
					"firstDayOfWeek": 1, // Lunes como el primer día de la semana (opcional)
					"weekdays": {
						"shorthand": ["Dom", "Lun", "Mar", "Mié", "Jue", "Vie", "Sáb"],
						"longhand": ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"]
					},
					"months": {
						"shorthand": ["Ene", "Feb", "Mar", "Abr", "May", "Jun", "Jul", "Ago", "Sep", "Oct", "Nov", "Dic"],
						"longhand": ["Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"]
					}
				}
			});
		});
	</script>

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
								
									<!--begin::Heading-->
									<div class="pb-12">
										<!--begin::Title-->
										<h1 class="fw-bold text-dark">Agendar cita</h1>
										<!--end::Title-->
										<!--begin::Description-->
										<div class="text-muted fw-semibold fs-4">Este correo se enviará al alumno.</div>
										<!--end::Description-->
									</div>
									<!--end::Heading-->


									<!--begin::Input group-->
									<div class="fv-row mb-8">
										<!--begin::Label-->
										<label class="required fs-6 fw-semibold mb-2">Fecha y Hora</label>
										<!--end::Label-->
										<!--begin::Wrapper-->
										<div class="position-relative d-flex align-items-center">
											<!--begin::Icon-->
											<i class="ki-outline ki-calendar-8 fs-2 position-absolute mx-4"></i>
											<!--end::Icon-->
											<!--begin::Input-->
											<input required class="form-control form-control-solid ps-12" placeholder="Eliga Fecha y Hora" name="fecha" />
											<!--end::Input-->
										</div>
										<!--end::Wrapper-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-8">
										<!--begin::Label-->
										<label class="required fs-6 fw-semibold mb-2">Asunto</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea required class="form-control form-control-solid" rows="3" name="asunto">Eres candidato para nuestra vacante#</textarea>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-8">
										<!--begin::Label-->
										<label class="required fs-6 fw-semibold mb-2">Descripción</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea required class="form-control form-control-solid" rows="3" name="mensaje">Nos gustaría invitarte a una entrevista para discutir tu trayectoria profesional y cómo podrías encajar en nuestro equipo.</textarea>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="fv-row mb-8">
										<!--begin::Label-->
										<label class="required fs-6 fw-semibold mb-2">Dirección</label>
										<!--end::Label-->
										<!--begin::Input-->
										<textarea required class="form-control form-control-solid" rows="3" name="direccion">Lugar donde será la cita.</textarea>
										<!--end::Input-->
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="d-flex flex-column mb-7 fv-row">
										<!--begin::Label-->
										<label class="required d-flex align-items-center fs-6 fw-semibold form-label mb-2">
											<span>Entrevistador</span>
											<span class="ms-1" data-bs-toggle="tooltip" title="Specify a card holder's name">
												<i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
											</span>
										</label>
										<!--end::Label-->
										<input type="text" required class="form-control form-control-solid" name="entrevistador" />
									</div>
									<!--end::Input group-->
									<!--begin::Input group-->
									<div class="d-flex flex-column mb-7 fv-row">
										<!--begin::Label-->
										<label class="required fs-6 fw-semibold form-label mb-2">Número de teléfono</label>
										<!--end::Label-->
										<!--begin::Input wrapper-->
										<div class="position-relative">
											<!--begin::Input-->
											<input type="tel" required class="form-control form-control-solid" minlength="10" maxlength="10" name="telefono" />
											<!--end::Input-->
										</div>
										<!--end::Input wrapper-->
									</div>
									<!--end::Input group-->
								</div>
							</div>
							<!-- Datos que mandamos -->
							<!--
								Fecha y hora;
								asunto;
								mensaje;
								Direccion;
								Entrevistador;
								numero de telefono;
								var matricula = "";
								var correo = "";
								var sede = "";
								var alumno = "Brandon Cara de verga";
								var respuestaSede = "descartado por su perfil";
								var tipoCorreo = 'cita';
							-->
							<input type="hidden" name="matricula" value="<?= $data["alumno"]["Matricula"]?>">
							<input type="hidden" name="destinatario" value="<?= $data["alumno"]["CorreoE"]?>">
							<input type="hidden" name="sede" value="<?=$sede['NombreSede']?>">
							<input type="hidden" name="alumno" value="<?= $data["alumno"]["NombreA"]. " ".$data["alumno"]["ApellidoP"]. " ". $data["alumno"]["ApellidoM"]?>">
							<input type="hidden" name="respuestaSede" value=" citado para una entrevista">
							<input type="hidden" name="tipoCorreo" value="cita">
							<div class="modal-footer">
								<button type="button" id="cancelarCita" data-bs-dismiss="modal" class="btn btn-light me-3">Cancel</button>

								<button id="enviarCita" type="submit" class="btn btn-primary">Guardar Cambios</button>
							</div>
						</form>
					</div>
				</div>
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
	<script src="assets/js/widgets.bundle.js"></script>
	<script src="assets/js/custom/widgets.js"></script>

	<!--end::Custom Javascript-->
	<!--end::Javascript-->
</body>
<footer>
	<?php include('footer.php') ?>
</footer>
<!--end::Body-->

</html>