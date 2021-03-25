<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cashier/newsfeed/sidebar.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/cashier/newsfeed/newsfeed.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>

</head>

<body>
    <div class="page-container" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
    <?php include "sidebar.php";?>

    <div class="content-wrapper" >
    <?php include "../application/views/header/header-dashboard.php";?> 
    
    <div class="newsfeed-wrapper">
        <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
            <!-- <div class="content"> -->

            <div class="status-msg-wrapper">
                <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('databaseError','alert alert-warning','fa fa-times-circle'); ?>
                    <?php $this->flash('noAnnouncementError','alert alert-warning','fa fa-times-circle'); ?>
                </div>
            </div>

            <?php foreach($data as $row): ?>
                <div class="dashboard" id="download">
                    <div class="post">
                        <div class="top">
                            <div class="img">
                                <i class="fa fa-user-circle" aria-hidden="true" style="font-size:35px"></i>
                            </div>
                            <div class="name">
                                <strong><a href="#" class="text-name"><?php echo ($row->User_name === NULL)?"User":$row->User_name ?></a></strong>
                                <div class="date">
                                    <span class="text-when"><?php echo $row->Announcement_date." at ".substr($row->Announcement_time,0,5) ?></span> <img src="http://social-prank.foxsash.com/assets/images/facebook/icon_public.jpg" width="16" height="16" id="visiblefor-icon">
                                </div>
                            </div>
                            <div class="employee"><i class="fas fa-users"></i>  &nbsp;<?php echo $row->To_whom;?></div>
                        </div><!-- top ends here -->
                        <div class="news_content">
                            <div class="text_title"><p><?php echo $row->Announcement_title;?></p></div>
                            <div class="text-message">
                            <?php
                                $str = $row->Content;
                                if(strlen($str) > 240):
                            ?>
                                    <div class="a-id" style="display:none"><?php echo $row->Announcement_id ?></div>
                                    <p><?php echo substr($str,0,240) ?>
                                    <span class="dots">......</span>
                                    <a class="readMore" onclick="readMore(<?php echo $row->Announcement_id ?>)"> Read More </a>
                                    <span class="more"><?php echo substr($str,240) ?> </span>
                                    <a class="readLess" onclick="readMore(<?php echo $row->Announcement_id ?>)"> Read Less </a>
                                    </p>
                            <?php
                                else:
                            ?>
                                    <p><?php echo substr($str,0); ?></p>
                            <?php
                                endif;
                            ?>
                            </div>
                        </div><!-- news_content ends here -->
                    </div><!-- post ends here -->
                </div><!-- dashbaord ends here -->
                <?php endforeach; ?>
            </div><!-- admin-content ends-->
        </div><!-- newsfeed-wrapper ends-->
    </div><!-- content-wrapper ends-->

    <?php include '../application/views/footer/footer_3.php';?>
    </div> <!-- page-contianer ends-->
<!-- <script src="./dropdownlist.js"></script> -->
<?php echo link_js("js/cashier/newsfeed/newsfeed.js"); ?>

</body>
</html>