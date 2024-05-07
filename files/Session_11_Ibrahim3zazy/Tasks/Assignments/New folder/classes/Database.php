<?php 

class Database 
{
    private $hostName = 'localhost';
    private $userName = 'root';
    private $password = '';
    private $database = 'eraasoft_softcompany_task';

    private $conn;

    public function __construct() 
    {
        $this->conn = new mysqli($this->hostName, $this->userName, $this->password, $this->database);

        if(!$this->conn) die("Error during database Connection");

        return $this->conn;
    }

    public function makeQuery($sql) {
        return $this->conn->query($sql);
    }

    public function __destruct() 
    {
        return $this->conn->close();
    }
}
