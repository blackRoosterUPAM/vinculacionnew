<!DOCTYPE html>
<html lang="en">
<!--Inicio del head-->

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
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet type=" text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet type=" text/css" />
    <!--end::Global Stylesheets Bundle-->
    <script>
        // Frame-busting to prevent the site from being loaded within a frame without permission (click-jacking)
        if (window.top != window.self) {
            window.top.location.replace(window.self.location.href);
        }
    </script>
</head>

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
            <?php include('header.php'); ?>
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
                                        <a href="index.php?c=ptc&a=index" class="text-white text-hover-primary">
                                            <i class="ki-outline ki-home text-white fs-3"></i>
                                        </a>
                                    </li>
                                </ul>
                                <!--end::Breadcrumb-->
                            </div>
                            <!--end::Toolbar wrapper-->
                            <!--begin::Toolbar wrapper-->
                            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
                                <!--begin::Page title-->
                                <div class="page-title d-flex align-items-center me-3">
                                    <img alt="Logo" src="assets/media/svg/misc/layer.svg" class="h-60px me-5" />
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">
                                        POFESOR DE TIEMPO COMPLETO PTC
                                    </h1>
                                    <!--end::Title-->
                                </div>
                                <!--end::Page title-->
                            </div>
                            <!--end::Toolbar wrapper-->
                        </div>
                        <!--end::Toolbar container-->
                    </div>
                    <!--end::Toolbar container-->
                </div>
                <!--end::Toolbar-->
                <!--begin::Wrapper container-->
                <div class="app-container container-xxl">
                    <!--begin::Main-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content">
                            <!--begin::Products-->
                            <div class="card card-flush">
                                <!--begin::Card body-->
                                <div class="card-body pt-0">

                                    <!-- begin::Table -->
                                    <table class="table table-striped">
                                        <thead>
                                            <tr class="table-primary">
                                                <th>Matrícula</th>
                                                <th>Proceso</th>
                                                <th>Nombre del Documento</th>
                                                <th>Documento PDF</th>
                                                <th>EstatusPtc</th>
                                                <th>EstatusVinc</th>
                                                <th>Acciones</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            foreach ($solicitudes as $solicitud) {
                                                echo "<tr id='solicitud-" . $solicitud['Matricula'] . "'>";
                                                echo "<td>" . $solicitud['Matricula'] . "</td>";
                                                echo "<td>" . $solicitud['Proceso'] . "</td>";
                                                echo "<td>" . $solicitud['NombreDoc'] . "</td>";

                                                // Mostrar el PDF en un elemento <embed>
                                                echo "<td>";
                                                if (isset($solicitud['DocumentoPDF']) && $solicitud['DocumentoPDF']) {
                                                    echo '<embed src="data:application/pdf;base64,' . $solicitud['DocumentoPDF'] . '" type="application/pdf" width="300" height="200">';
                                                } else {
                                                    echo "PDF no disponible";
                                                }
                                                echo "</td>";

                                                echo "<td>";
                                                if (isset($solicitud['EstatusPtc'])) {
                                                    if ($solicitud['EstatusPtc'] == 1) {
                                                        echo "<span class='text-success'>PDF Válido</span>";
                                                    } else {
                                                        echo "<span class='text-danger'>PDF No Válido</span>";
                                                    }
                                                } else {
                                                    echo "<span class='text-danger'>Documento Inválido</span>";
                                                }
                                                echo "</td>";

                                                echo "<td>";
                                                if (isset($solicitud['EstatusVinc'])) {
                                                    if ($solicitud['EstatusVinc'] == 1) {
                                                        echo "<span class='text-success'>Validado</span>";
                                                    } else {
                                                        echo "<span class='text-danger'>No Validado</span>";
                                                    }
                                                } else {
                                                    echo "<span class='text-danger'>Documento Inválido</span>";
                                                }
                                                echo "</td>";

                                                echo "<td>";
                                                echo "<button class='btn btn-success' onclick='validarDocumento(" . $solicitud['Matricula'] . ")'>PDF Válido</button>";
                                                echo "<button class='btn btn-danger' onclick='invalidarDocumento(" . $solicitud['Matricula'] . ")'>PDF No Válido</button>";
                                                echo "</td>";
                                                echo "</tr>";
                                            }
                                            ?>
                                        </tbody>
                                    </table>


                                </div>
                            </div>
                            <!--end::Content wrapper-->
                        </div>
                        <!--end:::Main-->
                        <!--begin::fooder-->
                        <?php
                        include('footer.php');
                        ?>
                        <!--end::fooder-->
                    </div>
                    <!--end::Wrapper-->
                </div>
                <!--end::Page-->
            </div>
        </div>
        <!--end::App-->
        <!--begin::Drawers-->

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
        <script>
            function validarDocumento(matricula) {
                // Hacer una petición AJAX para actualizar el estado EstatusPtc en la base de datos
                $.ajax({
                    method: "POST",
                    url: "config/actualizarEstado.php", // Asegúrate de especificar la ruta correcta de tu script PHP
                    data: {
                        matricula: matricula,
                        estatus: 1 // 1 para PDF Válido
                    },
                    success: function(response) {
                        // Actualizar la fila en la tabla
                        $("#solicitud-" + matricula + " .text-danger").removeClass("text-danger").addClass("text-success").text("PDF Válido");
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }

            function invalidarDocumento(matricula) {
                // Hacer una petición AJAX similar a la función anterior, pero con estatus: 0 para PDF No Válido
                $.ajax({
                    method: "POST",
                    url: "config/actualizarEstado.php", // Asegúrate de especificar la ruta correcta de tu script PHP
                    data: {
                        matricula: matricula,
                        estatus: 0 // 0 para PDF No Válido
                    },
                    success: function(response) {
                        // Actualizar la fila en la tabla
                        $("#solicitud-" + matricula + " .text-success").removeClass("text-success").addClass("text-danger").text("PDF No Válido");
                    },
                    error: function(error) {
                        console.log(error);
                    }
                });
            }
        </script>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
</body>
<!--end::Body-->

</html>