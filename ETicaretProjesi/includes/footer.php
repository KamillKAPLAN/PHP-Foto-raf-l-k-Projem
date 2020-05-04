<div id="footer">
    <div class="container">
        <div class="row">
            <div class="col-md-3 col-md-6">
                <h4>SAYFALAR</h4>
                <ul>
                    <li><a href="cart.php">SEPETE EKLE</a></li>
                    <li><a href="contact.php">İLETİŞİM</a></li>
                    <li><a href="shop.php">MAĞAZA</a></li>
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>HESABIM </a>";
                            } else {
                                echo "<a href='customer/my_account.php?my_orders'>HESABIM </a>";
                            }
                        ?>
                    </li>
                </ul>
                <hr>
                <h4>KULLANICI BÖLÜMÜ</h4>
                <ul>
                    <li>
                        <?php
                            if(!isset($_SESSION['customer_email'])) {
                                echo "<a href='checkout.php'>GİRİŞ YAP </a>";
                            } else {
                                echo "<a href='customer/my_account.php?my_orders'>HESABIM </a>";
                            }
                        ?>
                    </li>
                    <li><a href="customer_register.php">KAYIT OL</a></li>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>
            <div class="col-md-3 col-md-6">
                <h4>En İyi Ürün Kategorileri</h4>
                <ul>
                    <?php
                        $db = mysqli_connect('localhost', 'root', '', 'eTicaretProjesi');
                        mysqli_query($db, "SET NAMES UTF8");

                        $get_p_cats = "select * from product_categories";
                        $run_p_cats = mysqli_query($db, $get_p_cats);
                        while($row_p_cats = mysqli_fetch_array($run_p_cats)) {
                            $p_cat_id = $row_p_cats['p_cat_id'];
                            $p_cat_title = $row_p_cats['p_cat_title'];
                            echo "<li><a href='shop.php?p_cat=$p_cat_id'>$p_cat_title</a></li>";
                        }
                    ?>
                </ul>
                <hr class="hidden-md hidden-lg hidden-sm">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>Bizi Nereden Bulabilirsiniz.</h4>
                <p>
                    <strong><a href="http://netdeweb.com/">KAMİL KAPLAN</a></strong>
                    <br>
                    <br>+(90)546 581 33 74
                    <br>kamilkaplnn@gmail.com
                    <br>
                    <strong>KAMİL KAPLAN<br>YAZILIM MÜHENDİSLİĞİ</strong>
                </p>
                <a href="contact.php">Bizimle İletişime Geçin</a>
                <hr class="hidden-md hidden-lg">
            </div>
            <div class="col-md-3 col-sm-6">
                <h4>HABERDAR OL</h4>
                <p>İndirimde olan veya firmamıza yeni gelmiş olan ürünlerden haberdar olmak için <b>Formu</b> doldurmanız yeterlidir.</p>
                <form s>
                    <div class="input-group">
                        <input type="text" class="form-control" name="email" pattern="[^ @]*@[^ @]*"required >
                        <span class="input-group-btn">
                            <input type="submit" value="ÜYE OL" class="btn btn-primary">
                        </span>
                    </div>
                </form>
                <hr>
                <h4>İletişimde Kal</h4>
                <p class="social">
                    <a href="#"><i class="fa fa-facebook"></i></a>
                    <a href="#"><i class="fa fa-instagram"></i></a>
                    <a href="#"><i class="fa fa-github"></i></a>
                    <a href="#"><i class="fa fa-medium"></i></a>
                    <a href="#"><i class="fa fa-envelope"></i></a>
                </p>
            </div>
        </div>
    </div>
</div>
<div id="copyright">
    <div class="container">
        <div class="col-md-6">
            <p class="pull-left">
                &copy; 2019 KAMİL KAPLAN
            </p>
        </div>
        <div class="col-md-6">
            <p class="pull-right">
                Template by <a href="http://netdeweb.com/">NETE WEB</a>
            </p>
        </div>
    </div>
</div>