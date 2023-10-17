<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Previsualizar PDF en un card</title>
  <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
  <div class="container mt-5">
    <div class="card">
      <div class="card-body">
        <h5 class="card-title">Visor de PDF</h5>
        <div class="pdf-viewer"></div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/pdf.js/2.11.476/pdf.min.js"></script>
  <script>
   s
    // Función para mostrar el PDF en el visor
    async function mostrarPDF() {

      if (pdfData) {
        const loadingTask = pdfjsLib.getDocument({ data: pdfData });
        loadingTask.promise.then(function (pdf) {
          const viewer = document.createElement("div");
          viewer.classList.add("pdf-container");
          viewerContainer.appendChild(viewer);

          pdf.getPage(1).then(function (page) {
            const canvas = document.createElement("canvas");
            viewer.appendChild(canvas);
            const context = canvas.getContext("2d");

            const viewport = page.getViewport({ scale: 1.5 });
            canvas.width = viewport.width;
            canvas.height = viewport.height;

            page.render({ canvasContext: context, viewport: viewport });
          });
        }).catch(function (error) {
          console.error('Error al cargar el PDF:', error);
        });
      }
    }

    // Llamar a la función para mostrar el PDF
    mostrarPDF();
  </script>
</body>
</html>
