<?php
    if(!isset($_SESSION['admin_email'])) {
        echo "<script>window.open('login.php','_self')</script>";
    } else {
?>
<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">Kontrol Paneli</h1>
        <ol class="breadcrumb">
            <li class="active">
                <i class="fa fa-dashboard"></i> Kontrol Paneli
            </li>
        </ol>
    </div>
</div>
<div class="row">
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-tasks fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_products; ?></div>
                        <div>Ürünler</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_products">
                <div class="panel-footer">
                    <span class="pull-left">Detayı Göster</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-green">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-comments fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_customers; ?></div>
                        <div>Müşteriler</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_customers">
                <div class="panel-footer">
                    <span class="pull-left">Detayı Göster</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-yellow">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-shopping-cart fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_p_categories; ?></div>
                        <div>Ürün Kategorileri</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_p_cats">
                <div class="panel-footer">
                    <span class="pull-left">Detayı Göster</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
    <div class="col-lg-3 col-md-6">
        <div class="panel panel-red">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-3">
                        <i class="fa fa-support fa-5x"></i>
                    </div>
                    <div class="col-xs-9 text-right">
                        <div class="huge"><?php echo $count_pending_orders; ?></div>
                        <div>Siparişler</div>
                    </div>
                </div>
            </div>
            <a href="index.php?view_orders">
                <div class="panel-footer">
                    <span class="pull-left">Detayı Göster</span>
                    <span class="pull-right">
                        <i class="fa fa-arrow-circle-right"></i>
                    </span>
                    <div class="clearfix"></div>
                </div>
            </a>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-lg-8">
        <div class="panel panel-primary">
            <div class="panel-heading">
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> Yeni Siparişler
                </h3>
            </div>
            <div class="panel-body">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover table-striped">
                        <thead>
                            <tr>
                                <th>Sipariş Numarası</th>
                                <th>Müşteri Email</th>
                                <th>Fatura Numarası</th>
                                <th>Ürün ID</th>
                                <th>Ürün Adedi</th>
                                <th>Ürün Boyutu</th>
                                <th>Sipariş Durumu</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                                $i = 0;
                                $get_order = "select * from pending_orders order by 1 DESC LIMIT 0,5";
                                $run_order = mysqli_query($con, $get_order);
                                while($row_order = mysqli_fetch_array($run_order)) {
                                    $order_id = $row_order['order_id'];
                                    $c_id = $row_order['customer_id'];
                                    $invoice_no = $row_order['invoice_no'];
                                    $product_id = $row_order['product_id'];
                                    $qty = $row_order['qty'];
                                    $size = $row_order['size'];
                                    $order_status = $row_order['order_status'];
                                    $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td>
                                    <?php
                                        $get_customer = "select * from customers where customer_id='$c_id'";
                                        $run_customer = mysqli_query($con, $get_customer);
                                        $row_customer = mysqli_fetch_array($run_customer);
                                        $customer_email = $row_customer['customer_email'];
                                        echo $customer_email;
                                    ?>
                                </td>
                                <td><?php echo $invoice_no; ?></td>
                                <td><?php echo $product_id; ?></td>
                                <td><?php echo $qty; ?></td>
                                <td><?php echo $size; ?></td>
                                <td>
                                    <?php
                                        if($order_status == 'pending') {
                                            echo $order_status='Ödenmemiş';
                                        } else {
                                            echo "Ödenmiş";
                                        }
                                    ?>
                                </td>
                            </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                </div>
                <div class="text-right">
                    <a href="index.php?view_orders">
                        Tüm Siparişleri Görüntüle
                        <i class="fa fa-arrow-circle-right"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="panel">
            <div class="panel-body">
                <div class="thumb-info mb-md">
                    <img src="admin_images/<?php echo $admin_image; ?>" class="rounded img-thumbnail" style="width: 715px;">
                    <div class="thumb-info-title">
                        <span class="thumb-info-inner"><?php echo $admin_name; ?></span>
                        <span class="thumb-info-type"><?php echo $admin_job; ?></span>
                    </div>
                </div>
                <div class="mb-md">
                    <div class="widget-content-expanded">
                        <i class="fa fa-user"></i><span>Email : </span><?php echo $admin_email; ?><br>
                        <i class="fa fa-user"></i><span>Ülke : </span><?php echo $admin_country; ?><br>
                        <i class="fa fa-user"></i><span>Telefon : </span><?php echo $admin_contact; ?><br>
                    </div>
                    <hr class="dotted short">
                    <h5 class="text-muted">Hakkında</h5>
                    <p><?php echo $admin_about; ?></p>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>