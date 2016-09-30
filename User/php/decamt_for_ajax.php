<?php
if(isset($_POST["did"]))
{
	require_once("connect.php");
	$aid=$_POST["did"];
	$query="select * from tb_decoration where did=$aid";
	$faci=mysql_query($query) or die("error in $query");
	$fac=mysql_fetch_array($faci);
	
		echo $fac[3];
	}
?>