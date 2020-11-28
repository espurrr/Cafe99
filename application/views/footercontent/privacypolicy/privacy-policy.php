<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Privacy and Policy</title>
    <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_1.css?ts=<?=time()?>"); ?>
  <!--  <link rel="stylesheet" href="privacy-policy.css">-->
  <?php echo link_css("css/footercontent/privacypolicy/privacy-policy.css?ts=<?=time()?>"); ?>
  <!--  <link rel="stylesheet" href="sidebar.css">-->
  <?php echo link_css("css/footercontent/privacypolicy/sidebar.css.css?ts=<?=time()?>"); ?>
</head>
<body style="background: #fff url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
<div class="page-container">
<div class="content-wrapper" >

<?php   
        if ($this->get_session('role')=='customer'){
            include '../application/views/header/cust-logged-in-header.php';
        }else{
            include '../application/views/header/header.php';
        }
    ?> 
<?php //include "sidebar.php";?>
<div class="wrapper">
<div class="privacy-content">
<h1>Privacy Policy</h1>
     <br><br>
     <p>1.Information You Give Us: We receive and store any information you enter on this Web site or give us in any other way. You can choose not to provide certain information, but then you might not be able to take advantage of many of our features. We use the information that you provide for such purposes as responding to your requests, customizing future shopping for you and communicating with you.</p><br>
 <p>2.Automatic Information: We receive and store certain types of information whenever you interact with us. For example, like many Web sites, we use "cookies," and we obtain certain types of information when your Web browser accesses any of our websites or advertisements and other content served by or on behalf of us on other Web sites.</p><br>   
<p>3.E-mail Communications: To help us make e-mails more useful and interesting, we often receive a confirmation when you open e-mail from us if your computer supports such capabilities. If you do not want to receive e-mail or other mail from us, you could use the unsubscribe option available in every mail we send.</p><br>  
<p>4.Mobile Communications; We will use the contact numbers provided to ensure the hamper delivery a success. However, the contact details will be used as a mode to communicate certain information which will be beneficial to improve your customer experience.</p><br>
<p>5.Third-Party Service Providers: We employ other companies and individuals to perform functions on our behalf. Examples; delivering packages and processing credit card payments. They have access to personal information needed to perform their functions, but may not use it for other purposes.</p>  
</div>
</div>
</div><!-- content-wrapper ends-->
<?php include '../application/views/footer/footer_1.php';?> 
</div> <!-- page-contianer ends-->   
</body>
</html>