
   <?php
   require("connect.php");
  

   $query="select * from tb_enquiery as e
   join tb_hall as h on h.hid=e.hid
   join tb_audiregi as a on a.aid=e.aid
   join tb_facility as fa on fa.faid=e.faid
      join tb_uregi as u on u.uid=e.uid
	  join tb_function as f on f.fuid=e.fuid
   join tb_decoration as d on d.did=e.did
   join tb_food as fo on fo.foid=e.foid
   ";
   $enq=mysql_query($query) or die ("Quer Error {$query}");
   ?>
   <div class="viewTable">
   <!--FOR CHECKING TABLE IS EMPTY OR NOT. IF EMPTY WE DONT HAVE TO DISPLAY THE TABLE HEADER-->
   <?php
    if(mysql_num_rows($enq)>0)
	{
   ?>
   
   <table  style="color:#FFF" width="54%" border="1" align="center">
  		<tr>
    	
    		<th scope="col">ENQUIRY ID</th>
            
            <th scope="col">FUNCTION DATE</th>
            <th scope="col">FUNCTION TIME</th>
    		<th scope="col">USER</th>
            <th scope="col">AUDITORIUM</th>
  <th scope="col">FACILITIES</th>
  
        	<th scope="col">HALL</th>
            <th scope="col">FUNCTION</th>
  <th scope="col">DECORATION</th>
  
        	<th scope="col">FOOD</th>
        	<th scope="col">STATUS</th>
    
  		</tr>
    
  	<?php
   		while(($en=mysql_fetch_array($enq)))
   		{ $st=$en["estatus"];
	 		echo "<tr>
	       		<td align='center'>$en[0]</td>
	       		
	       		<td align='center'>$en[1]</td>
	       		<td align='center'>$en[2]</td>
	       		<td align='center'>$en[34]</td>
	       		<td align='center'>$en[19]</td>
	       		<td align='center'>$en[27]</td>
				<td align='center'>$en[13]</td>
	       		<td align='center'>$en[36]</td>
	       		<td align='center'>$en[41]</td>
				<td align='center'>$en[47]</td>"?>
		   		<td align='center'>
		   			<a style='color:#FFF' href='ADenqststus.php?eid=<?php echo $en[0];?>'>
				<?php	if($st==1)
                    echo "CONFIRMED";
					else
					echo "NOT CONFIRMED";?></a>&nbsp;&nbsp;
		   		</td>
		   		</tr> <?php   }
  
  ?>  
  </table>
  <?php
	}
	else
		echo "<h4  style='color:#FFF'align='center'>No confirmation Yet!</h4>";
  ?>


</div>
    
   