<?php

function get_title()
{
    return "TIM - Assitance";
}

function get_faqs()
{
    $db = Database::getInstance();
    $query = "SELECT * FROM assistance WHERE faq = 1";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
        $faq[] = $row;
    return $faq;
}

function get_assistance_services($category)
{
    $db = Database::getInstance();
    $query = "SELECT * FROM assistance WHERE category = '" . $category . "'";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC))
        $services[] = $row;
    return $services;
}

?>
