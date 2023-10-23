<!DOCTYPE html>
<html lang="es">

<head>
    <base href="" />
    <title>UPAM</title>
    <meta charset="utf-8" />
    <meta name="description" content="The most advanced Bootstrap 5 Admin Theme with 40 unique prebuilt layouts on Themeforest trusted by 100,000 beginners and professionals. Multi-demo, Dark Mode, RTL support and complete React, Angular, Vue, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel versions. Grab your copy now and get life-time updates for free." />
    <meta name="keywords" content="metronic, bootstrap, bootstrap 5, angular, VueJs, React, Asp.Net Core, Rails, Spring, Blazor, Django, Express.js, Node.js, Flask, Symfony & Laravel starter kits, admin themes, web design, figma, web development, free templates, free admin themes, bootstrap theme, bootstrap template, bootstrap dashboard, bootstrap dak mode, bootstrap button, bootstrap datepicker, bootstrap timepicker, fullcalendar, datatables, flaticon" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_es" />
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
                            <div class="d-flex align-items-center pt-1">
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-white fw-bold lh-1">
                                        <a href="index.php?c=escolars&a=index" class="text-white text-hover-primary">
                                            <i class="ki-outline ki-home text-white fs-3"></i>
                                        </a>
                                    </li>
                                    <!--end::Item-->

                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Toolbar wrapper=-->
                            <!--begin::Toolbar wrapper=-->
                            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
                                <!--begin::Page title-->
                                <div class="page-title d-flex align-items-center me-3">
                                    <img alt="Logo" src="assets/media/svg/misc/layer.svg" class="h-60px me-5" />
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">
                                        REGISTRO DE NUEVOS ALUMNOS
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
                                <div class="container">
                                    <div class="row justify-content-center">
                                        <div class="col-md-4">
                                            <form id="formulario" action="index.php?c=escolars&a=registro.php" method="post" novalidate>
                                                <h1 style="text-align: center; font-size: 18px;">REGISTRO DE NUEVOS ALUMNOS</h1><br><br>
                                                <div class="form-group">
                                                    <label for="matricula">MATRICULA DEL ALUMNO:</label>
                                                    <input type="number" class="form-control" id="matricula" name="matricula" required pattern="[0-9]{8}" oninput="bloquearCampo(this, 8)" onblur="resaltarCampoVacio(this)">
                                                    <div class="invalid-feedback">La matrícula debe tener 8 caracteres alfanuméricos.</div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="nombre">NOMBRE(S) DEL ALUMNO:</label>
                                                    <input type="text" class="form-control" id="nombre" name="nombre" required pattern="^[A-Za-z\s]+$">
                                                    <div class="invalid-feedback">Ingrese un nombre válido.</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="apellido_paterno">APELLIDO PATERNO:</label>
                                                    <input type="text" class="form-control" id="apellido_paterno" name="apellido_paterno" required pattern="^[A-Za-z\s]+$">
                                                    <div class="invalid-feedback">Ingrese un apellido paterno válido.</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="apellido_materno">APELLIDO MATERNO:</label>
                                                    <input type="text" class="form-control" id="apellido_materno" name="apellido_materno" required pattern="^[A-Za-z\s]+$">
                                                    <div class="invalid-feedback">Ingrese un apellido materno válido.</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="telefono">TELEFONO:</label>
                                                    <input type="number" class="form-control" id="telefono" name="telefono" required pattern="[0-9]{10}" oninput="bloquearCampo(this, 10)" onblur="resaltarCampoVacio(this)">
                                                    <div class="invalid-feedback">El teléfono debe tener 10 dígitos numéricos.</div>
                                                </div>

                                                <div class="form-group">
                                                    <label for="correo">CORREO ELECTRONICO:</label>
                                                    <input type="email" class="form-control" id="correo" name="correo" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="carrera">CARRERA:</label>
                                                    <select id="carrera" name="carrera" aria-label="Seleccione una Carrera" data-control="select2" data-placeholder="Seleccione una Carrera..." class="form-select form-select-solid form-select-lg">
                                                        <option value="">Seleccione una Carrera...</option>
                                                        <?php
                                                        foreach ($resultCarrera as $row) {
                                                            echo "<option value=" . $row["IdCarrera"] . ">" . $row["NombrePE"] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                </div>

                                                <div class="form-group">
                                                    <label for="proceso">PROCESO:</label>
                                                    <select id="proceso" name="proceso" aria-label="Seleccione un proceso" data-control="select2" data-placeholder="Seleccione un Proceso"  class="form-select form-select-solid form-select-lg">
                                                        <option value="">--Seleccione el proceso en curso--</option>
                                                        <?php
                                                        foreach ($resultProcesos as $proceso) {
                                                            echo "<option value=" . $proceso["IdProceso"] . ">" . $proceso["NombrePE"] . "</option>";
                                                        }
                                                        ?>
                                                    </select>
                                                    <br><br>
                                                    <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#cerrarModal" onclick="cerrarModal()">Cancelar</button>
                                                    <button type="button" id="registrarBtn" class="btn btn-primary" onclick="validarFormulario()">Registrar Alumno</button>
                                                    <input type="hidden" id="contrasena" name="contrasena" value="">
                                            </form>
                                        </div>
                                    </div>
                                </div>
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

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    <!--end::Scrolltop-->

    <!--begin::Javascript-->
    <script src="assets/js/vinculacion.js"></script>
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
    <script src="assets/js/custom/apps/ecommerce/catalog/products.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="formulario.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>

</html>