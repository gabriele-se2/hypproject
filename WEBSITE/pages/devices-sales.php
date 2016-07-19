<?php

$DEVICES_PER_PAGE = 12;

function get_title()
{
    return "TIM - Sales";
}

function get_breadcrumb()
{
    return array(
        array(
            "url" => "?page=devices",
            "title" => "Devices",
        ),
    );
}

function get_json()
{
    global $DEVICES_PER_PAGE;

    $db = Database::getInstance();

    $pagenum = max(0, isset($_GET['pagenum']) ? intval($_GET['pagenum']) : 1);
    $limit = "LIMIT " . (($pagenum - 1) * $DEVICES_PER_PAGE) . "," . $DEVICES_PER_PAGE;

    $queries = array();
    $types = array();
    $values = array();

    if (isset($_GET["filter"]["manufacturer"])) {
        $manufacturers = $_GET["filter"]["manufacturer"];
        foreach ($manufacturers as $m)
            $values[] = $m;
        $placeholders = substr(str_repeat("?,", count($manufacturers)), 0, -1);
        $queries[] = "manufacturer IN (" . $placeholders . ")";
        $types[] = str_repeat("s", count($manufacturers));
    }

    if (isset($_GET["filter"]["min-price"])) {
        $values[] = $_GET["filter"]["min-price"][0];
        $queries[] = "price >= ?";
        $types[] = "d";
    }

    if (isset($_GET["filter"]["max-price"])) {
        $values[] = $_GET["filter"]["max-price"][0];
        $queries[] = "price <= ?";
        $types[] = "d";
    }

    if (!count($queries)) {
        $where_clause = "";
        $result = $db->query("SELECT * FROM product_sales_view ORDER BY manufacturer, name " . $limit);
        $page_count = get_page_count();
    } else {
        $where_clause = "WHERE " . $queries[0];
        $final_types = $types[0];
        for ($i = 1; $i < count($queries); $i++) {
            $where_clause .= " AND " . $queries[$i];
            $final_types .= $types[$i];
        }
        $final_query = "SELECT * FROM product_sales_view " . $where_clause .
                        " ORDER BY manufacturer, name " . $limit;
        $result = $db->queryBindParams($final_query, $final_types, $values);
        $page_count = get_page_count($where_clause, $final_types, $values);
    }

    if (!isset($result) || !$result)
        return "[]";

    $data = array();
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $data['devices'][] = $row;
    }

    $data['pageInfo'] = array(
        "cur" => isset($_GET['pagenum']) ? intval($_GET['pagenum']) : 1,
        "max" => $page_count,
    );

    return json_encode($data);
}

function get_manufacturers()
{
    $db = Database::getInstance();
    $query = "SELECT DISTINCT manufacturer FROM product_sales_view";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $data[] = $row["manufacturer"];
    }
    return $data;
}

function get_page_count($where_clause = "", $types = null, $values = null)
{
    global $DEVICES_PER_PAGE;

    $db = Database::getInstance();
    if ($types == null || $values == null) {
        $query = "SELECT COUNT(*) FROM product_sales_view " . $where_clause;
        $result = $db->query($query);
    } else {
        $query = "SELECT COUNT(*) FROM product_sales_view " . $where_clause;
        $result = $db->queryBindParams($query, $types, $values);
    }
    $count = $result->fetch_array(MYSQLI_ASSOC)['COUNT(*)'];

    return ceil($count / $DEVICES_PER_PAGE);
}

?>
