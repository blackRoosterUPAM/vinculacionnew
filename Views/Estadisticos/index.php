<!DOCTYPE html>
<html lang="en">

<head>
    <title>ESTADISTICOS</title>
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

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.17.4/xlsx.full.min.js"></script>
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
                                    <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">Estadísticas
                                        <!--begin::Description-->
                                        <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Usuarios</span>
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
                <!--begin::Wrapper container-->
                <div class="app-container container-xxl">
                    <!--begin::Main-->
                    <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                        <!--begin::Content wrapper-->
                        <div class="d-flex flex-column flex-column-fluid">
                            <!--begin::Content-->
                            <div id="kt_app_content" class="app-content">
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
												url: "index.php?c=estad&a=mostrar_busqueda", // Reemplaza 'buscar_alumnos.php' con la ruta correcta a tu archivo PHP que realiza la búsqueda
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
												window.location.href = 'index.php?c=estad&a=index';
											});
										}
									});
								</script>

                                <!--begin::Referred users-->
                                <div class="card">
                                    <!--begin::Header-->
                                    <div class="card-header card-header-stretch">
                                        <!--begin::Title-->
                                        <div class="card-title">
                                            <h3></h3>
                                        </div>

                                        <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                            <!--begin::Actions-->
                                            <div class="d-flex my-4">
                                                <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Agregar usuario</a>
                                            </div>
                                        </div>
                                    </div>
                                    <!--end::Header-->
                                    <!--begin::Tab content-->
                                    <div id="kt_referred_users_tab_content" class="tab-content">
                                        <!--begin::Tab panel-->
                                        <div id="kt_referrals_1" class="card-body p-0 tab-pane fade show active" role="tabpanel">
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                                    <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                        <tr>
                                                            <th class="min-w-175px ps-9">Matricula</th>
                                                            <th class="min-w-150px px-0">Nombre</th>
                                                            <th class="min-w-150px px-0">Correo</th>
                                                            <th class="min-w-150px px-0">Rol</th>
                                                            <th class="min-w-150px px-0">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody id="alumnos" class="fs-6 fw-semibold text-gray-600">
                                                        <?php

                                                        foreach ($usuarios as $row) {
                                                            echo "<tr>";
                                                            echo "<td class='ps-9'>" . $row["IdUsuario"] . "</td>";
                                                            echo "<td class='ps-0'>" . $row["NombreU"] . " " . $row["APaternoU"] . " " . $row["AMaternoU"] . "</td>";
                                                            echo "<td class='ps-0'>" . $row["CorreoE"] . "</td>";
                                                            echo "<td class='ps-0'>" . $row["nombreRol"] . "</td>";
                                                            echo "<td class='ps-0'>
                                                            <a href='index.php?c=estad&a=edit_usuario&id=" . $row["IdUsuario"] . "'>Editar Usuario</a> /
                                                            <a href='index.php?c=estad&a=eli_usuario&id=" . $row["IdUsuario"] . "'>Eliminar</a>
                                                            </td>";
                                                            echo "</tr>";
                                                        }
                                                        ?>
                                                    </tbody>
                                                    <!--end::Tbody-->
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                        </div>
                                        <!--end::Tab panel-->
                                    </div>
                                    <!--end::Tab content-->
                                </div>
                                <!--end::Referred users-->
                            </div>
                            <!--end::Content-->
                        </div>
                        <!--end::Content wrapper-->
                        <!--begin::Footer-->
                        <?php include 'footer.php'; ?>
                        <!--end::Footer-->
                    </div>
                    <!--end:::Main-->
                </div>
                <!--end::Wrapper container-->
                <!--end::Wrapper container-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>

    <!--begin::Modal - Offer A Deal-->
    <div class="modal fade" id="kt_modal_offer_a_deal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-1000px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Agrega una nuevo usario</h2>
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
			    <form id="kt_account_profile_details_form">
                                <!--begin::Card body-->
                                <div class="card-body border-top p-9">
                                    <!--begin::Input group-->
                                    <div class="row mb-6" style="margin-left:250px;">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Matricula</label>
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
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nombre del usuario:</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="text" name="nombre" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Apellido Paterno:</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="text" name="apellidoP" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                                    <input type="text" name="apellidoM" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                        <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                            <span class="required">Tipo de rol:</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <!--begin::Input-->
                                            <select name="rol" aria-label="Seleccione un periodo" data-control="select2" data-placeholder="Seleccione un rol..." class="form-select form-select-solid form-select-lg">
                                                <option value="">Seleccione un rol...</option>
                                                <?php
                                                foreach ($roles as $row) {
                                                    echo "<option" . " value=" . $row["idRol"] . ">" . $row["nombreRol"] . "</option>";
                                                }
                                                ?>
                                            </select>
                                            <!--end::Input-->
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

                                    <!--begin::Input group-->
                                    <div class="row mb-6" style="margin-left:250px;">
                                        <!--begin::Label-->
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Contraseña</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="password" name="contrasena" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                    $('#kt_account_profile_details_form').submit(function(event) {
                                        event.preventDefault(); // Evitar que el formulario se envíe automáticamente

                                        // Obtener los datos del formulario
                                        var formData = new FormData(this);

                                        // Enviar la solicitud AJAX al servidor
                                        $.ajax({
                                            type: 'POST',
                                            url: '?c=estad&a=nuevo_usuario',
                                            data: formData,
                                            dataType: 'json',
                                            processData: false,
                                            contentType: false,
                                            success: function(response) {
                                                // Mostrar mensaje de éxito o error según la respuesta del servidor
                                                if (response.status === 'success') {
                                                    Swal.fire({
                                                        title: 'Éxito',
                                                        text: response.message,
                                                        icon: 'success'
                                                    }).then((result) => {
                                                        // Redireccionar o realizar otras acciones después del éxito
                                                        window.location.href = 'index.php?c=estad&a=index';
                                                    });
                                                } else {
                                                    Swal.fire({
                                                        title: 'Error',
                                                        text: response.message,
                                                        icon: 'error'
                                                    }).then((result) => {
                                                        // Redireccionar o realizar otras acciones después del éxito
                                                        window.location.href = 'index.php?c=estad&a=index';
                                                    });
                                                }
                                            },
                                            error: function(xhr, status, error) {
                                                // Mostrar mensaje de error en caso de error de la solicitud AJAX
                                                Swal.fire({
                                                    title: 'Error',
                                                    text: 'Hubo un error al procesar la solicitud. Por favor, inténtelo de nuevo más tarde.',
                                                    icon: 'error'
                                                }).then((result) => {
                                                    // Redireccionar o realizar otras acciones después del éxito
                                                    window.location.href = 'index.php?c=estad&a=index';
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
    <!--end::Modal - Offer A Deal-->

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
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Custom Javascript-->
    <!-- Grafica alumnos activos e inactivos -->
    <!-- <script>
        // Al cargar la página, obtén las carreras y llénalas en el dropdown
        $(document).ready(function() {
            obtenerCarreras();
        });

        // Guardar la instancia de la gráfica actual
        var myChart;

        // Función para obtener las carreras y llenar el dropdown
        function obtenerCarreras() {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerCarreras',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Llena el dropdown con las carreras
                    var dropdown = $('#carreraSelect');
                    dropdown.empty();
                    $.each(data, function(key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.idCarrera).text(entry.nombreCarrera));
                    });

                    // Asigna un evento al cambio en el dropdown
                    dropdown.change(function() {
                        var nombreCarrera = $(this).val();
                        obtenerDatosCarrera(nombreCarrera);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para obtener y mostrar los datos de la carrera seleccionada
        function obtenerDatosCarrera(nombreCarrera) {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerDatosCarrera',
                type: 'POST',
                data: {
                    nombreCarrera: nombreCarrera
                },
                dataType: 'json',
                success: function(data) {
                    // Llama a la función para dibujar la gráfica con los datos
                    dibujarGrafica(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        // Función para dibujar la gráfica con los datos recibidos
        function dibujarGrafica(datos) {
            // Destruir la instancia de la gráfica actual si existe
            if (myChart) {
                myChart.destroy();
            }

            var ctx = document.getElementById('graficaAlumnos').getContext('2d');

            if (datos.length === 0) {
                // No hay datos, dibuja una gráfica vacía con animación y colores sólidos
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Activos', 'Inactivos'],
                        datasets: [{
                            label: 'Número de Alumnos',
                            data: [0, 0],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            animation: {
                                duration: 1500, // Duración de la animación en milisegundos
                                easing: 'easeInOutQuad', // Tipo de animación (puedes ajustarlo según tus preferencias)
                                onProgress: function(animation) {
                                    // Agregar efecto de crecimiento de las barras
                                    for (var datasetIndex = 0; datasetIndex < myChart.data.datasets.length; datasetIndex++) {
                                        var meta = myChart.getDatasetMeta(datasetIndex);
                                        for (var index = 0; index < meta.data.length; index++) {
                                            var model = meta.data[index]._model;
                                            model.scaleTop = animation.currentStep / animation.numSteps;
                                            model.y = Math.min(animation.currentStep / animation.numSteps, 1) * model.base;
                                            model.height = model.base - model.y;
                                        }
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                // Hay datos, dibuja la gráfica con animación y colores sólidos
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Activos', 'Inactivos'],
                        datasets: [{
                            label: datos[0].country,
                            data: [datos[0].active, datos[0].inactive],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            animation: {
                                duration: 1500, // Duración de la animación en milisegundos
                                easing: 'easeInOutQuad' // Tipo de animación (puedes ajustarlo según tus preferencias)
                            }
                        }
                    }
                });
            }
        }
    </script> -->
    <!-- grafica alumnos aceptados y pendientes  -->

    <!-- <script>
        // Al cargar la página, obtén las sedes y llénalas en el dropdown
        $(document).ready(function() {
            obtenerSedes();
        });

        var myChart2; // Variable para almacenar la instancia de la gráfica

        // Función para obtener las sedes y llenar el dropdown
        function obtenerSedes() {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerSedes',
                type: 'GET',
                dataType: 'json',
                success: function(sedes) {
                    var dropdown = $('#sedeSelect');
                    dropdown.empty();
                    $.each(sedes, function(key, sede) {
                        dropdown.append($('<option></option>').attr('value', sede.IdSede).text(sede.NombreSede));
                    });

                    // Asigna un evento al cambio en el dropdown
                    dropdown.change(function() {
                        var idSede = $(this).val();
                        obtenerDatosSede(idSede);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para obtener y mostrar los datos de la sede seleccionada
        function obtenerDatosSede(idSede) {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerDatosSede',
                type: 'POST',
                data: {
                    idSede: idSede,
                    idPeriodo: 10 // Filtro de idPeriodo
                },
                dataType: 'json',
                success: function(data) {
                    // Llama a la función para dibujar la gráfica con los datos
                    dibujarGrafica(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para dibujar la gráfica con los datos recibidos
        function dibujarGrafica(datos) {
            var ctx = document.getElementById('graficaAlumnosAP').getContext('2d');

            // Destruir la instancia anterior de la gráfica si existe
            if (myChart2) {
                myChart2.destroy();
            }

            // Verificamos si hay datos
            if (datos && Object.keys(datos).length > 0) {
                // Configuración de la gráfica
                var options = {
                    responsive: true,
                    maintainAspectRatio: false,
                };

                // Crea la gráfica de pastel
                myChart2 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Aceptados', 'Pendientes', 'Rechazados'],
                        datasets: [{
                            data: [datos.aceptados, datos.pendientes, datos.rechazados],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: options
                });
            } else {
                // Si no hay datos, muestra una gráfica vacía
                ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            }
        }
    </script> -->
    <!--end::Javascript-->

    <script>
        // Al cargar la página, obtén las carreras y llénalas en el dropdown
        $(document).ready(function() {
            obtenerCarreras();
            obtenerSedes();
        });

        var myChart; // Variable para almacenar la instancia de la gráfica de alumnos activos
        var myChart2; // Variable para almacenar la instancia de la gráfica de alumnos aceptados, pendientes y rechazados

        // Resto de tu código...
        // Función para obtener las carreras y llenar el dropdown
        function obtenerCarreras() {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerCarreras',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Llena el dropdown con las carreras
                    var dropdown = $('#carreraSelect');
                    dropdown.empty();

                    dropdown.append($('<option></option>').attr('value', 0).text("Seleccione"));
                    $.each(data, function(key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.idCarrera).text(entry.nombreCarrera));
                    });

                    // Asigna un evento al cambio en el dropdown
                    dropdown.change(function() {
                        var nombreCarrera = $(this).val();
                        obtenerDatosCarrera(nombreCarrera);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para obtener y mostrar los datos de la carrera seleccionada
        function obtenerDatosCarrera(nombreCarrera) {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerDatosCarrera',
                type: 'POST',
                data: {
                    nombreCarrera: nombreCarrera
                },
                dataType: 'json',
                success: function(data) {
                    // Llama a la función para dibujar la gráfica con los datos
                    dibujarGrafica(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para dibujar la gráfica de alumnos activos e inactivos
        function dibujarGrafica(datos) {
            // Destruir la instancia de la gráfica actual si existe
            if (myChart) {
                myChart.destroy();
            }
            var ctx = document.getElementById('graficaAlumnos').getContext('2d');

            if (datos.length === 0) {
                // No hay datos, dibuja una gráfica vacía con animación y colores sólidos
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Activos', 'Inactivos'],
                        datasets: [{
                            label: 'Número de Alumnos',
                            data: [0, 0],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            animation: {
                                duration: 1500, // Duración de la animación en milisegundos
                                easing: 'easeInOutQuad', // Tipo de animación (puedes ajustarlo según tus preferencias)
                                onProgress: function(animation) {
                                    // Agregar efecto de crecimiento de las barras
                                    for (var datasetIndex = 0; datasetIndex < myChart.data.datasets.length; datasetIndex++) {
                                        var meta = myChart.getDatasetMeta(datasetIndex);
                                        for (var index = 0; index < meta.data.length; index++) {
                                            var model = meta.data[index]._model;
                                            model.scaleTop = animation.currentStep / animation.numSteps;
                                            model.y = Math.min(animation.currentStep / animation.numSteps, 1) * model.base;
                                            model.height = model.base - model.y;
                                        }
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                // Hay datos, dibuja la gráfica con animación y colores sólidos
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Activos', 'Inactivos'],
                        datasets: [{
                            label: datos[0].country,
                            data: [datos[0].active, datos[0].inactive],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            animation: {
                                duration: 1500, // Duración de la animación en milisegundos
                                easing: 'easeInOutQuad' // Tipo de animación (puedes ajustarlo según tus preferencias)
                            }
                        }
                    }
                });
            }
            // Resto de tu código...
        }


        // Función para obtener las sedes y llenar el dropdown
        function obtenerSedes() {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerSedes',
                type: 'GET',
                dataType: 'json',
                success: function(sedes) {
                    var dropdown = $('#sedeSelect');
                    dropdown.empty();
                    dropdown.append($('<option></option>').attr('value', 0).text("Seleccione"));
                    $.each(sedes, function(key, sede) {
                        dropdown.append($('<option></option>').attr('value', sede.IdSede).text(sede.NombreSede));
                    });

                    // Asigna un evento al cambio en el dropdown
                    dropdown.change(function() {
                        var idSede = $(this).val();
                        obtenerDatosSede(idSede);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para obtener y mostrar los datos de la sede seleccionada
        function obtenerDatosSede(idSede) {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerDatosSede',
                type: 'POST',
                data: {
                    idSede: idSede,
                    idPeriodo: 10 // Filtro de idPeriodo
                },
                dataType: 'json',
                success: function(data) {
                    // Llama a la función para dibujar la gráfica con los datos
                    dibujarGraficaAP(data);
                    console.log(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        // Función para dibujar la gráfica de alumnos aceptados, pendientes y rechazados
        function dibujarGraficaAP(datos) {
            // Destruir la instancia anterior de la gráfica si existe
            if (myChart2) {
                myChart2.destroy();
            }

            var ctx = document.getElementById('graficaAlumnosAP').getContext('2d');
            // Resto de tu código...
            // Verificamos si hay datos
            if (datos && Object.keys(datos).length > 0) {
                // Configuración de la gráfica
                var options = {
                    responsive: true,
                    maintainAspectRatio: false,
                };

                // Crea la gráfica de pastel
                myChart2 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Aceptados', 'Pendientes', 'Rechazados'],
                        datasets: [{
                            data: [datos.aceptados, datos.pendientes, datos.rechazados],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: options
                });
            } else {
                // Si no hay datos, muestra una gráfica vacía
                ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            }
        }
    </script>
</body>
<footer>
    <?php include('footer.php') ?>
</footer>
<!--end::Body-->

</html>
