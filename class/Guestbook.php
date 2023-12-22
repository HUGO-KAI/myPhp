<?php 
require_once 'Message.php';
class Guestbook {
    private $message;
    private $filename;

    public function __construct(string $filename)
    {
        $directory = dirname($filename);
        if (!is_dir($directory)){
            mkdir($directory, 0777, true);
        }
        if ( file_exists($filename)) {
            touch($filename);
        }
        $this->filename = $filename
    }
    public function addMessage (Message $message):void
    {
        file_put_contents($this->filename, $message, FILE_APPEND);
    }

    public function toJSON(): string
    {
        return json_encode([
            'username' => $this->username,
            'message' => $this->message,
            'date' => $this->getTimestamp()
        ]);
    }
}