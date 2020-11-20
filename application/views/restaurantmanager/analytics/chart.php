<!--<!DOCTYPE HTML>
<html>
<head>
<script type="text/javascript">
window.onload = function () {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "light1", // "light2", "dark1", "dark2"
	animationEnabled: false, // change to true		
	title:{
		text: "Sales Data Chart Of Week"
	},
	data: [
	{
		// Change type to "bar", "area", "spline", "pie",etc.
		type: "column",
		dataPoints: [
			{ label: "Sunday",  y:70000 },
			{ label: "Monday", y: 50000 },
			{ label: "Tuesday", y:50550  },
			{ label: "Wednesday",  y:54800 },
            { label: "Thursday",  y: 40000 },
            { label: "Friday",  y: 70000 },
            { label: "Saturday",  y: 67900  }
		]
	}
	]
});
chart.render();

}
</script>
</head>
<body>

<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"> </script>
</body>
</html>-->

<!--pie char-->

<?php include "analytics-sidebar.php"; ?>
<!DOCTYPE HTML>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<?php echo link_css("css/restaurantmanager/analytics/analytics-sidebar.css?ts=<?=time()?>");?>
<script>
window.onload = function() {

var chart = new CanvasJS.Chart("chartContainer", {
	theme: "dark1", // "light1", "light2", "dark1", "dark2"
	exportEnabled: true,
	animationEnabled: true,
	title: {
		text: "Sales Data Chart Of Week"
	},
	data: [{
		type: "column",
		startAngle: 25,
		toolTipContent: "<b>{label}</b>: {y}%",
		showInLegend: "true",
		legendText: "{label}",
		indexLabelFontSize: 16,
		indexLabel: "{label} - {y}%",
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
chart.render();

}
</script>
</head>
<body>
<div id="chartContainer" style="margin-left:250px;height: 600px; width: 82%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>

</body>
</html>