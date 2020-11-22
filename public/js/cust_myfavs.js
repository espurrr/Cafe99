var popup_win = document.getElementById("popup-window");
var modal_cancel_btn = document.getElementById("modal-cancel-btn");
var modal_delete_btn = document.getElementById("modal-delete-btn");

function showDeleteModal(name, id) {
    var food_id = id;
    $("#modal-delete-btn").data("id", food_id); //sets data id attribute
    popup_win.style.display = "block";
    document.getElementById("favNo").innerHTML =
        "Are you sure you want to delete " + name + " from favourites?";
}

modal_cancel_btn.onclick = function() {
    popup_win.style.display = "none";
};
$("#modal-delete-btn").click(function() {
    var food_id = $(this).data("id");
    // alert(food_id);
    $.ajax({
        url: "http://localhost/cafe99/customer_controller/fav_delete/" + food_id,

        success: function() {
            popup_win.style.display = "none";
            location.reload(true);
            // $(".food_menu_wrapper").load(location.href + " .food_menu_wrapper");
            // tried using this, just to reload the food_menu_wrapper component..
            // but the content position changed.. so went with reloading the whole page :)
        },
    });
});