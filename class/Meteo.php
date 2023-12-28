<?php 
class Meteosource {
    private $codeApi;
    private $date;
    private $city;

    public function __construct($codeApi){
        $this->codeApi = $codeApi;
    }

    public function getForecast (string $city)
    {
        
        $this->city = implode("%20", explode(' ', $city));
        $curl = curl_init();

        curl_setopt_array($curl, [
            CURLOPT_URL => "https://ai-weather-by-meteosource.p.rapidapi.com/find_places?text=$this->city&language=en",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 30,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "GET",
            CURLOPT_HTTPHEADER => [
                "X-RapidAPI-Host: ai-weather-by-meteosource.p.rapidapi.com",
                "X-RapidAPI-Key: 2eaf586f6bmshb5bffe4090f7ffbp10d37cjsnddbe6becf6ec"
            ],
        ]);

        $response = curl_exec($curl);
        $err = curl_error($curl);

        curl_close($curl);

        if ($err) {
            echo "cURL Error #:" . $err;
        } else {
            echo $response;
        }
    }
}