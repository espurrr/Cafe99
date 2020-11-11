<!DOCTYPE html>
<html>
<head>
  <link rel="stylesheet" type="text/css" href="sidebar_cashier.css">
<meta name="viewport" content="width=device-width, initial-scale=1">

</head>
<body>

<div class="dashboard">
  <div class="tab">
  <div class="profile-text">
                <img src="img_avatar.png" class="avatar" width="50px" height="50px"> 
               <div class="name-role">
                  <a class="name">John Smith</a>
              <a class="role">Kitchen Manager</a>
               </div>
            </div>
  <div class="side">
    <button class="tablinks" onclick="openCity(event, 'news_feed')" id="defaultOpen">News Feed</button>
  <button class="tablinks" onclick="openCity(event, 'place_order')">Place Order</button>
  <button class="tablinks" onclick="openCity(event, 'order_history')">Order History</button>
  </div>
</div>

<div id="news_feed" class="tabcontent">
<?php include 'newsfeed.php';?>
</div>

<div id="place_order" class="tabcontent">
<!-- <?php include '.php';?> -->
</div>

<div id="order_history" class="tabcontent">
  <h3>Order History</h3>
  <p>order history</p>
</div>
</div>

<script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}

// Get the element with id="defaultOpen" and click on it
document.getElementById("defaultOpen").click();
</script>
   
</body>
</html> 
