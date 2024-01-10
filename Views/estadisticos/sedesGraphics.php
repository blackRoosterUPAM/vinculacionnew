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
                                        <span class="page-desc text-white opacity-50 fs-6 fw-bold pt-4">Sedes</span>
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
                                <!-- Division para grafica de sedes privadas y publicas  -->
                                <div id="grafi" class="w-100 h-200px"></div>
                                <!-- Aca debe ir la grafica para el numero de alumnos por sede de cada carrera -->
                                <select name="selectCarrera2" id="selectCarreras2"></select>
                                <div id="kt_charts_widget_15" class="w-100 h-200px"></div>

                                <select name="selectCarrera" id="selectCarreras"></select>
                                <div id="prueba" class="w-100 h-200px"></div>




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
    <script src="assets/plugins/global/plugins.bundle.js"></script>
    <script src="assets/js/scripts.bundle.js"></script>
    <!--end::Global Javascript Bundle-->
    <!--begin::Vendors Javascript(used for this page only)-->
    <script src="assets/plugins/custom/fullcalendar/fullcalendar.bundle.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="assets/plugins/custom/datatables/datatables.bundle.js"></script>
    <!--end::Vendors Javascript-->
    <!--begin::Custom Javascript(used for this page only)-->
    <script src="assets/js/custom/apps/chat/chat.js"></script>

    <script>
        // Objeto principal que contiene la inicialización del gráfico
        var KTChartsWidget30 = {
            // Función principal que inicializa el gráfico
            init: function() {
                // Verifica si la biblioteca amCharts 5 está definida
                if ("undefined" != typeof am5) {
                    // Obtiene el elemento HTML con el id "grafi"
                    var e = document.getElementById("grafi");
                    if (e) {
                        // Función principal que inicializa el gráfico
                        var inicializarGrafico = function(datos) {
                            // Crea un objeto Root de amCharts y establece el tema "Animated"
                            (t = am5.Root.new(e)).setThemes([am5themes_Animated.new(t)]);
                            // Crea un gráfico de pastel
                            var a = t.container.children
                                .push(
                                    am5percent.PieChart.new(t, {
                                        startAngle: 180,
                                        endAngle: 360,
                                        layout: t.verticalLayout,
                                        innerRadius: am5.percent(50),
                                    })
                                )
                                .series.push(
                                    am5percent.PieSeries.new(t, {
                                        startAngle: 180,
                                        endAngle: 360,
                                        valueField: "cantidad",
                                        categoryField: "tipoSede",
                                        alignLabels: !1,
                                    })
                                );
                            //colores de etiquetas
                            a.labels.template.setAll({
                                fontWeight: "400",
                                fontSize: 13,
                                fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")), // Por defecto, usa el color primario
                            });
                            // Configura la apariencia del gráfico
                            a.get("colors").set("colors", [
                                am5.color(0x6771dc),
                                am5.color(KTUtil.getCssVariableValue("--bs-primary")),
                                am5.color(0x5aaa95),
                                am5.color(0x86a873),
                                am5.color(0xbb9f06)
                            ]);
                            a.states.create("hidden", {
                                startAngle: 180,
                                endAngle: 180
                            });
                            a.slices.template.setAll({
                                cornerRadius: 5
                            });
                            a.ticks.template.setAll({
                                forceHidden: !0
                            });

                            // Establece los datos en el gráfico
                            a.data.setAll(datos);
                            // Hace que el gráfico aparezca con una animación
                            a.appear(1e3, 100);
                        };

                        // Función para cargar los datos de las sedes mediante Ajax
                        var cargarDatosSedes = function() {
                            // Realiza una solicitud Ajax para obtener los datos de las sedes
                            $.ajax({
                                type: "POST",
                                url: "index.php?c=estad&a=sedesByTipo", // Ajusta la URL según tu estructura de archivos
                                dataType: "json",
                                success: function(response) {
                                    // Llama a la función para inicializar el gráfico con los datos recibidos
                                    inicializarGrafico(response);
                                },
                                error: function(xhr, status, error) {
                                    console.error('Error en la solicitud Ajax:', xhr, status, error);
                                }
                            });
                        };

                        // Cuando la biblioteca amCharts está lista, ejecuta la función principal
                        am5.ready(function() {
                            cargarDatosSedes();
                        });

                        // Registra un evento para cambiar el tema y volver a ejecutar la función principal
                        KTThemeMode.on("kt.thememode.change", function() {
                            t.dispose();
                            cargarDatosSedes();
                        });
                    }
                }
            },
        };

        // Exporta el objeto si se está utilizando como un módulo
        "undefined" != typeof module && (module.exports = KTChartsWidget30);

        // Ejecuta la función principal cuando el DOM está completamente cargado
        KTUtil.onDOMContentLoaded(function() {
            KTChartsWidget30.init();
        });
    </script>

    <script>
        var KTChartsWidget15 = {
            init: function(chartData) {
                !(function() {
                    if ("undefined" != typeof am5) {
                        var e = document.getElementById("kt_charts_widget_15");
                        if (e) {
                            var t,
                                a = function(data) {
                                    (t = am5.Root.new(e)).setThemes([am5themes_Animated.new(t)]);
                                    var chart = t.container.children.push(
                                            am5xy.XYChart.new(t, {
                                                panX: !1,
                                                panY: !1,
                                                layout: t.verticalLayout,
                                            })
                                        ),
                                        r = chart.xAxes.push(
                                            am5xy.CategoryAxis.new(t, {
                                                categoryField: "country",
                                                renderer: am5xy.AxisRendererX.new(t, {
                                                    minGridDistance: 30,
                                                }),
                                                bullet: function(e, t, a) {
                                                    return am5xy.AxisBullet.new(e, {
                                                        location: 0.5,
                                                        sprite: am5.Picture.new(e, {
                                                            width: 24,
                                                            height: 24,
                                                            centerY: am5.p50,
                                                            centerX: am5.p50,
                                                            src: a.dataContext.icon,
                                                        }),
                                                    });
                                                },
                                            })
                                        );
                                    r
                                        .get("renderer")
                                        .labels.template.setAll({
                                            paddingTop: 20,
                                            fontWeight: "400",
                                            fontSize: 10,
                                            fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                        });
                                    r
                                        .get("renderer")
                                        .grid.template.setAll({
                                            disabled: !0,
                                            strokeOpacity: 0,
                                        });
                                    r.data.setAll(data);
                                    var o = chart.yAxes.push(
                                        am5xy.ValueAxis.new(t, {
                                            renderer: am5xy.AxisRendererY.new(t, {}),
                                        })
                                    );
                                    o
                                        .get("renderer")
                                        .grid.template.setAll({
                                            stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),
                                            strokeWidth: 1,
                                            strokeOpacity: 1,
                                            strokeDasharray: [3],
                                        });
                                    o
                                        .get("renderer")
                                        .labels.template.setAll({
                                            fontWeight: "400",
                                            fontSize: 10,
                                            fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                                        });
                                    var i = chart.series.push(
                                        am5xy.ColumnSeries.new(t, {
                                            xAxis: r,
                                            yAxis: o,
                                            valueYField: "active",
                                            categoryXField: "country",
                                        })
                                    );
                                    i.columns.template.setAll({
                                        tooltipText: "{categoryX}: {valueY}",
                                        tooltipY: 0,
                                        strokeOpacity: 0,
                                        templateField: "columnSettings",
                                    });
                                    i.columns.template.setAll({
                                        strokeOpacity: 0,
                                        cornerRadiusBR: 0,
                                        cornerRadiusTR: 6,
                                        cornerRadiusBL: 0,
                                        cornerRadiusTL: 6,
                                    });
                                    i.data.setAll(data);
                                    i.appear();
                                    chart.appear(1e3, 100);

                                    //dfd
                                    var ina = chart.series.push(
                                        am5xy.ColumnSeries.new(t, {
                                            xAxis: r,
                                            yAxis: o,
                                            valueYField: "inactive",
                                            categoryXField: "country",
                                        })
                                    );
                                    ina.columns.template.setAll({
                                        tooltipText: "{categoryX}: {valueY}",
                                        tooltipY: 0,
                                        strokeOpacity: 0,
                                        templateField: "columnSettings",
                                    });
                                    ina.columns.template.setAll({
                                        strokeOpacity: 0,
                                        cornerRadiusBR: 0,
                                        cornerRadiusTR: 6,
                                        cornerRadiusBL: 0,
                                        cornerRadiusTL: 6,
                                    });
                                    ina.data.setAll(data);
                                    ina.appear();
                                    chart.appear(1e3, 100);
                                };

                            am5.ready(function() {
                                if (t) {
                                    t.dispose();
                                    console.log("destruyo");
                                }
                                a(chartData);
                            });

                            KTThemeMode.on("kt.thememode.change", function() {
                                t.dispose(), a(chartData);
                            });


                        }
                    }
                })();
            },
        };
        "undefined" != typeof module && (module.exports = KTChartsWidget15),
            KTUtil.onDOMContentLoaded(function() {
                //Usar select
                // Datos de ejemplo para el select (debes obtener esto dinámicamente desde tu endpoint)
                var carrerasDisponibles = ["Carrera 1", "Carrera 2", "Carrera 3"];

                // Crea las opciones para el select
                var selectCarreras = document.getElementById("selectCarreras2");
                carrerasDisponibles.forEach(function(carrera) {
                    var option = document.createElement("option");
                    option.value = carrera;
                    option.text = carrera;
                    selectCarreras.add(option);
                });
                console.log(selectCarreras.value);
                selectCarreras.addEventListener("change", function() {
                    var selectedCarrera = selectCarreras.value;
                    console.log(selectedCarrera);
                     // Datos de la gráfica
                var chartData = [{
                    country: "US",
                    active: 30,
                    inactive: 20,
                    columnSettings: {
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-primary")),
                    },
                }, ];
                    
                    if(KTChartsWidget15){
                        console.log("Entro al if");
                    }
                    KTChartsWidget15.init(chartData);
                });

               
            });
    </script>

    <!-- >Script de prueba -->

    <!-- <script>
        var prueba = {
            init: function() {
                var chartData = []; // Variable para almacenar los datos de la gráfica

                // Función para inicializar la gráfica con datos específicos
                function initializeChart(data) {
                    var e = document.getElementById("prueba");
                    var t = am5.Root.new(e);
                    t.setThemes([am5themes_Animated.new(t)]);
                    var chart = t.container.children.push(
                        am5xy.XYChart.new(t, {
                            panX: !1,
                            panY: !1,
                            layout: t.verticalLayout,
                        })
                    );
                    var r = chart.xAxes.push(
                        am5xy.CategoryAxis.new(t, {
                            categoryField: "country",
                            renderer: am5xy.AxisRendererX.new(t, {
                                minGridDistance: 30,
                            }),
                            bullet: function(e, t, a) {
                                return am5xy.AxisBullet.new(e, {
                                    location: 0.5,
                                    sprite: am5.Picture.new(e, {
                                        width: 24,
                                        height: 24,
                                        centerY: am5.p50,
                                        centerX: am5.p50,
                                        src: a.dataContext.icon,
                                    }),
                                });
                            },
                        })
                    );
                    r.get("renderer").labels.template.setAll({
                        paddingTop: 20,
                        fontWeight: "400",
                        fontSize: 10,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                    });
                    r.get("renderer").grid.template.setAll({
                        disabled: !0,
                        strokeOpacity: 0,
                    });
                    r.data.setAll(data);
                    var o = chart.yAxes.push(
                        am5xy.ValueAxis.new(t, {
                            renderer: am5xy.AxisRendererY.new(t, {}),
                        })
                    );
                    o.get("renderer").grid.template.setAll({
                        stroke: am5.color(KTUtil.getCssVariableValue("--bs-gray-300")),
                        strokeWidth: 1,
                        strokeOpacity: 1,
                        strokeDasharray: [3],
                    });
                    o.get("renderer").labels.template.setAll({
                        fontWeight: "400",
                        fontSize: 10,
                        fill: am5.color(KTUtil.getCssVariableValue("--bs-gray-500")),
                    });
                    var activeSeries = chart.series.push(
                        am5xy.ColumnSeries.new(t, {
                            xAxis: r,
                            yAxis: o,
                            valueYField: "active",
                            categoryXField: "country",
                        })
                    );
                    activeSeries.columns.template.setAll({
                        tooltipText: "{categoryX}: {valueY}",
                        tooltipY: 0,
                        strokeOpacity: 0,
                        templateField: "columnSettings",
                    });
                    activeSeries.columns.template.setAll({
                        strokeOpacity: 0,
                        cornerRadiusBR: 0,
                        cornerRadiusTR: 6,
                        cornerRadiusBL: 0,
                        cornerRadiusTL: 6,
                    });
                    activeSeries.data.setAll(data);
                    activeSeries.appear();
                    chart.appear(1e3, 100);

                    var inactiveSeries = chart.series.push(
                        am5xy.ColumnSeries.new(t, {
                            xAxis: r,
                            yAxis: o,
                            valueYField: "inactive",
                            categoryXField: "country",
                        })
                    );
                    inactiveSeries.columns.template.setAll({
                        tooltipText: "{categoryX}: {valueY}",
                        tooltipY: 0,
                        strokeOpacity: 0,
                        templateField: "columnSettings",
                    });
                    inactiveSeries.columns.template.setAll({
                        strokeOpacity: 0,
                        cornerRadiusBR: 0,
                        cornerRadiusTR: 6,
                        cornerRadiusBL: 0,
                        cornerRadiusTL: 6,
                    });
                    inactiveSeries.data.setAll(data);
                    inactiveSeries.appear();
                    chart.appear(1e3, 100);
                }

                // Función para obtener los datos de la carrera seleccionada
                function obtenerDatosCarrera(nombreCarrera) {
                    // Simulación de una solicitud AJAX para obtener los datos
                    // Reemplaza esto con una solicitud real usando Fetch o jQuery.ajax
                    var datosCarrera = [{
                        country: "US",
                        active: 40,
                        inactive: 20,
                        columnSettings: {
                            fill: am5.color(KTUtil.getCssVariableValue("--bs-primary")),
                        },
                    }];

                    initializeChart(datosCarrera);
                }

                // Manejar el evento de cambio en el <select>
                var selectCarreras = document.getElementById("selectCarreras");
                selectCarreras.addEventListener("change", function() {
                    var selectedCarrera = selectCarreras.value;
                    obtenerDatosCarrera(selectedCarrera);
                });

                // Llamar a obtenerDatosCarrera con la opción seleccionada por defecto al inicio
                obtenerDatosCarrera(selectCarreras.value);
            },
        };

        "undefined" != typeof module && (module.exports = prueba);

        KTUtil.onDOMContentLoaded(function() {
            // Datos de ejemplo para el select (debes obtener esto dinámicamente desde tu endpoint)
            var carrerasDisponibles = ["Carrera 1", "Carrera 2", "Carrera 3"];

            // Crea las opciones para el select
            var selectCarreras = document.getElementById("selectCarreras");
            carrerasDisponibles.forEach(function(carrera) {
                var option = document.createElement("option");
                option.value = carrera;
                option.text = carrera;
                selectCarreras.add(option);
            });


            // Inicializar la gráfica
            prueba.init();
        });
    </script> -->



</body>
<footer>
    <?php include('footer.php') ?>
</footer>
<!--end::Body-->

</html>