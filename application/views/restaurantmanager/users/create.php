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
                 <h2 class="page-title">Add Users</h2>
                
                 <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('userError','alert alert-warning','fa fa-check'); ?>
                </div>


                 <?php echo form_open("rm_controller/savedata","post");?>
          
          <div class="label_div">User Name</div>
          <?php echo form_input(['type'=>'text', 'name'=>'User_name', 'placeholder'=>'Enter Name...', 'value'=>$this->set_value('User_name')])?>
          <div class="dashboard-error">
            <?php if(!empty($this->errors['User_name'])):?>
            <?php echo $this->errors['User_name'];?>
            <?php endif;?>
          </div>

          <div class="label_div">Email Address</div>
          <?php echo form_input(['type'=>'email', 'name'=>'Email_address', 'placeholder'=>'Enter email address...' ,'value'=>$this->set_value('Email_address')])?>
          <div class="dashboard-error">
            <?php if(!empty($this->errors['Email_address'])):?>
            <?php echo $this->errors['Email_address'];?>
            <?php endif;?>
          </div>

          <div class="label_div">Phone No</div>
          <?php echo form_input(['type'=>'text', 'name'=>'Phone_no', 'placeholder'=>'Enter Phone No...', 'value'=>$this->set_value('Phone_no')])?>
          <div class="dashboard-error">
            <?php if(!empty($this->errors['Phone_no'])):?>
            <?php echo $this->errors['Phone_no'];?>
            <?php endif;?>
          </div>

          <div class="label_div">User Password</div>
          <?php echo form_input(['type'=>'password', 'name'=>'User_Password', 'placeholder'=>'Enter Password...','readonly'=>'readonly','value'=>'passwordpassword'])?>
          <div class="dashboard-error">
            <?php if(!empty($this->errors['User_Password'])):?>
            <?php echo $this->errors['User_Password'];?>
            <?php endif;?>
          </div>

          <div class="label_div">Role</div>
          <?php //echo form_input(['type'=>'text', 'name'=>'User_role', 'placeholder'=>'Enter Role...', 'value'=>$this->set_value('User_role')])?>
          <select id="role" name="User_role">
              <option value="kitchen_manager" style="display:none;">kitchen_manager</option>
             <!-- <option value="customer">customer</option>-->
              <option value="kitchen_manager">kitchen_manager</option>
              <option value="cashier">cashier</option>
              <option value="delivery_person">delivery_person</option>
              <option value="restaurant_manager">restaurant_manager</option>
          </select>

          <div class="error">
            <?php if(!empty($this->errors['User_role'])):?>
            <?php echo $this->errors['User_role'];?>
            <?php endif;?>
          </div>
          
          <div class="label_div">Department</div>
          
          <select id="dep" name="Dep_No">
              <option value="empty" style="display:none;">-Select Department-</option>
              <option value="1">1-Management Department</option>
              <option value="2">2-Kitchen Department</option>
              <option value="3">3-Cashier Department</option>
              <option value="4">4-Delivery Department</option>
          </select>
          
         <!-- <label for="Registered_date">Registered Date</label>
          <?php echo form_input(['type'=>'text', 'name'=>'Registered_date', 'placeholder'=>'Enter Register Date...', 'value'=>$this->set_value('Registered_date')])?>
          <div class="error">
            <?php if(!empty($this->errors['Registered_date'])):?>
            <?php echo $this->errors['Registered_date'];?>
            <?php endif;?>
          </div>-->

          <div class="btn-container">
            <button type="submit" formaction="<?php echo BASE_URL?>/rm_controller/users" class="btn cancel-btn">Cancel</button>
            <button type="submit" class="btn submit-btn">Create</button>

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