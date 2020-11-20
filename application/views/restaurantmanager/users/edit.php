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
</head>
<body>
<?php include "user_sidebar.php"; ?> 
 <?php include  "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
      

             <div class="admin-content">
              <!--  <a href="RM.php" class="button">Manage Users</a>-->
              <?php echo anchor("rm_controller/users", "Manage Users",['class'=>"button"]) ?>
              <!--  <a href="create.php" class="button">Add User</a>-->
              <?php echo anchor("rm_controller/userscreate", "Add Users",['class'=>"button"]) ?>

             <div class="content">
                 <h2 class="page-title">Edit Users</h2>
                
            <!--     <form action="RM.php" method="post">
                     
                        
                        <label for="name">Name</label>
                        <input type="text" id="name" name="name" ><br>

                        <label for="password">User Password</label>
                        <input type="password" id="password" name="password" ><br>
                        

                         <label for="Pno">Phone No</label>
                         <input type="text" id="Pno" name="title" ><br>
                         

                        
                         <label for="role">Role</label>
                         <select id="role" name="role" >
                             <option value="RestaurantManager">Restaurant Manager</option>
                             <option value="KitchenManager">Kitchen Manager</option>
                             <option value="Cashier">Cashier</option>
                             <option value="DeliveryPerson">Delivery Person</option>
                         </select>
                        
                       
                         <div>
                            <input type="submit" value="Update" onclick="alert('Are you sure update')">
                        </div>
                    
                 </form>-->

                 <?php echo form_open("rmuser_controller/user_update_save","post");?>
          
          <label for="User_name">User Name</label>
          <?php echo form_input(['type'=>'text', 'name'=>'User_name', 'placeholder'=>$data->User_name, 'value'=>$data->User_name])?>
          <div class="error">
            <?php if(!empty($this->errors['User_name'])):?>
            <?php echo $this->errors['User_name'];?>
            <?php endif;?>
          </div>

          <label for="Email_address">Email Address</label>
          <?php echo form_input(['type'=>'email', 'name'=>'Email_address', 'placeholder'=>$data->Email_address,'readonly'=>'readonly' ,'value'=>$data->Email_address])?>
          <div class="error">
            <?php if(!empty($this->errors['Email_address'])):?>
            <?php echo $this->errors['Email_address'];?>
            <?php endif;?>
          </div>

          <label for="Phone_no">Phone No</label>
          <?php echo form_input(['type'=>'text', 'name'=>'Phone_no', 'placeholder'=>$data->Phone_no, 'value'=>$data->Phone_no ])?>
          <div class="error">
            <?php if(!empty($this->errors['Phone_no'])):?>
            <?php echo $this->errors['Phone_no'];?>
            <?php endif;?>
          </div>

          <label for="User_role">Role</label>
          <?php echo form_input(['type'=>'text', 'name'=>'User_role', 'placeholder'=>$data->User_role,'value'=>$data->User_role ])?>
          <div class="error">
            <?php if(!empty($this->errors['User_role'])):?>
            <?php echo $this->errors['User_role'];?>
            <?php endif;?>
          </div>
          

            <input type="submit" value="Update">
          
    
         
          <?php echo form_close();?>


          </div>

             </div>
            </div>
        
       
    </div>
    
    <?php// include '../application/views/footer/footer_3.php';?>  
</body>
</html>