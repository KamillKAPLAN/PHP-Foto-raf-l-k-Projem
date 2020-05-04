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
                        <li class="active">
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
                    <li>Magaza</li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                    include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <?php
                    if(!isset($_GET['p_cat'])) {
                        if(!isset($_GET['cat'])) {
                            echo "
                                    <div class='box'>
                                        <h2>Magaza</h2>
                                        <p>Buraya magaza ile ilgili yaı gelecek.</p>
                                    </div>
                                 ";
                        }
                    }
                ?>
                <div class="row">
                    <?php
                        if(!isset($_GET['p_cat'])) {
                            if(!isset($_GET['cat'])) {
                                $per_page = 6;
                                if(isset($_GET['page'])) {
                                    $page = $_GET['page'];
                                } else {
                                    $page = 1;
                                }
                                $start_from = ($page - 1) * $per_page;
                                $get_products = "select * from products order by 1 DESC LIMIT $start_from, $per_page";
                                $run_products = mysqli_query($con, $get_products);
                                while($row_products = mysqli_fetch_array($run_products)) {
                                    $pro_id = $row_products['product_id'];
                                    $pro_title = $row_products['product_title'];
                                    $pro_price = $row_products['product_price'];
                                    $pro_img1 = $row_products['product_img1'];
                                    echo "
                                        <div class='col-md-4 col-sm-6 center-responsive'>
                                            <div class='product'>
                                                <a href='details.php?pro_id=$pro_id'>
                                                    <img src='admin_area/product_images/$pro_img1' class='img-thumbnail'>
                                                </a>
                                                <div class='text'>
                                                    <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                                    <p class='price'>$pro_price TL</p>
                                                    <p class='buttons'>
                                                        <a href='details.php?pro_id=$pro_id' class='btn btn-default'>DETAYI GÖR</a>
                                                        <a href='details.php?pro_id=$pro_id' class='btn btn-primary'>
                                                            <i class='fa fa-plus'></i> SEPETE EKLE
                                                        </a>
                                                    </p>
                                                </div>
                                            </div>
                                        </div>
                                    ";
                                }

                    ?>
                    <!--
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="details.php">
                                <img src="admin_area/product_images/product1.jpg" class="img-thumbnail">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Tişört</a>
                                </h3>
                                <p class="price">50 TL</p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">DETAY GÖR.</a>
                                    <a href='details.php' class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> SEPETE EK
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="details.php">
                                <img src="admin_area/product_images/product1.jpg" class="img-thumbnail">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Tişört</a>
                                </h3>
                                <p class="price">50 TL</p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">DETAY GÖR.</a>
                                    <a href='details.php' class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> SEPETE EK
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="details.php">
                                <img src="admin_area/product_images/product1.jpg" class="img-thumbnail">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Tişört</a>
                                </h3>
                                <p class="price">50 TL</p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">DETAY GÖR.</a>
                                    <a href='details.php' class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> SEPETE EK
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="details.php">
                                <img src="admin_area/product_images/product1.jpg" class="img-thumbnail">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Tişört</a>
                                </h3>
                                <p class="price">50 TL</p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">DETAY GÖR.</a>
                                    <a href='details.php' class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> SEPETE EK
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="details.php">
                                <img src="admin_area/product_images/product1.jpg" class="img-thumbnail">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Tişört</a>
                                </h3>
                                <p class="price">50 TL</p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">DETAY GÖR.</a>
                                    <a href='details.php' class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> SEPETE EK
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 col-sm-6 center-responsive">
                        <div class="product">
                            <a href="details.php">
                                <img src="admin_area/product_images/product1.jpg" class="img-thumbnail">
                            </a>
                            <div class="text">
                                <h3>
                                    <a href="details.php">Tişört</a>
                                </h3>
                                <p class="price">50 TL</p>
                                <p class="buttons">
                                    <a href="details.php" class="btn btn-default">DETAY GÖR.</a>
                                    <a href='details.php' class='btn btn-primary'>
                                        <i class='fa fa-shopping-cart'></i> SEPETE EK
                                    </a>
                                </p>
                            </div>
                        </div>
                    </div>
                    -->
                </div>
                <center>
                    <ul class="pagination">
                        <?php
                                    $query = "select * from products";
                                    $result = mysqli_query($con, $query);
                                    $total_records = mysqli_num_rows($result);
                                    $total_pages = ceil($total_records / $per_page);
                                    echo "<li><a href='shop.php?page=1'>".'İlk Sayfa'."</a></li>";

                                    for($i = 1; $i <= $total_pages; $i++) {
                                        echo "<li><a href='shop.php?page=".$i."'>".$i."</a></li>";
                                    }

                                    echo "<li><a href='shop.php?page=$total_pages'>".'Son Sayfa'."</a></li>";

                                }
                            }
                        ?>
                        <!--
                        <li><a href="shop.php">İlk Sayfa</a></li>
                        <li><a href="shop.php">1</a></li>
                        <li><a href="shop.php">2</a></li>
                        <li><a href="shop.php">3</a></li>
                        <li><a href="shop.php">4</a></li>
                        <li><a href="shop.php">5</a></li>
                        <li><a href="shop.php">Son Sayfa</a></li>
                        -->
                    </ul>
                </center>

                    <?php
                        getPCatPro();
                        getCatPro();
                    ?>

            </div>
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