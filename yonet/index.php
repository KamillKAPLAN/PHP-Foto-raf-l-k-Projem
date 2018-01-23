<?php include("include/db.php"); ?>
<?php include("include/ust.php"); ?>
<?php
session_start();

if($_POST)
{
 $kadi=$_POST["kadi"];
 $sifre=$_POST["sifre"];

  $bul=mysql_query("select  * from uye where kadi='$kadi' && sifre='$sifre'");
  $say=mysql_num_rows($bul);
  if($say > 0)
  {
    $goster=mysql_fetch_array($bul);
     $_SESSION["oturum"]=true;
	 $_SESSION["kadi"]=$kadi;
	 $_SESSION["sifre"]=$sifre;
  }
  else
  {
     echo '<div style=" padding: 10px 0px 10px 10px;"><font color="red" >Giriş Başarısız Oldu </font></div>';
	 header("Refresh:0; url=index.php");
  }
   header("Refresh:0; url=admin-sayfa/index.php");
}
else{
      if(isset($_SESSION["oturum"]))
	  {
	    header("Refresh:0; url=admin-sayfa/index.php");
	  }
          if(!isset($_SESSION["oturum"])){
		  
	echo '<form action="" method="post">
                <div class="inputcontainer">
                    <label for="username">Username:</label>
                    <input type="text"   name="kadi"/>
                </div>
                <div class="inputcontainer">
                   
                    <label for="password">Password:</label>
                    <input type="password" name="sifre" />
                </div>
                <input type="submit" value="Üye Girişi" class="loginsubmit" />
            </form>';
			}
	}
?>
<?php include("include/alt.php"); ?>