<?php
    session_start();
    include("includes/db.php");
?>
<!DOCTYPE html>
<html>
<head>
    <title>Admin Login</title>
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/login.css" rel="stylesheet">
</head>
<body>
    <div class="container">
        <form class="form-login" action="" method="post">
            <h2 class="form-login-heading">Yönetici Girişi</h2>
            <input type="text" class="form-control" name="admin_email" placeholder="Email Adresi" required>
            <input type="password" class="form-control" name="admin_pass" placeholder="Parola" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit" name="admin_login">Giriş Yap</button>
        </form>
    </div>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
    if(isset($_POST['admin_login'])) {
        $admin_email = mysqli_real_escape_string($con, $_POST['admin_email']);
        $admin_pass = mysqli_real_escape_string($con, $_POST['admin_pass']);

        $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
        $run_admin = mysqli_query($con, $get_admin);

        $count = mysqli_num_rows($run_admin);

        if($count == 1) {
            $_SESSION['admin_email'] = $admin_email;
            echo "<script>alert('Yönetici Paneline Giriş Yaptınız.')</script>";
            echo "<script>window.open('index.php?dashboard', '_self')</script>";
            exit();
        } else {
            echo "<script>alert('Email veya Parolanız HATALI')</script>";
        }
    }
?>
