<?php
/**
 * Ajouter une vue dans le fichier compteur quand il y a une visite sur la page
 * 
 * @param  string $fichier stocker nombre total des vues
 * @param  string $fichier_journalier stocker nombre des vues par jour
 * @return void
 */
function ajouter_vue ():void
{
    $fichier = dirname(__DIR__ ).DIRECTORY_SEPARATOR."data".DIRECTORY_SEPARATOR."compteur";
    $fichier_journalier = $fichier.'-'.date('Y-m-d');
    incrementer_compteur($fichier);
    incrementer_compteur($fichier_journalier);
}

/**
 * Incrementer une vue dans le fichier donné
 *
 * @param  string $fichier 
 * @return void
 */
function incrementer_compteur(string $fichier):void 
{
    $compteur = 1;
    if ( file_exists($fichier)) {
        $compteur = (int)file_get_contents($fichier);
        $compteur++;
    }
    file_put_contents($fichier, $compteur);
}

/**
 * Retourner le nombre enregistré dans le fichier donné
 *
 * @param  string $fichier 
 * @return string 
 */
function nombre_vue ():string 
{
    $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur';
    return file_get_contents($fichier);
}



/**
 * Retourner le nombre des vues par mois
 *
 * @param  int $annee
 * @param  int $mois
 * @return int
 */
function nombre_vues_mois (int $annee, int $mois):int
{
    $moiS = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur-'.$annee.'-'.$moiS.'-'.'*';

    //Trouver tous les fichiers conforment le pattern ci-dessus
    $fichiers = glob ($fichier);

    $result = 0;
    foreach ($fichiers as $fichier) {
        $result += (int)file_get_contents($fichier);
    };
    return $result;
}

function nombre_vues_mois_detail (int $annee, int $mois):array
{
    $mois = str_pad($mois, 2, '0', STR_PAD_LEFT);
    $fichier = dirname(__DIR__).DIRECTORY_SEPARATOR.'data'.DIRECTORY_SEPARATOR.'compteur-'.$annee.'-'.$mois.'-'.'*';

    //Trouver tous les fichiers conforment le pattern ci-dessus
    $fichiers = glob ($fichier);
    
    if (count($fichiers) > 0) {
        foreach ($fichiers as $fichier) {
            $parties = explode('-',basename($fichier));
            $visites[] = [
                'annee'=> $parties[1],
                'mois'=> $parties[2],
                'jour'=> $parties[3],
                'visites' => file_get_contents($fichier),
            ]; 
        };
    }else{
        return $visites = [];
    }
   
    return $visites;
}