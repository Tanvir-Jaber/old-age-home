<?php


namespace App\Model;

use PDO,PDOException;
class DatabaseConnection
{
    public $conn;
    public function __construct()
    {
        try {
            $this->conn = new PDO("mysql:host=localhost;dbname=old_age_home","root","");
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }
        catch(PDOException $event)
        {
            echo "Connection failed: " . $event->getMessage();
        }
    }
}