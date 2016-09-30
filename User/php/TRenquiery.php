<?php
include("logheader.php");
?>
<?php include("TRsidebar.php");
?>
   <H2 align="center" style="color:
   #F60" >ENQUIRY</H2> 
    
  

    <table width="100%" border="0" cellspacing="0" cellpadding="0" style="color:#897448; line-height:20px;">
        <tbody>
   <?php     
        $query="select * from tb_audiregi";
   $audi=mysql_query($query) or die ("Quer Error {$query}");
   while(($aud=mysql_fetch_array($audi)))
   		{?>
          <tr>
            <td align="left" valign="top"><span class="banner"><IMG src='../Admin/my_uploads/<?php echo $aud[6];?>' WIDTH='300'HEIGHT='200'/></span></td>
            <td width="20" align="left" valign="top">&nbsp;</td>
            <td align="left" valign="top"><table width="100%" border="0" cellspacing="0" cellpadding="00">
              <tbody>
                <tr >
                  <td height="25" align="left" valign="top" style="font-size:16px; font-family:Arial, Helvetica, sans-serif; font-weight:bold;"><?php echo $aud[0];?></td>
                  </tr>
                <tr bgcolor="#F4E6D9">
                  <td height="1" align="left" valign="top" bgcolor="#eee4cd"></td>
                  </tr>
                <tr>
                  <td height="50" align="left" valign="middle"  >As the name suggests, it&rsquo;s a traditional <?php echo $aud[0];?> style of setting with lots of open space. With its covered roof you can enjoy the benefit of an open air auditorium where the rain gods can&rsquo;s play a spoil sport. </td>
                  </tr>
                <tr bgcolor="#F4E6D9">
                  <td height="1" align="left" valign="top" bgcolor="#eee4cd"></td>
                  </tr>
             
              
                <tr >
                  <td height="10" align="left" valign="top"></td>
                </tr>
                <tr  >
                  <td height="1" align="left" valign="top" ><a href="TRenquieryhal.php?aid=<?php echo $aud[4];?>"><img src="Images/book.jpg" width="90" height="40" border="0" /><span style=" float:right; margin-top:5px;"><a href="viewmore.php?aid=<?php echo $aud[4];?>&ana=<?php echo $aud[0];?>&eid=<?php echo $e;?>"><img src="Images/more1.jpg" name="Image14" width="66" height="21" border="0" id="Image" /></a></span></a></td>
                  <td  align="left" style=" float:right; margin-top:5px;">&nbsp;</td>


                </tr>
                </tbody>
              </table>  </td>
            </tr><?php }?>
          </tbody>
        </table>
  


</div>
  <?php
include("TRfooter.php");
?>



<script>
 function cancel()
 {
	 if(document.getElementById('btnAction').value=="UPDATE")
	 window.location="TRenquiery.php";
	 else
	 document.getElementById('txtusr').focus(); 
 }
 </script>

