<?php
    session_start();
    include("includes/db.php");
    include('functions/functions.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="s">
<head>
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Yenilikçi Çok Satıcılı E-Ticaret Sitesi</title>
    <link href="http://fonts.googleapis.com/css?family=Roboto:400,500,700,300,100" rel="stylesheet" >
    <link href="styles/bootstrap.min.css" rel="stylesheet">
    <link href="styles/style.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet">
</head>
<body>
    <div id="top">
        <div class="container">
            <div class="col-md-6 offer">
                <a href="#" class="btn btn-success btn-sm">
                    <?php
                    if(!isset($_SESSION['customer_email'])) {
                        echo "HoşGeldiniz : Misafir";
                    } else {
                        echo "HoşGeldiniz : " . $_SESSION['customer_email'] . "";
                    }
                    ?>
                </a><br>
                <a href="#">
                    Sepetteki Ürün Fiyatı: <?php total_price(); ?> TL, Toplam Ürün: <?php items(); ?>
                </a>
            </div>
            <div class="col-md-6">
                <ul class="menu">
                    <li>
                        <a href="customer_register.php">KAYIT OL</a>
                    </li>
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>HESABIM </a>";
                            } else {
                                echo "<a href='customer/my_account.php?my_orders'>HESABIM </a>";
                            }
                        ?>
                    </li>
                    <li>
                        <a href="cart.php">SEPETİM</a>
                    </li>
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>GİRİŞ YAP</a>";
                            } else {
                                echo "<a href='logout.php'>ÇIKIŞ YAP</a>";
                            }
                        ?>
                    </li>
                </ul>
            </div>
        </div>
    </div>
    <!-- NAVBAR BAŞLANGIÇ -->
    <div class="navbar navbar-default" id="navbar">
        <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand home" href="index.php">
                    <img src="images/logo.png" alt="E-Ticaret LOGO" class="hidden-xs">
                    <img src="images/logo_small.png" alt="E-Ticaret LOGO" class="visible-xs">
                </a>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation">
                    <span class="sr-only">Toggle Navigation</span>
                    <i class="fa fa-align-justify"></i>
                </button>
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#search">
                    <span class="sr-only">Toggle Search</span>
                    <i class="fa fa-search"></i>
                </button>
            </div>
            <div class="navbar-collapse collapse" id="navigation">
                <div class="padding-nav">
                    <ul class="nav navbar-nav navbar-left">
                        <li class="active">
                            <a href="index.php">ANASAYFA</a>
                        </li>
                        <li>
                            <a href="shop.php">MAĞAZA</a>
                        </li>
                        <li>
                            <?php
                                if(!isset($_SESSION['customer_email'])) {
                                    echo "<a href='checkout.php'>HESABIM </a>";
                                } else {
                                    echo "<a href='customer/my_account.php?my_orders'>HESABIM </a>";
                                }
                            ?>
                        </li>
                        <li>
                            <a href="cart.php">SEPETİM</a>
                        </li>
                        <li>
                            <a href="contact.php">İLETİŞİM</a>
                        </li>
                    </ul>
                </div>
                <a class="btn btn-primary navbar-btn right" href="cart.php">
                    <i class="fa fa-shopping-cart"></i>
                    <span>Sepette <?php items(); ?> ürün var.</span>
                </a>
                <div class="navbar-collapse collapse right">
                    <button class="btn navbar-btn btn-primary" type="button" data-toggle="collapse" data-target="#search">
                        <span class="sr-only">Toggle Search</span>
                        <i class="fa fa-search"></i>
                    </button>
                </div>
                <div class="collapse clearfix" id="search">
                    <form class="navbar-form" method="get" action="results.php">
                        <div class="input-group">
                            <input class="form-control" type="text" placeholder="Search" name="user_query" required>
                            <span class="input-group-btn">
                                <button type="submit" value="Search" name="search" class="btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </span>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- SLİDER BAŞLANGIÇ -->
    <div class="container" id="slider">
        <div class="col-md-12">
            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                <ol class="carousel-indicators">
                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                    <li data-target="#myCarousel" data-slide-to="1" ></li>
                    <li data-target="#myCarousel" data-slide-to="2" ></li>
                    <li data-target="#myCarousel" data-slide-to="3" ></li>
                    <li data-target="#myCarousel" data-slide-to="4" ></li>
                </ol>
                <div class="carousel-inner">
                    <?php
                        $get_slides = "select * from slider LIMIT 0,1";
                        $run_slides = mysqli_query($con, $get_slides);
                        while($row_slides = mysqli_fetch_array($run_slides)) {
                            $slide_name = $row_slides['slide_name'];
                            $slide_image = $row_slides['slide_image'];
                            echo "
                            <div class='item active'>
                                <img src='admin_area/slides_images/$slide_image'>
                            </div>
                            ";
                        }
                    ?>
                    <?php
                    $get_slides = "select * from slider LIMIT 1,3";
                    $run_slides = mysqli_query($con, $get_slides);
                    while($row_slides = mysqli_fetch_array($run_slides)) {
                        $slide_name = $row_slides['slide_name'];
                        $slide_image = $row_slides['slide_image'];
                        echo "
                            <div class='item'>
                                <img src='admin_area/slides_images/$slide_image'>
                            </div>
                            ";
                    }
                    ?>
                    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                        <span class="glyphicon glyphicon-chevron-left"></span>
                        <span class="sr-only">Previous</span>
                    </a>
                    <a class="right carousel-control" href="#myCarousel" data-slide="next">
                        <span class="glyphicon glyphicon-chevron-right"></span>
                        <span class="sr-only">Next</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- AVANTAJLAR BAŞLANGIÇ -->
    <div id="advantages">
        <div class="container">
            <div class="same-height-row">
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-heart"></i>
                        </div>
                        <h3><a href="#">BİZ MÜŞTERİLERİMİZİ SEVİYORUZ</a></h3>
                        <p>Mümkün olan en iyi hizmeti sağladığımız bilinmektedir.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-tags"></i>
                        </div>
                        <h3><a href="#">EN İYİ FİYATLAR</a></h3>
                        <p>Diğer tüm sitelerdeki fiyatları kontrol edebilir ve bizimle kıyaslayabilirsiniz.</p>
                    </div>
                </div>
                <div class="col-sm-4">
                    <div class="box same-height">
                        <div class="icon">
                            <i class="fa fa-thumbs-up"></i>
                        </div>
                        <h3><a href="#">BİZDEN% 100 MEMNUNİYET GARANTİSİ</a></h3>
                        <p>3 ay boyunca her şeyde ücretsiz iade.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- HAFTALIK ÜRÜN BAŞLIK BAŞLANGIÇ -->
    <div id ="hot">
        <div class="box">
            <div class="container">
                <div class="col-md-12">
                    <h2>HAFTANIN SON ÜRÜNLERİ</h2>
                </div>
            </div>
        </div>
    </div>
    <!-- HAFTALIK ÜRÜN BAŞLANGIÇ -->
    <div id="content" class="container">
        <div class="row">
            <?php
                getPro();
            ?>
        </div>
    </div>
    <!-- FOOTER BAŞLANGIÇ -->
    <?php
        include ("includes/footer.php");
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
