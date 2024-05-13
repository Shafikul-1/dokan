<?php 
class database{
    private $host = "localhost";
    private $user = "root";
    private $password = "";
    private $dbName = "dokan";

    private $result = array();
    private $sqli = "";
    private $conn = false;

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

    public function insertData($table, $params = array())
    {
        if ($this->checkTable($table)) {
            # code...
        } else {
            return false;
        }
        
    }

    public function getData ($table, $row = "*", $join = null, $where = null, $order = null, $limit = null)
    {
        $sql = "SELECT $row FROM $table";
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
        if ($dataResult = $this->sqli->query($sql)) {
            $this->result = $dataResult->fetch_all(MYSQLI_ASSOC);
            return true;
        } else {
            array_push($this->result, $this->sqli->error);
            return false;
        }
        
    }


    private function checkTable($table)
    {
        $sql = "SHOW TABLE FROM $this->dbName LIKE '$table'";
        $tableInDatabase = $this->sqli->query($sql);
        if ($tableInDatabase->num_rows == 1) {
            return true;
        } else {
            array_push($this->result, "This ' <b>$table</b> ' Table Not found In Database");
            return false;
        }
    }

    public function getResult ()
    {
        $val = $this->result;
        $this->result = array();
        return $val;
    }

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