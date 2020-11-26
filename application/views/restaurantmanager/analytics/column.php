<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script>
window.onload = function() {

var chart1 = new CanvasJS.Chart("chartContainer1", {
	theme: "light2", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Daily Sales"
	},
	data: [{
		type: "column",
		color:"#696767",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{y}%",
		dataPoints: [
			{ y: 17.36, label: "Sunday" },
			{ y: 12.40, label: "Monday" },
			{ y: 12.54, label: "Tuesday" },
			{ y: 13.59, label: "Wednesday" },
			{ y: 9.92, label: "Thursday" },
			{ y: 17.36, label: "Friday" },
			{ y:16.84, label: "Saturday" }
		]
	}]
});
chart1.render();

}
</script>
</head>
<body>
<div id="chartContainer1" style="height: 500px; width:100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>