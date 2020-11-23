<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/restaurantmanager/sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/newsfeed.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/admin.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
</head>

<body>
<div class="page-container">
<?php include "../application/views/restaurantmanager/sidebar.php";?>
<div class="content-wrapper">
<?php include  "../application/views/header/header-dashboard.php";?>

    <div class="newsfeed-wrapper">

            <div class="admin-content">
                <div class="newsfeed">
             <!--  <a href="create.php" class="button">Add  News</a>-->
              <?php echo anchor("rm_controller/create", "Add News",['class'=>"button"]) ?>
            </div>

                <div class="content">
                <h2 class="page-title">News</h2>
              
                 <div class="dashboard" id="download">
                    <div class="post">
                    <div class="top">
                            <div class="img">
                            <i class="fa fa-user-circle" aria-hidden="true" style="font-size:60px"></i>
                            </div>
                            <div class="name">
                                <strong><a href="#"><span class="text-name">Kamal Perera</span></a></strong>
                                <div class="date">
                                    <span class="text-when">2020/10/23 at 4:00pm</span> ·<img src="http://social-prank.foxsash.com/assets/images/facebook/icon_public.jpg" width="16" height="16" id="visiblefor-icon">
                                </div>
                            </div>
                    </div>
                            <div class="employee"><i class="fa fa-users"></i>  &nbsp;All Employees</div>
                            </div>

                            <div class="news_content">
                            <div class="text_title"><p>Title of the annoucement</p></div>
                            <br>
                            <div class="text-message"><p>The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta, is inviting the community to celebrate National Pasta Month this October. With 10 locations including three scheduled to debut this fall, Squisito continues to serve up the perfect recipe for unwavering success and longevity. Despite the ongoing pandemic, Squisito remains committed to the communities in which it does business. During quarantine, the restaurant added family meal deals and access to grocery items and other provisions to offer added ease of convenience to its customers. Squisito also donated thousands of dollars to medical facilities through its catering match program as well as extended further support with complimentary meals to our healthcare heroes... </p></div>
                           </div>
                           <br>
                           <div class="action">
                        <!--   <a href="edit.php" class="edit">Edit</a>-->
                           <?php echo anchor("rm_controller/edit", "Edit",['class'=>"edit"]) ?>
                           <a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a>
                           </div>
                    </div>

                    <div class="dashboard" id="download">
                    <div class="post">
                    <div class="top">
                   
                    <div class="img">
                            <i class="fa fa-user-circle" aria-hidden="true" style="font-size:60px"></i>
                            </div>
                            <div class="name">
                                <strong><a href="#"><span class="text-name">Kamal Perera</span></a></strong>
                                <div class="date">
                                    <span class="text-when">2020/10/15 at 9:00am</span> ·<img src="http://social-prank.foxsash.com/assets/images/facebook/icon_public.jpg" width="16" height="16" id="visiblefor-icon">
                                </div>
                            </div>
                    </div>
                            <div class="employee"><i class="fa fa-users"></i>  &nbsp;All Employees</div>
                            </div>

                            <div class="news_content">
                            <div class="text_title"><p>Title of the annoucement</p></div>
                            <br>
                            <div class="text-message"><p>The number of COVID-19 cases in Sri Lanka is on the rise again, and it feels a lot heavier than the first wave. A new cluster emerged a few days back, and right now, there are 1514 active cases in the country (13/10/2020, 10.54 AM). 
 
                                                         However, unlike the first time, many of the restaurants, hotels, supermarkets and other retail stores are still functioning, which is a good thing. But, it's absolutely vital to do it in a manner that it protects the employees, customers, and communities... </p></div>
                           </div>
                           <br>
                           <div class="action">
                        <!--   <a href="edit.php" class="edit">Edit</a>-->
                           <?php echo anchor("rm_controller/edit", "Edit",['class'=>"edit"]) ?>
                           <a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a>
                           </div>
                    </div>

                    
                    <div class="dashboard" id="download">
                    <div class="post">
                    <div class="top">
                            <div class="img">
                            <i class="fa fa-user-circle" aria-hidden="true" style="font-size:60px"></i>
                            </div>
                            <div class="name">
                                <strong><a href="#"><span class="text-name">Kamal Perera</span></a></strong>
                                <div class="date">
                                    <span class="text-when">2020/10/30 at 11:30am</span> ·<img src="http://social-prank.foxsash.com/assets/images/facebook/icon_public.jpg" width="16" height="16" id="visiblefor-icon">
                                </div>
                            </div>
                    </div>
                            <div class="employee"><i class="fa fa-users"></i>  &nbsp;All Employees</div>
                            </div>

                            <div class="news_content">
                            <div class="text_title"><p>Title of the annoucement</p></div>
                            <br>
                            <div class="text-message"><p>The number of COVID-19 cases in Sri Lanka is on the rise again, and it feels a lot heavier than the first wave. A new cluster emerged a few days back, and right now, there are 1514 active cases in the country (13/10/2020, 10.54 AM). 
 
                                                         However, unlike the first time, many of the restaurants, hotels, supermarkets and other retail stores are still functioning, which is a good thing. But, it's absolutely vital to do it in a manner that it protects the employees, customers, and communities... </p></div>
                           </div>
                           <br>
                           <div class="action">
                         <!--  <a href="edit.php" class="edit">Edit</a>-->
                           <?php echo anchor("rm_controller/edit", "Edit",['class'=>"edit"]) ?>
                           <a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a>
                           </div>
                    </div>
                    

                </div>
            </div>
        </div>
        </div>
        <?php // include '../application/views/footer/footer_3.php';?> 
        </div>
</body>
</html>