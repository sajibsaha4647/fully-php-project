<?php
	
	$db_host="localhost";
	$db_user="root";
	$sb_pass="";
	$db_name="final_admin";
	$con=mysqli_connect($db_host,$db_user,$sb_pass,$db_name);
	if(!$con){
		echo "database error connection!";
	}
?>