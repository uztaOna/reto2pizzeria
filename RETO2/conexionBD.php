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
}else{ 
    // La siguiente linea no es necesaria, simplemente la pondremos ahora para poder 
	//observar que la conexión ha sido realizada 
    //echo '<p>Conectado  satisfactoriamente al servidor</p><br>'; 
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