<HTML>
    <HEAD>
      Ciudades del Mundo
      
    </HEAD>
	<title>MySQL and PHP</title> 
<BODY>


<?php 
include("navigation.php");

$conecta_datos = new mysqli('localhost', 'root', '123', "world");

//$id=$_GET["id"];




if($conecta_datos->connect_error){
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}


$consulta="SELECT ID, Name From City";



$resultados =$conecta_datos->query($consulta);

while ($registro = $resultados->fetch_assoc()){
	echo "<p>Nombre Ciudad: ".$registro["Name"]." | Id: "."<a href='city.php?id=".$registro["ID"]."'>".$registro["ID"]."</a>";
	}
 

$resultados->close();


$conecta_datos->close();
?>

 </FORM>
 </BODY>
</HTML>