<?php
session_start();
session_id("mysession");

?>
<?php
include("logheader.php");
include("TRsidebar.php");
 $s=$_SESSION["name"];
 
?>


  <h3 style="color:#F60">welcome <?php echo $s;  ?></h3>


<div class="home" style="position:relative" align="justify" >

 <table width="100%" border="0" cellspacing="0" cellpadding="0" style="text-align:justify; color:#897448; line-height:20px;">
    <tr>
<td>
<h1><a href="#"><img src="Images/book_now2.png" alt="insert logo here" name="Insert_logo" width="183" height="188" id="Insert_logo" style="background-color: #8090AB; display:block;" align="middle" /></a></h1>
    </td>    
      <td valign="top" style="color:#630">The <b>THOMAS WOLFE</b> International Convention & Exhibition Centre<b> </b>, is the group Company of renowned <b>“NAJMAT BURGAN”</b>  promoted by <b>ShriP.D.Sudheesan</b>,[an NRI and An Industrialist  headquartered in Kuwait, engaged in Chain of Jewelry Outlets and Medical supply.<br />
        <br />
<b>THOMAS WOLFE</b> owned a land spread out in 42 Acres in the prime location of <b> NH-47</b> at Karukutty, Angamally, sharing the boundary wall of both the districts of  <b>ERNAKULAM</b> [the Commercial Capital of Kerala] and <b>THRISSUR</b> [the Cultural Capital of Kerala].  <b>YHOMAS WOLFE</b> has steady strategy to develop this complete 42 Acres of Land in different phases with different industries based on Tourism, Hospitality, Medical, Educational etc., within short span of time, which are:-<br />
<br />
<ul style="padding-left : 40px">
<li>Thomas International Convention & Exhibition Centre  - [started commercial operation]</li>
</ul>
 </td>
      <td width="25">&nbsp;</td>
      <td width="300" valign="top"><span class="banner"></span><img src="Images/download (2).jpg"/></td>
    </tr>
  </table>
  
</div>

<?php
include("TRfooter.php");

?>