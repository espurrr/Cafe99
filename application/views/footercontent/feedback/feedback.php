
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>feedback</title>
  <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
  <?php echo link_css("css/footer_1.css?ts=<?=time()?>"); ?>
<!--  <link rel="stylesheet" href="feedback.css">-->
<?php echo link_css("css/footercontent/feedback/feedback.css?ts=<?=time()?>"); ?>
<!--  <link rel="stylesheet" href="sidebar.css">-->
<?php echo link_css("css/footercontent/feedback/sidebar.css?ts=<?=time()?>"); ?>
 
</head>
<body>
<?php   
        if ($this->get_session('role')=='customer'){
            include '../application/views/header/cust-logged-in-header.php';
        }else{
            include '../application/views/header/header.php';
        }
    ?> 
<?php //include "sidebar.php";?>
<div class="wrapper">
  <div class="feedback-content">
   <h1>Feedback Form</h1>
   <br><br>
   <p>
            Please provide your feedback below:
  </p>
  <br><br>
  <form action="#">
    <label for="fname">First Name</label>
    <input type="text" id="fname" name="firstname" placeholder="Your name..">

    <label for="lname">Last Name</label>
    <input type="text" id="lname" name="lastname" placeholder="Your last name..">

    <label for="experience">Express your experience</label>
    <br><br>    
  <input type="radio" id="good" name="exp" value="good">
  <label for="good">Good</label><br>
  <input type="radio" id="bad" name="exp" value="bad">
  <label for="bad">Bad</label><br>
  <input type="radio" id="neutral" name="exp" value="neutral">
  <label for="neutral">Neutral</label>
  <br><br>  
    <label for="subject">Comments</label>
    <textarea id="subject" name="subject" placeholder="Write something.." style="height:200px"></textarea>

    <input type="submit" value="Post">
  </form>
  </div>
  </div>
  <?php include '../application/views/footer/footer_1.php';?>    
</body>
</html>