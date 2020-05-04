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

	error_reporting( ~E_NOTICE );

	require_once 'dbconfig.php';

	if(isset($_GET['edit_id']) && !empty($_GET['edit_id']))
	{
		$id = $_GET['edit_id'];
		$stmt_edit = $DB_con->prepare('SELECT userName, userProfession, userPic FROM tbl_users WHERE userID =:uid');
		$stmt_edit->execute(array(':uid'=>$id));
		$edit_row = $stmt_edit->fetch(PDO::FETCH_ASSOC);
		extract($edit_row);
	}
	else
	{
		header("Location: images.php");
	}



	if(isset($_POST['btn_save_updates']))
	{
		$username = $_POST['user_name'];// user name
		$userjob = $_POST['user_job'];// user email

		$imgFile = $_FILES['user_image']['name'];
		$tmp_dir = $_FILES['user_image']['tmp_name'];
		$imgSize = $_FILES['user_image']['size'];

		if($imgFile)
		{
			$upload_dir = 'user_images/'; // upload directory
			$imgExt = strtolower(pathinfo($imgFile,PATHINFO_EXTENSION)); // get image extension
			$valid_extensions = array('jpeg', 'jpg', 'png', 'gif'); // valid extensions
			$userpic = rand(1000,1000000).".".$imgExt;
			if(in_array($imgExt, $valid_extensions))
			{
				if($imgSize < 5000000)
				{
					unlink($upload_dir.$edit_row['userPic']);
					move_uploaded_file($tmp_dir,$upload_dir.$userpic);
				}
				else
				{
					$errMSG = "Üzgünüz resim boyutu max. 5MB olmalı çook büyük...";
				}
			}
			else
			{
				$errMSG = "Üzgünüm sadece JPG, JPEG, PNG & GIF dosya formatı seçiniz...";
			}
		}
		else
		{
			// if no image selected the old image remain as it is.
			$userpic = $edit_row['userPic']; // old image from database
		}


		// if no error occured, continue ....
		if(!isset($errMSG))
		{
			$stmt = $DB_con->prepare('UPDATE tbl_users
									     SET userName=:uname,
										     userProfession=:ujob,
										     userPic=:upic
								       WHERE userID=:uid');
			$stmt->bindParam(':uname',$username);
			$stmt->bindParam(':ujob',$userjob);
			$stmt->bindParam(':upic',$userpic);
			$stmt->bindParam(':uid',$id);

			if($stmt->execute()){
				?>
                <script>
				alert('Başarıyla Güncellendi ...');
				window.location.href='images.php';
				</script>
                <?php
			}
			else{
				$errMSG = "Üzgünüz Güncellenmedi !";
			}

		}


	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<title>RESİM GÜNCELLE</title>

	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">

	<!-- Optional theme -->
	<link rel="stylesheet" href="bootstrap/css/bootstrap-theme.min.css">

	<!-- custom stylesheet -->
	<link rel="stylesheet" href="style.css">

	<!-- Latest compiled and minified JavaScript -->
	<script src="bootstrap/js/bootstrap.min.js"></script>

	<script src="jquery-1.11.3-jquery.min.js"></script>
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
<body style= "background-color: white">

<div class="navbar navbar-default navbar-static-top" role="navigation">
</div>


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
<div class="clearfix"></div>

<form method="post" enctype="multipart/form-data" class="form-horizontal">


    <?php
	if(isset($errMSG)){
		?>
        <div class="alert alert-danger">
          <span class="glyphicon glyphicon-info-sign"></span> &nbsp; <?php echo $errMSG; ?>
        </div>
        <?php
	}
	?>


	<table class="table table-bordered table-responsive">

    <tr>
    	<td><label class="control-label">RESİM ADI: </label></td>
        <td><input class="form-control" type="text" name="user_name" value="<?php echo $userName; ?>" required /></td>
    </tr>

    <tr>
    	<td><label class="control-label">RESİM FİYATI: </label></td>
        <td><input class="form-control" type="text" name="user_job" value="<?php echo $userProfession; ?>" required /></td>
    </tr>

    <tr>
    	<td><label class="control-label">RESİM: </label></td>
        <td>
        	<p><img src="user_images/<?php echo $userPic; ?>" height="150" width="150" /></p>
        	<input class="input-group" type="file" name="user_image" accept="image/*" />
        </td>
    </tr>

    <tr>
        <td colspan="2"><button type="submit" name="btn_save_updates" class="btn btn-default">
        <span class="glyphicon glyphicon-save"></span> GÜNCELLE
        </button>

        <a class="btn btn-default" href="images.php"> <span class="glyphicon glyphicon-backward"></span> HELE SEN Bİ GERİ GEL </a>

        </td>
    </tr>

    </table>

</form>


<div class="alert alert-info" style="color: black">
	 Software (Yazılım) & Desing By (Tasarım) <a href="tel:+905465813374" title="Kamil KAPLAN | Freelance Yazılım Uzmanı" rel="external, dofollow" class="n-font" target="_blank"  style="text-decoration:none;"><strong>KAMİL KAPLAN</strong></a>
</div>

</div>
</body>
</html>
