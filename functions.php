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
    nav_item ( '/parfums.php', 'Parfum' , $linkClass).
    nav_item ( '/menu.php', 'Menu' , $linkClass);
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

/*
*Retourner les créneaux de la semaine, si vide retourner 'magasin fermé'
*Parametre: un array qui contien tous les creneaux de la semaine.
*/
function horaireOuvert (array $creneaux):string
{
    $phrases = [];
    foreach($creneaux as $creneau){
        $phrases[] = "de <strong>{$creneau[0]}h</strong> à <strong>{$creneau[1]}h</strong>";
    };
    if (empty($phrases)){
        return "Magasin fermé";
    }
    return 'Ouvert '.implode(' et ',$phrases);
}

//Vérifier si magasin est ouvert
function in_creneaux (int $heure, array $creneaux):bool
{
    $ouvert = false;
    //Trouver le jours
    foreach($creneaux as $k => $creneau){
        if($k === ((int)date('N')-1)){
            //Trouver le creneau
            foreach($creneau as $horaire){
                //Vérifier si ouvert
                if($heure > $horaire[0] && $heure < $horaire[1]){
                    $ouvert = true;
                }
            }
        }
    }
    return $ouvert;
}  
?>