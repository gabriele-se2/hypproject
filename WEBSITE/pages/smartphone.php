<?php

function get_title()
{
    return "TIM - Smartphones";
}

function get_breadcrumb()
{
    $breadcrumb = array(
        array(
            "url" => "?page=devices",
            "title" => "Devices",
        ),
        array(
            "url" => "?page=devices-smartphones",
            "title" => "Smartphones",
        ),
    );
    return $breadcrumb;
}

function get_json() {
    $data = get_product();
    return json_encode($data);
}

function get_product()
{
    if (!isset($_GET["id"])) {
        return "";
    } else {
        $db = Database::getInstance();
        $result = $db->queryBindParams("SELECT * FROM smartphones JOIN devices USING(id) LEFT JOIN sales USING (id) WHERE id = ?", "i", array($_GET["id"]));
        if (!$result)
            return;
        $rows = mysqli_fetch_assoc($result);

        foreach (glob(ROOT_DIR . 'img/pages/devices/products/' . $rows["id"] . '-*') as $img)
            $rows["img"][] = 'img/pages/devices/products/' . basename($img);

        return $rows;
    }
}

function get_product_details()
{
    $db = Database::getInstance();
    // TODO: use prepared statement
    $query = "SELECT * FROM smartphones_view WHERE id = " . $_GET['id'];
    $result = $db->query($query);
    return $result->fetch_array(MYSQLI_ASSOC);
}

function get_smartlife_services()
{
    $db = Database::getInstance();
    $query = "SELECT * FROM smartlife";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
        $services[] = $row;
    return $services;
}

function get_assistance_services()
{
    $db = Database::getInstance();
    $query = "SELECT * FROM assistance WHERE id in (SELECT id_assistance FROM assistance_for WHERE id_product = " . $_GET['id'] . " and category_product = 'smartphone')";
    $result = $db->query($query);
    $services = [];
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
        $services[] = $row;
    return $services;
}

?>
