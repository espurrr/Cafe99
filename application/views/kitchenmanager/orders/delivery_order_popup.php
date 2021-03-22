<div id="del-popup-window" class="del-popup-window">
    <div class="del-win-content-wrapper" id="del-win-content-wrapper">
        <div class="del-win-content" >
            <span class="del-close-btn" id="del-close-btn"><i class="fas fa-times"></i></span>
            <div id="del-orderNo" class="del-orderNo"></div>
            <div class="del-person" id="del-person">
                <?php echo form_open("km_controller/updateDeliveryOrderStatus","POST",["id"=>'del_person_form']) ?>
                <?php echo form_close() ?>
            </div>
        </div>
    </div>
</div>