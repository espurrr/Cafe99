<html>
<title>Delivery Person Dashboard</title>
<head> 

  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo link_css("css/deliveryperson/dpstyle.css?ts=<?=time()?>");?>
  <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src='https://kit.fontawesome.com/a076d05399.js'></script>
 </head>

   
<body>
 
  <input type="checkbox" id="menu">

  <nav>
  <div class="header" style="height:2px;">
 <!-- <p>Dashboard</p>-->
  <img class="logo" id="mlogo" src="logo.png">
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
                <li><a class="active" href="./dporders.php">Orders</a></li>
                <li><a  href="./dp.php">News Feed</a></li>
                
                <li><a href="#">LogOut</a></li>
                
            </ul>

  </div>

  <div  class="Dp-content">
  <div class="icons">
  <a href="neworders.php" button class="btn">New<i class='fas fa-clipboard-list' style="font-size:24px;padding-right:40px"></i></button> </a>
 
  <a  class="active" href="ondelivery.php" button class="btn"><i class='fas fa-biking' style="font-size:24px;padding-right:40px"></i></button> </a>
 
  <a href="dispatched.php" button class="btn"><i class='fas fa-clipboard-check' style="font-size:24px"></i></button> </a>
  </div>

  <div class="list">
  <ul>
    <li>Order No</li>
    <li>Customer Name</li>
    <li>Customer Address</li>
    <li>Action</li>
  </ul>
  <ul>
    <li data-label="order no">1</li>
    <li data-label="customer name"><p>Ishan Senanayaka</p></li>
    <li data-label="customer address"><p>No.25,<br>New Rd,<br>Maharagama.</p></li>
    <li data-label="action"><a href="#"><i class="fa fa-check-square" style="font-size:24px;color: #3ace67ee"></i></a></li>
  </ul>

  <ul>
    <li data-label="order no">2</li>
    <li data-label="customer name"><p>Vageesha Perera</p></li>
    <li data-label="customer address"><p>No.200,<br>Highlevel Rd,<br>Maharagama.</p></li>
    <li data-label="action"><a href="#"><i class="fa fa-check-square" style="font-size:24px;color: #3ace67ee"></i></a></li>
  </ul>

  <ul>
    <li data-label="order no">3</li>
    <li data-label="customer name"><p>Nilu Vishaka</p></li>
    <li data-label="customer address"><p>No.45,<br>Pamunuwa Rd,<br>Maharagama.</p></li>
    <li data-label="action"><a href="#"><i class="fa fa-check-square" style="font-size:24px;color: #3ace67ee"></i></a></li>
  </ul>

</div>

  
</div>

</body>

</html>
  
  