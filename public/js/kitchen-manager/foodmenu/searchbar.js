function hide_subcat(search){
    var subcats = document.getElementsByClassName("subcategory-title");
    var grid = document.getElementsByClassName("grid");
    var i;
    for (i = 0; i < subcats.length; i++) {
        // if(grid[i].innerHTML === ""){
            
        // }  
        subcats[i].innerHTML = "";
        subcats[i].style.display = "none";
    }
    if(search = "searched"){
        document.getElementById("rice").innerHTML = "";
    }
    
}
// window.onload = hide_subcat();