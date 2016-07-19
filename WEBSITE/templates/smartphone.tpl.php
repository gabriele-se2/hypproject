<script>

function updateDescription(data) {
    if (!data)
        // TODO display some error message
        return;

    $("#product-name").text(data.manufacturer + " - " + data.name);
    if (data.discounted_price)
        $("#product-price").html("<s>" + data.price + "</s> " + data.discounted_price + " €");
    else
        $("#product-price").text(data.price + " €");
    for (i in data.img)
        data.img[i] = URL_BASE + data.img[i];
    $("#product-images").append(createSlider(data.img));
    $("#product-description-text").text(data.description);
}

</script>

<?php
include(ROOT_DIR . "templates/device-generic.tpl.php");
?>

<script type="text/javascript">
    addBackButton();
</script>
