<!DOCTYPE html>
<html>
  <head>
    <title>Profile</title>
    <link
      href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500&display=swap"
      rel="stylesheet"
    />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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
    <li>Deactivate Account</li>
  
</ul>
  <div class="profile">
    <?php echo form_open("","post",['class'=>'update_form']);?><br>  
    <!-- the class didn't get named??? -->
      <h2 id="update-heading">DEACTIVATE ACCOUNT</h2>
      <div class="update-details">
        <p> Please type 'GOODBYE' if you wish to deactivate your account..</p>
         <?php echo form_input(['type'=>'text', 'name'=>'bye', 'placeholder'=>''])?><br><br>
        <br><input type="button" class="delete" value="DELETE">
      </div>
    <?php echo form_close();?>
    
</div>
</body>
</html>