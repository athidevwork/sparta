<?php
	$id = $_REQUEST['id'];
	include("config_db1.php");
	if($id != ""){
	$cmd = "delete from procedure_creation where id=".$id;
			if(mysql_query($cmd))
				echo 'Procedure info. deleted!';
			else
				echo 'unable to deleted';		
		}
		mysql_close($db1);
?>