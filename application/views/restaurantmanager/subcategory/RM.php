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
    <?php echo link_css("css/modal/delete_modal.css?ts=<?=time()?>"); ?>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


</head>

<body>
<div class="page-container">
<?php include "subcategory_sidebar.php";?>
<div class="content-wrapper">
<?php include  "../application/views/header/header-dashboard.php";?>
  <!-- Delete pop up modal starts here -->
  <div id="popup-window" class="popup-window">
        <div class="win-content-wrapper">
            <div class="win-content">
                <p>Are you sure you want to delete?</p>
                <div class="btn-container">
                    <div class="btn-wrapper">
                        <button class="btn cancel-btn" id="modal-cancel-btn">Cancel</button>
                        <button class="btn delete-btn" id="modal-delete-btn">Delete</button>
                    </div>
                </div>
            </div>
        </div><!-- win-content-wrapper ends here -->
    </div><!-- popup=window ends here -->
  <!-- Delete pop up modal ends here -->
   
    <div class="wrapper">
        

            <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
            <!--    <a href="RM.php" class="button">Manage Subcategories</a>-->
                <?php echo anchor("rm_controller/subcategory", "Manage Subcategories",['class'=>"button"]) ?>
            <!--    <a href="create.php" class="button">Add  Subcategories</a>-->
            <?php echo anchor("rm_controller/createSubcategory", "Add Subcategories",['class'=>"button"]) ?>
             
                <div class="search-container">
    <form action="#">
      <input type="text" style="width:79%" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

                <div class="content">
                    <h2 class="page-title">Manage Subcategories</h2>
                    <div style="overflow-x:auto;">
                    <table>
                        <thead>
                        <th>Subcategory name</th>
                        <th colspan="2">Action</th>
                        </thead>
                        
                      <!--  <tbody>
                           <tr>
                               <td>Rice</td>-->
                            <!--   <td><a href="edit.php" class="edit">Edit</a></td>-->
                         <!--   <td><?php echo anchor("rm_controller/subcategoryedit", "Edit",['class'=>"edit"]) ?></td> 
                               <td><a href="#" class="delete" onclick='showDeleteModal()'>Delete</a></td>
                              
                            </tr>
                        </tbody>-->
                        <?php
                        $fooditem=new Rm_model;
                        foreach($data as $row){
                            echo "<tr>";
                            echo "<td>".$row->Subcategory_name."</td>";
                            echo "<td>".anchor("rm_controller/subcategory_update_values?Subcategory_ID=".$row->Subcategory_ID."", "Edit",['class'=>"edit"])."</td>";
                            echo "<td>".anchor("rm_controller/delete_subcategory?Subcategory_ID=".$row->Subcategory_ID."", "Delete",['class'=>"delete"])."</td>";
                            echo "</tr>";

                        }
                        ?>
                    </table>
                    </div>
                </div>
            </div>
            </div>
            <?php include '../application/views/footer/footer_3.php';?>  
            </div>  
            <?php echo link_js("js/restaurantmanager/delete.js"); ?>   
</body>
</html>