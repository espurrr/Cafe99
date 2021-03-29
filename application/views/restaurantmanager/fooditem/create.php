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
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>

</head>
<body>
<div class="page-container">
<?php include "fooditem_sidebar.php";?>
<div class="content-wrapper">
<?php include  "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
       
        <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
               <!--    <a href="RM.php" class="button">Manage Fooditems</a>-->
        <?php //echo anchor("rm_controller/fooditem", "Manage Fooditems",['class'=>"button"]) ?>
         <!--   <a href="create.php" class="button">Add  Fooditems</a>-->
        <?php //echo anchor("rm_controller/fooditemcreate", "Add  Fooditems",['class'=>"button"]) ?>

            <div class="content">
                <h2 class="page-title">Add Fooditems</h2>

                <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('fooditemError','alert alert-warning','fa fa-check'); ?>
                </div>

                 <!-- <form action="rmfooditem_controller/createFoodItem" method="POST"> -->
                <?php echo form_open("rm_controller/createFoodItem","post");?>

                        <label for="fname">Food name</label>
                        <input type="text" id="fname" name="Food_name" ><br>
                        <div class="dashboard-error">
                            <?php if(!empty($this->errors['Food_name'])):?>
                            <?php echo $this->errors['Food_name'];?>
                            <?php endif;?>
                        </div>

                        <label for="description">Description</label>
                        <textarea id="description" name="Description"></textarea>
                        <div class="dashboard-error">
                            <?php if(!empty($this->errors['Description'])):?>
                            <?php echo $this->errors['Description'];?>
                            <?php endif;?>
                        </div>

                        <label for="price">Unit Price</label>
                        <input type="text" id="price" name="Unit_Price" ><br>
                        <div class="dashboard-error">
                            <?php if(!empty($this->errors['Unit_Price'])):?>
                            <?php echo $this->errors['Unit_Price'];?>
                            <?php endif;?>
                        </div>

                        <label for="category" class="cat-label">Category</label>
                        <select id="category" name="Category_name" onchange="changeSubCat()">
                            <option value="empty" style="display:none;"> - select a category - </option>
                            <option value="Food">Food</option>
                            <option value="Drinks">Drinks</option>
                            <option value="Desserts">Desserts</option>
                        </select>
                        <div class="dashboard-error">
                            <?php if(!empty($this->errors['Category_name'])):?>
                            <?php echo $this->errors['Category_name'];?>
                            <?php endif;?>
                        </div>

                        </br>
                        <label for="subcategory" class="subcat-label">Subcategory </label>
                        <select id="subcategory" name="Subcategory_ID">
                        </select>

                        <label for="availability" class="av-label"> Availability</label>
                        <select id="availability" name="Availability">
                            <option value="Available">Available</option>
                            <option value="Unavailable">Unavailable</option>
                        </select>
                        
                        <div class="btn-container">
                            <button type="submit" formaction="<?php echo BASE_URL?>/rm_controller/fooditem" class="btn cancel-btn">Cancel</button>
                            <input type="submit" value="Create">
                        </div>
                    
                <?php echo form_close();?>
            </div><!-- content -->
        </div><!--admin-content ends here -->
    </div><!-- wrapper ends here -->
    </div><!-- content-wrapper ends here -->
    <?php include '../application/views/footer/footer_3.php';?>
    </div><!-- page-container ends here -->
<!--ckeditor-->  
<!-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> -->
<?php //echo link_js("js/restaurantmanager/RM.js");?>
<?php echo link_js("js/restaurantmanager/food-create.js");?>
    
</body>
</html>