<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1", "root", "");

// 2) Almacenamos los datos del envío POST
// a) generar variables para cada dato a almacenar en la bbdd
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio = $_POST['precio'];
// Si se desea almacenar una imagen en la base de datos usar lo siguiente: addslashes(file_get_contents($_FILES['ID NOMBRE DE LA IMAGEN EN EL FORMULARIO']['tmp_name']))
if (isset($_FILES['imagen'])) {
    $imagen = $_FILES['imagen'];
    // Procesa $imagen
}

if (isset($_FILES['imagen2'])) {
    $imagen2 = $_FILES['imagen2'];
    // Procesa $imagen2
}

if (isset($_FILES['imagen3'])) {
    $imagen3 = $_FILES['imagen3'];
    // Procesa $imagen3
}

// 3) Preparar la orden SQL
// INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_a_ingresar)
// => Ingresa dentro de la siguiente tabla los siguientes valores
// a) generar la consulta a realizar
$consulta = "INSERT INTO ropa_ladylaura (id,nombre,descripcion,precio,imagen,imagen2,imagen3)
VALUES ('','$nombre','$descripcion','$precio','$imagen','$imagen','$imagen')";
// 4) Ejecutar la orden y ingresamos datos
mysqli_select_db($conexion, "tienda_ladylaura");
// a) ejecutar la consulta
mysqli_query($conexion, $consulta);
// a) rederigir a index
header('location: listar.php');
