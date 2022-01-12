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
        <div class="inicio">
            <h2>PIZZERÍA EQ2</h2>
            <?php
            btn();
            echo"<h2>INICIO</h2>";
            ?>
        </div>
    </body>
</html>