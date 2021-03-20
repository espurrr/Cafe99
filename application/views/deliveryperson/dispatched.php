<html>
<title>Delivery Person Dashboard</title>
<head> 

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo link_css("css/deliveryperson/dpstyle.css?ts=<?=time()?>");?>
  <?php echo link_css("css/deliveryperson/modal.css?ts=<?=time()?>");?>
  <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
  <?php echo link_css("css/modal/delete_modal.css?ts=<?=time()?>"); ?>
  <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 </head>

   
<body>
 
  <input type="checkbox" id="menu">

  <nav>
  <div class="header" style="height:2px;">
 <!-- <p>Dashboard</p>-->
  <img class="logo" id="mlogo" src="<?php echo BASE_URL?>/public/images/logo.png" style="height:58px;">
  </div>

  <label for="menu" class="menu-bar">
           
  <i class="fa fa-bars"></i>
           
  </label>

  </nav>


  <div class="sidebar">
  <div class="profile-details">
             <div class="avatar"><i class="fa fa-user-circle"></i></div>
             <div class="profile-text">
              <!--  <p class="name">Kavinda Dias</p>-->
              <?= $this->get_session('user_name');?>
                <p class="role">Delivery Person</p>
            </div>
        </div>
            <ul>
                 <!--    <li><a class="active" href="./dporders.php">Orders</a></li> -->
            <li><?php echo anchor("delivery_controller/index", "Orders",['class'=>"active"]) ?></li>
            <!--    <li><a  href="./dp.php">News Feed</a></li>-->
            <li><?php echo anchor("delivery_controller/newsfeed", "News Feed") ?></li>
                
              <!--  <li><a href="#">LogOut</a></li>-->
              <li><?php echo anchor("delivery_controller/logout", "Logout") ?></li>
                
            </ul>

  </div>

  <div  class="Dp-content">
  <div class="icons">
  <!-- <a class="active" href="neworders.php" button class="btn">New<i class='fas fa-clipboard-list' style="font-size:24px;padding-right:40px"></i></button> </a>-->
  <?php echo anchor("delivery_controller/index", "New",['class'=>"add"]) ?>
<!--  <a href="ondelivery.php" button class="btn"><i class='fas fa-biking' style="font-size:24px;padding-right:40px"></i></button> </a>-->
<?php echo anchor("delivery_controller/ondelivery", "Ondelivery",['class'=>"add"]) ?>
<!--  <a href="dispatched.php" button class="btn"><i class='fas fa-clipboard-check' style="font-size:24px"></i></button> </a>-->
<?php echo anchor("delivery_controller/dispatched", "Dispatched",['class'=>" add active"]) ?>
  </div>

  <div class="page-title">
<!-- <h2 class="title">Dispatched Orders</h2> -->
</div>

  <div class="list">
  <ul>
    <li>Order No</li>
    <li>Customer Name</li>
    <li>Customer Address</li>
    <li>Action</li>
  </ul>

  <?php
  $order = new dp_model; 
  foreach($data as $row){  
  ?> 

<ul>
<li data-label="order no"><?php echo $row->Order_ID; ?></li>
<li data-label="customer name"><?php echo $row->User_name; ?></li>
<li data-label="customer address"><?php echo $row->Delivery_Address; ?></li>
<li data-label="action"><button class="btn" onclick="showModal(50)"><i class="fa fa-eye" style="font-size:24px;color:rgb(6, 132, 235);padding-right:20px"></i></button>
<button class="btn"><i class="fa fa-remove" style="font-size:24px;color: #f15852ee"></i></button></li>
 
</ul>

  <?php
  }
  ?>  

<!--following row is not get from database -->
  <ul>
    <li data-label="order no">1</li>
    <li data-label="customer name"><p>Ishan Senanayaka</p></li>
    <li data-label="customer address"><p>No.25,<br>New Rd,<br>Maharagama.</p></li>
    <li data-label="action"><a href="#" onclick="showModal(30)"><i class="fa fa-eye" style="font-size:24px;color:rgb(6, 132, 235);padding-right:20px"></i></a><a href="#"><i class="fa fa-remove" style="font-size:24px;color: #f15852ee"></i></a></li>
  
    <div id="popup-window" class="popup-window">
        <div class="win-content">
            <span class="close-btn" id="close-btn"><i class="fas fa-times"></i></span>
          <!--  <p id="orderNo"></p>-->
            <div class="win-table">
                <table>
                    <colgroup>
                        <col span="" class="col-food">
                        <col span="" class="col-quantity">
                      <!--  <col span="" class="col-paymentdetails">-->
                    </colgroup>
        
                    <tr>
                        <th>Food item</th>
                        <th>Quantity</th>
                     <!--   <th>Payment Details</th>-->
                    </tr>
        
                    <tr>
                        <td>Fish Roll</td>
                        <td ><div class="quantity">12</div></td>
                       
                    </tr>
                    <tr>
                        <td>Chicken Fried Rice</td>
                        <td ><div class="quantity">6</div></td>
                        
                    </tr>
                  </table>
            </div>
        </div>
    </div>
  
  </ul>

 

     
</div>
<!--<?php //include '../application/views/footer/footer_3.php';?> -->   
<?php echo link_js("js/deliveryperson/modal.js?ts=<?=time()?>");?>
<?php //echo link_js("js/deliveryperson/delete.js"); ?>
</body>

</html>
  
  
  