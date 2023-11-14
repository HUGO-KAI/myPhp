<!doctype html>
<html lang="en" data-bs-theme="auto">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title><?php echo $title ?></title>
    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/starter-template/">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <style>
        .nav-link:hover{
            color:blue !important;
            text-decoration: blue underline !important;
        }
    </style>
        <!-- Favicons -->
    <meta name="theme-color" content="#712cf9">
  </head>

  <body>
    <?php
    function navLinkActive ( $link ) {
        if ($_SERVER["SCRIPT_NAME"] && $_SERVER["SCRIPT_NAME"] == $link){
            echo 'active';
        }else{
            echo '';
        }
    }
    
    ?>
    <header class="container-fluid">
        <nav class="navbar navbar-expand navbar-dark bg-dark" aria-label="Second navbar example">
            <div class="container-fluid">
            <a class="navbar-brand" href="./index.php">Mon site</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarsExample02">
                <ul class="navbar-nav me-auto">
                    <li class="nav-item">
                        <a class="nav-link <?php navLinkActive('/index.php') ?>" aria-current="page" href="./index.php">Accueil</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php navLinkActive('/menu.php') ?>" href="./menu.php">Menu</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php navLinkActive('/contact.php') ?>" href="./contact.php">Contact</a>
                    </li>
                </ul>
                <form role="search">
                    <input class="form-control" type="search" placeholder="Search" aria-label="Search">
                </form>
            </div>
            </div>
        </nav>
    </header>
    