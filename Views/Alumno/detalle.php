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
            <?php include "header.php"; ?>
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
                                    <a href="?c=alumno&a=listasedes" class="text-white text-hover-primary">
                                            Lista de Sedes
                                        </a>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item">
                                        <i class="ki-outline ki-right fs-4 text-white mx-n1"></i>
                                    </li>
                                    <!--end::Item-->
                                    <!--begin::Item-->
                                    <li class="breadcrumb-item text-white fw-bold lh-1"><?php echo $nombreSede; ?></li>
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
                                        Descripción de Sede
                                        <!--begin::Description-->
                                        <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Extendido</span>
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
                                <!--begin::Layout-->
                                <div class="d-flex flex-column flex-lg-row">
                                    <!--begin::Content-->
                                    <div class="flex-lg-row-fluid me-lg-15 order-2 order-lg-1 mb-10 mb-lg-0">
                                        <!--begin::Contacts-->
                                        <div class="card card-flush h-lg-100" id="kt_contacts_main">
                                            <!--begin::Card header-->
                                            <div class="card-header pt-7" id="kt_chat_contacts_header">
                                                <!--begin::Card title-->
                                                <div class="card-title">
                                                    <i class="ki-outline ki-badge fs-1 me-2"></i>
                                                    <h2>Descripción</h2>
                                                </div>
                                                <!--end::Card title-->
                                               
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-5">
                                                <!--begin::Profile-->
                                                <div class="d-flex gap-7 align-items-center">
                                                    <!--begin::Avatar-->
                                                    <!--<div class="symbol symbol-circle symbol-100px">
															<img src="assets/media/avatars/300-6.jpg" alt="image" />
														</div>-->
                                                    <!--end::Avatar-->
                                                    <!--begin::Contact details-->
                                                    <div class="d-flex flex-column gap-2">
                                                        <!--begin::Name-->
                                                        <h3 class="mb-0"><?php echo $nombreSede; ?></h3>
                                                        <!--end::Name-->
                                                        <!--begin::Email-->
                                                        <div class="d-flex align-items-center gap-2">
                                                            <i class="ki-outline ki-sms fs-2"></i>
                                                            <a href="#" class="text-muted text-hover-primary"><?php echo $correo; ?></a>
                                                        </div>
                                                        <!--end::Email-->
                                                        <!--begin::Phone-->
                                                        <div class="d-flex align-items-center gap-2">
                                                            <i class="ki-outline ki-phone fs-2"></i>
                                                            <a href="#" class="text-muted text-hover-primary"><?php echo $telefono; ?></a>
                                                        </div>
                                                        <!--end::Phone-->
                                                    </div>
                                                    <!--end::Contact details-->
                                                </div>
                                                <!--end::Profile-->
                                                <!--begin:::Tabs-->
                                                <ul class="nav nav-custom nav-tabs nav-line-tabs nav-line-tabs-2x fs-6 fw-semibold mt-6 mb-8 gap-2">
                                                    <!--begin:::Tab item-->
                                                    <li class="nav-item">
                                                        <a class="nav-link text-active-primary d-flex align-items-center pb-4 active" data-bs-toggle="tab" href="#kt_contact_view_general">
                                                            <i class="ki-outline ki-home fs-4 me-1"></i>General</a>
                                                    </li>
                                                    <!--end:::Tab item-->
                                                    <!--begin:::Tab item-->
                                                    <li class="nav-item">
                                                        <a class="nav-link text-active-primary d-flex align-items-center pb-4" data-bs-toggle="tab" href="#kt_contact_view_meetings">
                                                            <i class="ki-outline ki-profile-circle fs-4 me-1"></i>Perfil</a>
                                                    </li>
                                                    <!--end:::Tab item-->
                                                    <!--begin:::Tab item-->
                                                    <li class="nav-item">
                                                        <a class="nav-link text-active-primary d-flex align-items-center pb-4" data-bs-toggle="tab" href="#kt_contact_view_activity">
                                                            <i class="ki-outline ki-medal-star fs-4 me-1"></i>Beneficios</a>
                                                    </li>
                                                    <!--end:::Tab item-->
                                                </ul>
                                                <!--end:::Tabs-->
                                                <!--begin::Tab content-->
                                                <div class="tab-content" id="">
                                                    <!--begin:::Tab pane-->
                                                    <div class="tab-pane fade show active" id="kt_contact_view_general" role="tabpanel">
                                                        <!--begin::Additional details-->
                                                        <div class="d-flex flex-column gap-5 mt-7">
                                                            <!--begin::Company name-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted">Nombre de la empresa</div>
                                                                <div class="fw-bold fs-5"><?php echo $nombreSede; ?></div>
                                                            </div>
                                                            <!--end::Company name-->
                                                            <!--begin::City-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted">Ubicación</div>
                                                                <div class="fw-bold fs-5"><?php echo $direccion; ?></div>
                                                            </div>
                                                            <!--end::City-->
                                                            <!--begin::Country-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted">Teléfono</div>
                                                                <div class="fw-bold fs-5"><?php echo $telefono; ?></div>
                                                            </div>
                                                            <!--end::Country-->
                                                            <!--begin::Notes-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted">Tipo</div>
                                                                <p><?php echo $tipoSede; ?></p>
                                                            </div>
                                                            <!--end::Notes-->
                                                        </div>
                                                        <!--end::Additional details-->
                                                    </div>
                                                    <!--end:::Tab pane-->
                                                    <!--begin:::Tab pane-->
                                                    <div class="tab-pane fade" id="kt_contact_view_meetings" role="tabpanel">
                                                        <!--begin::Additional details-->
                                                        <div class="d-flex flex-column gap-5 mt-7">
                                                            <!--begin::Company name-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted">Perfil Deseado</div>
                                                                <div class="fw-bold fs-5"><?php echo $perfil; ?></div>
                                                            </div>
                                                            <!--end::Company name-->
                                                            <!--begin::City-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted"> </div>
                                                                <div class="fw-bold fs-5"> </div>
                                                            </div>
                                                            <!--end::City-->
                                                            <!--begin::Country-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted"> </div>
                                                                <div class="fw-bold fs-5"> </div>
                                                            </div>
                                                            <!--end::Country-->
                                                            <!--begin::Notes-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted"> </div>
                                                                <p> </p>
                                                            </div>
                                                            <!--end::Notes-->
                                                        </div>
                                                        <!--end::Additional details-->
                                                    </div>
                                                    <!--end:::Tab pane-->
                                                    <!--begin:::Tab pane-->
                                                    <div class="tab-pane fade" id="kt_contact_view_activity" role="tabpanel">
                                                        <!--begin::Additional details-->
                                                        <div class="d-flex flex-column gap-5 mt-7">
                                                            <!--begin::Company name-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted">Beneficios</div>
                                                                <div class="fw-bold fs-5"><?php echo $beneficios; ?></div>
                                                            </div>
                                                            <!--end::Company name-->
                                                            <!--begin::City-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted"></div>
                                                                <div class="fw-bold fs-5"></div>
                                                            </div>
                                                            <!--end::City-->
                                                            <!--begin::Country-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted"></div>
                                                                <div class="fw-bold fs-5"></div>
                                                            </div>
                                                            <!--end::Country-->
                                                            <!--begin::Notes-->
                                                            <div class="d-flex flex-column gap-1">
                                                                <div class="fw-bold text-muted"></div>
                                                                <p></p>
                                                            </div>
                                                            <!--end::Notes-->
                                                        </div>
                                                        <!--end::Additional details-->
                                                    </div>
                                                    <!--end:::Tab pane-->

                                                </div>
                                                <!--end::Tab content-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Contacts-->
                                    </div>
                                    <!--end::Content-->
                                    <!--begin::Sidebar-->
                                    <div class="flex-column flex-lg-row-auto w-100 w-lg-250px w-xl-300px mb-10 order-1 order-lg-2">
                                        <!--begin::Card-->
                                        <div class="card card-flush pt-3 mb-0" data-kt-sticky="true" data-kt-sticky-name="subscription-summary" data-kt-sticky-offset="{default: false, lg: '200px'}" data-kt-sticky-width="{lg: '250px', xl: '300px'}" data-kt-sticky-left="auto" data-kt-sticky-top="150px" data-kt-sticky-animation="false" data-kt-sticky-zindex="95">
                                            <!--begin::Card header-->
                                            <div class="card-header">
                                                <!--begin::Card title-->
                                                <div class="card-title">
                                                    <h2>Resumen</h2>
                                                </div>
                                                <!--end::Card title-->
                                            </div>
                                            <!--end::Card header-->
                                            <!--begin::Card body-->
                                            <div class="card-body pt-0 fs-6">
                                                <!--begin::Section-->
                                                <div class="mb-7">
                                                    <!--begin::Title-->
                                                    <h5 class="mb-3">Vacantes</h5>
                                                    <!--end::Title-->
                                                    <!--begin::Details-->
                                                    <div class="d-flex align-items-center mb-1">
                                                        <!--begin::Name-->
                                                        <a href="../../demo30/dist/apps/customers/view.html" class="fw-semibold text-gray-600 text-hover-primary me-2">Disponibles
                                                        </a>
                                                        <!--end::Name-->
                                                        <!--begin::Status-->
                                                        <span class="badge badge-light-success"><?php echo $vacantes; ?></span>
                                                        <!--end::Status-->
                                                    </div>
                                                    <!--end::Details-->

                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Seperator-->
                                                <div class="separator separator-dashed mb-7"></div>
                                                <!--end::Seperator-->
                                                <!--begin::Section-->
                                                <div class="mb-7">
                                                    <!--begin::Title-->
                                                    <h5 class="mb-3">Proceso</h5>
                                                    <!--end::Title-->
                                                    <!--begin::Details-->
                                                    <div class="mb-0">
                                                        
                                                        <!--begin::Price-->
                                                        <span class="fw-semibold text-gray-600"><?php echo $proceso; ?></span>
                                                        <!--end::Price-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Seperator-->
                                                <div class="separator separator-dashed mb-7"></div>
                                                <!--end::Seperator-->
                                                <!--begin::Section-->
                                                <div class="mb-10">
                                                    <!--begin::Title-->
                                                    <h5 class="mb-3">Periodo</h5>
                                                    <!--end::Title-->
                                                    <!--begin::Details-->
                                                    <div class="mb-0">
                                                        <!--begin::Card info-->
                                                        <div class="fw-semibold text-gray-600 d-flex align-items-center">
                                                            <?php echo $periodo; ?>
                                                            <!--<img src="assets/media/svg/card-logos/mastercard.svg"
                                                                class="w-35px ms-2" alt="" />-->
                                                        </div>
                                                        <!--end::Card info-->
                                                        <!--begin::Card expiry-->
                                                        <div class="fw-semibold text-gray-600"></div>
                                                        <!--end::Card expiry-->
                                                    </div>
                                                    <!--end::Details-->
                                                </div>
                                                <!--end::Section-->
                                                <!--begin::Actions-->
                                                <div class="mb-0">
                                                    <form id="form_postularse" class="form" action="" method="POST">
                                                        <input type="hidden" name="idSede" value="<?php echo $Id_Sede; ?>">
                                                        <input type="hidden" name="nombreSede" value="<?php echo $nombreSede; ?>">
                                                        <input type="hidden" name="matricula" value="<?php echo $id_alumno; ?>">
                                                        <input type="hidden" name="idCarrera" value="<?php echo $Id_Carrera; ?>">
                                                        <input type="hidden" name="idProceso" value="<?php echo $idProceso; ?>">

                                                        <?php 
                                                        if($estatusProceso == 0 && $estatusAlumno == 1){
                                                            ?>
                                                            <button type="submit" class="btn btn-primary" id="form_postularse_submit">
                                                            <!--begin::Indicator label-->
                                                            <span class="indicator-label">Postularse</span>
                                                            <!--end::Indicator label-->
                                                            <!--begin::Indicator progress-->
                                                            <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            <!--end::Indicator progress-->
                                                        </button>
                                                            <?php
                                                        }else{
                                                            ?>
                                                            <button type="submit" class="btn btn-primary" id="form_postularse_submit" disabled>
                                                            <!--begin::Indicator label-->
                                                            <span class="indicator-label">Postularse</span>
                                                            <!--end::Indicator label-->
                                                            <!--begin::Indicator progress-->
                                                            <span class="indicator-progress">Please wait...
                                                                <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                                                            <!--end::Indicator progress-->
                                                        </button>
                                                            <?php
                                                        }
                                                        ?>
                                                    </form>

                                                </div>
                                                <!--end::Actions-->
                                            </div>
                                            <!--end::Card body-->
                                        </div>
                                        <!--end::Card-->
                                    </div>
                                    <!--end::Sidebar-->
                                </div>
                                <!--end::Layout-->

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
    <script src="assets/js/custom/apps/subscriptions/add/advanced.js"></script>
    <script src="assets/js/custom/apps/subscriptions/add/customer-select.js"></script>
    <script src="assets/js/custom/apps/subscriptions/add/products.js"></script>
    <script src="assets/js/widgets.bundle.js"></script>
    <script src="assets/js/custom/widgets.js"></script>
    <script src="assets/js/custom/apps/chat/chat.js"></script>
    <script src="assets/js/custom/utilities/modals/upgrade-plan.js"></script>
    <script src="assets/js/custom/utilities/modals/new-card.js"></script>
    <script src="assets/js/custom/utilities/modals/users-search.js"></script>
    <!--end::Custom Javascript-->
    <!--end::Javascript-->
    <script>
        $(document).ready(function() {

            var submitbtn = document.getElementById("form_postularse_submit");

            $("#form_postularse").submit(function(event) {
                event.preventDefault(); // Evita la recarga de la página
                var formData = new FormData($("#form_postularse")[0]);

                $.ajax({
                    url: "config/postularse.php",
                    type: "POST",
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        console.log(response);
                        Swal.fire({
                            text: "¡Tu solicitud se ha enviado! \nEspera a ser contactado.",
                            icon: "success",
                            buttonsStyling: !1,
                            confirmButtonText: "Aceptar",
                            customClass: {
                                confirmButton: "btn btn-primary"
                            },
                        }).then((result) => {
                            if (result.isConfirmed) {
                                window.location.href = 'index.php?c=alumno';
                            }
                        });
                        /*then(function(t) {
                            if (t.isConfirmed) {
                                window.location.replace = '../list.php';
                            }
                        });*/
                    },
                    error: function(error) {
                        console.error(error);
                        Swal.fire({
                            text: "Lo sentimos, ocurrió un error al procesar tu solicitud, por favor inténtalo más tarde.",
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
</body>
<!--end::Body-->

</html>