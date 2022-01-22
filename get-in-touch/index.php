<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!-->
<html lang="en">
<!--<![endif]-->
<head>

	<!-- basic page needs -->
	<meta charset="utf-8">
	<title>Print Portraits - Get in touch - Unique and lasting memories</title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
	<meta name="description" content="Unique and lasting memories of your children's portraits with their actual hand and footprints." />
	<meta name="keywords" content="" />
	<meta name="author" content="Oliver Schlieben" />
	<meta name="google-site-verification" content="bNrnbYW10gpsaAANY-kML-2EJpZicf3wdga_A9i9710" />

	<!-- css -->
	<link rel="stylesheet" href="http://www.printportraits.com/stylesheets/base.css">
	<link rel="stylesheet" href="http://www.printportraits.com/stylesheets/skeleton.css">
	<link rel="stylesheet" href="http://www.printportraits.com/stylesheets/layout.css">
	<link rel="stylesheet" href="http://www.printportraits.com/stylesheets/styles.css">

	<!-- mobile specific metas -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

	<!-- Favicons -->
	<link rel="shortcut icon" href="http://www.printportraits.com/favicon.ico" type="image/vnd.microsoft.icon"/>
	<link rel="icon" href="http://www.printportraits.com/favicon.ico" type="image/x-ico"/>
	<!--
		<link rel="apple-touch-icon" href="images/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="images/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="images/apple-touch-icon-114x114.png">
	-->

</head>
<body>
<div class="container">

	<?php include "../includes/header.php"; ?>
	
	<?php 
		
		//Captcha check - $num1 + $num = $total
		$num1 = isset($_POST['num1']) ? $_POST['num1'] : "";
		$num2 = isset($_POST['num2']) ? $_POST['num2'] : "";
		$total = isset($_POST['captcha']) ? $_POST['captcha'] : "";
		$error = true;
		if( intval($num1) + intval($num2) == intval($total) && $num1 != "" && $num2 != "" ) {
			$error = false;
			$error_message = "";
		} elseif($num1 == "" && $num2 == "" ) {
			$error_message = "";
		} else {
			$error = true;
			$error_message = '<label for="captchae" generated="true" class="error" style="">Please re-answer the maths question</label>';
        }			
    	        		    	        	
		//form submission
		if( !$error ) {
    	        		
			//stuff
    	    $email_from = "enquiry@printportraits.com";
    	    $email_to = "oliver@printportraits.com";
			$email_subject = "Print Portraits Enquiry";

			//clean function
			function clean_string($string) {
      			$bad = array("content-type","bcc:","to:","cc:","href");
      			return str_replace($bad,"",$string);
    		}
     						
     		//form fields
			$email_message .= "First name: ".clean_string( $_POST["firstname"] )."\n";
			$email_message .= "Last name: ".clean_string( $_POST["lastname"] )."\n";
			$email_message .= "Email: ".clean_string( $_POST["email"] )."\n";
			$email_message .= "Enquiry details: ".clean_string( $_POST["enquiry"] )."\n";
     
			//thank you message
			echo '<div class="sixteen columns success"><h3>Thanks '.$_POST["firstname"].'</h3><p>We will be in touch with you shortly, thank you again for sending us an enquiry. If you haven&#39;t already please follow us on <a href="http://www.facebook.com/pages/print-portraits/194312757373635"><img src="http://www.printportraits.com/images/facebook-button.png" style="margin-bottom:-7px;" width="80" height="28" alt="Follow Me on Pinterest" /></a></p></div>';
			
			// create email headers
			$headers = 'From: '.$email_from."\r\n".
			'Reply-To: '.$email_from."\r\n" .
			'X-Mailer: PHP/' . phpversion();
			@mail($email_to, $email_subject, $email_message, $headers);
	
		}
	?>    	        	

	<div class="sixteen columns">
		<h1>Get in touch</h1>
		<p>Hello and welcome to our "Get in touch" page, you can either complete the form below or alternatively send us an email or call us directly. Please note to complete all of the fields in the form below as they are all required, thanks.</p>
	</div>
	<div class="one-third column contact-form">
		<form action="" method="post" id="register-form" novalidate="novalidate">    
    		<div id="form-content">
        		<fieldset>
            		<div class="fieldgroup">
                		<label for="firstname">First name</label>
		                <input type="text" name="firstname" value="<?php echo $_POST['firstname']; ?>">
    		        </div>
	    	        <div class="fieldgroup">
    	    	        <label for="lastname">Last name</label>
        	    	    <input type="text" name="lastname" value="<?php echo $_POST['lastname']; ?>">
	            	</div>
		            <div class="fieldgroup">
    		            <label for="email">Email address</label>
        		        <input type="text" name="email" value="<?php echo $_POST['email']; ?>">
            		</div>
		            <div class="fieldgroup">
    		            <label for="password">Enquiry details</label>
						<textarea name="enquiry"cols="20" rows="8"><?php echo $_POST['enquiry']; ?></textarea>
            		</div>
	            	<div class="fieldgroup">
	    	        	<label for="password">Please answer this maths question</label>
	    	        	<input id="num1" class="sum maptcha" type="text" name="num1" value="<?php echo rand(1,4) ?>" readonly="readonly" /> +
						<input id="num2" class="sum maptcha" type="text" name="num2" value="<?php echo rand(5,9) ?>" readonly="readonly" /> =
						<input id="captcha" class="captcha maptcha" type="text" name="captcha" maxlength="2" />
    	        	</div>
    	        	<div class="fieldgroup">
      	        		<?php echo $error_message; ?>
					</div>
	            	<div class="fieldgroup">
	        	        <input type="submit" value="Submit your enquiry" class="submit">
    	        	</div>
    	            	        	
	    	    </fieldset>
	    	</div>
		</form>
	</div>
	<div class="one-third column">
    	<h4>Contact details</h4>
    	<p>Email - <a href="mailto:oliver@printportraits.com">oliver@printportraits.com</a><br/>Phone - +44 (0)7779 250062</p>
    	<h4>Follow us</h4>
       	<p><a href="http://pinterest.com/printportraits/"><img src="https://s-passets-ec.pinimg.com/images/about/buttons/pinterest-button.png" width="80" height="28" alt="Follow Me on Pinterest" /></a> <a href="http://www.facebook.com/pages/print-portraits/194312757373635"><img src="http://www.printportraits.com/images/facebook-button.png" width="80" height="28" alt="Follow Me on Pinterest" /></a></p>  
       	<h4>Privacy policy</h4>
       	<p><small>We care about your privacy, by submitting your information, you authorise Print Portraits to contact you via email about our products, services and special offers. You can opt-out at any time, see our Privacy policy for more information.</small></p>
	
	</div>
	<div class="one-third column"></div>	
  
  	<?php include "../includes/footer.php"; ?>
  	
  	<!-- form includes -->
  	<link rel="stylesheet" href="form.css">
	<script type="text/javascript" src="jquery.validate.min.js"></script>
  	<script type="text/javascript" src="form.js"></script>
  	
</body>
</html>