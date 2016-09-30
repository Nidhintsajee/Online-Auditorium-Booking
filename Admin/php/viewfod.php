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
   $fod=mysql_query($query) or die ("Quer Error {$query}");
   ?>
   <div class="viewTable">
   <!--FOR CHECKING TABLE IS EMPTY OR NOT. IF EMPTY WE DONT HAVE TO DISPLAY THE TABLE HEADER-->
   <?php
    if(mysql_num_rows($fod)>0)
	{
   ?>
   
   <table  style="color:#FFF" width="54%" border="1" align="center">
  		<tr>
    	
    		<th scope="col">FOOD TYPE ID</th>
           
            <th scope="col">DECORATION NAME </th>
           
    		<th scope="col">DECORATION AMOUNT</th>
           <th scope="col">DECORATION TYPE</th>  

        	<th scope="col">ACTIONS</th>
    
  		</tr>
    
  	<?php
   		while(($deco=mysql_fetch_array($dec)))
   		{
	 		echo "<tr>
	       		<td align='center'>$deco[0]</td>
	       		
	       		<td align='center'>$deco[2]</td>
	       		<td align='center'>$deco[3]</td>
	       		<td align='center'>$deco[5]</td>
	       		
	       		
	       		
		   		<td align='center'>
		   			<a  style='color:#FFF'href='decoration.php?did=$deco[0]&dtid=$deco[1]&dname=$deco[2]&damt=$deco[3]' id='lnkEdit$deco[0]'>EDIT</a>&nbsp;&nbsp;<a style='color:#FFF' href='deletedec.php?did=$deco[0]' onclick='return confirmDelete();' id='lnkDel$deco[0]'>DELETE</a>
		   		</td>
		   		</tr> "; 
   }
  
  ?>  
  </table>
  <?php
	}
	else
		echo "<h4  style='color:#FFF'align='center'>No deorations Added Yet!</h4>";
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
    
   