<?php
session_start(); // Asegúrate de iniciar la sesión en cada vista que utilice sesiones

// Verifica si la variable de sesión existe antes de mostrarla
if (isset($_SESSION['id_usuario']) || isset($_SESSION['name'])) {
    $idUsuario = $_SESSION['id_usuario'];
    $name = $_SESSION['name'];
    if ($name == 'vinculacion') {
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
    <link href="assets/css/style.bundle_2.css" rel="stylesheet type=" text/css" />
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
												<a class="nav-link text-active-primary ms-0 me-10 py-5" href="?c=sedes&a=show_sede">Sedes</a>
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
												<a class="nav-link text-active-primary ms-0 me-10 py-5 active" href="?c=vinculacion&a=index_">Validación de documentos</a>
											</li>
											<!--end::Nav item-->
										</ul>
										<!--begin::Navs-->
									</div>
								</div>
								<!--end::Navbar-->
                                <br><br><br><br><br>
							</div>
							<!--end::Content-->
						</div>
					</div>
					<!--end:::Main-->
				</div>
				<!--end::Wrapper container-->
                <!--begin::Wrapper container-->
                <div class="app-container container-xxl">
                    <!--begin::Main-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Content-->
                        <div id="kt_app_content" class="app-content">
                            <!--begin::Products-->
                            <div class="card card-flush">
                                <div class="card-body pt-0">
                                    <!--begin::Table-->
                                    <div class="table-responsive ">
                                        <table class="table align-middle table-row-bordered table-row-solid gy-4 gs-9">
                                            <thead class="border-gray-200 fs-5 fw-semibold bg-lighten">
                                                <tr>

                                                    <th class="textoTabla min-w-25px">Matricula</th>
                                                    <th class="textoTabla min-w-25px">Nombre</th>
                                                    <th class="textoTabla min-w-25px">Nombre Proceso</th>
                                                    <th class="textoTabla min-w-25px">Nombre Documento</th>
                                                    <th class="textoTabla min-w-25px">Docoumento PDF</th>
                                                    <th class="textoTabla min-w-25px">Estatus PTC</th>
                                                    <th class="textoTabla min-w-25px">Estatus Vinculación</th>
                                                    <th class="textoTabla min-w-25px">Periodo</th>
                                                    <th class="textoTabla min-w-25px">Acciones</th>
                                                    <th></th>
                                                </tr>
                                            </thead>

                                            <tbody class="fw-semibold text-gray-800">
                                                <?php
                                                foreach ($solicitudes as $row) {

                                                    $estatusPTC = isset($row['EstatusPtc']) && $row['EstatusPtc'] == 1 ? 'Documento Válido' : 'Documento no Válido';
                                                    $estatusVinc = isset($row['EstatusVinc']) && $row['EstatusVinc'] == 1 ? 'Documento Válido' : 'Documento no Válido';
                                                    $color =  $row['EstatusPtc'] == 1 ? 'green' : 'red';
                                                    $color2 =  $row['EstatusVinc'] == 1 ? 'green' : 'red';

                                                    echo "<tr>";
                                                    echo "<td>" . $row['Matricula'] . "</td>";
                                                    echo "<td>" . $row['fullName'] . "</td>";
                                                    echo "<td>" . $row['nombreProceso'] . "</td>";
                                                    echo "<td>" . $row['nombreDocumento'] . "</td>";
                                                    // Agregar el botón para ver el PDF
                                                    echo "<td style='margin-left: 10px;'>";

                                                    echo '
                                                        <a href="?c=vinculacion&a=pdf&id=' . $row['Matricula'] . '&id2=' . $row['IdDocumento'] . '" target="_Blank" class="btn btn-sm btn-warning me-1" id="openPdfButton">Mostrar PDF</a>
                                                       
                                                     ';
                                                    echo "</td>";
                                                    echo "<td class='status-cell' style='color: $color;'>$estatusPTC</td>";
                                                    echo "<td class='status-cell' style='color: $color2;'>$estatusVinc</td>";
                                                    echo "<td>" . $row['periodo'] . "</td>";
                                                    // Agregar un botón para visualizar el PDF
                                                    echo "<td style='margin-left: 10px;'>";
                                                    //     echo '<form id="validard" >
                                                    //     <input type="hidden" id="matricula" name="matricula"  value="' . $row['Matricula'] . '" >
                                                    //     <input type="hidden" id="idDoc" name="idDoc"  value="' . $row['IdDocumento'] . '">
                                                    //     <input type="hidden" id="email" name="email" value="d.hernandezj@upam.edu.mx">
                                                    //     <button class="btn btn-sm btn-warning me-3" type="submit">Validar Documento</button>
                                                    // </form>

                                                    // ';
                                                     echo ' <a href="?c=vinculacion&a=validarDoc_&id='.$row['Matricula'].'&id2='.$row['IdDocumento'],'" class="btn btn-sm btn-success me-0.3" id="openPdfButton">Validar</a>
                                                    <a href="?c=vinculacion&a=descartarDoc_&id='.$row['Matricula'].'&id2='.$row['IdDocumento'],'" class="btn btn-sm btn-danger me-0.3" id="openPdfButton">Anular</a>
                                                     ';

                                                    echo "</tr>";
                                                }
                                                ?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <!--end::Table-->

                                </div>

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
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- <script>
        $(document).ready(function() {
            // Agregar un evento al formulario "validard" cuando se envíe
            $("#validard").submit(function(event) {
                event.preventDefault(); // Prevenir el envío normal del formulario

                // Obtener la matrícula y el ID del documento
                var matricula = $("#matricula").val();
                var idDoc = $("#idDoc").val();
                var email = $("#email").val();

                console.log(matricula + " " + idDoc);

                // Realizar la solicitud AJAX a "index.php?c=ptc&a=validarDoc" con los datos
                $.ajax({
                    type: "POST",
                    url: "index.php?c=ptc&a=validarDoc",
                    data: {
                        matricula: matricula,
                        idDoc: idDoc,
                    },
                    success: function(response) {
                        // Manejar la respuesta de la primera solicitud aquí
                        console.log(response);
                        console.log("Se modificó");

                        // Luego, enviar el formulario a "config/envio.php" después de obtener la respuesta
                        Swal.fire({
                            title: 'Éxito',
                            text: '¡Envío exitoso!',
                            icon: 'success'
                        })
                    },
                    error: function() {
                        // Manejar el error de la primera solicitud aquí, si es necesario
                        console.log("Error en la primera solicitud.");
                    }
                });
            });
        });
    </script> -->


    <!-- <script>
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
    </script> -->

    <script>
    $(document).ready(function() {
        // Agregar un evento al botón "validarDocumento"
        $("#validard").click(function() {
            // Obtener la matrícula y el ID del documento
            var matricula = $("#matricula").val();
            var idDoc = $("#idDoc").val();
            var email = $("#email").val();

            // Crear la URL de la solicitud GET
            var url = "index.php?c=ptc&a=validarDoc&id=" + matricula + "&id2=" + idDoc;

            // Realizar la solicitud AJAX GET
            $.get(url, function(response) {
                // Manejar la respuesta de la solicitud
                console.log("Se modificó");

                // Mostrar una alerta de éxito
                Swal.fire({
                    title: 'Éxito',
                    text: '¡Envío exitoso!',
                    icon: 'success'
                });
            });
        });
    });
</script>



    <!--end::Custom Javascript-->
    <!--end::Javascript-->
</body>
<!--end::Body-->

</html>