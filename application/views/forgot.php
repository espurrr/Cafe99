<!DOCTYPE html>
<html>
<head>
	<title>SignUp and Login</title>
	
	<?php echo link_css("css/signup.css?version=51"); ?>
	<?php echo link_css("css/header.css"); ?>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
    <!-- Header starts -->
    <?php include 'header.php'?>

    <!-- Header finished -->
    <div class="parent-container" id="p-container">
      <div class="sign-up-container">
	  <?php echo form_open("","post");?>
		<h1>Recover your Account</h1><br><br>
		<p>We'll send a recovery link to your email</p><br>
		
		<?php echo form_input(['type'=>'email', 'name'=>'email', 'placeholder'=>'Email*'])?>
		<input type="submit" class="send_email" value="SEND EMAIL">

		<?php echo form_close();?>
      </div>
    </div>
  </body>
</html>






