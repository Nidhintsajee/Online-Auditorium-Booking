<?php
$eid=$_GET["eid"];
  require("connect.php");
  

   $query="update tb_enquiery set estatus=1 where eid='$eid'";
   $enq=mysql_query($query);
   header("location:ADenq.php");

?>