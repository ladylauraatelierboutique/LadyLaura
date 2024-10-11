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
            <img src="./public/img/LL_logo_2.png" alt="">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="listar.php">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link btn-light text-black" href="shop.php">Cerrar Sesión</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <?php
    // 6) asignamos a diferentes variables los respectivos valores del array $datos.
    $nombre = $datos["nombre"];
    $descripcion = $datos["descripcion"];
    $precio = $datos["precio"];
    $imagen = $datos['imagen'];
    $imagen2 = $datos['imagen2'];
    $imagen3 = $datos['imagen3']; ?>
    <h2>Modificar</h2>
    <p>Ingrese los nuevos datos de la prenda.</p>
    <div class="container mt-5">
        <form action="" method="POST" id="myForm" enctype="multipart/form-data">
            <div class="form-group">
                <label>Nombre de Vestido</label>
                <input type="text" class="form-control" name="nombre" placeholder="Nombre de Vestido" value="<?php echo "$nombre"; ?>" required>
            </div>
            <div class="form-group">
                <label>Descripción</label>
                <textarea type="text" class="form-control" rows="4" name="descripcion" placeholder="Descripcion" value="<?php echo "$descripcion"; ?>" required></textarea>
            </div>
            <div class="form-group">
                <label>Precio</label>
                <input type="text" class="form-control" name="precio" placeholder="Precio" value="<?php echo "$precio"; ?>" required>
            </div>
            <div class="form-group">
                <label>Foto de Portada</label>
                <input type="file" class="form-control" name="imagen" placeholder="Imagen3" required>
            </div>
            <div class="form-group">
                <label>Imagen2</label>
                <input type="file" class="form-control" name="imagen2" placeholder="Imagen3" required>
            </div>
            <div class="form-group">
                <label>Imagen3</label>
                <input type="file" class="form-control" name="imagen3" placeholder="Imagen3" required>
            </div>
            <br>
            <br>
            <div class="form-group">
                <button type="submit" class="btn btn-primary col-lg-4  text-center pb-2" class="form-control" name="guardar_cambios" value="Guardar Cambios">Guardar Cambios</button>
                <button type="submit" class="btn btn-danger col-lg-4 text-center pb-2" class="form-control" id="cancelButton" name="Cancelar" formaction="listar.php">Cancelar</button>
            </div>
        </form>
    </div>
    <?php
    // Si en la variable constante $_POST existe un indice llamado 'guardar_cambios' ocurre el bloque de instrucciones.
    if (array_key_exists('guardar_cambios', $_POST)) {
        // 2') Almacenamos los datos actualizados del envío POST
        // a) generar variables para cada dato a almacenar en la bbdd
        // Si se desea almacenar una imagen en la base de datos usar lo siguiente:
        // addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
        $nombre = $_POST['nombre'];
        $descripcion = $_POST['descripcion'];
        $precio = $_POST['precio'];
        $imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
        $imagen2 = addslashes(file_get_contents($_FILES['imagen2']['tmp_name']));
        $imagen3 = addslashes(file_get_contents($_FILES['imagen3']['tmp_name']));
        // 3') Preparar la orden SQL
        // "UPDATE tabla SET campo1='valor1', campo2='valor2', campo3='valor3', campo3='valor3', campo3='valor3' WHERE campo_clave=valor_clave"
        // a) generar la consulta a realizar
        $consulta = "UPDATE ropa_ladylaura SET nombre='$nombre', descripcion='$descripcion', precio='$precio', imagen='$imagen', imagen2='$imagen2', imagen3='$imagen3' WHERE id=$id";
        // 4') Ejecutar la orden y actualizamos los datos
        // a) ejecutar la consulta
        mysqli_query($conexion, $consulta);
        // a) rederigir a index
        header('location: listar.php');
    } ?>

    <script>
        document.getElementById('cancelButton').addEventListener('click', function() {
            // Deshabilitar la validación de los campos requeridos
            var form = document.getElementById('myForm');
            var elements = form.elements;
            for (var i = 0; i < elements.length; i++) {
                elements[i].removeAttribute('required');
            }

            // Enviar el formulario vacío o realizar cualquier otra acción deseada al cancelar.
            form.submit(); // En este ejemplo, simplemente enviamos el formulario vacío.
        });
    </script>

</body>

</html>