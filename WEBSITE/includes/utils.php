<?php

function is_ajax()
{
    return isset($_GET['ajax']) || isset($_POST['ajax']);
}

function is_ajax_new_page()
{
    return isset($_GET['ajax_new_page']) || isset($_POST['ajax_new_page']);
}

/* True if 'page' in referer is in $page_list */
function should_add_back_button($page_list)
{
    if (array_key_exists('HTTP_REFERER', $_SERVER)) {
        parse_str(explode('?', $_SERVER['HTTP_REFERER'])[1], $out);
        if (array_key_exists('page', $out) && in_array($out['page'], $page_list))
                return true;
    }
    return false;
}

?>
