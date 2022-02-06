<?php
class Logger
{
    public static $logFile; 
    public static function Error(string $message)
    {
       file_put_contents(self::$logFile, $message.PHP_EOL, FILE_APPEND);
    }
}
?>