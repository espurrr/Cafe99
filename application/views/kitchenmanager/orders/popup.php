<div id="popup" class="modal">
    <div class="modal-wrapper">
        <div class="modal-content">
            <div class="container">
                <?php
                    $order_id = $_GET['order_id'];
                    $values = $_GET['values'];
                    $special_note = $_GET['special_note'];
                ?>
                <p class="orderNo">Order ID : <?php echo " ".$order_id;?></p>
                <p class = "special_notes"><i class="far fa-clipboard"></i>&nbsp;&nbsp;Special Notes : <?php echo " ".$special_note;?></p>
                <a href="" class="closebtn">×</a>
                <!-- <button id="closebtn"class="closebtn">×</button> -->
                <div class="win-table">
                    
                    <table>
                        <colgroup>
                            <col span="" class="col-food">
                            <col span="" class="col-quantity">
                        </colgroup>
            
                        <tr>
                            <th>Food item</th>
                            <th>Quantity</th>
                        </tr>

                        <?php
                            $values = (explode(",",$values));

                            foreach($values as $value):
                                $temp = explode("-",$value);
                        ?>
                        <tr>
                            <td><?php echo $temp[0]; ?></td>
                            <td ><div class="quantity"><?php echo $temp[1]; ?></div></td>
                        </tr>
                        <?php endforeach; ?>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
