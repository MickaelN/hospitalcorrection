<?php
include 'models/Database.php';
include 'models/Patients.php';

$patient = new Patients;
$patientList = $patient->getPatientListSelect();