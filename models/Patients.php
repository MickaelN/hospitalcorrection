<?php
class Patients extends Main
{
    protected int $id;
    protected string $lastname;
    protected string $firstname;
    protected string $birthdate;
    protected string $phone;
    protected string $mail;
    protected string $table = '`patients`';


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
        $fieldArray = [];
        $fieldName = ['lasname', 'firstname', 'birthdate'];
        $field = new stdClass;
        $field->type = PDO::PARAM_STR;
        foreach ($fieldName as $name) {
            $field->name = $name;
            $fieldArray = [$field];
        }
        return $this->checkEntityIfExistsByFilter($fieldArray);
    }
    public function checkPatientIfExistsById(): bool
    {
        $field = new stdClass;
        $field->name = 'id';
        $field->type = PDO::PARAM_INT;
        $fieldArray = [$field];
        return $this->checkEntityIfExistsByFilter($fieldArray);
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
        if (is_object($result)) {
            $this->lastname = $result->lastname;
            $this->firstname = $result->firstname;
            $this->birthdate = $result->birthdate;
            $this->phone = $result->phone;
            $this->mail = $result->mail;
            return true;
        }
        return false;
    }

    public function updatePatient($field, $value): bool
    {
        $query = 'UPDATE ' . $this->table . ' SET `' . $field . '` = :' . $field . ' WHERE `id` = :id';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryStatement->bindValue(':' . $field, $value, PDO::PARAM_STR);
        return $queryStatement->execute();
    }

    public function getPatientListSelect(?string $search = null): array
    {
        /**
         * %:search%  => %'toto'%
         * '%toto%'
         */
        $query = 'SELECT `id` AS `value` , CONCAT(`lastname`, \' \', `firstname`,\' \', DATE_FORMAT(`birthdate`, \'%d/%m/%Y\')) AS `name` FROM ' . $this->table;
        if (!is_null($search)) {
            $query .= 'WHERE `lastname` LIKE :search OR `firstname` LIKE :search OR DATE_FORMAT(`birthdate`,\'%d/%m/%Y\') LIKE :search';
            $queryStatement = $this->db->prepare($query);
            $queryStatement->bindValue(':search', '%' . $search . '%', PDO::PARAM_STR);
            $queryStatement->execute();
        } else {
            $queryStatement = $this->db->query($query);
        }
        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
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
    public function getId(): int
    {
        return $this->id;
    }
    public function getLastname(): string
    {
        return $this->lastname;
    }
    public function getFirstname(): string
    {
        return $this->firstname;
    }
    public function getBirthdate(): string
    {
        return $this->birthdate;
    }
    public function getPhone(): string
    {
        return $this->phone;
    }
    public function getMail(): string
    {
        return $this->mail;
    }
}
