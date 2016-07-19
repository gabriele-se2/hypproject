<div class="row">
    <div class="col-xs-12 col-sm-6 col-sm-5" id="product-images">
    </div>
    <div class="col-xs-12 col-sm-6 col-sm-7" id="product-description">
        <div class="row">
            <div class="col-xs-8">
                <h3 id="product-name" style="font-weight: bold"></h3>
            </div>
            <div class="col-xs-4" style="text-align: right; vertical-align: middle; height: 100%; padding-top: 20px;">
                <a style="min-width: 100px;" class="btn btn-primary" href="?page=buy-form&amp;product=<?= $_GET['page'] ?>&amp;id=<?= $_GET['id'] ?>">Buy Now</a>
            </div>
        </div>
        <span style="font-weight: bold; display: inline; vertical-align: middle">Price:</span> <span id="product-price" style="font-weight: bold; color: #cc0000; display: inline; vertical-align: middle" class="lead"></span>

        <h5 style="font-weight: bold">Overview:</h5>
        <p id="product-description-text" class="text-justify"></p>
    </div>
</div>

<div class="blank-space-30"></div>

<h3>Specifications:</h3>
<div>
    <table class="table table-bordered">
<?php
/* Show a well-defined set of columns */
$key_to_string = array(
    "os" => "OS",
    "screen" => "Screen",
    "weight" => "Weight",
    "size" => "Size",
    "cpu" => "CPU",
    "camera" => "Camera"
);
foreach (get_product_details() as $key => $value) {
    if (!array_key_exists($key, $key_to_string))
        continue;
    echo '<tr><td style="width: 20%; font-weight: bold">' . $key_to_string[$key] . '</td><td>' . $value . '</td></tr>';
}
?>
    </table>
</div>

<div class="blank-space-30"></div>

<h3>Assistance:</h3>
<table class="table table-bordered assitance-service-table">
<?php foreach (get_assistance_services() as $service) : ?>
    <tr><td>
        <a href="?page=assistance-service&amp;id=<?= $service['id'] ?>">
            <?= $service['title'] ?>
        </a>
    </td></tr>
<?php endforeach; ?>
</table>

<div class="blank-space-30"></div>

<h3>Related Smart Life services:</h3>
<div class="related-services">
    <ul class="list-inline list-inline-nowrap">
<?php foreach (get_smartlife_services() as $service) : ?>
        <li class="text-center related-service">
            <a href="?page=smartlife-service&amp;id=<?= $service['id'] ?>">
                <?= $service['name'] ?><br>
                <img src="img/pages/smartlife/services/<?= $service['id'] ?>-001.png" alt="<?= $service['name'] ?>">
            </a>
        </li>
<?php endforeach; ?>
    </ul>
</div>

<script>
getData(updateDescription);
</script>
