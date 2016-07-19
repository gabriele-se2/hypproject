<?php

function get_title()
{
    return "TIM - News";
}

function get_breadcrumb()
{
    return array(
        array(
            "url" => "?page=the-group",
            "title" => "The Group",
        ),
        array(
            "url" => "?page=the-group-news",
            "title" => "News",
        ),
    );
}

function get_news_single()
{
    $db = Database::getInstance();
    // TODO: use prepared statement
    $query = "SELECT title, content FROM news WHERE id = " . $_GET['id'];
    $result = $db->query($query);

    return $result->fetch_array(MYSQLI_ASSOC);
}

?>
