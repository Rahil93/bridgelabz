<?php

class Singleton_Eager
{ 
    private static $instance;
    private static $counter = 0;

    private function __construct()
    {
        self::$counter++;
        echo "Counter Value : ".self::$counter."\n";
    }

    public static function getInstance()
    {
        if (!isset(self::$instance)) {
            self::$instance = new Singleton_Eager();
            return self::$instance;
        }
    }
}

$objStudent = Singleton_Eager::getInstance();
echo "Object for Student\n";
$objEmployee = Singleton_Eager::getInstance();
echo "Object for Employee\n";

?>