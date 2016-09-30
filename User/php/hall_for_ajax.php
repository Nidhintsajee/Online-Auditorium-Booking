<?php
echo "<option value=''>Not Selected</option>";
if(isset($_POST["aid"]))
{
	require_once("connect.php");
	$aid=$_POST["aid"];
	$query="select hid,hname from tb_hall where aid=$aid";
	$hall=mysql_query($query) or die("error in $query");
	
	while(($hal=mysql_fetch_array($hall)))
	{
		echo "<option value='$hal[0]'>$hal[1]</option>";
		
	}
}
?>