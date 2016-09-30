<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" /> 
	
<style type="text/css">
.container .header a #Insert_logo {
	font-family: Verdana, Geneva, sans-serif;
}
.container .header div a strong {
	font-family: Arial, Helvetica, sans-serif;
}
</style>

<title>Untitled Document</title>
<link href="Css/TRstyle1.css" rel="stylesheet" type="text/css" />
</head>

<body>

<div class="container" >

  <div class="header">

    
    <div class="menu" align="right" style="width:100%">
<ul>
  <li><a href="loghome.php">Home</a></li>
  <li><a href="TRenquiery.php">Enquiry</a>
  <ul>
            
  <li><?php
		
require("connect.php");
		  $query="select * from tb_audiregi";
  
	$audi=mysql_query($query) or die ("Quer Error {$query}");
while(($aud=mysql_fetch_array($audi)))
	{
	echo "";
	}
	
	?>
   
  </li>
   </ul></li>
  <li><a href="TRbooking.php">Booking</a>
  
  </li>
  <li><a href="TRpayment.php">Payment</a></li>
  <li><a href="Usbookpos.php">Postponed</a></li><li><a href="USbookcan.php">Cancel</a></li>
 <li><a href="index.php">Logout</a></li>
  <ul>
     <li><a href="#">cash</a></li>
      <li><a href="#">Credit</a></li>
    </ul>
   

</ul>
</div>  <table width="100%" border="0">
  <tr>
    <td>
<a href="#"><img src="Images/giphy.gif" alt="Insert Logo Here" name="Insert_logo" width="389" height="150" id="Insert_logo" style="background-color: #8090AB; display:block;" /></a></td>
    <td width="65%"><h1 align="left"><b  style="color:#F60  ">AUDITORIUM BOOKING AGENCY</b></h1></td>
  </tr>
  
</table>
       
     <p align="center" style="color:#F60" style="font-size:large"><marquee style="font-size:large">Karukutty Post
Angamaly, Ernakulam District
Kerala – 683 576
E-mail id: thomaswolfe@gmail.com</marquee></p>
      <!-- end .header -->
    </div>
 