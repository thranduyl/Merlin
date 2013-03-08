<?php
    class Consulta
    {
        // Propiedades
        private $cadena;
		private $arrayCadena;
		private $codigoCategoria;
		
		// Métodos:	

		// La función _construct se ejecuta automáticamente
		// al crear el nuevo objeto
		function __construct()
		{
			// Estos valores serán los valores por defecto
			$this->cadena = "";	
			$this->arrayCadena = "";
			$this->codigoCategoria = "";
		}
			
		//----------------------------------------------------------------
		// consulta por campo de busqueda
		
        public function consultaCampoBusqueda($cadenaExterior)
		{
			//captura la cadena que viene de fuera de la clase
			$this->cadena=$cadenaExterior;
			$this->comprobarCadena();
			return $this->pasarDatosObjeto();			
		}		
		
		// para quitar vacios de la cadena y preparar los parametros para pasar a objeto datos para
		// la busqueda
		
		public function comprobarCadena(){		
			// paso la cadena para trabajar con ella
			$cadena_a_consultar=$this->cadena;			
			if ($cadena_a_consultar<>''){ 
			   //SEPARA LA CADENA EN PALABRAS SEPARANDO POR ESPACIOS
			   $palabras=explode(" ",$cadena_a_consultar); 
			   //CUENTA EL NUMERO DE PALABRAS 
			   $numero_palabras=count($palabras);			   
			   if ($numero_palabras==1) { 
					$cadena_a_consultar=$palabras[0];		
				} elseif ($numero_palabras>1) { 
					$palabras_sin_vacios=array_filter($palabras);					
					$cadena_a_consultar=$palabras_sin_vacios;	
				} 
			}			
			$this->arrayCadena=$cadena_a_consultar;
			//return $cadena_a_consultar;					
		}
		
		public function pasarDatosObjeto(){ 			
			$nuevoObjetoConsultaDatos=new ObjetoDatos();			
			$nuevoObjetoConsultaDatos->establecerArrayParametrosConsultaDatos($this->arrayCadena);
			return $nuevoObjetoConsultaDatos->consultaPorCampoConsultaDatos();				
		}
		
		// -------------------------------------------------------------------
		// consulta por categoria
		
		public function consultaCampoCategoria($cadenaExterior)
		{
			//captura la cadena que viene de fuera de la clase
			$this->codigoCategoria=$cadenaExterior;				
			return $this->pasarCategoriaObjeto();			
		}	
		
		public function pasarCategoriaObjeto(){
			$nuevoObjetoCategoriaDatos=new ObjetoDatos();			
			$nuevoObjetoCategoriaDatos->establecerArrayParametrosCategoriaDatos($this->codigoCategoria);
			return $nuevoObjetoCategoriaDatos->consultaPorCampoCategoriaDatos();		
		}
	}
?>