<html>
<title>Delivery Person Dashboard</title>
<head> 

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" type="text/css" href="newsfeed.css">
  <?php echo link_css("css/deliveryperson/dpstyle.css?ts=<?=time()?>");?>
  <?php echo link_css("css/deliveryperson/newsfeed.css?ts=<?=time()?>");?>
  <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <style>
  #more {display: none;}
  #more1 {display: none;}
  </style>
 </head>

   
<body>
 
  <input type="checkbox" id="menu">

  <nav>

  <div class="header" style="height:2px;">
 <!-- <p>Dashboard</p>-->
  <img class="logo" id="mlogo" src="<?php echo BASE_URL?>/public/images/logo.png" style="height:58px;">
  </div>

  <label for="menu" class="menu-bar">
   
  <i class="fa fa-bars"></i>
           
  </label>

  </nav>


  <div class="sidebar">
  <div class="profile-details">
             <div class="avatar"><i class="fa fa-user-circle"></i></div>
             <div class="profile-text">
                <p class="name">Kavinda Dias</p>
                <p class="role">Delivery Person</p>
            </div>
        </div>
            <ul>
                 <!--    <li><a class="active" href="./dporders.php">Orders</a></li> -->
            <li><?php echo anchor("delivery_controller/neworders", "Orders") ?></li>
            <!--    <li><a  href="./dp.php">News Feed</a></li>-->
            <li><?php echo anchor("delivery_controller/index", "News Feed",['class'=>"active"]) ?></li>
                
                <li><a href="#">LogOut</a></li>
                
            </ul>

  </div>
  <div class="newsfeed-wrapper">
  <div  class="Dp-content">
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

                            <div class="news_content" style="padding-left:20px;padding-right:20px">
                            <div class="text_title"><p>Title of the annoucement</p></div>
                            <br>
                            <div class="text-message"><p>The nation’s most beloved fast-casual Italian franchise, Squisito Pizza & Pasta, is inviting the community to celebrate National Pasta<span id="dots">...</span><span id="more">Month this October. With 10 locations including three scheduled to debut this fall, Squisito continues to serve up the perfect recipe for unwavering success and longevity. Despite the ongoing pandemic, Squisito remains committed to the communities in which it does business. During quarantine, the restaurant added family meal deals and access to grocery items and other provisions to offer added ease of convenience to its customers. Squisito also donated thousands of dollars to medical facilities through its catering match program as well as extended further support with complimentary meals to our healthcare heroes.</span></p></div>
                            <button onclick="myFunction()" id="myBtn">Read more</button>
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

                            <div class="news_content" style="padding-left:20px;padding-right:20px">
                            <div class="text_title"><p>Title of the annoucement</p></div>
                            <br>
                            <div class="text-message"><p>The number of COVID-19 cases in Sri Lanka is on the rise again, and it feels a lot heavier than<span id="dots1">...</span><span id="more1">the first wave. A new cluster emerged a few days back, and right now, there are 1514 active cases in the country (13/10/2020, 10.54 AM). 
 
                            However, unlike the first time, many of the restaurants, hotels, supermarkets and other retail stores are still functioning, which is a good thing. But, it's absolutely vital to do it in a manner that it protects the employees, customers, and communities.</span></p></div>
                            <button onclick="myFunction1()" id="myBtn1">Read more</button>
                           </div>
                    </div>

     
</div>

<script>
function myFunction() {
  var dots = document.getElementById("dots");
  var moreText = document.getElementById("more");
  var btnText = document.getElementById("myBtn");

  if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Read more"; 
    moreText.style.display = "none";
  } else {
    dots.style.display = "none";
    btnText.innerHTML = "Read less"; 
    moreText.style.display = "inline";
  }
}

function myFunction1() {
  var dots1 = document.getElementById("dots1");
  var moreText1 = document.getElementById("more1");
  var btnText1 = document.getElementById("myBtn1");

  if (dots1.style.display === "none") {
    dots1.style.display = "inline";
    btnText1.innerHTML = "Read more"; 
    moreText1.style.display = "none";
  } else {
    dots1.style.display = "none";
    btnText1.innerHTML = "Read less"; 
    moreText1.style.display = "inline";
  }
}

</script>

</body>

</html>
  
  
  
  