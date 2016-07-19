<?php

$DEVICES_PER_PAGE = 12;

function get_title()
{
    return "TIM - Smartphones";
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

    /*
     * Read all the filters and create a query that accomodates all of them.
     */

    $pagenum = max(0, isset($_GET['pagenum']) ? intval($_GET['pagenum']) : 1);
    $limit = "LIMIT " . (($pagenum - 1) * $DEVICES_PER_PAGE) . "," . $DEVICES_PER_PAGE;

    $join =  "JOIN devices USING(id) LEFT JOIN sales USING(id)";

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

    if (isset($_GET["filter"]["os"])) {
        $oss = $_GET["filter"]["os"];
        foreach ($oss as $os)
            $values[] = $os;
        $placeholders = substr(str_repeat("?,", count($oss)), 0, -1);
        $queries[] = "os IN (" . $placeholders . ")";
        $types[] = str_repeat("s", count($oss));
    }

    if (!count($queries)) {
        $where_clause = "";
        $result = $db->query("SELECT * FROM tablets " . $join . " ORDER BY manufacturer, name " . $limit);
        $page_count = get_page_count();
    } else {
        $where_clause = "WHERE " . $queries[0];
        $final_types = $types[0];
        for ($i = 1; $i < count($queries); $i++) {
            $where_clause .= " AND " . $queries[$i];
            $final_types .= $types[$i];
        }
        $final_query = "SELECT * FROM tablets " . $join . " " . $where_clause .
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
    $query = "SELECT DISTINCT manufacturer FROM tablets JOIN devices USING(id)";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $data[] = $row["manufacturer"];
    }
    return $data;
}

function get_oss()
{
    $db = Database::getInstance();
    $query = "SELECT DISTINCT os FROM tablets";
    $result = $db->query($query);
    while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
        $data[] = $row["os"];
    }
    return $data;
}

function get_page_count($where_clause = "", $types = null, $values = null)
{
    global $DEVICES_PER_PAGE;

    $db = Database::getInstance();
    if ($types == null || $values == null) {
        $query = "SELECT COUNT(*) FROM tablets " . $where_clause;
        $result = $db->query($query);
    } else {
        $query = "SELECT COUNT(*) FROM tablets JOIN devices USING(id) " . $where_clause;
        $result = $db->queryBindParams($query, $types, $values);
    }
    $count = $result->fetch_array(MYSQLI_ASSOC)['COUNT(*)'];

    return ceil($count / $DEVICES_PER_PAGE);
}

?>
