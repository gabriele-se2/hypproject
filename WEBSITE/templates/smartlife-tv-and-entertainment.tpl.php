<?php foreach (get_services() as $service) : ?>
    <div class="service-list list-group-item">
        <div class="service-image">
            <img src="img/pages/smartlife/services/<?= $service['id'] ?>-001.png" alt="<?= $service['name'] ?>">
        </div>
        <div class="service-description">
            <h3 class="service-name"><?= $service['name'] ?></h3>
            <div class="service-description">
                <?= $service['description'] ?>
            </div>
            <a class="btn btn-primary" href="?page=smartlife-service&amp;id=<?= $service['id'] ?>">Show more</a>
        </div>
        <div style="clear: both;"></div>
    </div>
<?php endforeach; ?>
