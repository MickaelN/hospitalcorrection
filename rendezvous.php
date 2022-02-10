<?php
include 'controllers/rendezvousCtrl.php';
include 'parts/header.php';

if (isset($appointment) && is_object($appointment)) {
?>
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <p class="card-title h5"><?= $appointment->date ?></p>
            <p class="card-text">A <?= $appointment->time ?><br>
            <?= $appointment->lastname ?> <?= $appointment->firstname ?><br>
            <small><?= $appointment->mail ?></small><br>
            <small><?= $appointment->birthdate ?></small><br>
            <small><?= preg_replace('/(\d{2})/','$1 ',$appointment->phone) ?></small>
            <!-- wordwrap($appointment->phone,2,' ') -->
            </p>
            <a href="#" class="btn btn-primary">Modifier</a>
        </div>
    </div>
<?php
}
include 'parts/footer.php';
?>