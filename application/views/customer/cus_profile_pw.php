<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/profile.css?ts=<?=time()?>"); ?>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  </head>
  <body style="background: #fff url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
<!-- loader
<div class="progress">
  <div class="indeterminate"></div>
</div> -->

<?php include '../application/views/header/cust-logged-in-header.php';?>

<ul id="breadcrumbs">
    
    <li><?php echo anchor("customer_controller/myprofile", "Profile Menu") ?></li>
    <li>Reset Password</li>
  
</ul>
  <div class="profile">
 
  <?php echo form_open("","post",['class'=>'update_form']);?><br>  
    <!-- the class didn't get named??? -->
  <h2 id="update-heading">RESET PASSWORD</h2>
  <div class="update-details">
  <p type="Current Password">  <?php echo form_input(['type'=>'password', 'name'=>'curr_password', 'placeholder'=>''])?></p>
  <!-- <p type="Current Password"><input type="password"></input></p> -->
  <p type="New Password">  <?php echo form_input(['type'=>'password', 'name'=>'new_password', 'placeholder'=>''])?></p>
  <p type="Confirm New Password">  <?php echo form_input(['type'=>'password', 'name'=>'confirm_password', 'placeholder'=>''])?></p>

  <br><input type="button" class="save_changes" value="SAVE CHANGES">
  
</div>

  </div>
</form>

  </body>
</html>
