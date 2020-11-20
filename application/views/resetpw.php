<!DOCTYPE html>
<html>
<head>
    <title>Login to Cafe99</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <?php echo link_css("css/style.css"); ?>
    <?php echo link_css("css/signup.css?ts=<?=time()?>"); ?>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body style="background:  #d4c4e9 url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
<?php include '../application/views/header/header.php'?>

<!-- auth message -->
<div class="authMessage">
    <?php $this->flash('signupSuccess','alert alert-info','fa fa-info-circle'); ?>
    <?php $this->flash('emailError','alert alert-danger','fa fa-times-circle'); ?>
</div>


<div class="parent-container" id="p-container">
      <div class="sign-up-container">
		<?php echo form_open("account_controller/resetPwSubmit","post");?><br>
			<h1>Reset Your Password</h1><br>
            <?php echo form_input(['type'=>'password', 'name'=>'New_Password', 'placeholder'=>'New Password'])?>
          <div class="error">
            <?php if(!empty($this->errors['New_Password'])):?>
            <?php echo $this->errors['New_Password'];?>
            <?php endif;?>
          </div>

          <?php echo form_input(['type'=>'password', 'name'=>'Confirm_Password', 'placeholder'=>'Confirm Password'])?>
          <div class="error">
            <?php if(!empty($this->errors['Confirm_Password'])):?>
            <?php echo $this->errors['Confirm_Password'];?>
            <?php endif;?>
          </div>

            <input type="submit" class="login" value="RESET">
           
        <?php echo form_close();?>
	</div>
</div>
<script>
 var session = eval('(<?php echo json_encode($_SESSION)?>)');
 console.log(session);



</script>

</body>
</html>