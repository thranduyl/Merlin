<HTML>
    <HEAD>
        
        ...
    </HEAD>

    <BODY>
	<?php
	$nombre = $_POST["nombre"];
	$apellido = $_POST["apellido"];
	$Genero = $_POST["Genero"];
	$Edad = $_POST["edad"];
	/*$favoritos =$_POST["favoritos1"];
	$favoritos2 =$_POST["favoritos2"];
	$favoritos3 =$_POST["favoritos3"];
	$favoritos4 =$_POST["favoritos4"];
	$favoritos5 =$_POST["favoritos5"];
	$favoritos6 =$_POST["favoritos6"];*/
	$comentario =$_POST["Comentario"];
    
		
	echo $nombre." ".$apellido." ".$Genero." ".$Edad." ".$comentario ?>
    
 
    </BODY>
</HTML>