<?php
echo "<option value=''>Not Selected</option>";
if(isset($_POST["aid"]))
{
	require_once("connect.php");
	$aid=$_POST["aid"];
	$query="select faid,large from tb_facility where aid=$aid";
	$faci=mysql_query($query) or die("error in $query");
	
	while(($fac=mysql_fetch_array($faci)))
	{
		echo "<option value='$fac[0]'>$fac[1]</option>";
	}
}
?>