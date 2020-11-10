<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <link rel="stylesheet" href="user_sidebar.css">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../header-dashboard.css">
</head>
<body>
<?php include "user_sidebar.php"; ?> 
<?php include "../header-dashboard.php";?>
    <div class="wrapper">
       

             <div class="admin-content">
                <a href="RM.php" class="button">Manage Users</a>
                <a href="create.php" class="button">Add User</a>

             <div class="content">
                 <h2 class="page-title">Add Users</h2>
                
                 <form action="RM.php" method="post">
                     
                        
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
                        
                        
                        
                        <div>
                            <input type="submit" value="Save">
                        </div>
                    
                 </form>
             </div>
            </div>
        
       
    </div>
    
    
</body>
</html>