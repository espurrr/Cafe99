<!DOCTYPE html>
<html>
<head>
    <title>Login to Cafe99</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <?php echo link_css("css/signup.css"); ?>
    <?php echo link_css("css/header.css"); ?>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body>
<?php include 'header.php'?>
<div class="parent-container" id="p-container">
      <div class="sign-up-container">
		<form action="#"><br>
			<h1>Log In</h1><br>
		
            <input type="email" name="email" placeholder="Email*">
            <input type="password" name="password" placeholder="Password*">
            <a href="#">Forgot Password?</a>
            <button>Log in</button>
           
		</form>
	</div>
</div>



</body>
</html>