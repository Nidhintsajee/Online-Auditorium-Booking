<?php
session_start();
session_id("mysession");

?><?php
include("header.php");

?>

   
<?php include("sidebar.php");
 $s=$_SESSION["name"];
 $si=$_SESSION["id"];
 ?>
   
   <H2 align="center" style="color:
   #FFF" >CANCELATION</H2> 
   
   

    
    </div>

 <?php
include("viewcanAD.php");
?>

</div>
  <?php
include("footer.php");
?>

