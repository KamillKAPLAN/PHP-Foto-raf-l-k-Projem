<?php include("include/db.php"); ?>
<?php include("include/ust.php"); ?>  
   <h2 style="text-decoration:none;"> ÜRÜN-2013 EKLE </h2>                
   <div id="main">

   <form action="yukle-2013.php" class="jNice" method="post" enctype="multipart/form-data">                    	
	 <h3>Ürün-2013 Ekle</h3>
      <fieldset style="background-color: #fdfcf6;">
        <p><label>Resim : </label><input type="file" class="clear" name="dosya" /></p>
        <input type="submit" value="Ürün Ekle" />
       </fieldset>       
   </form>
 <div class="slider" class="clear">
       <?php
	     $dizin="../img/2013-koleksyon/";
		 $ac=opendir($dizin);
		 while($dosya=readdir($ac))
		 { 
		   if($dosya != "." && $dosya !="..")
		   {
		    echo "<li><img src='../img/2013-koleksyon/{$dosya}' alt='' class='resim' /></a></li>";
		   }
		 }
		 closedir($ac);
	   ?>
       </div>
<?php include("include/alt.php"); ?>  
