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
    <?php echo link_css("css/modal/delete_modal.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>

</head>
<body>
<div class="page-container">
 <?php include "user_sidebar.php"; ?> 
 <div class="content-wrapper">
 <?php include  "../application/views/header/header-dashboard.php";?>

 <!-- Delete pop up modal starts here -->
  <div id="popup-window" class="popup-window">
        <div class="win-content-wrapper">
            <div class="win-content">
                <p id="message">Are you sure you want to delete?</p>
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
                
          <!--  <a href="RM.php" class="button">Manage Users</a>-->
            <?php //echo anchor("rm_controller/users", "Manage Users",['class'=>"button"]) ?>
         <!--   <a href="create.php" class="button">Add User</a>-->
            <?php echo anchor("rm_controller/savedata", "Add Users",['class'=>"button"]) ?>
            
        <div class="search-container">
            <?php echo form_open("rm_controller/search_user", "POST");?>
                <input type="text" style="width:79%" placeholder="Search..." name="search" value="<?php echo $username; ?>">
                <button type="submit"><i class="fa fa-search"></i></button>
            <?php echo form_close();?>

        </div>

             <div class="content">
                 <h2 class="page-title">Manage Users</h2>

                 <div class="status-msg-wrapper">
                    <div class="status-msg" style="margin-bottom:20px">
                        <?php $this->flash('RM_user_not_retrieved','alert alert-danger','fa fa-times-circle'); ?>
                        <?php $this->flash('RM_user_not_found','alert alert-warning','fa fa-times-circle'); ?>

                        <?php $this->flash('RM_user_databaseError','alert alert-danger','fa fa-times-circle'); ?>
                        <?php $this->flash('RM_user_NotFound','alert alert-warning','fa fa-times-circle'); ?>
                    </div>
                </div> <!-- status-msg-wrapper ends here -->
                
                 <div style="overflow-x:auto;">
                 <table>
                     <thead>
                     <th>User ID</th>
                     <th>User Name</th>
                     <th>Email address</th>
                     <th>Phone Number</th>
                     <th>Role</th>
                     <th colspan="2">Action</th>
                    </thead>
                    <!--
                     <tbody>
                        <tr>
                            <td>John</td>
                            <td>123</td>
                            <td>0783725988</td>
                            <td>Cashier</td>
                            <td><a href="edit.php" class="edit">Edit</a></td>
                            <td><?php //echo anchor("rm_controller/userscreate", "Edit", ['class'=>"edit"]) ?></td> 
                            <td><a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a></td>
                            
                        </tr>

                        <tr>
                            <td>Ama</td>
                            <td>abc</td>
                            <td>0773725999</td>
                            <td>Kitchen Manager</td>
                           <td><a href="edit.php" class="edit">Edit</a></td>
                           <td><?php //echo anchor("rm_controller/usersedit", "Edit",['class'=>"edit"]) ?></td> 
                            <td><a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a></td>
                        </tr>
                        
                    </tbody>-->
                  <!--  <?php
    foreach ($data as $row){
       echo "<tr>";
       echo $row->User_name;
       echo $row->User_password;
       echo $row->Phone_no;
       echo $row->User_role;
       echo "</tr>";
  }
?>-->
 <!--  <tr>
        <td><?php echo $data[0]->User_name;?></td>
        <td><?php echo $data[0]->User_password;?></td>
        <td><?php echo $data[0]->Phone_no;?></td>
        <td><?php echo $data[0]->User_role;?></td>
        <td><?php echo anchor("rm_controller/usersedit", "Edit",['class'=>"edit"]) ?></td> 
        <td><a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a></td>
    </tr>-->
    
   <?php
        foreach($data as $row){
          echo "<tr>";
          echo "<td>".$row->User_ID."</td>";
          echo "<td>".$row->User_name."</td>";
          echo "<td>".$row->Email_address."</td>";
          echo "<td>".$row->Phone_no."</td>";
          echo "<td>".$row->User_role."</td>";
      //    echo "<td>".anchor("rm_controller/usersedit", "Edit",['class'=>"edit"])."</td>";
          echo "<td>".anchor("rm_controller/user_update_values?User_ID=".$row->User_ID."", "Edit",['class'=>"edit"])."</td>";
       //   echo "<td>".anchor("rm_controller/delete_user_data?User_ID=".$row->User_ID."", "Delete",['class'=>"delete"])."</td>";
      // echo "<td>".anchor("rm_controller/users", "Delete",['class'=>"delete"])."</td>";?>
         <td><a class="delete" onclick='showDeleteModal(<?php echo $row->User_ID;?>)'>Delete</a></td>
        <?php  echo "</tr>";
        
        }
       
    ?>
 <!--   <?php echo $row->User_name; ?>-->
    


                 </table>
                 </div>
             </div>
            </div>
        
       
    
    </div>
   <?php include '../application/views/footer/footer_3.php';?>
   </div>  
   <?php echo link_js("js/restaurantmanager/delete/user_delete.js"); ?>    
</body>
</html>