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
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
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
                            <!--begin::Toolbar wrapper-->
                            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
                                <!--begin::Page title-->
                                <div class="page-title d-flex align-items-center me-3">
                                    <img alt="Logo" src="assets/media/svg/misc/layer.svg" class="h-60px me-5" />
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">Nuevos Vacantes</h1>

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
                                                <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="?c=vacantes&a=index_2">Vacantes</a>
                                            </li>
                                            <!--end::Nav item-->
                                            <!--begin::Nav item-->
                                            <li class="nav-item mt-2">
                                                <a class="nav-link text-active-primary ms-0 me-10 py-5" href="?c=periodo&a=show_periodos">Periodo</a>
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
                                <!--begin::Basic info-->
                                <div class="card mb-5 mb-xl-10">
                                    <!--begin::Card header-->
                                    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
                                        <!--begin::Card title-->
                                        <div class="card-title m-0">
                                            <h3 class="fw-bold m-0">Crea un nuevos vacantes</h3>
                                        </div>
                                        <!--end::Card title-->
                                    </div>
                                    <!--begin::Card header-->
                                    <!--begin::Content-->
                                    <div id="kt_account_settings_profile_details" class="collapse show">
                                        <!--begin::Form-->
					<form id="kt_new_vacante_form">

                                            <!--begin::Card body-->
                                            <div class="card-body border-top p-9">
                                                <!--begin::Input group-->
                                                <div class="row mb-6" style="margin-left:250px;">
                                                    <!--begin::Label-->
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                        <span class="required">Sede</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <!--begin::Input-->
                                                        <select name="sede" aria-label="Seleccione una sede" data-control="select2" data-placeholder="Seleccione una sede..." class="form-select form-select-solid form-select-lg">
                                                            <option value="">Seleccione una sede...</option>
                                                            <?php
                                                            foreach ($data as $row) {
                                                                echo "<option data-kt-flag=" . "flags/indonesia.svg" . " value=" . $row["IdSede"] . ">" . $row["NombreSede"] . "</option>";
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
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                        <span class="required">Carrera</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <!--begin::Input-->
                                                        <select name="carrera" aria-label="Seleccione una carrera" data-control="select2" data-placeholder="Seleccione una carrera..." class="form-select form-select-solid form-select-lg">
                                                            <option value="">Seleccione una carrera...</option>
                                                            <?php
                                                            foreach ($result as $row) {
                                                                echo "<option" . " value=" . $row["IdCarrera"] . ">" . $row["nombreCarrera"] . "</option>";
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
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                        <span class="required">Proceso</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <!--begin::Input-->
                                                        <select name="proceso" aria-label="Seleccione un proceso" data-control="select2" data-placeholder="Seleccione un proceso..." class="form-select form-select-solid form-select-lg">
                                                            <option value="">Seleccione un proceso...</option>
                                                            <?php
                                                            foreach ($vacan as $row) {
                                                                echo "<option" . " value=" . $row["IdProceso"] . ">" . $row["NombrePE"] . "</option>";
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
                                                    <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                        <span class="required">Periodo</span>
                                                        <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                            <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                        </span>
                                                    </label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8 fv-row">
                                                        <!--begin::Input-->
                                                        <select name="periodo" aria-label="Seleccione un periodo" data-control="select2" data-placeholder="Seleccione un periodo..." class="form-select form-select-solid form-select-lg">
                                                            <option value="">Seleccione un periodo...</option>
                                                            <?php
                                                            foreach ($peri as $row) {
                                                                echo "<option" . " value=" . $row["IdPeriodo"] . ">" . $row["Meses"] . " " . $row["Año"] . "</option>";
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
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">perfil</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <!--begin::Row-->
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                <input type="text" name="perfil" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Beneficios</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <!--begin::Row-->
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                <input type="text" name="beneficios" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                                    <label class="col-lg-4 col-form-label required fw-semibold fs-6">Numero de vacantes</label>
                                                    <!--end::Label-->
                                                    <!--begin::Col-->
                                                    <div class="col-lg-8">
                                                        <!--begin::Row-->
                                                        <div class="row">
                                                            <!--begin::Col-->
                                                            <div class="col-lg-6 fv-row">
                                                                <input type="text" name="vacantes" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
                                                $('#kt_new_vacante_form').submit(function(event) {
                                                    event.preventDefault(); // Evitar que el formulario se envíe automáticamente

                                                    // Obtener los datos del formulario
                                                    var formData = new FormData(this);

                                                    // Enviar la solicitud AJAX al servidor
                                                    $.ajax({
                                                        type: 'POST',
                                                        url: '?c=vacantes&a=new_vacante',
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
                                                                    window.location.href = 'index.php?c=vacantes&a=index_2';
                                                                });
                                                            } else {
                                                                // Mostrar mensaje de error con SweetAlert
                                                                Swal.fire({
                                                                    title: 'Error',
                                                                    text: response.message,
                                                                    icon: 'error'
                                                                }).then((result) => {
                                                                    // Redireccionar después de mostrar el mensaje de error
                                                                    window.location.href = 'index.php?c=vacantes&a=index_2';
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
                                                                window.location.href = 'index.php?c=vacantes&a=index_2';
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
                                <!--end::Basic info-->
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
    <!--end::App-->
    <!--begin::Drawers-->

    <!--end::Modals-->
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
    <script src="assets/js/custom/account/settings/signin-methods.js"></script>
    <script src="assets/js/custom/account/settings/profile-details.js"></script>
    <script src="assets/js/custom/account/settings/deactivate-account.js"></script>
    <script src="assets/js/custom/pages/user-profile/general.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
    <script src="assets/js/custom/utilities/modals/two-factor-authentication.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
