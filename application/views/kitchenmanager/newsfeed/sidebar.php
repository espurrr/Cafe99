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
                <!-- <li><a href="../../news_feed/1.1/news_feed.php" class="active normal">News Feed</a></li> -->
                <li><?php echo anchor("km_controller/newsfeed", "News Feed",['class'=>"active normal"])?></li>
                <!-- <li><a href="../../orders/1.1/orders.php" class="normal">Orders</a></li> -->
                <li><?php echo anchor("km_controller/orders", "Orders",['class'=>"normal"])?></li>
                <!-- <li><a href="food_menu.php" class="normal">Food Menu</a></li> -->
                <li><?php echo anchor("km_controller/foodmenu", "Food Menu",['class'=>"normal"])?></li>

            </ul>
            <!-- <div><a href="" class="logout-btn normal">Logout</a></div> -->
            <div><?php echo anchor("km_controller/logout", "Logout",['class'=>"logout-btn normal"])?></div>
        </div>
    </div>