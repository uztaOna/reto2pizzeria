<!DOCTYPE html>
    <head>
    <meta charset="UTF-8">
    <link href="../estilos/estilos.css" rel="stylesheet" type="text/css">

    </head>
    <body>

        <?php
            //Estas dos líneas hacen que se muestren algunos errores en el servidor
            ini_set('display_errors','On');
            error_reporting(E_ALL);
            
        ?>

        <div class='resultado'>

        <h2>CONEXION BBDD </h2>

        <?php 

        //******************** ESTABLECIMIENTO DE LA CONEXION A LA BASE DE DATOS *************************
            
        //Definimos las constantes necesias para conectarnosal servidor
        define('SERVIDOR',"localhost");// El servidor que utilizaremos, en este caso será el localhost
        define('USUARIO','root');// El usuario que acabamos de crear en la base de datos 
        define('CLAVE','');// La contraseña del usuario que utilizaremos 
        define('BBDD',"pizzeriareto");// El nombre de la base de datos	

        /* Abrimos la conexión en el servidor. Normalmente se envian 3 parametros 
        (los datos del servidor, usuario y contraseña) a la función mysql_connect, 
        si no hay ningún error la conexión será un éxito El @ que se ponde delante de la funcion, 
        es para que no muestre el error al momento de ejecutarse,*/

        $conexion = @mysqli_connect(SERVIDOR,USUARIO,CLAVE);
        
        /* Comprobamos si la conexión no pudo realizarse, de ser así lanza un mensaje 
        en la pantalla con el siguiente texto "No pudo conectarse:" 
        y le agrega el error ocurrido con "mysql_error() y el numero con mysqli_connect_errno()*/ 

        if (!$conexion) { 
            die("<strong class='error'>No pudo conectarse:</strong> " .mysqli_connect_errno()." : ". mysqli_connect_error()); 
        }
        else{ 
            // La siguiente linea no es necesaria, simplemente la pondremos ahora para poder 
            //observar que la conexión ha sido realizada 
            echo '<p>Conectado  satisfactoriamente al servidor</p><br>'; 
        }

        /* Si Queremos nuestros datos en utf8, aunque la BD este en ANSII */
        mysqli_set_charset ( $conexion , 'utf8' );

        /* Seleccionaremos la BD con la que trabajaremos y le pasaremos como 
        referencia la conexión al servidor. Para saber si se conecto o no a la BD podríamos 
        utilizar el IF de la misma forma que la utilizamos al momento de conectar al servidor, 
        pero usaremos otra forma de comprobar eso usando die(). */
        mysqli_select_db($conexion,BBDD) or die("<strong class='error'>".mysqli_error($conexion)."</strong> "); 

        /* La conexion tambien podriamos haberla realizado, los cuatro parametros a la vez asi:
        @$conexion=mysqli_connect(SERVIDOR,USUARIO,CLAVE,BBDD) 
            or die("<p>Error de Conexión ".mysqli_connect_errno().": ".mysqli_connect_error()."</p>")*/
            
            
        //**************************** FIN DEL ESTABLECIMIENTO DE  LA CONEXION ***************************
        ?>

        <hr>

        <?php 

        //************************ SELECCIONAR DATOS Y RECORRERLOS ********************
        echo "<h5>SELECCIONAR DATOS Y RECORRERLOS</h5>";
        
        //Preparar la consulta
        $sql="SELECT * FROM comunidades order by nom_com";

        // Leer registros
        $registros=mysqli_query($conexion,$sql)or
        die("<p>Error: ".mysqli_errno($conexion).": ".mysqli_error($conexion)."</p>");
            
            
        // Mostrar registros en Parrafos:
        echo "<h5>Salida en Parrafos ordenadas Alfabeticamente</h5>";
        while (list($codigo, $nombre) = mysqli_fetch_array($registros)){
            echo "<p>$codigo $nombre</p>";
        }



        // Mostrar registros en una tabla:
        mysqli_data_seek($registros, 0); //Es necesario conectarse al principio
                                        //Si ya lo hemos recorrido

        echo "<h5>Cargados en una tabla</h5>";
        echo  "<table>
                <tr><th>Cod.</th>
                    <th>Comunidad</th></tr>";

        while (list($codigo, $nombre) = mysqli_fetch_array($registros)){
            echo "<tr><td>$codigo</td><td>$nombre</td></tr>";
        }
        echo  "</table>";
        
        // Mostrar registros en un Select:
        mysqli_data_seek($registros, 0);      //Es necesario colocarse al principio
        echo "<h5>Cargados en un select</h5>";
        echo "<select name='comunidad'>
            <option value=0>Selecciona Una Comunidad</option>";
        while(list($codigo, $nombre)=mysqli_fetch_array($registros)){
            echo "<option value=$codigo>$nombre</option>";
        } 
        echo "</select>";		
                
        /* Tambien podriamos dejarlo en una variable y acceder como array asociativo
        while($fila=mysqli_fetch_assoc($registros)){
        echo "<option value=".$fila[cod_com].">".$fila[nom_com]."</option>";
        */
                
        /*o tambien podemos hacerlo con un array numerico (mysqli_fetch_row)
        while($row=mysqli_fetch_row($registros)){ 
        echo "<option value=".$row[0].">".$row[1]."</option>";
        }
        */

        /* Por Ultimo ,Tenemos que liberar los recursos de memoria */
            mysqli_free_result($registros);

        /* Y cerrar la conexion */
            mysqli_close($conexion);

        //**************************** FIN SELECCIONAR DATOS Y RECORRERLOS ************
        ?>
        </div>
    </body>
</html>