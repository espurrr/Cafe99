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
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
</head>
<body>
<div class="page-container">
<?php include "subcategory_sidebar.php";?>
<div class="content-wrapper">
<?php include  "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
       

             <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
             <!--   <a href="RM.php" class="button">Manage Subcategories</a>-->
             <?php echo anchor("rm_controller/subcategory", "Manage Subcategories",['class'=>"button"]) ?>
               <!-- <a href="create.php" class="button">Add  Subcategories</a>-->
               <?php echo anchor("rm_controller/subcategorycreate", "Add Subcategories",['class'=>"button"]) ?>

             <div class="content">
                 <h2 class="page-title">Add Subcategories</h2>
                
                 <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('subcategorySuccess','alert alert-success','fa fa-check'); ?>
                </div>

             <!--    <form action="RM.php" method="post">
                     
                        
                        <label for="subname">Subcategory name</label>
                        <input type="text" id="subname" name="subcatname" ><br>
                        
                        <div>
                            <input type="submit" value="Save">
                        </div>
                    
                 </form>-->
                 <?php echo form_open("rmuser_controller/createSubcategory","post");?>
                 <label for="subname">Subcategory name</label>
                 <input type="text" id="subname" name="Subcategory_name" ><br>
                 <div class="dashboard-error">
                            <?php if(!empty($this->errors['Subcategory_name'])):?>
                            <?php echo $this->errors['Subcategory_name'];?>
                            <?php endif;?>
                        </div>
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