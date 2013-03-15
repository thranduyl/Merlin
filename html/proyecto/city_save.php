<HTML>
    <HEAD>
     
      
    </HEAD>
	<title>MySQL and PHP</title> 
<BODY>

<br><br><FORM action="http://localhost/control/html/proyecto/city_save.php" method="post">
<?php 
include("navigation.php");

$conecta_datos = new mysqli('localhost', 'root', '123', "world");

$id=$_GET["id"];




if($conecta_datos->connect_error){
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}



	$operacion=$_GET['boton'];
	
	echo "<br>";
	
	if($operacion=="Actualizar"){
	$consulta = "REPLACE INTO city (ID, CountryCode, Name, District, Population ) VALUES (".$_GET['id'].",'".$_GET['codigopais']."','".$_GET['nombre']."','".$_GET['distrito']."',".$_GET['poblacion'].")";
	
	
	var_dump($consulta);
	
	if($conecta_datos->query($consulta)){
		echo "Actualizacion Correcta";
	}else{
		echo "Actualizacion Erronea";
	}
	
	}/*elseif($operacion=="Borrar"){
	
	$consulta = "DELETE FROM CITY WHERE ID=".$_GET['id'];
	var_dump($consulta);
	
	if($conecta_datos->query($consulta)){
		echo "Borrado Correcto";
	}else{
		echo "Borrado Erroneo";
		}
	$id=0;
	}elseif($operacion=="Insertar"){
	
	$consulta = "INSERT INTO CITY (CountryCode, Name, District, Population) values ('".$_GET['paises']."', '".$_GET['nombre']."', '".$_GET['distrito']."', '".$_GET['poblacion']."')";
	var_dump($consulta);
	
	if($conecta_datos->query($consulta)){//ejecuto la consulta llamando al metodo query de conexion pasandole consulta
		$id=$conexion->insert_id;//almaceno el ultimo id insertado despues de insertarlo 
		echo "Insercion Correcta";
	}else{
		echo "Insercion Erronea";
		}
	
	
	}*/	
	

	
	$conecta_datos->close();
	
?>

 </FORM>
 </BODY>
</HTML>