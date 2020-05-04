<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Hoş Geldiniz</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
  	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
        a { text-decoration: none}
        ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
            overflow: hidden;
            background-color: #333;
            text-decoration: none;
        }

        li {
            float: left;
            border-right:1px solid #bbb;
            color: white;
            text-decoration: none;
        }

        li:last-child {
            border-right: none;
        }

        li a {
            display: block;
            color: white;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }

        li a:hover:not(.active) {
            background-color: white;
            text-decoration: none;
        }

        .active {
            background-color: #4CAF50;
            text-decoration: none;
        }
    </style>
</head>
<body>
  <div class="container">
    <div class="page-header">
      <ul>
        <li style="padding: 14px;">Merhaba, <b style="color: red"><?php echo htmlspecialchars($_SESSION['username']); ?></b> Admin Paneline HoşGeldin</li>
        <li><a class="active" href="welcome.php" style="text-decoration: none">ANASAYFA</a></li>
        <li><a href="images.php">RESİMLER</a></li>
        <li><a href="addnew.php">RESİM EKLE</a></li>
        <li style="float:right; color: red; background-color: red"><a href="logout.php">ÇIKIŞ YAP</a></li>
      </ul>
    </div>
    <p></p>
  </div>
</body>
</html>
