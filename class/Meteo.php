<?php 
class Meteosource {
    const BASE_URL = 'www.meteosource.com';
    private $codeApi;
    private $date;
    private $city;
    private $baseUrl;

    public function __construct($codeApi){
        $this->codeApi = $codeApi;
    }

    /**
    * Chercher la ville, returne une liste de villes trouvée par le nom saisi   
    */
    public function getPlace (string $city)
    {
        $this->city = implode("%20", explode(' ', $city));
        $this->baseUrl = self::BASE_URL;
        $url = "https://$this->baseUrl/api/v1/free/find_places?text=$this->city&key=$this->codeApi";
        $response = $this->apiCall($url,"GET");
        return json_decode($response);
    }

    /**
    * Chercher la ville, returne une liste de villes trouvée par le nom saisi   
    */
    public function getMeteo (string $place_id)
    {
        $this->city = $place_id;
        $this->baseUrl = self::BASE_URL;
        $url = "https://$this->baseUrl/api/v1/free/point?place_id=$this->city&sections=all&timezone=UTC&language=en&units=metric&key=$this->codeApi";
        $response = $this->apiCall($url,"GET");
        return json_decode($response);
    }

    //Appeler l'API de resource
    private function apiCall (string $resource, string $method)
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $resource);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_TIMEOUT, 30);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
        $response = curl_exec($ch);
        curl_close($ch);
        
        return $response;
        
    }   
}