var block_popup_win = document.getElementById("block-popup-window");
var block_modal_cancel_btn = document.getElementById("block-modal-Bcancel-btn");
var block_modal_block_btn = document.getElementById("block-modal-blocked-btn");

function showUnblockModal(id) {
    var id = id;
    $("#block-modal-blocked-btn").data("id", id); //sets data id attribute
    block_popup_win.style.display = "block";
    document.getElementById("block-message").innerHTML =
        "Are you sure you want to unblock this user?";
        document.getElementById("block-modal-blocked-btn").innerHTML =
        "Unblock";
        
}

block_modal_cancel_btn.onclick = function() {
    block_popup_win.style.display = "none";
};
$("#block-modal-blocked-btn").click(function() {
    var id = $(this).data("id");
    // alert(id);
    $.ajax({
        url: "http://localhost/cafe99/rm_controller/unblock_user/" + id,

        success: function() {
            block_popup_win.style.display = "none";
            location.reload(true);
           
        },
    });
});