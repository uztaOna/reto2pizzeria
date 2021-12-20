<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF8">
    </head>
    <body>
        <?php
            //Estas dos lineas hacen que se muestren algunos errores
            ini_set('display_errors','on');
            error_reporting(E_ALL);
            include "datos.php";
        ?>

        <h1>PAISES</h1>

        <!-- Se crea el select de Continentes -->
        <form action="paises1.php">
            <label>Continentes</label>

            <select name="continentes">
            <option value="0">- Selecciona continente-</option>


            <?php
            for($i=0;$i<count($continentes);$i++) {
                echo "<option value=\"".($i+1)."\">".$continentes[$i]."</option>\n";
            } 
            ?>


            <!-- Se cierra el select de Continentes -->
            </select><br><br>

            <!-- Boton para visualizar paises del continente seleccionado -->
            <input type="submit" value="Ver país"/>
        </form>
    </body>
</html>