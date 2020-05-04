<?php
    session_start();
    include("includes/db.php");
    include('functions/functions.php');
?>
<?php
    if(isset($_GET['pro_id'])) {
        $product_id = $_GET['pro_id'];
        $get_product = "select * from products where product_id=$product_id";
        $run_product = mysqli_query($con, $get_product);
        $row_product = mysqli_fetch_array($run_product);

        $p_cat_id = $row_product['p_cat_id'];
        $pro_title = $row_product['product_title'];
        $pro_price = $row_product['product_price'];
        $pro_desc = $row_product['product_desc'];
        $pro_img1 = $row_product['product_img1'];
        $pro_img2 = $row_product['product_img2'];
        $pro_img3 = $row_product['product_img3'];

        $get_p_cat = "select * from product_categories where p_cat_id = '$p_cat_id'";
        $run_p_cat = mysqli_query($con,$get_p_cat);
        $row_p_cat = mysqli_fetch_array($run_p_cat);

        $p_cat_title = $row_p_cat['p_cat_title'];
    }
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
                        <a href="cart.php">SEPATİM</a>
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
                    <li><a href="shop.php?p_cat=<?php echo $p_cat_id; ?>"><?php echo $p_cat_title; ?></a></li>
                    <li><?php echo $pro_title; ?></li>
                </ul>
            </div>
            <div class="col-md-3">
                <?php
                    include("includes/sidebar.php");
                ?>
            </div>
            <div class="col-md-9">
                <div class="row" id="productMain">
                    <div class="col-sm-6">
                        <div id="mainImage">
                            <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
                                    <li data-target="#myCarousel" data-slide-to="1"></li>
                                    <li data-target="#myCarousel" data-slide-to="2"></li>
                                </ol>
                                <div class="carousel-inner">
                                    <div class="item active">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-thumbnail"/>
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-thumbnail"/>
                                        </center>
                                    </div>
                                    <div class="item">
                                        <center>
                                            <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-thumbnail"/>
                                        </center>
                                    </div>
                                </div>
                                <a href="#myCarousel" class="left carousel-control" data-slide="prev">
                                    <span class="glyphicon glyphicon-chevron-left"></span>
                                    <span class="sr-only">Önceki</span>
                                </a>
                                <a href="#myCarousel" class="right carousel-control" data-slide="next">
                                    <span class="glyphicon glyphicon-chevron-right"></span>
                                    <span class="sr-only">Sonraki</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6">
                        <div class="box">
                            <h1 class="text-center"><?php echo $pro_title; ?></h1>
                            <?php add_cart(); ?>
                            <form action="details.php?add_cart=<?php echo $product_id; ?>" method="post" class="form-horizontal">
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Ürün Adedi</label>
                                    <div class="col-md-7">
                                        <select name="product_qty" class="form-control">
                                            <option>Ürün Adedini Seçiniz</option>
                                            <option>1</option>
                                            <option>2</option>
                                            <option>3</option>
                                            <option>4</option>
                                            <option>5</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-5 control-label">Ürün Boyutu</label>
                                    <div class="col-md-7">
                                        <select name="product_size" class="form-control">
                                            <option>Boyut Seçiniz</option>
                                            <option>S</option>
                                            <option>M</option>
                                            <option>L</option>
                                            <option>XL</option>
                                            <option>XXL</option>
                                        </select>
                                    </div>
                                </div>
                                <p class="price"> <?php echo $pro_price; ?> TL </p>
                                <p class="text-center buttons">
                                    <button class="btn btn-primary" type="submit">
                                        <i class="fa fa-shopping-cart"></i> SEPETE EKLE
                                    </button>
                                </p>
                            </form>
                        </div>
                        <div class="row" id="thumbs">
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img1; ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img2; ?>" class="img-responsive">
                                </a>
                            </div>
                            <div class="col-xs-4">
                                <a href="#" class="thumb">
                                    <img src="admin_area/product_images/<?php echo $pro_img3; ?>" class="img-responsive">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="box" id="details">
                    <p>
                        <h4>Ürün Detayları</h4>
                        <p><?php echo $pro_desc; ?></p>
                        <h4>Boyut</h4>
                        <ul>
                            <li>S</li>
                            <li>M</li>
                            <li>L</li>
                            <li>XL</li>
                            <li>XXL</li>
                        </ul>
                    </p>
                    <hr>
                </div>
                <div class="row same-height-row">
                    <div class="col-md-3 col-sm-6">
                        <div class="box same-height headline">
                            <h3 class="text-center">Ayrıca bu ürünlerde vardır.</h3>
                        </div>
                    </div>
                    <?php
                        $get_products = "select * from products order by rand() LIMIT 0,3";
                        $run_products = mysqli_query($con, $get_products);
                        while($row_products = mysqli_fetch_array($run_products)) {
                            $pro_id = $row_products['product_id'];
                            $pro_title = $row_products['product_title'];
                            $pro_price = $row_products['product_price'];
                            $pro_img1 = $row_products['product_img1'];
                            echo "
                                <div class='center-responsive col-md-3 col-sm-6 '>
                                    <div class='product same-height'>
                                        <a href='details.php?pro_id=$pro_id'>
                                            <img src='admin_area/product_images/$pro_img1' class='img-thumbnail'>
                                        </a>
                                        <div class='text'>
                                            <h3><a href='details.php?pro_id=$pro_id'>$pro_title</a></h3>
                                            <p class='price'>$pro_price TL</p>
                                        </div>
                                    </div>
                                </div>
                            ";
                        }
                    ?>
                </div>
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