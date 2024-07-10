<?php
class Db{
    private static $instance = null;

    private function __construct() {}

    private function __clone() {}

    //here i make datebases connection
    public static function getInstance() {
        if(!isset(self::$instance)){
            $pdo_options[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            self::$instance = new PDO ("mysql:host=localhost;dbname=tijhul87_php_mvc",' tijhul87_mvc', 'Php_mvc1', $pdo_options);
        }
        return self::$instance;
    }
}
?>