<?php
echo "<option value=''>Not Selected</option>";
if(isset($_POST["aid"]))
{
	require_once("connect.php");
	$aid=$_POST["aid"];
	$query="select foid,foitem from tb_food where aid=$aid";
	$food=mysql_query($query) or die("error in $query");
	
	while(($fod=mysql_fetch_array($food)))
	{
		echo "<option value='$fod[0]'>$fod[1]</option>";
		
	}
}
?>