<?php
include("logheader.php");

?>

   
<?php include("TRsidebar.php");
if(isset($_GET["bid"]))
{
$b=$_GET["bid"];

}
?>
    
   <H2 align="center" style="color:
   #F60" >CANCELATION</H2>  <?php
	 $cid=NULL;
	  $bid=NULL;
		$cdat=NULL;
		$tdat=NULL;
			$rsn=NULL;
			if(isset($_GET["cid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$cid=$_GET['cid'];
		$bid=$_GET['bid'];
		$cdat=$_GET["cdate"];
	$tdat=$_GET["todate"];
		$rsn=$_GET["reason"];
				}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$cdat=$_POST['txtcdat'];
					//$bid=$_POST['selbook'];
$tdat=$_POST['txttdat'];
$rsn=$_POST['txtrsn'];

		if($caption=="ADD")
		{
			$query="INSERT INTO tb_cancel(cdate,todate,reason,bid) VALUES ('$cdat','$tdat','$rsn','$b')";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
			echo"<h3 >CANCELATION COMPLETED</h3>";
		}
		
		
	}



?>
      
  
  <form method="post" action="#">
  <div align="center">
    <table width="351" height="204" border="0" align="center"  style="color:#000">
          <tr>
        <td height="38"><b>Booking ID</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtbid" id="txtbid" required value="<?php echo $b; ?>" autocomplete="off" placeholder="characters" /></td>
      </tr>
      
      <tr>
        <td width="130" height="36"><b>Cancel Date</b></td>
        <td width="163">
<input  <?php if($editMode) echo"autofocus";?> type="date" name="txtcdat" id="txtcdat" required value="<?php echo $cdat; ?>" autocomplete="off" placeholder="characters" /></td>
      </tr>
      
      <tr>
        <td width="130" height="36"><b>Today Date</b></td>
        <td width="163">
<input  <?php if($editMode) echo"autofocus";?> type="date" name="txttdat" id="txttdat" required value="<?php echo $tdat; ?>" autocomplete="off" placeholder="characters" /></td>
      </tr>
      
      <tr>
        <td height="38"><b>Reason</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtrsn" id="txtrsn" required value="<?php echo $rsn; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
 
     
       <tr>
        <td height="43">&nbsp;</td>
        <td align="right"><input type="submit" name="btnAction" id="btnAction" value="<?php echo 'SUBMIT'; ?>" <?php if($editMode)echo "class='updateButton'"; ?> /><input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" /></td>
        
      </tr>
    </table>
    
    </div>
</form>

</div>
  
  <?php
include("TRfooter.php");
?>

<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="TRbooking.php";
	 else
	 document.getElementById('selenq').focus(); 
 }
 </script>

