<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo link_css("css/cust-logged-in-header.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body>


  <div class="topnav" id="myTopnav">
   <img class="logo" id="mlogo" src="<?php echo BASE_URL?>/public/images/logo.png">
    
    <div class="all-nav" id="nav" >
      <div class="route-dropdown" onclick="toggleMenu(this)">
      <button class="dropbtn">Food 
          <i class="fa fa-caret-down"></i>
      </button>
      <div id="waypoints" class="dropdown-content" >
      <?php echo anchor("food_controller/menu/food/rice", "Rice") ?>
      <?php echo anchor("food_controller/menu/food/pizza", "Pizza") ?>
      <?php echo anchor("food_controller/menu/food/savouries", "Savouries") ?>
      <?php echo anchor("food_controller/menu/food/cake", "Cake") ?>
      <?php echo anchor("food_controller/menu/food/NoodlesPasta", "Noodles & Pasta") ?>
      <?php echo anchor("food_controller/menu/food/biriyani", "Biriyani") ?>
      <?php echo anchor("food_controller/menu/food/bun", "Buns") ?>
      </div>
    </div>
      <div class="route-dropdown" onclick="toggleMenu(this)">
        <button class="dropbtn">Drinks
            <i class="fa fa-caret-down"></i>
        </button>
        <div id="routes" class="dropdown-content" >
        <?php echo anchor("food_controller/menu/drinks/tea", "Tea") ?>
            <a href="#">Milk Shakes</a>
            <a href="#">Ice Blended</a>
            <a href="#">Fresh Fruit Juice</a>
        <?php echo anchor("food_controller/menu/drinks/coffee", "Coffee") ?>
        </div>
      </div>
      <div class="route-dropdown" onclick="toggleMenu(this)">
        <button class="dropbtn">Desserts
            <i class="fa fa-caret-down"></i>
        </button>
        <div id="routes" class="dropdown-content" >
            <a href="#">Ice creams</a>
            <a href="#">Custards & Puddings</a>
            <a href="#">Muffins</a>
            <a href="#">Cheesecakes</a>
       
        </div>
      </div>
      <div class="route-dropdown" onclick="toggleMenu(this)">
        <button class="dropbtn">Cart&nbsp;<span class="step">0</span>
        </button>
      </div>
      <div class="route-dropdown sign-log" id="avatar_big" onclick="toggleMenu(this)">
        <button class="avatar-a" style="
    padding-top: 5px;
    padding-right: 5px;
    padding-bottom: 5px;
    padding-left: 5px;"><img src="<?php echo BASE_URL?>/public/images/img_avatar.png" class="avatar" width="50px" height="50px"> 
        </button>
        <div id="routes" class="dropdown-content " >
           <!-- <div class="menu-other"> -->
           <?php echo anchor("customer_controller/myprofile", "My Profile") ?>
           <?php echo anchor("customer_controller/myfavourites", "My Favourites") ?>
           <?php echo anchor("customer_controller/myorders", "My Orders") ?>
          <?php echo anchor("customer_controller/logout", "Logout") ?>
      <!-- </div> -->
        </div>
      </div>
      
      
    </div>
    <a href="javascript:void(0);" style="font-size:15px;" class="icon" onclick="myFunction1(); myFunction2();myFunction3();">&#9776;</a>
  </div>

<script type="text/javascript">
      function myFunction1() {
    var x = document.getElementById("myTopnav");
    if (x.className === "topnav") {
      x.className += " responsive";
    } else {
      x.className = "topnav";
    }
  }
      function myFunction2() {
    var y = document.getElementById("nav");
    if (y.className === "all-nav") {
      y.className += " responsive";
    } else {
      y.className = "all-nav";
    }
  }
   function myFunction3() {
    var z = document.getElementById("mlogo");
    if (z.className === "logo") {
      z.className += " responsive";
    } else {
      z.className = "logo";
    }
  }

</script>
</body>

</html>

