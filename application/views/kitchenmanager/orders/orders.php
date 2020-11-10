<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <link rel="stylesheet" href="../../../../public/css/kitchen-manager/orders/sidebar.css?ts=<?=time()?>">
    <link  rel="stylesheet" href="../../../../public/css/kitchen-manager/orders/orders.css?ts=<?=time()?>">
    <link rel="stylesheet" href="../../../../public/css/kitchen-manager/orders/popup.css?ts=<?=time()?>">
    <link rel="stylesheet" href="../../../../public/css/header.css?ts=<?=time()?>">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>
<body>
    <?php include 'sidebar.php';?>
    <?php include '../header/header.php';?>
    <?php include 'popup.php';?>
    <div class="tab">
        <button class="tablinks active" onclick="changeOrderTab(event, 'Onqueue')">Onqueue</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Processing')">Processing</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Ready')">Ready</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Dispatched')">Dispatched</button>
    </div>

    <div id="Onqueue" class="tabcontent" style="display: block;">
        <table>
            <colgroup>
                <col span="" class="col-orderID">
                <col span="" class="col-desc">
                <col span="" class="col-btns">
            </colgroup>

            <tr>
                <th>Order ID</th>
                <th>Description</th>
                <th></th>
            </tr>

            <tr>
                <td>01</td>
                <td ><div class="cell-desc">Lorem,u dolor sit et consectetur adipisicing elit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn" onclick="showModal(121)">View</button>
                        <button class="second-btn btn">Take In</button>
                    </div>
                </td>
            </tr>

            <tr>
                <td>02</td>
                <td ><div class="cell-desc">Lorem,uium dolor sLorem,uium dolor sit et consectetur adipisicing elit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Take In</button>
                    </div>
                </td>
            </tr>

            <tr>
                <td>03</td>
                <td ><div class="cell-desc">Lorem,uium dolor sit et consectetur adipisicing elit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Take In</button>
                    </div>
                </td>
            </tr>
          </table>
    </div>

    <div id="Processing" class="tabcontent">
        <table>
            <colgroup>
                <col span="" class="col-orderID">
                <col span="" class="col-desc">
                <col span="" class="col-btns">
            </colgroup>

            <tr>
                <th>Order ID</th>
                <th>Description</th>
                <th></th>
            </tr>

            <tr>
                <td>01</td>
                <td ><div class="cell-desc"> adipisicing elit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Ready</button>
                    </div>
                </td>
            </tr>

            <tr>
                <td>02</td>
                <td ><div class="cell-desc">r adipisicing elit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Ready</button>
                    </div>
                </td>
            </tr>

            <tr>
                <td>03</td>
                <td ><div class="cell-desc">tetur adipisicing elit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Ready</button>
                    </div>
                </td>
            </tr>
          </table>
    </div>

    <div id="Ready" class="tabcontent">
        <table>
            <colgroup>
                <col span="" class="col-orderID">
                <col span="" class="col-desc">
                <col span="" class="col-btns">
            </colgroup>

            <tr>
                <th>Order ID</th>
                <th>Description</th>
                <th></th>
            </tr>

            <tr>
                <td>01</td>
                <td ><div class="cell-desc">Lorem,uium ctetur adipisicing elit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Dispatch</button>
                    </div>
                </td>
            </tr>

            <tr>
                <td>02</td>
                <td ><div class="cell-desc">Lorem,uium dolor sit et consectetur alit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Dispatch</button>
                    </div>
                </td>
            </tr>

            <tr>
                <td>03</td>
                <td ><div class="cell-desc">Lorem,uium do consectetur adipisicing elit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Dispatch</button>
                    </div>
                </td>
            </tr>
          </table>

            
    </div>

    <div id="Dispatched" class="tabcontent">
        <table>
            <colgroup>
                <col span="" class="col-orderID">
                <col span="" class="col-desc">
                <col span="" class="col-btns">
            </colgroup>

            <tr>
                <th>Order ID</th>
                <th>Description</th>
                <th></th>
            </tr>

            <tr>
                <td>01</td>
                <td ><div class="cell-desc">Lorem,uium dolors ecteturt.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Remove</button>
                    </div>
                </td>
            </tr>

            <tr>
                <td>02</td>
                <td ><div class="cell-desc">Lorem,t et consectetur adipisicing elit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Remove</button>
                    </div>
                </td>
            </tr>

            <tr>
                <td>03</td>
                <td ><div class="cell-desc">Lorem,usit et consectdipisicing elit.</div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn">View</button>
                        <button class="second-btn btn">Remove</button>
                    </div>
                </td>
            </tr>
          </table>
    </div>
    <script src="../../../../public/js/kitchen-manager/orders/orders.js"></script>
    <script src="../../../../public/js/kitchen-manager/foodmenu/popup.js"></script>
</body>
</html>
