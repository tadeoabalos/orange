<?php 
    sleep(1);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">    
    <link rel="stylesheet" type="text/css" href="./estilo.css" media="all" >
    <title>Orange</title>
</head>
<body>
        <nav id="nav-bar">
            <h1 style="color: orange;">Orange</h1>
            <div>
                <form action="" method="get">
                    <input type="text" placeholder="¿Qué estás buscando?"  name="buscar" id="busqueda">
                    <input type="submit" name="enviar" value="Buscar">  
                </form>                        
            </div>
            <div class="botonera">
                <a href="form_login.php">Acceder</a>
                <a href="form_registro.php">Crear Cuenta</a>
                <a href="#">Premium</a>
            </div>
        </nav>
        <div id="content-container"> 
            <?php         
                require("mostrar.php");
            ?>
        </div>
</body>
</html>
