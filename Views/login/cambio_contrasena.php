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
                              <form id="actualizarContrasenaForm">
                                    <!-- Campo oculto para el idUsuario -->
                                    <input type="hidden" name="idUsuario" value="<?php echo $idUsuario; ?>">

                                    <!-- Nuevos campos para el password -->
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row" style="margin-left:50%;">
                                                <label style="font-size: 140%;" for="nueva_contrasena">Nueva Contraseña:</label>
                                                <input type="password" name="nueva_contrasena" id="nueva_contrasena" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <br>
                                    <div class="col-lg-8">
                                        <!--begin::Row-->
                                        <div class="row">
                                            <!--begin::Col-->
                                            <div class="col-lg-6 fv-row" style="margin-left:50%;">
                                                <label style="font-size: 140%;" for="confirmar_contrasena">Confirmar Contraseña:</label>
                                                <input type="password" name="confirmar_contrasena" id="confirmar_contrasena" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Row-->
                                    </div>
                                    <br>
                                    <div class="d-flex justify-content-between align-items-start flex-wrap mb-2" style="margin-left:45%;">
                                        <button id="actualizarContrasenaBtn" class="btn btn-sm btn-primary me-3" type="button">Actualizar Contraseña</button>
                                    </div>
                                </form>

                                <script>
                                    $(document).ready(function() {
                                        $('#actualizarContrasenaBtn').click(function() {
                                            var nuevaContrasena = $('#nueva_contrasena').val().trim();
                                            var confirmarContrasena = $('#confirmar_contrasena').val().trim();

                                            // Verificar si los passwords coinciden
                                            if (nuevaContrasena !== confirmarContrasena) {
                                                // Los passwords no coinciden, muestra una alerta de error
                                                Swal.fire({
                                                    title: 'Error',
                                                    text: 'Las contrasenas no coinciden. Por favor, inténtelo de nuevo.',
                                                    icon: 'error'
                                                });
                                                return; // Detiene la ejecución
                                            }

                                            var formData = $('#actualizarContrasenaForm').serialize(); // Serializa los datos del formulario

                                            // Envía la solicitud AJAX para actualizar el password
                                            $.ajax({
                                                type: 'POST',
                                                url: 'index.php?c=rcontrasena&a=actualizar_contrasena',
                                                data: formData,
                                                dataType: 'json',
                                                success: function(response) {
                                                    if (response.status === 'success') {
                                                        // La actualización del password fue exitosa
                                                        Swal.fire({
                                                            title: 'Éxito',
                                                            text: '¡Actualización de contraseña exitosa!',
                                                            icon: 'success'
                                                        }).then((result) => {
                                                            // Redirige a index.php después de hacer clic en OK en la alerta
                                                            window.location.href = 'index.php';
                                                        });
                                                    } else {
                                                        // La actualización de  password no fue exitosa
                                                        Swal.fire({
                                                            title: 'Error',
                                                            text: response.message,
                                                            icon: 'error'
                                                        });
                                                    }
                                                },
                                                error: function(xhr, status, error) {
                                                    // Ocurrió un error en la solicitud AJAX
                                                    console.error('Error en la solicitud AJAX: ' + error);
                                                    // Muestra una alerta de error genérica
                                                    Swal.fire({
                                                        title: 'Error',
                                                        text: 'Hubo un error al actualizar la contraseña. Por favor, inténtelo de nuevo más tarde.',
                                                        icon: 'error'
                                                    });
                                                }
                                            });
                                        });
                                    });
                                </script>
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
                            <form id="kt_account_profile_details_form" class="form" action="?c=sedes&a=nueva_sede" method="post">
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
                                                    <input type="text" name="telefono" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required maxlength="10" />
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
                                                    <input type="password" name="contrasena" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
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
