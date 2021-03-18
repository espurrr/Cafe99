var popup_win = document.getElementById("popup-window");
var modal_cancel_btn = document.getElementById("modal-cancel-btn");
var modal_delete_btn = document.getElementById("modal-delete-btn");

function showDeleteModal(qty, name, id, price) {
    var food_id = id;
    var food_qty = qty;
    var food_price = price;
    $("#modal-delete-btn").data("id", food_id); //sets data id attribute
    $("#modal-delete-btn").data("qty", food_qty); //sets data qty attribute
    $("#modal-delete-btn").data("price", food_price); //sets data qty attribute
    popup_win.style.display = "block";
    document.getElementById("cart_mod").innerHTML =
        "Are you sure you want to delete " + food_qty + " of " + name + " from cart?";
}

modal_cancel_btn.onclick = function() {
    popup_win.style.display = "none";
};
$("#modal-delete-btn").click(function() {

    var food_id = $(this).data("id");
    var food_qty = $(this).data("qty");
    var food_price = $(this).data("price");

    $.ajax({
        url: "http://localhost/cafe99/customer_controller/removefromcart/" + food_id + "/" + food_qty + "/" + food_price,

        success: function() {
            popup_win.style.display = "none";
            location.reload(true);
            // $(".food_menu_wrapper").load(location.href + " .food_menu_wrapper");
            // tried using this, just to reload the food_menu_wrapper component..
            // but the content position changed.. so went with reloading the whole page :)
        },
    });
});