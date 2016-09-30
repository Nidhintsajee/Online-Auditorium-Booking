<?php
if(isset($_POST["fuid"]))
{
	require_once("connect.php");
	$aid=$_POST["fuid"];
	$query="select * from tb_function where fuid=$aid";
	$faci=mysql_query($query) or die("error in $query");
	$fac=mysql_fetch_array($faci);
	
		echo $fac[2];
	}
?>