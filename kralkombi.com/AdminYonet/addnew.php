<?php
// Initialize the session
session_start();

// If session variable is not set it will redirect to login page
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: index.php");
  exit;
}
?>
<?php
	error_reporting( ~E_NOTICE ); // avoid notice
	require_once 'dbconfig.php';
	if(isset($_POST['btnsave']))
	{
		$username = $_POST['user_name'];// user name
		$userjob = $_POST['user_job'];// user email

		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];

		if(empty($username)){
			$errMSG = "Lütfen ürün ismini giriniz...";
		}
		else if(empty($userjob)){
			$errMSG = "Lütfen fiyatını giriniz...";
		}
		else if(empty($imgFile)){
			$errMSG = "Lütfen bir fotoğraf seçiniz...";
		}
		else
		{
			$upload_dir = 'user_images/'; // upload directory

			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension

			// valid image extensions
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions

			// rename uploading image
			$userpic = rand(1000,1000000).".".$imgExt;

			// allow valid image file formats
			if(in_array($imgExt, $valid_extensions)){
				// Check file size '5MB'
				if($imgSize < 5000000)				{
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else{
					$errMSG = "Üzgünüz resim boyutu çook büyük...";
				}
			}
			else{
				$errMSG = "Üzgünüm sadece JPG, JPEG, PNG & GIF dosya formatı seçiniz...";
			}
		}
		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('INSERT INTO tbl_users(userName,userProfession,userPic) VALUES(:uname, :ujob, :upic)');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);

			if($stmt->execute())
			{
				$successMSG = "yeni kayıt başarıyle eklendi ...";
				header("refresh:1;images.php"); // redirects image view page after 5 seconds.
			}
			else
			{
				$errMSG = "error while inserting....";
			}
		}
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>RESİM EKLE</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">
	<style type="text/css">

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
						<li><a href="welcome.php" style="text-decoration: none">ANASAYFA</a></li>
						<li><a href="images.php">RESİMLER</a></li>
						<li><a class="active" href="addnew.php">RESİM EKLE</a></li>
						<li style="float:right; color: red; background-color: red"><a href="logout.php">ÇIKIŞ YAP</a></li>
					</ul>
				</div>
				<p></p>
	<?php
	if(isset($errMSG)){
		?>
		<div class="alert alert-danger">
    	<span class="glyphicon glyphicon-info-sign"></span> <strong><?php echo $errMSG; ?></strong>
    </div>
		<?php
	} else if (isset($successMSG)) {
		?>
		<div class="alert alert-success">
			<strong><span class="glyphicon glyphicon-info-sign"></span> <?php echo $successMSG; ?></strong>
    </div>
        <?php
	}
	?>

<form method="post" enctype="multipart/form-data" class="form-horizontal">

	<table class="table table-bordered table-responsive">

    <tr>
    	<td><label class="control-label">RESİM ADI: </label></td>
        <td><input class="form-control" type="text" name="user_name" placeholder="RESİM ADINI GİR NE BEKLİON" value="<?php echo $username; ?>" /></td>
    </tr>

    <tr>
    	<td><label class="control-label">RESİM FİYATI: </label></td>
        <td><input class="form-control" type="text" name="user_job" placeholder="RESİM FİYATINI GİRSENE HADİ MÜŞTERİ KAÇIYOR ÇABUK OL" value="<?php echo $userjob; ?>" /></td>
    </tr>

    <tr>
    	<td><label class="control-label">RESİM: </label></td>
        <td><input class="input-group" type="file" name="user_image" accept="image/*" /></td>
    </tr>

    <tr>
        <td colspan="2"><button type="submit" name="btnsave" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> &nbsp; KAYDET
        </button>
        </td>
    </tr>

    </table>

</form>



<div class="alert alert-info" style="color: black">
     Software (Yazılım) & Desing By (Tasarım) <a href="tel:+905465813374" title="Kamil KAPLAN | Freelance Yazılım Uzmanı" rel="external, dofollow" class="n-font" target="_blank"  style="text-decoration:none;"><strong>KAMİL KAPLAN</strong></a>
</div>



</div>






<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>


</body>
</html>
