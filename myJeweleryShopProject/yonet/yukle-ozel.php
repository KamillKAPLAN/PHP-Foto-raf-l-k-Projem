<?php include("include/db.php"); ?>
<?php include("include/ust.php"); ?>
   <h2 style="text-decoration:none;"> ÜRÜN-2013 KOLEKSİYONU YUKLE </h2>                
   <div id="main" style="margin-top:7px; margin-right:-10px; margin-bottom:70px;">
   <h3>Ürün 2013 Koleksyon Yukle</h3>
<?php
//slider yukle
$maxBoyut=500000;
$dosyaUzantisi=substr($_FILES["dosya"]["name"],-4,4);
$dosyaAdi=rand(0,99999999).$dosyaUzantisi;
$dosyaYolu="../img/ozel-koleksiyonn/".$dosyaAdi;

 if($_FILES["dosya"]["size"] >  $maxBoyut)
  {echo "Dosya boyutu en fazla<b>500kb</b> olabilir...";  header("Refresh:0.8; url=urun-ekle.php");}
     else
       { 
         $d=$_FILES["dosya"]["type"];
	        if($d=="image/jpeg" || $d=="image/png" || $d=="image/gif")
	           {  
	             if(is_uploaded_file($_FILES["dosya"]["tmp_name"]))
		            {
			          $tasi=move_uploaded_file($_FILES["dosya"]["tmp_name"],$dosyaYolu);
			               if($tasi)
			                  {
								 echo "<b>{$dosyaAdi}</b> adli dosya basariyla yuklendi!!";
								 header("Refresh:0.8; url=urun-ekle.php");
							  }
							   header("Refresh:0.8; url=urun-ekle.php");
		            }		
	             else
	                { echo "Dosya tasinirken bir sorun olustu!!";  header("Refresh:0.8; url=urun-ekle.php");}
					 header("Refresh:0.8; url=urun-ekle.php");
	  }
    
	else{ echo "Dosya formati <b>GIF,PNG ya da JPG</b> formatinda olmalidir!!";  header("Refresh:0.8; url=urun-ekle.php"); }
   header("Refresh:0.8; url=urun-ekle.php");
  }
?>
<?php include("include/alt.php"); ?>  