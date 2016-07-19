<?php

function get_title()
{
    return "TIM - TV &amp; Entertainment";
}

function get_breadcrumb()
{
    return array(
        array(
            "url" => "?page=smartlife",
            "title" => "Smart Life",
        ),
    );
}

function get_services()
{
    $db = Database::getInstance();
    $query = "SELECT id, name, description FROM smartlife LIMIT 10";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $data[] = $row;
    }
    return $data;
}

?>
