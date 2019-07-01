<?php

class Node
{
    public $data;
    public $next;
    
    function __construct($data)
    {
        $this->data = $data;
    }
}

class Dequeue
{
    public static $front;
    public static $rear;

    public static function addFront($data)
    {
        $node = new Node($data);
        $node->next = null;

        if (self::$front == null) {
            self::$front = $node;
            self::$rear = $node;
        }
        else {
            $tempnode = self::$front;
            self::$front = $node;
            self::$front->next = $tempnode;
        }
    }

    public static function addRear($data)
    {
        $node = new Node($data);
        $node->next = null;

        if (self::$rear == null) {
            self::$rear = $node;
            self::$front = $node;
        }
        else {
            // $tempnode = self::rear;
            self::$rear->next = $node;
            self::$rear = $node;
        }
    }

    public static function display()
    {
        $tempnode = self::$front;
        echo "Dequeue Are....\n";
        while ($tempnode->next != null) {
            echo $tempnode->data." ";
            $tempnode = $tempnode->next;
        }
        echo $tempnode->data."\n";

    }
}



?>