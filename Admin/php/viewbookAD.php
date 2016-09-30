
   <?php
   require("connect.php");
  

   $query="select * from tb_booking  as b
   join tb_enquiery  as e on e.eid=b.eid
   
   ";
   $bok=mysql_query($query) or die ("Quer Error {$query}");
   ?>
   <div class="viewTable">
   <!--FOR CHECKING TABLE IS EMPTY OR NOT. IF EMPTY WE DONT HAVE TO DISPLAY THE TABLE HEADER-->
   <?php
    if(mysql_num_rows($bok)>0)
	{
   ?>
   
   <table  style="color:#FFF" width="54%" border="1" align="center">
  		<tr>
    	
    		<th scope="col">BOOKING ID</th>
            <th scope="col">ENQUIRY ID</th>
            <th scope="col">FUNCTION DATE</th>
            <th scope="col">FUNCTION TIME</th>
               
                <th scope="col">USER</th>
            <th scope="col">AUDITORIUM</th>
               <th scope="col">FUNCTION</th>
               <th scope="col">ADVANCE PAYMENT</th>
        	<th scope="col">STATUS</th>
    
  		</tr>
    
  	<?php
   		while(($bo=mysql_fetch_array($bok)))
   		{$st=$bo["bstatus"];
	 		echo "<tr>
	       		<td align='center'>$bo[0]</td>
	         		<td align='center'>$bo[3]</td> 		
	       		<td align='center'>$bo[1]</td>
	       		<td align='center'>$bo[2]</td>
				";?>
			<?php
				$query='select * from tb_uregi';
   $audi=mysql_query($query) or die ('Quer Error {$query}');
   $aud=mysql_fetch_array($audi);?>
				<td align='center'><?php
				if($aud[0]==$bo[9])
				echo $aud[5] ;?></td>
	       	<?php
				$query='select * from tb_audiregi';
   $audi=mysql_query($query) or die ('Quer Error {$query}');
   $aud=mysql_fetch_array($audi);?>
				<td align='center'><?php
				if($aud[4]==$bo[10])
				echo $aud[0] ;?></td>
                <?php
				$query='select * from tb_function';
   $audi=mysql_query($query) or die ('Quer Error {$query}');
   $aud=mysql_fetch_array($audi);?>
				<td align='center'><?php
				if($aud[0]==$bo[13])
				echo $aud[1] ;?></td><?php echo "<td align='center'>$bo[5]</td>";?>
	       			<td align='center'> 
		   		<a style='color:#FFF' href='ADbokststus.php?bid=<?php echo $bo[0];?>'>
                
				<?php	if($st==1)
                    echo "CONFIRMED";
					else
					echo "NOT CONFIRMED";?></a>&nbsp;&nbsp;
		   		</td>
		   		</tr> 
  <?php   }
  
  ?> 
   
  </table>
  <?php
	}
	else
		echo "<h4  style='color:#FFF'align='center'>No confirmation Yet!</h4>";
  ?>


</div>
    
   