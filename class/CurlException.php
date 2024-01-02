<?php
class CurlException extends Exception {
    public function __contruct ($curl) 
    {
        $this->message = curl_error($curl);
        curl_close($curl);
    }
}