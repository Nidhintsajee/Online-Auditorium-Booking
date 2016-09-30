<?php
include("header.php");

?>
<?php include("sidebar.php");?>
   <H2 align="center" style="color:#FFF" >DECORATION  REGISTRATION</H2> 

     <?php
	 $did=NULL;
		$dtid=NULL;
		$aid=NULL;
			$dname=NULL;
		$damt=NULL;
		$a=NULL;
 		
if(isset($_GET["did"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$did=$_GET['did'];
		$aid=$_GET['aid'];
		
		$dname=$_GET["dname"];
	
		$dtid=$_GET['dtid'];
		$damt=$_GET["damt"];
		
		$a=$_GET["dtimage"];
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$dname=$_POST['txtdec'];
					
$damt=$_POST['txtdamt'];
$dtid=$_POST['seldecty'];
$aid=$_POST['selaud'];
		if($caption=="ADD")
		{
			$a=basename($_FILES["fileCtrl"]["name"]);
$path="my_uploads/".$a;
move_uploaded_file($_FILES["fileCtrl"]["tmp_name"],$path);
		
		
			$query="INSERT INTO tb_decoration(dtid,dname,damt,dtimage,aid) VALUES ($dtid,'$dname','$damt','$a',$aid)";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
		}
		else if($caption=="UPDATE")
		{
			$query="UPDATE tb_decoration SET dname='$dname',damt='$damt',dtid='$dtid',aid='$aid'WHERE did='$did'";
			mysql_query($query)or die("UPDATING FAILED {$query}");
	 		header("location:decoration.php");
		}
		
	}



?>
      
  
  <form method="post" action="#" enctype="multipart/form-data">
  <div align="center">
    <table width="351" height="204" border="0" align="center"  style="color:#FFF">
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
        <td height="38"><b>Type</b></td>
        <td><select name="seldecty">
            <option value="">not selected</option>
            <?php
		
require("connect.php");
		  $query="select * from tb_dectype";
   $dec=mysql_query($query) or die ("Quer Error {$query}");
while(($deco=mysql_fetch_array($dec)))
{
	
	if($dtid==$deco[0])
	{
	echo"<option value='$deco[0]' selected='selected'  >$deco[1]</option>";	}
	else
	{
	echo"<option value='$deco[0]'>$deco[1]</option>";
	}}?></select></td>
      </tr>
      <tr>
        <td width="130" height="36"><b>Decorations</b></td>
        <td width="163">
        <textarea name="txtdec" cols="" rows=""><?php echo $dname;?></textarea>
</td>
      </tr>
      
      <tr>
        <td height="38"><b>Amount</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtdamt" id="txtdamt" required value="<?php echo $damt; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
 
     
          
     <tr>
     <td height="38"><b>Image</b></td>
      <td>
      <input type="file" name="fileCtrl" required />
</td></tr>
       <tr>
        <td height="43">&nbsp;</td>
        <td align="right"><input type="submit" name="btnAction" id="btnAction" value="<?php echo $caption; ?>" <?php if($editMode)echo "class='updateButton'"; ?> /><input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" /></td>
        
      </tr>
      
      <td></td>
    </table>
    
    </div>


</form>

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
 <?php include("viewdec.php");?>
</div>
  <?php
include("footer.php");
?>

<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="decoration.php";
	 else
	 document.getElementById('txtdna').focus(); 
 }
 </script>

