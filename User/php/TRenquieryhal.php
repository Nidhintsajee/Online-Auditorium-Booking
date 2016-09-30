<?php
session_start();
session_id("mysession");
?>
<?php
include("logheader.php");

?>

   
<?php include("TRsidebar.php");
 $s=$_SESSION["name"];
 $si=$_SESSION["id"];?>
    
   <H2 align="center" style="color:#F60" >ENQUIRY</H2> 
   
    <?php
	 $eid=NULL;
		$bdat=NULL;
		$tmft=NULL;
		
 		$faid=NULL;
		$hid=NULL;
		$fuid=NULL;
 		$did=NULL;
		$foid=NULL;
		$adp=NULL;
if(isset($_GET["eid"])==true )
	{
		$caption="UPDATE";
		$editMode=true;
		$eid=$_GET['eid'];
		$bdat=$_GET["bdate"];
		$tmft=$_GET["timefromto"];
		$faid=$_GET['faid'];
		$aid=$_GET['aid'];
		$hid=$_GET['hid'];
		$fuid=$_GET['fuid'];
		$did=$_GET['did'];
		$foid=$_GET['foid'];
		$est=$_GET['estatus'];
		$adp=$_GET['adpay'];
		}
	else
	{
		$caption="ADD";
    	$editMode=false;
	}
	if(isset($_POST["btnAction"]))
	{
		require("connect.php");
		$bdat=$_POST['txtbdat'];
		$tmft=$_POST['txttmft'];
		$adp=$_POST['txtadp'];
$faid=$_POST['selfac'];
		$hid=$_POST['selhall'];
$aid=$_POST['selaud'];
$fuid=$_POST['selfun'];
		$did=$_POST['seldec'];
$foid=$_POST['selfod'];
		if($caption=="ADD")
		{
			$query="INSERT INTO tb_enquiery(bdate,timefromto,uid,aid,faid,hid,fuid,did,foid,adpay) VALUES ('$bdat','$tmft','$si','$aid','$faid','$hid','$fuid','$did','$foid','$adp')";
			mysql_query($query) or die("ADDING FAILED {$query}");
			$added=true;
			echo"<h3 >ENQUIERY COMPLETED</h3>";
		}
			$e=mysql_insert_id();
header("location:USenq.php?eid=$e&bdate=$bdat");
			
		
	}



?>
      
      
  
<div align="center">  <form method="post" action="#">
    <table width="351" height="204" border="0" align="center"  style="color:#000">
     <tr>
        <td height="38"><b>User name</b></td>
        
        <td><input  type="text" name="txtusr" id="txtusr" required value="<?php echo $s; ?>"  autocomplete="off" placeholder="characters" /></td>
     </tr>
          <tr>
        <td height="38"><b>Auditorium</b></td>
        <td>
        <select name="selaud" required onchange="setfac(this.value); sethall(this.value); setfun(this.value); setdec(this.value); setfod(this.value); ">
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
	}
}?></select></td></tr>
<tr>
        <td height="38"><b>Facilities    &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;Amount</b></td>
        <td><select name="selfac" class="selfac" onchange="setfacval(this.value);" onfocus="setshow(this.value);">
            <option value="">not selected</option>
        </select><input type="text" name="faamt" value="" id="faamt" /></td>
      </tr>
 


      
      <tr>
        <td height="38"><b>Hall&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; &nbsp;Amount</b></td>
        <td><select name="selhall"class="selhall" id="selhall" onchange="sethallval(this.value);" onfocus="setshow(this.value);">
            <option value="">not selected</option>
            </select><input type="text" name="hamt" value="" id="hamt" /></td>
      </tr>
       <tr>
        <td height="38"><b>Function&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;Amount</b></td>
        <td><select name="selfun"class="selfun"onchange="setfunval(this.value);" onfocus="setshow(this.value);">
            <option value="">not selected</option>
            </select></select><input type="text" name="fuamt" value="" id="fuamt" /></td>
      </tr>
      <tr>
        <td height="38"><b>Decoration&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;Amount</b></td>
        <td><select name="seldec"class="seldec"onchange="setdecval(this.value);" onfocus="setshow(this.value);">
            <option value="">not selected</option>
            </select><input type="text" name="damt" value="" id="damt" /></td>
      </tr><tr>
        <td height="38"><b>Food&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;  &nbsp;Amount</b></td>
        <td><select name="selfod"class="selfod"onchange="setfoodval(this.value);" onfocus="setshow(this.value);">
            <option value="">not selected</option>
            </select><input type="text" name="foamt" value="" id="foamt"  /></td>
      </tr>
      <tr>
        <td width="130" height="36"><b>Function Date</b></td>
        <td width="163">
<input  <?php if($editMode) echo"autofocus";?> type="date" name="txtbdat" id="txtbdat" required value="<?php echo $bdat; ?>" autocomplete="off" placeholder="characters" /></td>
      </tr>
      
      <tr>
        <td height="38"><b>Function Time From Time To</b></td>
        <td><input  <?php if($editMode) echo"autofocus";?> type="text" name="txttmft" id="txttmft" required value="<?php echo $tmft; ?>" autocomplete="off" placeholder="numbers only" onchange="tot();"/></td>
      </tr>
 	<tr>
    	<td height="37" align="left" valign="middle"><B>Advance Payment</B></td>
    	<td><input type="text"  name="txtadp" id="txtadp" required  value=""  placeholder="advance"  /></td>
  	</tr>
    
     
       <tr>
        <td height="43">&nbsp;</td>
        <td align="right"><input type="submit" name="btnAction" id="btnAction" value="<?php echo 'SUBMIT'; ?>" <?php if($editMode)echo "class='updateButton'"; ?> /><input type="reset" name="btnClear" id="btnClear" value="CLEAR" accesskey="C" onClick="cancel();" /></td>
        
      </tr>
    </table>
    
    </div>
</form>
  <?php
include("TRfooter.php");
?>


<script src="JS/jquery-2.1.4.min.js" type="text/javascript"></script>
<script type="text/javascript">
document.getElementById('faamt').style.visibility="hidden";
function setfacval(val)
{
	var faid=val;
	var dataString="faid="+faid;
	
	$.ajax
	({
		type:"POST",
		url:"facamt_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
			document.getElementById('faamt').style.visibility="visible";
			//alert(output);
			//$(".hamt").html(output);
			document.getElementById("faamt").value=output;
		}
	});
	
}
</script>


<script type="text/javascript">
document.getElementById('hamt').style.visibility="hidden";
function sethallval(val)
{
	var hid=val;
	var dataString="hid="+hid;
	
	$.ajax
	({
		type:"POST",
		url:"hallamt_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
			document.getElementById('hamt').style.visibility="visible";
			//alert(output);
			//$(".hamt").html(output);
			document.getElementById("hamt").value=output;
		}
	});
	
}
</script>

<script type="text/javascript">
document.getElementById('fuamt').style.visibility="hidden";
function setfunval(val)
{
	var fuid=val;
	var dataString="fuid="+fuid;
	
	$.ajax
	({
		type:"POST",
		url:"funamt_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
			document.getElementById('fuamt').style.visibility="visible";
			//alert(output);
			//$(".hamt").html(output);
			document.getElementById("fuamt").value=output;
		}
	});
	
}
</script>




<script type="text/javascript">
document.getElementById('damt').style.visibility="hidden";
function setdecval(val)
{
	var did=val;
	var dataString="did="+did;
	
	$.ajax
	({
		type:"POST",
		url:"decamt_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
			document.getElementById('damt').style.visibility="visible";
			//alert(output);
			//$(".hamt").html(output);
			document.getElementById("damt").value=output;
		}
	});
	
}
</script>


<script type="text/javascript">
document.getElementById('foamt').style.visibility="hidden";
function setfoodval(val)
{
	var fotid=val;
	var dataString="fotid="+fotid;
	
	$.ajax
	({
		type:"POST",
		url:"fodamt_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
			document.getElementById('foamt').style.visibility="visible";
			//alert(output);
			//$(".hamt").html(output);
			document.getElementById("foamt").value=output;
		}
	});
	
}
</script>











<script type="text/javascript">
function tot()
{
	
	var id1=$("#faamt").val();
	var id2=$("#hamt").val();
	var id3=$("#fuamt").val();
	var id4=$("#damt").val();
	var id5=$("#foamt").val();
	var dataString="faamt="+id1+"&hamt="+id2+"&fuamt="+id3+"&damt="+id4+"&foamt="+id5;
	//alert(id1);
	//alert(output);
	$.ajax
	({
		type:"POST",
		url:"total_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
		//alert(output);
			document.getElementById("txtadp").value=output;
			
		}
	});
	
}
</script>





<script type="text/javascript">
function setfac(val)
{
	var aid=val;
	var dataString="aid="+aid;
	//alert(aid);
	$.ajax
	({
		type:"POST",
		url:"facility_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
			$(".selfac").html(output);
		}
	});
	
}
</script>




<script type="text/javascript">
function sethall(val)
{
	var aid=val;
	var dataString="aid="+aid;
	//alert(aid);
	$.ajax
	({
		type:"POST",
		url:"hall_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
			$(".selhall").html(output);
		}
	});
	
}
</script>
<script type="text/javascript">
function setfun(val)
{
	var aid=val;
	var dataString="aid="+aid;
	//alert(aid);
	$.ajax
	({
		type:"POST",
		url:"fun_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
			$(".selfun").html(output);
		}
	});
	
}
</script>

<script type="text/javascript">
function setdec(val)
{
	var aid=val;
	var dataString="aid="+aid;
	//alert(aid);
	$.ajax
	({
		type:"POST",
		url:"dec_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
			$(".seldec").html(output);
		}
	});
	
}
</script>

<script type="text/javascript">
function setfod(val)
{
	var aid=val;
	var dataString="aid="+aid;
	//alert(aid);
	$.ajax
	({
		type:"POST",
		url:"fod_for_ajax.php",
		data: dataString,
		cache:false,
		success:function(output)
		{
			$(".selfod").html(output);
		}
	});
	
}
</script>
<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="TRenquiery.php";
	 else
	 document.getElementById('selusr').focus(); 
 }
 </script>

