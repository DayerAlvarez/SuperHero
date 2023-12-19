<?php  
require_once '../models/publisher.php';
?>
<!doctype html>
<html lang="es">
  <head>
    <title>Grafico bandos</title>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS v5.2.1 -->
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN"
      crossorigin="anonymous"
    />
  </head>
  <body>
    <br>
    <center><h1>Gráfico Cantidad Bandos</h1></center>
    <div style="width: 70%; margin: auto">
      <canvas id="lienzo"></canvas>
    </div>
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  <script>
    const contexto = document.querySelector("#lienzo")
    const grafico = new Chart(contexto, {
      type: 'bar',
      data:{
        labels: [],
        datasets: [{
          label: "Cantidad de bandos",
          data: []
        }]
      }
    });

    (function(){
      fetch(`../controllers/publisher.controller.php?operacion=graficarBandos`)
        .then(respuesta=>respuesta.json())
        .then(datos=>{
          
          grafico.data.labels = datos.map(registro=>registro.alignment)
          grafico.data.labels[3]='N/A'
          grafico.data.datasets[0].data = datos.map(registro=>registro.cantidad)
          grafico.update()
        })
        .catch(e=>{
          console.error(e)})
    })();
  </script>
  </body>
</html>