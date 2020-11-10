<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo link_css("css/cust-logged-in-header.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body>


  <div class="topnav" id="myTopnav">
   <img class="logo" id="mlogo" src="../../public/images/logo.png">
    
    <div class="all-nav" id="nav" >
      <div class="route-dropdown" onclick="toggleMenu(this)">
      <button class="dropbtn">Food 
          <i class="fa fa-caret-down"></i>
      </button>
      <div id="waypoints" class="dropdown-content" >
      <?php echo anchor("food_controller/menu", "Cat1") ?>
        <a href="#">Cat2</a>
        <a href="#">Cat3</a>
        <a href="#">Cat4</a>
        <a href="#">Cat5</a>
      </div>
    </div>
      <div class="route-dropdown" onclick="toggleMenu(this)">
        <button class="dropbtn">Drinks
            <i class="fa fa-caret-down"></i>
        </button>
        <div id="routes" class="dropdown-content" >
            <a href="">Cat1</a>
            <a href="#">Cat2</a>
            <a href="#">Cat3</a>
            <a href="#">Cat4</a>
            <a href="#">Cat5</a>
        </div>
      </div>
      <div class="route-dropdown" onclick="toggleMenu(this)">
        <button class="dropbtn">Desserts
            <i class="fa fa-caret-down"></i>
        </button>
        <div id="routes" class="dropdown-content" >
            <a href="#">Cat1</a>
            <a href="#">Cat2</a>
            <a href="#">Cat3</a>
            <a href="#">Cat4</a>
            <a href="#">Cat5</a>
        </div>
      </div>
      <div class="route-dropdown" onclick="toggleMenu(this)">
        <button class="dropbtn">Cart&nbsp;<span class="step">1</span>
        </button>
      </div>
      <div class="route-dropdown sign-log" id="avatar_big" onclick="toggleMenu(this)">
        <button class="avatar-a" style="
    padding-top: 5px;
    padding-right: 5px;
    padding-bottom: 5px;
    padding-left: 5px;"><img src="../../public/images/img_avatar.png" class="avatar" width="50px" height="50px"> 
        </button>
        <div id="routes" class="dropdown-content " >
           <!-- <div class="menu-other"> -->
              <a href="#Subscribe">Profile</a>
              <a href="#Subscribe">Favourites</a>
              <a href="#Subscribe">My Orders</a>
              <?php echo anchor("account_controller/logout", "Logout") ?>
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
