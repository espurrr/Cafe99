function readMore(id) {
    // alert('readMore func');
    var element,i;
    var dots = document.getElementsByClassName("dots");
    var moreText = document.getElementsByClassName("more");
    var more_btn = document.getElementsByClassName("readMore");
    var less_btn = document.getElementsByClassName("readLess");
    var ann_ids = document.getElementsByClassName("a-id");
    for (i = 0; i < ann_ids.length; i++) {
       if(ann_ids[i].innerHTML == id){
          element = i; 
        }
    }

    // Expanded
    if (dots[element].style.display === "none") {
      dots[element].style.display = "inline";
      more_btn[element].style.display = "inline";
      moreText[element].style.display = "none";
      less_btn[element].style.display = "none";
  
    } else { // Hidden
      dots[element].style.display = "none";
      more_btn[element].style.display = "none";
      moreText[element].style.display = "inline";
      less_btn[element].style.display = "inline";
    }
}