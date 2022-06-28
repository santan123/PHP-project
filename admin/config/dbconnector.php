<?php
class mydbconnector
{
    private $servername = "localhost";
    private $server_username = "root";
    private $server_password = "";
    private $db = "schoolmgt";
    public $con;
    public function __construct()
    {
        try {
            $conn = new PDO("mysql:host=$this->servername;dbname=$this->db", $this->server_username, $this->server_password);
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->con = $conn;
            return $this->con;
        } 
        catch (PDOException $e) {
            echo $e->getMessage();
        }
    }
}
