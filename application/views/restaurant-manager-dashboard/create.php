<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <link rel="stylesheet" href="sidebar.css">
    <link rel="stylesheet" href="admin.css">
    <link rel="stylesheet" href="header-dashboard.css">
</head>
<body>
<?php include "sidebar.php";?>
<?php include "header-dashboard.php";?>
    <div class="wrapper">
      
             <div class="admin-content">
                <a href="RMnewsfeed.php" class="button">News Feed</a>
                


             <div class="content">
                 <h2 class="page-title">Add Announcements</h2>
                
                 <form action="RMnewsfeed.php" method="post">
                     
                        
                        <label for="Anndate">Announcement Date</label>
                        <input type="text" id="Anndate" name="Adate" ><br>
                        

                         
                         <label for="Anntime">Announcement Time</label>
                         <input type="text" id="Anntime" name="Atime" ><br>
                          
                         <label for="content">Content</label>
                         <textarea name="content" id="content" ></textarea>
                        
                        
                        
                        
                        <div>
                            <input type="submit" value="Save">
                        </div>
                    
                 </form>
             </div>
            </div>
        
       
    </div>
  <!--ckeditor-->  
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
 <script src="RM.js"></script>
    
</body>
</html>