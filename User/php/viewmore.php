<?php
include("logheader.php");

?>

   
<?php include("TRsidebar.php");?>
  <?php
$aid=$_GET["aid"];
$ana=$_GET["ana"];
$e=$_GET["eid"];
 require("connect.php");
echo" <h1 align='center' style='color:#960' > $ana Auditorium</h1>";
 ?>
 
 
 <?php
   $query="select * from tb_hall where aid='$aid'";
   $hall=mysql_query($query) or die ("Quer Error {$query}");?>
   <table  border="0"style="color:#F60" width="54%" border="1" align="center">
  		  <tr><td><h1> Hall Details</h1></td><hr />
    	 
            </tr>
            <tr>
            <?php
	
	while(($hal=mysql_fetch_array($hall)))
   		{
	 		echo "
			
	       		<td align='center'><a href='#'><IMG src='../Admin/my_uploads/$hal[5]' WIDTH='300' HEIGHT='150'/></a>
				<br><h4>Hall Name:$hal[1]&nbsp;&nbsp;&nbsp;&nbsp;Capacity:$hal[2]<br>
				Amount:$hal[3]
</h4>
				</td>
	       
					";
					}
	       		
?></tr>
<tr><td><hr /><h1>Function Details</h1>
</td></tr><tr><?php
$query="select * from tb_function where aid='$aid'";
   $func=mysql_query($query) or die ("Quer Error {$query}");?>
   
  		
        
            <?php
	while(($fun=mysql_fetch_array($func)))
   		{
	 		echo "<td>
	       		<h4>Function Name:$fun[1]&nbsp;&nbsp;&nbsp;&nbsp;
				Amount:$fun[2]
</h4></td>
	       		
				
		   		";}
	       		
?></tr>
<tr><td><hr /><h1>Food Details</h1>
</td></tr><tr>
<?php
$query="select * from tb_food where aid='$aid'";
   $fod=mysql_query($query) or die ("Quer Error {$query}");?>
   
  		
        
            <?php
	while(($fo=mysql_fetch_array($fod)))
   		{$query='select * from tb_fotype';
   $audi=mysql_query($query) or die ('Quer Error {$query}');
  while( $aud=mysql_fetch_array($audi))
	 	{
			if($aud[0]==$fo[1])
			{echo "<td>
	      <a href='#'><IMG src='../Admin/my_uploads/$aud[3]' WIDTH='300' HEIGHT='150'/></a><br>
				 <h4>Food Type:$aud[1] &nbsp;&nbsp;&nbsp;&nbsp;Food Amount:$aud[2] &nbsp;&nbsp;&nbsp;&nbsp;<br>Food Items:$fo[2]
</h4></td>
				
		   		";}}}
	       		
?></tr><tr><td><hr /><h1>Facility Details</h1>
</td></tr><tr>
<?php
$query="select * from  tb_facility  where aid='$aid'";
   $faci=mysql_query($query) or die ("Quer Error {$query}");?>
   
  		
       
            <?php
	while(($fac=mysql_fetch_array($faci)))
   		{
	 		echo "
	       		<td>
	       		<h4>Facilities:$fac[2]&nbsp;&nbsp;&nbsp;&nbsp;Amount:$fac[3]
</h4></td>
	       		
	       		
	       		";}
	       		
?></tr><tr><td><hr /><h1>Decoration Details</h1>
</td></tr><tr><?php
$query="select * from   tb_decoration   where aid='$aid'";
   $deco=mysql_query($query) or die ("Quer Error {$query}");?>
   
  	
            <?php
	while(($dec=mysql_fetch_array($deco)))
   		{
	 		echo "
	       		
	       		<td align='center'><a href='#'><IMG src='../Admin/my_uploads/$dec[4]' WIDTH='300' HEIGHT='150'/></a>
				&nbsp;&nbsp;&nbsp;&nbsp;<h4>Decorations:$dec[2]<br>
				Amount:$dec[3]
</h4>
				</td>
	       		
	       		
	       		
	       	   		</tr>";}
					?>
                   
	       		

 <?php echo "<tr> <td align='center'>
					 
		   			<a  style='color:#FFF'href='TRenquieryhal.php?eid=$e' ><img src='../User/Images/book.jpg' width='90' height='40' border='0' /></a>
		   	</td></tr></table>";
include("TRfooter.php");
?>
