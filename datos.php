<?php


	class ObjetoDatos
	{
		 // Propiedades
        
		private $ConsultaDatos;
		private $arrayCategoriaDatos;
		      
		
        // Métodos:	

		// La función _construct se ejecuta automáticamente
		// al crear el nuevo objeto
		function __construct(){
			// Estos valores serán los valores por defecto			
			$this->ConsultaDatos = "";
		}
		
		public function apertura(){
			
			$par_apertura = new mysqli('localhost', 'root', '123', "listamina");
			
			if($par_apertura->connect_error){
					return false;
			}else{
			      return true;
			}
		
		
		
		}
			
			
		// bloque datos de consulta por campo de busqueda
		
        public function establecerArrayParametrosConsultaDatos($capturaConsultaDatos){
			//captura la cadena que viene de fuera de la clase	
			// ********* AQUI SE CAPTURA EN UN ARRAY LOS PARAMETROS A BUSCAR ********		
				
			$this->ConsultaDatos=$capturaConsultaDatos;	
			consultaPorCampoCategoriaDatos();
			
			
		}				
		public function consultaPorCampoConsultaDatos(){			
			// crear sentencia sql y cargar resultado en xml
			// esto lo hago para ver que devuelve algo --> return $this->ConsultaDatos;		
			// devolver mediante return
			return $this->ConsultaDatos;
		
		}
					
					
					
					
		public function consultaPorCampoCategoriaDatos(){			
			// crear sentencia sql y cargar resultado en xml
			// esto lo hago para ver que devuelve algo --> return $this->ConsultaDatos;
			// devolver mediante return
			
			if(apertura()){
			$consulta = "SELECT * From listas INNER JOIN listado_categoria 
			ON listas.id_lista=listado_categoria.id_lista where id_lista='".this->ConsultaDatos."'";
			$resultados =$par_apertura->query($consulta);
			}
			
			cierre();
			
			return $this->ConsultaDatos;
		
		}
		
		public function  cierre(){
			$par_apertura->close();
			$resultados->close();
			$resultados->close();
		
		}
		
	}
?>