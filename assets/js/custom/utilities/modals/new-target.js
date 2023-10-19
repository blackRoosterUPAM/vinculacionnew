"use strict";

var ModalNewTarget = (function () {
  var modal, cancelButton, submitButton, form, tagifyInstance, validation, SwalModal;

  return {
    init: function () {
      // Busca el modal con el ID "kt_modal_new_target" en el documento.
      modal = document.querySelector("#kt_modal_new_target");

      if (modal) {
        // Inicializa un modal de Bootstrap.
        var bootstrapModal = new bootstrap.Modal(modal);

        // Busca el formulario dentro del modal.
        form = document.querySelector("#kt_modal_new_target_form");

        // Busca los botones de cancelar y enviar dentro del formulario.
        submitButton = document.getElementById("kt_modal_new_target_submit");
        cancelButton = document.getElementById("kt_modal_new_target_cancel");

        // Inicializa un Tagify (un plugin para etiquetas) en un campo de "tags" del formulario.
        tagifyInstance = new Tagify(form.querySelector('[name="tags"]'), {
          whitelist: ["Important", "Urgent", "High", "Medium", "Low"],
          maxTags: 5,
          dropdown: { maxItems: 10, enabled: 0, closeOnSelect: false },
        });

        tagifyInstance.on("change", function () {
          validation.revalidateField("tags");
        });

        // Inicializa Flatpickr (un selector de fechas y horas) en el campo "due_date".
        $(form.querySelector('[name="due_date"]')).flatpickr({
          enableTime: true,
          dateFormat: "d, M Y, H:i",
        });

        // Agrega un evento de cambio al campo "team_assign" para validar.
        $(form.querySelector('[name="team_assign"]')).on("change", function () {
          validation.revalidateField("team_assign");
        });

        // Configura la validación del formulario utilizando la biblioteca FormValidation.
        validation = FormValidation.formValidation(form, {
          fields: {
            target_title: {
              validators: { notEmpty: { message: "El título del objetivo es requerido" } },
            },
            target_assign: {
              validators: { notEmpty: { message: "La asignación del objetivo es requerida" } },
            },
            target_due_date: {
              validators: { notEmpty: { message: "La fecha de vencimiento del objetivo es requerida" } },
            },
            target_tags: {
              validators: { notEmpty: { message: "Las etiquetas del objetivo son requeridas" } },
            },
            "targets_notifications[]": {
              validators: {
                notEmpty: {
                  message: "Por favor, selecciona al menos un método de comunicación",
                },
              },
            },
          },
          plugins: {
            trigger: new FormValidation.plugins.Trigger(),
            bootstrap: new FormValidation.plugins.Bootstrap5({
              rowSelector: ".fv-row",
              eleInvalidClass: "",
              eleValidClass: "",
            }),
          },
        });

        // Agrega un evento de clic al botón de envío del formulario.
        submitButton.addEventListener("click", function (e) {
          e.preventDefault();
          if (validation) {
            // Realiza la validación del formulario.
            validation.validate().then(function (result) {
              console.log("Validado");
              if (result === "Valid") {
                // Realiza acciones si la validación es exitosa, como mostrar un mensaje de éxito.
                submitButton.setAttribute("data-kt-indicator", "on");
                submitButton.disabled = true;
                setTimeout(function () {
                  submitButton.removeAttribute("data-kt-indicator");
                  submitButton.disabled = false;
                  Swal.fire({
                    text: "¡El formulario se ha enviado exitosamente!",
                    icon: "success",
                    buttonsStyling: false,
                    confirmButtonText: "Ok, entendido",
                    customClass: { confirmButton: "btn btn-primary" },
                  }).then(function (result) {
                    if (result.isConfirmed) {
                      bootstrapModal.hide();
                    }
                  });
                }, 2000);
              } else {
                // Muestra un mensaje de error si la validación no es exitosa.
                Swal.fire({
                  text: "Lo siento, parece que se han detectado algunos errores. Por favor, inténtalo de nuevo.",
                  icon: "error",
                  buttonsStyling: false,
                  confirmButtonText: "Ok, entendido",
                  customClass: { confirmButton: "btn btn-primary" },
                });
              }
            });
          }
        });

        // Agrega un evento de clic al botón de cancelar.
        cancelButton.addEventListener("click", function (e) {
          e.preventDefault();
          // Muestra un mensaje de confirmación para cancelar el formulario.
          Swal.fire({
            text: "¿Estás seguro de que deseas cancelar?",
            icon: "warning",
            showCancelButton: true,
            buttonsStyling: false,
            confirmButtonText: "Sí, cancelar",
            cancelButtonText: "No, regresar",
            customClass: {
              confirmButton: "btn btn-primary",
              cancelButton: "btn btn-active-light",
            },
          }).then(function (result) {
            if (result.value) {
              // Si el usuario confirma, se restablece el formulario y se oculta el modal.
              form.reset();
              bootstrapModal.hide();
            } else if (result.dismiss === "cancel") {
              // Si el usuario descarta el mensaje de confirmación, muestra un mensaje de error.
              Swal.fire({
                text: "¡Tu formulario no ha sido cancelado!",
                icon: "error",
                buttonsStyling: false,
                confirmButtonText: "Ok, entendido",
                customClass: { confirmButton: "btn btn-primary" },
              });
            }
          });
        });
      }
    },
  };
})();

// Inicializa el módulo "ModalNewTarget" cuando se carga el contenido de la página.
KTUtil.onDOMContentLoaded(function () {
  ModalNewTarget.init();
});
