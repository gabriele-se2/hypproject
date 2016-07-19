<?php

/*
 * Mysql database class
 */
class Database
{
    private static $_instance;

    private $_connection;
    private $_host = DB_HOST;
    private $_username = DB_USERNAME;
    private $_password = DB_PASSWORD;
    private $_database = DB_DATABASE;

    public static function getInstance()
    {
        if (!self::$_instance) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }

    private function __construct()
    {
        $this->_connection = new mysqli($this->_host, $this->_username,
                $this->_password, $this->_database);

        if (mysqli_connect_error()) {
            trigger_error("Failed to conencto to MySQL: " . mysql_connect_error(),
                    E_USER_ERROR);
        }

        $this->_connection->set_charset("utf8");
    }

    private function __clone() {}

    public function getConnection()
    {
        return $this->_connection;
    }

    public function query($sql_query)
    {
        return $this->getConnection()->query($sql_query);
    }

    private function getRefArray($a)
    {
        $ret = array();
        foreach ($a as $key => $val) {
            $ret[$key] = &$a[$key];
        }
        return $ret;
    }

    /*
     * $query: query with placeholders
     * $types: string containing the type of all the parameters
     * $values: array containing the value of each parameter
     */
    public function queryBindParams($query, $types, $values)
    {
        $db = $this->getConnection();
        $stmt = $db->prepare($query);
        $params = array_merge(array($stmt, $types), $values);
        call_user_func_array("mysqli_stmt_bind_param", $this->getRefArray($params));
        $stmt->execute();
        return $stmt->get_result();
    }
}
?>
