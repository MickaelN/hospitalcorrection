<?php
$scriptList = ['assets/js/moment-with-locales.js', 'assets/js/patientForm.js'];
$id = isset($_GET['patientId']) ? $_GET['patientId'] : null; 
if (!isset($_POST['field']) && !isset($_POST['value'])) {
    require 'models/Patients.php';
    $isPatientFound = false;
    if (isset($_GET['patientId'])) {
        $patient = new Patients;
        $patient->setId(htmlspecialchars($_GET['patientId']));
        $isPatientFound = $patient->getPatientInfo();
    }
}
else{
    require '../models/Patients.php'; 
    $patient = new Patients;
    $patient->setId($_POST['id']);
    echo $patient->updatePatient($_POST['field'],$_POST['value']);
}