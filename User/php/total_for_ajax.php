<?php
if(isset($_POST["faamt"]))
{
	
	$faamt=$_POST["faamt"];
	
	$hamt=$_POST["hamt"];
	$fuamt=$_POST["fuamt"];
	$damt=$_POST["damt"];
	$foamt=$_POST["foamt"];
	$tot=$faamt+$hamt+$fuamt+$damt+$foamt;
		echo $tot;
}
	


?>