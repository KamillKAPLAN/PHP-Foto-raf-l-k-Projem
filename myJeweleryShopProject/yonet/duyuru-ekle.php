<?php include("include/db.php"); ?>
<?php include("include/ust.php"); ?>  
   <h2 style="text-decoration:none;"> DUYURU EKLE </h2>                
   <div id="main">
<?php
if($_POST)
{
  $adsoyad=	$_POST["adsoyad"];  
  $eposta=	$_POST["eposta"];
  $mesaj=	$_POST["mesaj"];
  if(!empty($adsoyad)&&!empty($eposta)&&!empty($mesaj))
  {
	 $ekle=mysql_query("insert into mesajlar(yazan,eposta,mesaj,onay) values('$adsoyad','$eposta','$mesaj',0)"); 
	 if($ekle){ echo "<font color='green'>Veriler Başarıyla Eklendi</font>";
	 header("Refresh:0.8; url=duyuru-ekle.php");}
	 else{ echo '<font color="red">Veriler Eklenemedi'.mysql_error().'</font>';
	 header("Refresh:0.8; url=duyuru-ekle.php");}
  }
  else{ echo "<font color='red'>Boş Alan Bırakmayın..</font>";
  header("Refresh:0.8; url=duyuru-ekle.php");}
}
else{
?>
   <form action="" class="jNice" method="post">                    	
	 <h3>Duyuru Ekle</h3>
      <fieldset style="background-color: #fdfcf6">
        <p><label>Duyuru Adı : </label><input type="text" class="text-long" name="adsoyad" /></p>
        <p><label>E-Posta : </label><input type="text" class="text-long" name="eposta" /></p>
        <p><label>Mesaj : </label><textarea rows="1" cols="1" name="mesaj"></textarea></p>
        <input type="submit" value="Duyuru Ekle" />
       </fieldset>
   </form>
<?php } ?>
<?php include("include/alt.php"); ?>  
