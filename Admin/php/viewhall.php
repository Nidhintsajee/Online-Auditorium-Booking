<?php
/*
COMMENTS
~~~~~~~~
Using Indirect GET method to pass user selected cid and cname to courses.php for EDIT/UPDATE
syntax of URL : courses.php?cid=value&cname=value
Using href of <a> tag to pass variables & Values
*/
?>
   <?php
   require("connect.php");
   $query="select h.*,a.aname from tb_audiregi as a join tb_hall as h on a.aid=h.aid";
   $hal=mysql_query($query) or die ("Quer Error {$query}");
   ?>
   <div class="viewTable">
   <!--FOR CHECKING TABLE IS EMPTY OR NOT. IF EMPTY WE DONT HAVE TO DISPLAY THE TABLE HEADER-->
   <?php
    if(mysql_num_rows($hal)>0)
	{
   ?>
   
   <table  style="color:#FFF" width="54%" border="1" align="center">
  		<tr>
    	
    		<th scope="col">HALL ID</th>
            
            <th scope="col">HALL</th>
            <th scope="col">CAPACITY</th>
    		<th scope="col">AMOUNT</th>
             <th scope="col">IMAGE</th> 

            <th scope="col">AUDITORIUM</th>
             
        	<th scope="col">ACTIONS</th>
    
  		</tr>
    
  	<?php
   		while(($hall=mysql_fetch_array($hal)))
   		{
	 		echo "<tr>
	       		<td align='center'>$hall[0]</td>
	       		
	       		<td align='center'>$hall[1]</td>
	       		<td align='center'>$hall[2]</td>
	       		<td align='center'>$hall[3]</td>
	       		<td align='center'><IMG src='my_uploads/$hall[5]' WIDTH='100'HEIGHT='50'/></td>
	       		
				<td align='center'>$hall[6]</td>
	       		
		   		<td align='center'>
		   			<a  style='color:#FFF'href='hallregi.php?hid=$hall[0]&hname=$hall[1]&hcapa=$hall[2]&hamt=$hall[3]&aid=$hall[4]' id='lnkEdit$hall[0]'>EDIT</a>&nbsp;&nbsp;<a style='color:#FFF' href='deletehal.php?hid=$hall[0]' onclick='return confirmDelete();' id='lnkDel$hall[0]'>DELETE</a>
		   		</td>
		   		</tr> "; 
   }
  
  ?>  
  </table>
  <?php
	}
	else
		echo "<h4  style='color:#FFF'align='center'>No HALLS Added Yet!</h4>";
  ?>

<script>
//FOR CONFIRMING DELETE ACTION
function confirmDelete()
{
	
	var decision=confirm('Confirm Your Deletion');
	if(decision==true)
	return true
	else
	return false;
}
//
</script>
</div>
    
   