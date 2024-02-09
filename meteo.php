<?php
$title = "Météo de votre ville";
$cities =[];
$datas = null;
require 'class\Meteo.php';
require 'variable\envVariable.php';
$meteo = new Meteosource ($_ENV["METEO_API_KEY"]);
if (isset($_POST['city'])){
    $city = htmlentities($_POST['city']);
    $cities = $meteo->getPlace($city);
}
if(isset($_POST['place_id'])){
    $place_id = $_POST['place_id'];
    $datas = $meteo->getMeteo($place_id,);
}
require("./components/header.php");
?>
<div class="row mt-4 g-0" style="min-height:80vh;">
    <div class="col-md-10 justify-content-center">
        <h1 class="text-center mb-3">La prévision météo de votre ville</h1>
        <form action="/meteo.php" method="POST" class="row col-3 mx-auto">
            <div class="mb-5">
                <label for="city" class="form-label" style="font-size:24px;">Entrer votre ville:</label>
                <input type="text" class="form-control mb-3" id="city" name="city" placeholder="">
                <button type="submit" class="btn btn-primary">Chercher</button>
            </div>
        </form>

        <div>
            <?php if (is_iterable($cities)): ?>
            <div class="container grid gap-0 column-gap-3 row justify-content-around">
                <?php foreach($cities as $city): ?>
                <form class="card mb-4 col-5" action="/meteo.php" method="POST">
                    <ul class="card-body list-unstyled" >
                            <li class="">
                                <label for="town" class="form-label">Ville:</label>
                                <input type="text" id="town" name="town" class="form-control" placeholder="" value="<?= $city->name ?>" readonly>
                            </li>
                            <li class="">
                                <label for="place_id" class="form-label">Ville:</label>
                                <input type="text" id="place_id" name="place_id" class="form-control" placeholder="" value="<?= $city->place_id ?>" readonly>
                            </li>
                            <li class="">
                                <label for="region" class="form-label">Région:</label>
                                <input type="text" id="region" name="region" class="form-control" placeholder="" value="<?= $city->adm_area1 ?>" readonly>
                            </li>
                            <li class="">
                                <label for="country" class="form-label">Pays:</label>
                                <input type="text" id="country" name="country" class="form-control" placeholder="" value="<?= $city->country ?>" readonly>
                            </li>
                            <li class="">
                                <label for="latitude" class="form-label">Latitude:</label>
                                <input type="text" id="latitude" name="latitude"class="form-control" placeholder="" value="<?= $city->lat ?>" readonly>
                            </li>
                            <li class="">
                                <label for="longitude" class="form-label">Longitude:</label>
                                <input type="text" id="longitude" name="longitude"class="form-control mb-3" placeholder="" value="<?= $city->lon ?>" readonly>
                            </li>
                        <button type="submit" class ="btn btn-primary" >choisir cette ville</button>
                    </ul>
                </form>
                <?php endforeach ?>
            </div>
            <?php elseif(isset($cities->message)): ?>
                <div class="alert alert-danger"><?= $cities->message ?></div> 
            <?php endif ?>    
        </div>
        <div class="row col-3 mx-auto">
            <?php if($datas): ?>
                <p><strong>Température maintenant:</strong><span class="mx-1"><?= $datas->current->temperature ?></span></p>
                <p><strong>Soleil:</strong><span class="mx-1"><?= $datas->current->summary ?></span></p>
                <p><strong>Pluie:</strong><span class="mx-1"><?= $datas->current->precipitation->type ?></span></p>
            <?php endif ?>
        </div>
    </div>
    <?php
    require("./components/sideNav.php");
    ?>
</div>
<?php
require("./components/footer.php");
?>



