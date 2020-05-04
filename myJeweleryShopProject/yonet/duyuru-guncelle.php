<?php include("include/db.php"); ?>
<?php include("include/ust.php"); ?>  
   <h2 style="text-decoration:none;"> DUYURU GÜNCELLE </h2>                
   <div id="main">
<?php
$id=$_GET["id"];
$bul=mysql_query("select * from mesajlar WHERE id='$id'");
$goster=mysql_fetch_array($bul);
extract($goster);
if($_POST)
{
  $adsoyad=$_POST["adsoyad"];  
  $eposta=$_POST["eposta"];
  $mesaj=$_POST["mesaj"];
  $onay=$_POST["onay"];
  $guncelle=mysql_query("Update mesajlar SET yazan='$adsoyad',eposta='$eposta',mesaj='$mesaj',onay='$onay' WHERE id='$id'");
  if($guncelle){echo "<font color='green'>Veriler Başarıyla Güncellendi.</font>";}
  else{echo '<font color="red">Verilerde Bir Sorun Oluştu.<br>'.mysql_error().'</font>'; header("Refresh:0.8; url=duyuru-guncelle.php");}
}
else
  { 
     echo '<form action="" class="jNice" method="post">                    	
	 <h3>Duyuru Güncelle</h3>
      <fieldset  style="background-color:#fdfcf6">
        <p><label>Duyuru Adı : </label><input type="text" class="text-long" name="adsoyad"  value="'.$yazan.'"/></p>
        <p><label>E-Posta : </label><input type="text" class="text-long" name="eposta" value="'.$eposta.'" /></p>
        <p><label>Mesaj : </label><textarea rows="1" cols="1" name="mesaj" >'.$mesaj.'</textarea></p>
		<p><label>Onaylı mı? : </label><select name="onay">
            <option value="1"';
			if($onay==1){ echo 'selected';}
			echo '>Evet</option>
            <option value="0"';
			if($onay==0){ echo 'selected';}
			echo '>Hayır</option>
           </select>
		</p>
        <input type="submit" value="Duyuruyu Güncelle" />
       </fieldset>
   </form>';
  }
?>
<?php include("include/alt.php"); ?>  
