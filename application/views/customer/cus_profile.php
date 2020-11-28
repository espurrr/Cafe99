
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/profile.css?ts=<?=time()?>"); ?>
    <!-- <?php echo link_css("css/header.css?"); ?> -->
	<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
</head>
<body style="background: rgb(247, 239, 193) url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
<!-- loader
<div class="progress">
  <div class="indeterminate"></div>
</div> -->
<div class="page-container">
<div class="content-wrapper">
<?php include '../application/views/header/cust-logged-in-header.php';?>

<ul class="breadcrumb">
        <li><?php echo anchor("account_controller/index", "Home") ?></li>
        <li>My Profile</li>
</ul>

<div class="alertMessage">
        <?php $this->flash('updateError','alert alert-danger','fa fa-times-circle'); ?>
        <?php $this->flash('updateSuccess','alert alert-success','fa fa-check'); ?>
</div>

<div class="profile_container">
	<div class="avatar">
		<a href=#>
        <img src="<?php echo BASE_URL;?>/public/images/img_avatar.png">
		</a>
	</div>
	<div class="content">
        <ul id="menu">
            <li><?php echo anchor("customer_controller/myprofile/update", "Update Profile") ?></li>
            <li><?php echo anchor("customer_controller/myprofile/resetpw", "Reset Password") ?></li>
            <li><?php echo anchor("customer_controller/myprofile/deactivate", "Deactivate Account") ?></li>
            <!-- <a href="#" target="_blank"><li>More</li></a> -->
        </ul>
	</div>
</div>


</div><!-- content-wrapper ends-->
<?php include '../application/views/footer/footer_1.php';?>
</div> <!-- page-contianer ends-->
</body>
</html>