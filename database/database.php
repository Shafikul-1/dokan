<?php
class database
{
    public $mainUrl = "http://localhost/dokan";
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "dokan";

    private $result = array();
    private $sqli = "";
    private $conn = false;

    // Database Connect
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

    // Database Data Insert
    public function insertData($table, $params = array())
    {
        if ($this->TableExits($table)) {
            $tableColumn = implode(", ", array_keys($params));
            $tableValue = implode("', '", $params);
            $sql = "INSERT INTO $table ($tableColumn) VALUES ('$tableValue')";
            // echo $sql;
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

    // Update Data In Database
    public function updateData($table, $params = array(), $where = null)
    {
        if ($this->TableExits($table)) {
            $args = array();
            foreach ($params as $key => $value) {
                $args[] = "$key = '$value'";
            }
            $sql = "UPDATE $table SET " . implode(", ", $args);
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            //    echo $sql; 
            if ($this->sqli->query($sql)) {
                array_push($this->result, $this->sqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->sqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // Custom method to increment a column value
    public function incrementOrDecrement($table, $columns, $where, $what)
    {
        if ($this->TableExits($table)) {
            $incrementDecrementClauses = [];
            foreach ($columns as $column => $increment) {
                $incrementDecrementClauses[] = "$column = $column $what $increment";
            }
            $sql = "UPDATE $table SET " . implode(", ", $incrementDecrementClauses) . " WHERE $where";
            // echo $sql;
            if ($this->sqli->query($sql)) {
                array_push($this->result, $this->sqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->sqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // concat Update Data in query
    public function concatData($table, $column, $where)
    {
        if ($this->TableExits($table)) {
            $concatClauses = [];
            foreach ($column as $column => $value) {
                $concatClauses[] = "$column = CONCAT($column, $value)";
            }
            $concatClause = implode(', ', $concatClauses);
            $sql = "UPDATE $table SET $concatClause WHERE $where";
            // echo $sql . "<br>";
            
            if ($this->sqli->query($sql)) {
                array_push($this->result, $this->sqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->sqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // Database Get Data
    public function getData($table, $row = "*", $join = null, $where = null, $order = null, $limit = null, $leftJoin = null)
    {
        if ($this->TableExits($table)) {
            $sql = "SELECT $row FROM $table ";
            if ($join != null) {
                $sql .= " JOIN $join";
            }
            if ($leftJoin != null) {
                $sql .= " LEFT JOIN $leftJoin";
            }
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            if ($order != null) {
                $sql .= " ORDER BY $order";
            }
            if ($limit != null) {
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];
                } else {
                    $page = 1;
                }
                $start = ($page - 1) * $limit;
                $sql .= " LIMIT $start, $limit";
            }
            // echo $sql . "<br>";
            if ($dataResult = $this->sqli->query($sql)) {
                $this->result = $dataResult->fetch_all(MYSQLI_ASSOC);
                return true;
            }
            // if ($stmt = $this->sqli->prepare($sql)) {
            //     $stmt->execute();
            //     $dataResult = $stmt->get_result();
            //     $this->result = $dataResult->fetch_all(MYSQLI_ASSOC);
            //     return true;
            // }
            else {
                array_push($this->result, $this->sqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // Pagination funtion
    public function pagination($table, $leftJoin = null, $where = null, $limit = null)
    {
        if ($this->TableExits($table)) {
            $sql = "SELECT COUNT(*) FROM $table ";
            if ($leftJoin != null) {
                $sql .= " LEFT JOIN $leftJoin";
            }
            if ($where != null) {
                $sql .= " WHERE $where";
            }
            // echo $sql;
            if ($dataResult = $this->sqli->query($sql)) {
                $totalRecord = $dataResult->fetch_array();
                $totalRecord = $totalRecord[0];
                $totalPage = ceil($totalRecord / $limit);
                if ($totalRecord > $limit) {
                    return $totalPage;
                }
            } else {
                array_push($this->result, $this->sqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // Database Data Delete
    public function deleteData($table, $where = null)
    {
        if ($this->TableExits($table)) {
            $sql = "DELETE FROM $table WHERE ";
            if ($where != null) {
                $sql .= "$where";
            }
            // echo $sql . "<br>";
            if ($this->sqli->query($sql)) {
                array_push($this->result, $this->sqli->affected_rows);
                return true;
            } else {
                array_push($this->result, $this->sqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    public function searchData($table, $row = "*", $searchColumn, $searchVal = null)
    {
        if ($this->TableExits($table)) {
            $sql = "SELECT $row FROM $table WHERE $searchColumn ";
            if ($searchVal != null) {
                $sql .= " LIKE '%$searchVal%'";
            }
            if ($searchReslt = $this->sqli->query($sql)) {
                $this->result = $searchReslt->fetch_all(MYSQLI_ASSOC);
                return true;
            } else {
                array_push($this->result, $this->sqli->error);
                return false;
            }
        } else {
            return false;
        }
    }

    // Table Is Exits
    private function TableExits($table)
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

    // Show Database Data Function
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
