<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/restaurantmanager/users/user_sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/admin.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
</head>
<body>
<div class="page-container">
<?php include "user_sidebar.php"; ?> 
<div class="content-wrapper">
 <?php include  "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
      

             <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
              <!--  <a href="RM.php" class="button">Manage Users</a>-->
              <?php //echo anchor("rm_controller/users", "Manage Users",['class'=>"button"]) ?>
              <!--  <a href="create.php" class="button">Add User</a>-->
              <?php //echo anchor("rm_controller/userscreate", "Add Users",['class'=>"button"]) ?>

             <div class="content">
                 <h2 class="page-title">Edit Users</h2>
                
                 <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('UpdateError','alert alert-warning','fa fa-check'); ?>
                </div>

                 <?php echo form_open("rm_controller/user_update_save","POST");?>

          <div class="label_div">User ID</div>
          <?php echo form_input(['type'=>'text', 'name'=>'User_ID', 'value'=>$data->User_ID, 'readonly'=> 'readonly'])?>

          <br><br>
          <div class="label_div">Username</div>
          <?php echo form_input(['type'=>'text', 'name'=>'User_name', 'placeholder'=>$data->User_name, 'value'=>$data->User_name])?>
          <div class="error">
            <?php if(!empty($this->errors['User_name'])):?>
            <?php echo $this->errors['User_name'];?>
            <?php endif;?>
          </div>
          <br>
          <div class="label_div">Email Address</div>
          <?php echo form_input(['type'=>'email', 'name'=>'Email_address', 'placeholder'=>$data->Email_address,'readonly'=>'readonly' ,'value'=>$data->Email_address])?>
          <div class="error">
            <?php if(!empty($this->errors['Email_address'])):?>
            <?php echo $this->errors['Email_address'];?>
            <?php endif;?>
          </div>
          <br>

          <div class="label_div">Phone No</div>
          <?php echo form_input(['type'=>'text', 'name'=>'Phone_no', 'placeholder'=>$data->Phone_no, 'value'=>$data->Phone_no ])?>
          <div class="error">
            <?php if(!empty($this->errors['Phone_no'])):?>
            <?php echo $this->errors['Phone_no'];?>
            <?php endif;?>
          </div>
          <br>
           
          <?php if($data->User_role=='customer') { ?>
          <div class="label_div">User Role</div>
          <?php echo form_input(['type'=>'text', 'name'=>'User_role', 'placeholder'=>$data->User_role,'value'=>$data->User_role,'readonly'=>'readonly' ])?>
          <?php } else{ ?>
          <select id="role" name="User_role">
              <option value="<?php echo $data->User_role ?>" style="display:none;"><?php echo $data->User_role ?></option>
             <!--- <option value="customer">customer</option>-->
              <option value="kitchen_manager">kitchen_manager</option>
              <option value="cashier">cashier</option>
              <option value="delivery_person">delivery_person</option>
              <option value="restaurant_manager">restaurant_manager</option>
          </select>
          <?php } ?>

          <div class="error">
            <?php if(!empty($this->errors['User_role'])):?>
            <?php echo $this->errors['User_role'];?>
            <?php endif;?>
          </div>
          
          <?php if($data->User_role != 'customer'){?>
          <div class="label_div">Department</div>
          <select id="dep" name="Dep_No">
              <option value="<?php echo $data->Dep_No?>" style="display:none;"><?php echo $data->Dep_No ?></option>
              <option value="1">1-Management Department</option>
              <option value="2">2-Kitchen Department</option>
              <option value="3">3-Cashier Department</option>
              <option value="4">4-Delivery Department</option>
          </select>
          <?php }?>
          
          <div class="btn-container">
              <button type="submit" formaction="<?php echo BASE_URL?>/rm_controller/users" class="btn cancel-btn">Cancel</button>
              <button type="submit" class="btn submit-btn">Update</button>
          </div>
          
    
         
          <?php echo form_close();?>


          </div>

             </div>
            </div>
        
       
  
    </div>
    <?php include '../application/views/footer/footer_3.php';?>  
    </div>
</body>
</html>