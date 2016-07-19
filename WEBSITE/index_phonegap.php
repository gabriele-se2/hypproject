<?php

function get_url_full()
{
    $protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] && $_SERVER['HTTPS'] != "off") ? "https" : "http";
    return $protocol . "://" . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
}

function get_url_base()
{
    return substr(get_url_full(), 0, strrpos(get_url_full(), '/')) . '/';
}

define('URL_BASE', get_url_base());
define('URL_AJAX', get_url_base() . basename(__FILE__));
define('PHONEGAP', true);

/* Allow to debug the application from desktop browsers */
header("Access-Control-Allow-Origin: *");

function relative_to_absolute_url($buffer)
{
    /*
     * All the links are relative, but PhoneGap needs absolute URLs.
     * js/ajaxify.js already intercepts anchor clicks, so we only need to
     * make absolute the links to resources. We can replace few strings
     * with a very low probability of doing unwanted replacements.
     */
    $search = array(
        'href="css/',
        'href=\\"css\/',
        'href="vendor/',
        'href=\\"vendor\/',
        'src="img/',
        'src=\\"img\/',
        'src="js/',
        'src=\\"js\/',
        'src="vendor/',
        'src=\\"vendor\/',
    );
    $base = get_url_base();
    $replace = array(
        'href="' . $base . 'css/',
        'href=\\"' . $base . 'css\/',
        'href="' . $base . 'vendor/',
        'href=\\"' . $base . 'vendor\/',
        'src="' . $base . 'img/',
        'src=\\"' . $base . 'img\/',
        'src="' . $base . 'js/',
        'src=\\"' . $base . 'js\/',
        'src="' . $base . 'vendor/',
        'src=\\"' . $base . 'vendor\/',
    );
    return str_replace($search, $replace, $buffer);
}

ob_start("relative_to_absolute_url");
require('index.php');
ob_end_flush();

?>
