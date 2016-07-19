<?php

define('ROOT_DIR', __DIR__ . '/');

if (!file_exists("config.php")) {
    die("Error, config.php not found.");
}

include("config.php");

include("includes/utils.php");
include("includes/database-helper.php");
include("includes/content-helper.php");

/*
 * Load entire page, content of the page or page-specific code
 * depending on the request.
 */
if (is_ajax_new_page()) {
    header('Content-type: text/javascript');
    print_html_json();
} elseif (is_ajax()) {
    header('Content-type: text/javascript');
    print_json();
} else {
    include("templates/layout.php");
}

?>
