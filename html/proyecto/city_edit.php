<HTML>
    <HEAD>
     
      
    </HEAD>
	<title>MySQL and PHP</title> 
<BODY>

<br><br><FORM action="http://localhost/control/html/proyecto/city_save.php" method="get">
<?php 
include("navigation.php");

$conecta_datos = new mysqli('localhost', 'root', '123', "world");

$id=$_GET["id"];




if($conecta_datos->connect_error){
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}


$consulta="SELECT ID, CountryCode, Name, Population, District From City where ID=".$id;



$resultados =$conecta_datos->query($consulta);

while ($registro = $resultados->fetch_assoc()){
	//echo "Id Ciudad <INPUT type=text name='distrito' value='".$registro["ID"]."'><br>";
	//echo "Codigo  Pais <INPUT type=text name='poblacion' value='".$registro["CountryCode"]."'><br>";
	echo "Nombre Ciudad <INPUT type=text name='nombre' value='".$registro["Name"]."'><br>"; //es muy importante el uso de las comillas sobre todo al crear parametros o consultas por que o la consulta sale mal o el formulario manda mal el dato y no coje el dato completo en el caso de que haya espacios
	echo "Poblacion  Ciudad <INPUT type=text name='poblacion' value='".$registro["Population"]."'><br>";
	echo "Distrito Ciudad <INPUT type=text name='distrito' value='".$registro["District"]."'><br>";
	echo "<INPUT type=hidden name='id' value=".$registro["ID"]."><br>";
	echo "<INPUT type=hidden name='codigopais' value='".$registro["CountryCode"]."'><br>";
	//$codigo=$row["CountryCode"];
	}
 

$resultados->close();


$conecta_datos->close();
?>
<br><input type="submit" name=boton value="Actualizar">
<input type="submit"  name=boton value="Borrar">
<input type="submit"  name=boton value="Insertar"> 
 </FORM>
 </BODY>
</HTML>