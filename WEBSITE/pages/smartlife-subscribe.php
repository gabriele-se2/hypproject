<?php

function get_title()
{
    return "TIM - Buy product";
}

function get_json()
{
    if (!array_key_exists("inputConfirmation", $_POST) && !array_key_exists("inputPhone", $_POST)) {
        http_response_code(400);
        return;
    }

    /* Same regex used for the form */
    if ((array_key_exists("inputPhone", $_POST) &&
                !preg_match("/^ *\+?([0-9 ]*[0-9]+[0-9 ]*)$/", $_POST["inputPhone"])) ||
            (array_key_exists("inputConfirmation", $_POST) &&
                !preg_match("/[0-9]+/", $_POST["inputConfirmation"]))) {
        http_response_code(400);
        return;
    }

    return "[]";
}

function get_service_info()
{
    if (!isset($_GET['option_id'])) {
        return;
    }

    $db = Database::getInstance();

    $query = "SELECT * FROM smartlife JOIN smartlife_options ON smartlife.id = smartlife_options.smartlife_id WHERE smartlife_options.option_id = ?";
    $result = $db->queryBindParams($query, "i", array($_GET['option_id']));
    return $result->fetch_array(MYSQLI_ASSOC);
}

?>
