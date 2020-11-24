
<!DOCTYPE html>
<html lang="en" >
<head>

  <!-- Content -->
  <meta charset="UTF-8">
  <title>Favorites</title>
  <?php echo link_css("css/cust-favorites.css?ts=<?=time()?>"); ?>
  <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
  <?php echo link_css("css/customer/myorders_repeat_popup.css?ts=<?=time()?>"); ?>
  <?php echo link_css("css/cust-myorders.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  

   <!-- Jquery link -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


</head>

<body style="background: rgb(247, 239, 193) url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
  <?php include '../application/views/header/cust-logged-in-header.php';?>
  <ul class="breadcrumb">
        <li><?php echo anchor("account_controller/index", "Home") ?></li>
        <li>My Orders</li>
  </ul>
  <!-- Pop up modal starts here -->

  <div id="popup-window" class="popup-window">
        <div class="win-content">
            <span class="close-btn" id="close-btn"><i class="fas fa-times"></i></span>
            <p id="orderNo"></p>
            <div class="win-table">
                <table>
                    <colgroup>
                        <col span="" class="col-food">
                        <col span="" class="col-quantity">
                    </colgroup>
        
                    <tr>
                        <th>Food item</th>
                        <th>Quantity</th>
                    </tr>
        
                    <tr>
                        <td>Tuna Sandwich</td>
                        <td ><div class="quantity">2</div></td>
                    </tr>
                    <tr>
                        <td>Iced Coffee</td>
                        <td ><div class="quantity">1</div></td>
                    </tr>
                </table>
                <p class="amount">Amount : LKR 680</p>

                <div class="popup-btn-container">
                    <button class="popup-btn btn av-btn" onclick="showModal(5019)">Check Availability</button>
                    <button class="popup-btn tooltip btn order-now-btn" onclick="showModal(5019)">Order now! <span class="tooltiptext">Your order will be automatically made for you with the same payment method and info</span></button>
                </div>
            </div>
        </div>
    </div>
    <!-- Pop up modal ends here -->
  
<div class="tabcontent" style="display: block;">
          <table>
  <caption>My Orders</caption>
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Date</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Order Status</th>
      <th scope="col">Amount</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="Order ID" >5019</td>
      <td data-label="Date">23/11/2020</td>
      <td data-label="Payment Status">Cash on Service</td>
      <td data-label="Order Status">Preparing</td>
      <td data-label="Amount">LKR 680</td>
      <td><div class="btn-container">
      <button class="repeat-btn btn tooltip" onclick="showModal(5019)">Repeat <span class="tooltiptext">Gets you to the repeat order window</span></button>
        </div></td>
    </tr>
    <tr>
      <td data-label="Order ID" >5259</td>
      <td data-label="Date">24/11/2020</td>
      <td data-label="Payment Status">Cash on Service</td>
      <td data-label="Order Status">Preparing</td>
      <td data-label="Amount">LKR 680</td>
      <td><div class="btn-container">
      <button class="repeat-btn btn tooltip" onclick="showModal(5259)">Repeat <span class="tooltiptext">Gets you to the repeat order window</span></button>
    
        </div></td>
    </tr>
 
  </tbody>
</table>
</div>
    </div>
  
  <!-- <?php include '../application/views/footer/footer_1.php';?> -->
  <?php echo link_js("js/cust_myfavs.js"); ?>

  <script>
        var popup_win = document.getElementById("popup-window");
        var view_btn = document.getElementById("view-btn");
        var close_btn = document.getElementById("close-btn");

        function showModal(id){
          popup_win.style.display = "block";
          document.getElementById("orderNo").innerHTML = "Order No: " + id;

        }
        close_btn.onclick = function() {
            popup_win.style.display = "none";
        }

        window.onclick = function(event) {
          if (event.target == popup_win) {
            popup_win.style.display = "none";
          }
        }

  </script>
</body>
</html>