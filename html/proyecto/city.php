<HTML>
    <HEAD>
        
       
    </HEAD>
<BODY>
Ciudades del Mundo

<?php 
include("navigation.php");
$conecta_datos = new mysqli('localhost', 'root', '123', "world");

$id=$_GET['id'];

/*if($id==null){
$consulta="SELECT ID, Name, CountryCode, District, Population From City";
}else{
$consulta="SELECT ID, Name, CountryCode, District, Population From City where id=".$id;

}*/
$consulta="SELECT ID, Name, CountryCode, District, Population From City where id=".$id;
if($conecta_datos->connect_error){
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}




$resultados =$conecta_datos->query($consulta);

while ($registro = $resultados->fetch_assoc()){
	echo "Nombre Ciudad: ".$registro["Name"]."<br>";
	echo "<p>Codigo Pais: <a href='country.php?Code='".$registro["CountryCode"]."'>".$registro["CountryCode"]."</a></p>";
	echo "<p>Poblacion: ".$registro["Population"]."</p>";
	echo "<p>Distrito: ".$registro["District"]."</p>";
	echo "<a href= http://en.wikipedia.org/wiki/".$registro["Name"].">Wikipedia</a><br>";

}
 



$resultados->close();


$conecta_datos->close();
?>

 </FORM>
 </BODY>
</HTML>