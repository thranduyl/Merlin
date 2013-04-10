<HTML>
    <HEAD>
      Ciudades del Mundo
      
    </HEAD>
	<title>MySQL and PHP</title> 
<BODY>


<?php //codigo php
require("security.php"); //requiero el codigo de este archivo si el codigo requerido se ejecuta correctamente seguiremos con nuestro codigo, si no no.
include("navigation.php");// incluyo un archivo vecino en la misma carpeta por lo que aparecera el contenido de ese archivo al ejecutar este

$conecta_datos = new mysqli('localhost', 'root', '123', "world");// creo el objeto base de datos de tipo mysqli le indico el servidor, usuario, contraseña y base de datos

//$id=$_GET["id"];




if($conecta_datos->connect_error){//llamo a la funcion connect error del objeto mysqli y si devuelve true conexion erronea y salgo
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}


$consulta="SELECT ID, Name From City"; //declaro la variable consulta y alli meto la consulta que quiero realizar



$resultados =$conecta_datos->query($consulta);//llamo al metodo query del objeto mysqli pasandole la consulta y almaceno lo que devuelve en la variable resultados

while ($registro = $resultados->fetch_assoc()){ // mientras que en resultado existan tuplas resultantes de la consulta asigno esas tuplas a la variable registro
	// para ver las tuplas o registros de resultados llamamos al metodo fetchassoc que es un metodo del objeto mysqli 
	echo "<p>Nombre Ciudad: ".$registro["Name"]." | Id: "."<a href='city.php?id=".$registro["ID"]."'>".$registro["ID"]."</a>"; 
	//imprimo nombre ciudad , id en forma de enlace recogiendo esos campos de la variable registro que contiene cada tupla
	// al escribir ?id=... estoy almacenando en esta variable el contenido de la variable que estoy recogiendo
	// de forma que lo pasare por el navegador y aparecera en la barra y podra ser recogido
	// en los enlaces es importante ver la sintaxis del enlace y respetar las comillas es complicado pero hay quer tener cuidado y poner dobles comillas si es necesario
}
 

$resultados->close();//cierro y libero la consulta llamando al metodo close


$conecta_datos->close();// cierro el objeto base de datos y con ello la conexion
?>

 
 </BODY>
</HTML>