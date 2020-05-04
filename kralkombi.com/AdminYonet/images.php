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
	require_once 'dbconfig.php';
	if(isset($_GET['delete_id']))
	{
		// select image from db to delete
		$stmt_select = $DB_con->prepare('SELECT userPic FROM tbl_users WHERE userID =:uid');
		$stmt_select->execute(array(':uid'=>$_GET['delete_id']));
		$imgRow=$stmt_select->fetch(PDO::FETCH_ASSOC);
		unlink("user_images/".$imgRow['userPic']);

		// it will delete an actual record from db
		$stmt_delete = $DB_con->prepare('DELETE FROM tbl_users WHERE userID =:uid');
		$stmt_delete->bindParam(':uid',$_GET['delete_id']);
		$stmt_delete->execute();

		header("Location: images.php");
	}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" />
	<title>TÜM RESİMLER</title>
	<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
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
									<li><a class="active" href="images.php">RESİMLER</a></li>
									<li><a href="addnew.php">RESİM EKLE</a></li>
									<li style="float:right; color: red; background-color: red"><a href="logout.php">ÇIKIŞ YAP</a></li>
								</ul>
							</div>
							<p></p>
	<div class="row">
		<?php
		$stmt = $DB_con->prepare('SELECT userID, userName, userProfession, userPic FROM tbl_users ORDER BY userID DESC');
		$stmt->execute();
		if($stmt->rowCount() > 0) {
			while($row=$stmt->fetch(PDO::FETCH_ASSOC)) {
				extract($row);
		?>
		<div class="col-xs-3">
			<p class="page-header"><?php echo $userName."&nbsp;/&nbsp;".$userProfession; ?></p>
			<img src="user_images/<?php echo $row['userPic']; ?>" class="img-rounded" width="250px" height="250px" />
			<p class="page-header">
				<span>
					<a class="btn btn-info" href="editform.php?edit_id=<?php echo $row['userID']; ?>" title="click for edit" onclick="return confirm('GÜNCELLEMEK İÇİN SON KARARIN MI?')"><span class="glyphicon glyphicon-edit"></span> GÜNCELLE</a>
					<a class="btn btn-danger" href="?delete_id=<?php echo $row['userID']; ?>" title="click for delete" onclick="return confirm('SİLMEK İÇİN SON KARARIN MI?')"><span class="glyphicon glyphicon-remove-circle"></span> SİL</a>
				</span>
			</p>
		</div>
		<?php
		}
	} else {
	?>
	<div class="col-xs-12">
		<div class="alert alert-warning">
			<span class="glyphicon glyphicon-info-sign"></span> &nbsp; Resim Yok ...
		</div>
	</div>
	<?php
	}
	?>
	</div>
	<div class="alert alert-info" style="color: black">
	     Software (Yazılım) & Desing By (Tasarım) <a href="tel:+905465813374" title="Kamil KAPLAN | Freelance Yazılım Uzmanı" rel="external, dofollow" class="n-font" target="_blank"  style="text-decoration:none;"><strong>KAMİL KAPLAN</strong></a>
	</div>
</div>
<!-- Latest compiled and minified JavaScript -->
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
