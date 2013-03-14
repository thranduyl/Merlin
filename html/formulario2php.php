<HTML>
    <HEAD>
        
       
    </HEAD>

<?php 
$conexion = new mysqli('localhost', 'root', '123', "world");
if($conexion->connect_error){
echo "coneccion Error ($conexion->connect_error)
		$conexion->connect_error\n";
	exit;
}



$id=$_GET['id'];
$consulta = "SELECT ID, CountryCode, Name , District, Population From City where ID=".$id;
$consulta2 = "SELECT  * From Country"; // where ID=".$id;




$resultados =$conexion->query($consulta);
while ($row = $resultados->fetch_assoc()){//mientras que queden filas en query results asignamos a $row como si es fila o lo que sea
//fetch_assoc es un metodo del la instancia linkidi del objeto mysql que devuelve una fila mientras haya
	//echo  $row["ID"]." ".$row["CountryCode"].$row["District"].$row["Population"];
	echo "Nombre Ciudad<INPUT type=text name=nombre value='".$row["Name"]."'><br>";
	echo "Distrito Ciudad<INPUT type=text name=distrito value='".$row["District"]."'><br>";
	echo "Poblacion  Ciudad<INPUT type=text name=poblacion value='".$row["Population"]."'><br>";
	$codigo=$row["CountryCode"];
	echo($codigo);
	
//$code=$row['CountryCode'];	
	
//echo "<a href='mipagina.php?name=".$code'.">Pais</a>";
 

}

$resultados2 =$conexion->query($consulta2);
echo "Pais "."<SELECT >";
while ($row2 = $resultados2->fetch_assoc()){//mientras que queden filas en query results asignamos a $row como si es fila o lo que sea
//fetch_assoc es un metodo del la instancia linkidi del objeto mysql que devuelve una fila mientras haya
	var_dump($row2);
	if($row2["Code"]==$codigo){
	echo "<OPTION VALUE=".$row2["Name"]." selected>".$row2["Name"]."</option>";
	
	}else{
	echo "<OPTION VALUE=".$row2["Name"].">".$row2["Name"]."</option>";
	}
}
echo "</SELECT>"."<br>" ;






$conexion->close();
$resultados->close();
$resultados2->close();

?>
  