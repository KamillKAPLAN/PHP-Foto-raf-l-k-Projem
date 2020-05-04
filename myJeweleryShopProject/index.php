<?php include("yonet/include/db.php"); ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>guzelleralyans.com</title>
<!-- CSS -->
<link rel="stylesheet" href="css/reset.css" type="text/css" />
<link rel="stylesheet" href="style.css" type="text/css" />
<!-- This is where you choose your color scheme - Just change the stylesheet name to the color you want. -->
<link rel="stylesheet" href="css/orange.css" type="text/css" />
<!-- You can choose from the following: red, orange, green, blue and violet. -->
<link rel="stylesheet" href="css/superfish.css" type="text/css" />
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />
<link rel="stylesheet" type="text/css" href="css/jquery-ui-1.7.3.custom.css" />
<link rel="stylesheet" href="css/coin-slider-styles.css" type="text/css" />
<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="css/ie7.css">
<![endif]-->
<!-- Scripts -->
<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/jquery.cycle.all.js"></script>
<script type="text/javascript" src="js/jquery.easing.js"></script>
<script type="text/javascript" src="js/jqFancyTransitions.js"></script>
<script type="text/javascript" src="js/coin-slider.js"></script>
<script type="text/javascript" src="js/ui.core.min.js"></script>
<script type="text/javascript" src="js/ui.tabs.min.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>
<script type="text/javascript" src="js/Delicious.font.js"></script>
<script type="text/javascript" src="js/jquery.form.js"></script>
<script type="text/javascript">
	$(document).ready(function() {
		$('#slider').coinslider({ width: 940, height: 330, navigation: true, delay: 5000 });
	});
</script>
<script type="text/javascript" src="js/bluz.js"></script>
</head>
<body id="home-page">
<!-- site-wrapper START here -->
<div id="site-wrapper">
  <!-- header START here -->
  <div id="header">
    <!-- container START here -->
    <div class="container">
      <!-- top START here -->
      <div id="top">
        <!-- logo START here -->
        <div id="logo">
          <h1><strong style="color:#FFF; font-size:40px; width:300px;">LOGO GELECEK</strong></h1>
        </div>
        <!-- logo END here -->
        <!-- main-nav START here -->
        <div id="main-nav">
          <ul class="sf-menu">
            <li class="current_page_item"><a href="index.php">Anasayfa</a></li>
            <li><a href="2013-koleksyon.php">2013 Koleksiyonu</a></li>
            <li><a href="ozel-koleksyon.php">Özel Koleksiyon</a></li>
            <li><a href="contact.php">İletişim</a></li>
          </ul>
        </div>
        <!-- main-nav END here -->
      </div>
      <!-- top END here -->
      <!-- slider-holder START here -->
      <div id="slider-holder">
        <div id="slider">                     
            <?php
	     $dizin="images/slider/";
		 $ac=opendir($dizin);
		 while($dosya=readdir($ac))
		 { 
		   if($dosya != "." && $dosya !="..")
		   {
		    echo "<li><img src='images/slider/{$dosya}' alt=''style='width:960px; height:390px;' /></li>";
		   }
		 }
		 closedir($ac);
	   ?> 
        </div>
      </div>
      <!-- slider-holder END here -->
    </div>
    <!-- container END here -->
  </div>
  <!-- header END here -->
  <!-- content START here -->
  <div id="content">
    <!-- container START here -->
    <div class="container">
      <!-- main-colum START here -->
      <div id="main-colum" class="two_third">
        <!-- Welcome box START here -->
        <div id="welcome-box">
          <h2>Hos Geldiniz <strong>Alyans Magazamıza</strong> !</h2>
          <p>Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...</p>
          <div class="hr"></div>
        </div>
        <div id="features-box">
          <div class="service-box no-margin">
            <div class="inside"> <img src="images/icons/color.png" alt="" />
              <h4>Tasarım Bizim Isimiz</h4>
              <p>Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...</p>
            </div>
          </div>
          <div class="service-box">
            <div class="inside"> <img src="images/icons/target.png" alt="" />
              <h4>Güzen Bizde</h4>
              <p>Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...</p>
            </div>
          </div>   
          <!-- service-box #4 END here -->
        </div>
        <!-- features-box box END here -->
      </div>
      <!-- main-colum END here -->
      <!-- sidebar START here -->
      <div id="sidebar" class="one_third no-margin">
        <ul>
          <!-- widget START here -->
          <li class="widget" id="latest-posts">
            <div class="inside">
              <h3>Duyurular</h3>
   <marquee onMouseOver="this.stop()" onMouseOut="this.start()" direction="up" scrollamount="4"scrolldelay="60" loop="99999">
            <ul>                
               <?php
                  if($_POST)
                         {}
                 else{
	                   $bul=mysql_query("select * from mesajlar");//sondan başa  dogru görünür
	                   $toplam=mysql_num_rows($bul);	
	                   while($goster=mysql_fetch_array($bul)){
		               extract($goster);
	                   echo "<div class='yazan'>
					    <li>
	                      <strong>Duyuru Adı:</strong>{$yazan}<br>
		                  <strong>Mesaj :</strong>{$mesaj}<br>
	                    </li></div>";
	                 };
              ?><?php } ?>
            </ul>
              </marquee>
            </div>
          </li>
           <li class="widget">
            <div class="inside">
              <h3>Yazı Gelecek</h3>
              <blockquote>
                <p>Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...Yazı Gelecek...</p>
                <span class="author">-Tasarım : <a href="yonet/admin/index.php" style="text-decoration:none;">web tasarım</a></span></blockquote>
            </div>
          </li>
          <!-- wi
        </ul>
      </div>
      <!-- sidebar END here -->
    </div>
    <!-- container END here -->
  </div>
  <!-- content END here -->
</div>
<div class="asd"><hr /></div>
<script type="text/javascript"> Cufon.now(); </script>
</body>
</html>
