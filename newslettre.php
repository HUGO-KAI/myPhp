<?php
$email = '';
if (isset($_POST['email'])){
    $email = $_POST['email'];
}
require './components/header.php';
?>

<?= $email ?>
<div class="row mt-4 g-0" style="min-height:80vh;">
    <div class="container px-5 col-md-10 text-center">
        <h2>S'inscrire pour newslettre</h2>
        <p>Lorem ipsum dolor sit amet consectetur, adipisicing elit. Sequi molestiae animi porro magni, minima doloremque illum officia asperiores officiis fugit doloribus quisquam temporibus accusantium voluptates, dignissimos ducimus quo et voluptas.</p>
        <form action="newslettre.php" method="POST" class="form-inline">
            <input type='email' name='email' id='email' placeholder="Enter votre email adresse" class="form-control w-25 m-auto"require>
            <button type="submit" class="btn btn-primary mt-2">S'inscrire</button>
        </form>
    </div>
    <?php require './components/sideNav.php'; ?>
</div>


<?php
require './components/footer.php';
?>