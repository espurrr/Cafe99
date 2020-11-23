<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/restaurantmanager/fooditem/fooditem_sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/admin.css?ts=<?=time()?>"); ?>
</head>

<body>
<div class="page-container">
<?php include "fooditem_sidebar.php";?>
<div class="content-wrapper">
<?php include  "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
        
            <div class="admin-content">
                
        <!--    <a href="RM.php" class="button">Manage Fooditems</a>-->
        <?php echo anchor("rm_controller/fooditem", "Manage Fooditems",['class'=>"button"]) ?>
         <!--   <a href="create.php" class="button">Add  Fooditems</a>-->
         <?php echo anchor("rm_controller/fooditemcreate", "Add  Fooditems",['class'=>"button"]) ?>
              
            <div class="search-container">
    <form action="#">
      <input type="text" style="width:79%" placeholder="Search.." name="search">
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
                             <!--  <td><a href="edit.php" class="edit">Edit</a></td>-->
                               <td><?php echo anchor("rm_controller/fooditemedit", "Edit",['class'=>"edit"]) ?></td> 
                               <td><a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a></td>
                              
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
            </div>
    <?php include '../application/views/footer/footer_3.php';?>
    </div>

</body>
</html>