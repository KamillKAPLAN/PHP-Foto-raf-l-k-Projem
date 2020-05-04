<?php include("include/db.php"); ?>
<?php include("include/ust.php"); ?>  
   <h2 style="text-decoration:none;"> DUYURULAR </h2>                
   <div id="main">
<?php

if($_POST)
{
	
}
else{
	
	$bul=mysql_query("select * from mesajlar");//sondan başa  dogru görünür
	$toplam=mysql_num_rows($bul);	
	while($goster=mysql_fetch_array($bul)){
		extract($goster);
	echo "<div class='yazan'>
	       <strong>Duyuru Adı : </strong>{$yazan}<br>
		   <strong>E-Posta : </strong>{$eposta}<br>
		   <strong>Mesaj : </strong>{$mesaj}<br>
	<a href='duyuru-guncelle.php?id={$id}'>[ Bu Mesajı Düzenle ]</a> | <a href='duyuru-sil.php?id={$id}'>[ Bu Mesajı Sil ]</a>
	      </div>";
	};
?>   
<?php } ?>
<?php include("include/alt.php"); ?>  
