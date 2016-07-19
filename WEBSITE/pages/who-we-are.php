<?php

function get_title()
{
    return "TIM - Who we are";
}

function get_page_content_title()
{
    return "Who We Are";
}

function get_page_content_text()
{
    $db = Database::getInstance();
    $query = "SELECT content FROM pages WHERE name = 'who-we-are'";
    $result = $db->query($query);

    return $result->fetch_object()->content;
}

?>
