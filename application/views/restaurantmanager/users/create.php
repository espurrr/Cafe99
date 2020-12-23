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
                <?php echo anchor("rm_controller/users", "Manage Users",['class'=>"button"]) ?>
              <!--  <a href="create.php" class="button">Add User</a>-->
              <?php echo anchor("rm_controller/userscreate", "Add Users",['class'=>"button"]) ?>
                
                
             <div class="content">
                 <h2 class="page-title">Add Users</h2>
                
                 <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('userSuccess','alert alert-success','fa fa-check'); ?>
                </div>

              <!--   <form action="RM.php" method="post">
                     
                        
                        <label for="name">User Name</label>
                        <input type="text" id="name" name="name" placeholder="Enter Name..."><br>
                        
                        <label for="password">User Password</label>
                        <input type="password" id="password" name="password" placeholder="Enter Password..."><br>
                         
                         <label for="email">Email Address</label>
                         <input type="email" id="email" name="emailaddress" placeholder="Enter email address..."><br>
                          
                         <label for="Pno">Phone No</label>
                         <input type="text" id="Pno" name="title" placeholder="Enter Phone No..."><br>
                         

                         <label for="role">Role</label>
                         <select id="role" name="role" >
                             <option value="RestaurantManager">Restaurant Manager</option>
                             <option value="KitchenManager">Kitchen Manager</option>
                             <option value="Cashier">Cashier</option>
                             <option value="DeliveryPerson">Delivery Person</option>
                         </select>
                        
                         <label for="regDate">Registered Date</label>
                         <input type="text" name="regDate" placeholder="Enter Date..."><br>
                        
                        
                        <div>
                            <input type="submit" value="Save">
                        </div>
                    
                 </form>-->

                 <?php echo form_open("rm_controller/savedata","post");?>
          
          <label for="User_name">User Name</label>
          <?php echo form_input(['type'=>'text', 'name'=>'User_name', 'placeholder'=>'Enter Name...', 'value'=>$this->set_value('User_name')])?>
          <div class="dashboard-error">
            <?php if(!empty($this->errors['User_name'])):?>
            <?php echo $this->errors['User_name'];?>
            <?php endif;?>
          </div>

          <label for="Email_address">Email Address</label>
          <?php echo form_input(['type'=>'email', 'name'=>'Email_address', 'placeholder'=>'Enter email address...' ,'value'=>$this->set_value('Email_address')])?>
          <div class="dashboard-error">
            <?php if(!empty($this->errors['Email_address'])):?>
            <?php echo $this->errors['Email_address'];?>
            <?php endif;?>
          </div>

          <label for="Phone_no">Phone No</label>
          <?php echo form_input(['type'=>'text', 'name'=>'Phone_no', 'placeholder'=>'Enter Phone No...', 'value'=>$this->set_value('Phone_no')])?>
          <div class="dashboard-error">
            <?php if(!empty($this->errors['Phone_no'])):?>
            <?php echo $this->errors['Phone_no'];?>
            <?php endif;?>
          </div>

          <label for="User_Password">User Password</label>
          <?php echo form_input(['type'=>'password', 'name'=>'User_Password', 'placeholder'=>'Enter Password...'])?>
          <div class="dashboard-error">
            <?php if(!empty($this->errors['User_Password'])):?>
            <?php echo $this->errors['User_Password'];?>
            <?php endif;?>
          </div>

          <label for="User_role">Role</label>
          <?php echo form_input(['type'=>'text', 'name'=>'User_role', 'placeholder'=>'Enter Role...', 'value'=>$this->set_value('User_role')])?>
          <div class="error">
            <?php if(!empty($this->errors['User_role'])):?>
            <?php echo $this->errors['User_role'];?>
            <?php endif;?>
          </div>
          
         <!-- <label for="Registered_date">Registered Date</label>
          <?php echo form_input(['type'=>'text', 'name'=>'Registered_date', 'placeholder'=>'Enter Register Date...', 'value'=>$this->set_value('Registered_date')])?>
          <div class="error">
            <?php if(!empty($this->errors['Registered_date'])):?>
            <?php echo $this->errors['Registered_date'];?>
            <?php endif;?>
          </div>-->

          <input type="submit" value="Submit">
          
    
         
          <?php echo form_close();?>


             </div>
            </div>
        
       
    </div>
    </div>
    <?php include '../application/views/footer/footer_3.php';?>    
    </div>
</body>
</html>