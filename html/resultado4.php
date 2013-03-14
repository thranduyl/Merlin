<HTML>
    <HEAD>
        
        ...
    </HEAD>

    <BODY>
<?php
	$conexion = new mysqli('localhost', 'root', '123', "world");
	
	if($conexion->connect_error){
	echo "coneccion Error ($conexion->connect_error)
		$conexion->connect_error\n";
	exit;
	}
	
	
	$id=$_POST['id'];
	$operacion=$_POST['boton'];
	var_dump($_POST['paises']);
	echo "<br>";
	
	if($operacion=="Actualizar"){
	$consulta = "UPDATE city SET CountryCode='".$_POST['paises']."', name='".$_POST['nombre']."', District='".$_POST['distrito']."', Population=".$_POST['poblacion']." WHERE ID=".$_POST['id'];
	
	// creo que esta todo bien , pero el update no admite espacios.
	var_dump($consulta);
	
	if($conexion->query($consulta)){
		echo "Actualizacion Correcta";
	}else{
		echo "Actualizacion Erronea";
	}
	
	}elseif($operacion=="Borrar"){
	
	$consulta = "DELETE FROM CITY WHERE ID=".$_POST['id'];
	var_dump($consulta);
	
	if($conexion->query($consulta)){
		echo "Borrado Correcto";
	}else{
		echo "Borrado Erroneo";
		}
	$id=0;
	}elseif($operacion=="Insertar"){
	
	$consulta = "INSERT INTO CITY (CountryCode, Name, District, Population) values ('".$_POST['paises']."', '".$_POST['nombre']."', '".$_POST['distrito']."', '".$_POST['poblacion']."')";
	var_dump($consulta);
	
	if($conexion->query($consulta)){//ejecuto la consulta llamando al metodo query de conexion pasandole consulta
		$id=$conexion->insert_id;//almaceno el ultimo id insertado despues de insertarlo 
		echo "Insercion Correcta";
	}else{
		echo "Insercion Erronea";
		}
	
	
	}	
	
	$conexion->close();
	 echo  "<BR>"."<a href="."formulario5php.php?id=".$id.">"."Inicio"."</a><br/>\n";
			
?>
    
 
    </BODY>
</HTML>