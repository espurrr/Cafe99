<?php

$dataPoints1 = array();
$dataPoints2 = array();
$dataPoints3 = array();
$dataPoints4 = array();
$dataPoints5 = array();
$dataPoints6 = array();
$dataPoints7 = array();

try{
    $link = new \PDO('mysql:host=localhost;dbname=cafe99;charset=utf8mb4','root','',
                     
                     array(
                            \PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                            \PDO::ATTR_PERSISTENT => false
                        )

                    );

    $handle1 = $link->prepare('select Date(Order_Date_Time) AS date,SUM(Item_Count) AS total_sales From orders Group By date'); 
    $handle1->execute(); 
    $result1 = $handle1->fetchAll(\PDO::FETCH_OBJ);

    $handle2 = $link->prepare('select Monthname(Date(Order_Date_Time)) AS month,SUM(Total_price) AS monthly_earning From orders Group By month'); 
    //select Monthname(Date(Order_Date_Time)) AS month,SUM(Total_price) AS monthly_earning From orders where now() - INTERVAL 12 month Group By month
    $handle2->execute(); 
    $result2 = $handle2->fetchAll(\PDO::FETCH_OBJ);

    $handle3 = $link->prepare('select Order_ID,sum(case when Payment_method="cash" then 1 else 0 end) AS CashCount,sum(case when Payment_method="payhere" then 1 else 0 end) AS PayhereCount From orders');
    //select Order_ID,sum(case when Payment_method="cash" then 1 else 0 end) AS CashCount,sum(case when Payment_method="payhere" then 1 else 0 end) AS PayhereCount From orders where Order_Date_Time=CURRENT_DATE
    $handle3->execute(); 
    $result3 = $handle3->fetchAll(\PDO::FETCH_OBJ);

    $handle4 = $link->prepare('select Order_ID,sum(case when isCashier="0" then 1 else 0 end) AS App,sum(case when isCashier="1" then 1 else 0 end) AS WalkingCustomer From orders'); 
    //select Order_ID,sum(case when isCashier="0" then 1 else 0 end) AS App,sum(case when isCashier="1" then 1 else 0 end) AS WalkingCustomer From orders where Order_Date_Time=CURRENT_DATE  
    $handle4->execute(); 
    $result4 = $handle4->fetchAll(\PDO::FETCH_OBJ);

    $handle5 = $link->prepare('select Date(Order_Date_Time) AS date,COUNT(Order_ID) AS PickupOrders From orders where Order_type="pick-up" Group By date');
    //select Date(Order_Date_Time) AS date,COUNT(Order_ID) AS PickupOrders From orders where Order_type="pick-up" AND (CURRENT_DATE - INTERVAL 7 DAY) Group By date 
    $handle5->execute(); 
    $result5 = $handle5->fetchAll(\PDO::FETCH_OBJ);

    $handle6 = $link->prepare('select Date(Order_Date_Time) AS date,COUNT(Order_ID) AS DineinOrders From orders where Order_type="dine-in" Group By date'); 
    //select Date(Order_Date_Time) AS date,COUNT(Order_ID) AS DineinOrders From orders where Order_type="dine-in" AND (CURRENT_DATE - INTERVAL 7 DAY) Group By date
    $handle6->execute(); 
    $result6 = $handle6->fetchAll(\PDO::FETCH_OBJ);

    $handle7 = $link->prepare('select Date(Order_Date_Time) AS date,COUNT(Order_ID) AS DeliveryOrders From orders where Order_type="delivery" Group By date');
    //select Date(Order_Date_Time) AS date,COUNT(Order_ID) AS DeliveryOrders From orders where Order_type="delivery" AND (CURRENT_DATE - INTERVAL 7 DAY) Group By date 
    $handle7->execute(); 
    $result7 = $handle7->fetchAll(\PDO::FETCH_OBJ);
        
    foreach($result1 as $row){
        array_push($dataPoints1, array("lable"=>$row->date, "y"=> $row->total_sales));
    }
    foreach($result2 as $row){
        array_push($dataPoints2, array("label"=>$row->month, "y"=> $row->monthly_earning));
    }
    foreach($result3 as $row){
        array_push($dataPoints3, array("label"=>"Payhere","y"=> $row->PayhereCount),array("label"=>"Cash","y"=>$row->CashCount));
    }
    foreach($result4 as $row){
        array_push($dataPoints4, array("label"=>"App","y"=> $row->App),array("label"=>"WalkingCustomer","y"=> $row->WalkingCustomer));
    }
    foreach($result5 as $row){
        array_push($dataPoints5, array("label"=>$row->date, "y"=> $row->PickupOrders));
    }
    foreach($result6 as $row){
        array_push($dataPoints6, array("label"=>$row->date, "y"=> $row->DineinOrders));
    }
    foreach($result7 as $row){
        array_push($dataPoints7, array("label"=>$row->date, "y"=> $row->DeliveryOrders));
    }
    $link = null;
}
catch(\PDOException $ex){
    print($ex->getMessage());
}

?>

<!DOCTYPE HTML>
<html>
<head>  
<script>
window.onload = function () {

/*var chart = new CanvasJS.Chart("chartContainer1", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", 
    title:{
        text: "Daily Sales"
    },
    axisX:{
        title: "Date",
        titleFontWeight: "bold",
        labelFontWeight:"bold"
    },
    axisY:{
        title: "Sales",
        titleFontWeight: "bold",
        labelFontWeight:"bold"
    },
    data: [{
        type: "bar",
        //color: "darkgreen",  
        dataPoints: <?php //echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();*/

var chart = new CanvasJS.Chart("chartContainer1", 
{
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", 
    title:{
        text: "Sales in a Restaurant"
    },
    axisX:{
        title: "Date",
        titleFontWeight: "bold",
        labelFontWeight:"bold"
    },
    axisY:{
        title: "Sales",
        titleFontWeight: "bold",
        labelFontWeight:"bold"
    },
    legend:{
        cursor: "pointer",
        
    },
    data: [{
        type: "stackedBar",
        name: "PickupOrders",
        showInLegend: "true", 
        dataPoints: <?php echo json_encode($dataPoints5, JSON_NUMERIC_CHECK); ?>
    },
    {
        type: "stackedBar",
        name: "DineinOrders",
        showInLegend: "true",  
        dataPoints: <?php echo json_encode($dataPoints6, JSON_NUMERIC_CHECK); ?>
    },
    {
        type: "stackedBar",
        name: "DeliveryOrders",
        showInLegend: "true",  
        dataPoints: <?php echo json_encode($dataPoints7, JSON_NUMERIC_CHECK); ?>

    },]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer2", {
    animationEnabled: true,
    exportEnabled: true,
    theme: "light1", 
    title:{
        text: "Monthly Earning"
    },
    axisX:{
        title: "Month",
        titleFontWeight: "bold",
        labelFontWeight:"bold",
        gridThickness: 1
    },
    axisY:{
        title: "Earnings",
        titleFontWeight: "bold",
        labelFontWeight:"bold"
    },
    data: [{
        type: "line",
        markerType: "cross", 
        dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
    }]
});
chart.render();

var chart = new CanvasJS.Chart("chartContainer3",
    {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "Payment Methods"
        },
        legend:{
        cursor: "pointer",
        },
        data: [
        {
            type: "doughnut",
            showInLegend: true,
            legendText: "{label} : {y}",
            dataPoints: <?php echo json_encode($dataPoints3, JSON_NUMERIC_CHECK); ?>
        },
        ]
    });
chart.render();

var chart = new CanvasJS.Chart("chartContainer4",
    {
        animationEnabled: true,
        exportEnabled: true,
        title: {
            text: "Customer Type"
        },
        legend:{
        cursor: "pointer",
        },
        data: [
        {
            type: "doughnut",
            showInLegend: true,
            legendText: "{label} : {y}",
            dataPoints: <?php echo json_encode($dataPoints4, JSON_NUMERIC_CHECK); ?>
        },
        ]
    });
chart.render();
    
    }

</script>
</head>
<body>
<div id="chartContainer1" style="width: 45%; height: 300px;display: inline-block;"></div> 
<div id="chartContainer2" style="width: 45%; height: 300px;display: inline-block;"></div><br/>
<div id="chartContainer3" style="width: 45%; height: 300px;display: inline-block;"></div>
<div id="chartContainer4" style="width: 45%; height: 300px;display: inline-block;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>