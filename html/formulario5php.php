<HTML>
    <HEAD>
        
       
    </HEAD>
<BODY>
<br><br><FORM action="http://localhost/control/html/resultado4.php" method="post">
<?php 
$conexion = new mysqli('localhost', 'root', '123', "world");
if($conexion->connect_error){
echo "coneccion Error ($conexion->connect_error)
		$conexion->connect_error\n";
	exit;
}



$id=$_GET['id'];

if($id==0){
$consulta = "SELECT ID, CountryCode, Name , District, Population From City limit 1";
}else{
$consulta = "SELECT ID, CountryCode, Name , District, Population From City where ID=".$id;
}
$consulta2 = "SELECT  * From Country"; 




$resultados =$conexion->query($consulta);


while ($row = $resultados->fetch_assoc()){//mientras que queden filas en query results asignamos a $row como si es fila o lo que sea
//fetch_assoc es un metodo del la instancia linkidi del objeto mysql que devuelve una fila mientras haya
	//echo  $row["ID"]." ".$row["CountryCode"].$row["District"].$row["Population"];
	echo "Nombre Ciudad <INPUT type=text name='nombre' value='".$row["Name"]."'><br>"; //es muy importante el uso de las comillas sobre todo al crear parametros o consultas por que o la consulta sale mal o el formulario manda mal el dato y no coje el dato completo en el caso de que haya espacios
	echo "Distrito Ciudad <INPUT type=text name='distrito' value='".$row["District"]."'><br>";
	echo "Poblacion  Ciudad <INPUT type=text name='poblacion' value='".$row["Population"]."'><br>";
	echo "<INPUT type=hidden name='id' value=".$row["ID"]."><br>";
	//echo "<INPUT type=hidden name=CountryCode value=".$row["CountryCode"]."><br>";
	$codigo=$row["CountryCode"];
	


}

$resultados2 =$conexion->query($consulta2);
echo "Pais "."<SELECT name='paises'[]>";
while ($row2 = $resultados2->fetch_assoc()){//mientras que queden filas en query results asignamos a $row como si es fila o lo que sea
//fetch_assoc es un metodo del la instancia linkidi del objeto mysql que devuelve una fila mientras haya
	
	if($row2["Code"]==$codigo){
	echo "<OPTION name='pais' VALUE='".$row2["Code"]."' selected>".$row2["Name"]."</option>";
	
	}else{
	echo "<OPTION name='pais' VALUE='".$row2["Code"]."'>".$row2["Name"]."</option>";
	
	}
	

	
}
echo "</SELECT>"."<br>" ;
	





$conexion->close();
$resultados->close();
$resultados2->close();

?>
<br><input type="submit" name=boton value="Actualizar">
<input type="submit"  name=boton value="Borrar">
<input type="submit"  name=boton value="Insertar"> 
 </FORM>
 </BODY>
</HTML>