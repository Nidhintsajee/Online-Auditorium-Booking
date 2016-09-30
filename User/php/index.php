<?php
session_start();
include("TRheader.php");
include("TRsidebar.php");
?>

<h3 style="color:#F60">welcome USER</h3>

<div class="home" style="position:relative" align="justify" >

 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:justify; color:#897448; line-height:20px;">
    <tr>
    
      <td valign="top" style="color:#630">The <b>THOMAS WOLFE</b> International Convention & Exhibition Centre<b> </b>, is the group Company of renowned <b>“NAJMAT BURGAN”</b>  promoted by <b>ShriP.D.Sudheesan</b>,[an NRI and An Industrialist  headquartered in Kuwait, engaged in Chain of Jewelry Outlets and Medical supply.<br />
        <br />
<b>THOMAS WLOFE</b> owned a land spread out in 42 Acres in the prime location of <b> NH-47</b> at Karukutty, Angamally, sharing the boundary wall of both the districts of  <b>ERNAKULAM</b> [the Commercial Capital of Kerala] and <b>THRISSUR</b> [the Cultural Capital of Kerala].  <b>THOMAS WOLFE</b> has steady strategy to develop this complete 42 Acres of Land in different phases with different industries based on Tourism, Hospitality, Medical, Educational etc., within short span of time, which are:-<br />
<br />
<ul style="padding-left : 40px">
<li>Thomas wolfe International Convention & Exhibition Centre  - [started commercial operation]</li>
</ul>
 </td>
      <td width="25">&nbsp;</td>
      <td width="300" valign="top"><span class="banner"></span><img src="Images/download (2).jpg"/></td><td>
      
    <?php
	 
if(isset($_POST['btnlog'])==true)
{
include("connect.php");
$usr=$_POST['txtusr'];
$pwd=$_POST['txtpwd'];
$login=mysql_query("select * from login where username='$usr'and password='$pwd' and userlevel='2'");
if(mysql_num_rows($login)>0)
{

$query="select uid,name from tb_uregi where uname='$usr' and pwd='$pwd'";
$usr1=mysql_query($query);
$del=mysql_fetch_array($usr1);
   	
			$_SESSION["id"]=$del[0];
			
			$_SESSION["name"]=$del[1];
			
	header("location:loghome.php");
}
else
{
echo"<h3 style='color:#f00'> check user name / password!!!</h3>";
}}
?><h1><a href="#"><img src="../Admin/Assets/Images/log in.jpg" alt="insert logo here" name="Insert_logo" width="268" height="188" id="Insert_logo" style="background-color: #8090AB; display:block;" align="middle" /></a></h1>
  
     <form method="post" action="#">
      <table width="242" border="0"  style="color:#C30" bgcolor=" #39F ">
        <tr>
          <td style="color:#F60" bgcolor="" width="85" height="35"><strong>User name</strong></td>
          <td width="147"><label for="txtusr"></label>            <input placeholder="Enter username" type="text" name="txtusr" id="txtusr"  required="required"/>            </td>
          </tr>
        <tr>
          <td style="color:#F60"><strong>Password</strong></td>
          <td><label for="txtpwd"></label>            
          <input type="password" name="txtpwd"placeholder="Enter password"  id="txtpwd"  required="required"/>            </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btnlog" id="btnlog" value="LOGIN" />              <input type="reset" name="btnClear" id="btnClear" value="CANCEL" accesskey="C" onClick=";" />            </td>
          </tr>
      </table>
  </form>  
  </table>
  
</div>

<?php
include("TRfooter.php");

?>