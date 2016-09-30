<?php
if(isset($_POST["hid"]))
{
	require_once("connect.php");
	$aid=$_POST["hid"];
	$query="select * from tb_hall where hid=$aid";
	$faci=mysql_query($query) or die("error in $query");
	$fac=mysql_fetch_array($faci);
	
		echo $fac[3];
	}
?>