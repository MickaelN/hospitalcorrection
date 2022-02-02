<?php
include 'controllers/profil-patientCtrl.php';
include 'parts/header.php';
if ($isPatientFound) { ?>
    <h1>Information du patient <?= $patient->getLastname() ?> <?= $patient->getFirstname() ?></h1>
    <ul>
        <li><?= $patient->getLastname() ?></li>
        <li><?= $patient->getFirstname() ?></li>
        <li><?= $patient->getBirthdate() ?></li>
        <li><a href="mailto:<?= $patient->getMail() ?>"><?= $patient->getMail() ?></a></li>
        <li><a href="telto:<?= $patient->getPhone() ?>"><?= $patient->getPhone() ?></a></li>
    </ul>
<?php } else { ?>
    <h1>Patient non trouvé</h1>
    <p class="text-danger">Merci de contacter le service technique si le problème persiste</p>
    <a href="liste-patients.php" class="btn btn-primary">Retour</a>
<?php } ?>


<?php
include 'parts/footer.php';
?>