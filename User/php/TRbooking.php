
<?php
include("logheader.php");

?>

   
<?php include("TRsidebar.php");
session_start();
session_id('mysession');
$s=$_SESSION["name"];
 $si=$_SESSION["id"];
if(isset($_GET["eid"]))
{
$e=$_GET["eid"];
//$bdat=$_GET['bdate'];
}

require("connect.php");
?>
    
   <H2 align="center" style="color:
   #F60" >BOOKING</H2>  <?php
	 $bid=NULL;
		$bdat=NULL;
		$bstat=NULL;
		$tim=NULL;
			$did=NULL;
		$faid=NULL;
		$eid=NULL;
if(isset($_GET["bid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$bid=$_GET['bid'];
		$bdat=$_GET['bdate'];
		$bstat=$_GET['bstatus'];
		$eid=$_GET['eid'];
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}
 
$q=mysql_query("select distinct fo.foitem,h.hname,fu.funame,d.dname,e.bdate,e.timefromto,e.adpay,a.aname,fa.large from tb_enquiery as e 
join tb_food as fo
join tb_hall as h
join tb_function as fu
join tb_decoration as d
join tb_facility as fa
join tb_audiregi as a
on e.foid=fo.foid
and e.hid=h.hid and e.fuid=fu.fuid and e.did = d.did and e.faid=fa.faid and e.aid=a.aid and e.eid=$e and e.uid=$si")or die ("Error in query {$qu}");

$q1=mysql_fetch_array($q);

$foid=$q1[0];
$hid=$q1[1];

$fuid=$q1[2];
$did=$q1[3];
$bdat=$q1[4];
$tim=$q1[5];
$adp=$q1[6];
$aid=$q1[7];
$faid=$q1[8];
	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$bdat=$_POST['txtbdat'];
		$tim=$_POST['txttim'];
					$did=$_POST['seldec'];
$faid=$_POST['selfac'];
$eid=$_POST['txteid'];

		
		if($caption=="ADD")
		{
			$query="INSERT INTO tb_booking(bdate,time,eid,adpay) VALUES ('$bdat','$tim',$e,'$adp')";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
			$b=mysql_insert_id();
					echo"<h3 >BOOKING COMPLETED</h3>";			
header("location:USbook.php?bid=$b&adp=$adp");
		}
		
		
	}



?>
      
  
  <form method="post" action="#">
  <div align="center">
    <table height="204" border="0" align="center"  style="color:#000">
          <tr>
            <td height="38"><b>Enquiry Id </b></td>
            <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txteid" id="txteid" required value="<?php echo $e; ?>" autocomplete="off" placeholder="numbers only" /></td>
          </tr>
      <tr>
        <td height="38"><b>User name</b></td>
        
        <td><input  type="text" name="txtusr" id="txtusr" required value="<?php echo $s; ?>"  autocomplete="off" placeholder="characters" /></td>
     </tr>
      <td height="37" colspan="2" align="left" valign="middle"><b>Auditorium details :<?php echo $aid; ?></b></td>
        </tr>
      <tr>
        <td height="37" align="left" valign="middle"><strong>Food</strong></td>
        <td><input type="text" name="txtfod" id="txtfod" value="<?php echo $foid; ?>" /></td>
      </tr>
      <tr>
    	<td height="37" align="left" valign="middle"><b>Hall</b></td>
    	<td><input type="text" name="txthall" id="txthall" value="<?php echo $hid; ?>" /></td>
  	</tr>
     
        
        
      <tr>
        <td height="37" align="left" valign="middle"><b>Function</b></td>
        <td><input type="text" name="txtfun" id="txtfun" value="<?php echo $fuid; ?>"/></td>
      </tr>
      <tr>
    <td width="74" height="37" align="left" valign="middle"><strong>Decoration</strong></td>
    	<td width="287"><input type="text" name="txtdec" id="txtdec" value="<?php echo $did; ?>" /></td>
        </tr>
      
       <tr>
         <td height="36"><b>Facilities</b></td>
         <td><textarea name="txtarea" id="txtarea" cols="45" rows="5">
         <?php
		 echo $faid;
		 ?>
         </textarea></td>
	  
      <tr>
        <td width="74" height="36"><b>Function Date</b></td>
        <td width="287">
<input  <?php if($editMode) echo"autofocus";?> type="text" name="txtbdat" id="txtbdat" required value="<?php echo $bdat; ?>" autocomplete="off" placeholder="characters" /></td>
      </tr>
      
      <tr>
        <td height="38"><b>Time From Time To</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txttim" id="txttim" required value="<?php echo $tim; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
 <tr>
    	<td height="37" align="left" valign="middle"><B>Advance Payment</B></td>
    	<td><input type="text"  name="txtadp" id="txtadp" required  value="<?php echo $adp; ?>"  placeholder="advance"/></td>
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

