<?php
function nombre_vue (){
    $filename = dirname(__DIR__ ).DIRECTORY_SEPARATOR."data".DIRECTORY_SEPARATOR."compteur";
    //Nombre de visite par session navigateur sur le site,
    session_start();
    //initialiser le compteur à 0 au commencement
    $compteur = 0;
    /*
    * Si le fichier compteur existe, lire le chiffre compteur dans le fichier
    * si non, donner valeur 1 à compteur et l'enregistrer dans la session et dans le fichier
    */
    if (file_exists($filename)) {
        $compteur = (int)file_get_contents($filename);
        if (!isset($_SESSION['nbVistors'])){    
            $compteur++;
            $_SESSION['nbVistors'] = $compteur;
            file_put_contents($filename, $compteur);
        }
    }else{ //Si c'est la première visite
        $compteur = 1;
        file_put_contents($filename, $compteur); 
        $_SESSION['nbVistors'] = $compteur;
    }
    return $compteur;
}