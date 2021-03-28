<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
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
                <?php //echo anchor("rm_controller/newsfeed", "News Feed",['class'=>"button"]) ?>
            

             <div class="content">
                 <h2 class="page-title">Edit Announcements</h2>
                
                 <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('UpdateError','alert alert-warning','fa fa-check'); ?>
                </div>

                <?php echo form_open("rm_controller/newsfeed_update_save","post",["id"=>"announcement_form"]);?>   
                 
                        <div class="label_div">Announcement ID</div>
                        <?php echo form_input(['type'=>'text','id'=>'Ann_id','name'=>'Announcement_id','value'=>$data->Announcement_id,'readonly'=>'readonly'])?>
                        
                        <div class="label_div">Title</div>
                        <?php echo form_input(['type'=>'text','id'=>'Ann_title', 'name'=>'Announcement_title','value'=>$data->Announcement_title])?>
                        
                        <!-- <label for="Ann_date">Date</label><br>
                        <?php //echo form_input(['type'=>'date','id'=>'Ann_date', 'name'=>'Announcement_date','value'=>$data->Announcement_date])?><br>

                        <label for="Ann_time">Time</label><br>
                        <?php //echo form_input(['type'=>'time','id'=>'Ann_time', 'name'=>'Announcement_time','value'=>$data->Announcement_time])?><br> -->

                        <!-- <label for="content">Content</label>
                        <?php //echo form_input(['type'=>'text','id'=>'content', 'name'=>'Content','value'=>$data->Content])?><br> -->

                        <div class="label_div">To Whom</div>
                        <?php //echo form_input(['type'=>'text','id'=>'Ann_towhom', 'name'=>'To_whom','value'=>$data->To_whom])?>
                        <select id="ann" name="To_whom">
                            <option value="<?php echo $data->To_whom ?>" style="display:none;"><?php echo $data->To_whom ?></option>
                            <option value="All Employees">All Employees</option>
                            <option value="Restaurant managers">Restaurant managers</option>
                            <option value="Cashiers">Cashiers</option>
                            <option value="Delivery person">Delivery person</option>
                            <option value="Kitchen managers">Kitchen managers</option>
                        </select>

                        <div class="label_div">Content</div>
                        <!-- <?php //echo form_input(['type'=>'text','id'=>'content', 'name'=>'Content','value'=>$data->Content])?><br> -->
                        <textarea rows="10"  name="Content" form="announcement_form"><?php echo $data->Content; ?></textarea> 

                        <div class="btn-container">
                            <button type="submit" formaction="<?php echo BASE_URL?>/rm_controller/newsfeed" class="btn cancel-btn">Cancel</button>
                            <button type="submit" class="btn submit-btn">Update</button>

                        </div>
                        <?php echo form_close();?> 

                        
                <!-- </form> -->
             </div>
            </div>
        
       
    </div>
  <!--ckeditor-->  
 <script src="https://cdn.ckeditor.com/ckeditor5/23.0.0/classic/ckeditor.js"></script>
 <?php //echo link_js("js/restaurantmanager/RM.js?ts=<?=time()?>");?>
 </div>
 <?php include '../application/views/footer/footer_3.php';?>
 </div>
  
</body>
</html>