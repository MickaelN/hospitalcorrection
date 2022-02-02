<?php
include 'controllers/liste-patientsCtrl.php';
include 'parts/header.php';
?>
<h1>Liste des patients</h1>
<a href="ajout-patient.php" class="btn btn-primary" title="Ajout d'un patient">Ajout</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Date de naissance</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach($patientsList as $patient){ ?>
        <tr>
            <td><?= $patient->lastname ?></td>
            <td><?= $patient->firstname ?></td>
            <td><?= $patient->birthdate ?></td>
            <td><a class="btn btn-success" href="profil-patient.php?patientId=<?= $patient->id ?>">Voir le profil</a></td>
        </tr>
        <?php } ?>
    </tbody>
</table>
<?php
include 'parts/footer.php';