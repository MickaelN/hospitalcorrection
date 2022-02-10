<?php
require 'models/Database.php';
require 'models/Appointments.php';
if(isset($_GET['id'])){
    $appointments = new Appointments;
    $appointments->setId($_GET['id']);
    $appointment = $appointments->getAppointementById();
}