<?php $service = get_service(); ?>

<?php
if (should_add_back_button(array('smartphone', 'tablet')))
    echo '<script>addBackButton();</script>'
?>

<h3>Description</h3>
<?= $service['service']['description_long']; ?>

<div class="blank-space-30"></div>

<h3>Plans</h3>
<?php foreach($service['options'] as $option) : ?>
    <div class="row subscribe-row">
        <div class="col-xs-12 col-sm-6">
            <span style="display: block; font-weight: bold;"><?= $option['option_name'] ?></span>
            <span style="display: block">Price: <?= $option['price'] ?>€/month</span>
            <small style="display: block"><?= $option['option_description'] ?></small>
        </div>
        <div class="col-xs-12 col-sm-6 subscribe-button-container">
            <a style="min-width: 100px;" class="btn btn-primary" href="?page=smartlife-subscribe&amp;option_id=<?= $option['option_id'] ?>">Subscribe</a>
        </div>
    </div>
<?php endforeach; ?>

<div class="blank-space-30"></div>

<h3>Payment</h3>
<?= $service['service']['payment']; ?>

<div class="blank-space-30"></div>

<h3>Related Devices</h3>
<div class="related-devices">
    <ul class="list-inline list-inline-nowrap">
<?php foreach (get_devices() as $device) : ?>
        <li class="text-center related-device">
            <a href="?page=<?= $device['page'] ?>&amp;id=<?= $device['id'] ?>">
                <?= $device['manufacturer'] . "<br>" . $device['name'] ?><br>
                <img src="img/pages/devices/products/previews/<?= $device['id'] ?>-001.jpg" alt="<?= $device['name'] ?>">
            </a>
        </li>
<?php endforeach; ?>
    </ul>
</div>
