<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de usuario</title>
</head>
<body>
    <?php                         
       $usuario = $_POST['user'];
       $pw = md5($_POST['pass']);
       
       include("conexion.php");
       
       $consulta = mysqli_query($conexion, "SELECT nombre, apellido, mail, user, tipo FROM usuarios WHERE user='$usuario' AND pass='$pw'");
       
       $resultado = mysqli_num_rows($consulta);
       
       if($resultado!=0){
            session_start();
            $_SESSION['sesion'] = session_create_id();
            $_SESSION['usuario'] = $usuario;
            $respuesta=mysqli_fetch_array($consulta);
            $tipoUsuario = $respuesta['tipo'];
            if($tipoUsuario == 2){                                
                header("Location: ./admin/index.php");
            }
            else{
                header("Location: index_logueado.php");                
            }
               
            
       }else{
           echo "No es un usuario registrado";
       }

    ?>
</body>
</html>