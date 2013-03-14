<HTML>
    <HEAD>
        
       
    </HEAD>
<BODY>
<br><br><FORM action="http://localhost/control/html/resultado2.php" method="post">
<?php 
$conexion = new mysqli('localhost', 'root', 'necronomicon', "world");
if($conexion->connect_error){
echo "coneccion Error ($conexion->connect_error)
		$conexion->connect_error\n";
	exit;
}



$id=$_GET['id'];
$consulta = "SELECT ID, CountryCode, Name , District, Population From City where ID=".$id;
$consulta2 = "SELECT  * From Country"; 




$resultados =$conexion->query($consulta);
//echo "<FORM action=""http://localhost/control/html/resultado2.php"" method=""post"">";
while ($row = $resultados->fetch_assoc()){//mientras que queden filas en query results asignamos a $row como si es fila o lo que sea
//fetch_assoc es un metodo del la instancia linkidi del objeto mysql que devuelve una fila mientras haya
	//echo  $row["ID"]." ".$row["CountryCode"].$row["District"].$row["Population"];
	echo "Nombre Ciudad<INPUT type=text name=nombre value='".$row["Name"]."'><br>";
	echo "Distrito Ciudad<INPUT type=text name=distrito value='".$row["District"]."'><br>";
	echo "Poblacion  Ciudad<INPUT type=text name=poblacion value='".$row["Population"]."'><br>";
	echo "<INPUT type=hidden name=id value=".$row["ID"]."><br>";
	$codigo=$row["CountryCode"];
	
//$code=$row['CountryCode'];	
	
//echo "<a href='mipagina.php?name=".$code'.">Pais</a>";
 

}
echo "Pais "."<SELECT >";
$resultados2 =$conexion->query($consulta2);

while ($row2 = $resultados2->fetch_assoc()){//mientras que queden filas en query results asignamos a $row como si es fila o lo que sea
//fetch_assoc es un metodo del la instancia linkidi del objeto mysql que devuelve una fila mientras haya
	
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
<br><input type="submit" value="Enviar">
  </FORM>
 </BODY>
</HTML>