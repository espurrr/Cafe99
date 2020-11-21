<!DOCTYPE HTML>
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
</html>


