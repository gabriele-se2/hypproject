<?php

function get_title()
{
    return "TIM - Assitance";
}

function get_breadcrumb()
{
    return array(
        array(
            "url" => "?page=assistance",
            "title" => "Assistance",
        ),
    );
}

function get_assistance_data()
{
    $db = Database::getInstance();
    // TODO: use prepared statement
    $query = "SELECT * FROM assistance WHERE id = " . $_GET['id'];
    $result = $db->query($query);
    return $result->fetch_array(MYSQLI_ASSOC);
}

function get_related_products()
{
    $db = Database::getInstance();
    // TODO: use prepared statement

    $data["smartphones"] = [];
    $data["tablets"] = [];
    $data["smartlifes"] = [];

    $query = "SELECT * FROM smartphones_view WHERE id IN (SELECT id_product FROM assistance_for WHERE id_assistance = " . $_GET['id'] . " AND category_product = 'smartphone')";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
        $data["smartphones"][] = $row;

    $query = "SELECT * FROM tablets_view WHERE id IN (SELECT id_product FROM assistance_for WHERE id_assistance = " . $_GET['id'] . " AND category_product = 'tablet')";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
        $data["tablets"][] = $row;

    return $data;
}

?>
