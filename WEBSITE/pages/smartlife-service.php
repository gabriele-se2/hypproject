<?php

function get_title()
{
    return "TIM - Smartlife service";
}

function get_breadcrumb()
{
    return array(
        array(
            "url" => "?page=smartlife",
            "title" => "Smart Life",
        ),
        array(
            "url" => "?page=smartlife-tv-and-entertainment",
            "title" => "TV &amp; Entertainment",
        ),
    );
}

function get_service()
{
    $db = Database::getInstance();
    // TODO: Use prepared statement
    $query = "SELECT * FROM smartlife WHERE id = " . $_GET['id'];
    $result = $db->query($query);
    $data['service'] = $result->fetch_array(MYSQLI_ASSOC);
    $query = "SELECT * FROM smartlife_options WHERE smartlife_id = " . $_GET['id'];
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
        $data['options'][] = $row;

    return $data;
}

function get_devices()
{
    $db = Database::getInstance();
    $query = "(SELECT *,'smartphone' as page FROM smartphones_view) ".
             "UNION ".
             "(SELECT *,'tablet' as page FROM tablets_view)";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
        $devices[] = $row;
    return $devices;
}

?>
