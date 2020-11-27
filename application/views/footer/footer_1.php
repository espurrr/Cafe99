<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <?php echo link_css("css/footer_1.css?ts=<?=time()?>"); ?>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
        <title>footer</title>
    </head>
<body>
      
    
<footer class="footer" id="footer" style="background: #fff url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
    <div class="container">
        <div class="footer__logo" >
            <a class="footer__logo__img" href="#">
                <img src="<?php echo BASE_URL?>/public/images/logo.png">
            </a>
        </div>
       
        <div class="footer__social" style="background: #fff url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
            <a href="#"><i class="fa fa-facebook-square"></i></a>
            <a href="#"><i class="fa fa-twitter-square"></i></a>
            <a href="#"><i class="fa fa-instagram"></i></a> 
        </div>
   
        <div class="footer__links col1">
        <!--    <a href="#">About Us</a>-->
            <?php echo anchor("footercontent_controller/aboutus", "About Us") ?>

         <!--   <a href="#">FAQs</a>-->

         <!--   <a href="#">Contact</a>-->
            <?php echo anchor("footercontent_controller/contact", "Contact") ?>
        </div>
  
        <div class="footer__links col2">
          <!--  <a href="#">Give Us Feedback</a>-->
            <?php echo anchor("footercontent_controller/feedback", "Give Us Feedback") ?>
            
          <!--  <a href="#">Privacy Policy</a>-->
            <?php echo anchor("footercontent_controller/privacypolicy", "Privacy Policy") ?>

        </div>
    </div> 
</footer>
</body>
</html>