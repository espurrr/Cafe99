<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript">
  window.onload = function () {
    var chart4 = new CanvasJS.Chart("chartContainer4",
    {
      title:{
        text: "Payment Methods"
      },
      data: [
      {
       type: "doughnut",
       dataPoints: [
       {  y: 63.37, indexLabel: "Cash" },
       {  y: 39.0, indexLabel: "Payhere" },
       ]
     }
     ]
   });

    chart4.render();
  }
  </script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
  <body>
    <div id="chartContainer4" style="height: 500px; width: 100%;">
    </div>
  </body>
 </html>