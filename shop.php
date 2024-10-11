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
      <a href="index.html"><img src="./public/img/LL_logo_2.png" alt=""></a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
          <li class="nav-item">
            <a class="nav-link" href="index.html">Inicio</a>
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
  <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="3" aria-label="Slide 4"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="./public/img/tienda/carrusel1.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>NOVIAS</h5>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Nobis in enim ipsa asperiores incidunt explicabo provident tempora voluptate numquam facere nostrum inventore aspernatur voluptatum soluta corrupti culpa esse, labore quaerat?</p>
          <p><a href="#" class="btn btn-warning mt-3"></a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./public/img/tienda/carrusel2.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>GALA</h5>
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Maiores aspernatur sequi quaerat minima ipsa. Doloremque, velit. Alias quo quibusdam modi quas debitis reiciendis tenetur expedita nulla, culpa sed eius cum.</p>
          <p><a href="./shop.html" class="btn btn-warning mt-3" </a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./public/img/tienda/carrusel3.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>Teens</h5>
          <p></p>
          <p><a href="#" class="btn btn-warning mt-3"></a></p>
        </div>
      </div>
      <div class="carousel-item">
        <img src="./public/img/1home.jpg" class="d-block w-100" alt="...">
        <div class="carousel-caption">
          <h5>Teens Mode</h5>
          <p></p>
          <p><a href="#" class="btn btn-warning mt-3">Leer Más</a></p>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
  <!-- shop starts -->
  <section id="portfolio" class="portfolio section-padding">
    <div class="container">
      <br><br><br>
      <div class="row pt-5">
        <div class="col-md-12">
          <div class="section-header text-center pb-5">
            <h2>MI TIENDA ONLINE</h2>
            <br>
            <hr>
            <p></p>
          </div>
        </div>
      </div>
      <div class="container px-4 px-lg-5 mt-5">
        <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">

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

          //  recorro todos los registros y genero una CARD PARA CADA UNA
          while ($reg = mysqli_fetch_array($datos)) { ?>

            <div class="col mb-5">
              <div class="card h-100">
                <!-- Product image-->
                <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen']) ?>" alt="..." />
                <!-- Product details-->
                <div class="card-body p-4">
                  <div class="text-center">
                    <!-- Product name-->
                    <h5 class="fw-bolder"><?php echo ucwords($reg['nombre']) ?></h5>
                    <!-- Product price-->
                    <h2>$<?php echo $reg['precio']; ?></h2>
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

          <?php } ?>

        </div>
      </div>
  </section>

  <!-- All Js -->
  <script src="./public/js/bootstrap.bundle.min.js"></script>
  <script src="./public/js/script.js"></script>
</body>

</html>