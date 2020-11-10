<!DOCTYPE html>
<html>
<head>
	<?php echo link_css("css/error.css?ts=<?=time()?>"); ?>
	
	<title>
		Error 404
	</title>
</head>
<body>
    <?php include 'index-new-new.php';?>
<div class="error-text" >
	<h1 class="text">Ooops...</h1>
	<h1 class="text">Something is missing</h1>
</div>
<div class="error">

	<img class="error-image"src="../public/images/404.png">
</div>
<div class="error-text" >
	<div class="text-line">
		<a href="#"><h1 class="text">Get back</h1></a>
	<h1 class="text">or visit our</h1>
	</div>
	<a href="#"><h1 class="text">Home page</h1></a>
</div>
<?php include 'footer1.php';?>
</body>
</html>