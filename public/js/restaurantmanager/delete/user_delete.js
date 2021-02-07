var popup_win = document.getElementById("popup-window");
var modal_cancel_btn = document.getElementById("modal-cancel-btn");
var modal_delete_btn = document.getElementById("modal-delete-btn");

function showDeleteModal(id) {
    var id = id;
    $("#modal-delete-btn").data("id", id); //sets data id attribute
    popup_win.style.display = "block";
    document.getElementById("message").innerHTML =
        "Are you sure you want to delete this from users?";
}

modal_cancel_btn.onclick = function() {
    popup_win.style.display = "none";
};
$("#modal-delete-btn").click(function() {
    var id = $(this).data("id");
    // alert(id);
    $.ajax({
        url: "http://localhost/cafe99/rm_controller/delete_user_data/" + id,

        success: function() {
            popup_win.style.display = "none";
            location.reload(true);
           
        },
    });
});