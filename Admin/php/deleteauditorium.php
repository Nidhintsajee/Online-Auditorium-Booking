<?php

if(isset($_GET["aid"]))
{
	require("connect.php");
	$aid=$_GET["aid"];
	$query="delete from tb_audiregi where aid=$aid";
	mysql_query($query);
}

header("location:registration.php");

?>