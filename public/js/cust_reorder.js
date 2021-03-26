var popup_win = document.getElementById("popup-window");
var close_btn = document.getElementById("close-btn");

function showModal(order_id, item_list, amount) {

    var id = order_id;
    //sets data id attribute for reorder_now button
    $("#reorder_now").data("id", id);

    //empty the rows before
    var tr = document.getElementById("rows");
    tr.innerHTML = "";

    item_list.forEach(element => {
        //insert new row to tbody
        var row = tr.insertRow(-1);
        //there are 2 columns
        var column1 = row.insertCell(0);
        var column2 = row.insertCell(1);
        // 1 -> Food name, 2-> Quantity
        column1.innerHTML = element.Food_name;
        column2.innerHTML = element.Quantity;

    });

    var popup_amount = document.getElementById("popup_amount");
    popup_amount.innerHTML = "Amount : LKR " + amount;

    popup_win.style.display = "block";
    document.getElementById("orderNo").innerHTML = "Order #" + order_id;

}

close_btn.onclick = function() {
    popup_win.style.display = "none";
}

window.onclick = function(event) {
    if (event.target == popup_win) {
        popup_win.style.display = "none";
    }
}

$("#reorder_now").click(function() {

    var order_id = $(this).data("id");

    $.ajax({
        url: "http://localhost/cafe99/customer_controller/reorderSubmit/" + order_id,

        success: function() {
            popup_win.style.display = "none";
            location.reload(true);
            // $(".food_menu_wrapper").load(location.href + " .food_menu_wrapper");
            // tried using this, just to reload the food_menu_wrapper component..
            // but the content position changed.. so went with reloading the whole page :)
        },
    });
});