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
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>

</head>
<body>
<div class="page-container">
<?php include "../application/views/restaurantmanager/sidebar.php";?>
<div class="content-wrapper">
<?php include "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
      

             <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
              <!--  <a href="RMnewsfeed.php" class="button">News Feed</a>-->
                <?php echo anchor("rm_controller/newsfeed", "News Feed",['class'=>"button"]) ?>
            

             <div class="content">
                 <h2 class="page-title">Edit Announcements</h2>
                
                 <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('UpdateSuccess','alert alert-success','fa fa-check'); ?>
                </div>

                 <?php echo form_open("rm_controller/newsfeed_update_save","post");?>   
                 
                        <!-- <label for="Ann_id">Announcement_id</label>
                        <input type="text" id="Ann_id" name="Ann_id" ><br> -->

                      <!--  <label for="Ann_title">Title</label>
                        <input type="text" id="Ann_title" name="Ann_title" ><br>

                        <label for="Ann_date">Date</label>
                        <input type="date" id="Ann_date" name="Ann_date" ><br>
                        
                        <label for="Ann_time">Time</label>
                         <input type="time" id="Ann_time" name="Ann_time" ><br>

                        <label for="content">Content</label>
                        <textarea name="content" id="content" ></textarea>

                        <label for="Ann_towhom">To Whom</label>
                        <input type="text" id="Ann_towhom" name="Ann_towhom" ><br>-->

                        <!-- <label for="Ann_user">User ID</label> -->
                        <!-- <input type="text" id="Ann_user" name="Ann_user" ><br> -->

                        <label for="Ann_title">Title</label>
                        <?php echo form_input(['type'=>'text','id'=>'Ann_title', 'name'=>'Ann_title','value'=>$data->Announcement_title])?><br>

                        <label for="Ann_date">Date</label><br>
                        <?php echo form_input(['type'=>'date','id'=>'Ann_date', 'name'=>'Ann_date','value'=>$data->Announcement_date])?><br>

                        <label for="Ann_time">Time</label><br>
                        <?php echo form_input(['type'=>'time','id'=>'Ann_time', 'name'=>'Ann_time','value'=>$data->Announcement_time])?><br>

                        <label for="content">Content</label>
                        <?php echo form_input(['type'=>'text','id'=>'content', 'name'=>'content','value'=>$data->Content])?><br>

                        <label for="Ann_towhom">To Whom</label>
                        <?php echo form_input(['type'=>'text','id'=>'Ann_towhom', 'name'=>'Ann_towhom','value'=>$data->To_whom])?><br>

                        <div>
                            <input type="submit" value="Update">
                        </div>
                        <?php echo form_close();?>  
                 <!-- </form> -->
             </div>
            </div>
        
       
    </div>
  <!--ckeditor-->  
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
 <?php echo link_js("js/restaurantmanager/RM.js?ts=<?=time()?>");?>
 </div>
 <?php include '../application/views/footer/footer_3.php';?>
 </div>
  
</body>
</html>