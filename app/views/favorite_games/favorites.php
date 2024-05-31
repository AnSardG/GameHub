<div class="main mrgn">
    <div class="games">
        <h2>Favorites</h2>
        <span class="subheader">This games are on hotstreak!</span>
        <div class="catalogue">
            <div class="container" id="gameContainer">
                <?php include './app/controllers/ajax/fetch_favorite_games.php'; ?>
            </div>
            <div id="more-overlay" class="d-none position-fixed left-0 w-100 bg-opacity-50 d-flex justify-content-center align-items-center" style="bottom: 50px;">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>