

function autocomplete(searchbar, food_arr) {
  var currentFocus;

  searchbar.addEventListener("input", function(e) { /* Runs when type in the search bar */
      var val = this.value; /* Val is assigned the value we type in the search bar input field */
      
      closeAllLists();
      if (!val)
        return false;
      
      currentFocus = -1;

      /* Create a DIV element that will contain the list_items*/
      var dropdown_list = document.createElement("DIV");
      dropdown_list.setAttribute("id", this.id + "autocomplete-list");
      dropdown_list.setAttribute("class", "autocomplete-items");
      this.parentNode.appendChild(dropdown_list); /* Append the DIV element as a child of the autocomplete container */

      var list_item_limit = 0;
      for (var i = 0; i < food_arr.length; i++) {
        var regex = new RegExp(".*" + val + ".*", "i");
        var res = regex.test(food_arr[i]);

        if (res) {
          if(screen.width >= 910){
            if(list_item_limit == 8)
              break;
          }else{
            if(list_item_limit == 4)
              break;
          }

          list_item_limit++;
          var list_item = document.createElement("DIV"); /* Create a DIV element for each matching element */
          list_item.innerHTML = food_arr[i];
          /* Insert a input field that will hold the current array item's value */
          list_item.innerHTML += "<input type='hidden' value='" + food_arr[i] + "'>";
          dropdown_list.appendChild(list_item);

          /* When clicked on a list item, it's added to the searchbar value, then closes the dropdown list*/
          list_item.addEventListener("click", function(e) {
            searchbar.value = this.getElementsByTagName("input")[0].value;
            closeAllLists();
          });
        }
      }
  });


  /* Execute this function when a key on the keyboard pressed, used for arrow key dropdown list traversal*/
  searchbar.addEventListener("keydown", function(key) {
      var dropdown_list = document.getElementById(this.id + "autocomplete-list");
      
      if (dropdown_list)
        list_items = dropdown_list.getElementsByTagName("div"); /* Get elements in dropdown_list */

      if (key.keyCode == 40) {/* When DOWN arrow  key is pressed, increase the currentFocus variable */ 
        currentFocus++;
        addActive(list_items); /* Highlight the current selected list_item */

      } else if (key.keyCode == 38) { /* Up arrow is pressed */
        currentFocus--;
        addActive(list_items);

      } else if (key.keyCode == 13) { /* If the ENTER key is pressed, prevent the form being submitted */
        key.preventDefault();

        /* Checks whether arrow key has been pressed and simulate a click on the active item when ENTER key is pressed*/
        if (currentFocus > -1) { 
          if (list_items)
            list_items[currentFocus].click();
            document.getElementById("searchbar_submit").focus();

        }
      }
  });


  function addActive(list_items) { /* Highlights the current active item of dropdown list */
    if (!list_items)
      return false;

    removeActive(list_items); /* Remove active class from all the items */

    if (currentFocus >= list_items.length) /* Goes from bottom to top of the list */
      currentFocus = 0;
    if (currentFocus < 0) /* Goes from top to bottom of the list */
      currentFocus = (list_items.length - 1);

    list_items[currentFocus].classList.add("autocomplete-active");
  }


  function removeActive(list_items) { /* Remove active class from all the items */
    for (var i = 0; i < list_items.length; i++) {
      list_items[i].classList.remove("autocomplete-active");
    }
  }


  function closeAllLists(list_item) {
    /* Close all autocomplete lists in the document, except the one passed as an argument */
    var dropdown_list = document.getElementsByClassName("autocomplete-items");
    for (var i = 0; i < dropdown_list.length; i++) {
      if (list_item != dropdown_list[i] && list_item != searchbar) {
        dropdown_list[i].parentNode.removeChild(dropdown_list[i]);
      }
    }
  }


  /* Hide dropdown list when clicked somewhere else in the page */
  document.addEventListener("click", function (e) {
      closeAllLists(e.target);
  });
}


var food_names = document.getElementById("search_food_names").value;
food_names = food_names.split(",");
// var food_names = ["pizza", "bun", "rice", "juice", "cake"];

if(screen.width >= 910){
  document.getElementById("search_page_container").style.display = "block";
  document.getElementById("search_header_container").style.display = "none";
  autocomplete(document.getElementById("search_page"), food_names);

}else{
  document.getElementById("search_page_container").style.display = "none";
  document.getElementById("search_header_container").style.display = "block";
  autocomplete(document.getElementById("search_header"), food_names);


}




