<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1", "root", "");
mysqli_select_db($conexion, "tienda_ladylaura");
// 2) Almacenamos los datos del envío GET
// a) generar variables para el id a utilizar
$id = $_GET['id'];
// 3) Preparar la SQL
// => Selecciona todos los campos de la tabla alumno donde el campo id  sea igual a $id
// a) generar la consulta a realizar
$consulta = "SELECT * FROM ropa_ladylaura WHERE id=$id";
// 4) Ejecutar la orden y almacenamos en una variable el resultado
// a) ejecutar la consulta
$repuesta = mysqli_query($conexion, $consulta);
// 5) Transformamos el registro obtenido a un array
$datos = mysqli_fetch_array($repuesta);
?>

<!DOCTYPE html>
<html lang="en">

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
      <a href="index.html"><img src="./public/img/LL_logo_2.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="shop.php">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.html#about">Quien Soy</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.html#portfolio">Mis Trabajos</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.html#contact">Novedades</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="./index.html#maps">Como Llegás</a>
          </li>
          <li class="nav-item">
            <a class="nav-link text-success" href="#teens">#Moda-Teens</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn-light text-black" href="./login.html">Iniciar Sesión</a>
          </li>
        </ul>
      </div>
    </div>
  </nav>

  <body>


    <?php
    // 6) asignamos a diferentes variables los respectivos valores del array $datos.
    // este paso no es estrictamente necesario, pero es mas practico
    //para despues llamarlos solo con el nombre de la variable
    $nombre = $datos["nombre"];
    $descripcion = $datos["descripcion"];
    $precio = $datos["precio"];
    $imagen = $datos['imagen']; ?>

    <!-- mostramos los datos de ese único producto
  lo meto en una card, pero se puede mostrar como quieran-->




    <!-- contenedor -->
    <div class="container">
      <div class="row">
        <div class="col mb-5">
          <div class="card h-100">
            <!-- Product image-->
            <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen']) ?>" alt="..." />
            <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($datos['imagen2']) ?>" alt="..." />
            <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($datos['imagen3']) ?>" alt="..." />
            <!-- Product details-->
            <div class="card-body p-4">
              <div class="text-center">
                <!-- Product name-->
                <h5 class="fw-bolder"><?php echo $nombre; ?></h5>
                <p class="card-text"><?php echo $descripcion ?></p>
                <!-- Product price-->
                <h2>$<?php echo $datos["precio"]; ?></h2>
              </div>
            </div>
            <!-- Product actions-->
            <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
              <!--boton que me lleva a la pagina del producto-->
              <div class="">
                <a href="productos.php?id=<?php echo $reg['id']; ?>"> <button type="button" name="button">Ver más</button></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>



    <!-- footer starts -->
    <footer class="bg-warning p-2">
      <hr>
      <div class="container text-center">
        <img src="./public/img/logo-footer.png" alt="">
        <br>
        <br>
        <p class="text-black">2023-TODOS LOS DERECHOS RESERVADOS.-.@LADYLAURAATELIER&BOUTIQUE</p>
      </div>
      <hr>
    </footer>
    <!-- footer ends -->



    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="js/scripts.js"></script>
  </body>

</html>