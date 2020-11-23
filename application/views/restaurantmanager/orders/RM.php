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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>
</head>
<body>
<div class="page-container">
<?php include "order_sidebar.php"; ?> 
<div class="content-wrapper">
 <?php include  "../application/views/header/header-dashboard.php";?>
    
     <!-- Delete pop up modal starts here -->
 <div id="popup-window" class="popup-window">
                <div class="win-content">
                    <p id="favNo"></p>
                    <div class="btn-container">
                        <button class="btn cancel-btn" id="modal-cancel-btn">Cancel</button>
                        <button class="btn delete-btn" id="modal-delete-btn" data-id="" >Delete</button>
                    </div>
                </div>
          </div>
  <!-- Delete pop up modal ends here -->
    
    
    <div class="wrapper">
        
         <div class="admin-content">
            
       <!--     <a href="RM.php" class="button">Manage Orders</a>-->
            <?php echo anchor("rm_controller/orders", "Manage Orders",['class'=>"button"]) ?>
         <!--   <a href="create.php" class="button">Add Orders</a>-->
            <?php echo anchor("rm_controller/orderscreate", "Add Orders",['class'=>"button"]) ?>

            <div class="search-container">
            <form action="#">
      <input type="text" style="width:79%" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

             <div class="content">
                 <h2 class="page-title">Manage Orders</h2>
                 <div style="overflow-x:auto;">
                 <table>
                     <thead>
                     <th>Order DateTime</th>
                     <th>Total Price</th>
                     <th>Special Notes</th>
                     <th>Payment Method</th>
                     <th>Order Status</th>
                     <th>Order Type</th>
                     <th>Dispatch Time</th>
                     <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>2020.10.11</td>
                            <td>1000</td>
                            <td></td>
                            <td>Payhere</td>
                            <td>Completed</td>
                            <td>Delivery</td>
                            <td>12.30 p.m</td>
                         <!--   <td><a href="edit.php" class="edit">Edit</a></td>-->
                            <td><?php echo anchor("rm_controller/ordersedit", "Edit",['class'=>"edit"]) ?></td> 
                            <td><a href="#" class="delete" onclick='showDeleteModal()'>Delete</a></td>
                            
                        </tr>

                      
                    </tbody>
                 </table>
                 </div>
             </div>
            </div>
        
       
    </div>
    <?php  include '../application/views/footer/footer_3.php';?>    
    </div>
    <?php echo link_js("js/restaurantmanager/delete.js"); ?>   
</body>
</html>