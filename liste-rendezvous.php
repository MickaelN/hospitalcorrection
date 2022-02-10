<?php
include 'controllers/liste-rendezvousCtrl.php';
include 'parts/header.php';
?>
<h1>Liste des rendez-vous</h1>
<a class="btn btn-success" href="ajout-rendezvous.php">Ajout</a>
<table class="table table-striped">
    <thead>
        <tr>
            <th>Date</th>
            <th>Horaire</th>
            <th>Nom</th>
            <th>Prénom</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        <?php
        foreach ($appointmentList as $app) { ?>
            <tr>
                <td><?= $app->date ?></td>
                <td><?= $app->time ?></td>
                <td><?= $app->lastname ?></td>
                <td><?= $app->firstname ?></td>
                <td><a href="rendezvous.php?id=<?= $app->id ?>" class="btn btn-warning">Modifier</a></td>
            </tr>
        <?php } ?>
    </tbody>
</table>

<?php
include 'parts/footer.php';
?>