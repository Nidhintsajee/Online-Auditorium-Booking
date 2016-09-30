
   <?php
   require("connect.php");
  

   $query="select * from tb_payment as p
   join tb_booking as b on b.bid=p.bid
    join tb_enquiery as e on e.eid=b.eid
   ";
   $pay=mysql_query($query) or die ("Quer Error {$query}");
   ?>
   <div class="viewTable">
   <!--FOR CHECKING TABLE IS EMPTY OR NOT. IF EMPTY WE DONT HAVE TO DISPLAY THE TABLE HEADER-->
   <?php
    if(mysql_num_rows($pay)>0)
	{
   ?>
   
   <table  style="color:#FFF" width="54%" border="1" align="center">
  		<tr>
    	
    		<th scope="col">PAYMENT ID</th>
            
            <th scope="col">PAYMENT DATE</th>
            <th scope="col">AMOUNT</th>
    		<th scope="col">FUNCTION DATE</th>
            <th scope="col">CARD HOLDER NAME</th>
  <th scope="col">CARD ID</th>
  
  <th scope="col">EXPIRY DATE</th>
  
        	<th scope="col">BANK NAME</th>
             	
        	<th scope="col">USER </th>
          
           <th scope="col">AUDITORIUM</th>
               <th scope="col">FUNCTION</th>
    
  		</tr>
    
  	<?php
   		while(($pa=mysql_fetch_array($pay)))
   		{ 
	 		echo "<tr>
	       		<td align='center'>$pa[0]</td>
	       		
	       		<td align='center'>$pa[1]</td>
	       		<td align='center'>$pa[2]</td>
	       		<td align='center'>$pa[12]</td>
	       		<td align='center'>$pa[4]</td>
	       		<td align='center'>$pa[5]</td>
			
	       		<td align='center'>$pa[8]</td>
				<td align='center'>$pa[9]</td>
					"?>
		   		<?php
				$query='select * from tb_uregi';
   $audi=mysql_query($query) or die ('Quer Error {$query}');
   $aud=mysql_fetch_array($audi);?>
				<td align='center'><?php
				if($aud[0]==$pa[6])
				echo $aud[5] ;?></td>
	       	<?php
				$query='select * from tb_audiregi';
   $audi=mysql_query($query) or die ('Quer Error {$query}');
   $aud=mysql_fetch_array($audi);?>
				<td align='center'><?php
				if($aud[4]==$pa[21])
				echo $aud[0] ;?></td>
                <?php
				$query='select * from tb_function';
   $audi=mysql_query($query) or die ('Quer Error {$query}');
   $aud=mysql_fetch_array($audi);?>
				<td align='center'><?php
				if($aud[0]==$pa[24])
				echo $aud[1] ;?></td>
		   		</tr> <?php   }
  
  ?>  
  </table>
  <?php
	}
	else
		echo "<h4  style='color:#FFF'align='center'>No confirmation Yet!</h4>";
  ?>


</div>
    
   