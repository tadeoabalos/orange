<?php
include("../conexion.php");

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $nombre = $_POST["nombre"];
    $email = $_POST["email"];
    $mensaje = $_POST["mensaje"];

    $destinatario = "tadeoabalos@outlook.com";
    $asunto = "Ha recibido un nuevo correo electronico";
    $correo = "Nombre: " . $nombre . "Correo electronico: " . $email . "Mensaje: " . $mensaje ; 

    $header="From: ".$nombre."<".$email.">";

    $enviado = mail($destinatario, $asunto, $correo, $header);

    if($enviado == true){
        echo "Su correo ha sido enviado.";
    }else{
        echo "Hubo un error en el envio del mail.";
    }
    
    $query = "INSERT INTO mensajes (nombre, correo, mensaje) VALUES ('$nombre', '$email', '$correo')" ; 
    $consulta = (mysqli_query($conexion, $query) or die(mysqli_error($conexion)));
    mysqli_close($conexion);
}
?>