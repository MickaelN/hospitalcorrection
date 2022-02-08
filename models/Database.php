<?php
class Database {
    protected PDO $db;
    
    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }
}