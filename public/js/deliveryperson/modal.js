var popup_win = document.getElementById("order-popup-window");
var view_btn = document.getElementById("view-btn");
var close_btn = document.getElementById("close-btn");


function showModal(cust_address, food_str){
    popup_win.style.display = "block";

    food_arr = food_str.split(","); // Food and quantity list of a customer
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
        table += "<td><div class='foodname'>" + temp[0] + "</div></td>";
        table += "<td ><div class='quantity'>" + temp[1] + "</div></td>";
        table += "</tr>";
    }
    
    table += "</table>";

    document.getElementById("win-cust-address").innerHTML = "<b>Address</b> :<br> " + cust_address;
    document.getElementById("win-table").innerHTML = table;
}
 
close_btn.onclick = function() {
    popup_win.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == popup_win){
        popup_win.style.display = "none";
    }
}