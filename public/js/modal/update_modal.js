var view_btn = document.getElementById("view-btn");
var popup_win = document.getElementById("popup-window");
var cancel_btn = document.getElementById("modal-cancel-btn");
var save_btn = document.getElementById("modal-save-btn");

view_btn.onclick = function() {
    popup_win.style.display = "block";
}

cancel_btn.onclick = function() {
    popup_win.style.display = "none";
}
save_btn.onclick = function() {
    popup_win.style.display = "none";
}