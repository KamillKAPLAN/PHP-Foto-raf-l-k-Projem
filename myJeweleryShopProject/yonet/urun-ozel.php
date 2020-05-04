<?php include("include/db.php"); ?>
<?php include("include/ust.php"); ?>  
   <h2 style="text-decoration:none;"> ÜRÜN-ÖZEL EKLE </h2>                
   <div id="main">

   <form action="yukle-ozel.php" class="jNice" method="post" enctype="multipart/form-data">                    	
	 <h3>Ürün-Özel Ekle</h3>
      <fieldset style="background-color: #fdfcf6;">
        <p><label>Resim : </label><input type="file" class="clear" name="dosya" /></p>
        <input type="submit" value="Ürün Ekle" />
       </fieldset>       
   </form>
 <div class="slider" class="clear">
       <?php
	     $dizin="../img/ozel-koleksiyon/";
		 $ac=opendir($dizin);
		 while($dosya=readdir($ac))
		 { 
		   if($dosya != "." && $dosya !="..")
		   {
		    echo "<li><img src='../img/ozel-koleksiyon/{$dosya}' alt='' class='resim' /></a></li>";
		   }
		 }
		 closedir($ac);
	   ?>
       </div>
<?php include("include/alt.php"); ?>  
