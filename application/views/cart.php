<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
    <?php echo link_css("css/cart.css"); ?>
    <title>Cart</title>
</head>
<body>
    <div class="cart-container">
        <div class="cart-items">
            <!-- ccccccc -->
            <div class="cart-item-container">
                <div class="container-image">
                    <img src="img/1.jpg" alt="Food"/>
                </div>
        
                <div class="container-text">
                        <div class="food-name">Twin stick</div>
                        <div class="price">Price LKR: 100.00</div>
                        <div class="subtotal">Subtotal LKR: 500.00</div>
                </div>

                <div class="btn-container">
                    <a href="#" class="delete"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
            <!-- ccccccccc -->
            <div class="cart-item-container">
                <div class="container-image">
                    <img src="img/1.jpg" alt="Food"/>
                </div>
        
                <div class="container-text">
                        <div class="food-name">Twin stick</div>
                        <div class="price">Price LKR: 100.00</div>
                        <div class="subtotal">Subtotal LKR: 500.00</div>
                </div>

                <div class="btn-container">
                    <a href="#" class="delete"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
            <!-- ccccccccc -->
            <div class="cart-item-container">
                <div class="container-image">
                    <img src="img/1.jpg" alt="Food"/>
                </div>
        
                <div class="container-text">
                        <div class="food-name">Twin stick</div>
                        <div class="price">Price LKR: 100.00</div>
                        <div class="subtotal">Subtotal LKR: 500.00</div>
                </div>

                <div class="btn-container">
                    <a href="#" class="delete"><i class="fas fa-trash-alt"></i></a>
                </div>
            </div>
        </div>

        <div class="cart">
            <a href="#" id="float">
            <i class="fa fa-plus my-float"></i>
            </a>
        </div>

        <div class="overlay" id="overlay"></div>
        <div class="modal" id="modal">
        <button class="modal-close-btn" id="close-btn">
            <i class="fa fa-times" title="cross"></i>
        </button>
        <div class="title">Order Summary</div>
            <div class="total">Total: 1000.00</div>
            <button class="buy" href="#" >Buy Now</button>

        </div>

        <div class="summary-container">
            <div class="title">Order Summary</div>
            <div class="total">Total: 1000.00</div>
            <button class="buy" href="#" >Buy Now</button>

        </div>
        
       
    </div>
    <script>
        document.getElementById('float').addEventListener('click', function() {
            document.getElementById('overlay').classList.add('is-visible');
            document.getElementById('modal').classList.add('is-visible');
        });

        document.getElementById('close-btn').addEventListener('click', function() {
            document.getElementById('overlay').classList.remove('is-visible');
            document.getElementById('modal').classList.remove('is-visible');
        });
        document.getElementById('overlay').addEventListener('click', function() {
            document.getElementById('overlay').classList.remove('is-visible');
            document.getElementById('modal').classList.remove('is-visible');
        });


    </script>
    
</body>
</html>