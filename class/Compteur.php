<?php
/**
 * Compter nombre de vue par page du site internet.
 * 
 * @param string $fichier  nom du fichier.
 */

class Compteur {

    protected $fichier;

    public function __construct(string $fichier) 
    {
        $this->fichier = $fichier;
    }
    //Incrementer
    public function incrementer():void 
    {
        $compteur = 1;
        if ( file_exists($this->fichier)) {
            $compteur = (int)file_get_contents($this->fichier);
        }
        file_put_contents($this->fichier, $compteur);
    }

    public function recuperer ():string 
    {
        if (!file_exists($this->fichier)) {
            return 0;
        }
        return file_get_contents($this->fichier);
    }
}