<?php
$title="Newslettre";
$email = null;
$error = null;
$success = null;
if (isset($_POST['email'])){
    $email = $_POST['email'];
    if (filter_var($email, FILTER_VALIDATE_EMAIL)){
        $file = __DIR__.DIRECTORY_SEPARATOR.'emails'.DIRECTORY_SEPARATOR.date('Y-m-d');
        file_put_contents($file, $email.PHP_EOL, FILE_APPEND);
        $success = "Votre email a bien été enregistré";
        $email = null;
    }else {
        $error = "Email invalide";
    }
}
require './components/header.php';
require './functions/compteur.php';
ajouter_vue ();
?>

<div class="row mt-4 g-0" style="min-height:80vh;">
    <div class="container px-5 col-md-10 text-center">
        <h2>S'inscrire à la newslettre</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi molestiae animi porro magni, minima doloremque illum officia asperiores officiis fugit doloribus quisquam temporibus accusantium voluptates, dignissimos ducimus quo et voluptas.</p>
        <form action="newslettre.php" method="POST" class="form-inline">
            <input type='email' name='email' id='email' placeholder="Enter votre email adresse" class="form-control w-25 m-auto" require value=<?= htmlentities($email) ?>>
            <button type="submit" class="btn btn-primary mt-2">S'inscrire</button>
        </form>
        <?php if ($error): ?>
            <div class="alert alert-danger mt-2 w-50 m-auto">
                <?= $error ?>
            </div>
        <?php elseif ($success): ?>
            <div class="alert alert-success mt-2 w-50 m-auto">
                <?= $success ?>
            </div>
        <?php endif ?>
    </div>
    <?php require './components/sideNav.php'; ?>
</div>


<?php
require './components/footer.php';
?>