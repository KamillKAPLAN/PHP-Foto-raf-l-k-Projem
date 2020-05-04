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
                    <li class="active">
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
                <li>Sepetim</li>
            </ul>
        </div>
        <div class="col-md-9" id="cart">
            <div class="box">
                <form action="cart.php" method="post" enctype="multipart/form-data">
                    <h1>Alışveriş Sepetim</h1>
                    <?php
                        $ip_add = getRealUserIP();
                        $select_cart = "select * from cart where ip_add='$ip_add'";
                        $run_cart = mysqli_query($con, $select_cart);
                        $count = mysqli_num_rows($run_cart);
                    ?>
                    <p class="text-muted">Şuanda sepetinizde <?php echo $count; ?> ürün var.</p>
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th colspan="2">Ürün Adı</th>
                                    <th>Miktar</th>
                                    <th>Birim Fiyatı</th>
                                    <th>Boyut</th>
                                    <th colspan="1">Delete</th>
                                    <th colspan="2">Toplam Ürün</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                        $total = 0;
                                        while($row_cart = mysqli_fetch_array($run_cart)) {
                                            $pro_id = $row_cart['p_id'];
                                            $pro_size = $row_cart['size'];
                                            $pro_qty = $row_cart['qty'];
                                            $get_products = "select * from products where product_id='$pro_id'";
                                            $run_products = mysqli_query($con, $get_products);
                                            while($row_products = mysqli_fetch_array($run_products)) {
                                                $product_title = $row_products['product_title'];
                                                $product_img1 = $row_products['product_img1'];
                                                $only_price = $row_products['product_price'];
                                                $sub_total = $row_products['product_price'] * $pro_qty;
                                                $total += $sub_total;
                                ?>
                                <tr>
                                    <td>
                                        <img src="admin_area/product_images/<?php echo $product_img1; ?>">
                                    </td>
                                    <td>
                                        <a href="#"><?php echo $product_title; ?></a>
                                    </td>
                                    <td>
                                        <?php echo $pro_qty; ?>
                                    </td>
                                    <td>
                                        <?php echo $only_price; ?> TL
                                    </td>
                                    <td>
                                        <?php echo $pro_size; ?>
                                    </td>
                                    <td>
                                        <input type="checkbox" name="remove[]" value="<?php echo $pro_id; ?>"/>
                                    </td>
                                    <td>
                                        <?php echo $sub_total; ?> TL
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5"><h3>Toplam</h3></th>
                                    <th colspan="2"><h2><?php echo $total; ?> TL</h2></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                    <div class="box-footer">
                        <div class="pull-left">
                            <a href="index.php" class="btn btn-default">
                                <i class="fa fa-chevron-circle-left"></i>
                                Alışverişe Devam Et
                            </a>
                        </div>
                        <div class="pull-right">
                            <button class="btn btn-default" type="submit" name="update" value="Sepeti Güncelle">
                                <i class="fa fa-refresh"> Sepeti Güncelle</i>
                            </button>
                            <a href="checkout.php" class="btn btn-primary">
                                Alışverişi Tamamla
                                <i class="fa fa-chevron-right"></i>
                            </a>
                        </div>
                    </div>
                </form>
            </div>
            <?php
                function update_cart() {
                    global $con;
                    if(isset($_POST['update'])) {
                        foreach($_POST['remove'] as $remove_id) {
                            $delete_product = "delete from cart where p_id='$remove_id'";
                            $run_delete = mysqli_query($con, $delete_product);
                            if($run_delete) {
                                echo "<script>window.open('cart.php', '_self')</script>";
                            }
                        }
                    }
                }
                echo @$up_cart = update_cart();
            ?>
            <div class="row same-height-row">
                <div class="col-md-3 col-sm-6">
                    <div class="box same-height headline">
                        <h3 class="text-center">Ayrıca bu ürünlerde vardır.</h3>
                    </div>
                </div>
                <?php
                    $get_products = "select * from products order by rand() LIMIT 0,3";
                    $run_products = mysqli_query($con,$get_products);
                    while($row_products = mysqli_fetch_array($run_products)) {
                        $pro_id = $row_products['product_id'];
                        $pro_title = $row_products['product_title'];
                        $pro_price = $row_products['product_price'];
                        $pro_img1 = $row_products['product_img1'];
                        echo "
                            <div class='center-responsive col-md-3 col-sm-6'>
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
        <div class="col-md-3">
            <div class="box" id="order-summary">
                <div class="box-header">
                    <h3>Sipariş Özeti</h3>
                </div>
                <p class="text-muted">
                    Nakliye ve ek masraflar girdiğiniz değerlere göre hesaplanır.
                </p>
                <div class="table-responsive">
                    <table class="table">
                        <tbody>
                            <tr>
                                <td>Sipariş Ara Tutarı</td>
                                <th><?php echo $total; ?> TL</th>
                            </tr>
                            <tr>
                                <td>Kargo Bedeli</td>
                                <th>0.0 TL</th>
                            </tr>
                            <tr>
                                <td>KDV Bedeli</td>
                                <th>0.0 TL</th>
                            </tr>
                            <tr class="total">
                                <td>Toplam</td>
                                <th><?php echo $total; ?> TL</th>
                            </tr>
                        </tbody>
                    </table>
                </div>
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