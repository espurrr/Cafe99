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
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
</head>
<body>
<div class="page-container">
<?php include "order_sidebar.php"; ?> 
<div class="content-wrapper">
<?php include  "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
       
             <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
               
                  
       <!--     <a href="RM.php" class="button">Manage Orders</a>-->
       <?php //echo anchor("rm_controller/orders", "Manage Orders",['class'=>"button"]) ?>
         <!--   <a href="create.php" class="button">Add Orders</a>-->
            <?php //echo anchor("rm_controller/orderscreate", "Add Orders",['class'=>"button"]) ?>
         
            <div class="content">
                 <h2 class="page-title">Edit Orders</h2>

                 <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('UpdateError','alert alert-warning','fa fa-check'); ?>
                </div>
                
                 <?php echo form_open("rm_controller/order_update_save","post");?>
                 <label for="Order_ID">Order_ID</label>
                 <?php echo form_input(['type'=>'text','name'=>'Order_ID','value'=>$data->Order_ID,'readonly'=>'readonly'])?>

<label for="orderdatetime">Order Date & Time</label><br>
<?php echo form_input(['type'=>'date', 'name'=>'Order_Date_Time','value'=>$data->Order_Date_Time])?><br>
<div class="dashboard-error">
           <?php if(!empty($this->errors['Order_Date_Time'])):?>
           <?php echo $this->errors['Order_Date_Time'];?>
           <?php endif;?>
       </div>

<label for="totalprice">Total Price</label><br>
<?php echo form_input(['type'=>'text', 'name'=>'Total_price','value'=>$data->Total_price])?><br>
<div class="dashboard-error">
           <?php if(!empty($this->errors['Total_price'])):?>
           <?php echo $this->errors['Total_price'];?>
           <?php endif;?>
       </div>

<label for="snotes">Special Notes</label><br>
<?php echo form_input(['type'=>'text','id'=>'content', 'name'=>'Special_notes','value'=>$data->Special_notes])?><br>
<div class="dashboard-error">
           <?php if(!empty($this->errors['Special_notes'])):?>
           <?php echo $this->errors['Special_notes'];?>
           <?php endif;?>
       </div>

<label for="paymethod">Payment Method</label><br>  
<?php echo form_input(['type'=>'text', 'name'=>'Payment_method','value'=>$data->Payment_method,'readonly'=>'readonly'])?><br>
<div class="dashboard-error">
           <?php if(!empty($this->errors['Payment_method'])):?>
           <?php echo $this->errors['Payment_method'];?>
           <?php endif;?>
       </div>

<label for="ostatus">Order Status</label><br>
<?php //echo form_input(['type'=>'text', 'name'=>'Order_status','value'=>$data->Order_status])?><br>
<select id="ostatus" name="Order_status">
                            <option value="<?php echo $data->Order_status ?>" style="display:none;"><?php echo $data->Order_status ?></option>
                            <option value="onqueue">onqueue</option>
                            <option value="processing">processing</option>
                            <option value="ready">ready</option>
                            <option value="dispatched">dispatched</option>
                            <option value="delivery_new">delivery_new</option>
                            <option value="delivery_ondelivery">delivery_ondelivery</option>
                            <option value="delivery_dispatched">delivery_dispatched</option>
                        </select>

<div class="dashboard-error">
           <?php if(!empty($this->errors['Order_status'])):?>
           <?php echo $this->errors['Order_status'];?>
           <?php endif;?>
       </div>

<label for="otype">Order Type</label><br>
<?php //echo form_input(['type'=>'text', 'name'=>'Order_type','value'=>$data->Order_type])?><br>
<select id="otype" name="Order_type">
                            <option value="<?php echo $data->Order_type ?>" style="display:none;"><?php echo $data->Order_type ?></option>
                            <option value="dine-in">dine-in</option>
                            <option value="pick-up">pick-up</option>
                            <option value="delivery">delivery</option>
                        </select>

<div class="dashboard-error">
           <?php if(!empty($this->errors['Order_type'])):?>
           <?php echo $this->errors['Order_type'];?>
           <?php endif;?>
       </div>



      <div class="btn-container">
           <button type="submit" formaction="<?php echo BASE_URL?>/rm_controller/orders" class="btn cancel-btn">Cancel</button>
           <input type="submit" value="Update">
       </div>

       <?php echo form_close();?>
                 
             </div>
            </div>
        
       
    </div>
   <!--ckeditor-->  
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
 <?php //echo link_js("js/restaurantmanager/RM.js?ts=<?=time()?>");?>
 </div>
 <?php include '../application/views/footer/footer_3.php';?>  
 </div>  
</body>
</html>