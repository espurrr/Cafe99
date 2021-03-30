function onclickAddToCart(foodid){
    var button = document.getElementById('add_to_cart_btn'+foodid);

    var food_id = button.getAttribute('data-id');
    var food_subcat = button.getAttribute('data-subcat');
    var food_cat = button.getAttribute('data-cat');
    var food_name = button.getAttribute('data-name');
    var price = button.getAttribute('data-price');
    var qty = document.getElementById("qty"+foodid).value;

    // alert(qty);
    // alert(qty);

    $.ajax({
        data: {
            action: "addtocart",
            food_id: food_id,
            food_name: food_name,
            qty: qty,
            price: price,
            food_cat: food_cat,
            food_subcat: food_subcat,

        },
        type: "post",
        url: "http://localhost/cafe99/cashier_controller/addtocart",

        success: function(data) {
            // console.log(data);
            
            var res = JSON.parse(data);

            //increments the cart item count flag in the header
            // var increment = document.getElementById('step');
            // increment.val() = (parseInt(increment.val())) + 1;

            // alert(res.msg);
        },
    });
    location.reload(true);
    // alert('something');
}

