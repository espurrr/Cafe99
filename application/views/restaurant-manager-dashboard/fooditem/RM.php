<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <link rel="stylesheet" href="fooditem_sidebar.css">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../header-dashboard.css">
</head>

<body>
    <?php include "fooditem_sidebar.php"; ?>
    <?php include "../header-dashboard.php"; ?> 
    <div class="wrapper">
        
            <div class="admin-content">
                
            <a href="RM.php" class="button">Manage Fooditems</a>
            <a href="create.php" class="button">Add  Fooditems</a>
              
            <div class="search-container">
    <form action="#">
      <input type="text" style="width:80%" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

                <div class="content">
                    <h2 class="page-title">Manage Fooditems</h2>
                    <div style="overflow-x:auto;">
                    <table>
                        <thead>
                        <th>Food name</th>
                        <th>Unit Price</th>
                        <th>Description</th>
                        <th>Availability</th>
                        <th colspan="2">Action</th>
                        </thead>
                        
                        <tbody>
                           <tr>
                               <td>Chicken Fried Rice</td>
                               <td>490</td>
                               <td>Please note that vegetables may be substituted based on availability</td>
                               <td>Available</td>
                               <td><a href="edit.php" class="edit">Edit</a></td>
                               <td><a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a></td>
                              
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
     
</body>
</html>