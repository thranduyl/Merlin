<HTML>
    <HEAD>
        
        ...
    </HEAD>

    <BODY>
<?php
	$conexion = new mysqli('localhost', 'root', '123', "world"); // creo un objeto base de datos en el que le paso el nombre del servidor, el nombre de usuario, el passworld y la base de datos
	
	if($conexion->connect_error){ //llamo al metodo del objeto mysqli conenct error para comprobar que la conexion es buena si hay error me devuelve el mensaje y sale
	echo "coneccion Error ($conexion->connect_error)
		$conexion->connect_error\n";
	exit;
	}
	
	
	$id=$_POST['id'];// almaceno en la variable id el contenido de recoger por post el contenido de id
	$operacion=$_POST['boton'];// almaceno en la variable operacion el contenido de recoger por post el contenido de boton
	
	
	if($operacion=="Actualizar"){// si el contenido de operacion es igual que actualizar hago un update
	$consulta = "UPDATE city SET CountryCode='".$_POST['paises']."', name='".$_POST['nombre']."', District='".$_POST['distrito']."', Population=".$_POST['poblacion']." WHERE ID=".$_POST['id'];
	//declaro consulta y meto el update que quiero hacer recogiendo cada valor por metodo post de los parametros que se me envian de otro archivo y teniendo el cuidado de poner entre comillas
	// los campos de tipo cadena. Tambien hemos hecho el update en funcion de la id
	var_dump($consulta);// imprimimos la consulta para ver que se ha construido correctamente
	
	if($conexion->query($consulta)){ // llamo al metodo query del objeto mysqli  y le paso el contenido de consulta
		echo "Actualizacion Correcta"; // si el update ha devuelto true  imprimimos actualizacion correcta
	}else{//sino
		echo "Actualizacion Erronea";// actualizacion erronea
		}
	}elseif($operacion=="Borrar"){// si el contenido de operacion es igual que borrar hago un delete
	
	$consulta = "DELETE FROM CITY WHERE ID=".$_POST['id']; // creo una variable consulta y borro en funcion de la id que va en funcion del contenido de id que recojo con el metodo post
	var_dump($consulta);// imprimimos la consulta para ver que se ha construido correctamente
	if($conexion->query($consulta)){ // llamo al metodo query del objeto mysqli  y le paso el contenido de consulta
	echo "Borrado Correcto";// si el update ha devuelto true  imprimimos borrado correcto
	$id=0;//al borrar ese registro asignamos el valor id 0 para pasarlo de vuelta al formulario inicial
	}else{// si no
		echo "Borrado Erroneo";// borrado erroneo
		}
	
	}	
	 $conexion->close(); // llamamos al metodo close del objeto mysqli y cerramos conexion no liberamos consulta por que al no haber devuelto resultados no es necesario
	 echo  "<BR>"."<a href="."formulario4php.php?id=".$id.">"."Inicio"."</a><br/>\n";
	//enlazamos con el archivo formulario 3 pasandole id que contiene el valor que hemos recogido de id por metodo post 
?>
    
 
    </BODY>
</HTML>