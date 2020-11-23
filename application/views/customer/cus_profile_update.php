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

    <?php echo link_css("css/profile.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
 
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
    <li>Update Profile</li>
  
</ul>

  <div class="profile">
    <?php echo form_open("customer_controller/profile_update_save","post",['class'=>'update_form']);?><br>  
 
      <h2 id="update-heading">PROFILE</h2>
      <div class="update-details">
        <p type="Name">  <?php echo form_input(['type'=>'text', 'name'=>'User_name', 'value'=>$data->User_name])?></p>
        <p type="Email">  <?php echo form_input(['type'=>'email', 'name'=>'Email_address', 'value'=>$data->Email_address, 'placeholder'=>$data->Email_address,'readonly'=>'readonly'])?></p>
        <p type="Phone number"><?php echo form_input(['type'=>'tel', 'name'=>'Phone_no', 'value'=>$data->Phone_no ,'placeholder'=> $data->Phone_no])?></p>
        <p type="Address Line 1"><?php echo form_input(['type'=>'text', 'name'=>'AddressLine1', 'value'=>$data->AddressLine1, 'placeholder'=> $data->AddressLine1])?></p>
        <p type="Address Line 2"><?php echo form_input(['type'=>'text', 'name'=>'AddressLine2', 'value'=>$data->AddressLine2, 'placeholder'=> $data->AddressLine2])?></p>
        <p type="City"><?php echo form_input(['type'=>'text', 'name'=>'City', 'value'=>$data->City, 'placeholder'=> $data->City])?></p>
        <br><input type="submit" class="save_changes" value="SAVE CHANGES">
      </div>

    <?php echo form_close();?>
    
</div>

  </body>
</html>
