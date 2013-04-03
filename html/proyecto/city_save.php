<HTML>
    <HEAD>
     
      
    </HEAD>
	<title>MySQL and PHP</title> 
<BODY>

<?php 
include("navigation.php");// incluyo un archivo vecino en la misma carpeta por lo que aparecera el contenido de ese archivo al ejecutar este
require("security.php"); //requiero el codigo de este archivo si el codigo requerido se ejecuta correctamente seguiremos con nuestro codigo, si no no.
$conecta_datos = new mysqli('localhost', 'root', '123', "world");// creo el objeto base de datos de tipo mysqli le indico el servidor, usuario, contraseña y base de datos

$id=$_GET["id"];




if($conecta_datos->connect_error){//llamo a la funcion connect error del objeto mysqli y si devuelve true conexion erronea y salgo
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}



	$operacion=$_GET['boton'];//en operacion almaceno el valor de boton
	
	echo "<br>";//imprimo salto de pagina
	
	if($operacion=="Actualizar"){//si el valor de operacion es Actualizar
	
	//declaro consulta y almaceno un replace que busca el primer valor que le pasamos en la tabla . Si existe lo reemplaza y si no lo crea.
	$consulta = "REPLACE INTO city (ID, CountryCode, Name, District, Population ) VALUES (".$_GET['id'].",'".$_GET['codigopais']."','".$_GET['nombre']."','".$_GET['distrito']."',".$_GET['poblacion'].")";
	//creamos el replace en city indicando los nombres de los campos y los valores son los parametros que recogemos con el metodo get
	//tenemos que tener cuidado cuando realizamos la consulta ya que los parametros que sean cadenas tienen que ir entre comillas y deben tenerlas en la consulta
	
	var_dump($consulta);// imprimimos consulta para comprobr que se ha estructurado correctamente
	
	if($conecta_datos->query($consulta)){//llamamaos al metodo query del objeto mysqli pasandole la consulta y si nos devuelve true 
		echo "Actualizacion Correcta";// actualizacion correcta
	}else{//si no actualizacion erronea
		echo "Actualizacion Erronea";
	}
	
	}
	

	
	$conecta_datos->close();//como no hay devolucion de datos no cerramos la consulta solo la conexion a bas de datos con el metodo close
	
?>

 </BODY>
</HTML>