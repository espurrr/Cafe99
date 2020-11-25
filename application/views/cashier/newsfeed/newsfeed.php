<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/newsfeed/sidebar.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/newsfeed/newsfeed.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>

</head>

<body>
    <div class="page-container" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
    <?php include "sidebar.php";?>

    <div class="content-wrapper" >
    <?php include "../application/views/header/header-dashboard.php";?> 
    
    <div class="newsfeed-wrapper">
        <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
            <!-- <div class="content"> -->

                <div class="dashboard">
                    <div class="post">
                        <div class="top">
                            <div class="img">
                                <i class="fa fa-user-circle" aria-hidden="true" style="font-size:35px"></i>
                            </div>
                            <div class="name">
                                <strong><a href="#" class="text-name">Kamal Perera</a></strong>
                                <div class="date">
                                    <span class="text-when">Yesterday at 5:00pm</span> <img src="http://social-prank.foxsash.com/assets/images/facebook/icon_public.jpg" width="16" height="16" id="visiblefor-icon">
                                </div>
                            </div>
                            <div class="employee"><i class="fas fa-users"></i>  &nbsp;Kitchen Managers</div>
                        </div>
                        <div class="news_content">
                            <div class="text_title"><p>Title of the annoucement</p></div>
                            <div class="text-message">
                                <p>The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta.
                                The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta.
                                The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="dashboard" id="download">
                    <div class="post">
                        <div class="top">
                            <div class="img">
                                <i class="fa fa-user-circle" aria-hidden="true" style="font-size:35px"></i>
                            </div>
                            <div class="name">
                                <strong><a href="#" class="text-name">Kamal Perera</a></strong>
                                <div class="date">
                                    <span class="text-when">Yesterday at 5:00pm</span> <img src="http://social-prank.foxsash.com/assets/images/facebook/icon_public.jpg" width="16" height="16" id="visiblefor-icon">
                                </div>
                            </div>
                            <div class="employee"><i class="fas fa-users"></i>  &nbsp;Kitchen Managers</div>
                        </div>
                        <div class="news_content">
                            <div class="text_title"><p>Title of the annoucement</p></div>
                            <div class="text-message"><p>The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta.
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta.
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta.
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta
                            The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta</p></div>
                        </div>
                    </div>
                </div>
            </div>
        <!-- </div> -->
    </div>

    </div><!-- content-wrapper ends-->
    <?php include '../application/views/footer/footer_3.php';?>
    </div> <!-- page-contianer ends-->
<!-- <script src="./dropdownlist.js"></script> -->
</body>
</html>