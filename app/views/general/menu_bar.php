<div class="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <a href="#"><img src="img/home_icon.png" alt="Home"></a>
            </div>
            <div class="col-3">
                <img src="img/search_icon.png" alt="Search Games">
            </div>
            <div class="col-3">
                <img src="img/favorites_icon.png" alt="Favorite Games">
            </div>
            <div class="col-3">                
                <a href="<?php if(isset($_SESSION['current_page']) && $_SESSION['current_page'] != 'login') '../app/controllers/login_controller.php'; ?>"><img src="img/user_icon.png" alt="Login or Register"></a>
            </div>                       
        </div>
    </div>
</div>