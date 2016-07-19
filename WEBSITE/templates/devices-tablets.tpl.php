<?php

function print_filter_column()
{
    echo 'Manufacturer:';
    echo '<ul class="list-group checked-list-box">';
    foreach (get_manufacturers() as $manufacturer) {
        $checked = (isset($_GET["filter"]["manufacturer"]) && in_array($manufacturer, $_GET["filter"]["manufacturer"])) ?
                'checked="checked"' : '';
        echo '<li class="list-group-item">';
        echo '<input type="checkbox" data-filter-name="manufacturer" data-filter-value="' . $manufacturer . '" ' . $checked . '> ' . $manufacturer;
        echo '</li>';
    }
    echo '</ul>';

?>
    Price:
    <ul class="list-group filter-input">
        <li class="list-group-item">
            <div class="row">
                <div class="col-xs-2">Min:</div>
<?php
$value = (isset($_GET["filter"]["min-price"])) ? $_GET["filter"]["min-price"][0] : "";
?>
                <div class="col-xs-8"><input type="number" id="min-price-input" data-filter-name="min-price" value="<?= $value ?>"></div>
            </div>
        </li>
        <li class="list-group-item">
            <div class="row">
                <div class="col-xs-2">Max:</div>
<?php
$value = (isset($_GET["filter"]["max-price"])) ? $_GET["filter"]["max-price"][0] : "";
?>
                <div class="col-xs-8"><input type="number" id="max-price-input" data-filter-name="max-price" value="<?= $value ?>"></div>
            </div>
        </li>
    </ul>
<?php

    echo 'Operating System:';
    echo '<ul class="list-group checked-list-box">';
    foreach (get_oss() as $os) {
        $checked = (isset($_GET["filter"]["os"]) && in_array($os, $_GET["filter"]["os"])) ?
                'checked="checked"' : '';
        echo '<li class="list-group-item">';
        echo '<input type="checkbox" data-filter-name="os" data-filter-value="' . $os . '" ' . $checked . '> ' . $os;
        echo '</li>';
    }
    echo '</ul>';
}

?>

<script>

function createDeviceItemBlock(device) {
    var imgSrc = URL_BASE + 'img/pages/devices/products/previews/' + device.id + '-001.jpg';
    var price;
    if (device.discounted_price)
        price = '<span><s>' + device.price + '</s> ' + device.discounted_price + '€</span>';
    else
        price = '<span>' + device.price + '€</span>';

    return '<div class="device-item col-xs-12 col-sm-4 col-md-4 col-lg-3">' +
            '<a href="?page=tablet&amp;id=' + device.id + '">' +
                '<img src="' + imgSrc + '" alt="' + device.name + '">' +
                '<span>' + device.manufacturer + '</span>' +
                '<span>' + device.name + '</span>' +
                price +
            '</a>' +
        '</div>';
}

</script>

<?php
include(ROOT_DIR . "templates/devices-generic.tpl.php");
?>
