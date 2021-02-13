
<!DOCTYPE html>
<html>
<head>
    <title>Profile</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;1,200;1,300;1,400;1,500&display=swap" rel="stylesheet">
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
   
    <!-- <?php echo link_css("css/header.css?"); ?> -->
    <?php echo link_css("css/customer/order_success_popup.css?"); ?>
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


   <!-- Pop up modal starts here -->
<div id="popup-window" class="popup-window">
        <div id="win-content-wrapper"class="win-content-wrapper">
            <div class="win-content">
                <div class="win-table">
                    <?php if($data['Status'] == "success"): ?>
                    <i class="fas fa-check fa-8x"></i>
                    <p class="para">Congratulations! Your order has been placed successfully.<br><br>We have emailed you the order details. <br>Please Check inbox.</p>

                    <div class="popup-btn-container">
                        <a href="<?php echo BASE_URL?>/customer_controller/myorders"><button id="ok-btn" class="popup-btn btn av-btn">OK</button></a>

                    </div>
                    <?php endif; ?>
                    
                    <?php if($data['Status'] == "failed"): ?>
                    <i class="fas fa-times fa-8x"></i>
                    <p class="para">Sorry! Your order has been Failed.</p>

                    <div class="popup-btn-container">
                        <a href="<?php echo BASE_URL?>/customer_controller/myorders"><button id="ok-btn" class="popup-btn btn av-btn">OK</button></a>

                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
         </div>
    <!-- Pop up modal ends here -->


</div><!-- content-wrapper ends-->
<?php include '../application/views/footer/footer_1.php';?>
</div> <!-- page-contianer ends-->



<script>//order successful modal
        var popup_win = document.getElementById("popup-window");
        var ok_btn = document.getElementById("ok-btn");
        var win_content_wrapper = document.getElementById("win-content-wrapper");

        function showModal(){
          popup_win.style.display = "block";
        }
        ok_btn.onclick = function() {
            popup_win.style.display = "none";
        }

        window.onclick = function(event) {
            location.href = "<?php echo BASE_URL?>/customer_controller/myorders";
        }
</script>

</body>



</html>