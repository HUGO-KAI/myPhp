<?php 
class Meteosource {
    const BASE_URL = 'ai-weather-by-meteosource.p.rapidapi.com';
    private $codeApi;
    private $date;
    private $city;
    private $baseUrl;

    public function __construct($codeApi){
        $this->codeApi = $codeApi;
    }

    //Chercher la ville, returne une liste de villes trouvée par le nom saisi
    public function getPlace (string $city)
    {
        
        $this->city = implode("%20", explode(' ', $city));

        $this->baseUrl = self::BASE_URL;
        $url = "https://$this->baseUrl/find_places?text=$city&language=en";
        try{
            $response = $this->apiCall($url,"GET",$this->codeApi);
        }catch (Exception $exception) {
            $response = [];
            return [
                'message' => $exception->getMessage()
            ];
        }
         
        return json_decode($response);
    }
    //Appeler l'API de resource
    private function apiCall (string $resource, string $method, string $apiKey):string
    {
        $curl = curl_init();
        curl_setopt_array($curl, [
            CURLOPT_URL => $resource,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => $method,
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: $this->baseUrl",
                "X-RapidAPI-Key: $this->codeApi"
            ],
        ]);

        $response = curl_exec($curl);
        curl_close($curl);
        if ($response === false){
            throw new CurlException($curl);
        }else{
            return $response;
        }
        
    }   
}