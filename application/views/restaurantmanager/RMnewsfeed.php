<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <title>Restaurant Manager dashboard</title>
    <?php echo link_css("css/restaurantmanager/sidebar.css?ts=<?=time()?>");?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/restaurantmanager/newsfeed.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/modal/delete_modal.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script> 
</head>

<body>
<div class="page-container">
<?php include "../application/views/restaurantmanager/sidebar.php";?>
<div class="content-wrapper" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
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

    <div class="newsfeed-wrapper" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">

            <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
                

                <div class="content">
                <div class="newsfeed">
                    <!--  <a href="create.php" class="button">Add  News</a>-->
                    <?php echo anchor("rm_controller/create", "Add News",['class'=>"button"]) ?>
                </div>
                <h2 class="page-title">News</h2>
              
                <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('newsfeedSuccess','alert alert-success','fa fa-check'); ?>
                    <?php $this->flash('updateSuccess','alert alert-success','fa fa-check'); ?>
                </div>


                     <?php foreach($data as $row): ?>
                <div class="dashboard" id="download">
                    <div class="post">
                        <div class="top">
                            <div class="img">
                                <i class="fa fa-user-circle" aria-hidden="true" style="font-size:35px"></i>
                            </div>
                            <div class="name">
                                <strong><a href="#" class="text-name"><?php echo $row->User_name;?></a></strong>
                                <div class="date">
                                    <span class="text-when"><?php echo $row->Announcement_date." at ".substr($row->Announcement_time,0,5) ?></span>
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
                            <br>
                            <div class="action">
                                <div class="link-wrapper">
                                        <!--  <a href="edit.php" class="edit">Edit</a>-->
                                        <?php echo anchor("rm_controller/newsfeed_update_values?Announcement_id=".$row->Announcement_id."", "Edit",['class'=>"edit"]) ?>
                                        <!--  <a href="#" class="delete" onclick="alert('Are you sure delete')">Delete</a>-->
                                        <a class="delete" onclick='showDeleteModal(<?php echo $row->Announcement_id;?>)'>Delete</a>
                                        <?php //echo anchor("rm_controller/delete_newsfeed?Announcement_id=".$row->Announcement_id."", "Delete",['class'=>"delete"]) ?>
                                </div>
                           </div>
                        </div><!-- news_content ends here -->
                    </div><!-- post ends here -->
                </div><!-- dashbaord ends here -->
                <?php endforeach; ?>

                </div>
            </div>
        </div>
        </div>
        <?php  include '../application/views/footer/footer_3.php';?> 
        </div>
        <?php echo link_js("js/restaurantmanager/delete/newsfeed_delete.js"); ?> 
        <?php echo link_js("js/restaurantmanager/newsfeed.js"); ?>   
</body>
</html>