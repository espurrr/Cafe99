<!DOCTYPE html>
<html>
<head>
    <title>Login to Cafe99</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <?php echo link_css("css/style.css"); ?>
    <?php echo link_css("css/signup.css?version=51"); ?>
    <?php echo link_css("css/header.css"); ?>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body>
<?php include 'header.php'?>

<!-- auth message -->
<div class="authMessage">
    <?php $this->flash('signupSuccess','alert alert-success','fa fa-check'); ?>
</div>


<div class="parent-container" id="p-container">
      <div class="sign-up-container">
		<?php echo form_open("","post");?><br>
			<h1>Log In</h1><br>
            <?php echo form_input(['type'=>'email', 'name'=>'email', 'placeholder'=>'Email*'])?>
            <?php echo form_input(['type'=>'password', 'name'=>'password', 'placeholder'=>'Password*'])?>
            <?php echo anchor("account_controller/forgot", "Forgot Password?") ?>
            <!-- <a href="<?php echo BASE_URL;?>/account_controller/forgot">Forgot Password?</a> -->
            <input type="submit" class="login" value="LOG IN">
           
        <?php echo form_close();?>
	</div>
</div>



</body>
</html>