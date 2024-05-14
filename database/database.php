<?php 
class database{
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
            if($this->sqli->connect_error){
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

    // Database Get Data
    public function getData ($table, $row = "*", $join = null, $where = null, $order = null, $limit = null)
    {
        if ($this->TableExits($table)) {
            $sql = "SELECT $row FROM $table ";
            if($join != null){
                $sql .= " JOIN $join";
            }
            if($where != null){
                $sql .= "WHERE $where";
            }
            if($order != null){
                $sql .= "ORDER BY $order";
            }
            if($limit != null){
                if(isset($_GET['page'])){
                    $page = $_GET['page'];
                } else{
                    $page = 1;
                }
                $start = ($page - 1) * $limit;
               $sql .= "LIMIT $start, $limit";
            }
            // echo $sql;
            if ($dataResult = $this->sqli->query($sql)) {
                $this->result = $dataResult->fetch_all(MYSQLI_ASSOC);
                return true;
            } else {
                array_push($this->result, $this->sqli->error);
                return false;
            }
        }else{
            return false;
        }
    }

    // Database Data Delete
    public function deleteData($table, $where = null)
    {
        if ($this->TableExits($table)) {
            $sql = "DELETE FROM $table WHERE ";
            if($where != null){
                $sql .= "$where";
            }
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
    public function getResult ()
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
?>