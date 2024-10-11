<!DOCTYPE html>
<html lang="en">
<!--ladylaura.com.ar-->

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>LADY LAURA:ATELIER & BOUTIQUE</title>
  <link rel="icon" href="./public/img/logo_Lady_Laura.ico">

  <!-- All CSS -->
  <link href="./public/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.7.2/font/bootstrap-icons.css">
  <link rel="stylesheet" href="./public/css/estilos.css">
</head>

<body>

  <nav class="navbar navbar-expand-lg navbar-light bg-warning fixed-top">
    <div class="container">
      <img src="./public/img/LL_logo_2.png" alt="">
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="listar.php">Listar Vestidos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="agregar.html">Agregar Vestidos</a>
          </li>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-light text-black" href="shop.php">Cerrar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- shop starts -->
  <section id="portfolio" class="portfolio section-padding">
    <div class="container">
      <br><br><br>
      <div class="row pt-5">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>MI TIENDA ONLINE</h2>

            <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>
          </div>
        </div>
      </div>
      <table class="table table-sm table-striped table-hover mt-4">
        <thead class="table-dark">
          <tr>
            <th>#</th>
            <th>Nombre</th>
            <th width="45%">Descripción</th>
            <th>Precio</th>
            <th>Imagen</th>
            <th>Imagen2</th>
            <th>Imagen3</th>
            <th>Acción</th>
          </tr>
        </thead>

        <?php
        // 1) Conexion
        $conexion = mysqli_connect("127.0.0.1", "root", "");
        mysqli_select_db($conexion, "tienda_ladylaura");


        // 2) Preparar la orden SQL
        // Sintaxis SQL SELECT
        // SELECT * FROM nombre_tabla
        // => Selecciona todos los campos de la siguiente tabla
        // SELECT campos_tabla FROM nombre_tabla
        // => Selecciona los siguientes campos de la siguiente tabla
        $consulta = 'SELECT * FROM ropa_ladylaura';

        // 3) Ejecutar la orden y obtenemos los registros
        $datos = mysqli_query($conexion, $consulta);

        /*nueva forma con foreach
    while ($reg=mysqli_fetch_array($datos, MYSQLI_ASSOC)){
      foreach ($reg as $key => $value) {
        print ("<p>$key: $value</p>\n");
      };
    };*/

        // 4) Mostrar los datos del registro
        while ($reg = mysqli_fetch_array($datos)) { ?>
          <tr>
            <td><?php echo $reg['id']; ?></td>
            <td><?php echo $reg['nombre']; ?></td>
            <td><?php echo $reg['descripcion']; ?></td>
            <td><?php echo $reg['precio']; ?></td>
            <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen']) ?>" alt="" width="100px" height="100px"></td>
            <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen2']) ?>" alt="" width="100px" height="100px"></td>
            <td><img src="data:image/png;base64, <?php echo base64_encode($reg['imagen3']) ?>" alt="" width="100px" height="100px"></td>
            <td><button class="btn-light "><a class="text-decoration-none text-black" href="modificar.php?id=<?php echo $reg['id']; ?>">Editar</a></button>
              <br><br>
              <button class="btn-light"><a class="text-decoration-none text-black" href="borrar.php?id=<?php echo $reg['id']; ?>">Borrar</a></button>
              <br><br>
              <button class="btn-light"><a class="text-decoration-none text-black" href="shop.php">Ver</a></button>
            </td>
          </tr>
        <?php } ?>
      </table>
  </section>

  <!-- All Js -->
  <script src="./public/js/bootstrap.bundle.min.js"></script>
  <script src="./public/js/script.js"></script>
</body>

</html>