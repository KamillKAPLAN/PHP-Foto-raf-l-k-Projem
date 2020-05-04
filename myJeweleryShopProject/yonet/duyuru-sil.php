<?php include("include/db.php"); ?>
<?php include("include/ust.php"); ?>  
   <h2 style="text-decoration:none;"> DUYURU SİL </h2>                
   <div id="main" style="margin-top:7px; margin-right:-10px;">
<?php
$id=$_GET["id"];
$sil=mysql_query("DELETE from mesajlar WHERE id='$id'");
if($sil){ echo '<font color="green">Başarıyla Silindi.</font>'; header("Refresh:0.8; url=duyuru-goster.php");}
else{ echo '<font color="red">Başarısız OLdu.'.mysql_error().'</font>'; header("Refresh:0.8; url=duyuru-goster.php");}
?> 
<?php include("include/alt.php"); ?>  
