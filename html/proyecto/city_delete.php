<HTML>
    <HEAD>
     
      
    </HEAD>
	<title>Deleting city</title> 
<BODY>

<br><br><FORM action="http://localhost/control/html/proyecto/city_save.php" method="post"> <!--declaro un formulario que enlaza con city_save y el metodo para enviar los datos seran post-->
<?php 
include("navigation.php");// incluyo un archivo vecino en la misma carpeta por lo que aparecera el contenido de ese archivo al ejecutar este
require("security.php"); //requiero el codigo de este archivo si el codigo requerido se ejecuta correctamente seguiremos con nuestro codigo, si no no.
$conecta_datos = new mysqli('localhost', 'root', '123', "world");// creo el objeto base de datos de tipo mysqli le indico el servidor, usuario, contraseña y base de datos

if($conecta_datos->connect_error){//llamo a la funcion connect error del objeto mysqli y si devuelve true conexion erronea y salgo
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}
$id=$_GET['ID'];
$consulta = "DELETE FROM CITY WHERE ID=".$_GET['ID'];//declaro la variable consulta y alli almaceno un delete que ira en funcion de la id que reciba de otro archivo
// y en vez de meterla en otra variable la recojo directamente con el metodo get
	var_dump($consulta);
	
	if($conecta_datos->query($consulta)){ //llamo al metodo query del objeto mysqli pasandole la consulta y almaceno lo que devuelve en la variable resultados
		echo "Borrado Correcto"; //si devuelve un true ademas de su resultado el borrado ha sido correcto
	$id=0;//id pasa a ser 0 si se borra
	}else{// si no
		echo "Borrado Erroneo";//borrado erroneo
	}
	
	
	
	$conecta_datos->close();// cerramos la base de datos llamando al metodo close y en este caso no cerramos la consulta por que no hemos visualizado ningun resultado, ya que los delete no devuelven resultados
	echo "<br><a href='cities.php'>Paises</a></p>";//enlace a ciudades
	//echo "<br><a href='cities.php?=id=".$id.">Ciudades</a></p>";//ponemos un enlace al archivo ciudades pasandole la id 0 si se ha borrado o la id no borrada
	
?>

 </FORM><!--se cierra el formulario-->
 </BODY>
</HTML>