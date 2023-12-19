<!DOCTYPE html>
<html lang="en">

<head>
    <title>ESTADISTICOS</title>
    <meta charset="utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="shortcut icon" href="assets/media/logos/upam.ico" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
    <link href="assets/plugins/custom/fullcalendar/fullcalendar.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/custom/datatables/datatables.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/plugins/global/plugins.bundle.css" rel="stylesheet" type="text/css" />
    <link href="assets/css/style.bundle.css" rel="stylesheet" type="text/css" />
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
                            <!--begin::Toolbar wrapper=-->
                            <div class="d-flex flex-stack flex-wrap flex-lg-nowrap gap-4 gap-lg-10 pt-6 pb-18 py-lg-13">
                                <!--begin::Page title-->
                                <div class="page-title d-flex align-items-center me-3">
                                    <img alt="Logo" src="assets/media/svg/misc/layer.svg" class="h-60px me-5" />
                                    <!--begin::Title-->
                                    <h1 class="page-heading d-flex text-white fw-bolder fs-2 flex-column justify-content-center my-0">Estadísticas
                                        <!--begin::Description-->
                                        <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Alumnos</span>
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
                                <!-- Contenido de la pagina -->
                                <!-- Dropdown para seleccionar la carrera -->
                                <label for="carreraSelect">Selecciona una carrera:</label>
                                <select id="carreraSelect" class="form-control"></select>

                                <!-- Contenedor para la gráfica de alumnos activos e inactivos -->
                                <div style="width: 70%; margin: 20px auto;">
                                    <canvas id="graficaAlumnos"></canvas>
                                </div>
        <br>
                                <!-- Dropdown para seleccionar la sede -->
                                <label for="sedeSelect">Selecciona una sede:</label>
                                <select id="sedeSelect" class="form-control">
                                    <!-- Las opciones se llenarán dinámicamente al cargar la página -->
                                </select>

                                <!-- Contenedor para la gráfica de alumnos aceptados, pendientes y rechazados -->
                                <div style="width: 70%; margin: 20px auto;">
                                    <canvas id="graficaAlumnosAP"></canvas>
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
    <!--begin::Drawers-->
    <!--begin::Scrolltop-->
    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-outline ki-arrow-up"></i>
    </div>
    <!--end::Scrolltop-->
    <!--begin::Javascript-->
    <script>
        var hostUrl = "assets/";
    </script>
    <!--begin::Global Javascript Bundle(mandatory for all pages)-->
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Custom Javascript-->
    <!-- Grafica alumnos activos e inactivos -->
    <!-- <script>
        // Al cargar la página, obtén las carreras y llénalas en el dropdown
        $(document).ready(function() {
            obtenerCarreras();
        });

        // Guardar la instancia de la gráfica actual
        var myChart;

        // Función para obtener las carreras y llenar el dropdown
        function obtenerCarreras() {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerCarreras',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Llena el dropdown con las carreras
                    var dropdown = $('#carreraSelect');
                    dropdown.empty();
                    $.each(data, function(key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.idCarrera).text(entry.nombreCarrera));
                    });

                    // Asigna un evento al cambio en el dropdown
                    dropdown.change(function() {
                        var nombreCarrera = $(this).val();
                        obtenerDatosCarrera(nombreCarrera);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para obtener y mostrar los datos de la carrera seleccionada
        function obtenerDatosCarrera(nombreCarrera) {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerDatosCarrera',
                type: 'POST',
                data: {
                    nombreCarrera: nombreCarrera
                },
                dataType: 'json',
                success: function(data) {
                    // Llama a la función para dibujar la gráfica con los datos
                    dibujarGrafica(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        // Función para dibujar la gráfica con los datos recibidos
        function dibujarGrafica(datos) {
            // Destruir la instancia de la gráfica actual si existe
            if (myChart) {
                myChart.destroy();
            }

            var ctx = document.getElementById('graficaAlumnos').getContext('2d');

            if (datos.length === 0) {
                // No hay datos, dibuja una gráfica vacía con animación y colores sólidos
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Activos', 'Inactivos'],
                        datasets: [{
                            label: 'Número de Alumnos',
                            data: [0, 0],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            animation: {
                                duration: 1500, // Duración de la animación en milisegundos
                                easing: 'easeInOutQuad', // Tipo de animación (puedes ajustarlo según tus preferencias)
                                onProgress: function(animation) {
                                    // Agregar efecto de crecimiento de las barras
                                    for (var datasetIndex = 0; datasetIndex < myChart.data.datasets.length; datasetIndex++) {
                                        var meta = myChart.getDatasetMeta(datasetIndex);
                                        for (var index = 0; index < meta.data.length; index++) {
                                            var model = meta.data[index]._model;
                                            model.scaleTop = animation.currentStep / animation.numSteps;
                                            model.y = Math.min(animation.currentStep / animation.numSteps, 1) * model.base;
                                            model.height = model.base - model.y;
                                        }
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                // Hay datos, dibuja la gráfica con animación y colores sólidos
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Activos', 'Inactivos'],
                        datasets: [{
                            label: datos[0].country,
                            data: [datos[0].active, datos[0].inactive],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            animation: {
                                duration: 1500, // Duración de la animación en milisegundos
                                easing: 'easeInOutQuad' // Tipo de animación (puedes ajustarlo según tus preferencias)
                            }
                        }
                    }
                });
            }
        }
    </script> -->
    <!-- grafica alumnos aceptados y pendientes  -->

    <!-- <script>
        // Al cargar la página, obtén las sedes y llénalas en el dropdown
        $(document).ready(function() {
            obtenerSedes();
        });

        var myChart2; // Variable para almacenar la instancia de la gráfica

        // Función para obtener las sedes y llenar el dropdown
        function obtenerSedes() {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerSedes',
                type: 'GET',
                dataType: 'json',
                success: function(sedes) {
                    var dropdown = $('#sedeSelect');
                    dropdown.empty();
                    $.each(sedes, function(key, sede) {
                        dropdown.append($('<option></option>').attr('value', sede.IdSede).text(sede.NombreSede));
                    });

                    // Asigna un evento al cambio en el dropdown
                    dropdown.change(function() {
                        var idSede = $(this).val();
                        obtenerDatosSede(idSede);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para obtener y mostrar los datos de la sede seleccionada
        function obtenerDatosSede(idSede) {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerDatosSede',
                type: 'POST',
                data: {
                    idSede: idSede,
                    idPeriodo: 10 // Filtro de idPeriodo
                },
                dataType: 'json',
                success: function(data) {
                    // Llama a la función para dibujar la gráfica con los datos
                    dibujarGrafica(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para dibujar la gráfica con los datos recibidos
        function dibujarGrafica(datos) {
            var ctx = document.getElementById('graficaAlumnosAP').getContext('2d');

            // Destruir la instancia anterior de la gráfica si existe
            if (myChart2) {
                myChart2.destroy();
            }

            // Verificamos si hay datos
            if (datos && Object.keys(datos).length > 0) {
                // Configuración de la gráfica
                var options = {
                    responsive: true,
                    maintainAspectRatio: false,
                };

                // Crea la gráfica de pastel
                myChart2 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Aceptados', 'Pendientes', 'Rechazados'],
                        datasets: [{
                            data: [datos.aceptados, datos.pendientes, datos.rechazados],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: options
                });
            } else {
                // Si no hay datos, muestra una gráfica vacía
                ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            }
        }
    </script> -->
    <!--end::Javascript-->

    <script>
        // Al cargar la página, obtén las carreras y llénalas en el dropdown
        $(document).ready(function() {
            obtenerCarreras();
            obtenerSedes();
        });

        var myChart; // Variable para almacenar la instancia de la gráfica de alumnos activos
        var myChart2; // Variable para almacenar la instancia de la gráfica de alumnos aceptados, pendientes y rechazados

        // Resto de tu código...
        // Función para obtener las carreras y llenar el dropdown
        function obtenerCarreras() {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerCarreras',
                type: 'GET',
                dataType: 'json',
                success: function(data) {
                    // Llena el dropdown con las carreras
                    var dropdown = $('#carreraSelect');
                    dropdown.empty();
                    
                    dropdown.append($('<option></option>').attr('value', 0).text("Seleccione"));
                    $.each(data, function(key, entry) {
                        dropdown.append($('<option></option>').attr('value', entry.idCarrera).text(entry.nombreCarrera));
                    });

                    // Asigna un evento al cambio en el dropdown
                    dropdown.change(function() {
                        var nombreCarrera = $(this).val();
                        obtenerDatosCarrera(nombreCarrera);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para obtener y mostrar los datos de la carrera seleccionada
        function obtenerDatosCarrera(nombreCarrera) {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerDatosCarrera',
                type: 'POST',
                data: {
                    nombreCarrera: nombreCarrera
                },
                dataType: 'json',
                success: function(data) {
                    // Llama a la función para dibujar la gráfica con los datos
                    dibujarGrafica(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para dibujar la gráfica de alumnos activos e inactivos
        function dibujarGrafica(datos) {
            // Destruir la instancia de la gráfica actual si existe
            if (myChart) {
                myChart.destroy();
            }
            var ctx = document.getElementById('graficaAlumnos').getContext('2d');

            if (datos.length === 0) {
                // No hay datos, dibuja una gráfica vacía con animación y colores sólidos
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Activos', 'Inactivos'],
                        datasets: [{
                            label: 'Número de Alumnos',
                            data: [0, 0],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            animation: {
                                duration: 1500, // Duración de la animación en milisegundos
                                easing: 'easeInOutQuad', // Tipo de animación (puedes ajustarlo según tus preferencias)
                                onProgress: function(animation) {
                                    // Agregar efecto de crecimiento de las barras
                                    for (var datasetIndex = 0; datasetIndex < myChart.data.datasets.length; datasetIndex++) {
                                        var meta = myChart.getDatasetMeta(datasetIndex);
                                        for (var index = 0; index < meta.data.length; index++) {
                                            var model = meta.data[index]._model;
                                            model.scaleTop = animation.currentStep / animation.numSteps;
                                            model.y = Math.min(animation.currentStep / animation.numSteps, 1) * model.base;
                                            model.height = model.base - model.y;
                                        }
                                    }
                                }
                            }
                        }
                    }
                });
            } else {
                // Hay datos, dibuja la gráfica con animación y colores sólidos
                myChart = new Chart(ctx, {
                    type: 'bar',
                    data: {
                        labels: ['Activos', 'Inactivos'],
                        datasets: [{
                            label: datos[0].country,
                            data: [datos[0].active, datos[0].inactive],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: {
                        scales: {
                            y: {
                                beginAtZero: true
                            }
                        },
                        plugins: {
                            animation: {
                                duration: 1500, // Duración de la animación en milisegundos
                                easing: 'easeInOutQuad' // Tipo de animación (puedes ajustarlo según tus preferencias)
                            }
                        }
                    }
                });
            }
            // Resto de tu código...
        }


        // Función para obtener las sedes y llenar el dropdown
        function obtenerSedes() {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerSedes',
                type: 'GET',
                dataType: 'json',
                success: function(sedes) {
                    var dropdown = $('#sedeSelect');
                    dropdown.empty();
                        dropdown.append($('<option></option>').attr('value', 0).text("Seleccione"));
                    $.each(sedes, function(key, sede) {
                        dropdown.append($('<option></option>').attr('value', sede.IdSede).text(sede.NombreSede));
                    });

                    // Asigna un evento al cambio en el dropdown
                    dropdown.change(function() {
                        var idSede = $(this).val();
                        obtenerDatosSede(idSede);
                    });
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }

        // Función para obtener y mostrar los datos de la sede seleccionada
        function obtenerDatosSede(idSede) {
            $.ajax({
                url: 'index.php?c=estad&a=obtenerDatosSede',
                type: 'POST',
                data: {
                    idSede: idSede,
                    idPeriodo: 10 // Filtro de idPeriodo
                },
                dataType: 'json',
                success: function(data) {
                    // Llama a la función para dibujar la gráfica con los datos
                    dibujarGraficaAP(data);
                    console.log(data);
                },
                error: function(error) {
                    console.log(error);
                }
            });
        }
        // Función para dibujar la gráfica de alumnos aceptados, pendientes y rechazados
        function dibujarGraficaAP(datos) {
            // Destruir la instancia anterior de la gráfica si existe
            if (myChart2) {
                myChart2.destroy();
            }

            var ctx = document.getElementById('graficaAlumnosAP').getContext('2d');
            // Resto de tu código...
            // Verificamos si hay datos
            if (datos && Object.keys(datos).length > 0) {
                // Configuración de la gráfica
                var options = {
                    responsive: true,
                    maintainAspectRatio: false,
                };

                // Crea la gráfica de pastel
                myChart2 = new Chart(ctx, {
                    type: 'doughnut',
                    data: {
                        labels: ['Aceptados', 'Pendientes', 'Rechazados'],
                        datasets: [{
                            data: [datos.aceptados, datos.pendientes, datos.rechazados],
                            backgroundColor: [
                                'rgba(75, 192, 192, 0.7)',
                                'rgba(255, 206, 86, 0.7)',
                                'rgba(255, 99, 132, 0.7)',
                            ],
                            borderColor: [
                                'rgba(75, 192, 192, 1)',
                                'rgba(255, 206, 86, 1)',
                                'rgba(255, 99, 132, 1)',
                            ],
                            borderWidth: 1
                        }]
                    },
                    options: options
                });
            } else {
                // Si no hay datos, muestra una gráfica vacía
                ctx.clearRect(0, 0, ctx.canvas.width, ctx.canvas.height);
            }
        }
    </script>
</body>
<footer>
    <?php include('footer.php') ?>
</footer>
<!--end::Body-->

</html>