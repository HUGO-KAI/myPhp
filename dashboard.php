<?php 
$title ="Dashboard";
require './functions/compteur.php';

$annee = (int)date('Y');
$anneeSelected = isset($_GET['annee']) ? $_GET['annee'] : null;
$moiSelected = empty($_GET['mois']) ? null : $_GET['mois'];
$mois = [
    '01' => 'Janvier',
    '02' => 'Févier',
    '03' => 'Mars',
    '04' => 'Avril',
    '05' => 'Mais',
    '06' => 'Juin',
    '07' => 'Juillet',
    '08' => 'Août',
    '09' => 'Septembre',
    '10' => 'Octobre',
    '11' => 'Novembre',
    '12' => 'Décembre'
];
if ($anneeSelected && $moiSelected) {
    $total = nombre_vues_mois((int)$anneeSelected, (int)$moiSelected);
    $vueDetails = nombre_vues_mois_detail((int)$anneeSelected, (int)$moiSelected);
}else{
    $total = nombre_vue ();
}
if(isset($_POST["email"]) && $_POST["email"]="email@exemple.com"){
    
}

?>
<?php require ("./components/header.php") ?>

<div class="row mt-4 g-0" style="min-height:80vh;">
    <div class="col-md-10 text-center">
        <p class="bg-primary-subtle" style="font-size:2rem;">Choisir année et mois pour voir le nombre de vue par date</p>
        <div class="d-flex px-5">
            <div class="col-md-4 text-center">
                <ul class="list-group">
                    <?php for($i = 0; $i < 5; $i++): ?><!-- affiche 5 dernières années -->
                        <a 
                            class="text-decoration-none list-group-item <?= ($annee - $i) == $anneeSelected ?'active':'' ?>" 
                            href="dashboard.php?annee=<?= $annee - $i ?>">
                            <?= $annee - $i ?>
                        </a>
                        <ul class="list-group">
                        <?php if (($annee - $i) == $anneeSelected): ?>
                            <?php foreach($mois as $k => $nom): ?>
                                <a 
                                    class="text-decoration-none list-group-item <?= $k == $moiSelected ?'my-active':'' ?>" 
                                    href="dashboard.php?annee=<?= $annee - $i ?>&mois=<?= $k ?>" >
                                    <?= $nom ?>
                                </a>
                            <?php endforeach ?>                        
                        <?php endif ?>
                        </ul>
                    <?php endfor ?>
                </ul>
            </div>
            <div class="col-md-8 text-center">
                <div class="card">
                    <strong style="font-size:3em;"><?= $total ?></strong>
                    Visite<?= $total > 1 ? 's' : '' ?> total
                </div>
                <div>
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Année</th>
                            <th>Mois</th>
                            <th>Jour</th>
                            <th>Nombre de visites</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (isset($vueDetails) && count($vueDetails) > 0): ?>
                            <?php foreach ($vueDetails as $vueDetail): ?>
                                <tr>
                                <th><?= $vueDetail['annee'] ?></th>
                                <th><?= $vueDetail['mois'] ?></th>
                                <th><?= $vueDetail['jour'] ?></th>
                                <th><?= $vueDetail['visites'] ?></th>
                            </tr>
                            <?php endforeach ?>
                        <?php endif ?>
                    </tbody>
                </table>
                </div>
            </div>
        </div>
    </div>
    
    <?php require ("./components/sideNav.php") ?>
</div>
<?php require ("./components/footer.php") ?>
<style>
    .my-active{
        background-color: aqua;
        font-weight:700;
    }
</style>