<?php

/*
 * Find the right script to load looking at $_GET['page']
 */

$page = isset($_GET['page']) ? $_GET['page'] : "home";

// file_exists() would simplify this, but I'd need to sanitize $_GET
$found = false;
$files = scandir(ROOT_DIR . "pages/");
foreach ($files as $file) {
    if ($page.".php" == $file) {
        $found = true;
        $page_script = ROOT_DIR . "pages/" . $page . ".php";
        $page_script_tpl = ROOT_DIR . "templates/" . $page . ".tpl.php";
        $page_title = "";
        break;
    }
}

if (!$found) {
    header("HTTP/1.0 404 Not Found");
    $page_script = ROOT_DIR . "pages/404.php";
    $page_script_tpl = ROOT_DIR . "templates/404.tpl.php";
}

include($page_script);

?>
