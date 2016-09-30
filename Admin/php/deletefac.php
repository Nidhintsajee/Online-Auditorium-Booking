<?php

if(isset($_GET["faid"]))
{
	require("connect.php");
	$faid=$_GET["faid"];
	$query="delete from tb_facility where faid=$faid";
	mysql_query($query);
}

header("location:facilities.php");

?>