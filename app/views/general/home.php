<div class="main mrgn">
    <div class="games">
        <?php if (isset($_SESSION['logged']) && $_SESSION['logged']) : ?>
            <h2>More games</h2>
        <?php else : ?>
            <h2>Popular games</h2>
        <?php endif ?>
        <span class="subheader">Inside are hidden gems for sure</span>
        <div class="catalogue">
            <div class="container" id="gameContainer">
                <?php include './app/controllers/ajax/fetch_games.php'; ?>
            </div>
            <div id="more-overlay" class="d-none position-fixed left-0 w-100 bg-opacity-50 d-flex justify-content-center align-items-center" style="bottom: 50px;">
                <div class="spinner-border" role="status">
                    <span class="sr-only">Loading...</span>
                </div>
            </div>
        </div>
    </div>
</div>

<script src='./public/js/home.js'></script>