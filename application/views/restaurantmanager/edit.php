<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>

    <?php echo link_css("css/restaurantmanager/sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/admin.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>

</head>
<body>
<?php include "../application/views/restaurantmanager/sidebar.php";?>
<?php include "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
      

             <div class="admin-content">
              <!--  <a href="RMnewsfeed.php" class="button">News Feed</a>-->
                <?php echo anchor("rm_controller/index", "News Feed",['class'=>"button"]) ?>
            

             <div class="content">
                 <h2 class="page-title">Edit Announcements</h2>
                
                 <form action="RMnewsfeed.php" method="post">
                     
                        
                        <label for="Anndate">Announcement Date</label>
                        <input type="text" id="Anndate" name="Adate" ><br>
                        

                         
                         <label for="Anntime">Announcement Time</label>
                         <input type="text" id="Anntime" name="Atime" ><br>
                          
                         <label for="content">Content</label>
                         <textarea name="content" id="content" ></textarea>
                        
                        
                        
                        
                        <div>
                            <input type="submit" value="Update"  onclick="alert('Are you sure update')">
                        </div>
                    
                 </form>
             </div>
            </div>
        
       
    </div>
  <!--ckeditor-->  
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
 <?php echo link_js("js/restaurantmanager/RM.js?ts=<?=time()?>");?>
 <?php include '../application/views/footer/footer_3.php';?>
  
</body>
</html>