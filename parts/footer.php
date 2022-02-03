<footer class="container-fluid">
    <p>Copyright MNOEL <?= date('Y') ?></p>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<?php
//On va vérifier que le tableau des script js existe. Si c'est le cas je le garde sinon je crée un tableau vide pour éviter les erreurs dans la boucle foreach
$scriptList = isset($scriptList) ? $scriptList : [];
//Permet de créer des insertions de script js en fonction d'une liste 
foreach ($scriptList as $script) { ?>
    <script src="<?= $script ?>"></script>
<?php } ?>
</body>

</html>