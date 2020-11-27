<!DOCTYPE html>
<html>
<head>
    <title>Login to Cafe99</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/signup.css?ts=<?=time()?>"); ?>
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body style="background:  #d4c4e9 url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
<div class="page-container">
<div class="content-wrapper">
<?php include '../application/views/header/header.php'?>

<!-- auth message -->
<div class="authMessage">
    <?php $this->flash('signupSuccess','alert alert-info','fa fa-info-circle'); ?>
    <?php $this->flash('loginError','alert alert-danger','fa fa-times-circle'); ?>
    <?php $this->flash('activationError','alert alert-danger','fa fa-times-circle'); ?>
    <?php $this->flash('tokenError','alert alert-danger','fa fa-times-circle'); ?>
    <?php $this->flash('activationSuccess','alert alert-success','fa fa-check'); ?>
    <?php $this->flash('notActivatedYetInfo','alert alert-info','fa fa-info-circle'); ?>
    <?php $this->flash('passwordResetSuccess','alert alert-success','fa fa-check'); ?>
    
</div>


<div class="parent-container" id="p-container">
      <div class="sign-up-container">
		<?php echo form_open("account_controller/loginSubmit","post");?><br>
			<h1>Log In</h1><br>
            <?php echo form_input(['type'=>'email', 'name'=>'Email_address', 'placeholder'=>'Email' ,'value'=>$this->set_value('Email_address')])?>
            <div class="error">
            <?php if(!empty($this->errors['Email_address'])):?>
            <?php echo $this->errors['Email_address'];?>
            <?php endif;?>
          </div>

          <?php echo form_input(['type'=>'password', 'name'=>'User_Password', 'placeholder'=>'Password*'])?>
          <div class="error">
            <?php if(!empty($this->errors['User_Password'])):?>
            <?php echo $this->errors['User_Password'];?>
            <?php endif;?>
          </div>

            <?php echo anchor("account_controller/forgot", "Forgot Password?") ?>
            <!-- <a href="<?php echo BASE_URL;?>/account_controller/forgot">Forgot Password?</a> -->
            <input type="submit" class="login" value="LOG IN">
           
        <?php echo form_close();?>
	</div>
</div>
</div><!-- content-wrapper ends-->
<?php include '../application/views/footer/footer_1.php';?>
</div> <!-- page-contianer ends-->

<script>
 var session = eval('(<?php echo json_encode($_SESSION)?>)');
 console.log(session);



</script>

</body>
</html>