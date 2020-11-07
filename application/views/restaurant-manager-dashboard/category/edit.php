<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <link rel="stylesheet" href="category_sidebar.css">
    <link rel="stylesheet" href="../admin.css">
    <link rel="stylesheet" href="../header-dashboard.css">
</head>
<body>
<?php include "category_sidebar.php";?>
<?php include "../header-dashboard.php"; ?> 
    <div class="wrapper">
      

             <div class="admin-content">
                <a href="RM.php" class="button">Manage Categories</a>
                <a href="create.php" class="button">Add  Categories</a>
             <div class="content">
                 <h2 class="page-title">Edit Categories</h2>
                
                 <form action="RM.php" method="post">
                     
                        
                        <label for="cname">Category name</label>
                        <input type="text" id="cname" name="catname" ><br>
                        
                        <div>
                            <input type="submit" value="Update" onclick="alert('Are you sure update')">
                        </div>
                    
                 </form>
             </div>
            </div>
        
       
    </div>
    
</body>
</html>