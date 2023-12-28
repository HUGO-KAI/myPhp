<?php 
require_once 'Message.php';
class Guestbook {
    private $filename;

    public function __construct(string $filename)
    {
        //Vérifier si le dossier existe, si non, créer un
        $directory = dirname($filename);
        if (!is_dir($directory)){
            mkdir($directory, 0777, true);
        }
        //Vérifier si le fichier existe, si non, créer un
        if ( file_exists($filename)) {
            touch($filename);
        }
        $this->filename = $filename;
    }
    public function addMessage (Message $message):void
    {
        file_put_contents($this->filename, $message->toJSON().PHP_EOL, FILE_APPEND);
    }

    public function getMessages():array
    {
        $content = trim(file_get_contents($this->filename));
        $lines = explode(PHP_EOL, $content);
        $messages = [];
        foreach($lines as $line){
            $data = json_decode($line,true);
            $date = new DateTime("@".$data['date']);
            $date->setTimezone(new DateTimeZone('Europe/Paris'));
            $messages[] = new Message($data['username'], $data['message'],$date);
        }
        return array_reverse($messages);
    }
}