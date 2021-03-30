<html>
<title>Delivery Person Dashboard</title>
<head> 

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo link_css("css/deliveryperson/dpstyle.css?ts=<?=time()?>");?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <?php echo link_css("css/deliveryperson/modal.css?ts=<?=time()?>");?>
  <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
  <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
  <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>

  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 </head>

   
<body style="background: #FAD74E url(<?php echo BASE_URL;?>/public/images/texture.png) repeat;">
  <?php include 'del_order_popup.php';?>
 
  <input type="checkbox" id="menu">

  <nav style="background: #FAD74E url(<?php echo BASE_URL;?>/public/images/texture.png) repeat;">
  <div class="header" style="height:2px;">
 <!-- <p>Dashboard</p>-->
  <img class="logo" id="mlogo" src="<?php echo BASE_URL?>/public/images/logo.png" style="height:58px;">
  </div>

  <label for="menu" class="menu-bar">
           
  <i class="fa fa-bars" ></i>
           
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
            <!--    <li><a href="#">LogOut</a></li>-->
                <li><?php echo anchor("delivery_controller/logout", "Logout") ?></li>
            </ul>

  </div>

  <div  class="Dp-content">

  

  <div class="icons">
 <!-- <a class="active" href="neworders.php" button class="btn">New<i class='fas fa-clipboard-list' style="font-size:24px;padding-right:40px"></i></button> </a>-->
 <?php echo anchor("delivery_controller/index", "New",['class'=>"add active"]) ?>
<!--  <a href="ondelivery.php" button class="btn"><i class='fas fa-biking' style="font-size:24px;padding-right:40px"></i></button> </a>-->
<?php echo anchor("delivery_controller/ondelivery", "On delivery",['class'=>"add"]) ?>
<!--  <a href="dispatched.php" button class="btn"><i class='fas fa-clipboard-check' style="font-size:24px"></i></button> </a>-->
<?php echo anchor("delivery_controller/dispatched", "Dispatched",['class'=>"add"]) ?>
  </div>

<div class="page-title">
<!-- <h2 class="title">New Orders</h2> -->
</div>

  <div class="status-msg-wrapper">
    <div class="status-msg" style="margin-bottom:20px">
        <?php $this->flash('orderUpdateSuccessEmailSent','alert alert-success','fa fa-check'); ?>
        <?php $this->flash('orderUpdateSuccessEmailNotSent','alert alert-danger','fa fa-times-circle'); ?>

        <div id="status_msg_break"></div>
        <?php $this->flash('databaseError','alert alert-warning','fa fa-times-circle'); ?>
        <?php $this->flash('noNewOrderError','alert alert-warning','fa fa-info-circle'); ?>
    </div>
  </div>

  <!-- <div class="list">
   <ul>
    <li>Order No</li>
    <li>Customer Name</li>
    <li>Customer Address</li>
    <li class="action">Action</li>
  </ul> -->

  <?php
    /*    $order = new dp_model; 
        foreach($data as $row){
          echo "<ul>";
          echo "<li>".$row->Order_ID."</li>";
          echo "<li>".$row->User_name."</li>";
          echo "<li>".$row->Delivery_address."</li>";
          echo "<li>".$row->Order_ID."</li>";
          echo "</ul>";
        }*/
  ?>  

  <?php
        $concat_data = [];
        $cust_names = [];
        $cust_address = [];
        
        foreach ($data as $row){
          // Foodname and quantity are concatenated under each order_id
          $concat_data[$row->Order_ID] .= $row->Food_name."-".$row->Quantity.","; 
          $cust_names[$row->Order_ID] = $row->User_name;
          $cust_address[$row->Order_ID] = $row->Delivery_Address;
        }

        foreach($concat_data as $order_id => $values){
            $concat_data[$order_id] = rtrim($concat_data[$order_id],",");
        }
  ?>

  <?php
  // $order = new dp_model; 
  foreach($concat_data as $order_id => $values):

  ?> 

<table class="order_table">
  <tr>
    <th>Order ID</th>
    <td><?php echo $order_id; ?></td>
  </tr>
  <tr>
    <th>Customer name</th>
    <td ><div class="cust_name"><?php echo $cust_names[$order_id] ?></div></td>
  </tr>
  <tr>
    <th>Address</th>
    <td><div class="cust_address"><?php  echo str_replace("$", "," ,$cust_address[$order_id] ) ?></div></td>
  </tr>
  <tr class="btn_row">
    <th class="view_btn_th">
      <button id="view-btn" class="view_btn" onclick='showModal(<?php echo json_encode(str_replace("$", "," ,$cust_address[$order_id] ))?>, <?php echo json_encode($values)?>)'><i class="fa fa-eye"></i></button>
    </th>

    <td class="update_btn_td">
        <?php echo form_open("delivery_controller/updateOrderStatusNew","POST");?>
            <button class="update_btn" name="neworders" value="<?php echo $order_id;?>"><i class="fa fa-check-square"></i></button>
        <?php echo form_close();?>
    </td>
  </tr>
</table>

  <?php
    endforeach;
  ?>     

<!--following row is not get from database -->
  
  
   <!-- <li data-label="order no">1</li>
    <li data-label="customer name"><p>Ishan Senanayaka</p></li>
    <li data-label="customer address"><p>No.25,<br>New Rd,<br>Maharagama.</p></li>
    <li data-label="action"><a href="#" onclick="showModal(50)"><i class="fa fa-eye" style="font-size:24px;"></i></a>
    <a href="#"><i class="fa fa-check-square" style="font-size:24px;"></i></a></li>-->
 
    



 


</div>
<!--<?php // include '../application/views/footer/footer_3.php';?> -->   
<?php echo link_js("js/deliveryperson/modal.js?ts=<?=time()?>");?>
<script>
    var num_of_alerts = document.getElementsByClassName("alert").length;
    // alert("Elements: " + num_of_alerts);
    if(num_of_alerts == 2){
        var br_tag = document.createElement('br');
        document.getElementById("status_msg_break").appendChild(br_tag);
    }
    
</script>
</body>

</html>
  
    