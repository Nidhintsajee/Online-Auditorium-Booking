<?php
if(isset($_POST["fotid"]))
{
	require_once("connect.php");
	$aid=$_POST["fotid"];
	$query="select * from tb_fotype where fotid=$aid";
	$faci=mysql_query($query) or die("error in $query");
	$fac=mysql_fetch_array($faci);
	
		echo $fac[2];
	}
?>