<HTML>
    <HEAD>
        
        ...
    </HEAD>

    <BODY>
<?php
	

	var_dump($_POST);
	foreach ($_POST as $key=> $value){
		if(count($_POST[$key])>1){
			for ($i=0;$i<count($_POST[$key]);$i++){
				echo $_POST[$key][$i]."<br>";
			}
		}else{
			echo "$key=".$value."<br/>\n";
		}
	}
	
    
		
?>
    
 
    </BODY>
</HTML>