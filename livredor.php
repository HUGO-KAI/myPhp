<?php
require_once 'class\Guestbook.php';
require_once 'class\Message.php';
$username = null;
$message =  null;
$time = null;
$errors = null;
$success = false;
$guestBook = new Guestbook(__DIR__.DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'messages');
if (isset($_POST['username']) && isset($_POST['message'])){
    $username = $_POST['username'];
    $message = new Message($_POST['username'],$_POST['message']);
    if ($message->isValid()){        
        $guestBook->addMessage($message);
        $success = true;
    }else {
        $errors = $message->getErrors();
    }
    date_default_timezone_set('Europe/Paris');
    $time = date('l jS \of F Y h:i:s A');
}
$messages = $guestBook->getMessages();
$title="Liver d'or";
require 'components\header.php';
?>

<div class="row mt-4 g-0" style="min-height:80vh;">
    <div class="col-md-10">
        <h1 class="text-center">Livre d'or</h1>
        <div class="form-group">
            <form class="mb-1 col-10 col-md-6 mx-auto" action="livredor.php" method="POST">
                <?php if (!empty($errors)): ?>
                    <div class="alert alert-danger">
                        Formulaire invalid
                    </div>
                <?php endif ?>
                <?php if ($success): ?>
                    <div class="alert alert-success">
                        Merci de votre message !
                    </div>
                <?php endif ?>
                <label for="username" class="form-label fw-semibold">Votre pseudo</label>
                <input type="text" class="form-control <?= isset($errors['username'])?'is-invalid':'' ?>" id="username" placeholder="Entrer votre pseudo" name="username" value=<?= $success?'':htmlentities($_POST['username']??'') ?>>
                <?php if (isset($errors['username'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['username'] ?>
                    </div>
                <?php endif ?>

                <label for="message" class="form-label mt-1 fw-semibold">Message</label>
                <textarea class="form-control <?= isset($errors['message'])?'is-invalid':'' ?>" name="message" id="message" rows="6" placeholder="Entrer votre message et puis envoyer"><?php if (isset($message->message)): ?><?= $success?'':htmlentities($_POST['message']) ?><?php endif ?></textarea>

                <?php if (isset($errors['message'])): ?>
                    <div class="invalid-feedback">
                        <?= $errors['message'] ?>
                    </div>
                <?php endif ?>
                <button type="submit" class="btn btn-primary mt-3">Envoyer</button>
            </form>
            <?php if (!empty($messages)): ?>
            <h1 class="mt-4 text-center">Vos messages</h1>
            <?php foreach($messages as $message): ?>
                <?= $message->toHTML() ?>
            <?php endforeach ?>
            <?php endif ?>
        </div>
    </div>
    <?php
    require("./components/sideNav.php");
    ?>
</div>

<?php
require 'components\footer.php';
?>