<?php
include 'controllers/ajout-patientCtrl.php';
include 'parts/header.php';
?>
<div class="container">
    <h1>Ajout d'un patient</h1>
    <div class="row">
        <img src="assets/img/stethoscope-g267c0b2ac_640.jpg" class="offset-2 col-4 p-2">
        <form action="" method="POST" class="col-4 p-2 row">
            <?php
            foreach ($inputArray as $input) { ?>
                <div class="mb-3">
                    <label for="<?= $input['name'] ?>" class="form-label"><?= $input['label'] ?></label>
                    <input type="<?= $input['type'] ?>" class="form-control" id="<?= $input['name'] ?>" name="<?= $input['name'] ?>" placeholder="<?= $input['placeholder'] ?>">
                </div>
            <?php } ?>

            <input type="submit" class="btn btn-success" name="addPatient" value="Ajout du patient">
        </form>
    </div>
</div>
<?php
include 'parts/footer.php';
