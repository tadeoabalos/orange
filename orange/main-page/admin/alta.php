<?php 
include("../conexion.php");

$nombre = $_POST['nombre'];
$autor = $_POST['autor'];
$precio = $_POST['precio'];
$fecha = $_POST['fecha'];

$imagen_nombre = $_FILES['foto']['name'];
$imagen_temp = $_FILES['foto']['tmp_name'];

$carpeta_destino = "fotos/";
$ruta_imagen = $carpeta_destino . $imagen_nombre;

move_uploaded_file($imagen_temp, $ruta_imagen);

$consulta = mysqli_query($conexion, "INSERT INTO libros (nombre, autor, precio, fecha, foto) 
VALUES ('$nombre', '$autor', '$precio', '$fecha', '$ruta_imagen')");

header("Location: index.php");
?>

