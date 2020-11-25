<!--<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
window.onload = function() {

var chart2 = new CanvasJS.Chart("chartContainer2", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Earnings"
	},
	data: [{
		type: "line",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
		dataPoints: [
			{ y: 17.36, label: "January" },
			{ y: 12.40, label: "February" },
			{ y: 12.54, label: "March" },
			{ y: 13.59, label: "April" },
			{ y: 9.92, label: "June" },
			{ y: 17.36, label: "July" },
			{ y:16.84, label: "August" },
            { y:18.24, label: "September" },
            { y:10.20, label: "October" },
            { y:15.56, label: "November" }
		]
	}]
});
chart2.render();

}
</script>
</head>
<body>
<div id="chartContainer2" style="height: 400px; width:100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>-->

<!DOCTYPE HTML>
<html>
<head>
  <script type="text/javascript">
  window.onload = function () {
    var chart2 = new CanvasJS.Chart("chartContainer2",
    {

      title:{
      text: "Earnings"
      },
       data: [
      {
        type: "line",

        dataPoints: [
        { x: new Date(2020, 01, 1), y: 17.36},
        { x: new Date(2020, 02, 1), y: 12.40},
        { x: new Date(2020, 03, 1), y: 12.54},
        { x: new Date(2020, 04, 1), y: 13.59},
        { x: new Date(2020, 05, 1), y: 9.92 },
        { x: new Date(2020, 06, 1), y: 17.36},
        { x: new Date(2020, 07, 1), y:16.84 },
        { x: new Date(2020, 08, 1), y:18.24 },
        { x: new Date(2020, 09, 1), y:10.20 },
        { x: new Date(2020, 10, 1), y:15.56 }
       
        ]
      }
      ]
    });

    chart2.render();
  }
  </script>
 <script type="text/javascript" src="https://canvasjs.com/assets/script/canvasjs.min.js"></script></head>
<body>
  <div id="chartContainer2" style="height: 500px; width: 100%;">
  </div>
</body>
</html>


