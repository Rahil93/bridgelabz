<?php
class Node{
  public $data;
  public $next;
  function __construct($data)
  {
    $this->data = $data;
  }
}

class LinkedList{
  public static $head;

  public function insert($data)
  {
    $node = new Node($data);

    if (self::$head == null) {
      self::$head = $node;
    }

    $n = self::$head;
    while ($n->next != null) {
      $n = $n->next;
    }
    $n->next = $node;
    $node->next = null;
  }

  public function display()
  {
    $n = self::$head;
    while ($n->next != null) {
      echo "|".$n->data."|-->";
      $n = $n->next;
    }
    echo "|".$n->data."|null";
  }
}
 ?>
