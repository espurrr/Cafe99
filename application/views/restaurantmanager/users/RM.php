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
</head>
<body>
 <?php include "user_sidebar.php"; ?> 
 <?php include  "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
      

             <div class="admin-content">
                
            <a href="RM.php" class="button">Manage Users</a>
            <a href="create.php" class="button">Add User</a>
            
            <div class="search-container">
            <form action="#">
      <input type="text" style="width:79%" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

             <div class="content">
                 <h2 class="page-title">Manage Users</h2>
                 <div style="overflow-x:auto;">
                 <table>
                     <thead>
                     <th>User Name</th>
                     <th>User Password</th>
                     <th>Phone Number</th>
                     <th>Role</th>
                     <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td>John</td>
                            <td>123</td>
                            <td>0783725988</td>
                            <td>Cashier</td>
                            <td><a href="edit.php" class="edit">Edit</a></td>
                            <td><a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a></td>
                            
                        </tr>

                        <tr>
                            <td>Ama</td>
                            <td>abc</td>
                            <td>0773725999</td>
                            <td>Kitchen Manager</td>
                            <td><a href="edit.php" class="edit">Edit</a></td>
                            <td><a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a></td>
                        </tr>
                        
                    </tbody>
                 </table>
                 </div>
             </div>
            </div>
        
       
    </div>
 
</body>
</html>