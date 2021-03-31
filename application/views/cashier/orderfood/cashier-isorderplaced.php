<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <?php echo link_css("css/cashier/cashier_cart.css"); ?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cashier/newsfeed/sidebar.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/customer/order_success_popup.css?"); ?>

    <title>Cart</title>
</head>
<body>
    <div class="page-container" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
    <?php include "sidebar.php";?>
    <?php include "../application/views/header/header-dashboard.php";?> 

 <!-- Pop up modal starts here -->
 <div id="popup-window" class="popup-window">
        <div id="win-content-wrapper"class="win-content-wrapper">
            <div class="win-content">
                <div class="win-table">
                    <?php if($data['Status'] == "success"): ?>
                    <i class="fas fa-check fa-8x"></i>
                    <p class="para">Order has been placed successfully</p>

                    <div class="popup-btn-container">
                        <a href="<?php echo BASE_URL?>/cashier_controller/mycart"><button id="ok-btn" class="popup-btn btn av-btn">OK</button></a>

                    </div>
                    <?php endif; ?>
                    
                    <?php if($data['Status'] == "failed"): ?>
                    <i class="fas fa-times fa-8x"></i>
                    <p class="para">Sorry! Order has been Failed.</p>

                    <div class="popup-btn-container">
                        <a href="<?php echo BASE_URL?>/cashier_controller/mycart"><button id="ok-btn" class="popup-btn btn av-btn">OK</button></a>

                    </div>
                    <?php endif; ?>

                </div>
            </div>
        </div>
         </div>
    <!-- Pop up modal ends here -->

    <div class="cart-container">

        <div class="overlay" id="overlay"></div>
        
       
    </div>
    <?php include '../application/views/footer/footer_3.php';?>

    <script>
        // Modal script
        document.getElementById('float').addEventListener('click', function() {
            document.getElementById('overlay').classList.add('is-visible');
            document.getElementById('modal').classList.add('is-visible');
        });

        document.getElementById('close-btn').addEventListener('click', function() {
            document.getElementById('overlay').classList.remove('is-visible');
            document.getElementById('modal').classList.remove('is-visible');
        });
        document.getElementById('overlay').addEventListener('click', function() {
            document.getElementById('overlay').classList.remove('is-visible');
            document.getElementById('modal').classList.remove('is-visible');
        });


    </script>

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
                location.href = "<?php echo BASE_URL?>/cashier_controller/mycart";
            }
    </script>
</body>
</html>