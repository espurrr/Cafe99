<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Header -->

    <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    
    <!-- search bar -->
    <?php echo link_css("css/cust-searchbar.css?ts=<?=time()?>"); ?>

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
<!-- Food names are concatenated into a single string -->
<?php
    $food_names = "";
    foreach($data['food_names'] as $row){
        // echo $row->Food_name;
        $food_names .= $row->Food_name . ",";
    }
    $food_names = rtrim($food_names, ",");
?>
<!-- Hidden field to store all the foodname -->
<input type="hidden" id="search_food_names" value="<?php echo $food_names; ?>">

<div class="page-container">
<div class="content-wrapper" >

    <?php   
        if ($this->get_session('role')=='customer'){
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

                    <!-- Search bar -->
                    <div class="search_container search_page" id="search_page_container" style="display: none">
                        <?php //echo form_open("food_controller/searchfood", "POST");?>
                        <form id="serachbar_form" autocomplete="off" action="<?php echo BASE_URL ?>/food_controller/search_food" method="POST">
                            <div class="autocomplete" style="width:300px;">
                                <input id="search_page" type="text" name="search_food" placeholder="Search...">
                            </div>
                            <button type="submit" id="searchbar_submit"><i class="fa fa-search"></i></button>
                        </form>
                        <?php //echo form_close();?>
                    </div>

                    <h1>You want it. We have it.<?php echo $data[0]->Food_name ?></h1>
                    <p>Food, drinks, and desserts for dinein, delivery and pickup.</p>
                </div>
            </section>
        </div>

        <div class="product-list-container">
            <div class="product-list">
                <div class="title">Most Popular</div>
                <div class="row">
                    <?php foreach($data['most_popular_food'] as $row): ?>
                    <div class="column">
                        <div class="card">
                        <a href="<?php echo BASE_URL?>/food_controller/menu/<?php echo $row->Category_name."/".$row->Subcategory_name."/".$row->Food_ID ?>">
                        <img src="<?php echo BASE_URL?>/public/images/food-dash-images/<?php echo $row->Category_name?>/<?php echo $row->Subcategory_name?>/<?php echo str_replace(' ','',$row->Food_name)?>.jpg" 
                        alt="Image not found"></a>
                            <p class="name">
                            <a href="<?php echo BASE_URL?>/food_controller/menu/<?php echo $row->Category_name."/".$row->Subcategory_name."/".$row->Food_ID ?>">
                            <?php echo $row->Food_name ?></p></a>
                            <!-- <p class="text">
                            <?php
                                if(empty($row->Description)){
                                    echo str_repeat('&nbsp;', 50)."\n".str_repeat('&nbsp;', 50);
                                }else{
                                    echo substr($row->Description, 0, 47)."...";
                                }
                            ?>
                            </p> -->
                        </div>
                    </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>

        <div class="product-list-container">
            <div class="product-list">
                <div class="title">Newly Introduced</div>
                <div class="row">
                    <?php foreach($data['newly_added'] as $row): ?>
                        <div class="column">
                            <div class="card">
                                <a href="<?php echo BASE_URL?>/food_controller/menu/<?php echo $row->Category_name."/".$row->Subcategory_name."/".$row->Food_ID ?>">
                                <img src="<?php echo BASE_URL?>/public/images/food-dash-images/<?php echo $row->Category_name?>/<?php echo $row->Subcategory_name?>/<?php echo str_replace(' ','',$row->Food_name)?>.jpg" 
                                alt="image not found"></a>
                                <p class="name">
                                <a href="<?php echo BASE_URL?>/food_controller/menu/<?php echo $row->Category_name."/".$row->Subcategory_name."/".$row->Food_ID ?>">
                                <?php echo $row->Food_name ?></p></a>
                                <!-- <p class="text">
                                <?php
                                    if(empty($row->Description)){
                                        echo str_repeat('&nbsp;', 50)."\n".str_repeat('&nbsp;', 50);
                                    }else{
                                        echo substr($row->Description, 0, 47)."...";
                                    }
                                ?>
                                </p> -->
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
        <div class="env-container">
            <div class="box-list">
                <div class="box">
                    <div class="image" style="background-image: url('<?php echo BASE_URL?>/public/images/home/staff.svg');"></div>
                    <p class="topic">Friendly Staff</p>
                    <p class="text">We have a staff consisting of a variety of personalities working here, To provide excelent customer service.</p>
                </div>
                <div class="box">
                    <div class="image" style="background-image: url('<?php echo BASE_URL?>/public/images/home/cup.svg');"></div>
    
                    <p class="topic">Freshness Guaranteed</p>
                    <p class="text">It all begins with the ingredients we choose from all around Sri Lanka. We’ve partnered with local farmers and growers to source their freshest and best.</p>
                </div>
                <div class="box">
                    <div class="image" style="background-image: url('<?php echo BASE_URL?>/public/images/home/chill.svg');"></div>
    
                    <p class="topic">Feel like home</p>
                    <p class="text">Making customers happy, makes us happy. Come have a good meal feeling like you are at home.</p>
                </div>
            </div>
        </div>

        <div class="section-2">
            <div class="text column2">
                <div class="paragraph"><p>One thousand flavors in one place</p></div>
                <div class="btn"><button href="#" onclick="scrollToTop()">Let's eat</button></div>
            </div>
            <div class="image column2"><img src="<?php echo BASE_URL?>/public/images/home/bg-env.png" alt="Image 01"></div>
        </div>
    </main>
    </div><!-- content-wrapper ends-->
    <?php include 'footer/footer_1.php';?>
    </div> <!-- page-contianer ends-->


    <?php echo link_js("js/home.js"); ?>
    <?php echo link_js("js/cust_searchbar.js"); ?>

    <!-- <script>
 var session = eval('(<?php echo json_encode($_SESSION)?>)');
 console.log(session);



</script> -->
</body>
</html>