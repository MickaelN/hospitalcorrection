<?php
class Appointments extends Database
{

    protected int $id;
    protected string $dateHour;
    protected int $idPatients;

    protected string $table = '`appointments`';

    // public function __construct()
    // {
    //     $toto =true;
    //     parent::__construct();
    // }

    public function checkAppointmentIfExists()
    {
        $fieldArray = [];
        $field = new stdClass;
        $field->type = PDO::PARAM_STR;
        $field->name = 'dateHour';
        $fieldArray = [$field];
        return $this->checkEntityIfExistsByFilter($fieldArray);
    }

    public function addAppointment():bool
    {
        $query = 'INSERT INTO ' . $this->table
            . ' (`dateHour`,`idPatients`) '
            . 'VALUES (:dateHour, :idPatients)';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $queryStatement->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $queryStatement->execute();
    }

    /***
     * SETTER
     */
    public function setId(int $value): void
    {
        $this->id = $value;
    }
    public function setDatehour(string $value): void
    {
        $this->dateHour = $value;
    }
    public function setIdPatients(int $value): void
    {
        $this->idPatients = $value;
    }
}
