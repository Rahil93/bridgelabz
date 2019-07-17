 <?php

final class Singleton_Lazy
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
                self::$instance = new Singleton_Lazy();
                return self::$instance;
            }   
    }

    // using this nested class without using final keyword for class it created an another object for a class which destroy the sigleto concept.
    // public function inner_class()
    // {
    //     return new class() extends Singleton_Lazy{
    //         private $instance;

    //         public static function getInstance()
    //         {
    //             self::$instance = new Singleton_Lazy();
    //             return self::$instance;
    //         }
    //     };
    // }
    
}

$objStudent = Singleton_Lazy::getInstance();
echo "Object for Student\n";
$objEmployee = Singleton_Lazy::getInstance();
echo "Object for Employee\n";
// $objinner = Singleton_Lazy::inner_class();
// echo "Object of inner class\n";

?>