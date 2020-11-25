var view_btn = document.getElementById("view-btn");
var popup_win = document.getElementById("popup-window");
var modal_cancel_btn = document.getElementById("modal-cancel-btn");
var modal_delete_btn = document.getElementById("modal-delete-btn");

view_btn.onclick = function() {
    popup_win.style.display = "block";
}

modal_cancel_btn.onclick = function() {
    popup_win.style.display = "none";
}
modal_delete_btn.onclick = function() {
    popup_win.style.display = "none";
}