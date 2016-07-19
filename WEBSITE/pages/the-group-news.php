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
    );
}

function get_news()
{
    $db = Database::getInstance();
    $query = "SELECT id, title, summary FROM news LIMIT 10";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    return $data;
}

?>
