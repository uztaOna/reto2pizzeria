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
        <div class="login">
            <h2>INICIO DE SESIÓN</h2>
            <?php
            btn();
            ?>
            <form method="post" action="" name="signup-form">
                <div class="form-element">
                    <label>DNI</label>
                    <input type="text" name="dni" pattern="[a-zA-Z0-9]+" required />
                </div>
                <div class="form-element">
                    <label>Contraseña</label>
                    <input type="password" name="password" required />
                </div>
                <button type="submit" name="login" value="registro">Iniciar sesión</button>
            </form>
        </div>
    </body>
</html>