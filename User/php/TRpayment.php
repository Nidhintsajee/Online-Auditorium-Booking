<?php
include("logheader.php");

?>

   
<?php include("TRsidebar.php");?>
   
    
   <H2 align="center" style="color:
   #F60" >PAYMENT</H2>  <?php 
   session_start();
session_id('mysession');
$s=$_SESSION["name"];
 $si=$_SESSION["id"];
	if(isset($_GET["bid"]))
{
$b=$_GET["bid"];
$adp=$_GET["adp"];

}
	 $pid=NULL;
		$pdat=NULL;
		$amt=NULL;
		
		$bid=NULL;	
		$cana=NULL;
		$caid=NULL;
		$uid=NULL;
		$pin=NULL;
		$exp=NULL;
$bna=NULL;
	$acno=NULL;
					
if(isset($_GET["pid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$pid=$_GET['pid'];
		$pdat=$_GET["pdate"];
		$bid=$_GET['bid'];
$bdat=$_GET['bdate'];
		$amt=$_GET['amt'];
		$cana=$_GET['cardname'];
		$caid=$_GET["cardid"];
		$uid=$_GET['uid'];
		$pin=$_GET['pin'];
		$exp=$_GET["expdate"];
		$bna=$_GET['bankname'];
		$acno=$_GET['acno'];
		
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$pdat=$_POST['txtpdat'];
		
		$amt=$_POST['txtamt'];;
					
		
		$cana=$_POST['txtcana'];
			$caid=$_POST['txtcaid'];
			$pin=$_POST['txtpin'];
		$exp=$_POST['txtexp'];
		$bna=$_POST['txtbna'];
		$acno=$_POST['txtacno'];
		if($caption=="ADD")
		{
			$query="INSERT INTO tb_payment(pdate,amt,bid,cardname,cardid,uid,pin,expdate,bankname,acno) VALUES ('$pdat','$amt','$b','$cana','$caid','$si','$pin','$exp','$bna','$acno')";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
		echo"<h3 >PAYMENT COMPLETED</h3>";
		}
		
		
	}



?>
      
  
  <form method="post" action="#">
  <div align="center">
    <table width="351" height="165" border="0" align="center"  style="color:#000">
    <tr>
        <td height="38"><b>Booking ID</b></td>
        
        <td><input  type="text" name="txtbok" id="txtbok" required value="<?php echo $b; ?>"  autocomplete="off" placeholder="characters" /></td>
     </tr><tr>
        <td height="38"><b>User name</b></td>
        
        <td><input  type="text" name="txtusr" id="txtusr" required value="<?php echo $s; ?>"  autocomplete="off" placeholder="characters" /></td>
     </tr>
     
      <tr>
        <td width="130" height="36"><b>Payment Date</b></td>
        <td width="163">
  <input  <?php if($editMode) echo"autofocus";?> type="date" name="txtpdat" id="txtpdat" required value="<?php echo $pdat; ?>" autocomplete="off" placeholder="characters" /></td>
      </tr>
        <tr>
        <td height="38"><b>Advance Payment</b></td>
        <td><input type="text"  name="txtadp" id="txtadp" required  value="<?php echo $adp; ?>"  placeholder="advance"/></td>
      </tr>
 
      
       
      <tr>
        <td height="38"><b>Card Holder Name</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtcana" id="txtcana" required value="<?php echo $cana; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
   
      <tr>
        <td height="38"><b>Card ID</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtcaid" id="txtcaid" required value="<?php echo $caid; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
   
      <tr>
        <td height="38"><b>Pin</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="password" name="txtpin" id="txtpin" required value="<?php echo $pin; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
   
      <tr>
        <td height="38"><b>Expiry Date</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="date" name="txtexp" id="txtexp" required value="<?php echo $exp; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
   
      <tr>
        <td height="38"><b>Bank Name</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtbna" id="txtbna" required value="<?php echo $bna; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
   
      <tr>
        <td height="38"><b>Account NO</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="password" name="txtacno" id="txtacno" required value="<?php echo $acno; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
 <tr>
        <td height="38"><b>Total Amount</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtamt" id="txtamt" required value="<?php echo $amt; ?>" autocomplete="off" placeholder="numbers only" /></td>
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
	 window.location="TRpayment.php";
	 else
	 document.getElementById('selbook').focus(); 
 }
 </script>

