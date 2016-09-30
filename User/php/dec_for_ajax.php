<?php
echo "<option value=''>Not Selected</option>";
if(isset($_POST["aid"]))
{
	require_once("connect.php");
	$aid=$_POST["aid"];
	$query="select did,dname from tb_decoration where aid=$aid";
	$deco=mysql_query($query) or die("error in $query");
	
	while(($dec=mysql_fetch_array($deco)))
	{
		echo "<option value='$dec[0]'>$dec[1]</option>";
		
	}
}
?>