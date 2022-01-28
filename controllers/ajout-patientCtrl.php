<?php
include 'class/Form.php';
//Quand l'utilisateur a appuyé sur le bouton
if (isset($_POST['addPatient'])) {
    $errorList = [];
    $formVerif = new Form;
    $firstnameArray = ['filter' => 'name', 'name' => 'firstname', 'realName' => 'un prénom'];
    $lastnameArray = ['filter' => 'name', 'name' => 'lastname', 'realName' => 'un nom de famille'];
    $birthdateArray = ['filter' => 'date', 'name' => 'birthdate', 'realName' => 'une date de naissance'];


    $inputArray = [ $lastnameArray,$firstnameArray, $birthdateArray];
    $valueArray = [];
    foreach ($inputArray  as $input) {
        if ($formVerif->check($input['filter'], $input['name'], $input['realName'], $_POST)) {
            $valueArray[$input['name']] = $_POST[$input['name']];
        } else {
            $errorList[$input['name']] = $formVerif->getErrorMessage();
        }
    }

    // if ($formVerif->check('name', 'lastname', 'un nom de famille', $_POST)) {
    //     $lastname = $_POST['lastname'];
    // } else {
    //     $errorList['lastname'] = $formVerif->getErrorMessage();
    // }

    // if ($formVerif->check('name', 'firstname', 'un prénom', $_POST)) {
    //     $firstname = $_POST['firstname'];
    // } else {
    //     $errorList['firstname'] = $formVerif->getErrorMessage();
    // }

    // if ($formVerif->check('date', 'birthdate', 'une date de naissance', $_POST)) {
    //     $birthdate = $_POST['birthdate'];
    // } else {
    //     $errorList['birthdate'] = $formVerif->getErrorMessage();
    // }

    var_dump($errorList);
}
