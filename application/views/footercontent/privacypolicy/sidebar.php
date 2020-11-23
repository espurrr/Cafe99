
<div class="sidebar-wrapper">
        <div class="sidebar">
           <!-- <div class="profile-details">
                <div class="avatar"><i class="fa fa-user-circle"></i></div>
                <div class="profile-text">
                    <p class="name">Kamal Perera</p>
                    <p class="role">Restaurant Manager</p>
                </div>
            </div>-->
            <ul>
                 <!--  <li><a href="aboutus.php" class="normal">About Us</a></li>-->
                 <li><?php echo anchor("footercontent_controller/aboutus", "About Us",['class'=>"normal"]) ?></li>
             <!--   <li><a href="../contact/contact.php" class="normal">Contact</a></li>-->
             <li><?php echo anchor("footercontent_controller/contact", "Contact",['class'=>"normal"]) ?></li>
              <!--  <li><a href="../feedback/feedback.php" class="normal">Give Us Feedback</a></li>-->
              <li><?php echo anchor("footercontent_controller/feedback", "Give Us Feedback",['class'=>"normal"]) ?></li>
             <!--   <li><a href="../privacypolicy/privacy-policy.php" class="active normal">Privacy Policy</a></li>-->
             <li><?php echo anchor("footercontent_controller/privacypolicy", "Privacy Policy",['class'=>"active normal"]) ?></li>
            </ul>
           
        </div>
    </div>

