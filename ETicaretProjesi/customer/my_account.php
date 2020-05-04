<?php
    session_start();
    if(!isset($_SESSION['customer_email'])) {
        echo "<script>window.open('../checkout.php', '_self')</script>";
    } else {

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
                Sepetteki Ürün Fiyatı: <?php total_price(); ?>, Toplam Ürün: <?php items(); ?>
            </a>
        </div>
        <div class="col-md-6">
            <ul class="menu">
                <li>
                    <a href="../customer_register.php">KAYIT OL</a>
                </li>
                <li>
                    <?php
                        if(!isset($_SESSION['customer_email'])) {
                            echo "<a href='../checkout.php'>HESABIM </a>";
                        } else {
                            echo "<a href='my_account.php?my_orders'>HESABIM </a>";
                        }
                    ?>
                </li>
                <li>
                    <a href="../cart.php">SEPATİM</a>
                </li>
                <li>
                    <?php
                        if(!isset($_SESSION['customer_email'])) {
                            echo "<a href='../checkout.php'>GİRİŞ YAP</a>";
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
                    <li>
                        <a href="../index.php">ANASAYFA</a>
                    </li>
                    <li>
                        <a href="../shop.php">MAĞAZA</a>
                    </li>
                    <li  class="active">
                        <?php
                            if(!isset($_SESSION['customer_email'])) {
                                echo "<a href='../checkout.php'>HESABIM </a>";
                            } else {
                                echo "<a href='my_account.php?my_orders'>HESABIM </a>";
                            }
                        ?>
                    </li>
                    <li>
                        <a href="../cart.php">SEPETİM</a>
                    </li>
                    <li>
                        <a href="../contact.php">İLETİŞİM</a>
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
<!-- CONTENT BAŞLANGIÇ -->
<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Anasayfa</a>
                </li>
                <li>Hesabım</li>
            </ul>
        </div>
        <div class="col-md-3">
            <?php
                include("includes/sidebar.php");
            ?>
        </div>
        <div class="col-md-9">
            <div class="box">
                <?php
                    if(isset($_GET['my_orders'])) {
                        include("my_orders.php");
                    }
                    if(isset($_GET['pay_offline'])) {
                        include ("pay_offline.php");
                    }
                    if(isset($_GET['edit_account'])) {
                        include ("edit_account.php");
                    }
                    if(isset($_GET['change_pass'])) {
                        include ("change_pass.php");
                    }
                    if(isset($_GET['delete_account'])) {
                        include('delete_account.php');
                    }
                ?>
            </div>
        </div>
    </div>
</div>
    <?php
        include ("includes/footer.php");
    ?>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php } ?>