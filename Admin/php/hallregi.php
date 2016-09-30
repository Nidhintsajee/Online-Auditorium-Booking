<?php
include("header.php");

?>

<?php include("sidebar.php");?>

   <H2 align="center" style="color:#FFF" >HALL REGISTRATION</H2> 
     <?php
	 $hid=NULL;
		$hna=NULL;
			$cap=NULL;
		$hamt=NULL;
 		$aid=NULL;
		$a=NULL;
if(isset($_GET["hid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$hid=$_GET['hid'];
		$hna=$_GET["hname"];
	
		$cap=$_GET["hcapa"];
		$hamt=$_GET["hamt"];
		
		$aid=$_GET['aid'];
		$a=$_GET["himage"];
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$hna=$_POST['txthna'];
					$cap=$_POST['txtca'];
$hamt=$_POST['txthamt'];
$aid=$_POST['selhall'];
		if($caption=="ADD")
		{
			
		$a=basename($_FILES["img"]["name"]);
$path="my_uploads/".$a;
move_uploaded_file($_FILES["img"]["tmp_name"],$path);
		
$query="INSERT INTO tb_hall(hname,hcapa,hamt,aid,himage) VALUES ('$hna','$cap','$hamt',$aid,'$a')";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
		}
		else if($caption=="UPDATE")
		{
			$query="UPDATE tb_hall SET hname='$hna',hcapa='$cap',hamt='$hamt',aid='$aid'WHERE hid='$hid'";
			mysql_query($query)or die("UPDATING FAILED {$query}");
	 		header("location:hallregi.php");
		}
		
	}



?>
      
  
  <form method="post" action="#" enctype="multipart/form-data">
  <div align="center">
    <table width="242" height="141" border="0"   align="center"  style="color:#FFF">
    <tr>
        <td height="38"><b>Auditorium</b></td>
        <td><select name="selhall">
            <option value="">not selected</option>
            <?php
		
require("connect.php");
		  $query="select * from tb_audiregi";
   $audi=mysql_query($query) or die ("Quer Error {$query}");
while(($aud=mysql_fetch_array($audi)))
{if($aid==$aud[4])
	{
	echo"<option value='$aud[4]' selected='selected'  >$aud[0]</option>";	}
	else
echo"<option value='$aud[4]'>$aud[0]</option>";
}?></select></td>
      </tr>
      <tr>
        <td height="38"><b>Hall</b></td>
        <td width="163">
<input  <?php if($editMode) echo"autofocus";?> type="text" name="txthna" id="txthna" required value="<?php echo $hna; ?>" autocomplete="off" placeholder="characters only" /></td>
      </tr>
      
      <tr>
        <td height="38"><b>Capacity</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtca" id="txtca" required value="<?php echo $cap; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
 
       <tr>
        <td height="38"><b>Amount</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txthamt" id="txthamt" required value="<?php echo $hamt; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
        <tr>
     <td height="38"><b>Image</b></td>
      <td>
      <input name="img" type="file" required id="img" />
</td></tr>  
       <tr>
        <td height="43">&nbsp;</td>
        <td align="right"><input type="submit" name="btnAction" id="btnAction" value="<?php echo $caption; ?>" <?php if($editMode)echo "class='updateButton'"; ?> /><input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" /></td>
        
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
    </div>
</form>
 <?php include("viewhall.php");?>
</div>
  <?php
include("footer.php");
?>

<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="hallregi.php";
	 else
	 document.getElementById('txthna').focus(); 
 }
 </script>

