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

    public static function removeFront()
    {
        $tempnode = self::$front;
        self::$front = self::$front->next;
        return $tempnode->data;
        $tempnode = null;
    }

    public static function removeRear()
    {
        $tempnode = self::$front;
        $prevnode = null;
        while ($tempnode->next !=null) {
            $prevnode = $tempnode;
            $tempnode = $tempnode->next;
        }
        $prevnode->next = null;
        self::$rear = $prevnode;
        return $tempnode->data;
        $tempnode = null;
    }

    public static function isEmpty()
    {
        return self::$front == null;
    }

    public static function size()
    {
        $count = 0;
        $tempnode = self::$front;
        while ($tempnode->next != null) {
            $count++;
            $tempnode = $tempnode->next;
        }
        $count++;
        return $count++;
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