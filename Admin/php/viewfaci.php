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
   $query="select fa.*,a.aname from tb_audiregi as a join tb_facility as fa on a.aid=fa.aid";
   $fac=mysql_query($query) or die ("Quer Error {$query}");
   ?>
   <div class="viewTable">
   <!--FOR CHECKING TABLE IS EMPTY OR NOT. IF EMPTY WE DONT HAVE TO DISPLAY THE TABLE HEADER-->
   <?php
    if(mysql_num_rows($fac)>0)
	{
   ?>
   
   <table  style="color:#FFF" width="54%" border="1" align="center">
  		<tr>
    	
    		<th scope="col">FACILITY ID</th>
           
            <th scope="col">FACILITIES</th>
           
    		<th scope="col">AMOUNT</th>
           <th scope="col">AUDITORIUM</th>  

        	<th scope="col">ACTIONS</th>
    
  		</tr>
    
  	<?php
   		while(($faci=mysql_fetch_array($fac)))
   		{
	 		echo "<tr>
	       		<td align='center'>$faci[0]</td>
	       		
	       		<td align='center'>$faci[2]</td>
	       		<td align='center'>$faci[3]</td>
	       		<td align='center'>$faci[4]</td>
	       		
	       		
	       		
		   		<td align='center'>
		   			<a  style='color:#FFF'href='facilities.php?faid=$faci[0]&aid=$faci[1]&large=$faci[2]&famt=$faci[3]' id='lnkEdit$faci[0]'>EDIT</a>&nbsp;&nbsp;<a style='color:#FFF' href='deletefac.php?faid=$faci[0]' onclick='return confirmDelete();' id='lnkDel$faci[0]'>DELETE</a>
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
    
   