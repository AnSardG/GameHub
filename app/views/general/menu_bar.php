<?php
$current_page = $_SESSION['current_page'] ?? '';
?>

<?php if($current_page != 'login') : ?>

<div class="menu-bar">
    <input id="search-input" class="search-bar w-100 d-none position-absolute z-3">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <a href="/">
                    <img src="public/img/home_icon.png" alt="Home">
                </a>
            </div>
            <div class="col-3">
                <img id="search-icon" src="public/img/search_icon.png" alt="Search Games" style="cursor: pointer;">
            </div>
            <div class="col-3">
                <img src="public/img/favorites_icon.png" alt="Favorite Games">
            </div>
            <div class="col-3">
                <a href="/?logout=true">
                    <img src="public/img/user_icon.png" alt="Login or Register">
                </a>
            </div>
        </div>
    </div>
</div>

<div id="loader-overlay" class="d-none position-fixed top-0 left-0 w-100 h-100 bg-white bg-opacity-50 d-flex justify-content-center align-items-center">
    <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
</div>
<?php endif; ?>