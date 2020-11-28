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
  <body style="background:  rgb(156, 186, 221) url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
  <div class="page-container">
  <div class="content-wrapper">
    <!-- Header starts -->
    <?php include '../application/views/header/header.php'?>

    <!-- Header finished -->
        <!-- auth message -->
    <div class="authMessage">
        <?php $this->flash('activationEmailError','alert alert-danger','fa fa-times-circle'); ?>
        <?php $this->flash('signupError','alert alert-danger','fa fa-times-circle'); ?>
        <?php $this->flash('deactivateSuccess','alert alert-success','fa fa-check'); ?>
    </div>
    
    <div class="parent-container" id="p-container">
      <div class="sign-up-container">
          <?php echo form_open("account_controller/signupSubmit","post");?><br>
          <br />
          <h1>Sign up</h1>
          <br />
          <!-- <input type="text" name="username" placeholder="Name*" /> -->
          <?php echo form_input(['type'=>'text', 'name'=>'User_name', 'placeholder'=>'Name*', 'value'=>$this->set_value('User_name')])?>
          <div class="error">
            <?php if(!empty($this->errors['User_name'])):?>
            <?php echo $this->errors['User_name'];?>
            <?php endif;?>
          </div>

          <?php echo form_input(['type'=>'email', 'name'=>'Email_address', 'placeholder'=>'Email*' ,'value'=>$this->set_value('Email_address')])?>
          <div class="error">
            <?php if(!empty($this->errors['Email_address'])):?>
            <?php echo $this->errors['Email_address'];?>
            <?php endif;?>
          </div>
     
          <?php echo form_input(['type'=>'tel', 'name'=>'Phone_no', 'placeholder'=>'Phone number*', 'value'=>$this->set_value('Phone_no')])?>
          <div class="error">
            <?php if(!empty($this->errors['Phone_no'])):?>
            <?php echo $this->errors['Phone_no'];?>
            <?php endif;?>
          </div>

          <div class="form_tooltip"><span class="classic">Must contain at least 8 characters</span>
          <?php echo form_input(['type'=>'password', 'name'=>'User_Password', 'placeholder'=>'Password*'])?>
          </div>
          <div class="error">
            <?php if(!empty($this->errors['User_Password'])):?>
            <?php echo $this->errors['User_Password'];?>
            <?php endif;?>
          </div>
          
          <?php echo form_input(['type'=>'password', 'name'=>'confirm_password', 'placeholder'=>'Confirm Password*'])?>
          <div class="error">
            <?php if(!empty($this->errors['confirm_password'])):?>
            <?php echo $this->errors['confirm_password'];?>
            <?php endif;?>
          </div>

          <input type="submit" class="join" value="Join">
          
          <?php echo anchor("account_controller/login", "Already have an account?") ?>
          <!-- <a href="<?php echo BASE_URL;?>/account_controller/login">Already have an account?</a> -->
          <?php echo form_close();?>
      </div>
    </div>
    </div><!-- content-wrapper ends-->
    <?php include '../application/views/footer/footer_1.php';?>
    </div> <!-- page-contianer ends-->

  </body>
</html>
