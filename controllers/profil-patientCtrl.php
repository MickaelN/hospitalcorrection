<?php
$scriptList = ['assets/js/moment-with-locales.js','assets/js/patientForm.js'];
require 'models/Patients.php';
$isPatientFound = false;
if (isset($_GET['patientId'])) {
    $patient = new Patients;
    $patient->setId(htmlspecialchars($_GET['patientId']));
    $isPatientFound = $patient->getPatientInfo();
}
