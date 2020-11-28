<!DOCTYPE html>
<html>
<head>
<link
      href="http://localhost/cafe99/css/error.css"
      rel="stylesheet"
	/>
	<link
      href="http://localhost/cafe99/css/footer_1.css"
      rel="stylesheet"
    />

	
	<title>
		Error 404
	</title>
</head>
<body style="background: #fff url('<?php echo BASE_URL?>/public/images/home/texture.png') repeat;">

<div class="container">
	<a href="<?php echo BASE_URL?>/account_controller/index">
                <img src="<?php echo BASE_URL?>/public/images/logo.png">
            </a>
</div>
     
<div class="error-text" >
	<h1 class="text">Ooops...</h1>
	<h1 class="text">Something is missing</h1>
</div>
<div class="error">

	<img class="error-image"src="<?php echo BASE_URL?>/public/images/404.png">
</div>
<div class="error-text" >
	<div class="text-line">
		<a href="javascript:history.back()"><h1 class="text">Get back</h1></a>
	<h1 class="text">or visit our</h1>
	</div>
	<a href="<?php echo BASE_URL?>/account_controller/index"><h1 class="text">Home page</h1></a>
</div>
   



</body>
</html>