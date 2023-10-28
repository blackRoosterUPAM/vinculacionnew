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
    <title>
        UPAM - Vinculación
    </title>
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
                themeMode =
                    document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ?
                    "dark" :
                    "light";
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
                            <div class="d-flex align-items-center pt-1">
                                <!--begin::Breadcrumb-->
                                <ul class="breadcrumb breadcrumb-separatorless fw-semibold">
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-white fw-bold lh-1">
                                        <a href="index.php?c=alumno" class="text-white text-hover-primary">
                                            <i class="ki-outline ki-home text-white fs-3"></i>
                                        </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-white fw-bold lh-1">
                                        Perfil
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
                                        Cuenta Alumno
                                        <!--begin::Description-->
                                        <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Inicio</span>
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
                                <!--begin::Navbar-->
                                <div class="card mb-5 mb-xl-10">
                                    <div class="card-body pt-9 pb-0">
                                        <!--begin::Details-->
                                        <div class="d-flex flex-wrap flex-sm-nowrap">
                                            <!--begin: Pic-->
                                            <div class="me-7 mb-4">
                                                <div class="symbol symbol-100px symbol-lg-160px symbol-fixed position-relative">
                                                    <img src="assets/media/avatars/gallo.jpg" alt="image" />
                                                    <div class="position-absolute translate-middle bottom-0 start-100 mb-6 bg-success rounded-circle border border-4 border-body h-20px w-20px">
                                                    </div>
                                                </div>
                                            </div>
                                            <!--end::Pic-->
                                            <!--begin::Info-->
                                            <div class="flex-grow-1">
                                                <!--begin::Title-->
                                                <div class="d-flex justify-content-between align-items-start flex-wrap mb-2">
                                                    <!--begin::User-->
                                                    <div class="d-flex flex-column">
                                                        <!--begin::Name-->
                                                        <div class="d-flex align-items-center mb-2">
                                                            <a href="#" class="text-gray-900 text-hover-primary fs-2 fw-bold me-1"><?php echo $nombre . " " . $apellidoP . " " . $apellidoM; ?></a>
                                                            <a href="#">
                                                                <i class="ki-outline ki-verify fs-1 text-primary"></i>
                                                            </a>
                                                        </div>
                                                        <!--end::Name-->
                                                        <!--begin::Info-->
                                                        <div class="d-flex flex-wrap fw-semibold fs-6 mb-4 pe-2">
                                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                                <i class="ki-outline ki-book-square fs-4 me-1"></i><?php echo $carrera; ?></a>
                                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary me-5 mb-2">
                                                                <i class="ki-outline ki-phone fs-4 me-1"></i><?php echo $telefono; ?></a>
                                                            <a href="#" class="d-flex align-items-center text-gray-400 text-hover-primary mb-2">
                                                                <i class="ki-outline ki-sms fs-4"></i><?php echo $correoE; ?></a>
                                                        </div>
                                                        <!--end::Info-->
                                                    </div>
                                                    <!--end::User-->

                                                </div>
                                                <!--end::Title-->

                                            </div>
                                            <!--end::Info-->
                                        </div>
                                        <!--end::Details-->
                                        <!--begin::Navs-->
                                        <ul class="nav nav-stretch nav-line-tabs nav-line-tabs-2x border-transparent fs-5 fw-bold">

                                            <!--begin::Nav item-->
                                            <li class="nav-item mt-2">
                                                <a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="../../demo30/dist/account/billing.php">Documentos</a>
                                            </li>
                                            <!--end::Nav item-->
                                            <!--begin::Nav item-->
                                            <script>
                                                function sinProceso() {
                                                    //console.log("Estamos en sin proceso");
                                                    Swal.fire({
                                                        text: "Aún no tienes un proceso asignado, inténtalo más tarde.",
                                                        icon: "warning",
                                                        buttonsStyling: !1,
                                                        confirmButtonText: "Aceptar",
                                                        customClass: {
                                                            confirmButton: "btn btn-primary"
                                                        },
                                                    });
                                                }
                                            </script>
                                            <li class="nav-item mt-2">
                                                <?php
                                                if ($procesoAlumno != "" || !empty($procesoAlumno)) {
                                                ?>
                                                    <a class="nav-link text-active-primary ms-0 me-10 py-5" href="?c=alumno&a=listasedes">Sedes</a>
                                                <?php
                                                } else {
                                                ?>
                                                    <button class="nav-link text-active-primary ms-0 me-10 py-5" type="button" onclick="sinProceso()">Sedes</button>
                                                <?php
                                                }
                                                ?>
                                            </li>
                                            <!--end::Nav item-->

                                        </ul>
                                        <!--begin::Navs-->
                                    </div>
                                </div>
                                <!--end::Navbar-->

                                <!--begin::Payment methods-->
                                <div class="card mb-5 mb-xl-10">
                                    <!--begin::Card header-->
                                    <div class="card-header card-header-stretch pb-0">
                                        <!--begin::Title-->
                                        <div class="card-title">
                                            <h3 class="m-0">Documentos Personales</h3>
                                        </div>

                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar m-0">
                                            <!--begin::Tab nav-->
                                            <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                                                <!--begin::Tab item-->
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_personal_creditcard_tab" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab" role="tab" href="#kt_personal_creditcard">Cargar</a>
                                                </li>
                                                <!--end::Tab item-->
                                                <!--begin::Tab item-->
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_personal_paypal_tab" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab" href="#kt_personal_paypal">Estatus</a>
                                                </li>
                                                <!--end::Tab item-->
                                            </ul>
                                            <!--end::Tab nav-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Tab content-->
                                    <div id="kt_personal_payment_tab_content" class="card-body tab-content">
                                        <!--begin::Tab panel-->
                                        <div id="kt_personal_creditcard" class="tab-pane fade show active" role="tabpanel">
                                            <!--begin::Title-->
                                            <h3 class="mb-5">Mis documentos</h3>
                                            <!--end::Title-->
                                            <!--begin::Row-->
                                            <div class="row gx-9 gy-6">
                                                <!--begin::Col-->
                                                <div class="col-xl-6">
                                                    <!--begin::Notice-->
                                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed h-lg-100 p-6">
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                            <!--begin::Content-->
                                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                                <h4 class="text-gray-900 fw-bold">
                                                                    CV
                                                                </h4>
                                                                <span class="ms-1" data-bs-toggle="tooltip" title="La sede elegida podrá visualizar tu CV.">
                                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                                </span>
                                                                <div class="fs-6 text-gray-700 pe-7">
                                                                    Hoja de presentación.

                                                                </div>
                                                            </div>
                                                            <!--end::Content-->
                                                            <!--begin::Action-->
                                                            <?php
                                                            if ($estatusAlumno == 1) {
                                                            ?>
                                                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_cv">Añadir</a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <!--end::Action-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Tab panel-->
                                        <!--begin::Tab panel-->
                                        <div id="kt_personal_paypal" class="tab-pane fade" role="tabpanel" aria-labelledby="kt_personal_paypal_tab">
                                            <!--begin::Title-->
                                            <!--<h3 class="mb-5">My Paypal</h3>-->
                                            <!--end::Title-->
                                            <!--begin::Description-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                                                    <thead>
                                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                                                            <th class="min-w-125px">Documento</th>
                                                            <th class="min-w-125px">Estado</th>
                                                            <th class="min-w-125px">Fecha</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-gray-600 fw-semibold">
                                                        <?php

                                                        if ($estatusCV == "Subido") { ?>
                                                            <tr>

                                                                <td>
                                                                    <a href="../../demo30/dist/apps/customers/view.html" class="text-gray-800 text-hover-primary mb-1">Currículum Vitae</a>
                                                                </td>
                                                                <td>
                                                                    <div class="badge badge-light-success">Subido</div>
                                                                </td>
                                                                <td>
                                                                    <div class="badge badge-light"><?php echo $fechaCreacion; ?></div>
                                                                </td>

                                                            </tr>
                                                        <?php
                                                        } else {
                                                        ?>
                                                            <tr>

                                                                <td>
                                                                    <a href="../../demo30/dist/apps/customers/view.html" class="text-gray-800 text-hover-primary mb-1">Currículum Vitae</a>
                                                                </td>
                                                                <td>
                                                                    <div class="badge badge-light-danger">Sin Subir</div>
                                                                </td>
                                                                <td>
                                                                    <div class="badge badge-light">--</div>
                                                                </td>

                                                            </tr>
                                                        <?php
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Tab panel-->
                                    </div>
                                    <!--end::Tab content-->
                                </div>
                                <!--end::Payment methods-->
                                <!--HASTA AQUÍ-->
                                <!--begin::Payment methods-->
                                <div class="card mb-5 mb-xl-10">
                                    <!--begin::Card header-->
                                    <div class="card-header card-header-stretch pb-0">
                                        <!--begin::Title-->
                                        <div class="card-title">
                                            <h3 class="m-0">Documentos Vinculación</h3>
                                        </div>

                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar m-0">
                                            <!--begin::Tab nav-->
                                            <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                                                <!--begin::Tab item-->
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_vinculacion_creditcard_tab" class="nav-link fs-5 fw-bold me-5 active" data-bs-toggle="tab" role="tab" href="#kt_vinculacion_creditcard">Cargar</a>
                                                </li>
                                                <!--end::Tab item-->
                                                <!--begin::Tab item-->
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_vinculacion_paypal_tab" class="nav-link fs-5 fw-bold" data-bs-toggle="tab" role="tab" href="#kt_vinculacion_paypal">Estatus</a>
                                                </li>
                                                <!--end::Tab item-->
                                            </ul>
                                            <!--end::Tab nav-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Tab content-->
                                    <div id="kt_vinculacion_payment_tab_content" class="card-body tab-content">
                                        <!--begin::Tab panel-->
                                        <div id="kt_vinculacion_creditcard" class="tab-pane fade show active" role="tabpanel">
                                            <!--begin::Title-->
                                            <h3 class="mb-5">Mis documentos</h3>
                                            <!--end::Title-->
                                            <!--begin::Row-->
                                            <div class="row gx-9 gy-6">

                                                <!--begin::Col-->
                                                <div class="col-xl-6">
                                                    <!--begin::Notice-->
                                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed h-lg-100 p-6">
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                            <!--begin::Content-->
                                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                                <h4 class="text-gray-900 fw-bold">
                                                                    R-VIN-05-03
                                                                </h4>
                                                                <span class="ms-1" data-bs-toggle="tooltip" title="Subir en la 1ra semana del cuatrimestre.">
                                                                    <i class="ki-outline ki-information-5 text-gray-500 fs-6"></i>
                                                                </span>
                                                                <div class="fs-6 text-gray-700 pe-7">
                                                                    Documento que contiene las firmas <br />que te hacen candidato a participar.

                                                                </div>
                                                            </div>
                                                            <!--end::Content-->
                                                            <!--begin::Action-->
                                                            <?php
                                                            if ($estatusAlumno == 1) {
                                                            ?>
                                                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_rvin">Añadir</a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <!--end::Action-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Col-->

                                                <!--begin::Col-->
                                                <div class="col-xl-6">
                                                    <!--begin::Notice-->
                                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed h-lg-100 p-6">
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                            <!--begin::Content-->
                                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                                <h4 class="text-gray-900 fw-bold">
                                                                    Carta de Aceptación
                                                                </h4>
                                                                <div class="fs-6 text-gray-700 pe-7">
                                                                    Expedida por la sede una vez aceptada tu solicitud.
                                                                </div>
                                                            </div>
                                                            <!--end::Content-->
                                                            <!--begin::Action-->
                                                            <?php
                                                            if ($estatusAlumno == 1) {
                                                            ?>
                                                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_cartaAceptacion">Añadir</a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <!--end::Action-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-xl-6">
                                                    <!--begin::Notice-->
                                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed h-lg-100 p-6">
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                            <!--begin::Content-->
                                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                                <h4 class="text-gray-900 fw-bold">
                                                                    Evaluación
                                                                </h4>
                                                                <div class="fs-6 text-gray-700 pe-7">
                                                                    Realizada por la sede de acuerdo a tu desempeño y actividades realizadas.
                                                                </div>
                                                            </div>
                                                            <!--end::Content-->
                                                            <!--begin::Action-->
                                                            <?php
                                                            if ($estatusAlumno == 1) {
                                                            ?>
                                                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_evaluacion">Añadir</a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <!--end::Action-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Col-->
                                                <!--begin::Col-->
                                                <div class="col-xl-6">
                                                    <!--begin::Notice-->
                                                    <div class="notice d-flex bg-light-primary rounded border-primary border border-dashed h-lg-100 p-6">
                                                        <!--begin::Wrapper-->
                                                        <div class="d-flex flex-stack flex-grow-1 flex-wrap flex-md-nowrap">
                                                            <!--begin::Content-->
                                                            <div class="mb-3 mb-md-0 fw-semibold">
                                                                <h4 class="text-gray-900 fw-bold">
                                                                    Carta de Liberación
                                                                </h4>
                                                                <div class="fs-6 text-gray-700 pe-7">
                                                                    Documento expedido por la sede una vez cumplidas las horas requeridas.
                                                                </div>
                                                            </div>
                                                            <!--end::Content-->
                                                            <!--begin::Action-->
                                                            <?php
                                                            if ($estatusAlumno == 1) {
                                                            ?>
                                                                <a href="#" class="btn btn-primary px-6 align-self-center text-nowrap" data-bs-toggle="modal" data-bs-target="#kt_modal_new_cartaliberacion">Añadir</a>
                                                            <?php
                                                            }
                                                            ?>
                                                            <!--end::Action-->
                                                        </div>
                                                        <!--end::Wrapper-->
                                                    </div>
                                                    <!--end::Notice-->
                                                </div>
                                                <!--end::Col-->
                                            </div>
                                            <!--end::Row-->
                                        </div>
                                        <!--end::Tab panel-->
                                        <!--begin::Tab panel-->
                                        <div id="kt_vinculacion_paypal" class="tab-pane fade" role="tabpanel" aria-labelledby="kt_vinculacion_paypal_tab">
                                            <!--begin::Title-->
                                            <!--<h3 class="mb-5">My Paypal</h3>-->
                                            <!--end::Title-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0">
                                                <!--begin::Table-->
                                                <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_subscriptions_table">
                                                    <thead>
                                                        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">

                                                            <th class="min-w-125px">Documento</th>
                                                            <th class="min-w-125px">Estado PTC</th>
                                                            <th class="min-w-125px">Estado Vinculación</th>

                                                        </tr>
                                                    </thead>
                                                    <tbody class="text-gray-600 fw-semibold">
                                                        <?php
                                                        if (!empty($docs)) {
                                                            foreach ($docs as $d) { ?>
                                                                <tr>

                                                                    <td>
                                                                        <a href="../../demo30/dist/apps/customers/view.html" class="text-gray-800 text-hover-primary mb-1"><?php echo $d["NombreDoc"]; ?></a>
                                                                    </td>

                                                                    <td>
                                                                        <?php
                                                                        if ($d["EstatusPtc"] == 0) {
                                                                        ?><div class="badge badge-light-warning">Validando</div><?php
                                                                                                                        } else if ($d["EstatusPtc"] == 1) {
                                                                                                                            ?><div class="badge badge-light-success">Validado</div><?php
                                                                                                                                                                                } else if ($d["EstatusPtc"] == 2) {
                                                                                                                                                                                    ?><div class="badge badge-light-danger">No válido</div><?php
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                            ?>
                                                                    </td>
                                                                    <td>
                                                                        <?php
                                                                        if ($d["EstatusVinc"] == 0) {
                                                                        ?><div class="badge badge-light-warning">Validando</div><?php
                                                                                                                        } else if ($d["EstatusVinc"] == 1) {
                                                                                                                            ?><div class="badge badge-light-success">Validado</div><?php
                                                                                                                                                                                } else if ($d["EstatusVinc"] == 2) {
                                                                                                                                                                                    ?><div class="badge badge-light-danger">No válido</div><?php
                                                                                                                                                                                                                                        }
                                                                                                                                                                                                                                            ?>
                                                                    </td>
                                                                </tr>
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Tab panel-->
                                    </div>
                                    <!--end::Tab content-->
                                </div>
                                <!--end::Payment methods-->

                                <!--begin::Billing History-->
                                <div class="card">
                                    <!--begin::Card header-->
                                    <div class="card-header card-header-stretch border-bottom border-gray-200">
                                        <!--begin::Title-->
                                        <div class="card-title">
                                            <h3 class="fw-bold m-0">Procesos</h3>
                                        </div>
                                        <!--end::Title-->
                                        <!--begin::Toolbar-->
                                        <div class="card-toolbar m-0">
                                            <!--begin::Tab nav-->
                                            <ul class="nav nav-stretch nav-line-tabs border-transparent" role="tablist">
                                                <!--begin::Tab nav item-->
                                                <li class="nav-item" role="presentation">
                                                    <a id="kt_billing_6months_tab" class="nav-link fs-5 fw-semibold me-3 active" data-bs-toggle="tab" role="tab" href="#kt_billing_months">Todos</a>
                                                </li>
                                                <!--end::Tab nav item-->

                                                <!--end::Tab nav item-->
                                            </ul>
                                            <!--end::Tab nav-->
                                        </div>
                                        <!--end::Toolbar-->
                                    </div>
                                    <!--end::Card header-->
                                    <!--begin::Tab Content-->
                                    <div class="tab-content">
                                        <!--begin::Tab panel-->
                                        <div id="kt_billing_months" class="card-body p-0 tab-pane fade show active" role="tabpanel" aria-labelledby="kt_billing_months">
                                            <!--begin::Table container-->
                                            <div class="table-responsive">
                                                <!--begin::Table-->
                                                <table class="table table-row-bordered align-middle gy-4 gs-9">
                                                    <thead class="border-bottom border-gray-200 fs-6 text-gray-600 fw-bold bg-light bg-opacity-75">
                                                        <tr>
                                                            <td class="min-w-150px">Nombre</td>
                                                            <td class="min-w-250px">Empresa</td>
                                                            <td class="min-w-150px">Estatus</td>
                                                        </tr>
                                                    </thead>
                                                    <tbody class="fw-semibold text-gray-600">
                                                        <?php
                                                        if (!empty($procesos)) {
                                                            foreach ($procesos as $p) {

                                                        ?>

                                                                <!--begin::Table row-->
                                                                <tr>
                                                                    <td><?php echo $p["nombrePro"]; ?></td>
                                                                    <td>
                                                                        <?php echo $p["NombreSede"]; ?>
                                                                    </td>
                                                                    <td><?php
                                                                        if ($p["FechaInicio"] == "" || $p["FechaInicio"] == "0000-00-00 00:00:00") {
                                                                        ?><div class="badge badge-light-warning">Validando</div><?php
                                                                                                                        } else {
                                                                                                                            ?><div class="badge badge-light-success">Aceptado</div><?php
                                                                                                                                                                                }
                                                                                                                                                                                    ?></td>

                                                                </tr>
                                                                <!--end::Table row-->
                                                        <?php
                                                            }
                                                        }
                                                        ?>

                                                    </tbody>
                                                </table>
                                                <!--end::Table-->
                                            </div>
                                            <!--end::Table container-->
                                        </div>
                                        <!--end::Tab panel-->

                                    </div>
                                    <!--end::Tab Content-->
                                </div>
                                <!--end::Billing Address-->
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

    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    <!--end::Scrolltop-->
    <!--begin::Modals-->

    <!--begin::Modal - Add CV-->
    <div class="modal fade" id="kt_modal_new_cv" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Añadir Curriculum Vitae</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <!--<form action="/upload" class="dropzone" id="my-dropzone"></form>-->

                    <form id="kt_modal_new_cv_form" class="form" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="boton_enviar" value="true">
                        <input type="hidden" name="Matricula" value="<?php echo $id_alumno; ?>">

                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold form-label mb-2">Archivo</label>
                            <!--end::Label-->
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="kt_modal_new_cv_archivo">
                                <!--begin::Message-->
                                <input type="file" name="file" id="file" class="form-control form-control-flush mb-3" accept=".pdf">
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_cv_cancel" class="btn btn-light me-3">
                                Cancelar
                            </button>
                            <button type="submit" id="kt_modal_new_cv_submit" class="btn btn-primary" disabled>
                                <span class="indicator-label">Enviar</span>
                                <span class="indicator-progress">Por favor espere...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add CV-->
    <!--begin::Modal - Add RVIN-->
    <div class="modal fade" id="kt_modal_new_rvin" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Añadir R-VIN-05-03</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <!--<form action="/upload" class="dropzone" id="my-dropzone"></form>-->

                    <form id="kt_modal_new_rvin_form" class="form" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="matricula" value="<?php echo $id_alumno; ?>">
                        <input type="hidden" name="idProceso" value="1">
                        <input type="hidden" name="idDocumento" value="1">
                        <input type="hidden" name="idPeriodo" value="1">
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold form-label mb-2">Archivo</label>
                            <!--end::Label-->
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="kt_modal_new_rvin_archivo">
                                <!--begin::Message-->
                                <input type="file" name="file_rvin" id="file_rvin" class="form-control form-control-flush mb-3" accept=".pdf">
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_rvin_cancel" class="btn btn-light me-3">
                                Cancelar
                            </button>
                            <button type="submit" id="kt_modal_new_rvin_submit" class="btn btn-primary" disabled>
                                <span class="indicator-label">Enviar</span>
                                <span class="indicator-progress">Por favor espere...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - Add RVIN-->
    <!--begin::Modal - New Carta Liberación-->
    <div class="modal fade" id="kt_modal_new_cartaliberacion" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Añadir Carta de Liberación</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_new_cartaliberacion_form" class="form" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="matricula" value="<?php echo $id_alumno; ?>">
                        <input type="hidden" name="idProceso" value="1">
                        <input type="hidden" name="idDocumento" value="4">
                        <input type="hidden" name="idPeriodo" value="1">
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold form-label mb-2">Archivo</label>
                            <!--end::Label-->
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="kt_modal_new_cartaliberacion_archivo">
                                <!--begin::Message-->
                                <input type="file" name="file_cartaliberacion" id="file_cartaliberacion" class="form-control form-control-flush mb-3" accept=".pdf">
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_cartaliberacion_cancel" class="btn btn-light me-3">
                                Cancelar
                            </button>
                            <button type="submit" id="kt_modal_new_cartaliberacion_submit" class="btn btn-primary" disabled>
                                <span class="indicator-label">Enviar</span>
                                <span class="indicator-progress">Por favor espere...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Carta Liberación-->
    <!--begin::Modal - New Carta Aceptación-->
    <div class="modal fade" id="kt_modal_new_cartaAceptacion" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Añadir Carta de Aceptación</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_new_cartaAceptacion_form" class="form" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="matricula" value="<?php echo $id_alumno; ?>">
                        <input type="hidden" name="idProceso" value="1">
                        <input type="hidden" name="idDocumento" value="2">
                        <input type="hidden" name="idPeriodo" value="1">
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold form-label mb-2">Archivo</label>
                            <!--end::Label-->
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="kt_modal_new_cartaAceptacion_archivo">
                                <!--begin::Message-->
                                <input type="file" name="file_cartaAceptacion" id="file_cartaAceptacion" class="form-control form-control-flush mb-3" accept=".pdf">
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_cartaAceptacion_cancel" class="btn btn-light me-3">
                                Cancelar
                            </button>
                            <button type="submit" id="kt_modal_new_cartaAceptacion_submit" class="btn btn-primary" disabled>
                                <span class="indicator-label">Enviar</span>
                                <span class="indicator-progress">Por favor espere...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Carta Aceptación-->
    <!--begin::Modal - New Evaluación-->
    <div class="modal fade" id="kt_modal_new_evaluacion" tabindex="-1" aria-hidden="true">
        <!--begin::Modal dialog-->
        <div class="modal-dialog modal-dialog-centered mw-650px">
            <!--begin::Modal content-->
            <div class="modal-content">
                <!--begin::Modal header-->
                <div class="modal-header">
                    <!--begin::Modal title-->
                    <h2>Añadir Evaluación</h2>
                    <!--end::Modal title-->
                    <!--begin::Close-->
                    <div class="btn btn-sm btn-icon btn-active-color-primary" data-bs-dismiss="modal">
                        <i class="ki-outline ki-cross fs-1"></i>
                    </div>
                    <!--end::Close-->
                </div>
                <!--end::Modal header-->
                <!--begin::Modal body-->
                <div class="modal-body scroll-y mx-5 mx-xl-15 my-7">
                    <!--begin::Form-->
                    <form id="kt_modal_new_evaluacion_form" class="form" action="" method="POST" enctype="multipart/form-data">
                        <input type="hidden" name="matricula" value="<?php echo $id_alumno; ?>">
                        <input type="hidden" name="idProceso" value="1">
                        <input type="hidden" name="idDocumento" value="3">
                        <input type="hidden" name="idPeriodo" value="1">
                        <!--begin::Input group-->
                        <div class="fv-row mb-8">
                            <!--begin::Label-->
                            <label class="required fs-6 fw-semibold form-label mb-2">Archivo</label>
                            <!--end::Label-->
                            <!--begin::Dropzone-->
                            <div class="dropzone" id="kt_modal_new_evaluacion_archivo">
                                <!--begin::Message-->
                                <input type="file" name="file_evaluacion" id="file_evaluacion" class="form-control form-control-flush mb-3" accept=".pdf">
                            </div>
                            <!--end::Dropzone-->
                        </div>
                        <!--end::Input group-->
                        <!--begin::Actions-->
                        <div class="text-center pt-15">
                            <button type="reset" id="kt_modal_new_evaluacion_cancel" class="btn btn-light me-3">
                                Cancelar
                            </button>
                            <button type="submit" id="kt_modal_new_evaluacion_submit" class="btn btn-primary" disabled>
                                <span class="indicator-label">Enviar</span>
                                <span class="indicator-progress">Por favor espere...
                                    <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                            </button>
                        </div>
                        <!--end::Actions-->
                    </form>
                    <!--end::Form-->
                </div>
                <!--end::Modal body-->
            </div>
            <!--end::Modal content-->
        </div>
        <!--end::Modal dialog-->
    </div>
    <!--end::Modal - New Evaluación TEST -->

    <!--end::Modals-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>

    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <script src="assets/plugins/custom/draggable/draggable.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="assets/js/custom/pages/user-profile/general.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="assets/js/custom/pages/user-profile/general.js"></script>
    <script src="assets/js/custom/account/billing/general.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/type.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/details.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/finance.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/complete.js"></script>
    <script src="assets/js/custom/utilities/modals/offer-a-deal/main.js"></script>
    <script src="assets/js/custom/utilities/modals/new-address.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->

    <!--PRUEBA-->

    <script>
        $(document).ready(function() {
            const maxSize = 1000000;
            // Obtener referencia al elemento
            //Para CV
            var fileI = document.getElementById("file");
            var submitbtn = document.getElementById("kt_modal_new_cv_submit");
            e = document.getElementById("kt_modal_new_cv_cancel")
            i = document.querySelector("#kt_modal_new_cv")
            r = document.querySelector("#kt_modal_new_cv_form")
            o = new bootstrap.Modal(i)

            fileI.addEventListener("change", function() {
                if (fileI.files.length > 0) {
                    submitbtn.removeAttribute("disabled");
                } else {
                    submitbtn.setAttribute("disabled", "disabled");
                }
                const archivo = this.files[0];
                if (archivo.size > maxSize) {
                    const tamMb = maxSize / 1000000;
                    Swal.fire({
                        text: "Archivo demasiado grande, intenta con otro.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Aceptar",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        },
                    });
                    fileI.value = "";
                }

            });
            e.addEventListener("click", function(t) {
                t.preventDefault(),
                    Swal.fire({
                        text: "¿Seguro que quieres cancelar?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "¡Si, cancelar!",
                        cancelButtonText: "No, volver",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light",
                        },
                    }).then(function(t) {
                        t.value ?
                            (r.reset(), o.hide()) :
                            "cancel" === t.dismiss
                    });
            });
            $("#kt_modal_new_cv_form").submit(function(event) {
                event.preventDefault(); // Evita la recarga de la página
                var formData = new FormData($("#kt_modal_new_cv_form")[0]);

                $.ajax({
                    url: "config/subircv.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        fileI.value = "";
                        Swal.fire({
                            text: "¡Tu formulario se ha enviado exitosamente!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        }).then(function(t) {
                            t.isConfirmed && o.hide();
                        });
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            text: "Lo sentimos, ocurrió un error al enviar tu formulario, por favor inténtalo más tarde.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        });
                    }
                });
            });

            //Para RVIN
            var fileRVIN = document.getElementById("file_rvin");
            var submitbtn_rvin = document.getElementById("kt_modal_new_rvin_submit");
            e_rvin = document.getElementById("kt_modal_new_rvin_cancel")
            i_rvin = document.querySelector("#kt_modal_new_rvin")
            r_rvin = document.querySelector("#kt_modal_new_rvin_form")
            o_rvin = new bootstrap.Modal(i_rvin)

            fileRVIN.addEventListener("change", function() {
                if (fileRVIN.files.length > 0) {
                    submitbtn_rvin.removeAttribute("disabled");
                } else {
                    submitbtn_rvin.setAttribute("disabled", "disabled");
                }
                const archivo = this.files[0];
                if (archivo.size > maxSize) {
                    const tamMb = maxSize / 1000000;
                    Swal.fire({
                        text: "Archivo demasiado grande, intenta con otro.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Aceptar",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        },
                    });
                    fileRVIN.value = "";
                }
            });
            e_rvin.addEventListener("click", function(t) {
                t.preventDefault(),
                    Swal.fire({
                        text: "¿Seguro que quieres cancelar?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "¡Si, cancelar!",
                        cancelButtonText: "No, volver",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light",
                        },
                    }).then(function(t) {
                        t.value ?
                            (r_rvin.reset(), o_rvin.hide()) :
                            "cancel" === t.dismiss
                    });
            });
            $("#kt_modal_new_rvin_form").submit(function(event) {
                event.preventDefault(); // Evita la recarga de la página
                var formData = new FormData($("#kt_modal_new_rvin_form")[0]);

                $.ajax({
                    url: "config/subirrvin.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        fileRVIN.value = "";
                        Swal.fire({
                            text: "¡Tu formulario se ha enviado exitosamente!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        }).then(function(t) {
                            t.isConfirmed && o_rvin.hide();
                        });
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            text: "Lo sentimos, ocurrió un error al enviar tu formulario, por favor inténtalo más tarde.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        });
                    }
                });
            });

            //Para CartaAceptación
            var filecartaAceptacion = document.getElementById("file_cartaAceptacion");
            var submitbtn_cartaAceptacion = document.getElementById("kt_modal_new_cartaAceptacion_submit");
            e_cartaAceptacion = document.getElementById("kt_modal_new_cartaAceptacion_cancel")
            i_cartaAceptacion = document.querySelector("#kt_modal_new_cartaAceptacion")
            r_cartaAceptacion = document.querySelector("#kt_modal_new_cartaAceptacion_form")
            o_cartaAceptacion = new bootstrap.Modal(i_cartaAceptacion)

            filecartaAceptacion.addEventListener("change", function() {
                if (filecartaAceptacion.files.length > 0) {
                    submitbtn_cartaAceptacion.removeAttribute("disabled");
                } else {
                    submitbtn_cartaAceptacion.setAttribute("disabled", "disabled");
                }
                const archivo = this.files[0];
                if (archivo.size > maxSize) {
                    const tamMb = maxSize / 1000000;
                    Swal.fire({
                        text: "Archivo demasiado grande, intenta con otro.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Aceptar",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        },
                    });
                    filecartaAceptacion.value = "";
                }
            });
            e_cartaAceptacion.addEventListener("click", function(t) {
                t.preventDefault(),
                    Swal.fire({
                        text: "¿Seguro que quieres cancelar?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "¡Si, cancelar!",
                        cancelButtonText: "No, volver",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light",
                        },
                    }).then(function(t) {
                        t.value ?
                            (r_cartaAceptacion.reset(), o_cartaAceptacion.hide()) :
                            "cancel" === t.dismiss
                    });
            });
            $("#kt_modal_new_cartaAceptacion_form").submit(function(event) {
                event.preventDefault(); // Evita la recarga de la página
                var formData = new FormData($("#kt_modal_new_cartaAceptacion_form")[0]);

                $.ajax({
                    url: "config/subirrvin.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        filecartaAceptacion.value = "";
                        Swal.fire({
                            text: "¡Tu formulario se ha enviado exitosamente!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        }).then(function(t) {
                            t.isConfirmed && o_cartaAceptacion.hide();
                        });
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            text: "Lo sentimos, ocurrió un error al enviar tu formulario, por favor inténtalo más tarde.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        });
                    }
                });
            });

            //Para Evaluación
            var fileevaluacion = document.getElementById("file_evaluacion");
            var submitbtn_evaluacion = document.getElementById("kt_modal_new_evaluacion_submit");
            e_evaluacion = document.getElementById("kt_modal_new_evaluacion_cancel")
            i_evaluacion = document.querySelector("#kt_modal_new_evaluacion")
            r_evaluacion = document.querySelector("#kt_modal_new_evaluacion_form")
            o_evaluacion = new bootstrap.Modal(i_evaluacion)

            fileevaluacion.addEventListener("change", function() {
                if (fileevaluacion.files.length > 0) {
                    submitbtn_evaluacion.removeAttribute("disabled");
                } else {
                    submitbtn_evaluacion.setAttribute("disabled", "disabled");
                }
                const archivo = this.files[0];
                if (archivo.size > maxSize) {
                    const tamMb = maxSize / 1000000;
                    Swal.fire({
                        text: "Archivo demasiado grande, intenta con otro.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Aceptar",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        },
                    });
                    fileevaluacion.value = "";
                }
            });
            e_evaluacion.addEventListener("click", function(t) {
                t.preventDefault(),
                    Swal.fire({
                        text: "¿Seguro que quieres cancelar?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "¡Si, cancelar!",
                        cancelButtonText: "No, volver",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light",
                        },
                    }).then(function(t) {
                        t.value ?
                            (r_evaluacion.reset(), o_evaluacion.hide()) :
                            "cancel" === t.dismiss
                    });
            });
            $("#kt_modal_new_evaluacion_form").submit(function(event) {
                event.preventDefault(); // Evita la recarga de la página
                var formData = new FormData($("#kt_modal_new_evaluacion_form")[0]);

                $.ajax({
                    url: "config/subirrvin.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        fileevaluacion.value = "";
                        Swal.fire({
                            text: "¡Tu formulario se ha enviado exitosamente!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        }).then(function(t) {
                            t.isConfirmed && o_evaluacion.hide();
                        });
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            text: "Lo sentimos, ocurrió un error al enviar tu formulario, por favor inténtalo más tarde.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        });
                    }
                });
            });

            //Para CartaLiberación
            var filecartaliberacion = document.getElementById("file_cartaliberacion");
            var submitbtn_cartaliberacion = document.getElementById("kt_modal_new_cartaliberacion_submit");
            e_cartaliberacion = document.getElementById("kt_modal_new_cartaliberacion_cancel")
            i_cartaliberacion = document.querySelector("#kt_modal_new_cartaliberacion")
            r_cartaliberacion = document.querySelector("#kt_modal_new_cartaliberacion_form")
            o_cartaliberacion = new bootstrap.Modal(i_cartaliberacion)

            filecartaliberacion.addEventListener("change", function() {
                if (filecartaliberacion.files.length > 0) {
                    submitbtn_cartaliberacion.removeAttribute("disabled");
                } else {
                    submitbtn_cartaliberacion.setAttribute("disabled", "disabled");
                }
                const archivo = this.files[0];
                if (archivo.size > maxSize) {
                    const tamMb = maxSize / 1000000;
                    Swal.fire({
                        text: "Archivo demasiado grande, intenta con otro.",
                        icon: "error",
                        buttonsStyling: !1,
                        confirmButtonText: "Aceptar",
                        customClass: {
                            confirmButton: "btn btn-primary"
                        },
                    });
                    filecartaliberacion.value = "";
                }
            });
            e_cartaliberacion.addEventListener("click", function(t) {
                t.preventDefault(),
                    Swal.fire({
                        text: "¿Seguro que quieres cancelar?",
                        icon: "warning",
                        showCancelButton: !0,
                        buttonsStyling: !1,
                        confirmButtonText: "¡Si, cancelar!",
                        cancelButtonText: "No, volver",
                        customClass: {
                            confirmButton: "btn btn-primary",
                            cancelButton: "btn btn-active-light",
                        },
                    }).then(function(t) {
                        t.value ?
                            (r_cartaliberacion.reset(), o_cartaliberacion.hide()) :
                            "cancel" === t.dismiss
                    });
            });
            $("#kt_modal_new_cartaliberacion_form").submit(function(event) {
                event.preventDefault(); // Evita la recarga de la página
                var formData = new FormData($("#kt_modal_new_cartaliberacion_form")[0]);

                $.ajax({
                    url: "config/subirrvin.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        filecartaliberacion.value = "";
                        Swal.fire({
                            text: "¡Tu formulario se ha enviado exitosamente!",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        }).then(function(t) {
                            t.isConfirmed && o_cartaliberacion.hide();
                        });
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            text: "Lo sentimos, ocurrió un error al enviar tu formulario, por favor inténtalo más tarde.",
                            icon: "error",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        });
                    }
                });
            });

        });
    </script>
    <!--FIN PRUEBA-->
</body>
<!--end::Body-->

</html>