function changeFoodTab(evt, category) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("menu_container");
    for (i = 0; i < tabcontent.length; i++) {
      tabcontent[i].style.display = "none";
    }
  
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");// Remove active status, if therer is any
    }
    
    document.getElementById(category).style.display = "block";
    evt.currentTarget.className += " active";
} 


