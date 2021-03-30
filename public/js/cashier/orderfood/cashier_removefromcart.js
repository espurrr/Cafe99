function onclickDeleteCartitem(cartitem_id){
    var button = document.getElementById('remove_from_cart_btn'+cartitem_id);

    var food_id = button.getAttribute('data-id');
    var food_name = button.getAttribute('data-name');
    var food_qty = button.getAttribute('data-qty');
    var food_price = button.getAttribute('data-price');
    // alert(food_price);


    $.ajax({
        data: {
            action: "removefromcart",
            food_id: food_id,
            food_name: food_name,
            qty: food_qty,
            price: food_price,

        },
        type: "post",

        url: "http://localhost/cafe99/cashier_controller/removefromcart",


        success: function(data) {
            console.log(data);
            
            var res = JSON.parse(data);

            //increments the cart item count flag in the header
            // var increment = document.getElementById('step');
            // increment.val() = (parseInt(increment.val())) + 1;

            // alert(res.msg);
        },
    });
    location.reload(true);
}