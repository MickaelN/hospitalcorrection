<?php

//Dans le cas de l'AJAX
if (isset($_POST['search'])) {
    include '../models/Database.php';
    include '../models/Patients.php';
    $patient = new Patients;
    echo json_encode($patient->getPatientListSelect($_POST['search']));
} else { //Dans les autres cas
    include 'models/Database.php';
    include 'models/Patients.php';
    include 'models/Appointments.php';

    $scriptList = ['assets/js/filterPatients.js'];

    $patient = new Patients;
    $patientList = $patient->getPatientListSelect();
    //Si j'ai cliqué sur le bouton d'ajout d'un rdv
    if (isset($_POST['addAppointment'])) {
        $errorList = [];
        $appointment = new Appointments;
        include 'class/Form.php';
        $input = ['filter' => 'datetime', 'name' => 'datehour', 'realName' => 'la date et l\'heure'];
        $formValid = new Form;
        if ($formValid->checkPost($input)) {
            $datehour = str_replace('T', ' ', htmlspecialchars($_POST['datehour']));
        } else {
            $errorList['datehour'] = $formValid->getErrorMessage();
        }
        $patient->setId($_POST['patient']);
        $checkPatient = $patient->checkPatientIfExistsById();
        $appointment->setDatehour($datehour);
        $checkAppointment = $appointment->checkAppointmentIfExists();

        if (count($errorList) == 0 && $checkPatient && !$checkAppointment) {
            $appointment->setIdPatients($patient->getId());
            $appointment->addAppointment();
        }else{
            echo 'Y a un problème';
            var_dump($checkPatient);
            var_dump($checkAppointment);
            var_dump($errorList);
        }
    }
}
