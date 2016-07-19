<?php

function get_title()
{
    return "TIM - Buy product";
}

function get_json()
{
    $required_fields = array(
        "inputName",
        "inputSurname",
        "inputSSN",
        "inputCity",
        "inputAddress",
        "inputZIP",
        "inputEmail",
        "inputPhone",
        "inputNameCard",
        "inputSurnameCard",
        "inputCardNumber",
        "inputCardCSC",
        "inputCardExpirationMonth",
        "inputCardExpirationYear",
        "inputAgreeTerms",
    );

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

    if (!in_array("inputCardExpirationMonth", $fields_with_error) &&
            $_POST["inputCardExpirationMonth"] < 1 || $_POST["inputCardExpirationMonth"] > 12)
        $fields_with_error[] = "inputCardExpirationMonth";

    if (count($fields_with_error) > 0) {
        http_response_code(400);
        return json_encode(array("fields_with_error" => $fields_with_error));
    } else {
        return json_encode($_POST);
    }
}

function get_product_info()
{
    $allowed_tables = array(
        "smartphone" => "smartphones",
        "tablet" => "tablets",
    );

    if (!isset($_GET['product']) || !isset($_GET['id']) ||
            !array_key_exists($_GET['product'], $allowed_tables)) {
        return;
    }

    $db = Database::getInstance();

    $table = $allowed_tables[$_GET['product']];
    $query = "SELECT * FROM " . $table . " JOIN devices USING(id) LEFT JOIN sales USING(id) WHERE id = ?";
    $result = $db->queryBindParams($query, "i", array($_GET['id']));
    return $result->fetch_array(MYSQLI_ASSOC);
}

?>
