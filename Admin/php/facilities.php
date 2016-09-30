<?php
include("header.php");

?>

   
<?php include("sidebar.php");?>
   <H2 align="center" style="color:#FFF" >FACILITIES REGISTRATION</H2> 
     <?php
	 $fid=NULL;
		$aid=NULL;
			$large=NULL;
		$famt=NULL;
 		
if(isset($_GET["faid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$faid=$_GET['faid'];
		$large=$_GET["large"];
	
		$aid=$_GET['aid'];
		$famt=$_GET["famt"];
		
		
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$large=$_POST['txtlrg'];
					
$famt=$_POST['txtfamt'];
$aid=$_POST['selfaci'];
		if($caption=="ADD")
		{
			$query="INSERT INTO tb_facility(aid,large,famt) VALUES ($aid,'$large','$famt')";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
		}
		else if($caption=="UPDATE")
		{
			$query="UPDATE tb_facility SET large='$large',famt='$famt',aid='$aid'WHERE faid='$faid'";
			mysql_query($query)or die("UPDATING FAILED {$query}");
	 		header("location:facilities.php");
		}
		
	}



?>
      
  
  <form method="post" action="#">
  <div align="center">
    <table width="242" height="141" border="0" align="center"  style="color:#FFF">
     <tr>
        <td height="38"><b>Auditorium</b></td>
        <td><select name="selfaci">
            <option value="">not selected</option>
            <?php
		
require("connect.php");
		  $query="select * from tb_audiregi";
   $audi=mysql_query($query) or die ("Query Error {$query}");
while(($aud=mysql_fetch_array($audi)))
{
	if($aid==$aud[4])
	{
	echo"<option value='$aud[4]' selected='selected'  >$aud[0]</option>";	}
	else
	{
	echo"<option value='$aud[4]'>$aud[0]</option>";}
}?></select></td>
      </tr>
      <tr>
        <td height="38"><b>Facilities</b></td>
         <td width="0" height="2"><textarea name="txtlrg" cols="" rows=""><?php echo $large;?></textarea></td>
      </tr>
      
      <tr>
        <td height="38"><b>Amount</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtfamt" id="txtfamt" required value="<?php echo $famt; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
 
     
         
       <tr>
        <td height="43">&nbsp;</td>
        <td align="right"><input type="submit" name="btnAction" id="btnAction" value="<?php echo $caption; ?>" <?php if($editMode)echo "class='updateButton'"; ?> /><input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" /></td>
        
      </tr>
    </table>
    
    </div>
</form>
 <?php include("viewfaci.php");?>
</div>
  <?php
include("footer.php");
?>


<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="facilities.php";
	 else
	 document.getElementById('txtlrg').focus(); 
 }
 </script>

