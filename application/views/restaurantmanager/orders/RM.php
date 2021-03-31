<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/restaurantmanager/orders/order_sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/admin.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/modal/delete_modal.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</head>
<body>
<div class="page-container">
<?php include "order_sidebar.php"; ?> 
<div class="content-wrapper">
 <?php include  "../application/views/header/header-dashboard.php";?>
    
  <!-- Delete pop up modal starts here -->
  <div id="popup-window" class="popup-window">
        <div class="win-content-wrapper">
            <div class="win-content">
                <p id="message">Are you sure you want to delete?</p>
                <div class="btn-container">
                    <div class="btn-wrapper">
                        <button class="btn cancel-btn" id="modal-cancel-btn">Cancel</button>
                        <button class="btn delete-btn" id="modal-delete-btn">Delete</button>
                    </div>
                </div>
            </div>
        </div><!-- win-content-wrapper ends here -->
    </div><!-- popup=window ends here -->
  <!-- Delete pop up modal ends here -->
    
    
    <div class="wrapper">
        
         <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
            
       <!--     <a href="RM.php" class="button">Manage Orders</a>-->
            <?php //echo anchor("rm_controller/orders", "Manage Orders",['class'=>"button"]) ?>
         <!--   <a href="create.php" class="button">Add Orders</a>-->
            <?php //echo anchor("rm_controller/createOrders", "Add Orders",['class'=>"button"]) ?>

            <div class="search-container">
                <?php echo form_open("rm_controller/searchOrders", "POST");?>
                    <input type="text" placeholder="Search by Order ID" style="width:79%" name="search" value="<?php if($order_Id != "") echo $order_Id; ?>">
                    <button type="submit"><i class="fa fa-search"></i></button>
                <?php echo form_close();?>
            </div>

             <div class="content">
                <!-- <h2 class="page-title">Manage Orders</h2>-->
                 <h2 class="page-title">Order Details</h2>

                 <div class="status-msg-wrapper">
                    <div class="status-msg" style="margin-bottom:20px">
                        <?php $this->flash('RM_order_databaseError','alert alert-danger','fa fa-times-circle'); ?>
                        <?php $this->flash('RM_order_NotFound','alert alert-warning','fa fa-times-circle'); ?>
                        <?php $this->flash('OrderSuccess','alert alert-success','fa fa-check'); ?>
                        <?php $this->flash('updateSuccess','alert alert-success','fa fa-check'); ?>
                    </div>
                </div> <!-- status-msg-wrapper ends here -->

                 <div style="overflow-x:auto;">
                 <table>
                     <thead>
                     <th>Order ID</th>
                     <th>Date & Time</th>
                     <th>Total Price</th>
                     <th>Special Notes</th>
                     <th>Payment Method</th>
                     <th>Order Type</th>
                     <th>Dispatch Time(Delivery or Kitchen)</th>
                   <!--  <th>Delivery Dispatched</th>-->
                   <!--  <th colspan="2">Action</th>-->
                    </thead>
                    <tbody>
                <?php foreach($data as $row): ?>
                        <tr>
                            <td><?php echo $row->Order_ID ?></td>
                            <td><?php echo substr($row->Order_Date_Time,0,16) ?></td> 
                            <td><?php echo $row->Total_price ?></td>
                            <td><?php echo $row->Special_notes ?></td>
                            <td><?php echo $row->Payment_method ?></td>
                            <td><?php echo $row->Order_type ?></td>
                            <?php if($row->Order_type=="delivery"){?>
                            <td><?php echo $row->Delivery_Dispatch_DateTime ?></td>
                            <?php } else{ ?>
                            <td><?php echo $row->Kitchen_Dispatch_DateTime?></td>
                            <?php } ?>
                         <!--   <td><a href="edit.php" class="edit">Edit</a></td>-->
                            <td><?php //echo anchor("rm_controller/order_update_values?Order_ID=".$row->Order_ID."", "Edit",['class'=>"edit"]) ?></td> 
                           <!-- <td><a class="delete" onclick='showDeleteModal(<?php echo $row->Order_ID?>)'>Delete</a></td>-->
                            
                        </tr>
                <?php endforeach ?>
                      
                    </tbody>
                 </table>
                 </div>
             </div>
            </div>
        
       
    </div>
    <?php  include '../application/views/footer/footer_3.php';?>    
    </div>
    <?php echo link_js("js/restaurantmanager/delete/order_delete.js"); ?>   
</body>
</html>