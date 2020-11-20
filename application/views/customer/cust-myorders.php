
<!DOCTYPE html>
<html lang="en" >
<head>

  <!-- Content -->
  <meta charset="UTF-8">
  <title>Favorites</title>
  <?php echo link_css("css/cust-favorites.css?ts=<?=time()?>"); ?>
  <?php echo link_css("css/cust-myorders.css?ts=<?=time()?>"); ?>
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
  

   <!-- Jquery link -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js" integrity="sha512-bLT0Qm9VnAYZDflyKcBaQ2gg0hSYNQrJ8RilYldYQ1FxQYoCLtUjuuRuZo+fjqhx/qtq/1itJ0C2ejDxltZVFg==" crossorigin="anonymous"></script>


</head>

<body>
  <?php include '../application/views/header/cust-logged-in-header.php';?>
  <ul class="breadcrumb">
        <li><a href="../cafe99_complete_home_final/1.1/home.php">Home</a></li>
        <li>My Orders</li>
  </ul>

  
<div class="tabcontent" style="display: block;">
          <table>
  <caption>My Orders</caption>
  <thead>
    <tr>
      <th scope="col">Order ID</th>
      <th scope="col">Date</th>
      <th scope="col">Payment Status</th>
      <th scope="col">Order Status</th>
      <th scope="col">Amount</th>
      <th scope="col"></th>
    </tr>
  </thead>
  <tbody>
    <tr>
      <td data-label="Order ID" >5019</td>
      <td data-label="Date">04/01/2016</td>
      <td data-label="Payment Status">Cash on Service</td>
      <td data-label="Order Status">Preparing</td>
      <td data-label="Amount">LKR 1,190</td>
      <td><div class="btn-container">
        <button class="repeat-btn btn">Repeat</button>
        </div></td>
    </tr>
    <tr>
      <td data-label="Order ID" >5019</td>
      <td data-label="Date">04/01/2016</td>
      <td data-label="Payment Status">Cash on Service</td>
      <td data-label="Order Status">Preparing</td>
      <td data-label="Amount">LKR 1,190</td>
      <td><div class="btn-container">
        <button class="repeat-btn btn">Repeat</button>
        </div></td>
    </tr>
 
  </tbody>
</table>
</div>
    </div>
  
  <!-- <?php include '../application/views/footer/footer_1.php';?> -->
  <?php echo link_js("js/cust_myfavs.js"); ?>
</body>
</html>
