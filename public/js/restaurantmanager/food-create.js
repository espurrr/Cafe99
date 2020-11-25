function changeSubCat(){
    var cat = document.getElementById("category").value;
    var items;
    if (cat === "Food") {
        items = [[1,"Rice"], [2,"Pizza"], [3,"Savouries"], [4,"Cake"], [5,"Noodles & Pasta"], [6,"Biriyani"],[ 7,"Bun"]];
    } else  if(cat === "Drinks"){
        items = [[8,"Coffee"], [9,"Fresh Fruit Juice"], [10,"Ice Blended"], [11,"Milk Shake"], [12,"Tea"]];
    }else  if(cat === "Desserts"){
        items = [[13,"Ice-cream"],[14,"Custards & Puddings"],[15,"Muffin"], [16,"CheeseCake"]];
    }
    var str = "";
    for (var item of items) {
        // str += "<option value='"+item.replaceAll(' ','')+"'>" + item + "</option>";
        str += "<option value='"+item[0]+"'>" + item[1] + "</option>";

    }
    document.getElementById("subcategory").innerHTML = str;
}