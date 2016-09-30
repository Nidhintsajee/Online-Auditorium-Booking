<?php
if(isset($_POST["faid"]))
{
	require_once("connect.php");
	$aid=$_POST["faid"];
	$query="select * from tb_facility where faid=$aid";
	$faci=mysql_query($query) or die("error in $query");
	$fac=mysql_fetch_array($faci);
	
		echo $fac[3];
	}
?>