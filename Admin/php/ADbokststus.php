<?php
$bid=$_GET["bid"];
  require("connect.php");
  

   $query="update tb_booking set bstatus=1 where bid='$bid'";
   $bok=mysql_query($query);
   header("location:ADbook.php");

?>