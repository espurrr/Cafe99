function changeOrderTab(evt, orderName) {
    var i, tabcontent, tablinks, activeDefault;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) { // tabcontent.length = number of tabcontent classes
      tabcontent[i].style.display = "none";   // hide all of them
    }
  
    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
      tablinks[i].className = tablinks[i].className.replace(" active", "");// Remove active status, if therer is any
    }
    
    document.getElementById(orderName).style.display = "block";
    evt.currentTarget.className += " active";
  } 
  