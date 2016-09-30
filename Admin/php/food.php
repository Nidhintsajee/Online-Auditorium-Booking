<?php
include("header.php");

?>

<?php include("sidebar.php");?>

   <H2 align="center" style="color:#FFF" >FOOD REGISTRATION</H2> 
     <?php
	 $foid=NULL;
		$fotid=NULL;
			
		$foit=NULL;
 	
		
if(isset($_GET["foid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$foid=$_GET['foid'];
		$fotid=$_GET["fotid"];
	$aid=$_GET["aid"];
		$foit=$_GET["foitem"];
		
		
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$foit=$_POST['txtfoit'];
					$fotid=$_POST['selfod'];
					$aid=$_POST['selaud'];
		if($caption=="ADD")
		{
			$query="INSERT INTO tb_food(fotid,foitem,aid) VALUES ('$fotid','$foit','$aid')";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
		}
		else if($caption=="UPDATE")
		{
			$query="UPDATE tb_food SET fotid='$fotid',foitem='$foit',aid='$aid'WHERE foid='$foid'";
			mysql_query($query)or die("UPDATING FAILED {$query}");
	 		header("location:food.php");
		}
		
	}



?>
      
  
  <form method="post" action="#">
  <div align="center">
    <table width="242" height="141" border="0" align="center"  style="color:#FFF">
     <tr>
            <td height="38"><b>Auditorium</b></td>
            <td><select name="selaud">
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
	{echo"<option value='$aud[4]'>$aud[0]</option>";
	}}?></select>
            </td></tr>
      <tr>
        <td width="130" height="36"><b>Type</b></td>
        <td width="163">
  <select name="selfod">
            <option value="">not selected</option>
            <?php
		
require("connect.php");
		  $query="select * from tb_fotype";
   $fo=mysql_query($query) or die ("Query Error {$query}");
while(($fod=mysql_fetch_array($fo)))
{
	if($fotid==$fod[0])
	{
	echo"<option value='$fod[0]' selected='selected'  >$fod[1]</option>";	}
	else
	{
	echo"<option value='$fod[0]'>$fod[1]</option>";}
}?></select></td>
      </tr>
      
      
 
       <tr>
        <td height="38"><b>Item</b></td>
        <td width="0" height="2"><textarea   <?php if($editMode) echo"autofocus";?> name="txtfoit" cols="" rows=""><?php echo $foit; ?></textarea></td>

      </tr>
       <tr>
        <td height="43">&nbsp;</td>
        <td align="right"><input type="submit" name="btnAction" id="btnAction" value="<?php echo $caption; ?>" <?php if($editMode)echo "class='updateButton'"; ?> /><input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" /></td>
        
      </tr>
    </table>
    
    </div>
</form>
 <?php include("viewfood.php");?>
</div>
  <?php
include("footer.php");
?>


<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="food.php";
	 else
	 document.getElementById('txtfoit').focus(); 
 }
 </script>

