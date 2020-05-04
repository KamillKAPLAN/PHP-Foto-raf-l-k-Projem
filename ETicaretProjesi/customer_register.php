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
                    <li>
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
<!-- CONTENT BAŞLANGIÇ -->
<div id="content">
    <div class="container">
        <div class="col-md-12">
            <ul class="breadcrumb">
                <li>
                    <a href="index.php">Anasayfa</a>
                </li>
                <li>Kayıt Ol</li>
            </ul>
        </div>
        <div class="col-md-3">
            <?php
                include("includes/sidebar.php");
            ?>
        </div>
        <div class="col-md-9">
            <div class="box">
                <div class="box-header">
                    <center>
                        <h2>Yeni Bir Müşteri Kaydı Oluştur</h2>
                    </center>
                </div>
                <form action="customer_register.php" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Müşteri İsim</label>
                        <input type="text" class="form-control" name="c_name" required/>
                    </div>
                    <div class="form-group">
                        <label>Müşteri Email</label>
                        <input type="text" class="form-control" name="c_email" required/>
                    </div>
                    <div class="form-group">
                        <label>Müşteri Parola</label>
                        <input type="password" class="form-control" name="c_pass" required/>
                    </div>
                    <div class="form-group">
                        <label>Müşteri Ülke</label>
                        <input type="text" class="form-control" name="c_country" required/>
                    </div>
                    <div class="form-group">
                        <label>Müşteri Şehir</label>
                        <input type="text" class="form-control" name="c_city" required/>
                    </div>
                    <div class="form-group">
                        <label>Müşteri Telefon</label>
                        <input type="text" class="form-control" name="c_contact" required/>
                    </div>
                    <div class="form-group">
                        <label>Müşteri Adres</label>
                        <input type="text" class="form-control" name="c_address" required/>
                    </div>
                    <div class="form-group">
                        <label>Müşteri Resim</label>
                        <input type="file" class="form-control" name="c_image" required/>
                    </div>
                    <div class="text-center">
                        <button type="submit" name="register" class="btn btn-primary">
                            <i class="fa fa-user-md"></i>
                            KAYDOL
                        </button>
                    </div>
                </form>
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

<?php
    if(isset($_POST['register'])) {
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_pass = $_POST['c_pass'];
        $c_country = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact= $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $_FILES['c_image']['tmp_name'];
        $c_ip = getRealUserIP();

        move_uploaded_file($c_image_tmp, "customer/customer_images/$c_image");

        $insert_customer = "insert into customers (customer_name, customer_email, customer_pass, customer_country, customer_city, customer_contact, customer_address, customer_image, customer_ip) 
        values ('$c_name', '$c_email', '$c_pass', '$c_country', '$c_city', '$c_contact', '$c_address', '$c_image', '$c_ip')";

        $run_customer = mysqli_query($con, $insert_customer);
        $sel_cart = "select * from cart where ip_add='$c_ip'";
        $run_cart = mysqli_num_rows($run_cart);

        if($check_cart > 0) {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('Müşteri Kaydı BAŞARILI')</script>";
            echo "<script>window.open('checkout.php','_self')</script>";
        } else {
            $_SESSION['customer_email'] = $c_email;
            echo "<script>alert('Müşteri Kaydı BAŞARILI')</script>";
            echo "<script>window.open('index.php','_self')</script>";
        }
    }



?>