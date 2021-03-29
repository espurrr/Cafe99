$(document).ready(function() {
    //when user selects add to cart button of a food
    $(".addtocartbtn").on("click", function() {
        var food_id = $(this).data("id");
        var food_subcat = $(this).data("subcat");
        var food_cat = $(this).data("cat");
        var food_name = $(this).data("name");
        var price = $(this).data("price");
        var qty = $("#qty").val();
        // alert(price);
        // alert(qty);
        // alert(food_id);
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
                ///////////////////////////////////////////////////////////////////////////////////////continue from here
                var res = JSON.parse(data);

                //increments the cart item count flag in the header
                // var increment = document.getElementById('step');
                // increment.val() = (parseInt(increment.val())) + 1;

                // alert(res.msg);
            },
        });
        location.reload(true);
        // alert('something');
    });
});