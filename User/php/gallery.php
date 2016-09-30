<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Untitled Document</title>

<link rel="stylesheet" type="text/css" href="testBS/css/style.css"/>
<link rel="stylesheet" href="testBS/css/bootstrap.min.css">
		<script src="testBS/assets/js/jquery.min.js"></script>
        <script src="testBS/assets/js/bootstrap.min.js"></script>
</head>
<?php
include("logheader.php");?>
<body>
<?php
include("TRsidebar.php");
?>
<!--content-->
   <script>
    $('.carousel').carousel({
        interval: 3000
    })
</script>
    <!-- CAROUSEL SLIDER --->    

    <div style="width:800px; height:400px; text-align:center;">
        <div id="carousel-example-generic" class="carousel slide container" data-ride="carousel" style="width: 400px; margin: 0 auto">
            <!-- Indicators -->
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
     
            <!-- Wrapper for slides -->
            <div class="carousel-inner">
                <div class="item active">
                   <img src="../User/auidtoriums/image2.jpg" alt="..." >
                    <div class="carousel-caption">
                      <!--<h3>Caption Text</h3>-->
                    </div>
                 </div>
                <div class="item">
                    <img src="../User/auidtoriums/image3.jpg" alt="...">
                    <div class="carousel-caption">
                      <!--<h3>Caption Text</h3>-->
                    </div>
                </div>
                <div class="item">
                    <img src="../User/auidtoriums/image4.jpg" alt="..." >
                    <div class="carousel-caption">
                      <!--<h3>Caption Text</h3>-->
                    </div>
                </div>
                <div class="item">
                    <img src="../User/auidtoriums/image6.jpg" alt="..." >
                    <div class="carousel-caption">
                      <!--<h3>Caption Text</h3>-->
                    </div>
                </div>
                <div class="item">
                    <img src="../User/auidtoriums/image8.jpg" alt="..." >
                    <div class="carousel-caption">
                      <!--<h3>Caption Text</h3>-->
                    </div>
                </div>
            </div>
     
            <!-- Controls -->
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="glyphicon glyphicon-chevron-left" ></span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="glyphicon glyphicon-chevron-right"></span>
            </a>
            
        </div>
        <!-- /CAROUSEL SLIDER --->
    </div>

	<div class="clearfloat"></div>

</body>
</html>
<?php
include("TRfooter.php");

?>