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
    <?php echo link_css("css/kitchen-manager/orders/delivery_order_popup.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/header.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/footer_3.css?ts=<?=time()?>"); ?>
    <?php echo link_css("css/style.css?ts=<?=time()?>"); ?>

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.1/css/all.css" integrity="sha384-vp86vTRFVJgpjF9jiIGPEEqYqlDwgyBgEF109VFjmqGmIY/Y4HV4d3Gp2irVfcrp" crossorigin="anonymous">
</head>

<body>
    <div class="page-container" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
    <?php include 'sidebar.php';?>
    <div class="content-wrapper">
    <?php include '../application/views/header/header-dashboard.php';?>
    <?php include 'popup.php';?>

    <!-- ************ Flash msgs ************ -->
    <div class="status-msg-wrapper">
        <div class="status-msg" style="margin-bottom:20px">
            <?php $this->flash('databaseError','alert alert-danger','fa fa-times-circle'); ?>
            <?php $this->flash('noordersError','alert alert-warning','fa fa-times-circle'); ?>
            <?php $this->flash('orderUpdateSuccessEmailNotSent','alert alert-warning','fa fa-times-circle'); ?>
            <?php $this->flash('orderUpdateSuccessEmailSent','alert alert-success','fa fa-check'); ?>
        </div>
    </div>

    <div class="tab" style="background: #FBDD3F url('<?php echo BASE_URL?>/public/images/texture.png') repeat;">
    <?php if($status == "Onqueue"): ?>
        <button class="tablinks active" onclick="changeOrderTab(event, 'Onqueue')">Onqueue</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Processing')">Processing</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Ready')">Ready</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Dispatched')">Dispatched</button>
    </div>
    <?php endif; ?>

    <?php if($status == "Processing"): ?>
        <button class="tablinks" onclick="changeOrderTab(event, 'Onqueue')">Onqueue</button>
        <button class="tablinks active" onclick="changeOrderTab(event, 'Processing')">Processing</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Ready')">Ready</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Dispatched')">Dispatched</button>
    </div>
    <?php endif; ?>

    <?php if($status == "Ready"): ?>
        <button class="tablinks" onclick="changeOrderTab(event, 'Onqueue')">Onqueue</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Processing')">Processing</button>
        <button class="tablinks active" onclick="changeOrderTab(event, 'Ready')">Ready</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Dispatched')">Dispatched</button>
    </div>
    <?php endif; ?>

    <?php if($status == "Dispatched"): ?>
        <button class="tablinks" onclick="changeOrderTab(event, 'Onqueue')">Onqueue</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Processing')">Processing</button>
        <button class="tablinks" onclick="changeOrderTab(event, 'Ready')">Ready</button>
        <button class="tablinks active" onclick="changeOrderTab(event, 'Dispatched')">Dispatched</button>
    </div>
    <?php endif; ?>

    <?php
        $concat_data = [];
        $special_notes = [];
        $order_status = [];
        $order_types = [];
        $dp_ids_names = "";

        foreach ($data as $row){
            $concat_data[$row->Order_ID] .= $row->Food_name."-".$row->Quantity.","; // Foodname and quantity
            $special_notes[$row->Order_ID] = $row->Special_notes;   //Special notes related to a specific order_No
            $order_status[$row->Order_ID] = $row->Order_status;
            $order_types[$row->Order_ID] = $row->Order_type;
        }
        // print_r($order_types);

        foreach($concat_data as $order_id => $values){
            $concat_data[$order_id] = rtrim($concat_data[$order_id],",");
        }
        // print_r($special_notes);

        foreach($dp_data as $row){
            $dp_ids_names .= $row->User_ID."-".$row->User_name.",";
        }
        $dp_ids_names = rtrim($dp_ids_names, ",");
    ?>
    <div id="Onqueue" class="tabcontent" style="display: <?php echo ($status == "Onqueue") ? "block": "none"; ?>;">
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
                <td><?php echo $order_id.str_repeat('&nbsp;', 3)."(".$order_types[$order_id].")" ?></td>
                <td ><div class="cell-desc"><?php echo $values ?></div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn" onclick='showModal(<?php echo $order_id ?>, <?php echo json_encode($special_notes[$order_id]) ?>, <?php echo json_encode($values) ?>, <?php echo json_encode($order_types[$order_id]) ?>)'>View</button>
                        <?php echo form_open("km_controller/updateOrderStatus","POST");?>
                        <button class="second-btn btn" name="onqueue" value="<?php echo $order_id;?>">Take In</button>
                        <?php echo form_close();?>

                    </div>
                </td>
            </tr>

            <?php endif; ?>
            <?php endforeach; ?>

          </table>
    </div>

    <div id="Processing" class="tabcontent" style="display: <?php echo ($status == "Processing") ? "block": "none"; ?>;">
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
                <td><?php echo $order_id.str_repeat('&nbsp;', 3)."(".$order_types[$order_id].")" ?></td>
                <td ><div class="cell-desc"><?php echo $values ?></div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn" onclick='showModal(<?php echo $order_id; ?>,<?php echo json_encode($special_notes[$order_id]); ?> ,<?php echo json_encode($values); ?>, <?php echo json_encode($order_types[$order_id]) ?>);'>View</button>                  
                        <?php echo form_open("km_controller/updateOrderStatus","POST");?>
                        <button class="second-btn btn" name="processing" value="<?php echo $order_id;?>">Ready</button>
                        <?php echo form_close();?>
                    </div>
                </td>
            </tr>

            <?php endif; ?>
            <?php endforeach; ?>

        </table>
    </div>

    <div id="Ready" class="tabcontent" style="display: <?php echo ($status == "Ready") ? "block": "none"; ?>;">
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
                <td>
                    <?php 
                        // if($order_types[$order_id] == "delivery"){
                        //     echo $order_id .str_repeat('&nbsp;', 3)."(Delivery)";
                        // }else{
                        //     echo $order_id;
                        // }
                        echo $order_id.str_repeat('&nbsp;', 3)."(".$order_types[$order_id].")"

                    ?>
                </td>
                <td ><div class="cell-desc"><?php echo $values ?></div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn" onclick='showModal(<?php echo $order_id; ?>,<?php echo json_encode($special_notes[$order_id]); ?> ,<?php echo json_encode($values); ?>, <?php echo json_encode($order_types[$order_id]) ?>);'>View</button>                  
                        <?php 
                            if($order_types[$order_id] == "delivery"):
                                include 'delivery_order_popup.php';
                        ?>
                                <button class="second-btn btn" onclick='showDelOrderModal(<?php echo $order_id?>, <?php echo json_encode($dp_ids_names); ?> )'> Dispatch </button>

                        <?php
                            else:
                                echo form_open("km_controller/updateOrderStatus","POST");
                        ?>
                                <button class="second-btn btn" name="ready" value="<?php echo $order_id ?>">Dispatch</button>
                        <?php   echo form_close();
                            endif;
                        ?>
                    </div>
                </td>
            </tr>

            <?php endif; ?>
            <?php endforeach; ?>

          </table>

            
    </div>

    <div id="Dispatched" class="tabcontent" style="display: <?php echo ($status == "Dispatched") ? "block": "none"; ?>;">
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
                <td><?php echo $order_id.str_repeat('&nbsp;', 3)."(".$order_types[$order_id].")" ?></td>
                <td ><div class="cell-desc"><?php echo $values ?></div></td>
                <td>
                    <div class="btn-container">
                        <button class="first-btn btn" onclick='showModal(<?php echo $order_id; ?>,<?php echo json_encode($special_notes[$order_id]); ?> ,<?php echo json_encode($values); ?>, <?php echo json_encode($order_types[$order_id]) ?>);'>View</button>                                          
                        <?php echo form_open("km_controller/updateOrderStatus","POST");?>
                        <button class="second-btn btn" name="dispatched" value="<?php echo $order_id;?>">Remove</button>
                        <?php echo form_close();?>
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
    <?php echo link_js("js/kitchen-manager/orders/popup.js"); ?>
    <?php echo link_js("js/kitchen-manager/orders/delivery_order_popup.js"); ?>
</body>
</html>
