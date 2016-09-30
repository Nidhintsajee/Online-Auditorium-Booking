<?php

if(isset($_GET["fuid"]))
{
	require("connect.php");
	$fuid=$_GET["fuid"];
	$query="delete from tb_function where fuid=$fuid";
	mysql_query($query);
}

header("location:function.php");

?>