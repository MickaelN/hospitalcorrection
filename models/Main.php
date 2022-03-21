<?php
class Main{
    protected string $table;
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::getConnection();
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

    public function beginTransaction(){
        return $this->db->beginTransaction();
    }

    public function commit(){
        return $this->db->commit();
    }

    public function rollback(){
        return $this->db->rollback();
    }

    public function lastInsertId(){
        return $this->db->lastInsertId();
    }
}