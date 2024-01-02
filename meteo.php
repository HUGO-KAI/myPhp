<?php
$title = "Météo de votre ville";
$cities =[];
require("./components/header.php");
require 'class\Meteo.php';
require 'variable\envVariable.php';
$meteo = new Meteosource ($_ENV["METEO_API_KEY"]);
if (isset($_POST['city'])){
    $cities = $meteo->getPlace('Paris');
}

?>
<div class="row mt-4 g-0" style="min-height:80vh;">
    <div class="col-md-10 justify-content-center">
        <h1 class="text-center mb-3">Voir la prévision météo dans votre ville</h1>
        <form action="/meteo.php" method="POST" class="row col-3 mx-auto">
            <div class="mb-5">
                <label for="city" class="form-label" style="font-size:24px;">Entrer votre ville:</label>
                <input type="text" class="form-control mb-3" id="city" name="city" placeholder="">
                <button type="submit" class="btn btn-primary">Chercher</button>
            </div>
        </form>
        <div>
            <?php if (!empty($cities)): ?>
            <form class="container d-flex flex-wrap justify-content-between">
                    <?php foreach($cities as $city): ?>
                        <div class="card">
                            <ul class="card-body list-group">
                                <fieldset disabled>
                                    <li class="list-group-item">
                                        <label for="disabledTextInput" class="form-label">Ville:</label>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="" value="<?= $city->name ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <label for="disabledTextInput" class="form-label">Région:</label>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="" value="<?= $city->adm_area1 ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <label for="disabledTextInput" class="form-label">Pays:</label>
                                        <input type="text" id="disabledTextInput" class="form-control" placeholder="" value="<?= $city->country ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <label for="latitude" class="form-label">Latitude:</label>
                                        <input type="text" id="latitude" name="latitude"class="form-control" placeholder="" value="<?= $city->lat ?>">
                                    </li>
                                    <li class="list-group-item">
                                        <label for="longitude" class="form-label">Longitude:</label>
                                        <input type="text" id="longitude" name="longitude"class="form-control mb-3" placeholder="" value="<?= $city->lon ?>">
                                    </li>
                                </fieldset>
                                <button type="submit" class ="btn btn-primary" >choisir cette ville</button>
                            </ul>
                        </div>
                        
                    <?php endforeach ?>
            </form>
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



