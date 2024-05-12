<?php
$current_page = isset($_SESSION['current_page']) ? $_SESSION['current_page'] : '';

switch ($current_page) {
    case 'details':
    case 'login':
        $href = 'index.php';
        break;
    default:
        $href = '#';
        break;
}
?>

<div class="menu-bar">
    <div class="container">
        <div class="row">
            <div class="col-3">
                <a href="<?php echo $href; ?>">
                    <img src="img/home_icon.png" alt="Home">
                </a>
            </div>
            <div class="col-3">
                <img src="img/search_icon.png" alt="Search Games">
            </div>
            <div class="col-3">
                <img src="img/favorites_icon.png" alt="Favorite Games">
            </div>
            <div class="col-3">
                <a href="<?php echo 'index.php?login=true' ?>">
                    <img src="img/user_icon.png" alt="Login or Register">
                </a>
            </div>
        </div>
    </div>
</div>