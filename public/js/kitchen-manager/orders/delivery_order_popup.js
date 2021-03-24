var del_popup_win = document.getElementById("del-popup-window");
var del_win_content_wrapper = document.getElementById("del-win-content-wrapper");
var del_close_btn = document.getElementById("del-close-btn");

function showDelOrderModal(order_id, del_persons) {
    // order_id=12;
    // del_persons = "12-www,15-yyy,21-ppp";
    del_persons = del_persons.split(",");

    del_popup_win.style.display = "block";
    var form = "";
    var i, temp;

    form += "<label for='delivery_persons'>Select a delivery person:&nbsp;&nbsp;</label>";
    form += "<select name='delivery_persons_id' id='delivery_persons'>";

    for (i = 0; i < del_persons.length; i++) {
        temp = del_persons[i].split("-");
        form += "<option value='" + order_id + "," + temp[0] + "'>";
        form += "&nbsp;&nbsp;" + temp[0] + "&nbsp;-&nbsp;&nbsp;" + temp[1] + "</option>";
    }

    form += "</select><br><br>";
    form += " <button class='dispatch-btn btn' type='submit'>Dispatch</button>";
    
    document.getElementById("del-orderNo").innerHTML = "Order No - " + order_id;
    document.getElementById("del_person_form").innerHTML = form;
    



}

del_close_btn.onclick = function() {
    del_popup_win.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == del_win_content_wrapper) {
        del_popup_win.style.display = "none";
    }
    if (event.target == win_content_wrapper) {
        popup_win.style.display = "none";
    }
}