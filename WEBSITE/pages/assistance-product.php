<?php

function get_title()
{
    return "TIM - Product assistance";
}

function get_breadcrumb()
{
    return array(
        array(
            "url" => "?page=assistance",
            "title" => "Assistance",
        ),
        array(
            "url" => "?page=assistance-configurations",
            "title" => "Configurations",
        ),
    );
}

?>
