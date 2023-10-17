<!DOCTYPE html>
<html>
<head>
    <title>Listado de Alumnos Postulados</title>
    <!-- Agregar los enlaces a Bootstrap CSS y JavaScript -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <!-- Tarjeta de Listado de Alumnos Postulados -->
    <div class="card m-4">
        <div class="card-body">
            <h2 class="card-title">Listado de Alumnos Postulados</h2>
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Matrícula</th>
                            <th>Nombre Completo</th>
                            <th>Carrera</th>
                            <th>Teléfono</th>
                            <th>Correo</th>
                            <th>Ocupación</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- Datos de ejemplo para la tabla -->
                        <tr>
                            <td>001</td>
                            <td>Juan Pérez</td>
                            <td>Ingeniería Informática</td>
                            <td>123-456-7890</td>
                            <td>juan@example.com</td>
                            <td>Estudiante</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-secondary dropdown-toggle" type="button" id="accionesDropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        Acciones
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="accionesDropdown">
                                        <a class="dropdown-item" href="#">Confirmar</a>
                                        <a class="dropdown-item" href="#">Rechazar</a>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <!-- Otros registros aquí -->
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Incluir Bootstrap JS al final del documento -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.3/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
