<?php

if(isset($_GET["hid"]))
{
	require("connect.php");
	$hid=$_GET["hid"];
	$query="delete from tb_hall where hid='$hid'";
	mysql_query($query);
}

header("location:hallregi.php");

?>