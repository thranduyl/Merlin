<HTML>
    <HEAD>
        
       
    </HEAD>
<BODY>
Ciudades del Mundo
<br><br><FORM action="http://localhost/control/html/resultado4.php" method="post">
<?php 
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
	
<p>Country Code: Country Code Link</p>(this link will open up the country
web page – country.php?Code=CountryCode - to display the details of the
country)
<p>Population: Size of the city population</p>
<p>District: Name of the District the city belongs to</p>
<p>Wikipedia Link</p>(this link will open up a Wikipedia web page -
http://en.wikipedia.org/wiki/Name of City)
	echo "<h1>".$registro["Name"]."</h1>";
	echo "<p><a href='country.php?Code=".$row["CountryCode"]."'></p>"
	echo $registro ["ID"], "|", $registro["Name"],"|",$registro ["CountryCode"],"|",$registro["District"],"|",$registro["Population"],"<br/>\n";


}
 



$resultados->close();


$conecta_datos->close();
?>

 </FORM>
 </BODY>
</HTML>