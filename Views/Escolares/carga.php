<!DOCTYPE html>
<html lang="es">
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
                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                    <!--begin::Actions-->
                                    <div class="d-flex my-4">
                                        <a href="#" class="btn btn-sm btn-primary me-3" data-bs-toggle="modal" data-bs-target="#kt_modal_offer_a_deal">Registrar Alumno</a>
                                    </div>
                                    <!--end::Actions-->
                                </div>
                                <!--begin::Card body-->
                                <div class="card-body pt-0">
                                    <div class="fv-row mb-6">
                                        <form action="?c=importar&a=importar" method="POST" enctype="multipart/form-data" onsubmit="return validarArchivo()">
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
                                    <!--begin::Table-->
                                    <div class="table table-striped">
                                        <table class="table-responsive table align-middle table-row-dashed fs-8 gy-5" id="kt_customers_table">
                                            <thead class="bg-primary">
                                                <tr class=" text-start text-gray-100 fw-bold fs-7  gs-0">
                                                    <th class="textoTabla min-w-25px">Matricula</th>
                                                    <th class="textoTabla min-w-25px">Nombre</th>
                                                    <th class="textoTabla min-w-25px">Apellido Paterno</th>
                                                    <th class="textoTabla min-w-25px">Apellido Materno</th>
                                                    <th class="textoTabla min-w-25px">Telefono</th>
                                                    <th class="textoTabla min-w-25px">Email</th>
                                                    <th class="textoTabla min-w-25px">Carrera</th>
                                                    <th class="textoTabla min-w-25px">Proceso</th>
                                                    <th class="textoTabla min-w-25px">Periodo</th>
                                                    <th class="textoTabla min-w-25px">Estatus</th>
                                                    <th class="textoTabla min-w-25px">Acciones</th>

                                                </tr>
                                            </thead>

                                            <tbody class="fw-semibold text-gray-800">
                                                <?php
                                                foreach ($alumnos as $row) {
                                                    $estatus = $row['Estatus'] == 1 ? 'Activo' : 'Inactivo';
                                                    $color = $row['Estatus'] == 1 ? 'green' : 'red';
                                                    echo "<tr>";
                                                    echo "<td>" . $row['Matricula'] . "</td>";
                                                    echo "<td>" . $row['NombreA'] . "</td>";
                                                    echo "<td>" . $row['ApellidoP'] . "</td>";
                                                    echo "<td>" . $row['ApellidoM'] . "</td>";
                                                    echo "<td>" . $row['Telefono'] . "</td>";
                                                    echo "<td>" . $row['CorreoE'] . "</td>";
                                                    echo "<td>" . $row['Carrera'] . "</td>";
                                                    echo "<td>" . $row["Proceso"] . "</td>";
                                                    echo "<td>" . $row["Periodo"] . "</td>";
                                                    // Celda del estatus con color
                                                    echo "<td class='status-cell' style='color: $color;'>$estatus</td>"; // Mostrar el estado aquí
                                                    $matricula = $row['Matricula'];
                                                    echo "<td style='margin-left: 10px;'><a href='?c=registro&a=estatus_editado&matricula=$matricula' class='btn btn-sm btn-primary me-3'>Activar/Desactivar</a></td>";
                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->


                                    <div>
                                        <a href="?c=escolars&a=statusA" id="activarDesactivarTodos" class="btn btn-sm btn-primary me-3">
                                            Activar Todos
                                        </a>
                                        <a href="?c=escolars&a=statusI" id="activarDesactivarTodos" class="btn btn-sm btn-primary me-3">
                                            Desactivar Todos
                                        </a>
                                    </div>
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

        <!--begin::Modal - Offer A Deal-->
        <div class="modal fade" id="kt_modal_offer_a_deal" tabindex="-1" aria-hidden="true">
            <!--begin::Modal dialog-->
            <div class="modal-dialog modal-dialog-centered mw-1000px">
                <!--begin::Modal content-->
                <div class="modal-content">
                    <!--begin::Modal header-->
                    <div class="modal-header py-7 d-flex justify-content-between">
                        <!--begin::Modal title-->
                        <h2>Registro de alumnos</h2><br><br><br>
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
                                <form id="kt_account_profile_details_form" class="form" action="index.php?c=escolars&a=cargarAlumnoIndividual" method="post">
                                    <!--begin::Card body
                                            index.php?c=escolars&a=registro.php
                                    -->
                                    <div class="card-body border-top p-9">
                                        <!--begin::Input group-->
                                        <div class="row mb-6" style="margin-left:230px;">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Matricula del alumno</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-7 fv-row">
                                                        <input type="number" name="matricula" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required pattern="[0-9]{8}" oninput="bloquearCampo(this, 8)" onblur="resaltarCampoVacio(this)" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6" style="margin-left:230px;">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nombre(s) del alumno</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-7 fv-row">
                                                        <input type="text" name="nombre_alumno" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required onblur="resaltarCampoVacio(this)" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6" style="margin-left:230px;">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Apellido Paterno</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-7 fv-row">
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
                                        <div class="row mb-6" style="margin-left:230px;">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Apellido Materno</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-7 fv-row">
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
                                        <div class="row mb-6" style="margin-left:230px;">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Correo institucional</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-7 fv-row">
                                                        <input type="email" name="correo" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6" style="margin-left:230px;">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Telefono</label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-8">
                                                <!--begin::Row-->
                                                <div class="row">
                                                    <!--begin::Col-->
                                                    <div class="col-lg-7 fv-row">
                                                        <input type="number" name="telefono" class="form-control form-control-lg form-control-solid mb-3 mb-lg-0" required pattern="[0-9]{10}" oninput="bloquearCampo(this, 10)" onblur="resaltarCampoVacio(this)" />
                                                    </div>
                                                    <!--end::Col-->
                                                </div>
                                                <!--end::Row-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->

                                        <!--begin::Input group-->
                                        <div class="row mb-6" style="margin-left:230px;">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">Carrera</span>
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-5"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-5 fv-row">
                                                <!--begin::Input-->
                                                <select id="carrera" name="carrera" aria-label="Seleccione una carrera" data-control="select2" data-placeholder="Seleccione una carrera..." class="form-select form-select-solid form-select-lg">
                                                    <option value="">Seleccione una carrera...</option>
                                                    <?php
                                                    foreach ($resultCarrera as $row) {
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
                                        <div class="row mb-6" style="margin-left:230px;">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">Proceso</span>
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-5 fv-row">
                                                <!--begin::Input-->
                                                <select id="proceso" name="proceso" aria-label="Seleccione un proceso" data-control="select2" data-placeholder="Seleccione un proceso..." class="form-select form-select-solid form-select-lg">
                                                    <option value="">Seleccione un proceso...</option>
                                                    <?php
                                                    foreach ($resultProcesos as $procesos) {
                                                        echo "<option" . " value=" . $procesos["IdProceso"] . ">" . $procesos["NombrePE"] . "</option>";
                                                    }
                                                    ?>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                        <!--Begin::Input groupl-->
                                        <div class="row mb-6" style="margin-left:230px;">
                                            <!--begin::Label-->
                                            <label class="col-lg-4 col-form-label fw-semibold fs-6">
                                                <span class="required">Periodo</span>
                                                <span class="ms-1" data-bs-toggle="tooltip" title="Country of origination">
                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                </span>
                                            </label>
                                            <!--end::Label-->
                                            <!--begin::Col-->
                                            <div class="col-lg-5 fv-row">
                                                <!--begin::Input-->
                                                <select id="periodo" name="periodo" aria-label="Seleccione un periodo" data-control="select2" data-placeholder="Seleccione un periodo..." class="form-select form-select-solid form-select-lg">
                                                    <option value="">Seleccione un periodo...</option>
                                                    <?php foreach ($resultPeriodo as $periodo) : ?>
                                                        <option value="<?php echo $periodo['IdPeriodo']; ?>">
                                                            <?php echo $periodo['Meses'] . ' ' . $periodo['Año']; ?>
                                                        </option>
                                                    <?php endforeach; ?>
                                                </select>
                                                <!--end::Input-->
                                            </div>
                                            <!--end::Col-->
                                        </div>
                                        <!--end::Input group-->
                                    </div>
                                    <!--end::Card body-->
                                    <!--begin::Actions-->
                                    <div class="card-footer d-flex justify-content-end py-4 px-9">
                                        <button type="submit" class="btn btn-primary" id="kt_account_profile_details_submit">Registrar Alumno</button>
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
                        url: "config/cambiarEstado.php",
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
                        url: "config/cambiarEstado.php",
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
        </script>
        <!--end::Custom Javascript-->
        <!--end::Javascript-->
</body>
<!--end::Body-->

</html>