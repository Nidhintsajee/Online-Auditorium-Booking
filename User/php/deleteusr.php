<?php

if(isset($_GET["uid"]))
{
	require("connect.php");
	$uid=$_GET["uid"];
	$query="delete from tb_uregi where uid='$uid'";
	mysql_query($query);
}

header("location:signup.php");

?>