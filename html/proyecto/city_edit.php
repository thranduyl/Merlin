<HTML>
    <HEAD>
     
      
    </HEAD>
	<title>MySQL and PHP</title> 
<BODY>

<br><br><FORM action="http://localhost/control/html/proyecto/city_save.php" method="get"><!--declaro un formulario que enlazr con city_save y pasamos los datos con el metodo get-->
<?php 
include("navigation.php");// incluyo un archivo vecino en la misma carpeta por lo que aparecera el contenido de ese archivo al ejecutar este
require("security.php"); //requiero el codigo de este archivo si el codigo requerido se ejecuta correctamente seguiremos con nuestro codigo, si no no.
$conecta_datos = new mysqli('localhost', 'root', '123', "world");// creo el objeto base de datos de tipo mysqli le indico el servidor, usuario, contraseña y base de datos


if($conecta_datos->connect_error){//llamo a la funcion connect error del objeto mysqli y si devuelve true conexion erronea y salgo
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}

$id=$_GET["ID"];// recojo por el metodo get el contenido de la variable ID que se me pasa por el navegador desde otro archivo por el metodo get

$consulta="SELECT ID, CountryCode, Name, Population, District From City where ID=".$id; //declaro la variable consulta y alli meto la consulta que quiero realizar en este caso con la condicion en funcion de la id que recojo por el metodo get



$resultados =$conecta_datos->query($consulta);//llamo al metodo query del objeto mysqli pasandole la consulta y almaceno lo que devuelve en la variable resultados

while ($registro = $resultados->fetch_assoc()){// mientras que en resultado existan tuplas resultantes de la consulta asigno esas tuplas a la variable registro
	// para ver las tuplas o registros de resultados llamamos al metodo fetchassoc que es un metodo del objeto mysqli
	
	//imprimimos una caja de texto llamada nombre en la que su valor sera el que recojamos del campo name que viene de la variable registro y que es editable
	echo "Nombre Ciudad <INPUT type=text name='nombre' value='".$registro["Name"]."'><br>"; //es muy importante el uso de las comillas sobre todo al crear parametros o consultas por que o la consulta sale mal o el formulario manda mal el dato y no coje el dato completo en el caso de que haya espacios
	//imprimimos una caja de texto llamada poblacion en la que su valor sera el que recojamos del campo population que viene de la variable registro y que es editable
	echo "Poblacion  Ciudad <INPUT type=text name='poblacion' value='".$registro["Population"]."'><br>";
	//imprimimos una caja de texto llamada distrito en la que su valor sera el que recojamos del campo district que viene de la variable registro y que es editable
	echo "Distrito Ciudad <INPUT type=text name='distrito' value='".$registro["District"]."'><br>";
	//imprimimos una caja de texto llamada id en la que su valor sera el que recojamos del campo ID que viene de la variable registro ESTA oculta por lo que no aparecera aunque se almacenara
	echo "<INPUT type=hidden name='id' value=".$registro["ID"]."><br>";
	//imprimimos una caja de texto llamada codigopais en la que su valor sera el que recojamos del campo CountryCode que viene de la variable registro ESTA oculta por lo que no aparecera aunque se almacenara
	echo "<INPUT type=hidden name='codigopais' value='".$registro["CountryCode"]."'><br>";
	//$codigo=$row["CountryCode"];
	}
 

$resultados->close();//cierro y libero los resultados de la consulta


$conecta_datos->close();// cierro el objeto base de datos llamando al metodo close
?>
<br><input type="submit" name=boton value="Actualizar"> <!--declaro el boton  de tipo submit para enviar datos y le doy valor actualizar-->
 </FORM>
 </BODY>
</HTML>