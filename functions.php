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
    nav_item ( '/contact.php', 'Contact' , $linkClass).
    nav_item ( '/jeu.php', 'Jeu' , $linkClass).
    nav_item ( '/parfums.php', 'Parfum' , $linkClass);
}

function checkbox (string $name, string $value, array $data): string
{  
    $attributes ='';
    if (isset($data[$name]) && in_array($value, $data[$name])){
        $attributes .='checked';
    }
    return <<<HTML
    <input type="checkbox" name="{$name}[]" value="$value" $attributes>
HTML;
}

function radio (string $name, string $value, array $data): string
{  
    $attributes ='';
    if (isset($data[$name]) && $value === $data[$name]){
        $attributes .='checked';
    }
    return <<<HTML
    <input type="radio" name="{$name}" value="$value" $attributes>
HTML;
}

function horaireOuvert (array $creneaux) {
    $phrases = [];
    foreach($creneaux as $creneau){
        $phrases[] = "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>";
    };
    if (count($phrases) === 0){
        return "Magasin fermé";
    }
    return 'Ouvert '.implode(' et ',$phrases);
}
    
    
?>