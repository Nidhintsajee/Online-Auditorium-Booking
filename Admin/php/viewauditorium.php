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
   $query="select * from tb_audiregi";
   $audi=mysql_query($query) or die ("Quer Error {$query}");
   ?>
   <div class="viewTable">
   <!--FOR CHECKING TABLE IS EMPTY OR NOT. IF EMPTY WE DONT HAVE TO DISPLAY THE TABLE HEADER-->
   <?php
    if(mysql_num_rows($audi)>0)
	{
   ?>
   
   <table  style="color:#FFF" width="54%" border="1" align="center">
  		<tr>
    	
    		<th scope="col">AUDITORIUM</th>
            <th scope="col">PLACE</th>
            <th scope="col">ADDRESS</th>
            <th scope="col">CONTACT</th>
    		<th scope="col">AUDITORIUM ID</th>
    		<th scope="col">OWNER</th>
            <th scope="col">IMAGE</th>
        	<th scope="col">ACTIONS</th>
    
  		</tr>
    
  	<?php
   		while(($aud=mysql_fetch_array($audi)))
   		{
	 		echo "<tr>
	       		<td align='center'>$aud[0]</td>
	       		<td align='center'>$aud[1]</td>
	       		<td align='center'>$aud[2]</td>
	       		<td align='center'>$aud[3]</td>
	       		<td align='center'>$aud[4]</td>
	       		<td align='center'>$aud[5]</td>
	       		<td align='center'> <IMG src='my_uploads/$aud[6]' WIDTH='100'HEIGHT='50'/></td>
	       	
		   		<td align='center'>
		   			<a style='color:#FFF'href='registration.php?aname=$aud[0]&place=$aud[1]&address=$aud[2]&contact=$aud[3]&aid=$aud[4]&owner=$aud[5]&aimage=$aud[6]' id='lnkEdit$aud[4]'>EDIT</a>&nbsp;&nbsp;<a style='color:#FFF' href='deleteauditorium.php?aid=$aud[4]' onclick='return confirmDelete();' id='lnkDel$aud[4]'>DELETE</a>
		   		</td>
		   		</tr> "; 
   }
  
  ?>  
  </table>
  <?php
	}
	else
		echo "<h4  style='color:#FFF'align='center'>No auditoriums Added Yet!</h4>";
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
    
   