<div class="panel panel-default sidebar-menu">
    <div class="panel-heading">
        <?php
            $customer_seesion = $_SESSION['customer_email'];
            $get_customer = "select * from customers where customer_email='$customer_seesion'";
            $run_customer = mysqli_query($con, $get_customer);
            $row_customer = mysqli_fetch_array($run_customer);
            $customer_image = $row_customer['customer_image'];
            $customer_name = $row_customer['customer_name'];
            if(!isset($_SESSION['customer_email'])) {

            } else {
                echo "
                <center>
                    <img src='customer_images/$customer_image' class='img-thumbnail'>
                </center>
                <br>
                <h3 align='center' class='panel-title'>Adı : $customer_name</h3>
                ";
            }
        ?>
    </div>
    <div class="panel-body">
        <ul class="nav nav-pills nav-stacked">
            <li class="<?php if(isset($_GET['my_orders'])){ echo "active";} ?>">
                <a href="my_account.php?my_orders"><i class="fa fa-list"></i> Siparişlerim</a>
            </li>
            <li class="<?php if(isset($_GET['pay_offline'])){ echo "active";} ?>">
                <a href="my_account.php?pay_offline"><i class="fa fa-bolt"></i> Kapıda Ödeme</a>
            </li>
            <li class="<?php if(isset($_GET['edit_account'])){ echo "active";} ?>">
                <a href="my_account.php?edit_account"><i class="fa fa-pencil"></i> Hesabı Düzenle</a>
            </li>
            <li class="<?php if(isset($_GET['change_pass'])){ echo "active";} ?>">
                <a href="my_account.php?change_pass"><i class="fa fa-user"></i> Parolayı Değiştir</a>
            </li>
            <li class="<?php if(isset($_GET['delete_account'])){ echo "active";} ?>">
                <a href="my_account.php?delete_account"><i class="fa fa-trash-o"></i> Hesabı Sil</a>
            </li>
            <li>
                <a href="logout.php"><i class="fa fa-sign-out"></i> Çıkış Yap</a>
            </li>
        </ul>
    </div>
</div>