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
    <link href="assets/css/style.bundle_3.css" rel="stylesheet" type="text/css" />
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
            <?php include 'header.php'; ?>
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
                                    <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">Listado de Sedes
                                        <!--begin::Description-->
                                        <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Sedes registradas</span>
                                        <!--end::Description-->
                                    </h1>

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
                                                <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="#">Sedes</a>
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
                                                url: "index.php?c=sedes&a=mostrar_busqueda", // Reemplaza 'buscar_alumnos.php' con la ruta correcta a tu archivo PHP que realiza la búsqueda
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
                                                window.location.href = 'index.php?c=sedes&a=show_sede';
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
                                                <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Agregar Sede</a>
                                            </div>

                                            <div class="d-flex my-4">
                                                <a href="?c=alumno&a=exportarSede" class="btn btn-sm btn-primary me-3" id="exportarPDF">Exportar Excel</a>
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
                                                <table class="table table-row-bordered align-middle gy-6">
                                                    <!--begin::Thead-->
                                                    <thead class="border-bottom border-gray-200 fs-6 fw-bold bg-lighten">
                                                        <tr>
                                                            <th class="min-w-125px ps-9">Logo</th>
                                                            <th class="min-w-125px ps-9">Matricula</th>
                                                            <th class="min-w-125px px-0">Nombre de la sede</th>
                                                            <th class="min-w-125px">Dirección</th>
                                                            <th class="min-w-125px">Correo o Contacto</th>
                                                            <th class="min-w-125px ps-0">Telefono</th>
                                                            <th class="min-w-125px ps-0">Tipo de Sede</th>
                                                            <th class="min-w-125px ps-0">Acción</th>
                                                        </tr>
                                                    </thead>
                                                    <!--end::Thead-->
                                                    <!--begin::Tbody-->
                                                    <tbody id="alumnos" class="fs-6 fw-semibold text-gray-600">
                                                        <?php

                                                        foreach ($data as $row) {
                                                            echo "<tr>";
                                                            echo "<td class='ps-9'>";

                                                            // Verificamos si se obtuvo un logo desde la base de datos
                                                            if (!empty($row["Logo"])) {
                                                                // Mostramos la imagen directamente desde la base de datos
                                                                $imageSrc = "data:image/jpeg;base64," . base64_encode($row["Logo"]);
                                                                echo "<img src='{$imageSrc}' alt='Logo de la sede' style='max-width: 100px; max-height: 100px;' type='image/jpeg'>";
                                                                echo "<script>console.log('Ruta de la imagen:', '{$imageSrc}');</script>";
                                                            } else {
                                                                // Si no hay un logo, mostramos un mensaje o un marcador de posición
                                                                echo "Sin logo";
                                                                echo "<script>console.log('Sin imagen');</script>";
                                                            }

                                                            echo "</td>";
                                                            echo "<td class='ps-9'>" . $row["IdSede"] . "</td>";
                                                            echo "<td class='ps-0'>" . $row["NombreSede"] . "</td>";
                                                            echo "<td style='margin-left: 10px;'>" . $row["Dirección"] . "</td>";
                                                            echo "<td style='margin-left: 10px;'>" . $row["CorreoContacto"] . "</td>";
                                                            echo "<td style='margin-left: 10px;'>" . $row["Telefono"] . "</td>";
                                                            echo "<td style='margin-left: 10px;'>" . $row["tiposede"] . "</td>";
                                                            echo "<td style='margin-left: 10px;'><a href='index.php?c=sedes&a=edit_sede&id=" . $row["IdSede"] . "'>Editar Sede</a></td>";
                                                            echo "</tr>";

                                                            // Imprimimos información sobre la imagen directamente
                                                            echo "<script>console.log('Datos binarios de la imagen:', '" . base64_encode($row["Logo"]) . "');</script>";
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
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>
    <!--end::App-->

    <!--begin::Modal - Offer A Deal-->
    <div class="modal fade" id="kt_modal_offer_a_deal" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-1000px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header py-7 d-flex justify-content-between">
                    <!--begin::Modal title-->
                    <h2>Agrega una nueva sede</h2>
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
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nombre de la Sede</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="text" name="nombre_sede" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Dirrección</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="text" name="direccion" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Correo o contacto</label>
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
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Telefono</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="text" name="telefono" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required pattern="\d{10}" title="Ingrese un número de teléfono válido (10 dígitos)" maxlength="10" />
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
                                            <span class="required">Tipo de sede</span>
                                            <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                            </span>
                                        </label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8 fv-row">
                                            <!--begin::Input-->
                                            <select name="tiposede" aria-label="Seleccione un periodo" data-control="select2" data-placeholder="Seleccione un periodo..." class="form-select form-select-solid form-select-lg">
                                                <option value="">Seleccione una opcion...</option>
                                                <option value="Publica">Publica</option>
                                                <option value="Privada">Privada</option>
                                            </select>
                                            <!--end::Input-->
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
                                                    <input type="password" name="contraseña" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nombre del encargado de la sede:</label>
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
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Apellido paterno:</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="text" name="apellidop" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">Apellido materno:</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="text" name="apellidom" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                        <label class="col-lg-4 col-form-label required fw-semibold fs-6">logo (opcional):</label>
                                        <!--end::Label-->
                                        <!--begin::Col-->
                                        <div class="col-lg-8">
                                            <!--begin::Row-->
                                            <div class="row">
                                                <!--begin::Col-->
                                                <div class="col-lg-6 fv-row">
                                                    <input type="file" name="logo" id="logo" accept="image/*" onchange="mostrarVistaPrevia(event)">
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Col-->
                                    </div>
                                    <!--end::Input group-->


                                    <div class="row mb-6" style="margin-left:330px;">
                                        <style>
                                            #vistaPrevia {
                                                display: none;
                                                border: 2px solid #ccc;
                                                padding: 5px;
                                                width: 70%;
                                                /* Ancho del contenedor */
                                                max-width: 300px;
                                                /* Ancho máximo del contenedor para evitar que se expanda demasiado en pantallas grandes */
                                                height: auto;
                                                /* Ajusta la altura automáticamente */
                                            }

                                            #vistaPrevia img {
                                                width: 100%;
                                                /* Asegura que la imagen se ajuste al contenedor */
                                                height: auto;
                                                /* Mantiene la proporción original de la imagen */
                                                display: block;
                                            }
                                        </style>
                                        <div id="vistaPrevia"></div>

                                        <script>
                                            function mostrarVistaPrevia(event) {
                                                const file = event.target.files[0];
                                                const vistaPrevia = document.getElementById('vistaPrevia');

                                                if (file) {
                                                    const lector = new FileReader();
                                                    lector.onload = function(e) {
                                                        const imagen = document.createElement('img');
                                                        imagen.src = e.target.result;
                                                        vistaPrevia.innerHTML = '';
                                                        vistaPrevia.appendChild(imagen);
                                                        vistaPrevia.style.display = 'block'; // Mostrar el marco cuando se carga la imagen
                                                    }
                                                    lector.readAsDataURL(file);
                                                } else {
                                                    vistaPrevia.innerHTML = 'Vista previa no disponible';
                                                    vistaPrevia.style.display = 'none'; // Ocultar el marco si no hay imagen
                                                }
                                            }
                                        </script>
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
                            <!--end::Form-->
<script src="ruta/a/jquery.js"></script>
                            <script src="ruta/a/sweetalert.min.js"></script>
                            <script>
                                $(document).ready(function() {
                                    $('#kt_account_profile_details_form').submit(function(event) {
                                        event.preventDefault(); // Evitar que el formulario se envíe automáticamente

                                        // Obtener los datos del formulario
                                        var formData = new FormData(this);

                                        // Enviar la solicitud AJAX al servidor
                                        $.ajax({
                                            type: 'POST',
                                            url: '?c=sedes&a=nueva_sede',
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
                                                        window.location.href = 'index.php?c=sedes&a=show_sede';
                                                    });
                                                } else {
                                                    // Mostrar mensaje de error con SweetAlert
                                                    Swal.fire({
                                                        title: 'Error',
                                                        text: response.message,
                                                        icon: 'error'
                                                    }).then((result) => {
                                                        // Redireccionar después de mostrar el mensaje de error
                                                        window.location.href = 'index.php?c=sedes&a=show_sede';
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
                                                    window.location.href = 'index.php?c=sedes&a=show_sede';
                                                });
                                            }
                                        });
                                    });
                                });
                            </script>
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
    <script src="assets/js/custom/account/referrals/referral-program.js"></script>
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
