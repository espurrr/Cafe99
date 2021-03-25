var popup_win = document.getElementById("popup-window");
var win_content_wrapper = document.getElementById("win-content-wrapper");
var close_btn = document.getElementById("close-btn");

function showModal(id, special_note, food_str, order_type) { //coconut-2,tea-4,pizza-1
    popup_win.style.display = "block";
    // alert("In showModal()");

    food_arr = food_str.split(",");
    var table = "";
    var i, temp;
    table += "<table>";
    table += "<colgroup> <col span='' class='col-food'><col span='' class='col-quantity'></colgroup>";
    table += "<tr>";
    table += "<th>Food item</th>";
    table += "<th>Quantity</th>";
    table += "</tr>";

    for (i = 0; i < food_arr.length; i++) {
        temp = food_arr[i].split("-");
        table += "<tr>";
        table += "<td>" + temp[0] + "</td>";
        table += "<td ><div class='quantity'>" + temp[1] + "</div></td>";
        table += "</tr>";
    }
    table += "</table>";

    document.getElementById("orderNo").innerHTML = "<div class='fontWeight'>Order No - &nbsp;&nbsp;</div>" + id;
    if(special_note){
      document.getElementById("special-note").innerHTML = "<div class='fontWeight'><i class='far fa-clipboard'></i>&nbsp; Special Notes - &nbsp;&nbsp;</div>" + special_note;
    }else{
      document.getElementById("special-note").innerHTML = "<div class='fontWeight'><i class='far fa-clipboard'></i>&nbsp; Special Notes - &nbsp;&nbsp;</div>" + "No special notes";
    }
    document.getElementById("order-type").innerHTML = "<div class='fontWeight'>Order Type - &nbsp;&nbsp;</div>" + capitalizeFirstLetter(order_type) ;
    document.getElementById("win-table").innerHTML = table;
}

close_btn.onclick = function() {
    popup_win.style.display = "none";
}

// This part is included in delivery_order_popup.js, window.onclick function
window.onclick = function(event) { 
    if (event.target == win_content_wrapper) {
        popup_win.style.display = "none";
    }
}

function capitalizeFirstLetter(string) {
  return string.charAt(0).toUpperCase() + string.slice(1);
}