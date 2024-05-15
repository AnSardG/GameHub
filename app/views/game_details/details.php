<?php include '../app/views/game_details/fetch_details.php'; ?>

<?php if (!empty($gameDetails[0]['screenshots'])) : ?>
    <?php $screenshots = array_slice($gameDetails[0]['screenshots'], 0, 4); ?>
    <div id="carouselExampleIndicators" class="carousel slide mx-3" data-bs-ride="carousel">
        <div class="carousel-indicators">
            <?php for ($i = 0; $i < sizeof($screenshots); $i++) : ?>
                <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="<?php echo $i; ?>" class="<?php echo $i == 0 ? 'active' : ''; ?>" aria-current="true" aria-label="Slide <?php echo $i + 1; ?>"></button>
            <?php endfor; ?>
        </div>
        <div class="carousel-inner">
            <?php foreach ($screenshots as $index => $screenshot) : ?>
                <?php $imgUrl = str_replace("t_thumb", "t_screenshot_big", $screenshot['url']); ?>

                <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                    <img src="<?php echo $imgUrl; ?>" class="d-block w-100 rounded-3 " alt="Game Screenshot">
                </div>
            <?php endforeach; ?>
        </div>

        <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
<?php endif; ?>

<!-- <div class="mt-4">
    <h2><?php echo $gameDetails['name']; ?></h2>
    <p>Platforms: <?php echo implode(', ', $gameDetails['platforms']); ?></p>
    <p>Developer: <?php echo $gameDetails['involved_companies'][0]['company']['name']; ?></p>
    <p>Description: <?php echo $gameDetails['summary']; ?></p>
</div> -->