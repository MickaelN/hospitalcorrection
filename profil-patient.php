<?php
include 'controllers/profil-patientCtrl.php';
include 'parts/header.php';
if ($isPatientFound) { ?>
    <h1>Information du patient <?= $patient->getLastname() ?> <?= $patient->getFirstname() ?></h1>
    <ul id="patientInfo" data-id="<?= $id ?>">
        <li><span id="lastnameSpan"><?= $patient->getLastname() ?></span><input type="text" name="lastname" id="lastnameInput" value="<?= $patient->getLastname() ?>"> <i class="fas fa-edit infoEdit" id="lastnameIconModify" data-modify="lastname"></i><i class="fas fa-check-square" id="lastnameIconCheck" data-input="lastname"></i></li>
        <li><span id="firstnameSpan"><?= $patient->getFirstname() ?></span><input type="text" name="firstname" id="firstnameInput" value="<?= $patient->getFirstname() ?>"> <i class="fas fa-edit infoEdit" id="firstnameIconModify" data-modify="firstname"></i><i class="fas fa-check-square" id="firstnameIconCheck" data-input="firstname"></i></li>
        <li><span id="birthdateSpan"><?= $patient->getBirthdate() ?></span><input type="date" name="birthdate" id="birthdateInput" value="<?= $patient->getBirthdate() ?>">  <i class="fas fa-edit infoEdit" id="birthdateIconModify" data-modify="birthdate"></i><i class="fas fa-check-square" id="birthdateIconCheck" data-input="birthdate"></i></li>
        <li><span id="mailSpan"><a href="mailto:<?= $patient->getMail() ?>"><?= $patient->getMail() ?></a></span><input type="email" name="mail" id="mailInput" value="<?= $patient->getMail() ?>"> <i class="fas fa-edit infoEdit" id="mailIconModify" data-modify="mail"></i><i class="fas fa-check-square" id="mailIconCheck" data-input="mail"></i></li>
        <li><span id="phoneSpan"><a href="telto:<?= $patient->getPhone() ?>"><?= $patient->getPhone() ?></a></span><input type="text" name="phone" id="phoneInput" value="<?= $patient->getPhone() ?>"> <i class="fas fa-edit infoEdit" id="phoneIconModify" data-modify="phone"></i><i class="fas fa-check-square" id="phoneIconCheck" data-input="phone"></i></li>
    </ul>
<?php } else { ?>
    <h1>Patient non trouvé</h1>
    <p class="text-danger">Merci de contacter le service technique si le problème persiste</p>
    <a href="liste-patients.php" class="btn btn-primary">Retour</a>
<?php } ?>


<?php
include 'parts/footer.php';
?>