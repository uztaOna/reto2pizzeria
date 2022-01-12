<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<link href="estilos/estilos.css" rel="stylesheet" type="text/css">
</head>
    <body>
    <?php
        ini_set('display_errors','On');
        error_reporting(E_ALL);
        setlocale(LC_ALL,'es_ES.UTF-8','Spanish_Spain.1252');

        include "funciones.php";
    ?>
        <div class="verPizzas">
            <h2>PIZZAS DE LA CARTA</h2>
            <?php 
            btn();
            //Establecer Conexion
            include "conexionBD.php";
            listarPizzas($conexion);
            //Cerrar la conexion
            mysqli_close($conexion);  
            ?>
        </div>
    </body>
</html>