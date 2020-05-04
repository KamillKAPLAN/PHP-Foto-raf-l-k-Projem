<?php include("include/ust.php"); ?>
             <ul class="box">
				<li><a href="index.php">Anasayfa</a></li>
				<li><a href="">Slider Ekle</a></li>
				<li><a href="">Albüm  Ekle</a></li>
                <li id="submenu-active"><a href="duyuru-ekle.php">Duyuru Ekle</a></li>
			</ul>
		</div>
		<hr class="noscreen" />
		<div id="content" class="box">
			<h1>Duyuru Ekle<div style="margin-left:950px; font-size:14px; color:red; margin-top:-22px;">
            <a href="../cikis.php">[Çıkış Yap]</a></div></h1>
			<fieldset>
				<legend>Duyuru Ekle</legend>
                <form action="" method="post">
	            <label>Adınız Soyadınız : </label><input type="text" size="40" name="" class="input-text" /><br />
     <label style="margin-left:50px;">E-Posta : </label><input type="text" size="40" name="" class="input-text" style="margin-top:8px;" /><br />
		        <div style="margin-top:2px; margin-left:57px;"><label>Mesajı : </label></div>
                <div style="margin-left:107px; margin-top:-14px;"><textarea cols="45" rows="6" class="input-text"></textarea><br /></div>
				<input type="submit" class="input-submit" value="Kaydet" style="margin-left:340px;" />
                </form>
			</fieldset>
<?php include("include/alt.php"); ?>