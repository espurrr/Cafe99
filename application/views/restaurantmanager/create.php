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
<?php include  "../application/views/header/header-dashboard.php";?>
    <div class="wrapper">
      
             <div class="admin-content" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
             <!--   <a href="RMnewsfeed.php" class="button">News Feed</a>-->
                <?php //echo anchor("rm_controller/newsfeed", "News Feed",['class'=>"button"]) ?>


             <div class="content">
                 <h2 class="page-title">Add Announcements</h2>
                
                <!-- taken from food.create -->
                 <div class="status-msg" style="margin-bottom:20px">
                    <?php $this->flash('newsfeedError','alert alert-warning','fa fa-check'); ?>
                </div>
    

                 <?php echo form_open("rm_controller/createSubmit","post");?>   
                 
                        
                      <!--  <label for="Ann_id">Announcement_id</label>-->
                    <!--    <?php //echo form_input(['type'=>'text','id'=>'Ann_id', 'name'=>'Ann_id','value'=>$this->set_value('Announcement_id')])?>-->

                        <div class="label_div">Title</div>
                        <?php echo form_input(['type'=>'text','id'=>'Ann_title', 'name'=>'Announcement_title','value'=>$this->set_value('Announcement_title')])?><br>
                        <div class="dashboard-error">
                            <?php if(!empty($this->errors['Announcement_title'])):?>
                            <?php echo $this->errors['Announcement_title'];?>
                            <?php endif;?>
                        </div>

                        <!-- <label for="Ann_date">Date</label><br>
                        <?php echo form_input(['type'=>'date','id'=>'Ann_date', 'name'=>'Announcement_date','value'=>$this->set_value('Announcement_date')])?><br>
                        <div class="dashboard-error">
                            <?php if(!empty($this->errors['Announcement_date'])):?>
                            <?php echo $this->errors['Announcement_date'];?>
                            <?php endif;?>
                        </div> -->

                        <!-- <label for="Ann_time">Time</label><br>
                        <?php echo form_input(['type'=>'time','id'=>'Ann_time', 'name'=>'Announcement_time','value'=>$this->set_value('Announcement_time')])?><br>
                        <div class="dashboard-error">
                            <?php if(!empty($this->errors['Announcement_time'])):?>
                            <?php echo $this->errors['Announcement_time'];?>
                            <?php endif;?>
                        </div> -->

                        <div class="label_div">Content</div>
                        <?php echo form_input(['type'=>'text','id'=>'content', 'name'=>'Content','value'=>$this->set_value('Content')])?><br>
                        <div class="dashboard-error">
                            <?php if(!empty($this->errors['Content'])):?>
                            <?php echo $this->errors['Content'];?>
                            <?php endif;?>
                        </div>

                        <div class="label_div">To whom</div>
                        <?php //echo form_input(['type'=>'text','id'=>'Ann_towhom', 'name'=>'Ann_towhom','value'=>$this->set_value('To_whom')])?>
                        <select id="ann" name="To_whom">
                            <option value="All Employees" style="display:none;">All Employees</option>
                            <option value="All Employees">All Employees</option>
                            <option value="Restaurant managers">Restaurant managers</option>
                            <option value="Cashiers">Cashiers</option>
                            <option value="Delivery person">Delivery person</option>
                            <option value="Kitchen managers">Kitchen managers</option>
                        </select>

                        <div class="dashboard-error">
                            <?php if(!empty($this->errors['To_whom'])):?>
                            <?php echo $this->errors['To_whom'];?>
                            <?php endif;?>
                        </div>

                        <div class="btn-container">
                            <button type="submit" formaction="<?php echo BASE_URL?>/rm_controller/newsfeed" class="btn cancel-btn">Cancel</button>
                            <button type="submit" class="btn submit-btn">Create</button>

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