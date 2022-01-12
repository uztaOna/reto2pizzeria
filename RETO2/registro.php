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
        <div class="registro">
            <h2>REGISTRO DE NUEVO CLIENTE</h2>
            <?php
            btn();
            ?>
            <form action="registro.php" method="POST">
                <h2><em>Formulario de Registro</em></h2>

                <label for="dni">DNI <span></span></label>
                <input type="text" name="dni" class="form-input" required/><br><br>
      
                <label for="nombre">Nombre <span></span></label>
                <input type="text" name="nombre" class="form-input" required/><br><br>

                <label for="direccion">Dirección <span></span></label>
                <input type="text" name="direccion" class="form-input" required/><br><br>

                <label for="poblacion">Población <span></span></label>
                <input type="text" name="poblacion" class="form-input" required/><br><br> 

                <label for="tlf">Teléfono <span></span></label>
                <input type="text" name="tlf" class="form-input" required/><br><br> 
                
                <label for="email">Email <span></span></label>
                <input type="email" name="email" class="form-input"/><br><br>
     
                <center> <input class="form-btn" name="submit" type="submit" value="registrarse" /></center>
            </form>
        </div>
    </body>
</html>