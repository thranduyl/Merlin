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
	
	$consulta = "UPDATE city SET CountryCode='".$_POST['CountryCode']."', name='".$_POST['nombre']."', District='".$_POST['distrito']."', Population=".$_POST['poblacion']." WHERE ID=".$_POST['id'];


	var_dump($consulta);
	/*foreach ($_POST as $key=> $value){
		if(count($_POST[$key])>1){
			for ($i=0;$i<count($_POST[$key]);$i++){
				echo $_POST[$key][$i]."<br>";
			}
		}else{
			echo "$key=".$value."<br/>\n";
		}
	}*/
	if($conexion->query($consulta)){
		echo "Actualizacion Correcta";
	}else{
		echo "Actualizacion Erronea";
	}	
	 $conexion->close();
	 echo  "<BR>"."<a href="."formulario3php.php?id=".$id.">"."Inicio"."</a><br/>\n";
	//echo "<A HREF=""http://localhost/control/html/formulario3php.php?id=".$id.">Vuelta al formulario</A>"
		
?>
    
 
    </BODY>
</HTML>