<?php
function nav_item ( string $lien, string $titre, string $linkClasss = '' ): string
{
    $classe = 'nav-item';
    if ($_SERVER["SCRIPT_NAME"] && $_SERVER["SCRIPT_NAME"] == $lien){
        $linkClasss .= ' active';
    }
    return <<<HTML
    <li class="$classe">
        <a class="$linkClasss" aria-current="page" href="$lien">$titre</a>
    </li>
HTML;
}

function nav_menu (string $linkClass = ''): string
{
    return 
    nav_item ( '/index.php', 'Accueil' , $linkClass).
    nav_item ( '/contact.php', 'Contact' , $linkClass);
}
    
    
?>