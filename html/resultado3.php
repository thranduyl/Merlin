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
	
	if($operacion=="Enviar"){
	$consulta = "UPDATE city SET CountryCode='".$_POST['CountryCode']."', name='".$_POST['nombre']."', District='".$_POST['distrito']."', Population=".$_POST['poblacion']." WHERE ID=".$_POST['id'];
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
	
	}	
	 $conexion->close();
	 echo  "<BR>"."<a href="."formulario4php.php?id=".$id.">"."Inicio"."</a><br/>\n";
			
?>
    
 
    </BODY>
</HTML>