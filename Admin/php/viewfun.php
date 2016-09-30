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
   $query="select f.*,a.aname from tb_audiregi as a join tb_function as f on a.aid=f.aid";
   $fun=mysql_query($query) or die ("Quer Error {$query}");
   ?>
   <div class="viewTable">
   <!--FOR CHECKING TABLE IS EMPTY OR NOT. IF EMPTY WE DONT HAVE TO DISPLAY THE TABLE HEADER-->
   <?php
    if(mysql_num_rows($fun)>0)
	{
   ?>
   
   <table  style="color:#FFF" width="54%" border="1" align="center">
  		<tr>
	<th scope="col">FUNCTION ID</th>
    		<th scope="col">FUNCTION</th>
            <th scope="col">AMOUNT</th>
    	
	<th scope="col">AUDITORIUM</th>
        	<th scope="col">ACTIONS</th>
    
  		</tr>
    
  	<?php
   		while(($funs=mysql_fetch_array($fun)))
   		{
	 		echo "<tr>
	       		<td align='center'>$funs[0]</td>
	       		<td align='center'>$funs[1]</td>
	       		<td align='center'>$funs[2]</td>
	       		
	       		<td align='center'>$funs[4]</td>
	       		
		   		<td align='center'>
		   			<a style='color:#FFF' href='function.php?fuid=$funs[0]&funame=$funs[1]&fuamt=$funs[2]&aid=$funs[3]' id='lnkEdit$funs[0]'>EDIT</a>&nbsp;&nbsp;<a style='color:#FFF' href='deletefun.php?fuid=$funs[0]' onclick='return confirmDelete();' id='lnkDel$funs[0]'>DELETE</a>
		   		</td>
		   		</tr> "; 
   }
  
  ?>  
  </table>
  <?php
	}
	else
		echo "<h4 align='center'style='color:#FFF'>No functions Added Yet!</h4>";
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
    
   