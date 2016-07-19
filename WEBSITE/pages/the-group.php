<?php

function get_title()
{
    $title = "The Group";

    if (!isset($_GET['sub']))
        return $title;

    switch ($_GET['sub']) {
    case "news":
        return $title . " - News";
    case "governance":
        return $title . " - Governance";
    case "business-and-market":
        return $title . "Busines & Market";
    case "for-investors":
        return $title . "For Investors";
    default:
        return $title;
    }

}

function get_breadcrumb()
{
    if (!isset($_GET['sub']))
        return;

    return array(
        array(
            "url" => "?page=the-group",
            "title" => "The Group",
        ),
    );
}

function get_page_content_title()
{
    return '<img style="width: 270px" src="img/tim-telecom.png">';
}

function get_page_content_text()
{
    $sub_to_page = array(
        "the-group" => "the-group",
        "news" => "the-group-news",
        "governance" => "the-group-governance",
        "business-and-market" => "the-group-business-and-market",
        "for-investors" => "the-group-for-investors",
    );

    $sub = isset($_GET['sub']) ? $_GET['sub'] : "the-group";

    if (!array_key_exists($sub, $sub_to_page))
        return;

    $db = Database::getInstance();
    $query = "SELECT content FROM pages WHERE name = '" . $sub_to_page[$sub] . "'";
    $result = $db->query($query);

    return $result->fetch_object()->content;
}

?>
