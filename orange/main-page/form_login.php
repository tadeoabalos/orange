<?php 
    sleep(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="./estilo_login.css"> 
    <title>Document</title>
</head>
<body>
<div><!-- 
    <div class="contenedor-form">
        <h1>Inicio de sesion</h1>
        <br/>   
        <form action="login.php" method="post">        
                <label>
                    Usuario
                    <br/> 
                    <input class="input-form" type="text" name="user" maxlength="15" required >
                </label><br/>
                <label>
                    Clave
                    <br/> 
                    <input class="input-form" type="password" name="pass" required>
                </label><br/>
                <a href="./form_registro.php">No tienes cuenta? Registrate</a>
                <br/><br/>
                <input class="boton-form" type="submit" value="login">
        </form>
    </div>-->
    <div class="container">
        <div class="login-container">
            <h1>Iniciar sesión</h1>
            <form action="login.php" method="post">
                <label for="username">Nombre de usuario</label>
                <input type="text" id="username" name="user" required>
                
                <label for="password">Contraseña</label>
                <input type="password" id="password" name="pass" required>
                
                <button type="submit">Iniciar sesión</button>
            </form>
            <div class="footer">
                <p>¿No tienes una cuenta? <a href="./form_registro.php">Regístrate</a></p>
            </div>
        </div>
    </div>
</div>
</body>
</html>