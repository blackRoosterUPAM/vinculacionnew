function validarFormulario() {
    var matricula = document.getElementById('matricula');
    var nombre = document.getElementById('nombre');
    var apellidoPaterno = document.getElementById('apellido_paterno');
    var apellidoMaterno = document.getElementById('apellido_materno');
    var telefono = document.getElementById('telefono');
    var correo = document.getElementById('correo');
    var carrera = document.getElementById('carrera');
    var proceso = document.getElementById('proceso');
    var registrarBtn = document.getElementById('registrarBtn'); // Agrega esta línea para seleccionar el botón

    var validaciones = true;

    // Función para resaltar el campo en rojo si está vacío
    function resaltarCampoVacio(input) {
        if (input.value.trim() === "") {
            input.style.borderColor = 'red';
            validaciones = false;
        } else {
            input.style.borderColor = ''; // Restablece el borde
        }
    }

    // Función para validar un correo electrónico
    function validarCorreo(input) {
        var correoValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
        if (!correoValido.test(input.value)) {
            input.style.borderColor = 'red';
            validaciones = false;
        } else {
            input.style.borderColor = '';
        }
    }

    // Función para validar un número de teléfono (10 dígitos)
    function validarTelefono(input) {
        var telefonoValido = /^\d{10}$/;
        if (!telefonoValido.test(input.value)) {
            input.style.borderColor = 'red';
            validaciones = false;
        } else {
            input.style.borderColor = '';
        }
    }

    // Función para quitar el borde rojo
    function quitarBordeRojo(input) {
        input.style.borderColor = '';
    }

    // Validar y resaltar los campos
    resaltarCampoVacio(matricula);
    resaltarCampoVacio(nombre);
    resaltarCampoVacio(apellidoPaterno);
    resaltarCampoVacio(apellidoMaterno);

    validarCorreo(correo);
    validarTelefono(telefono);

    if (carrera.value === "") {
        carrera.style.borderColor = 'red';
        validaciones = false;
    } else {
        quitarBordeRojo(carrera);
    }

    if (proceso.value === "") {
        proceso.style.borderColor = 'red';
        validaciones = false;
    } else {
        quitarBordeRojo(proceso);
    }

    if (validaciones) {
        registrarBtn.disabled = false; // Habilita el botón si no hay errores
        // Aquí puedes agregar más lógica si es necesario
    } else {
        registrarBtn.disabled = true; // Deshabilita el botón si hay errores
    }
}

// Función para cerrar el modal
function cerrarModal() {
    window.location.href = "index.php?c=escolars&a=index"; // Redirige al índice
}

// Función para bloquear campo de entrada
function bloquearCampo(input, maxLength) {
    if (input.value.length >= maxLength) {
        input.value = input.value.slice(0, maxLength);
        input.removeAttribute("readonly"); // Quita la propiedad "readonly" para permitir la edición nuevamente
    }
}

    // Función para mostrar un mensaje de error debajo del campo
function mostrarError(input, mensaje) {
    var errorElement = document.getElementById(input.id + "-error");
    errorElement.textContent = mensaje;
}

// Función para ocultar el mensaje de error
function ocultarError(input) {
    var errorElement = document.getElementById(input.id + "-error");
    errorElement.textContent = "";
}

// Función para validar el correo en tiempo real
function validarCorreoEnTiempoReal(input) {
    var correoValido = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    if (!correoValido.test(input.value)) {
        mostrarError(input, "Correo inválido");
    } else {
        ocultarError(input);
    }
}

// Función para validar el número de teléfono en tiempo real
function validarTelefonoEnTiempoReal(input) {
    var telefonoValido = /^\d{10}$/;
    if (!telefonoValido.test(input.value)) {
        mostrarError(input, "El teléfono debe tener 10 dígitos numéricos.");
    } else {
        ocultarError(input);
    }

    // Agregar eventos de input para correo y teléfono
    correo.addEventListener("input", function () {
        validarCorreoEnTiempoReal(correo);
    });
    telefono.addEventListener("input", function () {
        validarTelefonoEnTiempoReal(telefono);
    });

    // Validar y resaltar los campos
    resaltarCampoVacio(matricula);
    resaltarCampoVacio(nombre);
    resaltarCampoVacio(apellidoPaterno);
    resaltarCampoVacio(apellidoMaterno);
    // Validar correo y teléfono en tiempo real
    validarCorreoEnTiempoReal(correo);
    validarTelefonoEnTiempoReal(telefono);

    // Deshabilitar el botón si hay errores
    var botones = document.querySelectorAll("button[type='button']");
    var tieneErrores = document.querySelectorAll(".invalid-feedback").some(function (element) {
        return element.textContent !== "";
    });

    botones.forEach(function (boton) {
        boton.disabled = tieneErrores;
    });

    if (!tieneErrores) {
        registrarManualmente();
    }
}