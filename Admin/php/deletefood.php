<?php

if(isset($_GET["foid"]))
{
	require("connect.php");
	$foid=$_GET["foid"];
	$query="delete from tb_food where foid='$foid'";
	mysql_query($query);
}

header("location:food.php");

?>