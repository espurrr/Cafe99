
<div class="sidebar-wrapper">
        <div class="sidebar">
            <div class="profile-details">
                <div class="avatar"><i class="fa fa-user-circle"></i></div>
                <div class="profile-text">
               <!--     <p class="name">Kamal Perera</p>-->
               <?= $this->get_session('user_name');?>
                    <p class="role">Restaurant Manager</p>
                </div>
            </div>
            <ul>
            <li><?php echo anchor("rm_controller/index", "Overview",['class'=>"normal"]) ?></li>

                  <!--    <li><a href="#" class="active normal">News Feed</a></li>-->
              <li><?php echo anchor("rm_controller/newsfeed", "News Feed",['class'=>"normal"]) ?></li>
            <!--    <li><a href="users/RM.php" class="normal">Users</a></li>-->
            <li><?php echo anchor("rm_controller/users", "Users",['class'=>"active normal"]) ?></li>
             <!--   <li><a href="orders/RM.php" class="normal">Orders</a></li>-->
             <li><?php echo anchor("rm_controller/orders", "Orders",['class'=>"normal"]) ?></li>
                <li><div class="dropdown-container">
                        <button class="dropdown-btn normal">Food Menu<i class="fa fa-caret-right"></i></button>
                        <div class="dropdown-content">
                         <!--   <a href="fooditem/RM.php" class="dropdown-item">Food item</a>-->
                         <?php echo anchor("rm_controller/fooditem", "Food item",['class'=>"dropdown-item"]) ?>
                         <!--   <a href="subcategory/RM.php" class="dropdown-item">SubCategory</a>-->
                         <?php echo anchor("rm_controller/subcategory", "SubCategory",['class'=>"dropdown-item"]) ?>
                         <!--   <a href="category/RM.php" class="dropdown-item">Category</a>-->
                         <?php echo anchor("rm_controller/category", "Category",['class'=>"dropdown-item"]) ?>
                        </div>
                    </div>
                </li>
                <!-- <li><a href="analytics/analytics.php" class="normal">Analytics</a></li>-->
                <li><?php // echo anchor("rm_controller/analytics", "Analytics",['class'=>"normal"]) ?></li>
            </ul>
         <!--   <div><a href="#" class="logout-btn normal">Logout</a></div>-->
            <div><?php echo anchor("rm_controller/logout", "Logout",['class'=>"logout-btn normal"])?></div>
        </div>
    </div>

   