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

    class Queue
    {
        public static $front;
        public static $rear;

        public static function enqueue($data)
        {
            $node = new Node($data);
            // $node->next = null;

            if (self::$front == null) {
                self::$front = $node;
            }
            else {
                $tempnode = self::$front;
                while ($tempnode->next != null) {
                    $tempnode = $tempnode->next;
                }
                $tempnode->next = $node;
                self::$rear = $node;
                $node->next = null;
            }
        }

        public static function dequeue()
        {
            $tempnode = self::$front;
            self::$front = self::$front->next;
            return $tempnode;
            $tempnode = null; 
        }

        public static function display()
        {
            $tempnode = self::$front;
            echo "Queue Are...\n";
            while ($tempnode->next != null) {
                echo $tempnode->data."\n";
                $tempnode = $tempnode->next;
            }
            echo $tempnode->data."\n";
        }

    }
    
    

?>