<?php include("include/db.php"); ?>
<?php include("include/ust.php"); ?>  
   <h2 style="text-decoration:none;"> SLİDER EKLE </h2>                
   <div id="main">

   <form action="yukle.php" class="jNice" method="post" enctype="multipart/form-data">                    	
	 <h3>Slider Ekle</h3>
      <fieldset style="background-color: #fdfcf6;">
        <p><label>Resim : </label><input type="file" class="clear" name="dosya" /></p>
        <input type="submit" value="Slider Ekle" />
       </fieldset>       
   </form>
 <div class="slider" class="clear">
       <?php
	     $dizin="../images/slider/";
		 $ac=opendir($dizin);
		 while($dosya=readdir($ac))
		 { 
		   if($dosya != "." && $dosya !="..")
		   {
		    echo "<li><img src='../images/slider/{$dosya}' alt='' class='resim' /></a></li>";
		   }
		 }
		 closedir($ac);
	   ?>
       </div>
<?php include("include/alt.php"); ?>  
