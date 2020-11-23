<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/profile.css?ts=<?=time()?>"); ?>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  </head>
  <body style="background: rgb(247, 239, 193) url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
<!-- loader
<div class="progress">
  <div class="indeterminate"></div>
</div> -->

<?php include '../application/views/header/cust-logged-in-header.php';?>

<ul class="breadcrumb">
    
    <li><?php echo anchor("customer_controller/myprofile", "Profile Menu") ?></li>
    <li>Reset Password</li>
  
</ul>

<div class="alertMessage">
        <?php $this->flash('currPwWarning','alert alert-warning','fa fa-warning'); ?>
        <?php $this->flash('pwSucess','alert alert-success','fa fa-check'); ?>
</div>

  <div class="profile">
 
  <?php echo form_open("customer_controller/resetpw_save","post",['class'=>'update_form']);?><br>  
    <!-- the class didn't get named??? -->
  <h2 id="update-heading">RESET PASSWORD</h2>
  <div class="update-details">
  <p type="Current Password">  <?php echo form_input(['type'=>'password', 'name'=>'User_Password', 'placeholder'=>''])?></p>
  <div class="error">
    <?php if(!empty($this->errors['User_Password'])):?>
    <?php echo $this->errors['User_Password'];?>
    <?php endif;?>
  </div>
  <!-- <p type="Current Password"><input type="password"></input></p> -->
  <p type="New Password">  <?php echo form_input(['type'=>'password', 'name'=>'New_Password', 'placeholder'=>''])?></p>
  <div class="error">
    <?php if(!empty($this->errors['New_Password'])):?>
    <?php echo $this->errors['New_Password'];?>
    <?php endif;?>
  </div>

  <p type="Confirm New Password">  <?php echo form_input(['type'=>'password', 'name'=>'Confirm_Password', 'placeholder'=>''])?></p>
  <div class="error">
    <?php if(!empty($this->errors['Confirm_Password'])):?>
    <?php echo $this->errors['Confirm_Password'];?>
    <?php endif;?>
  </div>

  <br><input type="submit" class="save_changes" value="SAVE CHANGES">
  
</div>

  </div>
</form>

  </body>
</html>
