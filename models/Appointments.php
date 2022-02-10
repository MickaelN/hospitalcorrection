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

    public function addAppointment(): bool
    {
        $query = 'INSERT INTO ' . $this->table
            . ' (`dateHour`,`idPatients`) '
            . 'VALUES (:dateHour, :idPatients)';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':dateHour', $this->dateHour, PDO::PARAM_STR);
        $queryStatement->bindValue(':idPatients', $this->idPatients, PDO::PARAM_INT);
        return $queryStatement->execute();
    }

    public function getAppointementsList():array
    {
        $query = 'SELECT DATE_FORMAT(`ap`.`dateHour`,\'%d/%m/%Y\') AS `date`, DATE_FORMAT(`ap`.`dateHour`,\'%Hh%i\') AS `time` ,`pa`.`lastname`,`pa`.`firstname`, `ap`.`id`'
            . ' FROM ' . $this->table . ' AS `ap`'
            . ' INNER JOIN `patients` AS `pa` ON `pa`.`id` = `ap`.`idPatients`'
            . ' ORDER  BY `dateHour` ASC';
        $queryStatement = $this->db->query($query);
        return $queryStatement->fetchAll(PDO::FETCH_OBJ);
    }

    public function getAppointementById()
    {
        $query = 'SELECT DATE_FORMAT(`ap`.`dateHour`,\'%d/%m/%Y\') AS `date`, DATE_FORMAT(`ap`.`dateHour`,\'%Hh%i\') AS `time` ,`pa`.`lastname`,`pa`.`firstname`,`pa`.`mail`, DATE_FORMAT(`pa`.`birthdate`,\'%d/%m/%Y\') AS `birthdate`,`pa`.`phone`'
            . ' FROM ' . $this->table . ' AS `ap`'
            . ' INNER JOIN `patients` AS `pa` ON `pa`.`id` = `ap`.`idPatients`'
            . ' WHERE `ap`.`id` = :id'
            . ' ORDER  BY `dateHour` ASC';
        $queryStatement = $this->db->prepare($query);
        $queryStatement->bindValue(':id', $this->id, PDO::PARAM_INT);
        $queryStatement->execute();
        return $queryStatement->fetch(PDO::FETCH_OBJ);
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
