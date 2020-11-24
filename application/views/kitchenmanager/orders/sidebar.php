
<div class="sidebar-wrapper">
        <div class="sidebar">
            <div class="profile-details">
                <div class="avatar"><i class="far fa-user-circle"></i></div>
                <div class="profile-text">
                    <p class="name"><?= $this->get_session('user_name'); ?></p>
                    <p class="role">Kitchen Manager</p>
                </div>
            </div>
            <ul>
                <!-- <li><a href="#" class="normal">News Feed</a></li> -->
                <li><?php echo anchor("km_controller/newsfeed", "News Feed",['class'=>"normal"])?></li>
                <!-- <li><a href="orders.php" class="active normal">Orders</a></li> -->
                <li><?php echo anchor("km_controller/orders", "Orders",['class'=>"active normal"])?></li>
                <!-- <li><a href="../../food_menu/1.3/food_menu.php" class="normal">Food Menu</a></li> -->
                <li><?php echo anchor("km_controller/foodmenu", "Food Menu",['class'=>"normal"])?></li>
            </ul>
            <!-- <div><a href="" class="logout-btn normal">Logout</a></div> -->
            <div><?php echo anchor("km_controller/logout", "Logout",['class'=>"logout-btn normal"])?></div>
        </div>
    </div>
