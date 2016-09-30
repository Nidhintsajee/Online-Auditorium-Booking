<?php
if(isset($_post["btnlog"])==true)
{
include("connect.php");
$usr=$_post["txtusr"];
$pwd=$_post["txtpwd"];
$login_usr=mysql_query("select userid from login where username='$usr'and password='$pwd'");
if(mysql_num_rows($login_usr)>0)
echo"success";
else
echo"failure";
}
?>