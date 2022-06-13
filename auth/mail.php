<?php
    $result=mail("mfarisammar@gmail.com","TEST","Hi","fastest25000@gmail.com");
	if(!$result) {   
		echo "Error";   
	} else {
		echo "Success";
	}
?>