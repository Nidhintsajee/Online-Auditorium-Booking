<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<link rel = "stylesheet" href="Assets/Css/style1.css" />
<!-- TemplateBeginEditable name="doctitle" -->
<title>Untitled Document</title>
<!-- TemplateEndEditable -->
<!-- TemplateBeginEditable name="head" -->
<!-- TemplateEndEditable -->
<style type="text/css">
.container .header a #Insert_logo {
	font-family: Verdana, Geneva, sans-serif;
}
.container .header div a strong {
	font-family: Arial, Helvetica, sans-serif;
}
</style>
</head>
 
<body>

<div class="container">
  <div class="header">
    <div align="center">
      <h1><a href="#"><img src="Assets/Images/log in.jpg" alt="insert logo here" name="Insert_logo" width="268" height="188" id="Insert_logo" style="background-color: #8090AB; display:block;" align="middle" /><b style="color:#039" > AUDITORIUM BOOKING AGENCY</b></a></h1>
  
    </div>
  </div>
     
    <?php
if(isset($_POST['btnlog'])==true)
{
include("connect.php");
$usr=$_POST['txtusr'];
$pwd=$_POST['txtpwd'];
$login_usr=mysql_query("select userid from login where username='$usr'and password='$pwd'");
if(mysql_num_rows($login_usr)>0)
header("location:home.php");
else
echo"<h3 style='color:#f00'> check user name / password!!!</h3>";
}
?>
  <div class="content">
  <form method="post" action="#">
    <div align="center">
      <table width="242" border="0"  style="color:#C30" bgcolor=" #39F ">
        <tr>
          <td style="color:#FFF" bgcolor="" width="68" height="35"><strong>User name</strong></td>
          <td width="158"><label for="txtusr"></label>            <input placeholder="Enter username" type="text" name="txtusr" id="txtusr"  required="required"/>            </td>
          </tr>
        <tr>
          <td style="color:#FFF"><strong>Password</strong></td>
          <td><label for="txtpwd"></label>            
          <input type="password" name="txtpwd"placeholder="Enter password"  id="txtpwd"  required="required"/>            </td>
          </tr>
        <tr>
          <td>&nbsp;</td>
          <td><input type="submit" name="btnlog" id="btnlog" value="LOGIN" />              <input type="reset" name="btnClear" id="btnClear" value="CANCEL" accesskey="C" onClick=";" />            </td>
          </tr>
      </table>
    </div>
    </form>
    <h1>&nbsp;</h1>
    <!-- end .content --></div>
  <div class="footer">
    <p align="center"><strong>copy right&copy; <?php echo date("Y")?></strong></p>
    <p align="center">&nbsp;</p>

<p align="center"><marquee>www.thomaswolfe.com</marquee></p>  
<!-- end .footer --></div>
  <!-- end .container --></div>

</body>
</html>

