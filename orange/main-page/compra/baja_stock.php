<?php 
    include("../conexion.php");

    $id = $_POST['id'];

    $consulta_stock = "SELECT stock FROM libros WHERE id = ?";
    
    $stmt_stock = mysqli_prepare($conexion, $consulta_stock);
    
    mysqli_stmt_bind_param($stmt_stock, "i", $id);
    
    mysqli_stmt_execute($stmt_stock);
   
    mysqli_stmt_bind_result($stmt_stock, $stock);

    mysqli_stmt_fetch($stmt_stock);
  
    mysqli_stmt_close($stmt_stock);
    
    if($stock > 0 ){
        $consulta = "UPDATE libros SET stock = stock - 1 WHERE id = $id;";
        mysqli_query($conexion, $consulta);
    }
    else {
        echo"error";
    }
   
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="estilo2.css">
    <title>Gracias por tu compra</title>
</head>
<body>

<div class="contenedor">
    <div class="mensaje">
        <h1>¡Gracias por tu compra!</h1>
        <p>Esperamos que disfrutes de tu producto.</p>
        <p>Recibirás un correo electrónico con los detalles de tu compra.</p>
        <a href="../index_logueado.php">Volver a Orange</a>
    </div>
</div>
</body>
</html>
