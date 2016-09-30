<?php
include("TRheader.php");

?>
<?php include("TRsidebar.php");?>

   <H2 align="center" style="color:#F60" >SIGN UP</H2> 
     <?php
	 $uid=NULL;
		$na=NULL;
	
		$una=NULL;
		$pwd=NULL;
		$ph=NULL;
 		$em=NULL;
		$ule=NULL;
if(isset($_GET["uid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$uid=$_GET['uid'];
		$na=$_GET["name"];
	$ule=$_GET["userlevel"];
		$una=$_GET["uname"];
		$pwd=$_GET["pwd"];
		$ph=$_GET["phno"];
 		$em=$_GET["emid"];
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}

	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$na=$_POST['txtna'];
					$una=$_POST['txtusr'];
$pwd=$_POST['txtpwd'];
$ph=$_POST['txtph'];
$em=$_POST['txtema'];
$ule=$_POST['txtusr'];
		if($caption=="ADD")
		{
			$query="INSERT INTO tb_uregi(uname,pwd,phno,emid,name) VALUES ('$una','$pwd',$ph,'$em','$na')";
			mysql_query("INSERT INTO LOGIN(username,password,userlevel) VALUES ('$una','$pwd','2')");
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
			echo"<h3>SIGNUP SUCCESSFUL</h3>";
		}
		
	}



?>
      
  
  <form method="post" action="#">
  <div align="center">
    <table width="351" height="204" border="0" align="center"  style="color:#F60">
      <tr>
        <td width="130" height="36" ><b>Name</b></td>
        <td width="163">
<input  <?php if($editMode) echo"autofocus";?> type="text" name="txtna" id="txtna" required value="<?php echo $na; ?>" autocomplete="off" placeholder="characters" /></td>
      </tr>
      
      <tr>
        <td height="38"><b>Contact number</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtph" id="txtph" required value="<?php echo $ph; ?>" autocomplete="off" placeholder="numbers only" /></td>
      </tr>
      <tr>
          </tr>
       <tr>
        <td height="38"><b>Email</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txtema" id="txtema" required value="<?php echo $em; ?>" autocomplete="off" placeholder="emailid" /></td>
      </tr>
      <tr>
        <td height="38"><b>user name</b></td>
        <td><input placeholder="Enter username" type="text" name="txtusr" id="txtusr" required value="<?php echo $una; ?>" /></td>
      </tr>
      <tr>
        <td height="38"><b>password</b></td>
        <td><input type="password" name="txtpwd"placeholder="Enter password"  id="txtpwd"  required value="<?php echo $pwd; ?>"/></td>
      </tr>
      
      <tr>
        <td height="43">&nbsp;</td>
        <td align="right"><input type="submit" name="btnAction" id="btnAction" value="<?php echo "SUBMIT"; ?>" <?php if($editMode)echo "class='updateButton'"; ?> /><input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" /></td>
        
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
	 window.location="signup.php";
	 else
	 document.getElementById('txtna').focus(); 
 }
 </script>

