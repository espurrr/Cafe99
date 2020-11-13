function showResult(str) {
    var xmlhttp=new XMLHttpRequest();
    xmlhttp.onreadystatechange=function() {
        if (this.readyState==4 && this.status==200) {
            // document.getElementById("grid").innerHTML="";
            // document.getElementById("grid").innerHTML=this.responseText;
            document.getElementsByClassName("subcategory-title").innerHTML="";
            document.getElementsByClassName("grid").innerHTML="";
            document.getElementsByClassName("grid").innerHTML=this.responseText;
        }
    }
    xmlhttp.open("GET","../../../../application/views/kitchenmanager/foodmenu/searchfoods.php?input="+str,true);
    xmlhttp.send();
}

// function change_av(id){
//     var xmlhttp=new XMLHttpRequest();
//     xmlhttp.onreadystatechange=function() {
//         if (this.readyState==4 && this.status==200) {
//             document.getElementById("availability").innerHTML="";
//             document.getElementById("availability").innerHTML=this.responseText;
//         }
//     }
//     xmlhttp.open("GET","change_availability.php?id="+id,true);//Specifies the request
//     xmlhttp.send(); // 	Sends the request to the server, Used for GET requests
// }

// function change_unav(id){
//     var xmlhttp=new XMLHttpRequest();
//     xmlhttp.onreadystatechange=function() {
//         if (this.readyState==4 && this.status==200) {
//             document.getElementById("availability").innerHTML="";
//             document.getElementById("availability").innerHTML=this.responseText;
//         }
//     }
//     xmlhttp.open("GET","change_availability.php?id="+id+"&state='ua'",true);//Specifies the request
//     xmlhttp.send(); // 	Sends the request to the server, Used for GET requests
// }