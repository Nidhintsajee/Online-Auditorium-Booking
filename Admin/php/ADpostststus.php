<?php
$bid=$_GET["bid"];
  require("connect.php");
  

   $query="update tb_booking set bstatus=2 where bid='$bid'";
   $post=mysql_query($query);
   header("location:ADpost.php");

?>