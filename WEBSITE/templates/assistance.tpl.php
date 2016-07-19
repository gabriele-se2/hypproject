<div id="contact-us">
    <a href="?page=contact-us">
        <div>
            <div style="float: left; width: 60px;">
                <img src="img/pages/assistance/mail-icon.svg" alt="Contact us">
            </div>
            <div style="padding-left: 80px">
                <span style="display: block; font-size: 12px;">Can't find what you are looking for?</span>
                <span style="display: block; font-size: 25px;">Contact us!</span>
            </div>
        </div>
    </a>
</div>

<div class="blank-space-30"></div>

<div>
    <h3>Frequently visited pages</h3>
    <table class="table table-bordered assitance-service-table">
    <?php foreach (get_faqs() as $faq) : ?>
        <tr>
            <td>
                <a href="?page=assistance-service&amp;id=<?= $faq['id'] ?>">
                    <?= $faq['title'] ?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>

    <hr>

    <h3 id="line-management">Line management</h3>
    <table class="table table-bordered assitance-service-table">
    <?php foreach (get_assistance_services('line-management') as $service) : ?>
        <tr>
            <td>
                <a href="?page=assistance-service&amp;id=<?= $service['id'] ?>">
                    <?= $service['title'] ?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>

    <hr>

    <h3 id="bills">Bills &amp; Contracts</h3>
    <table class="table table-bordered assitance-service-table">
    <?php foreach (get_assistance_services('bills') as $service) : ?>
        <tr>
            <td>
                <a href="?page=assistance-service&amp;id=<?= $service['id'] ?>">
                    <?= $service['title'] ?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>

    <hr>

    <h3 id="technical-support">Technical support and configurations</h3>
    <table class="table table-bordered assitance-service-table">
    <?php foreach (get_assistance_services('technical-support') as $service) : ?>
        <tr>
            <td>
                <a href="?page=assistance-service&amp;id=<?= $service['id'] ?>">
                    <?= $service['title'] ?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>

    <hr>

    <h3 id="digital-services">Digital Services</h3>
    <table class="table table-bordered assitance-service-table">
    <?php foreach (get_assistance_services('digital-services') as $service) : ?>
        <tr>
            <td>
                <a href="?page=assistance-service&amp;id=<?= $service['id'] ?>">
                    <?= $service['title'] ?>
                </a>
            </td>
        </tr>
    <?php endforeach; ?>
    </table>

</div>

