<?php include '../app/views/game_details/fetch_details.php'; ?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner">
        <?php
        var_dump($gameDetails);
        ?>
        <?php foreach ($gameDetails['screenshots'] as $index => $screenshot) : ?>
            <div class="carousel-item <?php echo $index === 0 ? 'active' : ''; ?>">
                <img src="<?php echo $screenshot['url']; ?>" class="d-block w-100" alt="Game Screenshot">
            </div>
        <?php endforeach; ?>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="sr-only">Previous</span>
    </a>
    <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="sr-only">Next</span>
    </a>
</div>

<div class="mt-4">
    <h2><?php echo $gameDetails['name']; ?></h2>
    <p>Platforms: <?php echo implode(', ', $gameDetails['platforms']); ?></p>
    <p>Developer: <?php echo $gameDetails['involved_companies'][0]['company']['name']; ?></p>
    <p>Description: <?php echo $gameDetails['summary']; ?></p>
</div>
</div>