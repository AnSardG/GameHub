<div class="main mrgn">
<<<<<<< Updated upstream
    <div class="favorites">
        <h2>Favorites</h2>
        <span class="subheader">This games are on hotstreak</span>
        <div class="favorite-games">
            photos and cool things
        </div>
    </div>
    <div class="games">
        <h2>More games</h2>
        <span class="subheader">Inside are hidden gems for sure</span>
        <div class="catalogue">
            photos and cool things
        </div>
    </div>
</div>
=======
    <?php if (isset($_SESSION['logged']) && $_SESSION['logged']) : ?>
        <div class="favorites">
            <h2>Favorites</h2>
            <span class="subheader">This games are on hotstreak</span>
            <div class="favorite-games">
                photos and cool things
            </div>
        </div>
    <?php endif ?>
    <div class="games">
        <?php if (isset($_SESSION['logged']) && $_SESSION['logged']) : ?>
            <h2>More games</h2>
        <?php else : ?>
            <h2>Popular games</h2>
        <?php endif ?>
        <span class="subheader">Inside are hidden gems for sure</span>
        <div class="catalogue">
            <div class="container" id="gameContainer">
                <?php include '../app/views/general/fetch_games.php'; ?>
            </div>
        </div>
    </div>
</div>

<script src='js/home.js'></script>
>>>>>>> Stashed changes
