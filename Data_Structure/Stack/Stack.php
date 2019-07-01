<?php 

class Node{
    public $data;
    public $next;
    function __construct($data){
        $this->data = $data;
    }
}
 
 class Stack{
    public static $rear;
    public static $top;

     public static function push($data)
     {
         $node = new Node($data);
         
         if (self::$top == null) {
             $node->next = null;
             self::$top = $node;
         }
         else {
             $tempnode = self::$top;
             $node->next = $tempnode;
             self::$top = $node;
         }
     }

     public static function display()
     {
         $tempnode = self::$top;
         echo "\n Stack Are... \n";
         while ($tempnode->next != null) {
             echo $tempnode->data."\n";
             $tempnode = $tempnode->next;
         }
         echo $tempnode->data."\n";
     }
 }

?>