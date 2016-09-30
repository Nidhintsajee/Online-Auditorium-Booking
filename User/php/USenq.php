<?php
session_start();
session_id("mysession");

?><?php
include("logheader.php");

?>

   
<?php include("TRsidebar.php");
 $s=$_SESSION["name"];
 $si=$_SESSION["id"];
 ?>
   
   <H2 align="center" style="color:
   #F60" >ENQUIRY</H2> 
   
    <?php
	 
		$adp=NULL;
		$tmft=NULL;
			$una=NULL;
		$aid=NULL;
 		$faid=NULL;
		$hid=NULL;
		$fuid=NULL;
 		$did=NULL;
		$foid=NULL;
if(isset($_GET["eid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$e=$_GET["eid"];
$bdat=$_GET['bdate'];
	
		/*$tmft=$_GET["timefromto"];
		$una=$_GET['uname'];
		$faid=$_GET['faid'];
		$aid=$_GET['aid'];
		$hid=$_GET['hid'];
		$fuid=$_GET['fuid'];
		$did=$_GET['did'];
		$foid=$_GET['foid'];
		$est=$_GET['estatus'];
		$adp=$_GET['adpay'];*/
		
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
			$query="UPDATE tb_enquiery SET bdate='$bdat',timefromto='$tmft',uid='$si',aid='$aid',faid='$faid',hid='$hid',fuid='$fuid',did='$did',foid='$foid',estatus='1',adpay='$adp'WHERE eid='$e'";
			mysql_query($query)or die("UPDATING FAILED {$query}");
			
			echo"<h3 >CONFIRMED</h3>";
	 		
		}
		
	}



?>

    
    </div>

 <?php
include("viewenquieryUS.php");
?>

</div>
  <?php
include("TRfooter.php");
?>

