<?php
require 'models/Database.php';
require 'models/Main.php';
require 'models/Patients.php';
$pageTitle = 'Liste des patients de notre hôpital';
$patients = new Patients;
$patientsList = $patients->getPatientsList();