<?php


if (isset($_POST['search'])) {
    include '../models/Database.php';
    include '../models/Patients.php';
    $patient = new Patients;
    echo json_encode($patient->getPatientListSelect($_POST['search']));
} else {
    include 'models/Database.php';
    include 'models/Patients.php';

    $scriptList = ['assets/js/filterPatients.js'];

    $patient = new Patients;
    $patientList = $patient->getPatientListSelect();
}
