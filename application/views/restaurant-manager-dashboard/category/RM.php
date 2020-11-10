<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/category_sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/admin.css?ts=<?=time()?>"); ?>
</head>

<body>
<?php include "category_sidebar.php";?>
<?php include "../../header/header-dashboard.php";?>  
    <div class="wrapper">
        

            <div class="admin-content">
                <a href="RM.php" class="button">Manage Categories</a>
                <a href="create.php" class="button">Add  Categories</a>
              
                <div class="search-container">
    <form action="#">
      <input type="text" style="width:80%" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>

                <div class="content">
                    <h2 class="page-title">Manage Categories</h2>
                    <div style="overflow-x:auto;">
                    <table>
                        <thead>
                        <th>Category name</th>
                        <th colspan="2">Action</th>
                        </thead>
                        
                        <tbody>
                           <tr>
                               <td>Food</td>
                               <td><a href="edit.php" class="edit">Edit</a></td>
                               <td><a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a></td>
                              
                            </tr>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>

     
</body>
</html>