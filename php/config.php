<?php 


class DatabaseSQL {
    public $conn = null;

    public $server = "localhost";
    public $username = "project-2-group";
    public $password = "project-2";
    public $db = "bugme";

    /**
     * Undocumented function
     *
     * @param String $sql
     * @return Dictionary
     */
    function select($sql) {

        $this->conn = new mysqli($this->server,  $this->username, $this->password, $this->db);

        $response = array(
            "count" => 0,
            "result" => null,
            "state" => false
        );
        
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }

        $results = $this->conn->query($sql);

        $response['count'] = $results->num_rows;
        $response['result'] = $results;
        $response['state'] = true;


        $this->conn->close();


        return $response;

    }

    function insert($sql) {
        $this->conn = new mysqli($this->server,  $this->username, $this->password, $this->db);
        if ($this->conn->connect_error) {
            die("Connection failed: " . $this->conn->connect_error);
        }
        
        $stmt = $this->conn->query($sql);
        $this->conn->close();
        
        return $stmt;
    }
}


?>
