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
             <div class="content">
                 <h2 class="page-title">Edit Fooditems</h2>
                
                 <form action="RM.php" method="post">
                     
                        
                        <label for="fname">Food name</label>
                        <input type="text" id="fname" name="foodname" ><br>
                        

                         <label for="price">Unit Price</label>
                         <input type="text" id="price" name="Uprice" ><br>
                          
                         <label for="description">Description</label>
                         <textarea name="description" id="description" ></textarea>
                        
                         <label for="availability">Availability</label>
                         <input type="text" id="availability" name="availability" ><br>
                        
                        
                        <div>
                            <input type="submit" value="Update" onclick="alert('Are you sure update')">
                        </div>
                    
                 </form>
             </div>
            </div>
        
       
    </div>
  <!--ckeditor-->  
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
 <script src="../RM.js"></script>
    
</body>
</html>