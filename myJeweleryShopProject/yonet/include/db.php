<?php
$baglan=@mysql_connect("localhost","root","");
if($baglan)
  {
	 // echo "<font color='green'>MySQL'e Baglanti Saglandi.</font><br>";
    $vt__Sec=mysql_select_db("alyans",$baglan);
	if($vt__Sec)
	  {
		// echo "<font color='green'>Veri Tabani Secildi!.</font><br>";
	  }
	else
	  {
		 die("<font color='red'>Veri Tabani Secilemedi!.</font><br>"); 
	  }
   }
else
   {
	   die("<font color='red'>Baglanti Saglanamadi!.</font><br>");
   }
 mysql_query("SET NAMES utf8");
?>