<?php

if(isset($_GET["dtid"]))
{
	require("connect.php");
	$dtid=$_GET["dtid"];
	$query="delete from tb_dectype where dtid=$dtid";
	mysql_query($query);
}

header("location:decorationtype.php");

?>