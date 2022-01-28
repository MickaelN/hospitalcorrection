<?php
include 'controllers/ajout-patientCtrl.php';
include 'parts/header.php';
?>
<div class="container">
    <h1>Ajout d'un patient</h1>
    <form action="" method="POST">
        <?php
        foreach ($inputArray as $input) { ?>
            <div class="mb-3">
                <label for="<?= $input['name']?>" class="form-label"><?= $input['label']?></label>
                <input type="<?= $input['type']?>" class="form-control" id="<?= $input['name']?>" name="<?= $input['name']?>" placeholder="<?= $input['placeholder']?>">
            </div>
        <?php } ?>

        <input type="submit" class="btn btn-success" name="addPatient" value="Ajout du patient">
    </form>
</div>
<?php
include 'parts/footer.php';
