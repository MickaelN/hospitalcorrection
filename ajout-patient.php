<?php
include 'controllers/ajout-patientCtrl.php';
include 'parts/header.php';
?>
<div class="container">
<h1>Ajout d'un patient</h1>
<form action="" method="POST">
    <div class="mb-3">
        <label for="lastname" class="form-label">Nom</label>
        <input type="text" class="form-control" id="lastname" name="lastname">
    </div>
    <div class="mb-3">
        <label for="firstname" class="form-label">Prénom</label>
        <input type="text" class="form-control" id="firstname" name="firstname">
    </div>
    <div class="mb-3">
        <label for="birthdate" class="form-label">Date de naissance</label>
        <input type="date" class="form-control" id="birthdate" name="birthdate">
    </div>
    <div class="mb-3">
        <label for="phone" class="form-label">Téléphone</label>
        <input type="text" class="form-control" id="phone" name="phone">
    </div>
    <div class="mb-3">
        <label for="mail" class="form-label">Adresse de courriel</label>
        <input type="email" class="form-control" id="mail" name="mail">
    </div>

    <input type="submit" class="btn btn-success" name="addPatient" value="Ajout du patient" >
</form>
</div>
<?php
include 'parts/footer.php';
