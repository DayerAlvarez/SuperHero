<!doctype html>
<html lang="es">
  <head>
    <title>Buscar publisher</title>
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
    .container {
      margin-top: 1px;
    }

    #tabla {
      width: 100%;
      border-collapse: collapse;
      margin-top: 20px;
      table-layout: fixed;
    }

    #tabla th,
    #tabla td {
      border: 1px solid #ddd;
      padding: 8px;
      text-align: center;
      overflow: hidden;
      text-overflow: ellipsis;
      white-space: nowrap;
    }

    #tabla th {
      background-color: #f2f2f2;
    }

    .center-heading {
      text-align: center;
      margin-bottom: 20px;
    }

    .container-table {
      display: flex;
      justify-content: center;
    }
    
  </style>
  </head>
  <body>
    <br>
    <center><h1>Seleccionar Publisher</h1></center>
    <div class="container">
      <div class="alert alert-info mt-3 " style="background-color:A7EDEB;">
        <div class="mb-3">
          <label for="publisher" class="form-label"></label>
          <select  name="publisher" id="publisher" class="form-select" required>
            <option value="">Seleccionar un publisher</option>
          </select>
        </div>
      </div>
    </div>
    <div class="container table table-striped" style="position: relative; text-align: center; left: 1px;">
      <table id="tabla">
        <thead>
          <tr>
            <th style="width: 50px;">Id</th>
            <th style="width: 150px;">Publisher</th>
            <th style="width: 100px;">Name</th>
            <th style="width: 150px;">fullName</th>
            <th style="width: 100px;">Gender</th>
            <th style="width: 100px;">Race</th>
          </tr>
        </thead >
        <tbody id="tablaHeroes">

        </tbody>
      </table>
    </div>
    <script>
      document.addEventListener("DOMContentLoaded", ()=>{
        function $(id) {return document.querySelector(id)}

        (function(){
          fetch(`../controllers/Publisher.controller.php?operacion=listar`)
            .then(respuesta=>respuesta.json())
            .then(datos=>{
              datos.forEach(element => {
                const tagOption = document.createElement("option")
                tagOption.value = element.publisher_name
                tagOption.innerHTML = element.publisher_name
                $("#publisher").appendChild(tagOption)
              });
            })
            .catch(e=>{
              console.error(e)
            })
        })();
        
        function buscar(){
          const publisher = $("#publisher").value
          const parametros = new FormData()

          parametros.append("operacion", "searchPublisher")
          parametros.append("publishername", publisher)

          fetch(`../controllers/Publisher.controller.php`,{
            method: "POST",
            body: parametros
          })
          .then(respuesta=>respuesta.json())
          .then(datos=>{
            //console.log(datos)
            datos.forEach(data => {
              const row = document.createElement("tr")

              Object.values(data).forEach(dato=>{
                const datoSuper = document.createElement("td")
                datoSuper.innerHTML=dato
                row.appendChild(datoSuper)
              });
              $("#tablaHeroes").appendChild(row)
            });

          })
          .catch()
        }
        function limpiar(){
          document.querySelector("#tablaHeroes").innerHTML=""
        }
        
        $("#publisher").addEventListener("change",(event)=>{

            buscar();
            if($("#tablaHeroes")!=""){
              setTimeout(limpiar, 0)
            }    
        })
      })
    </script>
  </body>
</html>