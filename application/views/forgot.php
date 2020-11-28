<!DOCTYPE html>
<html>
  <head>
    <title>Sign up to Cafe99</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500&display=swap"
      rel="stylesheet"
    />

    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/signup.css?ts=<?=time()?>"); ?>
    
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  </head>
  <body style="background:  #1fb4be url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
  <div class="page-container">
  <div class="content-wrapper">
    <!-- Header starts -->

    <?php include '../application/views/header/header.php'?>

    <!-- Header finished -->

    <!-- auth message -->
    <div class="authMessage">
        <?php $this->flash('linkSentSuccess','alert alert-info','fa fa-info-circle'); ?>
        <?php $this->flash('resetEmailError','alert alert-danger','fa fa-times-circle'); ?>
        <?php $this->flash('resetPwError','alert alert-danger','fa fa-times-circle'); ?>

    </div>

    <div class="parent-container" id="p-container">
      <div class="sign-up-container">
          <?php echo form_open("account_controller/forgotSubmit","post");?>
          <h1>Recover your Account</h1><br><br>
          <p>We'll send a recovery link to your email</p><br>
          
          <?php echo form_input(['type'=>'email', 'name'=>'Email_address', 'placeholder'=>'Email*' ,'value'=>$this->set_value('Email_address')])?>
          <div class="error">
            <?php if(!empty($this->errors['Email_address'])):?>
            <?php echo $this->errors['Email_address'];?>
            <?php endif;?>
          </div>

          <input type="submit" class="join" value="Email me">

          <?php echo form_close();?>
      </div>
    </div>
    </div><!-- content-wrapper ends-->
    <?php include '../application/views/footer/footer_1.php';?>
    </div> <!-- page-contianer ends-->
  </body>
</html>






