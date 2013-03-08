<HTML>
    <HEAD>
        
        ...
    </HEAD>

    <BODY>
	<?php
	$nombre = $_POST;
	
	
	foreach ($nombre as $key=> $value){
		echo $value;
		if($key>1){
		foreach($key as $j=> $value1)
		echo $value1;
		
		}
	
	
	
	
	}
	
    
		
 ?>
    
 
    </BODY>
</HTML>