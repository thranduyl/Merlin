<HTML>
    <HEAD>
        
       
    </HEAD>
<BODY>
Ciudades del Mundo
<?php 
include("navigation.php");// incluyo un archivo vecino en la misma carpeta por lo que aparecera el contenido de ese archivo al ejecutar este
require("security.php"); //requiero el codigo de este archivo si el codigo requerido se ejecuta correctamente seguiremos con nuestro codigo, si no no.
$conecta_datos = new mysqli('localhost', 'root', '123', "world");// creo el objeto base de datos de tipo mysqli le indico el servidor, usuario, contraseña y base de datos






if($conecta_datos->connect_error){//llamo a la funcion connect error del objeto mysqli y si devuelve true conexion erronea y salgo
echo "coneccion Error ($linkidi->connect_errno)
		$linkidi->connect_error\n";
	exit;
}


$consulta="SELECT Code, Name From Country"; //declaro la variable consulta y alli meto la consulta que quiero realizar 



$resultados =$conecta_datos->query($consulta);// llamo al metodo query del objeto mysqli y le paso la consulta meto el resultado en $resultados

while ($registro = $resultados->fetch_assoc()){// llamo al metodo fetchassoc del objeto que he almacenado en resultados de forma que mientras que existan tuplas o registros resultantes de su consulta 
//los asigno a registro en cada ciclo de forma que registro contendra cada campo y cada valor
	echo "<p>Nombre Pais: ".$registro["Name"]." | Codigo: "."<a href='country.php?Code=".$registro["Code"]."'>".$registro["Code"]."</a>";
	}//imprimo el nombre del pais y saco el valor a traves del campo name que saco de registro
	// hago lo mismo con codigo y saco su valor a atra ves del campo Code, ademas lo pongo como enlace y imprimo como enlace el mismo codigo.
 

$resultados->close();//cierro llamando al metodo close del objeto mysqli y libero la consulta


$conecta_datos->close();// lo mismo con la base de datos
?>

 </BODY>
</HTML>