<?php
class Database {
    protected PDO $db;
    protected string $table = '';

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    protected function checkEntityIfExistsByFilter(array $fieldList): bool
    {
        $check = false;
        $whereArray = [];
        foreach ($fieldList as $field) {
            $whereArray[] = '`' . $field->name . '` =  :' . $field->name; //`lastname` = :lastname
        }
        $query = 'SELECT COUNT(`id`) AS `number` FROM ' . $this->table
            . ' WHERE ' . implode(' AND ', $whereArray);
        $queryStatement = $this->db->prepare($query);
        foreach ($fieldList as $field) {
            $fieldName = $field->name;
            $queryStatement->bindValue(':' . $fieldName, $this->$fieldName, $field->type);
        }
        $queryStatement->execute();
        // $number = $queryStatement->fetch(PDO::FETCH_OBJ)->number;
        $toto = $queryStatement->fetch(PDO::FETCH_OBJ);
        // number = 0 si il n'y a pas de patient identique
        // number = 1 si il y a un patient identique
        $number = $toto->number;
        if ($number) {
            $check = true;
        }
        return $check;
    }
}