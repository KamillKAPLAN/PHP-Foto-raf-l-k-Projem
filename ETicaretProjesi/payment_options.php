<div class="box col-sm-12">
    <?php
        $session_email = $_SESSION['customer_email'];
        $select_customer = "select * from customers where customer_email = '$session_email'";
        $run_customer = mysqli_query($con, $select_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        $customer_id = $row_customer['customer_id'];
    ?>
    <h1 class="text-center">ÖDEME SEÇENEKLERİ</h1>
    <p class="lead text-center col-sm-6">
        <a href="order.php?c_id=<?php echo $customer_id; ?>">Kapıda Ödeme<br>
            <img src="images/kapidaOdeme.jpg" width="500" height="270" class="img-thumbnail">
        </a>
    </p>
    <center>
        <p class="lead col-sm-6">
            <a href="#">
                Online Ödeme <br>
                <img src="images/onlineOdeme.png" width="500" height="270" class="img-thumbnail">
            </a>
        </p>
    </center>

</div>