<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title><?php print_title() ?></title>

        <link rel="icon" href="img/favicon.ico" />

        <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/offcanvas.css" rel="stylesheet">
        <link href="css/loader.css" rel="stylesheet">
        <link href="css/slider.css" rel="stylesheet">

        <script src="vendor/jquery/jquery.min.js"></script>
        <script src="vendor/bootstrap/js/bootstrap.min.js"></script>
        <script src="vendor/validator/validator.js"></script>
        <script src="js/query-data.js"></script>
        <script src="js/offcanvas.js"></script>
        <script src="js/ajaxify.js"></script>
        <script src="js/misc.js"></script>
        <script src="js/slider.js"></script>

        <script type="text/javascript">
            var URL_BASE = "<?= defined('URL_BASE') ? URL_BASE : '' ?>";
            var URL_AJAX = "<?= defined('URL_AJAX') ? URL_AJAX : '' ?>";
        </script>

<?php if (defined('PHONEGAP') && PHONEGAP): ?>
        <script src="cordova.js"></script>
        <script src="app-custom-code.js"></script>
<?php endif; ?>

    </head>

    <body>
        <header>
            <div class="tim_logo_header">
                <a href="?page=home">
                    <img class="tim_logo" src="img/TIM_logo.svg" alt="TIM logo" />
                </a>
            </div>

            <!-- Static navbar -->
            <nav class="navbar navbar-default">
                <div class="container-fluid">
                    <div id="navbar-header" class="navbar-header">
                        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a href="?page=home" class="navbar-brand tim_logo_navbar">
                            <img class="tim_logo" src="img/TIM_logo.svg" alt="TIM logo" />
                        </a>
                    </div>
                    <div id="navbar" class="navbar-collapse collapse navbar-absolute">
                        <ul class="nav navbar-nav" id="main-menu">
                            <li><a href="?page=devices">Devices</a></li>
                            <li><a href="?page=smartlife">Smart Life</a></li>
                            <li><a href="?page=assistance">Assistance</a></li>
                            <li><a href="?page=the-group">The Group</a></li>
                            <li><a href="?page=who-we-are">Who we are</a></li>
                        </ul>
                    </div>
                </div>
            </nav>

            <ol class="breadcrumb" id="breadcrumb-head" <?= (!get_breadcrumb()) ? 'style="display:none"' : '' ?>>
                <li id="breadcrumb-back" style="display: none">
                    <a href="?" id="go-back-history">Back</a>
                </li>
                <?php print_breadcrumb() ?>
            </ol>

        </header>

        <main>
            <div style="position: relative; min-height: 190px">
                <div id="loader-container">
                    <div class="loader"></div>
                </div>

                <div id="main-container" class="container-fluid">
                    <?php print_html() ?>
                </div>
            </div>
        </main>
    </body>
</html>
