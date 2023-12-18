<?php
    $conexion = mysqli_connect('localhost', 'root', '', 'superhero'); 
?>
<!doctype html>
<html lang="en">
  <head>
    <title>Title</title>
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
    <style>
      .table td,
      .table th {
          vertical-align: middle;
      }
      .table-striped tbody tr:nth-of-type(odd) {
        background-color: rgba(0, 0, 0, 0.05);
      }
    </style>
  </head>

  <body>
    <center><h1>Seleccionar Publisher</h1></center>
    <div class="container">
      <div class="card mt-2">
        <div class="card-body">
            <select name="publisher" id="publisher" class="form-select" required>
              <option value="">Seleccione un publisher</option>
            </select>
        </div>
      </div>
      <table class="table">
        <thead>
          <tr class="cabezado">
            <th> Id </th>
            <th> Name </th>
            <th> FullName </th>
            <th> Genero </th>
            <th> Raza </th>
          </tr>
        </thead>
        <tbody>
          <?php

          ?>
        </tbody>
      </table>
    </div>
  </body>
</html>
