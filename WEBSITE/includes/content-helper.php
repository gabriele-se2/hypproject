<?php

include(ROOT_DIR . "includes/page-loader.php");

/*
 * Get title of this page
 *
 * Each pages/*.php should define a get_title() function.
 * If we can't find one, just print some default string.
 */
if (!function_exists('get_title')) {
    function get_title()
    {
        return "TIM";
    }
}

/*
 * Print the title of this page
 */
function print_title()
{
    echo get_title();
}

/*
 * Get JSON code of this page
 *
 * Each pages/*.php should define a get_json() function.
 * If we can't find one, just print some default value.
 */
if (!function_exists('get_json')) {
    function get_json()
    {
        return '';
    }
}

/*
 * Print JSON code of this page
 *
 * Response depend on selected $page_script
 */
function print_json()
{
    echo get_json();
}

/*
 * Get breadcrumb array structure of this page
 *
 * Each pages/*.php should define a get_breadcrumb() function.
 * If we can't find one, return an empty array.
 *
 * get_breadcrumb() should return an array:
 * array(
 *     array("link" => "link1", "title" => "title1"),
 *     array("link" => "link2", "title" => "title2"),
 *     ...
 * )
 */
if (!function_exists('get_breadcrumb')) {
    function get_breadcrumb()
    {
        return array();
    }
}

/*
 * Print HTML of the breadcrumb of this page
 *
 * Print html code of the breadcrumb
 */
function print_breadcrumb()
{
    $breadcrumbs = get_breadcrumb();
    for ($i = 0; $i < sizeof($breadcrumbs); $i++) {
        echo '<li class="breadcrumb-path breadcrumb-level-' . $i . '">';
        echo '<a href="' . $breadcrumbs[$i]['url'] . '">' . $breadcrumbs[$i]['title'] . '</a>';
        echo '</li>';
    }
}

/*
 * Print HTML of this page as JSON object
 *
 * This used to switch from one page to another without reloading
 * the entire layout.
 *
 * Structure of the reply:
 *
 * {
 *     html: "html code of the page",     // same as print_html()
 *     title: "title of the page",        // same as print_title()
 *     breadcrumb: "html of breadcrumb"   // same as print_breadcrumb()
 * }
 *
 */
function print_html_json()
{
    ob_start();
    print_html();
    $html = ob_get_clean();

    ob_start();
    print_breadcrumb();
    $html_bread = ob_get_clean();

    $data = array(
        "html" => $html,
        "title" => get_title(),
        "breadcrumb" => $html_bread,
    );

    echo json_encode($data);
}

/*
 * Print HTML of requested page
 */
function print_html()
{
    global $page_script_tpl;

    include($page_script_tpl);
}

?>
