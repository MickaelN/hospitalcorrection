<?php
require 'models/Database.php';
require 'models/Appointments.php';

$title = 'Liste des rendez vous';

$appointment =new Appointments;

$appointmentList =$appointment->getAppointementsList();
