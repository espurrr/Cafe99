<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Header -->

    <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <!-- hero and content -->
    <?php echo link_css("css/home.css?ts=<?=time()?>"); ?>
    <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@800&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">

    <title>Cafe99</title>
    <!-- Footer -->
    <?php echo link_css("css/footer_1.css?ts=<?=time()?>"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

<body style="background: #fff url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
  <?php  if ($this->get_session('role')=='customer'){
          include '../application/views/header/cust-logged-in-header.php';
    }else{
      include '../application/views/header/header.php';
    }
     ?>

    <main>
        <!-- hero image -->
        <div class="section-1_wrapper" style="background: #FAD74E url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">
            <section class="section-1">
                <div class="hero-image1">
  
                <img src="<?php echo BASE_URL?>/public/images/home/hero1.png" class = "section-1__hero-image__cls"alt="Image 01">
                </div>
                <div class="hero-image2">
                    <img src="<?php echo BASE_URL?>/public/images/home/hero2.png" class = "section-1__hero-image__cls"alt="Image 01">
                </div>
                <div class="hero-text">
                    <h1>You want it. We have it.</h1>
                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam, impedit.</p>
                </div>
            </section>
        </div>

        <div class="product-list-container">
            <div class="product-list">
                <div class="title">Most Popular</div>
                <div class="row">
                    <div class="column">
                        <div class="card">
                                <img src="<?php echo BASE_URL?>/public/images/home/slider/1.jpg" alt="">
                                <p>Card 01</p>
                                <p>Some text</p>
                        </div>
                    </div>
                
                    <div class="column">
                        <div class="card">
                            <img src="<?php echo BASE_URL?>/public/images/home/slider/2.jpg" alt="">
                                <p>Card 01</p>
                                <p>Some text</p>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                            <img src="<?php echo BASE_URL?>/public/images/home/slider/3.jpg" alt="">
                                <p>Card 01</p>
                                <p>Some text</p>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                            <img src="<?php echo BASE_URL?>/public/images/home/slider/4.jpg" alt="">
                                <p>Card 01</p>
                                <p>Some text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="product-list-container">
            <div class="product-list">
                <div class="title">Newly Introduced</div>
                <div class="row">
                    <div class="column">
                        <div class="card">
                                <img src="<?php echo BASE_URL?>/public/images/home/slider/1.jpg" alt="">
                                <p>Card 01</p>
                                <p>Some text</p>
                        </div>
                    </div>
                
                    <div class="column">
                        <div class="card">
                            <img src="<?php echo BASE_URL?>/public/images/home/slider/2.jpg" alt="">
                                <p>Card 01</p>
                                <p>Some text</p>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                            <img src="<?php echo BASE_URL?>/public/images/home/slider/3.jpg" alt="">
                                <p>Card 01</p>
                                <p>Some text</p>
                        </div>
                    </div>
                    
                    <div class="column">
                        <div class="card">
                            <img src="<?php echo BASE_URL?>/public/images/home/slider/4.jpg" alt="">
                                <p>Card 01</p>
                                <p>Some text</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="env-container">
            <div class="box-list">
                <div class="box">
                    <div class="image" style="background-image: url('<?php echo BASE_URL?>/public/images/home/staff.svg');"></div>
                    <p class="topic">Friendly Staff</p>
                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni impedit laborum voluptatem incidunt aliquid sunt.</p>
                </div>
                <div class="box">
                    <div class="image" style="background-image: url('<?php echo BASE_URL?>/public/images/home/cup.svg');"></div>
    
                    <p class="topic">Freshness Guaranteed</p>
                    <p class="text">Lorem ipsum dolor sit amet consectetur, adipisicing elit. Amet et saepe, eum hic error alias.</p>
                </div>
                <div class="box">
                    <div class="image" style="background-image: url('<?php echo BASE_URL?>/public/images/home/chill.svg');"></div>
    
                    <p class="topic">Feel like home</p>
                    <p class="text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Quidem consequuntur asperiores hic, vero sint cupiditate?</p>
                </div>
            </div>
        </div>

        <div class="section-2">
            <div class="text column2">
                <div class="paragraph"><p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Rem voluptatibus voluptatem aspernatur numquam, repellat enim.</p></div>
                <div class="btn"><button href="#" onclick="scrollToTop()">Let's eat</button></div>
            </div>
            <div class="image column2"><img src="<?php echo BASE_URL?>/public/images/home/bg-env.png" alt="Image 01"></div>
        </div>
    </main>
    
    <?php include 'footer/footer_1.php';?>

    <?php echo link_js("js/home.js"); ?>
    <!-- <script>
 var session = eval('(<?php echo json_encode($_SESSION)?>)');
 console.log(session);



</script> -->
</body>
</html>