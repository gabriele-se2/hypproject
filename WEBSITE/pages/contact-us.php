<?php

function get_title()
{
    return "TIM - Contact us";
}

function get_json()
{
    $required_fields = array(
        "inputName",
        "inputSurname",
        "inputEmail",
        "inputComment",
        "inputPhone");

    $fields_with_error = array();
    foreach ($required_fields as $field) {
        if (!array_key_exists($field, $_POST) || $_POST[$field] == "") {
            $fields_with_error[] = $field;
        }
    }

    /* Same regex used for the form */
    if (!in_array("inputPhone", $fields_with_error) &&
            !preg_match("/^ *\+?([0-9 ]*[0-9]+[0-9 ]*)$/", $_POST["inputPhone"]))
        $fields_with_error[] = "inputPhone";

    /* Check that we get something that at least resembles an email address */
    if (!in_array("inputEmail", $fields_with_error) &&
            !preg_match("/^.+@.+$/", $_POST["inputEmail"]))
        $fields_with_error[] = "inputEmail";

    if (count($fields_with_error) > 0) {
        http_response_code(400);
        return json_encode(array("fields_with_error" => $fields_with_error));
    } else
        return json_encode($_POST);
}

?>
