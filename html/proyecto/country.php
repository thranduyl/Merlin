<HTML>
    <HEAD>
        
       
    </HEAD>
<BODY>


<BODY>
Paises del Mundo

<?php 
include("navigation.php");// incluyo un archivo vecino en la misma carpeta por lo que aparecera el contenido de ese archivo al ejecutar este
require("security.php"); //requiero el codigo de este archivo si el codigo requerido se ejecuta correctamente seguiremos con nuestro codigo, si no no.
$conecta_datos = new mysqli('localhost', 'root', '123', "world");// creo el objeto base de datos de tipo mysqli le indico el servidor, usuario, contraseña y base de datos

if($conecta_datos->connect_error){//llamo a la funcion connect error del objeto mysqli y si devuelve true conexion erronea y salgo
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}
$code=$_GET['Code'];// recojo un parametro que se me pasa por el navegador a traves de otro archivo por el metodo get

$consulta="SELECT Code, Name, Continent, Region, SurfaceArea, Population, LifeExpectancy From Country where code='".$code."'";
//declaro la variable consulta y alli meto la consulta que quiero realizar en este caso en funcion del codigo que he recogido previamente por el metodo post
$resultados =$conecta_datos->query($consulta);// llamamos al metodo query del objeto mysqli y le pasamos consulta y almacenamos lo que nos devuelve en resultados

while ($registro = $resultados->fetch_assoc()){ //llamamos al  metodo fetch_assoc de resultados que ha almacenado el objeto que le hemos mandado antes 
	//mientras haya registros en resultados voy asignando el contenido de cada tupla o registro a registro
	echo "Pais: ".$registro["Name"]."<br>";// imprimo el pais y su valor que cojo del campo Name que esta en registro
	echo "<p>Codigo Pais:".$registro["Code"]."</p>";// imprimo el Codigo Pais y su valor que cojo del campo Code que esta en registro
	echo "<p>Continente: ".$registro["Continent"]."</p>";// imprimo el pais y su valor que cojo del campo Continent que esta en registro
	echo "<p>Region: ".$registro["Region"]."</p>";// imprimo la Region y su valor que cojo del campo Region que esta en registro
	echo "<p>Esperanza de vida: ".$registro["LifeExpectancy"]."</p>"; // imprimo Esperanza de vida y su valor que cojo del campo LifeExpectancy que esta en registro
	echo "<p>Poblacion: ".$registro["Population"]."</p>";// imprimo la Poblacion y su valor que cojo del campo Population que esta en registro
	
	// imprimo el nombre y su valor que cojo del campo Name que esta en registro y lo meto como parte de un enlace de la wikipedia
	// de forma que cada vez que pinche ire al enlace de la wikipedia correspondiente al nombre del pais que haya escogido
	echo "<a href= http://es.wikipedia.org/wiki/".$registro["Name"].">Wikipedia</a><br>";
	//al igual que antes metodo el codigo como parte de un enlace y lo envio a country edit y almaceno la el campo Code de la variable registro
	// y la cadena de enlace sera precisamente el code y para pasarlo por parametro tengo que poner ?Code= a la variable que recojo
	echo "<p>Edita: <a href='country_edit.php?Code=".$registro["Code"]."'>".$registro["Code"]."</a></p>";
	//igual que el anterior pero lo mando a country_delete
	echo "<p>Borra: <a href='country_delete.php?Code=".$registro["Code"]."'>".$registro["Code"]."</a></p>";

}
 



$resultados->close();//libero los resultados de consulta llamando al metodo close


$conecta_datos->close();//cierro la base de datos
?>
 </BODY>
</HTML>