<?php

/**
 * Creneau class pas encore fini
 * 
 * @param $debut l'heure d'ouverture de magasin
 * @param $fin l'heure de fermeture de magasin
 */
class Creneau {
    public $debut;
    public $fin;
    
    public function __construct(int $debut, int $fin) 
    {
        $this->debut = $debut;
        $this->fin = $fin;
    }

    public function in_creneau(int $heure):void 
    {
        if ($heure >= $this->debut && $heure <= $this->fin) {
            echo "Magasin est ouvert à $heure h";
            echo "\n";
        }else {
            echo "Magasin n'est pas ouvert";
        }
    }
}