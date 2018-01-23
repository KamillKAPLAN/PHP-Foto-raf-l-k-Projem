<?php
//Set your email address below (the email address that all correspondence should be set there)
//-------------------------------
$your_email = "kamil_kaplan@ymail.com";
//-------------------------------

if (isset($_POST['contact_form'])) {
	$email      	= $_POST['email'];
	$subject    	= $_POST['name'];
} else {
	$email      	= "";
	$subject    	= "";
}

$response   	= '';
$form_submitted = isset($_POST['contact_form']);
$form_success   = TRUE;

if(!eregi("^[a-z0-9]+([_\\.-][a-z0-9]+)*" ."@"."([a-z0-9]+([\.-][a-z0-9]+)*)+"."\\.[a-z]{2,}"."$",$email ))
{
	$response="Hai inserito un indirizzo e-mail non valido";
	$form_success   = FALSE;
}
else
{
	$values = array ('name','email','phone','message');
	$required = array('name','email','message');
		
	$email_subject = "Contatto dal sito: ".$subject;
	$email_content = "Hai ricevuto il seguente messaggio dal modulo contatti presente nel tuo sito:\n";
	
	foreach($values as $value)
	{		
		if( empty($_POST[$value]) && in_array($value, $required)) 
		{ 
			$response = 'Per favore, riempi i campi richiesti'; 					
			$form_success = FALSE;
			break;
		}		
		
		$email_content .= $value.': '.$_POST[$value]."\n";					
	}				
}

if($form_success)
	$response = ((@mail($your_email,$email_subject,$email_content)) ? 'Messaggio inviato con successo. Grazie!' : 'ATTENZIONE! Si è verificato un errore. Riprova di nuovo.');			
		
$responseMarkup = '<div class="responseMessage">'.$response.'</div>';
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<title>Fotografçi Sitesi</title>
 
    <meta name="author" content="Sara [mascaradesign.it] for Your Inspiration Web [yourinspirationweb.com]" />
    <meta name="keywords" content=""
    />
 	<meta name="description" content=""
	/>
    <meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
    
    <!-- [template css] begin -->
	<link rel="stylesheet" href="css/screen.css" type="text/css" media="screen, projection" />
	<link rel="stylesheet" href="css/960.css" type="text/css" media="screen, projection" />
    <link rel="stylesheet" href="css/print.css" type="text/css" media="print" /> 
    <!--[if IE]>
        <link rel="stylesheet" href="css/ie.css" type="text/css" media="screen, projection" />
    <![endif]-->
    <!-- [template css] end -->
    
	<script type="text/javascript" src="js/jquery-1.3.1.min.js"></script>
	<script type="text/javascript" src="js/functions.js"></script>

</head>

<body class="body">

	<!-- START TOP SECTION -->
	<div class="container_12">
	
		<!-- START LOGO -->
		<div class="grid_4 header" style="font-size:22px; margin-top:60px; padding-left:30px; margin-right:-30px;">LOGO GELECEK</div>
		<!-- END LOGO -->
   	 
		<!-- START NAVIGATION -->
   	  	<div class="grid_8 header">
   	  		<div id="navigation">
			   <ul id="nav">
					<li id="home"><a href="index.php">Anasayfa</a></li>
					<li id="about"><a href="about.php">Çelim Çesitleri</a></li>
					<li id="portfolio"><a href="portfolio.php">Albümler</a></li>
					<li id="contact"><a href="contact.php" class="currentPage">Contact</a></li>
				</ul>
			</div>
		</div>
		<!-- END NAVIGATION -->
		
		<div class="clear"></div>
	</div>
	<!-- END TOP SECTION -->
   
	<!-- START MEDIUM SECTION -->
	<div class="container_12 medium">
	
		<!-- START GET IN TOUCH TEXT --><!-- END GET IN TOUCH TEXT -->
   	
   		<!-- START MASCOTTE -->
	   	<div class="grid_6 mascotte" style=" padding-top:10px;">
   			<img src="images/contact/mascotte.gif" alt="Mascotte" />		
	   	</div>
	   	<!-- END MASCOTTE -->
   	  <div class="grid_4" style="margin-left:190px; margin-top:80px;">
	   		<h2 style=" font-size:24px; font-family: Tahoma, Geneva, sans-serif; margin-bottom:-2px;">Bize Ulasin</h2>
	   		<img src="images/contact/phone.gif" alt="" />
	   		<a href="#"><img src="images/contact/email.gif" alt="" /></a>
	   	</div>
		<div class="clear"></div>
		
	</div>
	<div class="container_12">
	
		<!-- START CONTACT FORM -->
		<div class="grid_6" style="padding-top:25px;">
			<div class="contactForm" style=" margin-left:100px; width:300px;">
	   			<h2 style="margin-bottom:-15px;">Mesaj Gönderebilirsiniz</h2>
	   			
	   			<?php echo (($form_submitted) ? $responseMarkup : ''); ?>
					
				<form id="contactForm" action="" method="post">					
					<div class="formContent">
						<label for="name">Adini Soyadiniz : </label>					
						<input type="text" name="name" id="name" class="input required" value="" />			
						<label for="email">E-Mail Adresiniz : </label>
						<input type="text" name="email" id="email" class="input required" value="" />												
						<fieldset>	
							<label class="optional">Telefon Numaraniz : </label>
							<input type="text" name="phone" id="phone" class="input" value="" />
                        <label class="optional">Mesajiniz : </label>	
						<textarea class="textarea" name="message" rows="5" cols="5" style="overflow:auto; resize: none;"></textarea>					
						</fieldset>	                        
						<input type="hidden" name="contact_form" value="1" />
						<input type="submit" class="submit" value="Gönder" />									
					</div>
				</form>				
	   		</div>
            <div style="width:320px; height:359px; margin-left:480px; margin-top:-400px;"><img src="images/contact/img.png" /> </div>
		</div>	   	
   	  <div class="clear"></div>
	</div>	
   	<div class="clear"></div>
   	<div class="container_12">
	   	<p class="footer"><strong>Tüm Haklarimiz Saklidir. </strong></p>
	</div>
<script type="text/javascript">	
  $(document).ready(function(){	
    $("#contactForm").validate({
		errorClass: "inputError",
		messages: {
			name: {
				required: ""				
			},
			email: {
				required: ""				
			}
		}
	})
  });
</script>
<script type="text/javascript" src="js/jquery.validate.min.js"></script>

</body>
</html>