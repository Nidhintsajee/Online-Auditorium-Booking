<?php
echo "<option value=''>Not Selected</option>";
if(isset($_POST["aid"]))
{
	require_once("connect.php");
	$aid=$_POST["aid"];
	$query="select fuid,funame from tb_function where aid=$aid";
	$func=mysql_query($query) or die("error in $query");
	
	while(($fun=mysql_fetch_array($func)))
	{
		echo "<option value='$fun[0]'>$fun[1]</option>";
		
	}
}
?>