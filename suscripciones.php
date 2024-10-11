<?php
// 1) Conexion
// a) realizar la conexion con la bbdd
// b) seleccionar la base de datos a usar
$conexion = mysqli_connect("127.0.0.1", "root", "");

// 2) Almacenamos los datos del envío POST
// a) generar variables para cada dato a almacenar en la bbdd
$nombre = $_POST['nombre'];
$email = $_POST['email'];

// 3) Preparar la orden SQL
// INSERT INTO nombre_tabla (campos_tabla) VALUES (valores_a_ingresar)
// => Ingresa dentro de la siguiente tabla los siguientes valores
// a) generar la consulta a realizar
$consulta = "INSERT INTO suscripciones (id,nombre,email) VALUES ('','$nombre','$email')";
//4) Ejecutar la orden y ingresamos datos
mysqli_select_db($conexion, "tienda_ladylaura");
// a) ejecutar la consulta
mysqli_query($conexion, $consulta);
// 5) Enviar un correo de bienvenida
$to = $email;
$subject = "Bienvenido a nuestra tienda";
$message = "¡Hola $nombre! Gracias por suscribirte a nuestra tienda en línea.Lady Laura Atelier & Boutique.";
$headers = "From: ricmang@gmail.com"; // Cambia esto a tu dirección de correo

// Utiliza la función mail() para enviar el correo
mail($to, $subject, $message, $headers);

// a) rederigir a index
header('location: index.html');
