<?php
	include("consulta.php");
	include("datos.php");
	
	
	$captura_consulta=new Consulta();
	
	$captura_categoria=new Consulta();
	
	//--------------------------------------
	// entrada a proceso de busqueda por campo.. pasar parametro que viene de input.
	print_r($captura_consulta->consultaCampoBusqueda('hola como '));	

	//--------------------------------------
	// aqui se pasa el codigo de categoria 	
	print_r($captura_categoria->consultaCampoCategoria('4'));
	
	
	
	
	
	
	//--------------------------------------
	
	
?>