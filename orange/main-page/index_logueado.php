<?php
    sleep(1);
    session_start();
    if(!isset($_SESSION["usuario"]))
    {
        header('Location:index.php');
        exit();
    }
    /*echo "<h1>BIENVENIDO ".$_SESSION['usuario']."</h1>";
    echo "<a href='cerrarsesion.php'>Cerrar Sesion</a>";*/
    ?>

    <!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="./estilo.css"> 
        <title>Orange</title>
    </head>
    <body>
        <nav id="nav-bar">
            <h1 style="color: orange">Orange</h1>
            <div>
                <form action="" method="get">
                    <input type="text" placeholder="¿Que estas buscando?"  name="buscar" id="busqueda">
                    <input type="submit" name="enviar" value="Buscar" style="background-color: white">  
                </form>                        
            </div>
            <div class="botonera">
                <span style="color: orange; padding-right: 10px; font-size: 15px">¡Bienvenido <?php echo $_SESSION['usuario']?>!</span>                
                <a style="text-decoration: none; color: orange; margin-right: 5px" href="cerrarsesion.php">Cerrar Sesión</a>                
                <a style="text-decoration: none; color: orange; margin-right: 15px" href="">Premium</a>
            </div>
        </nav>
        <?php 
            $inc = include("conexion.php");
                    if($inc){
                            if(isset($_GET['enviar'])){
                                $busqueda = $_GET['buscar'];
                                $consulta = "SELECT * FROM libros WHERE nombre LIKE '%$busqueda%'";  
                            }
                            else{
                                $consulta = "SELECT * FROM libros";
                            }
                            
                        
                            $resultado = mysqli_query($conexion, $consulta);
                            ?>
                            <div id="content-container"> 
                            <div id="libros">
                            <?php
                            if($resultado){
                                while($row = $resultado->fetch_array()){
                                    $id = $row['id'];
                                    $nombre = $row['nombre'];
                                    $autor = $row['autor'];
                                    $year = $row['fecha'];
                                    $imagen = $row['foto'];
                                    $precio = $row['precio'];
                                    $stock = $row['stock'];
                                    ?>
                                    <link rel="stylesheet" type="text/css" href="estilo.css">
                                    <div id="libro">
                                        <?php echo "<img src='$imagen' height='300' width='200'/>" ?>
                                        <div class="foot_book">
                                        <span style="color: orange;"><?php echo $nombre ?></span>
                                        <br/>
                                        <span><?php echo $autor ?></span>
                                        <br/>
                                        <span >$<?php echo  $precio ?></span>
                                        <br/>
                                        <!-- OPERACION STOCK -->
                                        <?php 
                                            if($stock > 0){
                                                ?>
                                                <form action="./compra/compra.php" method="get">
                                                <input type="hidden" name="libro_id" value="<?php echo $id; ?>">
                                                <input type="submit" value="COMPRAR">
                                                </form>                                                
                                                <?php
                                            }
                                            else {
                                                ?>
                                                <input style="background-color: red; cursor: not-allowed;" type="submit" value="SIN STOCK">
                                                <?php
                                            }
                                        ?>
                                        <!-- OPERACION STOCK -->
                                        </div>                    
                                    </div>
                                    <?php                        
                                }
                            }
                    }
                    
            ?>
        </div>
        </div>
    </body>
    <footer>
        <h3>Orange</h3>
        <a href="./contacto/index.php">Formulario de contacto  </a>
        <a href="#"> Acerca de nosotros </a>
        <div id="redes">
            <span>Twitter</span>
            <span>Facebook</span>
            <span>Instagram</span>
        </div>
    </footer>
    </html>