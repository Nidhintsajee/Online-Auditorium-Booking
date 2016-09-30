<?php
include("logheader.php");

?>
`
   
<?php include("TRsidebar.php");
if(isset($_GET["bid"]))
{
$b=$_GET["bid"];

}?>
    
   <H2 align="center" style="color:
   #F60" >POSTPONED</H2>  <?php
	 $bid=NULL;
	  $poid=NULL;
		$podat=NULL;
		$tdat=NULL;
			$potim=NULL;
		if(isset($_GET["poid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$poid=$_GET['poid'];
		$bid=$_GET['bid'];
		$podat=$_GET["pdate"];
	$tdat=$_GET["todate"];
		$potim=$_GET["ptime"];
	}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$podat=$_POST['txtpodat'];
		$potim=$_POST['txtptim'];
					
$tdat=$_POST['txttdat'];

		if($caption=="ADD")
		{
			$query="INSERT INTO tb_postponed(ptime,pdate,todate,bid) VALUES ('$potim','$podat','$tdat',$b)";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
			echo"<h3 >POSTPONED COMPLETED</h3>";
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
        <td width="130" height="36"><b>Postponed Date</b></td>
        <td width="163">
<input  <?php if($editMode) echo"autofocus";?> type="date" name="txtpodat" id="txtpodat" required value="<?php echo $podat; ?>" autocomplete="off" placeholder="characters" /></td>
      </tr>
      
      <tr>
        <td width="130" height="36"><b>Today Date</b></td>
        <td width="163">
<input  <?php if($editMode) echo"autofocus";?> type="date" name="txttdat" id="txttdat" required value="<?php echo $tdat; ?>" autocomplete="off" placeholder="characters" /></td>
      </tr>
      
      <tr>
        <td height="38"><b>Postponed Time</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtptim" id="txtptim" required value="<?php echo $potim; ?>" autocomplete="off" placeholder="numbers only" /></td>
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

