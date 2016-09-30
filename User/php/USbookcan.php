<?php
include("logheader.php");

?>

   
<?php include("TRsidebar.php");?>
    
<?php
session_start();
session_id("mysession");

?>
   
<?php 
 $s=$_SESSION["name"];
 $si=$_SESSION["id"];
 ?>
   
   <H2 align="center" style="color:
   #F60" >CANCELATION</H2> 
   
    <?php
	 
		$tmft=NULL;
			$una=NULL;
		$aid=NULL;
 		$faid=NULL;
		$hid=NULL;
		$fuid=NULL;
 		$did=NULL;
		$foid=NULL;
if(isset($_GET["bid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$b=$_GET["bid"];
$adp=$_GET['adp'];
$bdat=$_GET['bdate'];
	
		$tmft=$_GET["time"];
		
		$bst=$_GET['bstatus'];
		
		
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		
		 if($caption=="UPDATE")
		{
			$query="UPDATE tb_booking SET bdate='$bdat',time='$tmft',bstatus='1',adpay='$adp' WHERE bid='$b'";
			mysql_query($query)or die("UPDATING FAILED {$query}");
			
			echo"<h3 >CONFIRMED</h3>";
	 		
		}
		
	}



?>

    
    </div>

 <?php
include("viewbookUScan.php");
?>
<?php
include("TRfooter.php");
?>
</div>
  