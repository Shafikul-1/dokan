<?php
class database
{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "dokan";

    private $result = array();
    private $sqli = "";
    private $conn = false;

    // Database Connection 
    public function __construct()
    {
        if (!$this->conn) {
            $this->sqli = new mysqli($this->host, $this->user, $this->password, $this->dbName);
            $this->conn = true;
            if ($this->sqli->connect_error) {
                array_push($this->result, $this->sqli->connect_error);
                return false;
            }
        } else {
            return true;
        }
    }

    // Insert Data Database
    public function insertData($table, $params = array())
    {
        if ($this->tableExit($table)) {
            $tableColumn = implode(", ", array_keys($params));
            $tableValue = implode("', '", $params);
            $sql = "INSERT INTO $table ($tableColumn) VALUES ('$tableValue')";
            if ($this->sqli->query($sql)) {
                array_push($this->result, $this->sqli->insert_id);
                return true;
            } else {
                array_push($this->result, $this->sqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // Get Data Database
    public function getData($table, $row = "*", $join = null, $where = null, $order = null, $limit = null)
    {
        if ($this->tableExit($table)) {
            $sql = "SELECT $row FROM $table";
            if ($join != null) {
                $sql .= " JOIN $join";
            }
            if ($where != null) {
                $sql .= "WHERE $where";
            }
            if ($order != null) {
                $sql .= "ORDER BY $order";
            }
            if ($limit != null) {
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $start = ($page - 1) * $limit;
                $sql .= "LIMIT $start, $limit";
            }
            if ($dataResult = $this->sqli->query($sql)) {
                $this->result = $dataResult->fetch_all(MYSQLI_ASSOC);
                return true;
            } else {
                array_push($this->result, $this->sqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

//  Database Table Exit
    private function tableExit($table)
    {
        $sql = "SHOW TABLES FROM $this->dbName LIKE '$table'";
        $tableInDatabase = $this->sqli->query($sql);
        if ($tableInDatabase->num_rows == 1) {
            return true;
        } else {
            array_push($this->result, "This ' <b>$table</b> ' Table Not found In Database");
            return false;
        }
    }

    // Result Output Function
    public function getResult()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }

    // Database Connection Close
    public function __destruct()
    {
        if ($this->conn) {
            if ($this->sqli->close()) {
                $this->conn = false;
                return true;
            }
        } else {
            return false;
        }
    }
}
