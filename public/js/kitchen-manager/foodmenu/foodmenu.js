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
  
  function changeAvButton(){
    var i,text;
    var av_unav = document.getElementsByClassName("availability");  // Availability divs
    var av_btns = document.getElementsByClassName("av-btn");        // Available buttons
    var unav_btns = document.getElementsByClassName("unav-btn");    // Unavailable buttons
    
      for(i=0; i<av_unav.length; i++){
        text = av_unav[i].innerHTML;
        if(text == "available" || text=="Available"){
          unav_btns[i].className = unav_btns[i].className.replace("inactive","unavailable");
          unav_btns[i].disabled =  false;
        }
        if(text == "unavailable" || text=="Unavailable"){
          av_btns[i].className = av_btns[i].className.replace("inactive","available");
          av_btns[i].disabled =  false;
        }
      }
  
  }