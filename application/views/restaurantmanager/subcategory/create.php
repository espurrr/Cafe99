<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/restaurantmanager/subcategory/subcategory_sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/admin.css?ts=<?=time()?>"); ?>
</head>
<body>
<?php include "subcategory_sidebar.php";?>
<?php include  "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
       

             <div class="admin-content">
             <!--   <a href="RM.php" class="button">Manage Subcategories</a>-->
             <?php echo anchor("rm_controller/subcategory", "Manage Subcategories",$options = ["button"]) ?>
               <!-- <a href="create.php" class="button">Add  Subcategories</a>-->
               <?php echo anchor("rm_controller/subcategorycreate", "Add Subcategories",$options = ["button"]) ?>

             <div class="content">
                 <h2 class="page-title">Add Subcategories</h2>
                
                 <form action="RM.php" method="post">
                     
                        
                        <label for="subname">Subcategory name</label>
                        <input type="text" id="subname" name="subcatname" ><br>
                        
                        <div>
                            <input type="submit" value="Save">
                        </div>
                    
                 </form>
             </div>
            </div>
        
       
    </div>

    
</body>
</html>