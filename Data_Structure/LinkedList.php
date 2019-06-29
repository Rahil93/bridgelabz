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

  public static function insert($data)
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

  public static function add($data)
  {
    $n = self::$head;
    $n1 = null;

    while (strcmp($data,$n->data) != 0 && $n->next != null) {
        $n1 = $n;
        $n = $n->next;
    }
    if (strcmp($data,$n->data) != 0) {
      LinkedList::insert($data);
    }
    else {
      echo "Data is already present...\n";
    }
  }

  public static function remove($data)
  {
    $n = self::$head;
    $n1 = null;

    while (strcmp($data,$n->data) != 0 && $n->next != null) {
        $n1 = $n;
        $n = $n->next;
    }
    if (strcmp($data,self::$head->data) == 0) {
      $n = self::$head;
      self::$head = self::$head->next;
      $n = null;
    }
    elseif (strcmp($data,$n->data) == 0) {
        $n1->next = $n->next;
        $n = null;
    }
    else {
      LinkedList::insert($data);
    }
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
