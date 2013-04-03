<HTML>
    <HEAD>
        
        ...
    </HEAD>

    <BODY>
<?php
	

	var_dump($_POST);// imprimimos el contenido de post es decir todo lo que recojemos
	foreach ($_POST as $key=> $value){// creamos un foreach con post que es un array que contiene todos los elementos que hemos recogido ponemos un indice key y un valor value
		if(count($_POST[$key])>1){// contamos los elementos que tiene cada indice puesto que en funcion de cada elemento del formulario podemos recibir uno ninguno o varios elementos y si es mayor de 1 realizamos el foreach
			for ($i=0;$i<count($_POST[$key]);$i++){//hacemos un ciclo for mientras i sea menor que los elementos del esa posicion de post (indice key) incremento
				echo $_POST[$key][$i]."<br>";// imprimo las posiciones del indice que recorremos con el for. Es decir si vemos que la posicion (key) tiene varios elementos contamos e imprimimos todos
				// ya que i se incrementa hasta que se acaben todos los elementos del key y luego se incrementa el key con el foreach y se vuelve a probar la condicion
			}
		}else{// si no se da la condicion
			echo "$key=".$value."<br/>\n";// imprimimos el valor de key
		}
	}
	
    
		
?>
    
 
    </BODY>
</HTML>