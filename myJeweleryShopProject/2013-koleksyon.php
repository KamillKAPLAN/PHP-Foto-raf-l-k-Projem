<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>guzelleralyans.com</title>

<!-- CSS -->

<link rel="stylesheet" href="style.css" type="text/css" />
<link rel="stylesheet" href="css/superfish.css" type="text/css" />
<link rel="stylesheet" href="css/prettyPhoto.css" type="text/css" media="screen" />

<script type="text/javascript" src="js/jquery-1.3.2.min.js"></script>
<script type="text/javascript" src="js/ui.core.min.js"></script>
<script type="text/javascript" src="js/ui.tabs.min.js"></script>
<script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
<script type="text/javascript" src="js/superfish.js"></script>
<script type="text/javascript" src="js/cufon-yui.js"></script>

</head>
<body id="sub-page">
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
          <h1><strong style="color:#FFF; font-size:32px; width:-10px; font-family:Arial, Helvetica, sans-serif;">LOGO GELECEK</strong></h1>
        </div>
        <!-- logo END here -->
        <!-- main-nav START here -->
       <div id="main-nav">
          <ul class="sf-menu" style="margin-right:20px;">
            <li><a href="index.php">Anasayfa</a></li>
            <li class="current_page_item"><a href="2013-koleksyon.php">2013 Koleksiyonu</a></li>
            <li><a href="ozel-koleksyon.php">Özel Koleksiyon</a></li>
            <li><a href="contact.php">İletişim</a></li>
            <img src="images/orange/nav-right.png" style="margin-top:0px;" />
          </ul>
        </div>
        <!-- main-nav END here -->
      </div>
      <!-- top END here -->
      <div id="pagename">
        <h2><span>2013 Koleksiyonu</span></h2><img src="images/1.png" style="margin-top:25px; margin-left:-30px;"/>
      </div>
    </div>
  </div>
  <div id="content">
    <div class="container">
   <!-- Başlangıç -->
   <link rel="stylesheet" href="stil/hoverbox.css" type="text/css" />
<ul class="hoverbox" style="margin-left:-40px;">
<?php
	     $dizin="img/2013-koleksyon/";
		 $ac=opendir($dizin);
		 while($dosya=readdir($ac))
		 { 
		   if($dosya != "." && $dosya !="..")
		   {
		    echo "<li><a><img src='img/2013-koleksyon/{$dosya}' alt='' class='resim' /><img src='img/2013-koleksyon/{$dosya}' alt='' class='preview' /></a></li>";
		   }
		 }
		 closedir($ac);
	   ?>

</ul>
     <!-- Bitiş -->
<div style="width:25px; margin-left:-200px;"><img src="images/widget-shadow2.png" /></div>
    </div>
    <!-- container END here -->
  </div>
  <!-- content END here -->
</div>
<div class="asd"></div>
<script type="text/javascript"> Cufon.now(); </script>
<script type="text/javascript" src="js/init_form.js"></script>
</body>
</html>
