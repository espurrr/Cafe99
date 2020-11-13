
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>feedback</title>
  <link rel="stylesheet" href="feedback.css">
  <link rel="stylesheet" href="sidebar.css">
 
</head>
<body>
<?php include "sidebar.php";?>
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
</body>
</html>