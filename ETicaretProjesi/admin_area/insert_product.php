<?php
    if(!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>
<!DOCTYPE html>
<html lang="tr">
<head>
    <meta charset="UTF-8">
    <title>Ürün Ekle </title>

    <script src="https://cloud.tinymce.com/5/tinymce.min.js"></script>
    <script>tinymce.init({ selector:'textarea' });</script>
</head>
<body>
    <div class="row">
        <div class="col-lg-12">
            <ol class="breadcrumb">
                <li class="active">
                    <i class="fa fa-dashboard"></i> Kontrol Paneli / <b> Ürün Ekle </b>
                </li>
            </ol>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">
                        <i class="fa fa-money fa-fw"></i> Ürün Ekle
                    </h3>
                </div>
                <div class="panel-body">
                    <form class="form-horizontal" method="POST" enctype="multipart/form-data">
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ürün Başlığı</label>
                            <div class="col-md-6">
                                <input type="text" name="product_title" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ürün Kategorisi</label>
                            <div class="col-md-6">
                                <select name="product_cat" class="form-control">
                                    <option>Lütfen Bir Tane Kategori Seçiniz...</option>
                                    <?php
                                        $get_product_categories = "select * from product_categories";
                                        $run_product_categories = mysqli_query($con, $get_product_categories);
                                        while($row_product_categories = mysqli_fetch_array($run_product_categories)) {
                                            $product_categori_id = $row_product_categories['p_cat_id'];
                                            $product_categori_title = $row_product_categories['p_cat_title'];
                                            echo "<option value='$product_categori_id'>$product_categori_title</option>";
                                        }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Kategori</label>
                            <div class="col-md-6">
                                <select name="cat" class="form-control">
                                    <option>Bir Kategori Seçiniz...</option>
                                    <?php
                                        $get_categories = "select * from categories";
                                        $run_categories = mysqli_query($con, $get_categories);
                                        while($row_categories = mysqli_fetch_array($run_categories)) {
                                            $categories_id = $row_categories['cat_id'];
                                            $categories_title = $row_categories['cat_title'];
                                            echo "<option value='$categories_id'>$categories_title</option>";
                                        }
                                    ?>
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ürün Resmi 1</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img1" class="form-control" accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ürün Resmi 2</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img2" class="form-control" accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ürün Resmi 3</label>
                            <div class="col-md-6">
                                <input type="file" name="product_img3" class="form-control" accept="image/*" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ürün Fiyatı</label>
                            <div class="col-md-6">
                                <input type="text" name="product_price" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ürün Anahtar Kelimerleri</label>
                            <div class="col-md-6">
                                <input type="text" name="product_keywords" class="form-control" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label">Ürün Açıklaması</label>
                            <div class="col-md-6">
                                <textarea name="product_desc" class="form-control" rows="6" cols="19"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-md-3 control-label"></label>
                            <div class="col-md-6">
                                <input type="submit" name="submit" value="ÜRÜN EKLE" class="btn btn-primary form-control" required>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

</body>
</html>
<?php
    if(isset($_POST['submit'])) {
        $product_title = $_POST['product_title'];
        $product_cat = $_POST['product_cat'];
        $cat = $_POST['cat'];
        $product_price = $_POST['product_price'];
        $product_desc = $_POST['product_desc'];
        $product_keywords = $_POST['product_keywords'];

        $product_img1 = $_FILES['product_img1']['name'];
        $product_img2 = $_FILES['product_img2']['name'];
        $product_img3 = $_FILES['product_img3']['name'];

        $temp_name1 = $_FILES['product_img1']['tmp_name'];
        $temp_name2 = $_FILES['product_img2']['tmp_name'];
        $temp_name3 = $_FILES['product_img3']['tmp_name'];

        move_uploaded_file($temp_name1, "product_images/$product_img1");
        move_uploaded_file($temp_name2, "product_images/$product_img2");
        move_uploaded_file($temp_name3, "product_images/$product_img3");

        $insert_product = "INSERT INTO products (p_cat_id, cat_id, date, product_title, product_img1, product_img2, product_img3, product_price, product_desc, product_keywords) values ('$product_cat', '$cat', NOW(), '$product_title', '$product_img1', '$product_img2', '$product_img3', '$product_price', '$product_desc', '$product_keywords')" ;
        $run_product = mysqli_query($con, $insert_product);

        if($run_product == 0) {
            echo "<script>alert('ÜRÜN EKLEME BAŞARISIZ')</script>";
        } else {
            echo "<script>alert('Ürün ekleme başarılı')</script>";
            echo "<script>window.open('index.php?view_products','_self')</script>";
            echo mysqli_error($con);
        }
    }
?>

<?php } ?>