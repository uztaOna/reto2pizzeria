<?php
    //Nombres de los archivos de Imagenes de Las pizzas
    $imgPizza=array(
    'Cuatro estaciones.jpg',
    'Cuatro Quesos.jpg',
    'Hawaiana.jpg',
    'Margarita.jpg',
    'Mediterránea.jpg',
    'Ranchera.jpg');

    //Botones
    function btn(){
        echo "<div id='menu'>
            <ul>
                <li><a class='enlaceboton' href='indexAA.php'>Inicio</a></li>
                <li><a class='enlaceboton' href='verPizzas.php'>Ver pizzas</a></li>
                <li><a class='enlaceboton' href='verIngredientes.php'>Ver ingredientes</a></li>
                <li><a class='enlaceboton' href='login.php'>Iniciar sesión</a></li>
                <li><a class='enlaceboton' href='registro.php'>Registrarse</a></li>
                <li><a class='enlaceboton' href='hacerPedido.php'>Hacer pedido</a></li>
            </ul>
        </div>";
                
    }

    //Listar pizzas
    function listarPizzas($conexion){
        GLOBAL $imgPizza;

	    //Preparar la consulta
        $sql="SELECT nom_pizza,precio FROM pizza ORDER BY nom_pizza";

        // Leer registros
        $registros=mysqli_query($conexion,$sql)or die("<p>Error: ".mysqli_errno($conexion).": ".mysqli_error($conexion)."</p>");
	
        // Mostrar registros en Tabla:
        echo  "<table>
		    <th>Imagen</th>
		    <th>Nombre pizza</th>
            <th>Precio</th>
		</tr>";

        $cont=0;
        while ($datos= mysqli_fetch_assoc($registros)){
            //$ind=$datos['nom_pizza'];
            $cont=$cont+1;
            echo "<tr>
				<td><img class='icono' src='imagenes/".$imgPizza[$cont-1]."'></td>
				<td>$datos[nom_pizza]</td>
                <td>$datos[precio]</td>
		   </tr>";
    }
    echo  "</table>";
    //liberar memoria
    mysqli_free_result($registros);	
    }

    //Cargar pizzas en select
    function cargarPizzasSelect(){
        $sql="SELECT nom_pizza,precio FROM pizza ORDER BY nom_pizza";
        $registros=mysqli_query($conexion,$sql)or die("<p>Error: ".mysqli_errno($conexion).": ".mysqli_error($conexion)."</p>");

        echo "<select name='pizzas'>
                <option value=0>Seleccione una pizza</option>";
            while($datos=mysqli_fetch_array($registros)){
                echo "<option value=$datos[nom_pizza]></option>";
            }
        echo "</select><br>";
        mysqli_free_result($registros);
    }

    //LISTAR INGREDIENTES
    function listarIngredientes($conexion,$pizza){
        $sql="SELECT * FROM contiene WHERE nom_pizza=$pizza";
        // Ejecutar Consulta
        $registros=mysqli_query($conexion,$sql)or die("<p>Error: ".mysqli_errno($conexion).": ".mysqli_error($conexion)."</p>");
        
        // Mostrar registros echo "
        $tamanio=mysqli_num_rows($registros);
        echo "<center><select name='ingredientes' size=$tamanio required>";
        while($datos=mysqli_fetch_array($registros)){
            echo "<option value=$datos[nom_pizza]>$datos[nom_ingrediente] ----- ".$datos['cantidad']."</option>";
        } 
        echo "</select></center><br>";
        //liberar memoria
        mysqli_free_result($registros);	  
    }
?>