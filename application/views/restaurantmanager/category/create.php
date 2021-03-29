<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/restaurantmanager/category/category_sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/admin.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
</head>
<body>
<div class="page-container">
<?php include "category_sidebar.php";?>
<div class="content-wrapper">
<?php include  "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">

             <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
                 <!--   <a href="RM.php" class="button">Manage Categories</a>-->
            <?php //echo anchor("rm_controller/category", "Manage Categories",['class'=>"button"]) ?>
             <!--   <a href="create.php" class="button">Add  Categories</a>-->
             <?php //echo anchor("rm_controller/categorycreate", "Add Categories",['class'=>"button"]) ?>

              

             <div class="content">
                 <h2 class="page-title">Add Categories</h2>
                
                 <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('categoryError','alert alert-warning','fa fa-check'); ?>
                </div>

                 <?php echo form_open("rm_controller/createCategory","post");?>
                 <label for="catname">Category name</label><br><br>
              <!--   <input type="text" id="catname" name="Category_name" ><br>-->
              <?php echo form_input(['type'=>'text', 'name'=>'Category_name','value'=>$this->set_value('Category_name')])?><br>
                 <div class="dashboard-error">
                            <?php if(!empty($this->errors['Category_name'])):?>
                            <?php echo $this->errors['Category_name'];?>
                            <?php endif;?>
                        </div>
                <div class="btn-container">
                    <button type="submit" formaction="<?php echo BASE_URL?>/rm_controller/category" class="btn cancel-btn">Cancel</button>
                    <input type="submit" value="Create">
                </div>
          
    
         
          <?php echo form_close();?>

             </div>
            </div>
        
       
    </div>
    </div>
    <?php include '../application/views/footer/footer_3.php';?>  
     </div>
</body>
</html