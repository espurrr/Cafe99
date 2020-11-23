var popup_win = document.getElementById("popup");
// var view_btn = document.getElementById("view-btn");
var close_btn = document.getElementById("closebtn");


// view_btn.onclick = function() {
//     popup_win.style.display = "block";
// }
// function showModal(id){
//   popup_win.style.display = "block";
//   document.getElementById("orderNo").innerHTML = "Order No: " + id;
// }


close_btn.onclick = function() {
    popup_win.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == popup_win) {
    popup_win.style.display = "none";
  }
}