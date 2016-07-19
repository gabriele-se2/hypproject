<?php $assistance = get_assistance_data(); ?>

<h3><?= $assistance['title'] ?></h3>
<div>
    <?= $assistance['content'] ?>
</div>

<div class="blank-space-30"></div>

<h4>Related products</h4>

<?php
$related_products = get_related_products();
$smartphones = $related_products['smartphones'];
$smartlifes = $related_products['smartlifes'];
?>

<div class="related-devices">
    <ul class="list-inline list-inline-nowrap">
<?php foreach($smartphones as $smartphone) : ?>
        <li class="text-center related-device">
            <a href="?page=smartphone&amp;id=<?= $smartphone['id'] ?>">
                <span><?= $smartphone['manufacturer'] ?><br><?= $smartphone['name'] ?></span>
                <img src="img/pages/devices/products/previews/<?= $smartphone['id'] ?>-001.jpg" alt="<?= $smartphone['name'] ?>">
            </a>
        </li>
<?php endforeach; ?>
    </ul>
</div>
