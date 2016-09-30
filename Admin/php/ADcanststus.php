<?php
$bid=$_GET["bid"];
  require("connect.php");
  

   $query="update tb_booking set bstatus=3 where bid='$bid'";
   $can=mysql_query($query);
   header("location:ADcan.php");

?>