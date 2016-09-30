 <?php require("header.php");?>


 <?php include("sidebar.php");?>
		
 <H2 align="center" style="color:#FFF" >FUNCTION REGISTRATION</H2>  
<?php
 
 $fid=NULL;
		$fna=NULL;
		$famt=NULL;
		$aid=NULL;
if(isset($_GET["fuid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$fid=$_GET['fuid'];
		$fna=$_GET["funame"];
		$famt=$_GET['fuamt'];

		$aid=$_GET['aid'];


		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		
		$fna=$_POST['txtfna'];
$famt=$_POST['txtfamt'];
$aid=$_POST['selfun'];


		if($caption=="ADD")
		{
		
	$fun_regi="insert into tb_function(funame,fuamt,aid) values('$fna',$famt,$aid)";
mysql_query($fun_regi)or die("ADDING FAILED {$fun_regi}");
;
						$added=true;
		}
		else if($caption=="UPDATE")
		{
			$query="UPDATE tb_function SET funame='$fna',fuamt=$famt,aid='$aid' WHERE fuid=$fid";
			mysql_query($query)or die("UPDATING FAILED {$query}");
	 		header("location:function.php");
		}
		
	}



?>
  <form method="post" action="#">
    <div align="center">
      <table width="242" height="141" border="0"  bgcolor=" #39F "style="color:#FFF">
      <tr>
            <td height="38"><b>Auditorium</b></td>
            <td><select name="selfun">
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
          <td  height="38"><strong>Function</strong></td>
          <td width="158"><label for="txtfna"></label>            <input  <?php if($editMode) echo"autofocus";?> type="text" name="txtfna" id="txtfna" required value="<?php echo $fna; ?>" autocomplete="off" placeholder="characters only" />            </td>
          </tr>
        <tr>
          <td  height="38"><strong>Amount</strong></td>
          <td><label for="txtfamt"></label>            
          <input  <?php if($editMode) echo"autofocus";?> type="text" name="txtfamt" id="txtfamt" required value="<?php echo $famt; ?>" autocomplete="off" placeholder="numbers only" />            </td></tr>
          
          
         
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btnAction" id="btnAction" value="<?php echo $caption; ?>" <?php if($editMode)echo "class='updateButton'"; ?> />              <input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" />            </td>
          </tr>
      </table>
    </div>
    </form>
    <?php include("viewfun.php");?>
    <h1>&nbsp;</h1>
    <!-- end .content --></div>

     <?php require("footer.php");?> 

 
<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="function.php";
	 else
	 document.getElementById('txtfna').focus(); 
 }
 </script>

