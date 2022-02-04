<?php
$scriptList = ['assets/js/moment-with-locales.js', 'assets/js/patientForm.js'];
$id = isset($_GET['patientId']) ? $_GET['patientId'] : null;
if (!isset($_POST['field'])) {
    require 'models/Patients.php';
    $isPatientFound = false;
    if (isset($_GET['patientId'])) {
        $patient = new Patients;
        $patient->setId(htmlspecialchars($_GET['patientId']));
        $isPatientFound = $patient->getPatientInfo();
    }
} else {
    require '../models/Patients.php';
    require '../class/Form.php';
    $ajaxValid = new Form;
    $field = htmlspecialchars($_POST['field']);
    switch ($field) {
        case 'firstname':
        case 'lastname':
            $filter = 'name';
            break;
        case 'phone':
            $filter = 'phone';
            break;
        case 'birthdate':
            $filter = 'date';
            break;
        case 'mail':
            $filter = 'mail';
            break;
        default:
            $filter = '';
            break;
    }
    $postValue = ['filter' => $filter, 'name' => $field, 'realName' => $field];
    if ($ajaxValid->checkPost($postValue)) {
        $patient = new Patients;
        $patient->setId(htmlspecialchars($_POST['id']));
        echo $patient->updatePatient($_POST['field'], $_POST[$field]);
    }else{
        echo $ajaxValid->getErrorMessage();
    }
}
