<?php
include("header.php");

?>
<?php include("sidebar.php");?>
   <H2 align="center" style="color:#FFF" >FOOD TYPE  REGISTRATION</H2> 

     <?php
	 $fotid=NULL;
		$ftyp=NULL;
			$foamt=NULL;
		$a=NULL;
 		
if(isset($_GET["fotid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$fotid=$_GET['fotid'];
		$ftyp=$_GET["ftype"];
	
		$foamt=$_GET["foamt"];
		
		$a=$_GET["foimage"];
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$ftyp=$_POST['txtfty'];
					
$foamt=$_POST['txtfamt'];
		if($caption=="ADD")
		{
			$a=basename($_FILES["fileCtrl"]["name"]);
$path="my_uploads/".$a;
move_uploaded_file($_FILES["fileCtrl"]["tmp_name"],$path);
		
		
			$query="INSERT INTO tb_fotype(ftype,foamt,foimage) VALUES ('$ftyp',$foamt,'$a')";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
		}
		else if($caption=="UPDATE")
		{
			$query="UPDATE tb_fotype SET ftype='$ftyp',foamt=$foamt WHERE fotid='$fotid'";
			mysql_query($query)or die("UPDATING FAILED {$query}");
	 		header("location:fodtype.php");
		}
		
	}



?>
      
  
  <form method="post" action="#" enctype="multipart/form-data">
  <div align="center">
    <table width="351" height="204" border="0" align="center"  style="color:#FFF">
      <tr>
        <td height="38"><b>Type</b></td>
        <td width="163">
<input  <?php if($editMode) echo"autofocus";?> type="text" name="txtfty" id="txtfty" required value="<?php echo $ftyp; ?>" autocomplete="off" placeholder="characters only" /></td>
      </tr>
      
      <tr>
        <td height="38"><b>Amount</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtfamt" id="txtfamt" required value="<?php echo $foamt; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
 
     
          
     <tr>
     <td height="38"><b>Image</b></td>
      <td>
      <input type="file" name="fileCtrl" required="required" />
</td></tr>
       <tr>
        <td height="43">&nbsp;</td>
        <td align="right"><input type="submit" name="btnAction" id="btnAction" value="<?php echo $caption; ?>" <?php if($editMode)echo "class='updateButton'"; ?> /><input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" /></td>
        
      </tr>
      
      <td></td>
    </table>
    
    </div>


</form>
<table>
<tr><td>
<!--<form method="post" action="#" enctype="multipart/form-data">
<input type="file" name="fileCtrl" required="required" />
<input type="submit"  value="UPLOAD" name="btnUPLOAD" />



</form>-->
</td>
<td>
<!--<form method="post" action="#">
<input type="submit" value="VIEW UPLOADS" o />
</form>-->
</td>
</tr>
</table>
    <?php
if(isset($_POST["btnUPLOAD"]))
{
$a=basename($_FILES["fileCtrl"]["name"]);
$path="my_uploads/".$a;
move_uploaded_file($_FILES["fileCtrl"]["tmp_name"],$path);

}
$dir="my_uploads/";

echo "</tr></table>";
?>
 <?php include("viewfoodty.php");?>
</div>
  <?php
include("footer.php");
?>


<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="fodtype.php";
	 else
	 document.getElementById('txtfty').focus(); 
 }
 </script>

