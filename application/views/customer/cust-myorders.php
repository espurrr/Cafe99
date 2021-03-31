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
<div class="page-container">
<div class="content-wrapper">
  <?php include '../application/views/header/cust-logged-in-header.php';?>
  <ul class="breadcrumb">
        <li><?php echo anchor("account_controller/index", "Home") ?></li>
        <li>My Orders</li> 
  </ul>

  <div class="ordersflash">
        <?php $this->flash('ItemsNotSufficient','alert alert-danger','fa fa-times-circle'); ?>
        <?php $this->flash('Orders404Error','alert alert-info','fa fa-info-circle'); ?>
  </div><br><br>



  <!-- Pop up modal starts here -->

  <div id="popup-window" class="popup-window">
        <div class="win-content">
            <span class="close-btn" id="close-btn"><i class="fas fa-times"></i></span>
            <p id="orderNo"></p>
            <div class="win-table">
                <table id="orderItems">
                    <colgroup>
                        <col span="" class="col-food">
                        <col span="" class="col-quantity">
                    </colgroup>
                    <thead>
                      <tr>
                         <th>Food item</th>
                         <th>Quantity</th>
                      </tr>
                    </thead>
                    <tbody id="rows">
                        <!-- items of the order will be filled in by JS script -->
                    </tbody>
                </table>
                <p id="popup_amount">Amount : LKR 680</p>

                <div class="popup-btn-container">
                    <!-- <button class="popup-btn btn av-btn" onclick="showModal(5019)">Check Availability</button> -->
                    <small>*The amount might be changed slightly due to variance of prices if any</small>   
                    <small>*The order recipient will be you</small> 
                    <small>*The order time will be set to 30 mins past current time</small>    
                    <small>*Payment should be done in cash</small>   
                    <small>*All other order details will remain same</small>  
                    <br>
                    <button id="reorder_now" class="popup-btn tooltip btn order-now-btn" >Order now! </button> 
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
      <th scope="col">Payment Method</th>
      <th scope="col">Order Status</th>
      <th scope="col">Amount</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
  <?php
    foreach($data as $row){
  ?>
    <tr>
      <td data-label="Order ID" ><?php echo $row->Order_ID; ?></td>
      <td data-label="Date"><?php echo $row->Date; ?></td>
      <td data-label="Payment Method"><?php echo $row->Payment_Method; ?></td>
      <td data-label="Order Status"><?php echo $row->Order_Status; ?></td>
      <td data-label="Amount">LKR &nbsp;<?php echo $row->Amount; ?></td>
      <td><div class="btn-container">
      <button class="repeat-btn btn tooltip" onclick="showModal(<?php echo $row->Order_ID; ?>,<?php echo  htmlspecialchars(json_encode($row->Item_list)) ;?>,<?php echo $row->Amount; ?>)">Re-order<span class="tooltiptext">Gets you to the repeat order window</span></button>
        <!-- Your HTML attribute value is delimited with " characters.The " in the data will cut off the attribute value.You need to encode your data (using htmlspecialchars) for embedding in HTML -->
    </div></td>
    </tr>

  <?php
    }
  ?>
 
  </tbody>
</table>
</div>
    </div>
  
    </div><!-- content-wrapper ends-->

</div> <!-- page-contianer ends-->
  <?php echo link_js("js/cust_reorder.js"); ?>

  <!-- <script>
        var popup_win = document.getElementById("popup-window");
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

  </script> -->
</body>
</html>
