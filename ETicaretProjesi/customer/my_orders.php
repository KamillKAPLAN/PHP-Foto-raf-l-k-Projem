<center>
    <h1>Siparişlerim</h1>
    <p class="lead">Buraya orta bir yazı</p>
    <p class="text-muted">
        Herhangi bir sorunuz varsa, lütfen bizimle <a href="../contact.php"> iletişime </a> geçmekten çekinmeyin, müşteri hizmetleri merkezimiz 7/24 sizin için çalışıyor.
    </p>
</center>
<hr>
<div class="table-responsive">
    <table class="table table-bordered table-hover" style="text-align: center">
        <thead>
            <tr>
                <th style="text-align: center">Sipariş Numarası</th>
                <th style="text-align: center">Ödenecek Tutar</th>
                <th style="text-align: center">Fatura Numarası</th>
                <th style="text-align: center">Ürün Boyutu</th>
                <th style="text-align: center">Sipariş Tarihi</th>
                <th style="text-align: center">Sipariş Durumu(Ödendi-Ödenmedi)</th>
                <th style="text-align: center">Ürün Adedi</th>
                <th style="text-align: center">Sipariş Durumu</th>
            </tr>
        </thead>
        <tbody>
            <?php
                $customer_session = $_SESSION['customer_email'];
                $get_customer = "select * from customers where customer_email='$customer_session'";
                $run_customer = mysqli_query($con, $get_customer);
                $row_customer = mysqli_fetch_array($run_customer);
                $customer_id = $row_customer['customer_id'];

                $get_orders = "select * from customer_orders where customer_id='$customer_id'";
                $run_orders = mysqli_query($con, $get_orders);
                $i = 0;
                while($row_orders = mysqli_fetch_array($run_orders)) {
                    $order_id = $row_orders['order_id'];
                    $due_amount =  $row_orders['due_amount'];
                    $invoice_no = $row_orders['invoice_no'];
                    $qty = $row_orders['qty'];
                    $size = $row_orders['size'];
                    $order_date = substr($row_orders['order_date'],0,11);
                    $order_status = $row_orders['order_status'];
                    $i++;
                    if($order_status == 'pending') {
                        $order_status = 'ÖDENMEMİŞ';
                    } else {
                        $order_status = 'ÖDENMİŞ';
                    }
            ?>
            <tr>
                <td><?php echo $i; ?></td>
                <td><?php echo $due_amount; ?> TL</td>
                <td><?php echo $invoice_no; ?></td>
                <td><?php echo $size; ?></td>
                <td><?php echo $order_date; ?></td>
                <td><?php echo $order_status; ?></td>
                <td><?php echo $qty; ?></td>
                <td>
                    <a href="confirm.php?order_id=<?php echo $order_id ?>" target="_blank" class="btn btn-primary btn-sm">Ödenmişse Onayla</a>
                </td>
            </tr>
            <?php } ?>
        </tbody>
    </table>
</div>