<?php
$erreur = null;
$pwdHash = '$2y$10$Y3WViIv5YWLp28aHlqTNVOlbFqlgPzY.55QVuQpDBpL5bxXUUk1.6';
if (isset($_POST['pseudo']) && isset($_POST['password'])) {
    if($_POST['pseudo'] === 'John' && password_verify($_POST['password'],$pwdHash)){
        session_start();
        $_SESSION['connected'] = 1;
        header('Location: /dashboard.php');
    }else {
        $erreur = 'Identifiant incorrect';
    }
}
require('./functions/auth.php');
if(is_connected()){
    header('Location: /dashboard.php');
}
?>

<?php require ("./components/header.php") ?>
<div>
    <?php if($erreur): ?>
        <div class="alert alert-danger text-center"><?= $erreur ?></div>
    <?php endif ?>
    <form class="col-3 mx-auto mt-4" action="./login.php" method="post">
        <div class="mb-3">
            <label for="pseudo" class="form-label">Nom</label>
            <input type="pseudo" class="form-control" id="pseudo" name="pseudo">
        </div>
        <div class="mb-3">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password">
        </div>
        <button type="submit" class="btn btn-primary">Submit</button>
    </form>
</div>