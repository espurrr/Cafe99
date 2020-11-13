<html>

<head>
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  <style>
    #logsign1 {
      background: #FAD74E url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;
    }
    #logsign2:hover {
      background: #FAD74E url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;
    }
  </style>
</head>

<body>
  <div class="topnav" id="myTopnav" style="background: #FAD74E url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">

   <img class="logo" id="mlogo" src="<?php echo BASE_URL?>/public/images/logo.png">
    
    <div class="all-nav" id="nav" >
      <div class="route-dropdown" onclick="toggleMenu(this)">
      <button class="dropbtn">Food 
          <i class="fa fa-caret-down"></i>
      </button>
      <div id="waypoints" class="dropdown-content" >
        <a href="#">Rice</a>
        <a href="#">Pizza</a>
        <a href="#">Savouries</a>
        <?php echo anchor("food_controller/", "Cakes") ?>
        <a href="#">Noodles & Pasta</a>
        <a href="#">Biriyani</a>
        <a href="#">Buns</a>
      </div>
    </div>
      <div class="route-dropdown" onclick="toggleMenu(this)">
        <button class="dropbtn">Drinks
            <i class="fa fa-caret-down"></i>
        </button>
        <div id="routes" class="dropdown-content" >
            <a href="">Tea</a>
            <a href="#">Milk Shakes</a>
            <a href="#">Ice Blended</a>
            <a href="#">Fresh Fruit Juice</a>
            <a href="#">Coffee</a>
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
      
        <div class="signlog" style="background: #FAD74E url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;" >
          <div class="route-dropdown" style="padding-right: 10px;" onclick="toggleMenu(this)">
            <button class="dropbtn" id="logsign1"><?php echo anchor("account_controller/login", "Login") ?></button>
          </div>
          
          <div class="route-dropdown" style="padding-left: 10px;" onclick="toggleMenu(this)">
            <button class="dropbtn" id="logsign2"><?php echo anchor("account_controller/signup", "Sign Up") ?></button>
          </div>
        </div>
      
    </div>
    <a href="javascript:void(0);" style="font-size:15px;border-radius: 0px;" class="icon" onclick="myFunction1(); myFunction2();myFunction3();">&#9776;</a>
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

