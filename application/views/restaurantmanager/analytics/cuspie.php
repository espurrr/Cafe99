<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript">
  window.onload = function () {
    var chart3 = new CanvasJS.Chart("chartContainer3",
    {
      title:{
        text: "Customer"
      },
      data: [
      {
       type: "doughnut",
       dataPoints: [
       {  y: 63.37, indexLabel: "App" },
       {  y: 39.0, indexLabel: "Walk-in-Customer" }
       ]
     }
     ]
   });

    chart3.render();
  }
  </script>
  <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
  <body>
    <div id="chartContainer3" style="height: 500px; width: 100%;">
    </div>
  </body>
 </html>