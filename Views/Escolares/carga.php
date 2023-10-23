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
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet type="text/css" />
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
                                        <a href="index.php?c=escolars&a=index" class="text-white text-hover-primary">
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
                                        DEPARTAMENTO DE SERVICIOS ESCOLARES
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
                                <!--begin::Card header-->
                                <div class="card-header align-items-center py-5 gap-2 gap-md-5">
                                    <!--begin::Card toolbar-->
                                    <div class="card-toolbar flex-row-fluid justify-content-between gap-5">
                                        <!--begin::Add product-->
                                        <a href="?c=carreras&a=registro" class="btn btn-primary">Registrar Alumno</a>
                                        <!--end::Add product-->
                                    </div>
                                    <!--end::Card toolbar-->
                                </div>
                                <!--end::Card header-->
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="fv-row mb-6">
                                        <form action="Controllers/Importar.php" method="POST" enctype="multipart/form-data" onsubmit="return validarArchivo()">
                                            <div class="dz-message needsclick">
                                                <!-- Icono y texto centrados -->
                                                <i class="ki-outline ki-file-up text-primary fs-5x"></i>
                                                <div class="ms-4">
                                                    <h3 class="fs-5 fw-bold text-gray-1000 mb-1">Subir Archivo</h3>
                                                </div>
                                            </div>
                                            <input type="file" class="form-control" name="archivo" accept=".xlsx"><br>
                                            <input type="submit" value="Subir Archivo" class="btn btn-primary">
                                        </form>
                                    </div>

                                    <!-- begin::Table -->
                                    <table class="table table-striped">
                                        <h2>Listado de estudiantes</h2>
                                        <tr>
                                            <th>Matrícula</th>
                                            <th>Nombre</th>
                                            <th>Apellido Paterno</th>
                                            <th>Apellido Materno</th>
                                            <th>Teléfono</th>
                                            <th>Correo</th>
                                            <th>Carrera</th>
                                            <th>Proceso</th>
                                            <th>Estatus</th>
                                            <th>Acciones</th>
                                        </tr>

                                        <?php
                                        foreach ($alumnos as $row) {
                                            $estatus = $row['Estatus'] == 1 ? 'Activo' : 'Inactivo';
                                            $color = $row['Estatus'] == 1 ? 'text-success' : 'text-danger';

                                            echo "<tr data-alumno-id='{$row['Matricula']}'>";
                                            echo "<td>" . $row['Matricula'] . "</td>";
                                            echo "<td>" . $row['NombreA'] . "</td>";
                                            echo "<td>" . $row['ApellidoP'] . "</td>";
                                            echo "<td>" . $row['ApellidoM'] . "</td>";
                                            echo "<td>" . $row['Telefono'] . "</td>";
                                            echo "<td>" . $row['CorreoE'] . "</td>";
                                            echo "<td>" . $row['Carrera'] . "</td>";

                                            // Muestra el nombre del proceso obtenido de la tabla proceso
                                            if ($row['Proceso']) {
                                                echo "<td>" . $row['Proceso'] . "</td>";
                                            } else {
                                                echo "<td>Sin proceso</td>";
                                            }

                                            echo "<td class='status-cell $color'>$estatus</td>";
                                            echo "<td>
                                                <button class='btn btn-activar' data-alumno-id='{$row['Matricula']}' data-alumno-estatus='{$row['Estatus']}'>
                                                    Activar
                                                </button>
                                                <button class='btn btn-desactivar' data-alumno-id='{$row['Matricula']}' data-alumno-estatus='{$row['Estatus']}'>
                                                    Desactivar
                                                </button>
                                            </td>";
                                            echo "</tr>";
                                        }
                                        echo "</table>";
                                        ?>
                                    </table>

                                    <button class="btn-activar-todos">Activar/Desactivar Todos</button>
                                </div>
                            </div>
                            <!--end::Content wrapper-->
                        </div>
                        <!--end:::Main-->
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
        <script src="formulario.js"></script>
		<script>
    // Script jQuery para manejar los clics en los botones de activar/desactivar
    $(document).ready(function() {
        // Botones individuales
        $('.btn-activar').on('click', function() {
            var alumnoId = $(this).data('alumno-id');
            var alumnoEstatus = $(this).data('alumno-estatus');
            // Realiza aquí la lógica para activar/desactivar al alumno con ID 'alumnoId'
            // Puedes usar AJAX para enviar una solicitud al servidor y actualizar el estado del alumno en la base de datos
            if (alumnoEstatus === 1) {
                desactivarAlumno(alumnoId);
            } else {
                activarAlumno(alumnoId);
            }
        });

        // Botón para activar/desactivar todos
        $('.btn-activar-todos').on('click', function() {
            // Realiza aquí la lógica para activar/desactivar todos los alumnos
            // Puedes usar AJAX para enviar una solicitud al servidor y actualizar el estado de todos los alumnos en la base de datos
            var activarTodos = confirm("¿Deseas activar/desactivar a todos los alumnos?");
            if (activarTodos) {
                var accion = activarTodos ? 'activar' : 'desactivar';
                actualizarTodosLosAlumnos(accion);
            }
        });

        function activarAlumno(alumnoId) {
            // Lógica para activar el alumno con el ID proporcionado
            $.ajax({
                type: "POST",
                url: "tu_ruta_para_activar_alumno.php",
                data: {
                    alumnoId: alumnoId
                },
                success: function(response) {
                    // Actualiza el estado del botón y muestra un mensaje de éxito
                    $('[data-alumno-id="' + alumnoId + '"]').find('.btn-activar').data('alumno-estatus', 1);
                    $('[data-alumno-id="' + alumnoId + '"]').find('.status-cell').text('Activo').removeClass('text-danger').addClass('text-success');
                    alert('Alumno activado con éxito.');
                }
            });
        }

        function desactivarAlumno(alumnoId) {
            // Lógica para desactivar el alumno con el ID proporcionado
            $.ajax({
                type: "POST",
                url: "tu_ruta_para_desactivar_alumno.php",
                data: {
                    alumnoId: alumnoId
                },
                success: function(response) {
                    // Actualiza el estado del botón y muestra un mensaje de éxito
                    $('[data-alumno-id="' + alumnoId + '"]').find('.btn-activar').data('alumno-estatus', 0);
                    $('[data-alumno-id="' + alumnoId + '"]').find('.status-cell').text('Inactivo').removeClass('text-success').addClass('text-danger');
                    alert('Alumno desactivado con éxito.');
                }
            });
        }

        function actualizarTodosLosAlumnos(accion) {
            // Lógica para activar o desactivar a todos los alumnos
            $.ajax({
                type: "POST",
                url: "tu_ruta_para_actualizar_todos_los_alumnos.php",
                data: {
                    accion: accion
                },
                success: function(response) {
                    if (accion === 'activar') {
                        $('.status-cell').text('Activo').removeClass('text-danger').addClass('text-success');
                    } else {
                        $('.status-cell').text('Inactivo').removeClass('text-success').addClass('text-danger');
                    }
                    alert('Todos los alumnos fueron ' + (accion === 'activar' ? 'activados' : 'desactivados') + ' con éxito.');
                }
            });
        }
    });
</script>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
</body>
<!--end::Body-->

</html>