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
                        <a class="nav-link btn-danger" href="./shop.html">Cerrar Sesión</a>
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
                        <hr>
                        <button class="navbar-toggler" type="submit"><a class="nav-link btn-danger" class="nav-item" href="index.html">Inicio</a></button>
                        <button class="navbar-toggler" type="submit"><a class="nav-link btn-danger" href="listar.php">Listar ropa</a></button>
                        <button class="navbar-toggler" type="submit"><a class="nav-link btn-danger" href="agregar.html">Agregar ropa</a></button>
                        <br>
                        <br>
                        <h2>Lista de ropa</h2>
                        <p>La siguiente lista muestra los datos de la ropa actualmente en stock.</p>
                    </div>
                </div>
            </div>
            <div class="row">

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

                // 4) el while recorre todos los registros y genera una CARD PARA CADA UNA
                while ($reg = mysqli_fetch_array($datos)) { ?>
                    <div class="card col-sm-12 col-md-6 col-lg-3">
                        <img class="card-img-top" src="data:image/jpg;base64, <?php echo base64_encode($reg['imagen']) ?>" alt="" width="100px" height="100px" )>
                        <a href="ver.php?id=<?php echo $reg['id']; ?>" class="card-body">
                            <h3 class="card-title" style="width: 100%; font-size:25px;"><?php echo ucwords($reg['marca']) ?></h3>
                            <span>$ <?php echo $reg['precio']; ?></span>
                        </a>
                    </div>

                <?php } ?>

            </div>
    </section>

    <!-- All Js -->
    <script src="./public/js/bootstrap.bundle.min.js"></script>
    <script src="./public/js/script.js"></script>
</body>

</html>