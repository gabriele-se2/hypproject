<?php
$service = get_service_info();

if (!$service) : ?>
    <style>
    #insert-number {
        display: none;
    }
    </style>

    <div class="container">
        Error: service not found.
    </div>
<?php endif; ?>

<h3 style="text-align: center">Service info</h3>
<div style="text-align: center">
    <?= $service['option_name'] ?> - <?= $service['price'] ?> €/month
</div>

<hr>

<form role="form" id="insert-number" class="form-fullpage">
    <p>
        To activate the service on your line, insert the phone number in the following box.<br>
        You'll shortly receive a confirmation code that you'll need to provide to confirm the activation.
    </p>

    <div class="form-group">
        <label for="inputPhone" class="control-label">Phone Number</label>
        <input type="tel" pattern="^ *\+?([0-9 ]*[0-9]+[0-9 ]*)$" class="form-control" name="inputPhone" id="inputPhone" placeholder="Phone" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<form role="form" id="insert-code" class="form-fullpage" style="display:none">
    <p>
        Insert the code you received or <a href="#" onclick="tryAgain(event);">try again</a>.
    </p>

    <div class="form-group">
        <label for="inputConfirmation" class="control-label">Confirmation Number</label>
        <input type="input" pattern="[0-9]+" class="form-control" name="inputConfirmation" id="inputConfirmation" required>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Activate service</button>
    </div>
</form>

<div id="form-success" style="display:none">
    The service has been successfully activated.
    <a href="?page=home">Go to homepage</a>
</div>

<div id="form-failure" style="display:none">
    There has been an error.
    <a href="#" onclick="tryAgain(event);">Try again</a>
</div>

<script type="text/javascript">
addBackButton();

function tryAgain(event) {
    event.preventDefault();
    $("#form-failure").hide();
    $("#form-success").hide();
    $("#insert-code").hide();
    $("#inputConfirmation").val("");
    $("#insert-number").fadeIn();
}

$("#insert-number").validator().on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        /* Form is not valid */
        return;
    }
    e.preventDefault();

    $("#insert-number").hide();
    $("#insert-code").fadeIn();
    $("#insert-code").validator();
});

$("#insert-code").on('submit', function(e) {
    if (e.isDefaultPrevented()) {
        /* Form is not valid */
        return;
    }
    e.preventDefault();

    var form = $(this);
    var submitted = function() {
        form.hide();
        $("#form-success").fadeIn();
    };

    var failure = function() {
        form.hide();
        $("#form-failure").fadeIn();
    }

    postData(submitted, null, form.serialize(), failure);
});
</script>
