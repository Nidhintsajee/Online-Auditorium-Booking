
 <?php require("header.php");?>
  
 <?php include("sidebar.php");?>
<H2 align="center" style="color:#FFF" >AUDITORIUM REGISTRATION</H2>   
  
<?php
	$aid=NULL;
		$ana=NULL;
		$pla=NULL;
		$add=NULL;
 		$con=NULL;
		$own=NULL;
if(isset($_GET["aid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$aid=$_GET['aid'];
		$ana=$_GET["aname"];
		$pla=$_GET["place"];
		$add=$_GET["address"];
 		$con=$_GET["contact"];
		$own=$_GET["owner"];
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		
		$ana=$_POST['txtana'];
$pla=$_POST['txtpla'];
$add=$_POST['txtadd'];
$con=$_POST['txtcon'];
$own=$_POST['txtown'];
$a=$_GET["aimage"];
		if($caption=="ADD")
		{
			$a=basename($_FILES["fileCtrl"]["name"]);
$path="my_uploads/".$a;
move_uploaded_file($_FILES["fileCtrl"]["tmp_name"],$path);
			$query="INSERT INTO tb_audiregi(aname,place,address,contact,owner,aimage) VALUES ('$ana','$pla','$add',$con,'$own','$a')";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
		}
		else if($caption=="UPDATE")
		{
			$query="UPDATE tb_audiregi SET aname='$ana',place='$pla',contact=$con,address='$add',owner='$own' WHERE aid=$aid";
			mysql_query($query)or die("UPDATING FAILED {$query}");
	 	
		}
			header("location:registration.php");
	}



?>

  <form method="post" action="#">
    <div align="center">
      <table width="242" height="141" border="0"  bgcolor=" #39F " align="center"style="color:#FFF">
      <tr>
          
          
          </tr>
        <tr>
          <td  height="38"><strong>Auditorium</strong></td>
          <td width="158"><label for="txtana"></label>            <input  <?php if($editMode) echo"autofocus";?> type="text" name="txtana" id="txtana" required value="<?php echo $ana; ?>" autocomplete="off" placeholder="characters only" />            </td>
          </tr>
        <tr>
          <td height="38"><strong> Place</strong></td>
          <td><label for="txtpla"></label>            
          <input  <?php if($editMode) echo"autofocus";?> type="text" name="txtpla" id="txtpla" required value="<?php echo $pla; ?>" autocomplete="off" placeholder="characters only" />            </td></tr>
          <tr>
              <td height="38"><strong>Address</strong></td>
          <td width="0" height="2"><textarea name="txtadd" cols="" rows=""><?php echo $add;?></textarea></td>
          </tr>
           <tr>
              <td height="38"><strong>Contact</strong></td>
          <td><label for="txtcon"></label>
            <input  <?php if($editMode) echo"autofocus";?> type="text" name="txtcon" id="txtcon" required value="<?php echo $con; ?>" autocomplete="off" placeholder="numbers only" />            </td>
          </tr>
           <tr>
              <td height="38"><strong>Owner</strong></td>
          <td><label for="txtown"></label>
            <input  <?php if($editMode) echo"autofocus";?> type="text" name="txtown" id="txtown" required value="<?php echo $own; ?>" autocomplete="off" placeholder="characters only" />            </td>
          </tr>
          <tr>
     <td height="38"><b>Image</b></td>
      <td>
      <input type="file" name="fileCtrl" required="required" />
</td></tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btnAction" id="btnAction" value="<?php echo $caption; ?>" <?php if($editMode)echo "class='updateButton'"; ?> />              <input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" />            </td>
          </tr>
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
    <?php include("viewauditorium.php");?>
    <h1>&nbsp;</h1>
    <!-- end .content --></div>

     <?php require("footer.php");?> 



<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="registration.php";
	 else
	 document.getElementById('txtana').focus(); 
 }
 </script>

