<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Orders</title>
    <?php echo link_css("css/kitchen-manager/orders/sidebar.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/header-dashboard.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/orders/orders.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/kitchen-manager/orders/popup.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>
<body>
    <div class="page-container" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
    <?php include 'sidebar.php';?>
    <div class="content-wrapper" >
    <?php include '../application/views/header/header-dashboard.php';?>
    <?php include 'popup.php';?>
    <div class="tab" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
        <button class="tablinks active" onclick="changeOrderTab(event, 'Onqueue')">Onqueue</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Processing')">Processing</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Ready')">Ready</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Dispatched')">Dispatched</button>
    </div>
    <?php
        $concat_data = [];
        $special_notes = [];
        $order_status = [];
        foreach ($data as $row){
            $concat_data[$row->Order_ID] .= $row->Food_name."-".$row->Quantity.","; // Foodname and quantity
            $special_notes[$row->Order_ID] = $row->Special_notes;   //Special notes related to a specific order_No
            $order_status[$row->Order_ID] = $row->Order_status;
        }
        foreach($concat_data as $order_id => $values){
            $concat_data[$order_id] = rtrim($concat_data[$order_id],",");
        }
        //print_r($special_notes);
    ?>
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
            <?php foreach($concat_data as $order_id => $values): ?>
            <?php if($order_status[$order_id] == "Onqueue" || $order_status[$order_id] == "onqueue"):?>

            <tr>
                <td><?php echo $order_id ?></td>
                <td ><div class="cell-desc"><?php echo $values ?></div></td>
                <td>
                    <div class="btn-container">
                        <a href="?order_id=<?php echo $order_id ?>&values=<?php echo $values ?>&special_note=<?php echo $special_notes[$order_id]?>#popup"><button class="first-btn btn">View</button></a>
                        <button class="second-btn btn">Take In</button>
                    </div>
                </td>
            </tr>

            <?php endif; ?>
            <?php endforeach; ?>

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
            <?php foreach($concat_data as $order_id => $values): ?>
            <?php if($order_status[$order_id] == "Processing" || $order_status[$order_id] == "processing"):?>

            <tr>
                <td><?php echo $order_id ?></td>
                <td ><div class="cell-desc"><?php echo $values ?></div></td>
                <td>
                    <div class="btn-container">
                        <a href="?order_id=<?php echo $order_id ?>&values=<?php echo $values ?>&special_note=<?php echo $special_notes[$order_id]?>#popup"><button class="first-btn btn">View</button></a>
                        <button class="second-btn btn">Ready</button>
                    </div>
                </td>
            </tr>

            <?php endif; ?>
            <?php endforeach; ?>

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
            <?php foreach($concat_data as $order_id => $values): ?>
            <?php if($order_status[$order_id] == "Ready" || $order_status[$order_id] == "ready"):?>

            <tr>
                <td><?php echo $order_id ?></td>
                <td ><div class="cell-desc"><?php echo $values ?></div></td>
                <td>
                    <div class="btn-container">
                        <a href="?order_id=<?php echo $order_id ?>&values=<?php echo $values ?>&special_note=<?php echo $special_notes[$order_id]?>#popup"><button class="first-btn btn">View</button></a>
                        <button class="second-btn btn">Dispatch</button>
                    </div>
                </td>
            </tr>

            <?php endif; ?>
            <?php endforeach; ?>

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
            <?php foreach($concat_data as $order_id => $values): ?>
            <?php if($order_status[$order_id] == "Dispatched" || $order_status[$order_id] == "dispatched"):?>

            <tr>
                <td><?php echo $order_id ?></td>
                <td ><div class="cell-desc"><?php echo $values ?></div></td>
                <td>
                    <div class="btn-container">
                        <a href="?order_id=<?php echo $order_id ?>&values=<?php echo $values ?>&special_note=<?php echo $special_notes[$order_id]?>#popup"><button class="first-btn btn">View</button></a>
                        <button class="second-btn btn">Remove</button>
                    </div>
                </td>
            </tr>

            <?php endif; ?>
            <?php endforeach; ?>

          </table>
    </div>

    </div><!-- content-wrapper ends-->
    <?php include '../application/views/footer/footer_3.php';?>
    </div> <!-- page-contianer ends-->

    <?php echo link_js("js/kitchen-manager/orders/orders.js"); ?>
    <?php //echo link_js("js/kitchen-manager/orders/popup.js"); ?>
</body>
</html>
