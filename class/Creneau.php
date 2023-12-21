<?php
class Creneau {
    public $debut;
    public $fin;

    public function __construct(int $debut, int $fin) {
        $this->debut = $debut;
        $this->fin = $fin;
    }

    public function in_creneau(int $heure):void {
        if ($heure >= $this->debut && $heure <= $this->fin) {
            echo "Magasin est ouvert à $heure h";
            echo "\n";
        }else {
            echo "Magasin n'est pas ouvert";
        }
    }

    public function intersect (Creneau $creneau): bool {
        
    }
}