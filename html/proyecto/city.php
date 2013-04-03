<HTML>
    <HEAD>
        
       
    </HEAD>
<BODY>
Ciudades del Mundo

<?php 
include("navigation.php");// incluyo un archivo vecino en la misma carpeta por lo que aparecera el contenido de ese archivo al ejecutar este
require("security.php"); //requiero el codigo de este archivo si el codigo requerido se ejecuta correctamente seguiremos con nuestro codigo, si no no.
$conecta_datos = new mysqli('localhost', 'root', '123', "world");// creo el objeto base de datos de tipo mysqli le indico el servidor, usuario, contraseña y base de datos



/*if($id==null){
$consulta="SELECT ID, Name, CountryCode, District, Population From City";
}else{
$consulta="SELECT ID, Name, CountryCode, District, Population From City where id=".$id;

}*/

if($conecta_datos->connect_error){//llamo a la funcion connect error del objeto mysqli y si devuelve true conexion erronea y salgo
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}
$id=$_GET['id']; //recojo por el metodo get el contenido de la variable id que se me pasa desde otro archivo o poniendola en el navegador y la almaceno en $id
$consulta="SELECT ID, Name, CountryCode, District, Population From City where id=".$id;//declaro la variable consulta y alli meto la consulta que quiero realizar en este caso con la condicion en funcion de la id que recojo por el metodo get


$resultados =$conecta_datos->query($consulta);//llamo al metodo query del objeto mysqli pasandole la consulta y almaceno lo que devuelve en la variable resultados

//es muy importante el uso de las comillas sobre todo al crear parametros o consultas por que o la consulta sale mal o el formulario manda mal el dato y no coje el dato completo en el caso de que haya espacios
while ($registro = $resultados->fetch_assoc()){// mientras que en resultado existan tuplas resultantes de la consulta asigno esas tuplas a la variable registro
	// para ver las tuplas o registros de resultados llamamos al metodo fetchassoc que es un metodo del objeto mysqli 
 //registro contiene todas las los campos de cada tupla
	echo "Nombre Ciudad: ".$registro["Name"]."<br>";//imprimo nombre de ciudad recogiendolo del campo nombre que contiene la variable registro
	echo "<p>Codigo Pais: <a href='country.php?Code=".$registro["CountryCode"]."'>".$registro["CountryCode"]."</a></p>";//imprimo codigo pais recogiendolo del campo codigo pais  en forma de enlace que contiene la variable
	// al escribir ?Code=... estoy almacenando en esta variable el contenido de la variable que estoy recogiendo
	// de forma que lo pasare por el navegador y aparecera en la barra y podra ser recogido por el archivo al que mando el dato, en este caso Country.php
	echo "<p>Poblacion: ".$registro["Population"]."</p>";//imprimo poblacion recogiendolo del population  que contiene la variable registro
	echo "<p>Distrito: ".$registro["District"]."</p>";//imprimo distrito recogiendolo del district que contiene la variable registro
	echo "<a href= http://en.wikipedia.org/wiki/".$registro["Name"].">Wikipedia</a><br>";//imprimo nombre recogiendolo del name que contiene la variable registro pero esta vez lo pongo como parte 
	//de un enlace de la wikipedia concatenandolo de forma que cuando pincho me mandadirectamente al enlace correspondiente en la wikipedia al pais seleccionado
	echo "<p>Edita: <a href='city_edit.php?ID=".$registro["ID"]."'>".$registro["ID"]."</a></p>"; //igual que con el enlace de Code pero esta vez mando id y se lo mando a city_edit
	echo "<p>Borra: <a href='city_delete.php?ID=".$registro["ID"]."'>".$registro["ID"]."</a></p>";//igual que el anterior pero lo envio a city_delete
// en los enlaces es importante ver la sintaxis del enlace y respetar las comillas es complicado pero hay quer tener cuidado y poner dobles comillas si es necesario

}
 



$resultados->close();//cierro la consulta llamando al metodo close


$conecta_datos->close();// cierro el objeto base de datos
?>

 
 </BODY>
</HTML>