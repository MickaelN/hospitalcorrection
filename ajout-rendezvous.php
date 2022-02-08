<?php
require 'controllers/ajout-rendezvousCtrl.php';
include 'parts/header.php';
?>
<h1>Ajout d'un rendez vous</h1>
<form method="POST" class="col-4 p-2 row">
    <div class="mb-3">
        <label for="search" class="form-label">Recherche</label>
        <input type="search" class="form-control" id="search" name="search" placeholder="Saisissez votre recherche">
    </div>
    <div class="mb-3">
        <label for="patient" class="form-label">Patient</label>
        <select name="patient" id="patient">
            <?php
            foreach ($patientList as $patient) { ?>
                <option value="<?= $patient->value ?>"><?= $patient->name ?></option>
            <?php }
            ?>
        </select>
    </div>
    <div class="mb-3">
        <label for="datehour" class="form-label">Date</label>
        <input type="datetime-local" class="form-control" id="datehour" name="datehour">
    </div>
    <input type="submit" class="btn btn-success" name="addAppointment" value="Ajout du rdv">
</form>
<?php
include 'parts/footer.php';
