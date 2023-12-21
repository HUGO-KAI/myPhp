<footer class="text-center bg-dark text-light" style="min-height:10vh;">
<hr>
<div class="row">
    <?php
    require_once dirname(__DIR__).DIRECTORY_SEPARATOR.'class'.DIRECTORY_SEPARATOR.'Compteur.php';
    $filename = dirname(__DIR__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur';
    $compteur = new Compteur($filename);
    $compteur->incrementer();
    $vue = $compteur->recuperer();
    ?>
    <strong>Nombre visite du site : <?= $vue ?></strong>
</div>
</footer>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
<style>
</style>
</body>
</html>