<HTML>
    <HEAD>
     
      
    </HEAD>
	<title>Security</title> 
<BODY>


<?php 

	session_start();
	if(isset($_POST["access_requested"])){//con isset compruebo que la variable access_request que recojo por post
	//contenga algo si contiene algo me devolvera true y hacemos el contenido, si no acceso incorrecto
		$nombre=$_POST["uname"];
		$password=$_POST["pword"];
		$conecta_datos = new mysqli('localhost', 'root', '123', "world");// creo el objeto base de datos de tipo mysqli le indico el servidor, usuario, contraseña y base de datos
		if($conecta_datos->connect_error){//llamo a la funcion connect error del objeto mysqli y si devuelve true conexion erronea y salgo
			echo "coneccion Error ($linkidi->connect_errno)
			$linkidi->connect_error\n";
			exit;
		}
		$consulta="SELECT * From Customers where passwd=sha('".$password."')" ; //declaro la variable consulta y alli meto la consulta que quiero realizar
		//var_dump($consulta);		
		$resultados =$conecta_datos->query($consulta);//llamo al metodo query del objeto mysqli pasandole la consulta y almaceno lo que devuelve en la variable resultados
		while ($registro = $resultados->fetch_assoc()){ // mientras que en resultado existan tuplas resultantes de la consulta asigno esas tuplas a la variable registro
			/*echo $password;
			echo "<br>";
			echo $nombre;
			echo "<br>";
			echo $registro["passwd"];*/
			$nom=$registro["lname"];
			/*echo "<br>";
			echo $nom;*/
			if($resultados->num_rows==1){
				if($_POST["access_requested"]=="yes"){
					/*echo "<br>";
					echo $nom;
					echo "<br>";
					echo $nombre;*/
					if($nombre==$nom){
						$_SESSION["Approved"]="Yes";
					}else{
						echo "<p>Incorrect Username and/or Password, please try again</p>";
						$_SESSION["Approved"]="No";
					}
				}
			}
		}
		$resultados->close();//cierro y libero la consulta llamando al metodo close
		$conecta_datos->close();
	
	} 

	
	
	
	
	
	if(!isset($_SESSION["Approved"])){//aqui comprobamos que contiene algo pero como sesion no existe la primera vez por que no hemos mandado nada
	$_SESSION["Approved"]="No";//tenemos que comprobar si es falso lo que nos devuelve y en este caso nos devuelve falso
	//si se cumple la condicion  Approved = No
	}
	
	if($_SESSION["Approved"]=="Yes"){
		echo "<!-- HTML Coment, Access Aproved, not visible in output-->";
	}else{
		$req_URL = $_SERVER["REQUEST_URI"];
	print <<<GROUP1
	  <form action="$req_URL" method="POST">
		  <p>Username: <input type="text" name="uname"></p>
          <p>Password: <input type="password" name="pword"></p>
		  <input type="hidden" name="access_requested" value="yes">
		  <p><input type="submit" value="Login"></p>
		  </form>
GROUP1;
	exit;
	}

?>


 </BODY>
</HTML>