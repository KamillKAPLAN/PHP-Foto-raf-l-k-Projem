<?php
    if(!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('../login.php','_self')</script>";
    } else {
?>
<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
            <span class="sr-only">Toggle Navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="index.php?dashboard">Admin Panel</a>
    </div>
    <ul class="nav navbar-right top-nav ">
        <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                <i class="fa fa-user"></i>
                <?php echo $admin_name; ?> <b class="caret"></b>
            </a>
            <ul class="dropdown-menu">
                <li>
                    <a href="index.php?user_profile=<?php echo $admin_id; ?>">
                        <i class="fa fa-fw fa-user"></i>
                        Profil
                    </a>
                </li>
                <li>
                    <a href="index.php?view_products">
                        <i class="fa fa-fw fa-envelope"></i>
                        Ürünler
                    <span class="badge"><?php echo $count_products; ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_customers">
                        <i class="fa fa-fw fa-gear"></i>
                        Müşteriler
                        <span class="badge"><?php echo $count_customers; ?></span>
                    </a>
                </li>
                <li>
                    <a href="index.php?view_cats">
                        <i class="fa fa-fw fa-gear"></i>
                        Ürün Kategorileri
                        <span class="badge"><?php echo $count_p_categories; ?></span>
                    </a>
                </li>
                <li class="divider"></li>
                <li>
                    <a href="logout.php">
                        <i class="fa fa-fw fa-power-off"></i>
                        Çıkış Yap
                    </a>
                </li>
            </ul>
        </li>
    </ul>
    <div class="collapse navbar-collapse navbar-ex1-collapse">
        <ul class="nav navbar-nav side-nav">
            <li>
                <a href="index.php?dashboard">
                    <i class="fa fa-fw fa-dashboard"></i>
                    Kontrol Paneli
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#products">
                    <i class="fa fa-fw fa-table"></i> Ürünler
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="products" class="collapse">
                    <li>
                        <a href="index.php?insert_product">Ürün Ekle</a>
                    </li>
                    <li>
                        <a href="index.php?view_products">Ürünleri Göster</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#p_cat">
                    <i class="fa fa-fw fa-pencil"></i> Ürünlerin Kategorileri
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="p_cat" class="collapse">
                    <li>
                        <a href="index.php?insert_p_cat">Ürün Kategorisi Ekle</a>
                    </li>
                    <li>
                        <a href="index.php?view_p_cats">Ürün Kategorilerini Görüntüle</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#cat">
                    <i class="fa fa-fw fa-arrows-v"></i>Kategoriler
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="cat" class="collapse">
                    <li>
                        <a href="index.php?insert_cat">Kategori Ekle</a>
                    </li>
                    <li>
                        <a href="index.php?view_cats">Kategorileri Görüntüle</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#slides">
                    <i class="fa fa-fw fa-gear"></i> Slider
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="slides" class="collapse">
                    <li>
                        <a href="index.php?insert_slide">Slider Ekle</a>
                    </li>
                    <li>
                        <a href="index.php?view_slides">Sliderları Görüntüle</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="index.php?view_customers">
                    <i class="fa fa-fw fa-edit"></i> Müşterileri Görüntüle
                </a>
            </li>

            <li>
                <a href="index.php?view_orders">
                    <i class="fa fa-fw fa-list"></i> Siparişleri Görüntüle
                </a>
            </li>

            <li>
                <a href="index.php?view_payments">
                    <i class="fa fa-fw fa-pencil"></i> Ödemeleri Görüntüle
                </a>
            </li>
            <li>
                <a href="#" data-toggle="collapse" data-target="#users">
                    <i class="fa fa-fw fa-gear"></i> Kullanıcılar
                    <i class="fa fa-fw fa-caret-down"></i>
                </a>
                <ul id="users" class="collapse">
                    <li>
                        <a href="index.php?insert_user">Kullanıcı Ekle</a>
                    </li>
                    <li>
                        <a href="index.php?view_users">Kullanıcıları Görüntüle</a>
                    </li>
                    <li>
                        <a href="index.php?user_profile=<?php echo $admin_id; ?>">Kullanıcı Profilini Düzenle</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="logout.php">
                    <i class="fa fa-fw fa-power-off"></i> Çıkış Yap
                </a>
            </li>
        </ul>
    </div>
</nav>
<?php } ?>