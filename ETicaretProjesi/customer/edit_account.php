<?php
    $customer_session = $_SESSION['customer_email'];
    $get_customer = "select * from customers where customer_email='$customer_session'";
    $run_customer = mysqli_query($con, $get_customer);
    $row_customer = mysqli_fetch_array($run_customer);
    $customer_id = $row_customer['customer_id'];
    $customer_name = $row_customer['customer_name'];
    $customer_email = $row_customer['customer_email'];
    $customer_country = $row_customer['customer_country'];
    $customer_city = $row_customer['customer_city'];
    $customer_contact = $row_customer['customer_contact'];
    $customer_address = $row_customer['customer_address'];
    $customer_image = $row_customer['customer_image'];

?>
<h1 align="center" > Hesabı Düzenle</h1>
<form action="" method="post" enctype="multipart/form-data" ><!--- form Starts -->
    <div class="form-group" ><!-- form-group Starts -->
        <label>Müşteri Adı: </label>
        <input type="text" name="c_name" class="form-control" required value="<?php echo $customer_name; ?>">
    </div><!-- form-group Ends -->
    <div class="form-group" ><!-- form-group Starts -->
        <label>Müşteri Email: </label>
        <input type="email" name="c_email" class="form-control" required value="<?php echo $customer_email; ?>">
    </div><!-- form-group Ends -->
    <div class="form-group" ><!-- form-group Starts -->
        <label>Müşteri Ülke: </label>
        <input type="text" name="c_contact" class="form-control" required value="<?php echo $customer_country; ?>">
    </div><!-- form-group Ends -->
    <div class="form-group" ><!-- form-group Starts -->
        <label>Müşteri İl: </label>
        <input type="text" name="c_contact" class="form-control" required value="<?php echo $customer_city; ?>">
    </div><!-- form-group Ends -->
    <div class="form-group" ><!-- form-group Starts -->
        <label>Müşteri İletişim: </label>
        <input type="text" name="c_contact" class="form-control" required value="<?php echo $customer_contact; ?>">
    </div><!-- form-group Ends -->
    <div class="form-group" ><!-- form-group Starts -->
        <label>Müşteri Adres: </label>
        <input type="text" name="c_contact" class="form-control" required value="<?php echo $customer_address; ?>">
    </div><!-- form-group Ends -->
    <div class="form-group" ><!-- form-group Starts -->
        <label>Müşteri Resim: </label>
        <input type="file" name="c_image" class="form-control"> <br>
        <img src="customer_images/<?php echo $customer_image; ?>" width="100" height="100" class="img-responsive" >
    </div><!-- form-group Ends -->
    <div class="text-center" ><!-- text-center Starts -->
        <button name="update" class="btn btn-primary" >
            <i class="fa fa-user-md" ></i> Hesabı Güncelle
        </button>
    </div><!-- text-center Ends -->
</form><!--- form Ends -->

<?php
    if(isset($_POST['update'])) {
        $update_id = $customer_id;
        $c_name = $_POST['c_name'];
        $c_email = $_POST['c_email'];
        $c_contact = $_POST['c_country'];
        $c_city = $_POST['c_city'];
        $c_contact = $_POST['c_contact'];
        $c_address = $_POST['c_address'];
        $c_image = $_FILES['c_image']['name'];
        $c_image_tmp = $FILES['c_image']['tmp_name'];
        move_uploaded_file($c_image_tmp, "customer_images/$c_image");

        if(empty($c_image)){
            $c_image = $customer_image;
        }else{
            $allowed = array('jpeg','jpg','gif','png','tif','avi');
            $file_extension = pathinfo($c_image, PATHINFO_EXTENSION);
            if(!in_array($file_extension,$allowed)){
                echo "<script>alert('Dosya Biçiminiz, Uzantınız Desteklenmiyor.')</script>";
                exit();
            }else{
                move_uploaded_file($c_image_tmp,"customer_images/$c_image");
            }
        }

        $update_customer = "update customers set customer_name='$c_name',customer_email='$c_email',
        customer_contact='$c_contact',customer_image='$c_image' where customer_id='$update_id'";

        $run_customer = mysqli_query($con, $update_customer);
        if ($run_customer) {
            echo "<script> alert('Hesabı Güncelleme İşlemi BAŞARILI.'); </script>";
            echo "<script> window.open('my_account.php?edit_account','_self');  </script>";
        }
    }
?>