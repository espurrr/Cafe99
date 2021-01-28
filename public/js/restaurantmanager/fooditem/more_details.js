var popup_win = document.getElementById("popup-window");
var win_content_wrapper = document.getElementById("win-content-wrapper");
var close_btn = document.getElementById("close-btn");

function showMoreDetails(id,special_note ,food_str){ //coconut-2,tea-4,pizza-1
    popup_win.style.display = "block";

    food_arr = food_str.split(",");
    var table = "";
    var i,temp;
    table += "<table>";
    table += "<colgroup> <col span='' class='col-food'><col span='' class='col-quantity'></colgroup>"; 
    table += "<tr>";
    table += "<th>Food item</th>";
    table += "<th>Quantity</th>";
    table += "</tr>";

    for(i=0; i<food_arr.length; i++){
      temp = food_arr[i].split("-");
      table += "<tr>";
      table += "<td>" + temp[0] + "</td>";
      table += "<td ><div class='quantity'>" + temp[1] + "</div></td>";
      table += "</tr>";
    }
    table += "</table>";
    document.getElementById("orderNo").innerHTML = "Order No - "+ id;
    document.getElementById("special-note").innerHTML = "<i class='far fa-clipboard'></i>&nbsp; Special Notes - " + special_note;
    document.getElementById("win-table").innerHTML = table;
}

close_btn.onclick = function() {
    popup_win.style.display = "none";
}

window.onclick = function(event) {
  if (event.target == win_content_wrapper) {
    popup_win.style.display = "none";
  }
}