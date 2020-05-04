<?php include("../include/db.php"); ?>
<?php include("../include/admin-ust.php") ?>
<?php
session_start();

if($_POST)
{
 $kadi=$_POST["kadi"];
 $sifre=$_POST["sifre"];

  $bul=mysql_query("select  * from uyeler where kadi='$kadi' && sifre='$sifre'");
  $say=mysql_num_rows($bul);
  if($say > 0)
  {
    $goster=mysql_fetch_array($bul);
     $_SESSION["oturum"]=true;
	 $_SESSION["kadi"]=$kadi;
	 $_SESSION["sifre"]=$sifre;
	 $_SESSION["eposta"]=$goster["eposta"];
  }
  else
  {
     echo '<div style=" padding: 10px 0px 10px 10px;"><font color="red" >Giriş Başarısız Oldu </font></div>';
	 header("Refresh:0; url=index.php");
  }
   header("Refresh:0; url=index.php");
}
else{
      if(isset($_SESSION["oturum"]))
	  {
	    header("Refresh:0; url=../index.php");
	  }
          if(!isset($_SESSION["oturum"])){
		  
	echo '<form class="login active" action="" method="post">
			<h3> UYE GIRISI </h3>
			<div>
			<label>Uye Adi : </label><input type="text" name="kadi" />							
			</div>
			<div>
			<label>Parola :</label><input type="password" name="sifre" />
			</div>
			<div class="bottom">
			<input type="submit" value="Giriş Yap"></input>							
			<div class="clear"></div>
			</div>
			</form>';
			}
	}
?>
<?php include("../include/admin-alt.php") ?>