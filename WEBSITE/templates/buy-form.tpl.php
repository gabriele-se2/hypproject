<?php
$product = get_product_info();

if (!$product) : ?>
    <style>
    #buy-form {
        display: none;
    }
    </style>

    <div class="container">
        Error: product not found.
    </div>
<?php endif; ?>

<form role="form" id="buy-form" class="form-fullpage">

    <h3 style="text-align: center">Product info</h3>
    <div style="text-align: center">
        <?php $price = ($product['discounted_price'] != '') ? $product['discounted_price'] : $product['price']; ?>
        <?= $product['manufacturer'] ?> - <?= $product['name'] ?> - <?= $price ?> €
    </div>

    <hr>

    <h3 style="text-align: center">Shipping information</h3>

    <div class="form-group">
        <label for="inputName" class="control-label">Name</label>
        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Name" required>
    </div>

    <div class="form-group">
        <label for="inputSurname" class="control-label">Surname</label>
        <input type="text" class="form-control" name="inputSurname" id="inputSurname" placeholder="Surname" required>
    </div>

    <div class="form-group">
        <label for="inputSSN" class="control-label">SSN</label>
        <input type="text" class="form-control" name="inputSSN" id="inputSSN" placeholder="SSN" required>
    </div>

    <div class="form-group">
        <label for="inputCity" class="control-label">City</label>
        <input type="text" class="form-control" name="inputCity" id="inputCity" placeholder="City" required>
    </div>

    <div class="form-group">
        <label for="inputAddress" class="control-label">Address</label>
        <input type="text" class="form-control" name="inputAddress" id="inputAddress" placeholder="Address" required>
    </div>

    <div class="form-group">
        <label for="inputZIP" class="control-label">ZIP Code</label>
        <input type="text" class="form-control" name="inputZIP" id="inputZIP" placeholder="Code" required>
    </div>

    <div class="form-group">
        <label for="inputEmail" class="control-label">Email</label>
        <input type="email" class="form-control" name="inputEmail" id="inputEmail" placeholder="Email" data-error="Insert a valid email address" required>
        <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
        <label for="inputEmail" class="control-label">Verify email</label>
        <input type="text" class="form-control" id="inputEmailVerify" placeholder="Email" data-match="#inputEmail" data-error="Email addresses don't match" required>
        <div class="help-block with-errors"></div>
    </div>

    <div class="form-group">
        <label for="inputPhone" class="control-label">Phone</label>
        <input type="tel" pattern="^ *\+?([0-9 ]*[0-9]+[0-9 ]*)$" class="form-control" name="inputPhone" id="inputPhone" placeholder="Phone" required>
    </div>

    <hr>

    <h3 style="text-align: center">Payment details</h3>

    <div class="form-group">
        <label for="inputNameCard" class="control-label">Name</label>
        <input type="text" class="form-control" name="inputNameCard" id="inputNameCard" required>
    </div>

    <div class="form-group">
        <label for="inputSurnameCard" class="control-label">Surname</label>
        <input type="text" class="form-control" name="inputSurnameCard" id="inputSurnameCard" required>
    </div>

    <div class="form-group col-xs-7" style="padding: 0">
        <label for="inputCardNumber" class="control-label">Card Number:</label>
        <input type="number" class="form-control input-number-no-spin" name="inputCardNumber" id="inputCardNumber" required>
    </div>

    <div class="form-group col-xs-offset-1 col-xs-4" style="padding: 0">
        <label for="inputCardCSC" class="control-label">CSC:</label>
        <input type="number" class="form-control input-number-no-spin" name="inputCardCSC" id="inputCardCSC" required>
    </div>

    <div class="form-group col-xs-8" style="padding: 0">
        <label for="inputCardExpirationMonth" class="control-label">Expiration:</label>
        <select class="form-control" name="inputCardExpirationMonth" id="inputCardExpirationMonth" required>
            <option value>Month</option>
            <option value="1">January</option>
            <option value="2">February</option>
            <option value="3">March</option>
            <option value="4">April</option>
            <option value="5">May</option>
            <option value="6">June</option>
            <option value="7">July</option>
            <option value="8">August</option>
            <option value="9">September</option>
            <option value="10">October</option>
            <option value="11">November</option>
            <option value="12">December</option>
        </select>
    </div>

    <div class="form-group col-xs-offset-1  col-xs-3" style="padding: 0">
        <label for="inputCardExpirationYear" class="control-label">Expiration:</label>
        <select class="form-control" name="inputCardExpirationYear" id="inputCardExpirationYear" required>
            <option value>Year</option>
        </select>
    </div>

    <div class="clearfix"></div>

    <hr>

    <div class="form-group">
        <div class="checkbox">
            <label class="control-label">
                <input type="checkbox" name="inputAgreeTerms" id="inputAgreeTerms" required>
                I agree to the TIM privacy policy and to TIM saving my personal information
            </label>
        </div>
    </div>

    <hr>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<div id="form-success" style="display:none">
    Product has been successfully bought.
    <a href="?page=home">Go to homepage</a>
</div>

<div id="form-failure" style="display:none">
    There has been an error.
    <a href="#" onclick="tryAgain(event);">Try again</a>
</div>

<script type="text/javascript">
addBackButton();

var currentYear = new Date().getFullYear();
var options = "";
for (var i = 0; i < 30; i++) {
    options += '<option value="'+ (currentYear + i) +'">' + (currentYear + i) + '</option>';
}
$("#inputCardExpirationYear").append(options);

function tryAgain(event) {
    event.preventDefault();
    $("#form-failure").hide();
    $("#buy-form").fadeIn();
}

$("#buy-form").validator().on('submit', function(e) {
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
