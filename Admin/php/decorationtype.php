
 <?php require("header.php");?>
  
 <?php include("sidebar.php");?>
<H2 align="center" style="color:#FFF" >DECORATION TYPE REGISTRATION</H2>   
  
<?php
	$dtid=NULL;
		$type=NULL;
		if(isset($_GET["dtid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$dtid=$_GET['dtid'];
		$type=$_GET["dtype"];
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		
		$type=$_POST['txttyp'];
		if($caption=="ADD")
		{
			$query="INSERT INTO tb_dectype(dtype) VALUES ('$type')";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
		}
		else if($caption=="UPDATE")
		{
			$query="UPDATE tb_dectype SET dtype='$type' WHERE dtid=$dtid";
			mysql_query($query)or die("UPDATING FAILED {$query}");
	 		header("location:decorationtype.php");
		}
		
	}



?>

  <form method="post" action="#">
    <div align="center">
      <table width="242" height="141" border="0"  bgcolor=" #39F " align="center" style="color:#FFF">
      
        <tr>
          <td height="38"><strong>Type</strong></td>
          <td width="158"><label for="txttyp"></label>            <input  <?php if($editMode) echo"autofocus";?> type="text" name="txttyp" id="txttyp" required value="<?php echo $type; ?>" autocomplete="off" placeholder="characters only" />            </td>
          </tr>
           
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btnAction" id="btnAction" value="<?php echo $caption; ?>" <?php if($editMode)echo "class='updateButton'"; ?> />              <input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" />            </td>
          </tr>
      </table>
    </div>
    </form>
    <?php include("viewdectype.php");?>
    <h1>&nbsp;</h1>
    <!-- end .content --></div>

     <?php require("footer.php");?> 



<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="decorationtype.php";
	 else
	 document.getElementById('txttyp').focus(); 
 }
 </script>

