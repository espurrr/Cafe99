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
                 <h2 class="page-title">Edit Fooditems</h2>
                
                 <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('UpdateError','alert alert-warning','fa fa-check'); ?>
                </div>
             
                 <?php echo form_open("rm_controller/fooditem_update_save","post");?>
<?php foreach ($data as $row):?>
<label for="Food_ID">Food_ID</label><br>
<input type="text" id="food_id" name="Food_ID" value="<?php echo $row->Food_ID?>" readonly="readonly"><br>
<?php //echo form_input(['type'=>'text','name'->'Food_ID','value'=>$row->Food_ID,'readonly'=>'readonly'])?>

<label for="fname">Food name</label>
<input type="text" id="fname" name="Food_name" value="<?php echo $row->Food_name ?>"><br>
<?php //echo form_input(['type'=>'text','id'=>'fname', 'name'=>'Food_name','value'=>$data->Food_name)]?><br>
<div class="dashboard-error">
    <?php if(!empty($this->errors['Food_name'])):?>
    <?php echo $this->errors['Food_name'];?>
    <?php endif;?>
</div>

<label for="description">Description</label>
<textarea id="description" name="Description"><?php echo $row->Description?></textarea>
<?php //echo form_input(['type'=>'textarea','id'=>'description', 'name'=>'Description','value'=>$data->Description)]?><br>
<div class="dashboard-error">
    <?php if(!empty($this->errors['Description'])):?>
    <?php echo $this->errors['Description'];?>
    <?php endif;?>
</div>

<label for="price">Unit Price</label>
<input type="text" id="price" name="Unit_Price" value="<?php echo $row->Unit_Price?>"><br>
<?php //echo form_input(['type'=>'text','id'=>'price', 'name'=>'Unit_Price','value'=>$data->Unit_Price)]?><br>
<div class="dashboard-error">
    <?php if(!empty($this->errors['Unit_Price'])):?>
    <?php echo $this->errors['Unit_Price'];?>
    <?php endif;?>
</div>

<label for="category" class="cat-label">Category</label>
<?php //echo form_input(['type'=>'text','id'=>'category', 'name'=>'Category_name','value'=>$data->Category_name)]?><br>
<select id="category" name="Category_name" onchange="changeSubCat()">
    <option value="Food" <?php echo ($row->Category_name == "Food")? "selected": "" ?>>Food</option>
    <option value="Drinks"<?php echo ($row->Category_name == "Drinks")? "selected": "" ?>>Drinks</option>
    <option value="Desserts"<?php echo ($row->Category_name == "Desserts")? "selected": "" ?>>Desserts</option>
</select>

</br>
<label for="subcategory" class="subcat-label">Subcategory </label>
<?php //echo form_input(['type'=>'text','id'=>'subcategory', 'name'=>'Subcategory_ID','value'=>$data->Subcategory_ID)]?><br>
<select id="subcategory" name="Subcategory_ID">
    <?php if($row->Category_name == "Food"):?>
        <option value="Rice"<?php echo ($row->Subcategory_name == "Rice")? "selected": "" ?>>Rice</option>
        <option value="Pizza"<?php echo ($row->Subcategory_name == "Pizza")? "selected": "" ?>>Pizza</option>
        <option value="Savouries"<?php echo ($row->Subcategory_name == "Savouries")? "selected": "" ?>>Savouries</option>
        <option value="Cakes"<?php echo ($row->Subcategory_name == "Cakes")? "selected": "" ?>>Cakes</option>
        <option value="NoodlesPastas"<?php echo ($row->Subcategory_name == "NoodlesPastas")? "selected": "" ?>>NoodlesPastas</option>
        <option value="Biriyani"<?php echo ($row->Subcategory_name == "Biriyani")? "selected": "" ?>>Biriyani</option>
        <option value="Buns"<?php echo ($row->Subcategory_name == "Buns")? "selected": "" ?>>Buns</option>
    <?php endif; ?>

    <?php if($row->Category_name == "Drinks"):?>
        <option value="Coffee" <?php echo ($row->Subcategory_name == "Coffee")? "selected": "" ?>>Coffee</option>
        <option value="FreshFruitJuice"<?php echo ($row->Subcategory_name == "FreshFruitJuice")? "selected": "" ?>>FreshFruitJuice</option>
        <option value="IceBlended"<?php echo ($row->Subcategory_name == "IceBlended")? "selected": "" ?>>IceBlended</option>
        <option value="MilkShakes"<?php echo ($row->Subcategory_name == "MilkShakes")? "selected": "" ?>>MilkShakes</option>
        <option value="Tea"<?php echo ($row->Subcategory_name == "Tea")? "selected": "" ?>>Tea</option>
    <?php endif; ?>

    <?php if($row->Category_name == "Desserts"):?>
        <option value="IceCreams" <?php echo ($row->Subcategory_name == "IceCreams")? "selected": "" ?>>IceCreams</option>
        <option value="CustardsandPuddings"<?php echo ($row->Subcategory_name == "CustardsandPuddings")? "selected": "" ?>>CustardsandPuddings</option>
        <option value="Muffins"<?php echo ($row->Subcategory_name == "Muffins")? "selected": "" ?>>Muffins</option>
        <option value="CheeseCakes"<?php echo ($row->Subcategory_name == "CheeseCakes")? "selected": "" ?>>CheeseCakes</option>
    <?php endif; ?>

</select>

<label for="availability" class="av-label"> Availability</label>
<?php //echo form_input(['type'=>'text','id'=>'availability', 'name'=>'Availability','value'=>$data->Availability)]?><br>
<select id="availability" name="Availability">
    <option value="Available">Available</option>
    <option value="Unavailable">Unavailable</option>
</select>

<div class="btn-container">
    <button type="submit" formaction="<?php echo BASE_URL?>/rm_controller/fooditem" class="btn cancel-btn">Cancel</button>
    <input type="submit" value="Update">
</div>
<?php endforeach; ?>
<?php echo form_close();?>
                 
                 
             </div>
            </div>
        
       
    </div>
    </div>
    <?php include '../application/views/footer/footer_3.php';?>
    </div>

  <!--ckeditor-->  
 <!-- <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script> -->
 <?php echo link_js("js/restaurantmanager/RM.js?ts=<?=time()?>");?>
 <?php echo link_js("js/restaurantmanager/food-create.js");?>
    
</body>
</html>