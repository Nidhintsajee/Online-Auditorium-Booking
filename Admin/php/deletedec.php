<?php

if(isset($_GET["did"]))
{
	require("connect.php");
	$did=$_GET["did"];
	$query="delete from tb_decoration where did=$did";
	mysql_query($query);
}

header("location:decoration.php");

?>