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

     public static function pop()
     {
         $tempnode = self::$top;
         self::$top = self::$top->next;
         return $tempnode->data;
         $tempnode = null;
     }

     public static function peek()
     {
         return self::$top->data;
     }

     public static function isEmpty()
     {
         return self::$top == null? true:false;
     }

     public static function size()
     {
         $count = 0;
         $tempnode = self::$top;
         while ($tempnode->next != null) {
             $count++;
             $tempnode = $tempnode->next;
         }
         $count++;
         return $count;
     }

     public static function display()
     {
         $tempnode = self::$top;
         echo "Stack Are... \n";
         while ($tempnode->next != null) {
             echo $tempnode->data."\n";
             $tempnode = $tempnode->next;
         }
         echo $tempnode->data."\n";
     }
 }

?>