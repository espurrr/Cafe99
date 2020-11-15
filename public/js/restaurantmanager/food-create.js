function changeSubCat(cat){
    // var cat = document.getElementById("category").value;
    var items;
    if (cat === "Food") {
        items = ["Rice", "Pizza", "Savouries", "Cake", "Noodles & Pasta", "Biriyani", "Bun"];
    } else  if(cat === "Drinks"){
        items = ["Coffee", "Fresh Fruit Juice", "Ice Blended", "Milk Shake", "Tea"];
    }else  if(cat === "Desserts"){
        items = ["Ice-cream","Custards & Puddings","Muffin", "CheeseCake"];
    }
    var str = "";
    for (var item of items) {
        str += "<option value='"+item.replaceAll(' ','')+"'>" + item + "</option>";
    }
    document.getElementById("subcategory").innerHTML = str;
}