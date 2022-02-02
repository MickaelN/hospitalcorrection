<?php
class Patients
{
    private int $id;
    private string $lastname;
    private string $firstname;
    private string $birthdate;
    private string $phone;
    private string $mail;
    private PDO $db;
    private string $table = '`patients`';

    public function __construct()
    {
        try {
            $this->db = new PDO('mysql:host=localhost;dbname=hospital;charset=utf8', 'root');
        } catch (Exception $error) {
            die($error->getMessage());
        }
    }

    public function addPatient(): bool
    {
        $query = 'INSERT INTO ' . $this->table
            . ' (`lastname`,`firstname`,`birthdate`,`phone`,`mail`) '
            . 'VALUES (:lastname, :firstname, :birthdate, :phone, :mail)';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryStatement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryStatement->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
        $queryStatement->bindValue(':phone', $this->phone, PDO::PARAM_STR);
        $queryStatement->bindValue(':mail', $this->mail, PDO::PARAM_STR);
        return $queryStatement->execute();
    }
    /**
     * Permet de savoir si un patient est unique
     *
     * @return boolean
     */
    public function checkPatientIfExists(): bool
    {
        $check = false;
        $query = 'SELECT COUNT(`id`) AS `number` FROM ' . $this->table
            . ' WHERE `lastname` = :lastname AND `firstname` = :firstname AND `birthdate` = :birthdate';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':lastname', $this->lastname, PDO::PARAM_STR);
        $queryStatement->bindValue(':firstname', $this->firstname, PDO::PARAM_STR);
        $queryStatement->bindValue(':birthdate', $this->birthdate, PDO::PARAM_STR);
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
    /**
     * Permet de récupérer la liste de tout les patients
     *
     * @return array
     */
    public function getPatientsList(): array
    {
        $query = 'SELECT `id`,`lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate` FROM ' . $this->table;
        $queryStatement = $this->db->query($query);
        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getPatientInfo(): bool
    {
        $query = 'SELECT `lastname`, `firstname`, DATE_FORMAT(`birthdate`, \'%d/%m/%Y\') AS `birthdate`,`phone`, `mail` FROM ' . $this->table
            . ' WHERE id= :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryStatement->execute();
        $result = $queryStatement->fetch(PDO::FETCH_OBJ);
        //Si j'ai un résultat j'hydrate mon objet.
        if(is_object($result)){
            $this->lastname = $result->lastname;
            $this->firstname = $result->firstname;
            $this->birthdate = $result->birthdate;
            $this->phone = $result->phone;
            $this->mail = $result->mail;
            return true;
        }
        return false;
    }

    /***
     * SETTER
     */
    public function setId(int $value): void
    {
        $this->id = $value;
    }
    public function setLastname(string $value): void
    {
        $this->lastname = strtoupper($value);
    }

    public function setFirstname(string $value): void
    {
        $this->firstname = $value;
    }

    public function setBirthdate(string $value): void
    {
        $this->birthdate = $value;
    }

    public function setPhone(string $value): void
    {
        $value = str_replace([' ', '.', '-'], '', $value);
        $this->phone = $value;
    }

    public function setMail(string $value): void
    {
        $this->mail = $value;
    }

    /***
     * GETTER
     */
    public function getId():int{
        return $this->id;
    }
    public function getLastname():string{
        return $this->lastname;
    }
    public function getFirstname():string{
        return $this->firstname;
    }
    public function getBirthdate():string{
        return $this->birthdate;
    }
    public function getPhone():string{
        return $this->phone;
    }
    public function getMail():string{
        return $this->mail;
    }
}
