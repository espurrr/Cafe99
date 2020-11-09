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

    <?php echo link_css("css/profile_update.css"); ?>
    <?php echo link_css("css/header.css?"); ?>
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
  </head>
  <body>

  <?php include 'header.php';?>
  <div class="profile">
    <?php echo form_open("","post",['class'=>'update_form']);?><br>  
    <!-- the class didn't get named??? -->
      <h2 id="update-heading">PROFILE</h2>
      <div class="update-details">
        <p type="Name">  <?php echo form_input(['type'=>'text', 'name'=>'username', 'placeholder'=>''])?></p>
        <p type="Email">  <?php echo form_input(['type'=>'email', 'name'=>'email', 'placeholder'=>''])?></p>
        <p type="Phone number"><?php echo form_input(['type'=>'tel', 'name'=>'phone', 'placeholder'=>''])?></p>
        <p type="Address Line 1"><?php echo form_input(['type'=>'text', 'name'=>'address1', 'placeholder'=>''])?></p>
        <p type="Address Line 2"><?php echo form_input(['type'=>'text', 'name'=>'address2', 'placeholder'=>''])?></p>
        <p type="City"><?php echo form_input(['type'=>'text', 'name'=>'city', 'placeholder'=>''])?></p>
        <br><input type="button" class="save_changes" value="SAVE CHANGES">
      </div>
    <?php echo form_close();?>
    
</div>

  </body>
</html>
