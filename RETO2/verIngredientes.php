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
        <div class="verIngredientes">
            <h2>VER INGREDIENTES</h2>
            <?php 
            btn();
            //Establecer Conexion
            include "conexionBD.php";

            if (isset($_REQUEST['verIngredientes'])){
                if (isset($_REQUEST['verIngredientes'])){
                    //Recoger los datos
                    $pizza=$_REQUEST['pizza'];
                    if($pizza==0){
                        echo "<p class='error'>Seleccione una pizza</p>";
                    }
                    else {
                        //Presento formulario
                        echo" <form method='post' action='#'>
                        <fieldset>";
                        echo"<h3>INGREDIENTES</h3>";
                        listar_ciclos($conexion,$pizza);
                        echo" <input type='submit' value='Ver Ingredientes' name='verIngredientes'/>
                        </fieldset>
                        </form>";
                    }
                }
             } 

            //Cerrar la conexion
            mysqli_close($conexion);  
            ?>
        </div>
    </body>
</html>