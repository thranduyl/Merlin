<HTML>
    <HEAD>
        
        ...
    </HEAD>

    <BODY>
	<?php
	

	
	foreach ($_post as $key=> $value){
		echo $key."==>".$value."<br>";
		for ($i=0;$_post>1;$i++){
		echo $i;
		/*if($key>1){
			foreach($key as $j=> $value){
				echo $value;
			}
		}*/
		
		}
	
	}
	
    
		
 ?>
    
 
    </BODY>
</HTML>