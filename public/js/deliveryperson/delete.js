var popup_win = document.getElementById("popup-window");
var modal_cancel_btn = document.getElementById("modal-cancel-btn");
var modal_delete_btn = document.getElementById("modal-delete-btn");

function showDeleteModal(id) {
    var order_id = id;
    $("#modal-delete-btn").data("id", order_id); //sets data id attribute
    popup_win.style.display = "block";
    document.getElementById("message").innerHTML =
        "Are you sure you want to delete this from dispatched list?";
}

modal_cancel_btn.onclick = function() {
    popup_win.style.display = "none";
};
$("#modal-delete-btn").click(function() {
    var order_id = $(this).data("id");
    // alert(order_id);
    $.ajax({
        url: "http://localhost/cafe99/delivery_controller/deleteOrder/" + order_id,

        success: function() {
            popup_win.style.display = "none";
            location.reload(true);
           
        },
    });
});