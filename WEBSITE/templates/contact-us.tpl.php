<form role="form" id="contact-us-form" class="form-fullpage">
    <div class="form-group">
        <label for="inputName" class="control-label">Name</label>
        <input type="text" class="form-control" name="inputName" id="inputName" placeholder="Name" required>
    </div>

    <div class="form-group">
        <label for="inputSurname" class="control-label">Surname</label>
        <input type="text" class="form-control" name="inputSurname" id="inputSurname" placeholder="Surname" required>
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

    <div class="form-group">
        <label for="inputComment" class="control-label">Comments and questions</label>
        <textarea class="form-control" id="inputComment" name="inputComment" rows="10" required></textarea>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</form>

<div id="form-success" style="display:none">
    Your message has been successfully sent.
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
    $("#contact-us-form").fadeIn();
}

$("#contact-us-form").validator().on('submit', function(e) {
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
