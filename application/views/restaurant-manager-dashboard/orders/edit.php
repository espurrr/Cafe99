<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/order_sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/admin.css?ts=<?=time()?>"); ?>
</head>
<body>
<?php include "order_sidebar.php"; ?> 
<?php include "../../header/header-dashboard.php";?>
    <div class="wrapper">
       
             <div class="admin-content">
               
            <a href="RM.php" class="button">Manage Orders</a>
            <a href="create.php" class="button">Add Orders</a>

             <div class="content">
                 <h2 class="page-title">Edit Orders</h2>
                
                 <form action="RM.php" method="post">
                     
                        
                    <label for="totalprice">Total Price</label>
                    <input type="text" id="totalprice" name="totalprice" ><br>
                    
                    <label for="snotes">Special Notes</label>
                    <textarea name="content" id="snotes" ></textarea>
                    
                     
                     <label for="paymethod">Payment Method</label>
                     <input type="text" id="paymethod" name="paymethod" ><br>
                      
                     <label for="ostatus">Order Status</label>
                     <input type="text" id="ostatus" name="ostatus" ><br>
                     
                     <label for="otype">Order Type</label>
                     <input type="text" id="otype" name="otype" ><br>
                     
                    
                        <div>
                            <input type="submit" value="Update" onclick="alert('Are you sure update')">
                        </div>
                    
                 </form>
             </div>
            </div>
        
       
    </div>
   <!--ckeditor-->  
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
 <script src="../RM.js"></script>  
    
</body>
</html>