<?php
	require_once 'AdminYonet/dbconfig.php';
?>
<!DOCTYPE html>
<html>
<title>KRAL KOMBİ</title>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
body,h1,h2,h3,h4,h5 {font-family: "Raleway", sans-serif}
.w3-third img{margin-bottom: -6px; opacity: 0.8; cursor: pointer}
.w3-third img:hover{opacity: 1}
a{text-decoration: none;}
.image {
  opacity: 1;
  width: 100%;
  height: auto;
  transition: .5s ease;
  backface-visibility: hidden;
}

.middle {
  transition: .5s ease;
  opacity: 0;
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%);
  -ms-transform: translate(-50%, -50%);
  text-align: center;
}

.w3-quarter:hover .image {
  opacity: 0.3;
}

.w3-quarter:hover .middle {
  opacity: 1;
}

.text {
  background-color: #3db5ed;
  color: white;
  font-size: 16px;
  padding: 16px 32px;
}
</style>
<body class="w3-light-grey w3-content" style="max-width:1200px">

<!-- Sidebar/menu -->
<nav class="w3-sidebar w3-bar-block w3-white w3-animate-left w3-text-grey w3-collapse w3-top w3-center" style="z-index:3;width:300px;font-weight:bold" id="mySidebar"><br>
  <h3 class="w3-padding-24 w3-center">
    <img src="img/6.jpeg"  class="image" style="width:100%;">
  </h3>
  <!-- <a href="javascript:void(0)" onclick="w3_close()" class="w3-bar-item w3-button w3-padding w3-hide-large" style="text-decoration: none">KAPAT</a>
  <a href="#" onclick="w3_close()" class="w3-bar-item w3-button" style="text-decoration: none">ANASAYFA</a>
  <a href="#hakkimizda" onclick="w3_close()" class="w3-bar-item w3-button" style="text-decoration: none">HAKKIMIZDA</a>
  <a href="#iletisim" onclick="w3_close()" class="w3-bar-item w3-button" style="text-decoration: none">İLETİŞİM</a> -->
</nav>

<!-- Top menu on small screens -->
<header class="w3-container w3-top w3-hide-large w3-white w3-xlarge w3-padding-16">
  <span class="w3-left w3-padding">
    KRAL KOMBİ
  </span>
  <a href="javascript:void(0)" class="w3-right w3-button w3-white" onclick="w3_open()" style="text-decoration: none">☰</a>
</header>

<!-- Overlay effect when opening sidebar on small screens -->
<div class="w3-overlay w3-hide-large w3-animate-opacity" onclick="w3_close()" style="cursor:pointer" title="close side menu" id="myOverlay"></div>

<!-- !PAGE CONTENT! -->
<div class="w3-main" style="margin-left:300px">

  <!-- Push down content on small screens -->
  <div class="w3-hide-large" style="margin-top:83px"></div>

  <!-- Photo grid -->
  <div class="w3-row w3-thrid">
    <div class="w3-thrid" style=" margin-right: 0px;">
      <?php
      $stmt = $DB_con->prepare('SELECT userID, userName, userProfession, userPic FROM tbl_users ORDER BY userID DESC');
      $stmt->execute();
      if($stmt->rowCount() > 0) {
        while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
          extract($row);
      ?>
      <div class="w3-quarter" style="position: relative;">
          <img src="AdminYonet/user_images/<?php echo $row['userPic']; ?>"  class="image" onclick="onClick(this)" style="width:100%; border: solid 1px; height:	250px;">
          <div class="middle">
            <div class="text"><?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?> TL</div>
          </div>
      </div>
      <?php
      }
    } else {
    ?>
    <div class="col-xs-12">
      <div class="alert alert-warning">
        <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Resim Yok ...
      </div>
    </div>
    <?php
    }
    ?>
    </div>
  </div>

  <!-- Pagination -->


  <!-- Modal for full size images on click-->
  <div id="modal01" class="w3-modal w3-black" style="padding-top:0" onclick="this.style.display='none'">
    <span class="w3-button w3-black w3-xlarge w3-display-topright">×</span>
    <div class="w3-modal-content w3-animate-zoom w3-center w3-transparent w3-padding-64">
      <img id="img01" class="w3-image">
      <p id="caption"></p>
    </div>
  </div>

  <!-- About section -->
  <!-- <div class="w3-container w3-dark-grey w3-center w3-text-light-grey w3-padding-32" id="hakkimizda">
    <div class="w3-content w3-justify" style="max-width:1100px">

      <p>
        <b><h3>HAKKIMIZDA</h3></b>
        <br><br>
        <h4><b>ŞİRKET PROFİLİMİZ</b></h4>

        <br><br>
        <h4><b>VİZYONUMUZ VE MİSYONUMUZ</b></h4>

      </p>

      <hr class="w3-opacity">
      <div class="w3-row-padding" style="margin:0 -16px">

        <div class="w3-row w3-margin-bottom">
          <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
            <li class="w3-black w3-xlarge w3-padding-32"><b>FAYDALI BİLGİLER</b></li>
            <li class="w3-padding-16">BULUNDUĞUMUZ ORTAMDA GAZ KOKUSU VARSA NE YAPMALIYIZ?</li>
            <li class="w3-padding-16">En yakınınızdan başlayarak gaz vanalarını ve gaz aletlerini kapatın.</li>
            <li class="w3-padding-16">Hiçbir elektriksel donanıma dokunmayın, açmayın veya kapatmayın, fişleri ile oynamayın.</li>
            <li class="w3-padding-16">Kıvılcım riskine karşı cep telefonu ve telsiz kullanmayın.</li>
            <li class="w3-padding-16">Ortamı hemen havalandırın.</li>
            <li class="w3-padding-16">Çakmak veya kibrit kullanmayın, sigaranızı söndürün. Tüm açık ateşleri dumanlı maddeleri, kıvılcım ve ateş oluşturabilecek kaynakları söndürün.</li>
            <li class="w3-padding-16">Hemen hizmet aldığınız gaz dağıtım firmasını arayın.</li>
          </ul>
        </div>

        <div class="w3-row w3-margin-bottom">
          <ul class="w3-ul w3-white w3-center w3-opacity w3-hover-opacity-off">
            <li class="w3-black w3-xlarge w3-padding-32"><b>SIKÇA SORULAN SORULAR</b></li>
            <li class="w3-padding-16">KOMBİNİ ÖMRÜ NE KADARDIR?</li>
            <li class="w3-padding-16">KOMBİM ARIZA YAPTIĞINDA NE YAPMALIYIM?</li>
            <li class="w3-padding-16">EN İYİ ISI VE TASARUFU HANGİ CİHAZDA SAĞLARIM?</li>
            <li class="w3-padding-16">BAKIMLAR NİYE YAPILIR?</li>
            <li class="w3-padding-16">KOMBİ VE RADYATÖR BAKIMININ FAYDALARI NELERDİR?</li>
            <li class="w3-padding-16">KOMBİNİN SUYU KAÇ BAR OLMALIDIR?</li>
            <li class="w3-padding-16">KOMBİYİ 24 SAAT AÇIK TUTMAK TEHLİKELİMİDİR?</li>
            <li class="w3-padding-16">KOMBİLİ BİR EVDE DOĞALGAZ TASARUFU İÇİN KULLANILMAYAN RADYÖTÖRLERİN (PETEKLERİN) KAPATILMASI DOĞRU MUDUR?</li>
            <li class="w3-padding-16">KOMBİ BAKIMINI HER YIL YAPTIRMALI MIYIM?</li>
            <li class="w3-padding-16">RADYATÖR (PETEK) BAKIMINI HER YIL YAPTIRMALI MIYIM?</li>
          </ul>
        </div>

      </div>
    </div>
  </div> -->

  <!-- Contact section -->
  <div class="w3-container w3-padding-large">
    <!-- <b><h4 id="iletisim">İLETİŞİM</h4></b>
    <form action="" target="_blank">
      <div class="w3-section">
        <label>İSİM SOYİSİM: </label>
        <input class="w3-input w3-border" type="text" name="name" required placeholder="İsminizi ve Soyisminizi Giriniz...">
      </div>
      <div class="w3-section">
        <label>E-MAİL: (k***@gmail.com)</label>
        <input class="w3-input w3-border" type="text" name="email" required pattern="[^ @]*@[^ @]*" placeholder="Mail Adresinizi Giriniz...">
      </div>
      <div class="w3-section">
        <label>TELEFON: (5**-***-**-**)</label>
        <input class="w3-input w3-border" type="tel" name="number" required pattern="[0-9]{3}-[0-9]{3}-[0-9]{2}-[0-9]{2}" placeholder="Telefon Numaranızı Giriniz (5**-***-**-**)...">
      </div>
      <div class="w3-section">
        <label>MESAJ: </label>
        <textarea class="form-control" rows="5" id="comment" name="Message" required placeholder="Mesajınızı Giriniz..."></textarea>
      </div>
      <button type="submit" class="w3-button w3-black w3-margin-bottom"><i class="fa fa-paper-plane w3-margin-right"></i>MESAJ GÖNDER</button>
    </form> -->

    <div class="w3-row-padding w3-center w3-padding-24" style="margin:0 -40px">
      <a href="">
      <div class="w3-quarter w3-blue ">
        <p><i class="fa fa-envelope w3-xxlarge w3-text-light-grey "></i></p>
        <p>kralkombi@gmail.com</p>
      </div>
      </a>

      <div class="w3-quarter w3-red">
        <p><i class="fa fa-map-marker w3-xxlarge w3-text-light-grey"></i></p>
        <p>Konum Ekle</p>
      </div>

      <a href="https://api.whatsapp.com/send?phone=+905322553055">
      <div class="w3-quarter w3-dark-grey">
        <p><i class="fa fa-whatsapp w3-xxlarge w3-text-light-grey"></i></p>
        <p>WHATSAPP: 0532 255 30 55</p>
      </div>
      </a>

      <a href="tel:+905322553055">
        <div class="w3-quarter w3-teal">
          <p><i class="fa fa-phone w3-xxlarge w3-text-light-grey"></i></p>
          <p>TEL: 0532 255 30 55</p>
        </div>
      </a>
    </div>
  </div>


  <!-- Footer -->


  <div class="w3-black w3-center" style="padding: 12px; font-size: 13px; margin-top: -40px; margin-right: -7px;">
    Software (Yazılım) & Desing By (Tasarım) <a href="tel:+905465813374" title="Kamil KAPLAN | Freelance Yazılım Uzmanı" rel="external, dofollow" class="n-font" target="_blank"  style="text-decoration:none;"><strong> K K </strong></a>
  </div>

<!-- End page content -->
</div>

<script>
// Script to open and close sidebar
function w3_open() {
    document.getElementById("mySidebar").style.display = "block";
    document.getElementById("myOverlay").style.display = "block";
}

function w3_close() {
    document.getElementById("mySidebar").style.display = "none";
    document.getElementById("myOverlay").style.display = "none";
}

// Modal Image Gallery
function onClick(element) {
  document.getElementById("img01").src = element.src;
  document.getElementById("modal01").style.display = "block";
  var captionText = document.getElementById("caption");
  captionText.innerHTML = element.alt;
}

</script>


</body>
</html>
