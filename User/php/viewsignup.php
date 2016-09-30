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
   $query="select * from tb_uregi";
   $usr=mysql_query($query) or die ("Quer Error {$query}");
   ?>
   <div class="viewTable">
   <!--FOR CHECKING TABLE IS EMPTY OR NOT. IF EMPTY WE DONT HAVE TO DISPLAY THE TABLE HEADER-->
   <?php
    if(mysql_num_rows($usr)>0)
	{
   ?>
   
   <table  style="color:#F60" width="54%" border="1" align="center">
  		<tr>
    	
    		<th scope="col">USER ID</th>
            
            <th scope="col">USER NAME</th>
            <th scope="col">PASSWORD</th>
    		<th scope="col">PHONE NO</th>
            <th scope="col">EMAIL ID</th>
  <th scope="col">NAME</th>
        	<th scope="col">ACTIONS</th>
    
  		</tr>
    
  	<?php
   		while(($usrs=mysql_fetch_array($usr)))
   		{
	 		echo "<tr>
	       		<td align='center'>$usrs[0]</td>
	       		
	       		<td align='center'>$usrs[1]</td>
	       		<td align='center'>$usrs[2]</td>
	       		<td align='center'>$usrs[3]</td>
	       		<td align='center'>$usrs[4]</td>
	       		<td align='center'>$usrs[5]</td>
	       		
		   		<td align='center'>
		   			<a style='color:#F60'  href='signup.php?uid=$usrs[0]&uname=$usrs[1]&pwd=$usrs[2]&phno=$usrs[3]&emid=$usrs[4]&name=$usrs[5]' id='lnkEdit$usrs[0]'>EDIT</a>&nbsp;&nbsp;<a style='color:#F60' href='deleteusr.php?uid=$usrs[0]' onclick='return confirmDelete();' id='lnkDel$usrs[0]'>DELETE</a>
		   		</td>
		   		</tr> "; 
   }
  
  ?>  
  </table>
  <?php
	}
	else
		echo "<h4  style='color:#FFF'align='center'>No users Added Yet!</h4>";
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
    
   