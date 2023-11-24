 <!DOCTYPE html>
 <html lang="en">
 <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
 </head>
 <body>
    <?php                 
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['mail'];
        $user = $_POST['user'];
        $pw = md5($_POST['pass']);     
        
        include("conexion.php");
        
        $validar = " SELECT * FROM usuarios WHERE mail = '$email' || user = '$user '";
        $validacion = mysqli_query($conexion, $validar);
        $resultado=mysqli_num_rows($validacion);           
        if($resultado > 0) {            
            echo "<script>alert('Usuario ya existente.')</script>";
        }
        else {
            $consulta = mysqli_query($conexion, "INSERT INTO usuarios (nombre, apellido, mail, user, pass)
            VALUES('$nombre','$apellido','$email', '$user', '$pw')");
            session_start();
            $_SESSION['usuario'] = $user;
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['email'] = $email;

            header("Location: index_logueado.php");
        }
    ?>
 </body>

 </html>
