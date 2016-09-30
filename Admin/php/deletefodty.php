<?php

if(isset($_GET["fotid"]))
{
	require("connect.php");
	$fotid=$_GET["fotid"];
	$query="delete from tb_fotype where fotid='$fotid'";
	mysql_query($query);
}

header("location:fodtype.php");

?>