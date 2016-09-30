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
   $query="select * from tb_fotype";
   $fo=mysql_query($query) or die ("Quer Error {$query}");
   ?>
   <div class="viewTable">
   <!--FOR CHECKING TABLE IS EMPTY OR NOT. IF EMPTY WE DONT HAVE TO DISPLAY THE TABLE HEADER-->
   <?php
    if(mysql_num_rows($fo)>0)
	{
   ?>
   
   <table  style="color:#FFF" width="54%" border="1" align="center">
  		<tr>
    	
    		<th scope="col">food type ID</th>
            
            <th scope="col">Type</th>
            <th scope="col">Amount</th>
    		
            <th scope="col">Image</th>
        	<th scope="col">ACTIONS</th>
    
  		</tr>
   
  	<?php
   		while(($fod=mysql_fetch_array($fo)))
   		{
	 		echo "<tr>
	       		<td align='center'>$fod[0]</td>
	       		
	       		<td align='center'>$fod[1]</td>
	       		<td align='center'>$fod[2]</td>
	       	<td align='center'> <IMG src='my_uploads/$fod[3]' WIDTH='100'HEIGHT='50'/></td>
	       	
	       		
	       		
		   		<td align='center'>
		   			<a  style='color:#FFF'href='fodtype.php?fotid=$fod[0]&ftype=$fod[1]&foamt=$fod[2]&foimage=$fod[3]' id='lnkEdit$fod[0]'>EDIT</a>&nbsp;&nbsp;<a style='color:#FFF' href='deletefodty.php?fotid=$fod[0]' onclick='return confirmDelete();' id='lnkDel$fod[0]'>DELETE</a>
		   		</td>
		   		</tr> "; 
   }
  
  ?>  
  </table>
  <?php
	}
	else
		echo "<h4  style='color:#FFF'align='center'>No food types Added Yet!</h4>";
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
    
   