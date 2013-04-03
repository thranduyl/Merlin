<HTML>
    <HEAD>
        Importante en todos estos programas cuando nos de error es posible que sea por que  no le hemos dado una id por url para darsela escribiremos al final de la url ?id=numero de url
       
    </HEAD>
<BODY>
<br><br><FORM action="http://localhost/control/html/resultado2.php" method="post"> <!--Declaro un formulario que enlaza con resultado 2 y envio los datos por el metodo post-->
<?php 
$conexion = new mysqli('localhost', 'root', '123', "world");// creo un objeto base de datos en el que le paso el nombre del servidor, el nombre de usuario, el passworld y la base de datos

if($conexion->connect_error){//llamo al metodo del objeto mysqli conenct error para comprobar que la conexion es buena si hay error me devuelve el mensaje y sale
echo "coneccion Error ($conexion->connect_error)
		$conexion->connect_error\n";
	exit;
}



$id=$_GET['id'];// almaceno en la variable id el contenido de recoger por post el contenido de id
if($id==0){//si id es igual a 0
$consulta = "SELECT ID, CountryCode, Name , District, Population From City limit 1";// creo variable consulta y meto una consulta limitandola a 1 
}else{//sino
$consulta = "SELECT ID, CountryCode, Name , District, Population From City where ID=".$id;// creo la variable consulta y meto una consulta en funcion de la id que ha sido devuelta
}
$consulta2 = "SELECT  * From Country"; // creo la variable consulta2 y le meto un select pero esta vez de otra tabla 




$resultados =$conexion->query($consulta);// creo una variable resultados y le meto el contenido que devuelve el metodo query del objeto mysqli al pasarle consulta

while ($row = $resultados->fetch_assoc()){//llamo al metodo fetch_asoc del objeto mysqli que devuelve registros. Mientras haya un registro lo asigno a la variable row
//mientras que queden filas en query results asignamos a $row como si es fila o lo que sea
//fetch_assoc es un metodo del la instancia linkidi del objeto mysql que devuelve una fila mientras haya
	//es muy importante el uso de las comillas sobre todo al crear parametros o consultas por que o la consulta sale mal o el formulario manda mal el dato y no coje el dato completo en el caso de que haya espacios ademas los nombres del elemento de formulario deben ir entre comillas
	echo "Nombre Ciudad<INPUT type=text name='nombre' value='".$row["Name"]."'><br>";// creo un campo imput tipo texto de nombre nombre con el valor que recojo del campo name que se encuentra en la variable row en ese momento como parte del registro que devuelve la consulta este campo es editable
	echo "Distrito Ciudad<INPUT type=text name='distrito' value='".$row["District"]."'><br>"; // creo un campo imput  tipo texto de nombre distrito con el valor que recojo del campo district que se encuentra en la variable row en ese momento como parte del registro que devuelve la consulta este campo es editable
	echo "Poblacion  Ciudad<INPUT type=text name='poblacion' value='".$row["Population"]."'><br>"; // creo un campo imput tipo texto de nombre poblacion con el valor que recojo del campo population que se encuentra en la variable row en ese momento como parte del registro que devuelve la consulta este campo es editable
	echo "<INPUT type=hidden name='id' value=".$row["ID"]."><br>";// creo un campo imput tipo hidden oculto de nombre id con el valor que recojo del campo ID que se encuentra en la variable row en ese momento como parte del registro que devuelve la consulta este campo no es editable puesto que esta oculto
	$codigo=$row["CountryCode"];// creo la variable codigo y asigno cada vez el contenido de CountryCode que es un campo que esta en en la variable row como el resto
	

	
 

}
echo "Pais "."<SELECT name='paises'[]>"; // imprimo el inicio de un select y le llamo paises[] de forma que al ponerle corchetes se trata como un vector para poder pasar los datos correctamente ya que tiene multiples opciones

$resultados2 =$conexion->query($consulta2);// creo una variable resultados2 y le meto el contenido que devuelve el metodo query del objeto mysqli al pasarle consulta2

while ($row2 = $resultados2->fetch_assoc()){//llamo al metodo fetch_asoc del objeto mysqli que devuelve registros. Mientras haya un registro lo asigno a la variable row2
//mientras que queden filas en query results asignamos a $row como si es fila o lo que sea
//fetch_assoc es un metodo del la instancia linkidi del objeto mysql que devuelve una fila mientras haya
	//es muy importante el uso de las comillas sobre todo al crear parametros o consultas por que o la consulta sale mal o el formulario manda mal el dato y no coje el dato completo en el caso de que haya espacios ademas los nombres del elemento de formulario deben ir entre comillas
	if($row2["Code"]==$codigo){// si el contenido de Code que es un campo de la consulta que contiene Row2 es igual a codigo donde hemos almacenado el Contry code en la anterior consulta
	echo "<OPTION VALUE=".$row2["Code"]." selected>".$row2["Name"]."</option>";//imprimimos parte del select donde el valor del select sera el campo code y ademas  en option marcamos selected por que es la opcion seleccionada y la que se enviara a otros archivos en caso de envios
		// el nombre que aparecera en la opcion sera el Name relacionado en ese mismo registro y los dos se alojan como campos en row2	
	}else{//sino
	echo "<OPTION VALUE=".$row2["Code"].">".$row2["Name"]."</option>";// monto otro select igual, pero no marco el seleccionado, puesto que no coinciden
	}
	
	
	
}
echo "</SELECT>"."<br>" ;// imprimo el final del del select





$conexion->close();// llamo al metodo close y cierro la conexion de base de datos
$resultados->close();// igual pero liberando la primera consulta
$resultados2->close();//igual pero liberando la segunda consulta
?>
<br><input type="submit" value="Enviar"><!--declaro un boton tipo submit para enviar datos y le doy el valor Enviar-->
  </FORM><!--Acabo el formulario-->
 </BODY>
</HTML>